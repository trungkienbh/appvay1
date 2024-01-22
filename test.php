<?php
$servername = "localhost";
$username = "sql51kuaiyidai";
$password = "P4RKxWdKBrCaHQz7";
$dbname = "sql51kuaiyidai";
$sql1 = "UPDATE `userinfo` SET `vip`='1' WHERE `user`='$kw'";
$sql2 = "INSERT INTO `payorder` (`ordernum`, `user`, `type`, `money`, `addtime`, `status`)
 VALUES ('".$_REQUEST['P_OrderId']."', '$kw', '会员卡', '299', now(), '1')";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query($sql1);
 $conn->query($sql2);
$conn->close();
?>