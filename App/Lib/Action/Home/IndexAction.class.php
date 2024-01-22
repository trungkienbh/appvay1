<?php
class IndexAction extends CommonAction{
	
    public function index(){
    	$Article = D("article");
		$tmparr = array();
		$tmparr = $Article->where(array('cid' => 29))
							 ->order("sort Desc")
							 ->limit(3)
							 ->select();
			 
			$this->article = $tmparr;
    	$user = $this->getLoginUser();
    	if(!$user) $user = 0;
		$this->user = $user;
        $this->display();
    }
}