<?php

require_once 'AopEncrypt.php';
 $postCharset = "UTF-8";
$fileCharset = "UTF-8";
$rsaPrivateKey = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC/yHgwFnDrGLhM6eqbU0uDqVhiqgaxhsiCN9cNcslpijAtyx1jVanfbdFFch2gLo8NrLHA4ioAOJg9w0CUVDDtsiXLSeUfvJsJpJlo8QC6mz1KB3CPz0C179GxTIUcA54oh6XMqne6LC34PsTCfp6Z/LK7L8zrWkUofWFYwdmOa4AMYJgVk8C7d0X3xbBFfZv9N4ZOmPYtVbN25wF9etXC9KoVvO/7QMaBK/t45Y8nCaTzIZBvtWfLODmr6686aKHXNZgFeXd2jVPfq9GXXRsni8dBBmLFGvl0ZjiCS2tsHnwuNPSvNSF9YGyHhKi8O37/FAqbh+q57C0eQhd7QVzRAgMBAAECggEAR3DI/LjPVXQ+6z/TygqMPb5uk0pc9fKMbJ2aeYMB7lOwwM5B40f84KMK6sCosovFdEWZbY2SMcTjSVabjuWR2GmdVI3xURIz+rKbBxGHwPulKBd/YcLFi0CLr20exKHAX76wD36M3QgqE6hmKUF7mUcd2UbkIePdkUirY6HKhhd2ZOq/C6ultp7pYnYU2H4g82Ny84bTJlAX4fd6OHMT40BCxxsPITowjygnDvBqIZ/d2u6HOe9nBsMVNYPI+Iv2AuXz2YN8BIuQUS+jfv+Hi2BJoRaDDK/7hf+aYdAXTwzPT3tUV4MEjTcWepcxQeMppLDDS7oWROWj1PcstvSGZQKBgQDfKGYQpXR0XhMkeXH3UUT9qCwNdpigsN83sZJnJKu41pT7o9hB/9lFchsnXTAH4drWLxlQz8onkgaZN4VxOX9u5pE55LXFQwzzkdS8ooIopn3pvbszr+EskYDNRl75VyzIsreaRj2l+YBgR3a+SPoHy9psLUbsWN0CZzwvJW8PswKBgQDcAgJ6XibwUGG1Xb3RnI6BpaCPvvO7ntg2hOuc6rNc6CLBlsEI1OVEf1AvG04/uO4CIR1FkMUvsgZ/TS5VyGbD/KDQxNa5Fx6it0TgOZ+kXKB2aJAWYBN4k8wclUWOZKNdg2kYfB8L2v+apVrKt9TH6f7dX9IiKIS9vF74aMR/awKBgQCGZCHzbHERk4YbtTe5JaxSxnChOwb33wzO0ZXFoAP6sN/QHAAk3xvOAsXvkuNWG+JaksrALCMmaX6nzxQB+AqSkzBqmR4Oyi6GkRB4+bVBHeM+XRDcM9N7r7TN6s9PgfxqcZa4xgxiZDu3v9H3DqPlBhNoimvn8ixHQjywd+7GmQKBgH+zSuzsKX3jqlMzjjJUxQLLuF63X5HPqYA7tubl9CZBN6tWbcVKjaksnMY6+zhRhxUFU5BFb683jj3l9rckE0I/KLkFB/13Rfj8l6XuzJMCkMEqADh8m9CpORh+LFlyYMCuvhnQMdUX0LVatVBlU8SWNbEZJUdebW4UIKvfY+7xAoGAObwb9VDvEzoko96Jlf1WyrZgXW4Sj4H7qJ33bSZAc6/w3Yn9GXFCa5hwNeNiTO9ctcjuAC15azq4JN0mYbv7Pl0I4IrkJO/siyW7OslnqgmYUZViWxLw8BuRjO8JYZ6vH/cqqCFb5DqI2HTz8rEG1OGbKV5Pmh4Q9YPPdICN9pg=";
                //支付订单内容
                $content = array(
                        'subject'         => '审核费用',
                        'out_trade_no'    => $_POST['out_trade_no'],
                        'total_amount'    => $_POST['total_amount'],
                        'product_code'    => 'QUICK_MSECURITY_PAY',
                        'timeout_express' => '60m',
                        );

                //接口参数
                $data = array(
                        'app_id'      => '2018051460157556',
                        'biz_content' => json_encode($content),
                        'notify_url'  => 'http://122.114.75.130:3390/Pay/alipay/notify_url.php',
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