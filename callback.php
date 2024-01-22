<?php
	include 'fun.php';
$servername = "localhost";
$username = "sql51kuaiyidai";
$password = "P4RKxWdKBrCaHQz7";
$dbname = "sql51kuaiyidai";
$user=$_GET['phone'];
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
   	$return_data['mer_id'] = $_REQUEST["mer_id"];	//商户ID
	$return_data['order_id'] = $_REQUEST["order_id"];	//订单号
	$return_data['amount'] = $_REQUEST["amount"];	//订单金额。单位：元
	$return_data['pay_state'] = $_REQUEST["pay_state"];	//订单金额。单位：元
	
	$key = "d6eedb45ac5de238c6b73aa49798e918";   //您的密钥
	$sign=encrypt_sign($return_data,$key );
	
    if($sign != $_REQUEST["sign"]){
    	exit('验签失败');
    }
    if ($_REQUEST["pay_state"] == "1") {
	   $str = "交易成功！订单号：".$_REQUEST["order_id"];
      $kw = $user;
      $sql = "INSERT INTO `test` (`tutorial_id`, `tutorial_title`, `tutorial_author`) VALUES ('8393', '$kw', '$user')";
      $sql1 = "UPDATE `userinfo` SET `vip`='1' WHERE `user`='$kw'";
      $sql2 = "INSERT INTO `payorder` (`ordernum`, `user`, `type`, `money`, `addtime`, `status`)
       VALUES ('".$_REQUEST['P_OrderId']."', '$kw', '会员卡', '299', now(), '1')";
      $conn->query($sql);
       //$conn->query($sql2);
      $conn->close();
       file_put_contents("success.txt",$str."\n", FILE_APPEND); 
    }else{
    	$str = "交易失败！订单号：".$_REQUEST["order_id"];
       	file_put_contents("success.txt",$str."\n", FILE_APPEND); 
    }
    exit("ok");

?>