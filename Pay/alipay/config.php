<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2018071160536871",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQC05EfTeoRPVQ8KO0eIbRG6fWD1fUHfdBpi6OpCILf8R9JftI/XCTdzBny1OBisshpZQxNsbqVBRpcevqtMt6MFqdQmx4Ok2fWvr74lu9sNHVAGookb0Zm8uWNpHOl6fvR2qFx8Osg49rrPG8/De9SGuvbSidW+pewbAc/Qyc0EvdYMXhxyvl7zec0mAx0reJpIuwotJphZk27RI50LsdJyPrA9y+KOYBvWULVAwEj31Z4835xpZnXwrOBUkjbNypBrlCYgVbcR6tbxbB4KBJaEiPUS7PcUEJrC7z636iLeIgJrRb//27NgYIlkYXUXYBnU/z7xwy2chrJwlwKC7ilVAgMBAAECggEBAKoT1OCm2g4JKInzMI+6FSglyGsoqS3i6QhEfDVOtA50rP0lNPT3CnaRC+ILa0+8aX+xzGpwIdqc92uF1GPeaV3izsDjaAgwkorsDzlFRnEvNVX3rjhEu2qxWCG1eGSfR1TleYeocSb1/LDMMm1XWXyP/4/23sxRDwxZiL6Dbstb5+dhXS/n37sjMCC8z6n1xA4YeRkMkl9oBFMjYVLT34B93YX4ZmH/j20SKoucRA5/Hy7v4S7YLeLmMghJulyfiyKgbg1F1qGAP5CwK8d/x/xL1KvROEzUpb2ELKAaDxF5SPlK8raiA1vrU472nJOdDGAklgYiu3nZ2zxprpYB8kUCgYEA6miNZqH2DwF9IlfxvhZoJ73jjv/AS6wySM2/ALzC0XMVOSksIRQBOwrRDBeVO0htpmPgHWaMzYv/LqQ44EP5fFZ3kSnx/FmMRlAx40V1M2VRmrzax74zShcAWaUkXAyf8QqquBaXBj4d3d2uZbKJO3LFRd6eyFj/9c6IMMpIc6sCgYEAxY3IUu6DI+xoYabXOgU3irOjKGVAMj77mpGhPYeI2JJBw9/KcUOjfjvNZw3pLyr0KkrHXhQ9XlAc8fytdxmwinlt9WlwLDV/PHVn/olNHrIrA5Lj354RHsINbAVL5c4YgLNcU3jTf2vknwctuKqd5J+AlDyDqlsbMhTXKio21v8CgYAB6PQt/+fXW3W/j+PiXqBeood2JNNWSoLmYPbLdL5JopxrqNA5PMZ9yqrFZHPM1dw+3NV4p9tB2YAsyx3DhgpEXxf+UM8t9TTVZdXiOjCoSI0Pq7ZEpmIYmnNgR54yOdAb0LBva4+zd1Ia+rFvFrNTjq3Y0eWNUFxVjmdBroREnQKBgQCxmT3fOGcS04QfTeMtWOVOvyHNvgCRa0e79HH1I7Rlpk6TLcwMORdw84g7vijE66OnpaRHsoBdGj57WYIEkUbBplqxBoH+bHWfP5knHf4Du36p7tMHBE41zZRNaRGLXdVvVk+JBxVz9uYIBWcYHeJmVvI70Y84hkETq+KnGF5GtwKBgQCqBfxjyryEsfmxGMeFZZq6ThX2nR1gSzTNlSPkDefNksWZrKAmzAvQyEjoQ8IpBHQ8q3XUUyQ+FXkYEWsiLs71D4YLfAxfY6sTKz6MNob80bHj0obKTY/hWBd9JTCYKqJVGJ1n+0Nj7CwwR4SuEAXLqHxaCuXIC24Vtu+jFPHrtg==",
		
		//异步通知地址
		'notify_url' => "http://www.wxapp.cc/Pay/alipay/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.wxapp.cc/Pay/alipay/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkEZ3CwgLwpejWo2026IczC0wzzlV4yBwYdTOPgGYZk1Q0Kya3Y7RNcFhvH9xmdvKZWtvFek9yKN1Kd0G1VR/i91A2hoFcQlg4uWcSWNlHeltaaGbXBPpYn9FtuhNtAUtsD2n7Rh7fJ2dLYWGE0Z/e/TaSPOS2N85b6mo3vzlBd9CKf9W5sYsDCjxXX8AneyLecauqw3ZUPmnLUrutWygneCXtggg7Punu0bVzQ/Tfh06WUjNUKLeIIwlmRWObdAvhE5cQifocXa4rJ1tNpFKd/PCFn9dL9dfFkY6dHpZt2nQMMvZ7q1z8sBDvpyWdA+HDDwmQxgBBJk3EacQ2hEUFQIDAQAB",
		
	
);