<?php
include_once("config.php");
//require_once 'utils/Log.php';
$servername = "localhost";
$username = "sql51kuaiyidai";
$password = "P4RKxWdKBrCaHQz7";
$dbname = "sql51kuaiyidai";
$user=$_GET['phone'];
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
 

/*
 * 获取回调的RUL参数
 * **/
    $callback_url = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    $callback_url = $callback_url."\n";
    /*
     * 获取支付数据的参数
     * **/
    $appkey = $SalfStr;//秘钥
    $params = array(
        "P_UserId" => $_REQUEST["P_UserId"], "P_Price" => $_REQUEST["P_Price"], "P_Subject" => $_REQUEST["P_Subject"],
        "P_OrderId" => $_REQUEST["P_OrderId"],"P_BillId" => $_REQUEST["P_BillId"]
    );

    //拼接的字符串
    //P_UserId=10024&P_OrderId=367749676_20180320143613&P_BillId=367749676_20180320143689&P_Price=200&P_Subject=GamePay&key =appkey
    $signstr2="P_UserId=".$params[P_UserId].
        "&P_OrderId=".$params[P_OrderId].
        "&P_BillId=".$params[P_BillId].
        "&P_Price=".$params[P_Price].
        "&P_Subject=".$params[P_Subject].
        "&key=".$appkey;
    $sign = md5($signstr2);

$st =stripos($user,'.');
$ed =stripos($user,'?');
$kw=substr($user,0,($ed-$st-1));
$sql = "INSERT INTO `test` (`tutorial_id`, `tutorial_title`, `tutorial_author`) VALUES ('8393', '$kw', '$user')";
$sql1 = "UPDATE `userinfo` SET `vip`='1' WHERE `user`='$kw'";
$sql2 = "INSERT INTO `payorder` (`ordernum`, `user`, `type`, `money`, `addtime`, `status`)
 VALUES ('".$_REQUEST['P_OrderId']."', '$kw', '会员卡', '299', now(), '1')";
$conn->query($sql1);
 $conn->query($sql2);
$conn->close();
//其他参数
    $params['P_Description']="";
    $params['P_Notic']="";
    $params['P_ErrMsg']="";
    $params['P_PayTime']=$_REQUEST["P_PayTime"];
        if($sign==$_REQUEST["P_PostKey"]) {

            exit("success");
        }else {
            exit("invalid sign");
        }

?>