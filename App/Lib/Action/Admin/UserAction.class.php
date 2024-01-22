<?php
class UserAction extends CommonAction{
	
	//用户列表
	public function index(){
		$this->title = "用户管理";
		$keyword = I("keyword",'','trim');
		$this->keyword = $keyword;
		$where = array();
		if($keyword){
			$where['phone'] = array('like',"%{$keyword}%");
		}
		$User = D("user");
		import('ORG.Util.Page');
		$count = $User->where($where)->count();
		$Page  = new Page($count,25);
		$Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
		$show  = $Page->show();
		$list = $User->where($where)->order('addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->list = $list;
		$this->page = $show;
		$this->display();
	}
	
	//允许/禁止用户登录
	public function status(){
		$this->title = "更改用户状态";
		$id = I("id",0,'trim');
		if(!$id){
			$this->error("参数错误!");
		}
		$User = D("user");
		$info = $User->where(array('id' => $id))->find();
		if(!$info){
			$this->error("用户不存在!");
		}
		$newstatus = empty($info['status'])?1:0;
		$status = $User->where(array('id' => $id))->save(array('status' => $newstatus));
		if(!$status){
			$this->error("操作失败!");
		}
		$this->success("变更用户状态成功!");
	}
	
	//删除用户
	public function del(){
        $this->title='删除用户';
        $id = I('id',0,'trim');
      	$member = I('user',0,'trim');
        if(!$id){
            $this->error("参数有误!");
        }
        $User = D("user");
        $status = $User->where(array('id' => $id))->delete();
      	$Userinfo = D("userinfo");
        $status1 = $Userinfo->where(array('user' => $member))->delete();
        if(!$status){
            $this->error("删除失败!");
        }
        $this->success("删除用户成功!");
	}

	
	
	//修改用户密码
	public function changepass(){
		$data = array('status' => 0,'msg' => '未知错误');
        $id = I('post.id',0,'trim');
		$pass = I("post.pass",'','trim');
        if(!$id || !$pass){
            $data['msg'] = "参数有误!";
        }else{
        	$User = D("user");
			$pass = sha1(md5($pass));
			$status = $User->where(array('id' => $id))->save(array('password' => $pass));
			if(!$status){
				$data['msg'] = "操作失败!";
			}else{
				$data['status'] = 1;
			}
        }
		$this->ajaxReturn($data);
	}
  //修改推荐数
	public function changenum(){
		$data = array('status' => 0,'msg' => '未知错误');
        $id = I('post.id',0,'trim');
		$num = I("post.num",'','trim');
        if(!$id || !$num){
            $data['msg'] = "参数有误!";
        }else{
        	$User = D("user");
			$status = $User->where(array('id' => $id))->save(array('num' => $num));
			if(!$status){
				$data['msg'] = "操作失败!";
			}else{
				$data['status'] = 1;
			}
        }
		$this->ajaxReturn($data);
	}
	//查看用户资料
	public function userinfo(){
		$this->title = "查看用户资料";
		$user = I("user",'','trim');
		if(!$user){
			$this->error("参数错误!");
		}
		$Userinfo = D("userinfo");
		$info = $Userinfo->where(array('user' => $user))->find();
		$this->baseinfo = $info;
		$Otherinfo = D("Otherinfo");
		$info = $Otherinfo->where(array('user' => $user))->find();
		$info = json_decode($info['infojson']);
		$this->otherinfo = $info;
		$this->display();
	}
	//查看推荐
	public function inviteInfo(){
		$this->title = "推荐列表";
		$user = $_GET['user'];
		//echo $user;exit;
		if(!$user){
			$this->error("参数错误!");
		}
		$U = D("user");
        $users = $U->where(array('invitor' => $_GET['user']))->select("phone");
        $users = $U->query(
            "select u.phone, ui.name from `user` u  left join userinfo ui on ui.`user` = u.phone  where u.invitor='".$_GET['user']."'"
        );
        $this->users = $users;
		$this->display();
	}
	
	
}
