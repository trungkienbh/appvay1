<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<title><?php
 $name = "cfg_sitetitle"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?></title>
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
	
	<link href="/Public/news/css/style.css?v1.3" rel="stylesheet" type="text/css">
</head>
<body>
	  <div class="loading" id="loading">
		<img src="/Public/home/imgs/loading-0.gif" alt="加载中">
	</div>
	<div id="bxb-app" class=" bxb-p94-top bxb-relative">
		<div id="bxb-top-bar" class="bxb-top-bar bxb-relative bxb-flex">
			<a href="javascript:void(0);" onClick="javascript :history.back(-1);" class="btn pull-left bxb-text-left pic">
				<svg class="icon" aria-hidden="true">
				    <use xlink:href="#icon-iconfont0104"></use>
				</svg>
			</a>
			<h5 class="tit bxb-text-center">更多认证</h5>
			
		</div>

		<div class="bxb-cardHk-box ">

			<div class="bxb-form-box">
				 
				<div class="weui-cells weui-cells_form">
					
				    <div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-zhifubao"></use>
								</svg>
				        		支付宝号
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" id="alipay" value="<?php echo ($userinfo["alipay"]); ?>" type="text" placeholder="支付宝号">
			    		</div>
					</div>

					<div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-icon"></use>
								</svg>
				        		微信账号
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" id="wechat" value="<?php echo ($userinfo["wechat"]); ?>" type="text" placeholder="微信账号">
			    		</div>
					</div>

					<div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-qq"></use>
								</svg>
				        		QQ账号
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" id="position" value="<?php echo ($userinfo["position"]); ?>" type="tel" placeholder="QQ账号">
			    		</div>
					</div>

					<div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-youxiang"></use>
								</svg>
				        		常用邮箱
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" id="email" value="<?php echo ($userinfo["email"]); ?>" type="email" placeholder="常用邮箱">
			    		</div>
					</div>

				</div>
			</div>


			<div class="bxb-certification-note bxb-p30">
				<p>1.请填写真实信息利于快速通过审核</p>
				<p>2.您提交的所有信息我们都将严格保密</p>
			</div>
			
			
			<div class="bxb-form-btn ">
				<input type="submit" class="weui-btn weui-btn_primary" onclick="saveInfo()" id="btn" value="提交">
			</div>

			
		</div>
		

		
		
	</div>
<!-- 提示 -->
		<div style="display: none;position: absolute;" class="errdeo" id="messageBox">
		</div>	
	<script type="text/javascript" src="/Public/news/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_vsa9f4kgzz.js"></script>
<script>
function showalert(msg){
	$("#messageBox").html(msg);
	$("#messageBox").show();
	setTimeout(function(){
		$("#messageBox").hide();
	},2000);
}

function checkval(val_){
	if(val_ == '' || val_ == null){
		return false;
	}else{
		return true;
	}
}

//保存资料
function saveInfo(){
	var dwposition = $("#position").val();
	var alipay = $("#alipay").val();
	var wechat = $("#wechat").val();
	var email = $("#email").val();
	
	 
	if(checkval(alipay) && checkval(wechat) && checkval(email) && checkval(dwposition) ){
		$.post(
			"<?php echo U('Info/moreinfo');?>",
			{
				alipay:alipay,
				wechat:wechat,
				email:email,
				position:dwposition
				 
				 
			},
			function (data,state){
				if(state != "success"){
					showalert("请求数据失败,请重试!");
				}else if(data.status == 1){
					showalert("保存成功!");
					window.location.href = "<?php echo U('Info/index');?>";
				}else{
					showalert(data.msg);
				}
			}
		);
	}else{
		showalert("资料填写不完整,请检查!");
	}
}
</script>
 <script type="text/javascript">
		window.onload=function(){
		        $('#loading').hide();
		    };
	</script>

	 
</body>



</html>