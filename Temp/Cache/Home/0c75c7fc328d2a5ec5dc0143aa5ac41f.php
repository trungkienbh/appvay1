<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> <?php
 $name = "cfg_sitetitle"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content=" <?php
 $name = "cfg_sitedescription"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> ">
<meta name="Keywords" content=" <?php
 $name = "cfg_sitekeywords"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> ">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/mui.min.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/newpay-bb7fcb5546.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/feiqi-ee5401a8e6.css">
<link rel="stylesheet" href="__PUBLIC__/home/css/mescroll.min.css">
<link href="__PUBLIC__/news/css/style.css?v1.3" rel="stylesheet" type="text/css">
<SCRIPT language=javascript> 
<!-- 
window.onerror=function(){return true;} 
// --> 
</SCRIPT>
<style>
	.section2 {
    width: 100%;
    height: auto;
    background-size: 100% 100%;
}
input::placeholder,textarea::placeholder{color:#b7b2b2;;font-size: 14px;}
	.logtabs{
	width: 90%;
    margin: 0 auto;
    padding: 0px 0 10px;
    background: #fff;
    border-radius: 5px;
	}
	.mui-input-group .mui-input-row {
	    height: 45px;
		display: block;
		width: 90%;
		border-radius: 5px;
		position: relative;
		border: 1px solid #e5e5e5;
		margin: 0 15px 15px;
	}
	.mui-input-row label {
	    padding: 13px 15px;
	}
	.regfrm .mui-input-row input {
	    height: 45px;
	}
	.mui-input-row:last-child:after{
	    height: 0;
	}
	@media screen and (max-width: 348px){
		.regfrm .mui-input-row label {
		    font-size: 14px;
		    padding: 15px 15px;
		}
	}
	.mui-input-group{background:none!important;}
	.arge{color:#fff;}
	.org {color:#fde344}
	.msub input {border-radius: 25px;}
	.rev em:after {
	 background:url(/Public/home/imgs/fico1.png) 0 -30px no-repeat;
	 background-size:40px auto;
	 width:16px;
	 height:16px;
	 left:0
	}
	.rev em, .rev input {
    border: 1px solid #fff;
	}
	input[type=submit].submit {
   display: block;
    border: none;
    width: 100%;
    height: 50px;
	border-radius: 5px;
    background-size: 100% 100%;
    margin: 0 auto;
    color: #fff;
    font-size: 20px;
    background: #f60;
	}
	.login-tip{text-align: center;
    color: #fff;}
	.login-tip a{color: #fff;text-decoration: underline;}
	.log label{background: #fff;margin: 10px 0;border-radius:5px;height: 45px;line-height: 45px;border: 1px solid #e5e5e5;}
	.log{background:none;padding-left:0;width: 90%;
    margin: 0 auto;}
	.log label{padding:0}
</style>
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
  </head>
  <body style="visibility: visible;">
    <div class="loading" id="loading">
		<img src="/Public/home/imgs/loading-0.gif" alt="加载中">
	</div> 
   <div id="bxb-app" class="bxb-relative">
    <div class="mui-content bxb-login-box" style="height:100%">
     <div class="logo">
				<img src="__PUBLIC__/news/images/logo.png" alt="">
			</div>
	  <div class="section section2">
      <div id="tabs" class="logtabs">
	  <ul>
		<li><a class="cur" style="width: 100%;border-right: 0px;" href="javascript:;">密码登录</a></li>
		<!--<li ><a href="javascript:;">验证码登录</a></li>-->
		</ul>
<div class="allpic" style="display:block;">
<form id="login-form" onsubmit="return false">
<div class="mui-input-group lgfrm">
<div class="mui-input-row">
 <input id="account"  name="account" type="number" class="mui-input-clear mui-input" placeholder="请输入手机号" data-input-clear="2" data-flag="1"><span class="mui-icon mui-icon-clear mui-hidden"></span>
</div>

<div class="mui-input-row pr"> <input id="password" name="password"  type="password" class="mui-input-clear mui-input" placeholder="请输入密码" data-input-clear="3" data-flag="1"><span class="mui-icon mui-icon-clear mui-hidden"></span><i class="seltarr password_icon_off pab" id='switch'></i></div></div><article class="msub"><input id="btn" class="submit" type="submit" value="登录" ></article></form>
<div class="fst"></div></div>
<section class="allpic">
<!-- form -->
<form method='post' onsubmit="return false" action='' id='form2' autocomplete="off">
  <div class="log">
    <label class="pr borbottom" >
      <input class=" phopwd" id="perpho" name="mobile" type="number" placeholder="请输入手机号" data-empty="用户名不能为空" required data-flag="1"/>
      <input type='hidden' value='' name='mobile1' id='bei1' >
	  </label>
	  <label class="pr borbottom" >
    <input class=" phopwd " id="verifycode" name="yzm" type="text" placeholder="请输入图片验证码" data-empty="用户名不能为空" required data-flag="1"/>
    <img id="verifycode_img" class="chkimg" style="position:absolute;right:15px;top:9px;height: 28px;" src='__APP__/Common/verify/' onclick="change_img(this)" onclick="change_img(this)" >
    </label>
    <label for=""><input type="number" id="inp1" name='code' placeholder="请输入短信验证码" required data-flag="1"  />
      <button id="count" type="button" class="mui-btn mui-btn-warning mui-btn-outlined ckbtnOff" disabled="disabled">获取验证码</button>
    </label>
  </div>
  <article class="msub">
    <input class="submit" id="logBtn2" type="submit" value="登录" >
  </article>
  </form>
        </section>
			<!-- form end-->
	<!-- 提示 -->
		<div style="display: none;top:45%" class="errdeo" id="messageBox">
			
		</div>
		</div>
		</div>
		 
		 <div class="regBtn bxb-text-center">
					<a href="/index.php?m=User&a=signup">没有账号，马上注册</a>
				</div>
</div>
</div>
<!-- 提示 -->

<script src="__PUBLIC__/home/js/jquery.js"></script>
<script src="__PUBLIC__/home/js/fontsizeset.js"></script>
<script src="__PUBLIC__/home/js/mui.min.js"></script>
<script src="__PUBLIC__/home/js/newcheck.js"></script>
<script src="__PUBLIC__/home/js/tabs.js"></script>

<script>
   	function tishi(str){
   		$('#messageBox').text(str);
   		$('#messageBox').show();
		setTimeout(function(){
			$('#messageBox').hide();
		},2200);
	}
   tabs();
var on = true;
$().ready(function(){
	//密码开关
	$('#switch').click(function(){
	    if(on == true){
	    	$('#password')[0].type = "text";
		    $('#switch').removeClass('password_icon_off');
		    $('#switch').addClass('password_icon_on');
		    on = false;
		}else{
			//$('#password').attr('type','password');
			$('#password')[0].type = "password";
		    $('#switch').removeClass('password_icon_on');
		    $('#switch').addClass('password_icon_off');
		    on = true;
		}
	});
});
  // input获得光标 浮框隐藏
	$('input').focus(function(){
		$(this).attr("data-flag","0");
		$('.dnapp').css('display','none');
		$('.footmask').css('display','none');
	})
	$('input').blur(function(){
		$(this).attr("data-flag","1");
		setTimeout(function(){
			var flag1 = $("#account").attr("data-flag")
			var flag2 = $("#password").attr("data-flag")
			var flag3 = $("#inp1").attr("data-flag")
			var flag4 = $("#perpho").attr("data-flag")
			var flag5 = $("#verifycode").attr("data-flag")
			if(flag1==1 && flag2==1&& flag3==1 && flag4==1 && flag5==1){	
				$('.dnapp').css('display','block');
				$('.footmask').css('display','block');
			}
		},500)
	
	});



var oIput = document.getElementById('perpho');
var oCount = document.getElementById('count');
oIput.onkeyup = function(){
	var reg =/^1\d{10}$/;
	if(!reg.test(oIput.value)){
		$(".remind").css("display","block");
	}else{
		$(".remind").css("display","none");
	}
	tagClass(this);
}

function tagClass(tag){
	var oIput = document.getElementById(tag);
	if(tag.value.length == 11){ 
		oCount.className ="mui-btn mui-btn-warning mui-btn-outlined ckbtn";
		$('#count').removeAttr("disabled");
		$('#count').click(function(){
		 	$('#perpho').blur();
		 	$('#perpho').attr("disabled","disabled");
			$('#bei1').val($('#perpho').val());
			$('#checkwin').css('display', 'block');
			$('#verifycode').focus();
			$('#mask4').css('display','block');
		});
	}else{
		oCount.className ="mui-btn mui-btn-warning mui-btn-outlined ckbtnOff";
		$('#count').click(function(){
			$("#checkwin").css('display','none');
			$("#mask").css('display','none');
	});
	} 
} 

function checkpwd(){
	var password=$('#password').val();
	if (password.length==0) {
		tishi('请输入密码');
		return false;
	}
}

$("#btn").click(function() {
	var mobile=$('#account').val();
	var password=$('#password').val();
	var reg1 =/^1\d{10}$/;
	if(!reg1.test(mobile))
	{
		tishi('手机格式不对');
		return false;
	}
	if (password.length==0) {
		tishi('请输入密码');
		return false;
	}
	$.post(
		"<?php echo U('User/login');?>",
		{
			phone:mobile,
			password:password
		},
		function (data,state){
			if(state != "success"){
				tishi('网络请求失败,请重试');
				return false;
			}else if(data.status != 1){
				tishi(data.msg);
				return false;
			}else{
				//登录成功
				window.location.href = "<?php echo U('Index/index');?>";
			}
		}
	);
});

function change_img(obj){
		var rand = "login-"+Date.parse(new Date());
		var url = $(obj).attr("src");
		var arr = url.split("?");
		$("#rand1").val(rand);
		$(obj).attr("src", arr[0]+"?capKey="+rand);
}
var reg1 =/^1[3|4|5|7|8][0-9]\d{8}$/;
var reg2=/^\d{6}$/;
$("#count").click(function(){
	var mobile = $("#perpho").val();
	var verifycode = $("#verifycode").val();
	if(verifycode.length < 4 || !verifycode){
		tishi('请输入图片验证码');
		return false;
	}else if(!reg1.test(mobile)){
		tishi('手机格式不对');
		return false;
	}else{
		//请求发送验证码
      	$("#count").html("请求中");
		$("#count").attr("disabled", true);
		$.post(
			"<?php echo U('User/sendsmscode');?>",
			{phone:mobile,verifycode:verifycode,type:"login"},
			function (data,state){
				$("#checkwin").hide();
				$("#mask").hide();
				$('#mask4').hide();
				if(state != "success"){
					tishi("网络请求失败,请重试");
                  	$("#count").removeAttr("disabled");
				}else if(data.status != 1){
					tishi(data.msg);
                  	$("#count").removeAttr("disabled");
				}else{
					tishi("发送成功");
					var index = 60;
					var stime = setInterval(function(){
						if(index > 0){
							$("#count").html(index+'s');
							$("#count").attr("disabled", true);
							index--;
						}else if(index == 0){
							$("#count").html("重新获取");
							$("#count").className = "mui-btn mui-btn-warning mui-btn-outlined ckbtn";
							$("#count").removeAttr("disabled");
							$('#perpho').removeAttr("disabled");
							clearInterval(stime);
						}					
					},1000);
				}
			}
		);
		return false;
	}
});

$('#logBtn2').click(function(){
	var mobile1=$('#perpho').val();
	var code=$('#inp1').val();
	if(!reg1.test(mobile1)){
		tishi('手机格式不对');
		return false;
	}
	if(!reg2.test(code)){
		tishi('请输入短信验证码');
		return false;
	}
	$.post(
		"<?php echo U('User/login');?>",
		{
			phone:mobile1,
			code:code,
			type:"login"
		},
		function (data,state){
			if(state != "success"){
				tishi("请求失败,请稍后重试!");
			}else if(data.status != 1){
				tishi(data.msg);
			}else{
				window.location.href = "<?php echo U('Index/index');?>";
			}
			return false;
		}
	);
});
$('.cls').click(function(){
		$('.dnapp').css('display','none');
		$('.footmask').css('display','none');
});
</script>

<script type="text/javascript">
		
		window.onload=function(){
		        document.getElementById("loading").style.display="none";
		    };
</script>
<div style="display: none;">
	<?php
 $name = "cfg_sitecode"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?>
</div>
</body>
</html>