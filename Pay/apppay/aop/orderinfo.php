<?php

require_once 'AopEncrypt.php';
 $postCharset = "UTF-8";
$fileCharset = "UTF-8";
$rsaPrivateKey = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCJMjdyb+jyShzzdLZ8hWjyxl8v7s0lw1gJeaOcR3t0ry3PJH+264tr0FScdHJ2UDglxwESUNaML8n5G8YswMkTkGBj7pbcOnZb+47zkvOkV1jgXdOSDUOvtmKDm8HySSZWnSgJQTIM6P+GaNBDGoKndecpDEJMjvY7hbUe5nT0y0F1It4027cYPtdf4nGOEPazVhYIMZbl8NvOwAfi2iDzX8gmoPzPTNvHKJgSOPsxkth51dl8zYwMunEH4JbrpFoxWtJpzSvT9b8sHNqqFPkkJDYTuE9N5spsdWLJezcqQ6/YcBekHYftwYSUKdM9jUMHJeIj5ZkSBUQaFs1MLc2lAgMBAAECggEAQ1/dyt0aUKIExaozU8NQXqj8ZdWn+TuNKFoL9ttDzXGZ1XffID1cIn4UjyDAdUm/yQ2JgS0hr4ZocWUqVR/3nxvvuiOZAl3Tcih/cy5fZ/1dMBHjrH3HF6tBhdAf1pQFt9NFrgXORnjFw4QFgm6qawKDmqzigiZS1bg70gjqtqu76u5GhMUI05M9/GCn82s030aa3hy2z+iHa/BFmUQbkfIlPFMapR0/b9h2vjz0G8VYsQpxt3m0AxoNppYkoeVu7KR/SJQkjXS9s5Z8iTjnxserbfjCMiE3xzoXrp9ZOLAQmy6IPaRaRwCy3gb+NZ8DFMBJtI+QIHPw6oqbLePiAQKBgQDzvmCu2oJE+l67rHqtaFrSmQmn8CA7SK90BGgMMR0eDx2kJTPHz7AIRDJQ+NBkzIQB5Z5L2v7jpSkppBsa6fyZQG1hylWzcOl6euD3C8SJV5VmJHRyNk1iznzvc9tsEfkLaE9NxFrw2wVxo1UcshYPokvUlgJZ943CooGkj5Z1MQKBgQCQGErLvcf/UOCrIpW9Pg7ohX6Ogofuw2CntQdYtxHsopsr2ECr3YFtZuZxrkhu/94/+Enbodf7+0cTVPpnAcQgwfA1Zx+M/dwCMSs3TLEnEVnJlwjv56fVowveG1fTDIJP16rpNmSqtZ1CnOH6mLk/U8ViVwZmHGg4//x0laeStQKBgEo4SlB0EP7YDkiveJudDyrZlusgX3At7d8yCEzOF8Ozbp8xBNdvEncx7PBjE3HeJMQ/GziV8s9211XqtqY3Ycd4qtYAOqBtXWsCR8ZyOuJnXQLBTwQILQBNSBXR/ZqmzmL+3Ecd52M4DixQQ/Z88+LG1LhjBUxH6U6/FSL65iHBAoGAH0a2jWyfCYLzkRHLsKzUrZG0O5iHisKrqxs3AgGSiWtuBOFGgEdu/WEVad1raXRuODJbTaneaJpM/hw20b7nZDjUO7MrfP3pECy99Z3W4eT5OTFoRjJhEpT2UXpb4LpZWp00QrSEuyz6emf1AOC/bMhxEnxTLjzCPoUJtgB5w/UCgYEA03bavMHIt66crc1kib4WOY4iCSyDdNHvfZrpTevhf+n17Nq+UYmuKhsDqKpe4CW5QVLUiGW0TC0qrNjvbMsCgOB/W+2fxtk/V0ghraDl1IfOnsoxf6j6RXGGZ4ddeBk459ge9OPW7/ZRdyj1xnUaOd3FMItpSGO3OMN7UCWwmOA=";
                //支付订单内容
                $content = array(
                        'subject'         => $_POST['subject'],
                        'out_trade_no'    => $_POST['out_trade_no'],
                        'total_amount'    => $_POST['total_amount'],
                        'product_code'    => 'QUICK_MSECURITY_PAY',
                        'timeout_express' => '60m',
                        );

                //接口参数
                $data = array(
                        'app_id'      => '2018121862596339',
                        'biz_content' => json_encode($content),
                        'notify_url'  => 'http://47.92.102.118:3390/Pay/alipay/notify_url.php',
                        'method'      => 'alipay.trade.app.pay', 
                        'charset'     => 'utf-8',
                        'sign_type'   => 'RSA2',
                        'timestamp'   => date("Y-m-d H:i:s"),
                        'version'     => '1.0',
                        'format'      => 'json',
                        );
                //使用支付宝官方提供的方法排序并组装字符串
                $datastr = getSignContent($data);
                //使用支付宝官方提供的方法获取签名
                $sign = alonersaSign($datastr,$rsaPrivateKey,'RSA2');
                //加上签名
                $data['sign']=$sign;
                //使用官方提供的方法进行对所有一级value进行urlencode并排序组装成字符串
                $postData = getSignContentUrlencode($data);
                
                //输出结果
                echo json_encode(array("data"=>$postData));
	
	
	 function getSignContent($params) {
		ksort($params);

		$stringToBeSigned = "";
		$i = 0;
		foreach ($params as $k => $v) {
			if (false === checkEmpty($v) && "@" != substr($v, 0, 1)) {

				// 转换成目标字符集
				$v = characet($v, $postCharset);

				if ($i == 0) {
					$stringToBeSigned .= "$k" . "=" . "$v";
				} else {
					$stringToBeSigned .= "&" . "$k" . "=" . "$v";
				}
				$i++;
			}
		}

		unset ($k, $v);
		return $stringToBeSigned;
	}


	//此方法对value做urlencode
	 function getSignContentUrlencode($params) {
		ksort($params);

		$stringToBeSigned = "";
		$i = 0;
		foreach ($params as $k => $v) {
			if (false === checkEmpty($v) && "@" != substr($v, 0, 1)) {

				// 转换成目标字符集
				$v = characet($v, $postCharset);

				if ($i == 0) {
					$stringToBeSigned .= "$k" . "=" . urlencode($v);
				} else {
					$stringToBeSigned .= "&" . "$k" . "=" . urlencode($v);
				}
				$i++;
			}
		}

		unset ($k, $v);
		return $stringToBeSigned;
	}

	 function sign($data, $signType = "RSA") {
		if($this->checkEmpty($this->rsaPrivateKeyFilePath)){
			$priKey=$this->rsaPrivateKey;
			$res = "-----BEGIN RSA PRIVATE KEY-----\n" .
				wordwrap($priKey, 64, "\n", true) .
				"\n-----END RSA PRIVATE KEY-----";
		}else {
			$priKey = file_get_contents($this->rsaPrivateKeyFilePath);
			$res = openssl_get_privatekey($priKey);
		}

		($res) or die('您使用的私钥格式错误，请检查RSA私钥配置'); 

		if ("RSA2" == $signType) {
			openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
		} else {
			openssl_sign($data, $sign, $res);
		}

		if(!$this->checkEmpty($this->rsaPrivateKeyFilePath)){
			openssl_free_key($res);
		}
		$sign = base64_encode($sign);
		return $sign;
	}
/**
	 * 校验$value是否非空
	 *  if not set ,return true;
	 *    if is null , return true;
	 **/
	function checkEmpty($value) {
		if (!isset($value))
			return true;
		if ($value === null)
			return true;
		if (trim($value) === "")
			return true;

		return false;
	}
    /**
     * RSA单独签名方法，未做字符串处理,字符串处理见getSignContent()
     * @param $data 待签名字符串
     * @param $privatekey 商户私钥，根据keyfromfile来判断是读取字符串还是读取文件，false:填写私钥字符串去回车和空格 true:填写私钥文件路径 
     * @param $signType 签名方式，RSA:SHA1     RSA2:SHA256 
     * @param $keyfromfile 私钥获取方式，读取字符串还是读文件
     * @return string 
     * @author mengyu.wh
     */
	 function alonersaSign($data,$privatekey,$signType = "RSA",$keyfromfile=false) {

		if(!$keyfromfile){
			$priKey=$privatekey;
			$res = "-----BEGIN RSA PRIVATE KEY-----\n" .
				wordwrap($priKey, 64, "\n", true) .
				"\n-----END RSA PRIVATE KEY-----";
		}
		else{
			$priKey = file_get_contents($privatekey);
			$res = openssl_get_privatekey($priKey);
		}

		($res) or die('您使用的私钥格式错误，请检查RSA私钥配置'); 

		if ("RSA2" == $signType) {
			openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
		} else {
			openssl_sign($data, $sign, $res);
		}

		if($keyfromfile){
			openssl_free_key($res);
		}
		$sign = base64_encode($sign);
		return $sign;
	}

/**
	 * 转换字符集编码
	 * @param $data
	 * @param $targetCharset
	 * @return string
	 */
	function characet($data, $targetCharset) {
		
		if (!empty($data)) {
			$fileType = $fileCharset;
			if (strcasecmp($fileType, $targetCharset) != 0) {
				$data = mb_convert_encoding($data, $targetCharset, $fileType);
				//				$data = iconv($fileType, $targetCharset.'//IGNORE', $data);
			}
		}


		return $data;
	}