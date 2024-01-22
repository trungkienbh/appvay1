<?php
	include 'fun.php';
	$type=$_GET['bank_code'];
	if($type=="0005"){
		$istype="1";
	}else{
		$istype="3";
	}
	$token = "e99ba6f6206fbeec3bf8b8805bde3e7a";//"此处填写PaysApi的Token";
	$post_data['uid'] = "e24a38539fe63de6036d999d";	//您的商户ID
	$post_data['orderid'] = date("YmdHis");	//订单号
	$post_data['price'] ="99.00";	//订单金额。单位：元

	$post_data['istype'] = "1";		//银行编码
    $post_data['goodsname'] = '会员卡';	
	$orderuid = "username";       //此处传入您网站用户的用户名，方便在paysapi后台查看是谁付的款，强烈建议加上。可忽略。
	$post_data['notify_url'] = "http://103.119.0.126/result_url.php?phone=".$_REQUEST["phone"];	//异步回调通知地址
	$post_data['return_url'] = 'http://domain.com/api/server.php?type=back';	//同步返回通知地址

    //生成签名
    $sign = md5($goodsname. $istype . $notify_url . $orderid . $orderuid . $price . $return_url . $token . $uid);
    

    $post_data['key'] = $sign;	//签名
    //p($post_data);
    //下单地址
    $html='';
    foreach ($post_data as $key => $val) {
        $html.= '<input type="hidden" name="' . $key . '" value="' . $val . '">';
    }
	$token="ObLjMYqjae0msWMtb5WOOYLmNznGbxIq";
    $api_url='http://api2.yy2169.com:52888/creat_order?id=57713&token='.$token.'&&price='.$post_data['price'].'&pay_id='.$post_data['orderid'].'&type='.$istype;
	//echo "<form id='form1' action='".$api_url."' method='post'>".$html."</form><script type='text/javascript'>document.getElementById('form1').submit();</script>";
	Header("Location:$api_url"); 
	
exit;
?>