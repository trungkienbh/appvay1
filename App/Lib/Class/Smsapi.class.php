<?php
/*
 *		短信宝验证码发送接口类
 * 		By:www.1eh.net  本接口由 【申龙源码】 提供资源
 * 		Time:2016-12-15 21:33 
 * */
class Smsapi{
	//短信接口地址
	protected $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
	
	//发送验证码
	//成功返回0,失败返回错误代码
	public function send($number,$cont){
		$apiid = C('cfg_smssid');; //APIID
		$apikey = C('cfg_smstoken'); //APIKEY
		$sign = C('cfg_smsname'); //签名
		$post_data = "account=".$apiid."&password=".$apikey."&mobile=".$number."&content=".rawurlencode($cont)."&sign=".$sign;
		$thispost = $this->Post($post_data, $this->target);
		$gets = $this->xmlto($thispost);
		return $gets['SubmitResult']['code'];
	}
	//请求数据到短信接口，检查环境是否 开启 curl init。
	public function Post($curlPost,$url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
		$return_str = curl_exec($curl);
		curl_close($curl);
		return $return_str;
	}
	//将 xml数据转换为数组格式。
	public function xmlto($xml){
		$reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
		if(preg_match_all($reg, $xml, $matches)){
			$count = count($matches[0]);
			for($i = 0; $i < $count; $i++){
			$subxml= $matches[2][$i];
			$key = $matches[1][$i];
				if(preg_match( $reg, $subxml )){
					$arr[$key] = $this->xmlto( $subxml );
				}else{
					$arr[$key] = $subxml;
				}
			}
		}
		return $arr;
	}
	

}
