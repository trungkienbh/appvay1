<?php
class PayorderAction extends CommonAction{
	
	//订单状态
	public function index(){
		$this->title = "订单状态";
		$keyword = I("keyword",'','trim');
		$this->keyword = $keyword;
		$where = array();
		if($keyword){
			$where['ordernum'] = $keyword;
		}
		$Payorder = D("payorder");
		import('ORG.Util.Page');
		$count = $Payorder->where($where)->count();
		$Page  = new Page($count,25);
		$Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
		$show  = $Page->show();
		$list = $Payorder->where($where)->order('addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->list = $list;
		$this->page = $show;
		$this->display();
	}
	//修改订单状态
	public function changestatus(){
		$id = I("id",0,'trim');
		$status = I("status");
		$payOrder = D("payorder");
		$status = $payOrder->where(array('id' => $id))->save(array('status' => $status));
		if($status){
			$data['status'] = 1;
		}else{
			$data['status'] = 0;
		}
		 $this->ajaxReturn($data,'JSON');
	}
	//删除订单
	public function del(){
        $this->title='删除订单';
        $id = I('id',0,'trim');
        if(!$id){
            $this->error("参数有误!");
        }
        $Payorder = D("payorder");
        $status = $Payorder->where(array('id' => $id))->delete();
        if(!$status){
            $this->error("删除失败!");
        }
        $this->success("删除订单成功!");
	}
	
	
	
}
