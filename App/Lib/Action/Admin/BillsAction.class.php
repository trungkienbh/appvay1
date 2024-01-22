<?php
class BillsAction extends CommonAction{

    public function index(){
        $this->title = "还款列表";
        $keyword = I("keyword",'','trim');
        $this->keyword = $keyword;
        $where = array();
        if($keyword){
            $where['a.ordernum'] = $keyword;
        }
        $where['a.status'] = 1;
        $Bills = D("bills as a");
        import('ORG.Util.Page');
        $count = $Bills->join('order_pz as p on a.ordernum=p.ordernum')->where($where)->count();
        $Page  = new Page($count,25);
        $Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
        $show  = $Page->show();
        $list = $Bills->field('a.*,p.pzurl,p.add_time')->join('order_pz as p on a.ordernum=p.ordernum')->where($where)->order('addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key=>$val){
            $list[$key]['days'] = ($val['last_hk_date'] - $val['hk_date'])>=0?0:round(($val['hk_date']-$val['last_hk_date'])/86400);
            if($list[$key]['days']>0){
                //计算预期金额
                $list[$key]['yuqimoney'] =  round( $list[$key]['days']*$val['money']*(C('cfg_yuqifuwufei')/100),2);
            }
        }
        $this->list = $list;
        $this->page = $show;
        $this->display();
    }

	public function del(){
        $this->title='删除订单';
        $id = I('id',0,'trim');
        if(!$id){
            $this->error("参数有误!");
        }
		$Bills = D("bills");
        $status = $Bills->where(array('id' => $id))->delete();
        if(!$status){
            $this->error("删除失败!");
        }
        $this->success("删除订单成功!");
	}
	public function changestatus(){
	    if(IS_POST){
	        $id = I('post.id',0,'trim');
	        $type = I('post.type',2,'int');
            $data['status'] = I('post.status','','trim');
	        if(!$id || $data['status']==''){
                $this->ajaxReturn( array('status' => 0,'msg' => '参数错误'));
            }
            $billsInfo = $bills = D('bills')->where(['id'=>$id,'status'=>['in',['0','2']]])->find();
            if(!$billsInfo){
                $this->ajaxReturn( array('status' => 0,'msg' => '未知订单'));
            }
            $data['status'] = $data['status']==''?$billsInfo['status']:intval($data['status']);
            import("@.Class.Newsms");
            $Smsapi = new Newsms();
            if($data['status']==1){
                $data['hk_date'] = strtotime(date('Y-m-d',time()));
                $data['type'] = $type;
                $contstr = "【".C('cfg_smsname')."】您的还款订单号{$billsInfo['ordernum']}还款成功";
                //echo $status;exit;
            }elseif($data['status']==0){
                $contstr = "【".C('cfg_smsname')."】您的还款订单号{$billsInfo['ordernum']}审核不通过，还款失败，请重新上传凭证";
            }
            $model = M('');
            $model->startTrans();
            try{
                $query = M('bills')->where(['id'=>$id])->save($data);
                if($query){
                    $status = $Smsapi->sendSMS($billsInfo['user'],$contstr);
                    $status = json_decode($status,true);
                    if($status['code']==0){
                        $model->commit();
                        $this->ajaxReturn( array('status' => 1,'msg' => '还款成功'));
                    }else{
                        $model->rollback();
                        $this->ajaxReturn( array('status' => 0,'msg' => $status['error']));
                    }

                }else{
                    $this->ajaxReturn( array('status' => 0,'msg' => '操作失败'));
                }
            }catch (\Exception $e){
                $model->rollback();
                $this->ajaxReturn( array('status' => 0,'msg' => '未知错误'));
            }
            //echo $billsInfo['user'];
            //echo $contstr;exit;


        }
    }

    public function pzlists(){
        $this->title = "还款列表";
        $keyword = I("keyword",'','trim');
        $this->keyword = $keyword;
        $where = array();
        if($keyword){
            $where['a.ordernum'] = $keyword;
        }
        $where['a.status'] = 2;
        $Bills = D("bills as a");
        import('ORG.Util.Page');
        $count = $Bills->join('order_pz as p on a.ordernum=p.ordernum')->where($where)->count();
        $Page  = new Page($count,25);
        $Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
        $show  = $Page->show();
        $list = $Bills->field('a.*,p.pzurl,p.add_time')->join('order_pz as p on a.ordernum=p.ordernum')->where($where)->order('addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key=>$val){
            $list[$key]['days'] = ($val['last_hk_date'] - $val['hk_date'])>=0?0:round(($val['hk_date']-$val['last_hk_date'])/86400);
            if($list[$key]['days']>0){
                //计算预期金额
                $list[$key]['yuqimoney'] =  round( $list[$key]['days']*$val['money']*(C('cfg_yuqifuwufei')/100),2);
            }
        }
        $this->list = $list;
        $this->page = $show;
        $this->display();
    }
	
}
