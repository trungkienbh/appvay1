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
	<link href="/Public/news/css/weui.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/news/css/jquery-weui.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/news/css/swiper-4.3.5.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/news/css/style.css?v1.3" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="bxb-app" class="bxb-relative">
		


		<div class="bxb-success-box ">

			<div class="weui-msg">
			  <div class="weui-msg__icon-area">
			  	<svg class="icon" aria-hidden="true">
			  	    <use xlink:href="#icon-chenggong"></use>
			  	</svg>
			  </div>
			  <div class="weui-msg__text-area">
			    <h2 class="weui-msg__title">认证成功</h2>
			     
			  </div>
			  <div class="weui-msg__opr-area">
			    <p class="weui-btn-area">
			      <a href="/index.php?m=User&a=index" class="weui-btn weui-btn_primary">会员中心</a>
			      <a href="/" class="weui-btn weui-btn_default">返回主页</a>
			    </p>
			  </div>
			  
			</div>
			
		

			
		</div>
		

		
		
	</div>

	<script type="text/javascript" src="/Public/news/js/jquery-1.11.3.min.js"></script>
	 
	<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_h0i0nzqcjgm.js"></script>
	 
</body>
</html>