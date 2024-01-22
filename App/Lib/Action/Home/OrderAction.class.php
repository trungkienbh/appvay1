<?php
class OrderAction extends CommonAction{
	
	public function checkorder(){
		$data = array('status' => 0,'msg' => '未知错误!');
		if(!$this->getLoginUser()){
			$this->redirect('User/login');
		}else{
          	$Userinfo = D("userinfo");
            $info = $Userinfo->where(array('user' => $this->getLoginUser()))->find();
            $arr = array(
                'baseinfo' => 0,
                'unitinfo' => 0,
                'bankinfo' => 0,
                'zhimainfo'=> 0,
                'wechat'   => 0,
              	'workinfo'   => 0,
              	'creditinfo'   => 0,
                'phoneinfo' => 0
            );
            //判断资料完整性
            if($info['name'] && $info['usercard'] && $info['cardphoto_1'] && $info['cardphoto_2'] && $info['cardphoto_4']){
                $arr['baseinfo'] = 1;
            }
            if($info['personname_1'] && $info['personphone_1'] && $info['persongx_1'] && $info['personname_2'] && $info['personphone_2'] && $info['persongx_2']){
                $arr['unitinfo'] = 1;
            }
            if($info['bankcard'] && $info['bankname']){
                $arr['bankinfo'] = 1;
            }
            if($info['phone']){
                $arr['phoneinfo'] = 1;
            }
          	 if($info['creditinfo'] == 1){
                $arr['creditinfo'] = 1;
            }
          	if($info['wechat'] && $info['alipay']){
                $arr['wechat'] = 1;
            }
          if($info['dwname'] && $info['dwphone']){
                $arr['workinfo'] = 1;
            }
			$day = $this->yesdaikuan($this->getLoginUser());
          	$Order = D("order");
			$info1 = $Order->where(array('user' => $this->getLoginUser()))->order("addtime Desc")->find();
          	$Bills = D("bills");
			$tmp = $Bills->where(array('user' => $this->getLoginUser(),'jkorder' => $info1['ordernum']))->order("addtime Desc")->find();
          	
          	if($arr['baseinfo'] == 0 || $arr['unitinfo'] ==0 || $arr['phoneinfo'] == 0){
             $data['status'] = 2;
             $data['msg'] = "请先完成认证后再提交申请!";
            }elseif($arr['bankinfo'] == 0 ){
             $data['status'] = 3;
             $data['msg'] = "请先绑定银行卡再提交申请!";
            }elseif($day > 0){
				$data['msg'] = "您最近一次借款未通过审核,请".$day."天后再次提交!";
			}elseif($info1['status'] == 1){
            	$data['msg'] = "您最近一次借款正在审核中,暂时无法申请!";
            }elseif($info1['status'] == 3 || $info1['status'] == 4){
            	$data['msg'] = "您最近一次借款正在放款中,暂时无法申请!";
            }elseif($info1['status'] == 2 && !$tmp){
              	$data['status'] = 4;
            	$data['msg'] = "您最近一次借款尚未还清,暂时无法申请!";
            }else{
				//$data['msg'] = $info['status'];
              $data['status'] = 1;
			}
		}
		$this->ajaxReturn($data);
	}
	//申请提现
	public function tixian(){
		//判断是否已登录
		$user = $this->getLoginUser();
		if(!$user){
			$this->redirect('User/login');
		}
		$ordernum = I("ordernum",'','trim');
		$Order = D("order");
		$status = $Order->where(array('ordernum' => $ordernum))->save(array('tixian' => 1,'status' => 4));
		if($status){
          	$data['msg'] = "申请提现成功,请随时查看提现进度!";
          	$data['status'] = 1;
		}else{
          	$data['msg'] = "申请提现失败,请重新申请!";
		}
      $this->ajaxReturn($data);
	}
	private function yesdaikuan($user){
		//先查找最近一次失败订单
		$Order = D("order");
		$info = $Order->where(array('user' => $this->getLoginUser()))->order("addtime Desc")->find();
		if(!$info){
			return 0;
		}
		if($info['status'] != '-1'){
			return 0;
		}
		$tmptime = $info['addtime'];
		$tmptime = time()-$tmptime;
		$tmptime = $tmptime/(24*60*60);
		$disdkdleyday = C("cfg_disdkdleyday");
		if(!$disdkdleyday) $disdkdleyday = 0;
		if($tmptime > $disdkdleyday){
			return 0;
		}
		return ceil($disdkdleyday-$tmptime);
	}
	
	public function daikuan(){
		if(!$this->getLoginUser()){
			$this->redirect('User/login');
		}
		$Userinfo = D("userinfo");
		$info = $Userinfo->where(array('user' => $this->getLoginUser()))->find();
		if(!$info){
			$this->redirect('Info/index');
		}
		if($info['personname_1']==''){
			$this->redirect('Info/index');
		}
		if($info['bankcard']==''){
			$this->redirect('Info/index');
		}
		//判断用户最近一次失败订单是否超过预期时间
		$yesdaikuan = $this->yesdaikuan($this->getLoginUser());
		if($yesdaikuan){
			$this->redirect('Index/index');
		}
		$money = I("money",0,'trim');
		$month = I("month",0,'trim');
		$money = (float)$money;
		$month = (int)$month;
		$dismonths = C("cfg_dkmonths");
		$dismonths = explode(",",$dismonths);
		$fuwufei = C('cfg_fuwufei');
		//$fuwufei = explode(",",$fuwufei);
		if($money > C('cfg_maxmoney') || $money < C('cfg_minmoney')){
			//借款金额不允许
			$this->redirect('Index/index');
		}
		if(!in_array($month,$dismonths)){
			//不允许的分期月
			$this->redirect('Index/index');
		}
		$rixi = round($fuwufei[$month-1] * 10 / $month,2);
		$fuwufei = $fuwufei * $money / 100 * $month;
		$order = array(
			'money'   => $money,
			'fuwufei' => $fuwufei,
			'month'   => $month,
			'huankuan'=> ceil((float)($money)),
			'bank'	  => $info['bankname'],
			'banknum' => $info['bankcard'],
			'rixi'	  => $rixi
		);
		$addorder = I("get.trueorder",0,'trim');
		if($addorder){
			$data = array('status' => 0,'msg' => '未知错误','payurl' => '');
			//创建订单
			$ordernum = neworderNum();
			$arr = array(
				'ordernum' => $ordernum,
				'type'	   => '审核费',
				'money'	   => 0,
				'addtime'  => time(),
				'status'   => 1,
				'user'	   => $this->getLoginUser()
			);
			$Payorder = D("payorder");
			$status = $Payorder->add($arr);
			if(!$status){
				$data['msg'] = '创建订单失败!';
			}else{
				$Order = D("order");
				$arr = array(
					'user' => $this->getLoginUser(),
					'money' => $money,
					'months' => $month,
					'monthmoney' => ceil($order['huankuan']+$order['fuwufei']),
					'donemonth' => 0,
					'addtime' => time(),
					'status' => 1,
					'pid' => $status,
					'bank' => $info['bankname'],
					'banknum' => $info['bankcard'],
					'ordernum' => $ordernum
				);
				$status = $Order->add($arr);
				if(!$status){
					$data['msg'] = '创建订单失败!';
				}else{
					$data['status'] = 1;
					$data['pid'] = $status;
					$data['payurl'] = U('Pay/Index/index',array('ordernum' => $ordernum));
					$data['ordernum'] = $ordernum;
					$data['price'] = C('cfg_shenhefei');
					$data['type']  = '资质审核费';
				}
			}
			$this->ajaxReturn($data);
			exit;
		}else{
			$this->order = $order;
			$this->display();
		}
	}
	
	public function lists(){
		$Order = D("order");
		$user = $this->getLoginUser();
		if(!$user){
			$this->redirect('User/login');
		}
      	$Userinfo = D("userinfo");
		$info = $Userinfo->where(array('user' => $user))->find();
		$this->vipinfo = $info['vip']; 
		$order = $Order->where(array('user' => $user))->order("addtime Desc")->limit(1)->select();
		$this->data = $order;
		$this->order = $Order->where(array('user' => $user))->order("addtime Desc")->limit(1)->find();
		$this->display();
	}
	
	public function info(){
		$oid = I("oid",0,"trim");
		if(!$oid){
			$this->redirect('Order/lists');
		}
		$user = $this->getLoginUser();
		if(!$user){
			$this->redirect('User/login');
		}
		$Order = D("order");
		$order = $Order->where(array('id' => $oid,'user' => $user))->find();
		if(!$order){
			$this->redirect('Order/lists');
		}
		$this->data = $order;
		$this->display();
	}
	
	//我的还款
	public function bills(){
		$user = $this->getLoginUser();
		if(!$user){
			$this->redirect('User/login');
		}
		$hkr = C("cfg_huankuanri");
		if(!$hkr) $hkr = 10;
		$data = array();
		//遍历已借款订单
		$Order = D("order");
		$tmp = $Order->where(array('user' => $user,'status' => 2))->select();
		for($i=0;$i<count($tmp);$i++){
			//判断是否已还清
			//if($tmp[$i]['months'] != $tmp[$i]['donemonth']){
          		
				$tmp_ordernum = $tmp[$i]['ordernum'];
				//从还款记录查找本月是否已还款
				$Bills = D("bills");
				$initval = false;
				$tmp2 = $Bills->where(array('user' => $user,'jkorder' => $tmp_ordernum))->order("addtime Desc")->find();
                if($tmp2){
                  $initval = true;
                }
              	$successtime=date("Y-m-d",$tmp[$i]['successtime']);
				//不存在记录说明未还款
					if(!$initval){
					//判断是否为申请当月
						$tmp_time = date("m",$tmp[$i]['successtime']);
					
                      	$huankuandate = strtotime("+".$tmp[$i]['months']." day",strtotime($successtime));
						$nowdate = strtotime(date("y-m-d h:i:s"));
						$days=floor(($nowdate-$huankuandate)/86400);
						//需要还款
						$data[] = array(
                          	'id' => $tmp[$i]['id'],
                          	'status' => 0,
							'ordernum' => $tmp_ordernum,
							'money'    => $tmp[$i]['monthmoney'],
                          	'months'    => $tmp[$i]['months'],
                          	'lixi'     => $tmp[$i]['monthmoney']-$tmp[$i]['money'],
							'days'	   => $days,
                            'yuqimoney' => $tmp[$i]['monthmoney']/100*C('cfg_fuwufei')*$days,
                         	'time'	   => date("Y-m-d",strtotime("+".$tmp[$i]['months']." day",strtotime($successtime))),
							'qishu'	   => $tmp[$i]['donemonth'] + 1
						);
				}else{
                    $huankuandate = strtotime("+".$tmp[$i]['months']." day",strtotime($successtime));
						$nowdate = strtotime(date("y-m-d h:i:s"));
						$days=ceil(($nowdate-$huankuandate)/86400);
						//需要还款
						$data[] = array(
                          	 'id' => $tmp[$i]['id'],
                          	'status' => 1,
							'ordernum' => $tmp_ordernum,
							'money'    => $tmp[$i]['monthmoney'],
                          	'months'    => $tmp[$i]['months'],
                          	'lixi'     => $tmp[$i]['monthmoney']-$tmp[$i]['money'],
							'days'	   => $days,
                          	'yuqimoney' => $tmp[$i]['monthmoney']/100*C('cfg_fuwufei')*$days,
                         	'time'	   => date("Y-m-d",strtotime("+".$tmp[$i]['months']." day",strtotime($successtime))),
							'qishu'	   => $tmp[$i]['donemonth'] + 1
						);
                    }
			
		}
		$this->data = $data;
		$this->display();
	}
	//还款
	public function billinfo(){
      	$data = array('status' => 0,'msg' => '未知错误','payurl' => '');
		$user = $this->getLoginUser();
		if(!$user){
			$this->redirect('User/login');
		}
		$ordernum = I("ordernum",'','trim');
		if(!$ordernum){
			$this->redirect('Order/lists');
		}
		$Order = D("order");
		$order = $Order->where(array('ordernum' => $ordernum,'user' => $user))->find();
      	$Bills = D("bills");
		$tmp2 = $Bills->where(array('user' => $user,'jkorder' => $ordernum))->order("addtime Desc")->find();

		$successtime=date("Y-m-d",$order['successtime']);
		$huankuandate = strtotime("+".$order['months']." day",strtotime($successtime));
		$nowdate = strtotime(date("y-m-d h:i:s"));
		$days=floor(($nowdate-$huankuandate)/86400);
		if($days>0){
			$yuqimoney = $order['monthmoney']/100*C('cfg_fuwufei')*$days;
		}else{
			$yuqimoney =0;
		}
		//判断是否已还完
		if($order['donemonth'] == 1 || $tmp2['money'] >= $order['monthmoney']){
          	$data['msg'] = '该笔借款已还清!';
          	exit;
		}

		//创建支付订单
		$payordernum = neworderNum();
		$arr = array(
			'ordernum' => $payordernum,
			'user'     => $user,
			'type'	   => "还款费",
			'money'	   => $order['monthmoney']+$yuqimoney,
			'addtime'  => time(),
			'status'   => 0,
			'jkorder'  => $ordernum
		);
		$Payorder = D("payorder");
		$status = $Payorder->add($arr);
		if(!$status){
          	$data['msg'] = '创建订单失败!';
		}else{
					$data['status'] = 1;
					$data['payurl'] = U('Pay/Index/index',array('ordernum' => $payordernum));
					$data['ordernum'] = $payordernum;
					$data['price'] = $order['monthmoney']+$yuqimoney;
					$data['type']  = '还款费';
			}
		//跳转支付
		//$this->redirect('Pay/index',array('ordernum' => $payordernum));
     	$this->ajaxReturn($data);
		exit;
	}
	
}
