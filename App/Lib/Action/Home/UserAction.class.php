<?php
class UserAction extends CommonAction{
	
	public function index(){
		//判断是否已登录
		$user = $this->getLoginUser();
		
		if(!$user){
			$this->redirect('User/login');
		}
      	$this->user = $user;
      	$Userinfo = D("userinfo");
		$info = $Userinfo->where(array('user' => $this->getLoginUser()))->find();
      	if($info['bankcard'] && $info['bankname']){
			$bankinfo = 1;
		}else{
        	$bankinfo = 0;
        }
      	if($info['name'] && $info['usercard'] && $info['cardphoto_1'] && $info['cardphoto_2'] && $info['cardphoto_4']){
                $baseinfo = 1;
            }else{
         	 $baseinfo = 0;
         }
      	$this->baseinfo = $baseinfo;
      	$this->bankinfo = $bankinfo;
		$this->display();
	}
	public function paysuccess(){
		//判断是否已登录
		$user = $this->getLoginUser();
		$this->user = $user;
		if(!$user){
			$this->redirect('User/login');
		}
		$this->display();
	}
	//购买VIP
	public function buyvip(){
		//判断是否已登录
		$user = $this->getLoginUser();
		if(!$user){
			$this->redirect('User/login');
		}
		$ordernum = $_REQUEST['order_no'];
		$arr = array(
				'ordernum' => $ordernum,
				'type'	   => '会员卡',
				'money'	   => C('cfg_shenhefei'),
				'addtime'  => time(),
				'status'   => 1,
				'user'	   => $this->getLoginUser()
			);
			$Payorder = D("payorder");
			$status = $Payorder->add($arr);
		$Userinfo = D("userinfo");
		$status = $Userinfo->where(array('user' => $user))->save(array('vip' => 1));
		if($status){
			$this->redirect('User/paysuccess');
		}else{
          
			$this->redirect('User/vip');
		}
	}
	//VIP
	public function vip(){
     
		//判断是否已登录
		$user = $this->getLoginUser();
		if(!$user){
			$this->redirect('User/login');
		}
		//创建订单
			$ordernum = neworderNum();
			$this->ordernum = $ordernum;
			
			
		$Userinfo = D("userinfo");
		$info = $Userinfo->where(array('user' => $user))->find();
		if(!$info){
			$this->redirect('User/index');
		}else{
          $this->assign("user",$user);
			$this->vipinfo = $info['vip'];
		}
		$this->display();
	}
	
	//用户登录
	public function login(){
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$type = I("type","pass",'trim');
			if($type == "pass"){//密码方式登录
				$password = I("password",'','trim');
				$phone = I("phone",'','trim');
				if(!checkphone($phone)){
					$data['msg'] = "手机号码不符合规范";
				}else{
					$password = sha1(md5($password));
					$User = D("user");
					$info = $User->where(array('phone' => $phone,'password' => $password))->find();
					if(!$info){
						$data['msg'] = "帐户名或密码错误";
					}else if($info['status'] != 1){
						$data['msg'] = "该账户已被禁止登录!";
					}else{
						$this->setLoginUser($phone);
						$data['status'] = 1;
					}
				}
			}else{//短信验证码登录
				$phone = I("phone",'','trim');
				$code = I("code",'','trim');
				$User = D("user");
				$Smscode = D("smscode");
				//判断手机号
				if(!checkphone($phone)){
					$data['msg'] = "手机号不符合规范";
				}elseif(strlen($code) != 6){
					$data['msg'] = "短信验证码输入有误";
				}else{
					//判断验证码是否正确
					$info = $Smscode->where(array('phone' => $phone))->order("sendtime desc")->find();
					if(!$info || $info['code'] != $code){
						$data['msg'] = "短信验证码输入有误";
					}elseif( (time()-30*60) > $info['sendtime']){
						$data['msg'] = "验证码已过期,请重新获取!";
					}else{
						//判断用户是否存在
						$count = $User->where(array('phone' => $phone))->count();
						if(!$count){
							$data['msg'] = "用户不存在,请先注册!";
						}else{
							$this->setLoginUser($phone);
							$data['status'] = 1;
						}
					}
				}
			}
			$this->ajaxReturn($data);
			exit;
		}
		//判断是否已登录
		if($this->getLoginUser()){
			$this->redirect('Index/index');
		}
		$this->display();
	}
	
	//注销登陆
	public function logout(){
		$this->setLoginUser('');
		$this->redirect('User/login');
	}
	
	//用户注册
	public function signup(){
		if(IS_POST){
			$User = D("user");
			$data=array('status' => 0,'msg' => '未知错误');
			$password = I("password",'','trim');
			//$code = I("code",'','trim');
			$phone = I("phone",'','trim');
			$invitor = I("invitor",'','trim');
			//再次验证手机号
			if(!checkphone($phone)){
				$data['msg'] = "手机号不符合规范!";
			}elseif(strlen($password) < 6 || strlen($password) > 16){
				$data['msg'] = "请输入6-16位密码!";
			}else{
				$count = $User->where(array('phone' => $phone))->count();
				if($count){
					$data['msg'] = "手机号已注册,请登录!";
					$this->ajaxReturn($data);exit;
				}
				//验证短信验证码
				//$Smscode = D("Smscode");
				//$info = $Smscode->where(array('phone' => $phone))->order("sendtime desc")->find();
				//if(!$info || $info['code'] != $code){
				//	$data['msg'] = "短信验证码有误!";
				//}elseif( (time()-30*60) > $info['sendtime']){
				//	$data['msg'] = "验证码过时,请重新获取!";
				//}else{
				//	
				//}
				$password = sha1(md5($password));
					$arr = array(
						'phone' => $phone,
						'password' => $password,
						'invitor' => $invitor,
						'addtime' => time()
					);
					$uid = $User->add($arr);
					if($uid){
						//设置当前登录用户
						$this->setLoginUser($phone);
						$data['status'] = 1;

						//云签用户注册
                       // $this->regYqUser($uid, $phone);
					}else{
						$data['msg'] = "注册账户失败!";
					}
			}
			$this->ajaxReturn($data);
			exit;
		}
		//判断是否已登录
		if($this->getLoginUser()){
			$this->redirect('Index/index');
		}
		$this->display();
	}
	
	//发送验证码
	public function sendsmscode(){
		$data = array('status' => 0);
		$phone = I("phone",'','trim');
		$type = I("type","login",'trim');
		if($type == "reg"){
			$User = D("user");
			$count = $User->where(array('phone' => $phone))->count();
			if($count){
				$data['msg'] = "手机号已注册,请登录!";
				$this->ajaxReturn($data);exit;
			}
		}
		$verifycode = I("verifycode",'','trim');
		if(!checkphone($phone)){
			$data['msg'] = "手机号不规范";
		}else{
			if($_SESSION['verify'] != md5($verifycode) && $type != "zhima"){
				$data['msg'] = "图形验证码错误";
			}else{
				//判断发送次数
				$Maxcount = C('cfg_smsmaxcount');
				$Maxcount = intval($Maxcount);
				if(!$Maxcount){
					$Maxcount = 500;
				}
				$todaytime = strtotime(date("Y-m-d"));
				$Code = D("smscode");
				$where = array();
				$where['phone'] = $phone;
				$where['sendtime'] = array('GT',$todaytime);
				$count = $Code->where($where)->count();
				
					$where = array(
						'sendtime' => array('GT',time()-60)
					);
					 
					 
						/*import("@.Class.Smsapi");
						$Smsapi = new Smsapi();*/
						$smscode = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
						//写入验证码记录
						$Code->add(array(
							'phone'    => $phone,
							'code'     => $smscode,
							'sendtime' => time()
						));
      /*$contstr = "您的验证码是：".$smscode."。请不要把验证码泄露给其他人。";
      $status    = $Smsapi->send($phone,$contstr);*/
      //$status  = 0;
	      $content   = '【汉声易借】您的验证码为'.$smscode.'，在3分钟内有效';//模板
	      $result    = $this->dxb($phone,$content);
						if($result){
							$data['status'] = 1;
						}else{
              $data['status'] = 0;
							$data['msg'] = "验证码发送失败!";
						}
					 
				
			}
		}
		$this->ajaxReturn($data);
	}

	public function dxb($phone,$content){
	  $u = '13073007446';
	  $p = md5('16881688');
	  $api = 'http://api.smsbao.com/sms?u='.$u.'&p='.$p.'&m='.$phone.'&c='.urlencode($content);
	  $c = file_get_contents($api);
	  if($c==0){
	    return true;
    }else{
	    return false;
    }
  }

	//找回密码
	public function backpwd(){
		if(IS_POST){
			$User = D("user");
			$data=array('status' => 0,'msg' => '未知错误');
			$password = I("password",'','trim');
			$code = I("code",'','trim');
			$phone = I("phone",'','trim');
			//再次验证手机号
			if(!checkphone($phone)){
				$data['msg'] = "手机号不符合规范!";
			}elseif(strlen($password) < 6 || strlen($password) > 16){
				$data['msg'] = "请输入6-16位密码!";
			}else{
				$count = $User->where(array('phone' => $phone))->count();
				if(!$count){
					$data['msg'] = "该账户还没有注册,请先注册!";
					$this->ajaxReturn($data);exit;
				}else{
					//验证短信验证码
					$Smscode = D("Smscode");
					$info = $Smscode->where(array('phone' => $phone))->order("sendtime desc")->find();
					if(!$info || $info['code'] != $code){
						$data['msg'] = "短信验证码有误!";
					}elseif( (time()-30*60) > $info['sendtime']){
						$data['msg'] = "验证码过时,请重新获取!";
					}else{
						$password = sha1(md5($password));
						$arr = array('password' => $password);
						$status = $User->where(array('phone' => $phone))->save($arr);
						if($status){
							$data['status'] = 1;
						}else{
							$data['msg'] = "修改密码失败!";
						}
					}
				}
			}
			$this->ajaxReturn($data);
		}
		$this->display();
	}

	//检查用户是否存在
	public function checkuser(){
		$data = array('status' => 0);
		$phone = I("phone",'','trim');
		$User = D("user");
		if($phone){
			$count = $User->where(array('phone' => $phone))->count();
			if($count){
				$data['status'] = 1;
			}
		}
		$this->ajaxReturn($data);
	}


}
