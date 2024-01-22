<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<title>易好贷</title>
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
	<link href="__PUBLIC__/news/css/weui.min.css" rel="stylesheet" type="text/css">
	<link href="__PUBLIC__/news/css/jquery-weui.min.css" rel="stylesheet" type="text/css">
	<link href="__PUBLIC__/news/css/swiper-4.3.5.min.css" rel="stylesheet" type="text/css">
	<link href="__PUBLIC__/news/css/style.css?v1.3" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="bxb-app" class=" bxb-p94-top bxb-relative">
		<div id="bxb-top-bar" class="bxb-top-bar bxb-relative bxb-flex">
			<a href="javascript:void(0);" onClick="javascript:history.back(-1);" class="btn pull-left bxb-text-left pic">
				<svg class="icon" aria-hidden="true">
				    <use xlink:href="#icon-iconfont0104"></use>
				</svg>
			</a>
			<h5 class="tit bxb-text-center">设置</h5>
			
		</div>

		<div class="bxb-setup-box">


			<div class="weui-cells">
			  <a class="weui-cell weui-cell_access" href="<?php echo U('User/backpwd');?>">
			    <div class="weui-cell__bd">
			      <p>
			      <svg class="icon" aria-hidden="true">
	    		    <use xlink:href="#icon-ai-password"></use>
	    		  </svg>
			      修改密码</p>
			    </div>
			    <div class="weui-cell__ft">
			    </div>
			  </a>
			</div>

			<div class="bxb-form-btn bxb-m50-top w70 bxb-margin-center">
				<a href="<?php echo U("User/logout");?>" class="weui-btn weui-btn_primary">退出登录</a>
			</div>
		</div>
		

		
		
	</div>

	<script type="text/javascript" src="__PUBLIC__/news/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/jquery-weui.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/swiper-4.3.5.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/city-picker.min.js"></script>
	<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_6w2wi1gbczu.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/js.js"></script>

	

</body>



</html>