<?php
class InfoAction extends CommonAction{
	private $userinfo;
	function _initialize(){
		$user = $this->getLoginUser();
		if(!$user){
			$this->redirect('User/login');
		}
		$Userinfo = D("userinfo");
		$info = $Userinfo->where(array('user' => $this->getLoginUser()))->find();
		if(!$info){
			$infoid = $Userinfo->add(array('user' => $this->getLoginUser()));
			$info = array('id' => $infoid,'user' => $this->getLoginUser());
		}
		$this->userinfo = $info;
	}
	  public function loading(){
		//判断是否已登录
		$user = $this->getLoginUser();
		$this->user = $user;
		if(!$user){
			$this->redirect('User/login');
		}
		$this->display();
	}
	public function index(){
		$Userinfo = D("userinfo");
		$info = $Userinfo->where(array('user' => $this->getLoginUser()))->find();
		$arr = array(
			'baseinfo' => 0,
			'unitinfo' => 0,
			'bankinfo' => 0,
			'zhimainfo'=> 0,
			'workinfo'=> 0,
			'moreinfo'=> 0,
			'wechat'   => 0,
			'quota'   => 0,
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
		if($info['dwname'] && $info['dwaddess_ssq'] && $info['dwaddess_more'] && $info['workyears'] && $info['dwysr']){
			$arr['workinfo'] = 1;
		}
		if($info['alipay'] && $info['wechat'] && $info['email'] && $info['position']){
			$arr['moreinfo'] = 1;
		}
		if($info['bankcard'] && $info['bankname']){
			$arr['bankinfo'] = 1;
		}
		if($info['phone']){
			$arr['phoneinfo'] = 1;
		}
      	if($info['creditinfo']){
			$arr['creditinfo'] = 1;
		}
		if($info['cardphoto_3'] ){
			$arr['otherinfo'] = 1;
		}
		if($arr['baseinfo'] ==1)
		{
			$arr['quota'] = "8000";
		}
		if($arr['baseinfo'] ==1 && $arr['unitinfo'] == 1 && $arr['phoneinfo'] ==1){
			$arr['quota'] = "10000";
		}
		if($arr['baseinfo'] ==1 && $arr['unitinfo'] == 1 && $arr['phoneinfo'] ==1 && $arr['workinfo']==1 && $arr['moreinfo'] == 1){
			$arr['quota'] = "15000";
		}
		if($arr['baseinfo'] ==1 && $arr['unitinfo'] == 1 && $arr['phoneinfo'] ==1 && $arr['workinfo']==1 && $arr['moreinfo'] == 1 && $info['vip'] == 1){
			$arr['quota'] = "20000";
		}
		$this->info = $arr;
		$this->display();
	}
	public function inviteInfo(){
      	$user = $this->getLoginUser();
        $U = D("user");
        $users = $U->where(array('phone' => $user))->find();
		$where = "a.invitor='".$this->getLoginUser()."' and b.status=1 and b.type='会员卡'";
		$count =  M("`user` as a")->join("payorder as b on b.user = a.phone")->where($where)->count();
		$this->count1 = $count+ $users['num'];
     	$this->user = $user;
      	$this->money = $users['money'];
        $this->display();
    }
	//身份信息
	//姓名、身份证号码、住址
	public function baseinfo(){
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$Userinfo = D("userinfo");
			$status = $Userinfo->where(array('user' => $this->getLoginUser()))->save($_POST);
			if(!$status){
				$data['msg'] = "操作失败";
			}else{
				$data['status'] = 1;
			}
			$this->ajaxReturn($data);
			exit;
		}
		$this->assign("userinfo",$this->userinfo);
		$this->display();
	}

	//单位信息
	public function unitinfo(){
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$Userinfo = D("userinfo");
			$status = $Userinfo->where(array('user' => $this->getLoginUser()))->save($_POST);
			if(!$status){
				$data['msg'] = "操作失败";
			}else{
				$data['status'] = 1;
			}
			$this->ajaxReturn($data);
			exit;
		}
		$this->assign("userinfo",$this->userinfo);
		$this->display();
	}
	//更多
	public function moreinfo(){
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$Userinfo = D("userinfo");
			$status = $Userinfo->where(array('user' => $this->getLoginUser()))->save($_POST);
			if(!$status){
				$data['msg'] = "操作失败";
			}else{
				$data['status'] = 1;
			}
			$this->ajaxReturn($data);
			exit;
		}
		$this->assign("userinfo",$this->userinfo);
		$this->display();
	}
	//更多
	public function workinfo(){
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$Userinfo = D("userinfo");
			$status = $Userinfo->where(array('user' => $this->getLoginUser()))->save($_POST);
			if(!$status){
				$data['msg'] = "操作失败";
			}else{
				$data['status'] = 1;
			}
			$this->ajaxReturn($data);
			exit;
		}
		$this->assign("userinfo",$this->userinfo);
		$this->display();
	}

	//银行卡信息
	public function bankinfo(){
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$bankcard = I("bankcard",0,'trim');
			if(strlen($bankcard) < 16 || strlen($bankcard) > 20){
				$data['msg'] = "不是有效的银行卡号!";
			}else{
				$Userinfo = D("userinfo");
				$status = $Userinfo->where(array('user' => $this->getLoginUser()))->save($_POST);
				if(!$status){
					$data['msg'] = "操作失败";
				}else{
					$data['status'] = 1;
				}
			}
			$this->ajaxReturn($data);
			exit;
		}
		$this->assign("userinfo",$this->userinfo);
		$this->display();
	}
	//信用卡认证
	public function creditinfo(){
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$creditinfo = I("creditinfo",0,'trim');
			
				$Userinfo = D("userinfo");
				$status = $Userinfo->where(array('user' => $this->getLoginUser()))->save($_POST);
				if(!$status){
					$data['msg'] = "操作失败";
				}else{
					$data['status'] = 1;
				}
			
			$this->ajaxReturn($data);
			exit;
		}
		$this->assign("userinfo",$this->userinfo);
		$this->display();
	}
	//芝麻信用授权确认
	public function zhimastepone(){
		$userinfo = $this->userinfo;
		if($userinfo['alipay']){
			$this->redirect('Info/index');
		}
		$this->display();
	}
	
	//芝麻信用授权
	public function zhimasteptwo(){
		$userinfo = $this->userinfo;
		if($userinfo['alipay']){
			$this->redirect('Info/index');
		}
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$code = I("code",'','trim');
			if(strlen($code) != 6){
				$data['msg'] = "短信验证码输入有误";
			}else{
				//判断验证码是否正确
				$Smscode = D("smscode");
				$info = $Smscode->where(array('phone' => $userinfo['user']))->order("sendtime desc")->find();
				if(!$info || $info['code'] != $code){
					$data['msg'] = "短信验证码输入有误";
				}elseif( (time()-30*60) > $info['sendtime']){
					$data['msg'] = "验证码已过期,请重新获取!";
				}else{
					$Userinfo = D("userinfo");
					$status = $Userinfo->where(array('user' => $userinfo['user']))->save(array('alipay' => '1'));
					if($status){
						$data['status'] = 1;
					}else{
						$data['msg'] = "授权失败!";
					}
				}
			}
			$this->ajaxReturn($data);
			exit;
		}
		$str = substr($userinfo['user'],0,3);
		$phone = $str;
		$str = substr($userinfo['user'],7,4);
		$phone .= '****' . $str;
		$this->phone = $phone;
		$this->assign("userinfo",$this->userinfo);
		$this->display();
	}

	public function otherinfo(){
		$Otherinfo = D("otherinfo");
		if(IS_POST){
			$otherinfo = $_POST['otherinfo'];
			if(empty($otherinfo)) $otherinfo = array();
			$str = json_encode($otherinfo);
			$status = $Otherinfo->where(array('user' => $this->getLoginUser()))->find();
			if(!$status){
				$Otherinfo->add(array(
					'user' => $this->getLoginUser(),
					'infojson' => $str,
					'addtime' => time()
				));
			}else{
				$Otherinfo->where(array('user' => $this->getLoginUser()))->save(array('infojson' => $str));
			}
			exit;
		}
		$tmp = $Otherinfo->where(array('user' => $this->getLoginUser()))->find();
		$tmp = json_decode($tmp['infojson']);
		$data = array();
		for($i=0;$i<count($tmp);$i++){
			$data[$i]['sid'] = $i;
			$data[$i]['imgurl'] = $tmp[$i];
		}
		$this->data = $data;
		$this->display();
	}
	
	
	public function wechat(){
		$userinfo = $this->userinfo;
		if($userinfo['alipay']){
			$this->redirect('Info/index');
		}
		$code = I("code",'','trim');
		if($code && substr($code,0,1) == 'a'){
			$Userinfo = D("userinfo");
			$Userinfo->where(array('user' => $this->getLoginUser()))->save(array('wechat' => 1));
		}
		$this->redirect('Info/index');
	}
	
	
	public function phoneinfo(){
		$userinfo = $this->userinfo;
		
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$code = I("code",'','trim');
			$pass = I("pass",'','trim');
			if(!$code){
				$data['msg'] = "请输入正确的验证码!";
			}else{
				if(!$pass){
					$data['msg'] = "请输入正确的服务密码!";
				}elseif(md5($code) != $_SESSION['verify']){
					$data['msg'] = "图形验证码错误!";
				}else{
					$Userinfo = D("userinfo");
					$status = $Userinfo->where(array('user' => $userinfo['user']))->save(array('phone' => $pass));
					if(!$status){
						$data['msg'] = "操作失败!";
					}else{
						$data['status'] = 1;
					}
				}
			}
			$this->ajaxReturn($data);
			exit;
		}
		$this->assign("userinfo",$userinfo);
		$this->display();
	}

	
}
