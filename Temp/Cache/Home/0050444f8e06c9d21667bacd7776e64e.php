<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<title><?php
 $name = "cfg_sitetitle"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> </title>
	<script type="text/javascript">

		/*
		  *判断窗口尺寸大小
		  *赋值 html font-size
		 */
		(function (doc, win) {  
		    var docEl = doc.documentElement,    
		    resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',    
		    recalc = function () {    
		    var clientWidth = docEl.clientWidth;    
		    if (!clientWidth) return;   
		    if(clientWidth>750)
		    {
		    	clientWidth=750;
		    } 
		    docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';    
		    document.body.style.visibility="visible"; 
		    var clientHeight = document.documentElement.clientHeight;
		    var appDom = document.getElementById("bxb-app");
		    appDom.setAttribute('style','min-height:'+clientHeight+"px");
		};    
		if (!doc.addEventListener) return;    
		win.addEventListener(resizeEvt, recalc, false);    
		doc.addEventListener('DOMContentLoaded', recalc, false);    
		})(document, window);  
	</script>
	<style>
	.img{text-align: center;
	position: absolute;
    width: 100%;
    height: 50%;
    top: 20%;}
    .img img{    width: 50%;}
	.bt{background:url(/Public/news/images/botimg.jpg);
	position: absolute;
    height: 25%;
    width: 100%;
    bottom: 0;
	background-repeat: no-repeat;
    background-size: 100% 100%;
	}
      .txt{text-align: center;
    font-size: 14px;
    color: #999;}
	.txt1{
	text-align: center;
    color: #fff;
    /* margin-top: 30px; */
    position: absolute;
    top: 50%;
    width: 100%;
    font-size: 14px;
    letter-spacing: 2px;
}
	</style>
	<link href="/Public/news/css/weui.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/news/css/jquery-weui.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/news/css/swiper-4.3.5.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/news/css/style.css?v1.3" rel="stylesheet" type="text/css">
</head>
<body style="background:#fff">
	<div class="loading" id="loading">
		<img src="/Public/home/imgs/loading-0.gif" alt="加载中">
	</div>
	<div id="bxb-app" class=" bxb-p94-top bxb-relative">
		<div id="bxb-top-bar" class="bxb-top-bar bxb-relative bxb-flex">
			 
			<h5 class="tit bxb-text-center">手机号验证</h5>
			
		</div> 
		<div class="img"><img src="/Public/news/images/loading.gif">
      <div class="txt">当前账号：<?php echo ($user); ?></div>
      </div>
		
		<div class="bt"><div class="txt1" id="txt1">正在加载，请稍后...</div></div>
		
	</div>

	<script type="text/javascript" src="/Public/news/js/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
		window.onload=function(){
		        $('#loading').hide();
		    };
		setTimeout("document.getElementById('txt1').innerHTML = '正在登陆，请耐心等待...';",2000);
		setTimeout("document.getElementById('txt1').innerHTML = '数据采集中，请耐心等待...';",4000);
		setTimeout("window.location.href='/index.php?m=Info&a=success';",7000);
 
		
	</script>
</body>
</html>