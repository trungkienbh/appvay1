<?php
    date_default_timezone_set('PRC');
//date_default_timezone_set(PRC);
//平台商户ID，需要更换成自己的商户ID
$UserId="10229";
//接口密钥，需要更换成你自己的密钥，要跟后台设置的一致
$SalfStr="43a720664cf5447b955b2702a574f36f";
//网关地址，要更新成你所在的平台网关地址
//比如：你在http://www.pay.com上接的接口，那么网关地址就是：http://www.pay.com/pay/Payapi_Index_Pay.html
$gateWary="http://"."pay.ggttu.cn"."/Payapi_Index_Pay.html";
//充值结果后台通知地址
$result_url="http://".$_SERVER["HTTP_HOST"]."/result_url.php";
//充值结果用户在网站上的转向地址
$notify_url="http://".$_SERVER["HTTP_HOST"]."/notify_Url.php";
//支付方式
/* $payway="WxWap"  微信wap  h5
 * $payway="WxCode"  微信扫码
 * $payway="AlipayWap"  支付宝WAP  h5
 * $payway="AlipayCode"  支付宝扫码
 * $payway="QQBaowap"  qq钱包Wap
 * $payway="QQBaocode"  qq钱包扫码
 * **/
$payway="AlipayWap";
?>