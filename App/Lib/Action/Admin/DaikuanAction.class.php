<?php
class DaikuanAction extends CommonAction{
	
	
	//借款列表
	public function index(){
	    $yuqi = I('isYuqi',0,'int');
	    if($yuqi){
            $this->title = "逾期列表";
            $this->yuqi = $yuqi;
            $where = array('status'=>2);
          	//权限判断
			if(session('admin_gid') == 2){
          	$U = D("user");
          	$users = $U->where("invitor=".session('admin_user'))->field("phone")->select();
            foreach ($users as $v)
              {
                  $v = join(",",$v);
                  $temp[] = $v;
              }
              $t="";
              foreach($temp as $v){
                  $t.="".$v."".",";
              }
              $t=substr($t,0,-1);
              $where = "status = 2 and user in(".$t." )";
              //$wherel['user'] = array('in',$temp);
           
              
            }
          //权限判断
        }else{
            $this->title = "借款列表";
            $keyword = I("keyword",'','trim');
          	$date = I("date",'','trim');
          	$this->date = $date;
          	$date1 = explode(" - ", $date );
          	$stime = $date1[0]." 00:00:00";
          	$etime = $date1[1]." 23:59:59";
            $this->keyword = $keyword;
          	//print($keywor."  --  ".$date);
			//只显示已付款
          	//$where = "status != 0";
          	$where = "";
            if($keyword && $date){
                $where = "a.addtime between ".strtotime($stime)." and ".strtotime($etime)." and b.name ='".$keyword."'";
            }
          	if($keyword && !$date){
                $where = "b.name ='".$keyword."'";
            }
          	if(!$keyword && $date){
                $where = "a.addtime between ".strtotime($stime)." and ".strtotime($etime);
            }
          //权限判断
			if(session('admin_gid') == 2){
          	$U = D("user");
          	$users = $U->where("invitor=".session('admin_user'))->field("phone")->select();
            foreach ($users as $v)
              {
                  $v = join(",",$v);
                  $temp[] = $v;
              }
              $t="";
              foreach($temp as $v){
                  $t.="".$v."".",";
              }
              $t=substr($t,0,-1);
              $where = "a.user in(".$t." )";
              //$wherel['user'] = array('in',$temp);
           
               
              if($keyword && $date){
                $where = "a.addtime between ".strtotime($stime)." and ".strtotime($etime)." and a.user in(".$t." ) and b.name ='".$keyword."'";
                }
                if($keyword && !$date){
                    $where = "a.user in(".$t." ) and b.name ='".$keyword."'";
                }
                if(!$keyword && $date){
                    $where = "a.user in(".$t." ) and a.addtime between ".strtotime($stime)." and ".strtotime($etime);
                }
            }
          //权限判断
        }

		$Order = D("order");
		import('ORG.Util.Page');
		$count =  M("`order` as a")->join("userinfo as b on b.user = a.user")->where($where)->count();
		$Page  = new Page($count,25);
		$Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
		$show  = $Page->show();
      
      $list =  M("`order` as a")->join("userinfo as b on b.user = a.user")->where($where)->field('a.*,b.vip as vip')->order('addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        if($yuqi){
            $i=0;
            foreach ($list as $k=>$v){
                $days = round((time()-$v['updateTime'])/ 86400)-(30*($v['donemonth'] + 1));
                if($days>0){
                    $newList[$i] = $v;
                    $newList[$i]['days']=$days;
                    $newList[$i]['time']=date('Y-m-d',strtotime(date("Y-m-d",strtotime("+".($v['donemonth'] + 1)." week",$v['updateTime']))));
                    $newList[$i]['yuqi']=round($v['days']*$v['monthmoney']*(C('cfg_yuqifuwufei')/100),2);
                }
                $i++;
           
            }
            $list = array_slice($newList,$Page->firstRow,$Page->listRows);
        }
		$this->list = $list;
		$this->page = $show;
		$this->display();
	}
    public function index1(){
        $yuqi = I('isYuqi',0,'int');
        if($yuqi){
            $this->title = "逾期列表";
            $this->yuqi = $yuqi;
            $where = array('status'=>2);
        }else{
            $this->title = "借款列表";
            $keyword = I("keyword",'','trim');
            $this->keyword = $keyword;
            $where = array();
            if($keyword){
                $where['ordernum'] = $keyword;
                // $where['ordernum|user|money|']=array('like',$keyword);
            }
        }

        $Order = D("order");
        import('ORG.Util.Page');
        $count = $Order->where($where)->count();
        $Page  = new Page($count,25);
        $Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
        $show  = $Page->show();
        $list = $Order->where($where)->order('addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        if($yuqi){
            $i=0;
            foreach ($list as $k=>$v){
                $days = round((time()-$v['updateTime'])/ 86400)-(30*($v['donemonth'] + 1));
                if($days>0){
                    $newList[$i] = $v;
                    $newList[$i]['days']=$days;
                    $newList[$i]['time']=date('Y-m-d',strtotime(date("Y-m-d",strtotime("+".($v['donemonth'] + 1)." week",$v['updateTime']))));
                    $newList[$i]['yuqi']=round($days*$v['monthmoney']*(C('cfg_yuqifuwufei')/100),2);
                }
                $i++;
            }
            $list = array_slice($newList,$Page->firstRow,$Page->listRows);
        }
        $this->list = $list;
        $this->page = $show;
        $this->display('index');
    }
	
	//修改订单状态
	public function changestatus(){
		
		
		if($_GET['act']==1){//修改金额
		    $Order = D("order");
			$list = $Order->where(array('id' => $_GET['id']))->select();
			$months = $list[0][months];
			$money1 = $list[0][money];
			$monthmoney = $list[0][monthmoney];
			$lixi = $monthmoney-$money1;
			$nowmonthmoney = $lixi / $money1 * I('money') + I('money');
			$status = $Order->where(array('id' => $_GET['id']))->save(array('money' => I('money'),'monthmoney' => $nowmonthmoney ,'updateTime'=>time()));
			if(!$status){
					$this->error('失败');
				}else{
					$this->error('成功');
				}
		}
		$id = I("id",0,'trim');
		$status = I("status",'','trim');
		$data = array('status' => 0,'msg' => '未知错误');
		if(!$id || $status == ''){
			$data['msg'] = "参数错误!";
		}else{
			$Order = D("order");
			$count = $Order->where(array('id' => $id))->count();
			if(!$count){
				$data['msg'] = "订单不存在!";
			}else{
				if($status==2){
				$status = $Order->where(array('id' => $id))->save(array('status' => $status,'successtime'=>time()));	
				}else{
				$status = $Order->where(array('id' => $id))->save(array('status' => $status,'updatetime'=>time()));	
				}
				if(!$status){
					$data['msg'] = "操作失败!";
				}else{
					$data['status'] = 1;
				}
			}
		}
		$this->ajaxReturn($data);
	}
	
	//删除订单
	public function del(){
        $this->title='删除订单';
        $id = I('id',0,'trim');
		$ordernum = I('ordernum',0,'trim');
        if(!$id){
            $this->error("参数有误!");
        }
        $Order = D("order");
        $status = $Order->where(array('id' => $id))->delete();
		$Payorder = D("payorder");
        $Payorder->where(array('ordernum' => $ordernum))->delete();
        if(!$status){
            $this->error("删除失败!");
        }
        $this->success("删除订单成功!");
	}
	
	
	
}
