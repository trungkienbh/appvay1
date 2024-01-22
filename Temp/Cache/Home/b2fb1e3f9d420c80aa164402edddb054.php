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
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/mui.min.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/feiqi-ee5401a8e6.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/newpay-bb7fcb5546.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/newindex-09d04b32f3.css"/>
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
	.mui-input-group{background:none!important;padding-top: 0.3rem;}
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
	   <div class="section section2 login-con bxb-bg-fff bxb-margin-center">
		<form id="back-form" onsubmit="return false">
	    <div class="mui-input-group regfrm">
			 
			<div class="mui-input-row">
				 
				<input  id="account" name="account" type="number" class="mui-input-clear mui-input" placeholder="请输入手机号" data-input-clear="2"><span class="mui-icon mui-icon-clear mui-hidden"></span>
			</div>
			<div class="mui-input-row pr">
				 
				<input id="verifycode" name="tpyzm" type="text" class="mui-input-clear mui-input" placeholder="请输入图片验证码" data-input-clear="2">
				<img class="chkimg" style="position:absolute;right:20px;top:9px;height: 28px;" onclick="change_img(this)" id="verifycode_img">
			</div>
			<!--<div class="mui-input-row pr">
				 
				<input id="checkma" name="checkma" type="text" class="mui-input-clear mui-input" placeholder="请输入手机验证码" data-input-clear="2"><span class="mui-icon mui-icon-clear mui-hidden"></span>
				<button id="count" type="button" class="mui-btn mui-btn-warning mui-btn-outlined ckbtn" style="top:12px;">
					获取验证码
				</button>
			</div> -->
			<div class="mui-input-row pr">
				 
				<input id="password" name="password" type="password" class="mui-input-clear mui-input" placeholder="请设置6-16位密码" data-input-clear="3"><span class="mui-icon mui-icon-clear mui-hidden"></span>
				<i class="seltarr password_icon_off pab" id='switch'></i>
			</div>
		</div>
		<div class="cf mt20">
			<label class="fl rev">
				<input type="checkbox" checked="checked" id="xieyi">
				<em></em>
			</label>
			<span class="fl arge">同意<a  href="javascript:void(0)" id="qbtn3">《<?php echo C('cfg_sitename');?>用户注册协议》</a></span>
		</div>
		<article class="msub">
		 	<input class="submit" onclick="Reg()" type="submit" value="立即拿钱" >
		 </article>
		 
		  
		<!-- 提示 -->
		<div style="display: none;top: 45%;" class="errdeo" id="messageBox">
		</div>	
	</form>	
	
	 </div>	
	 
	 <div class="regBtn bxb-text-center">
					<a href="/index.php?m=User&a=login">已有账号，马上登陆 </a>
				</div>
  </div>
  </div>
<!-- 弹窗三开始 -->
<div class="deowin" style="display: none;padding:0 6%;" id="deowin3">
	<div class="deocon">
	<h3 style="text-align: center;font-size: 16px; color:#fb6f00;height: 40px;line-height: 40px;border-bottom: 1px solid #fb6f00;">《用户注册协议》</h3>
		<div class="divpad" style="height: 340px;overflow-y: auto;">
			<iframe src="/regxieyi.html" style="width:100%;height:100%;border:none"></iframe>
		</div>
		<div class="wobtn">
			<!-- 一个按钮用这个结构 -->
				<a style="color:#fb6f00;" id="winbtn3" href="javascript:;">关闭</a>
		</div>
	</div>
</div>
<div class="emask" style="display: none;" id="mask3"></div>

<!-- 弹窗三结束 -->
<script src="__PUBLIC__/home/js/jquery.js"></script>
<script src="__PUBLIC__/home/js/mui.min.js"></script>
<script src="__PUBLIC__/home/js/jquery.validate.js"></script>
<script>
var index;//验证码再次获取倒计时
$(function(){
	var capKey=Date.parse(new Date());
	$('#verifycode_img').attr("src", "<?php echo U('Common/verify');?>&time="+capKey);
	//密码开关
	var on = true;
	$('#switch').click(function(){
	    if(on == true){
	    	$('#password')[0].type = "text";
		    $('#switch').removeClass('password_icon_off');
		    $('#switch').addClass('password_icon_on');
		    on = false;
		}else{
			$('#password')[0].type = "password";
		    $('#switch').removeClass('password_icon_on');
		    $('#switch').addClass('password_icon_off');
		    on = true;
		}
	});
	$("#count").click(function(){
		var mobile=$('#account').val();
		var verifycode=$('#verifycode').val();
		if (mobile.length==11) {
			if(!(/^1\d{10}$/.test(mobile))){ 
				salert("请输入正确手机号");
				return false;
			}
			if(!verify()){
				return false;
			}
			//发送验证码
          	$("#count").html("请求中");
			$("#count").attr("disabled", true);
			$.post(
				'<?php echo U("User/sendsmscode");?>',
				{phone:mobile,verifycode:verifycode,type:"reg"},
				function(data,state){
					if(state != "success"){
						salert("发送请求失败");
                      	$("#count").removeAttr("disabled");
					}else{
						if(data.status == 0){
							salert(data.msg);
                          	$("#count").removeAttr("disabled");
						}else if(data.status == 1){
							salert("验证码发送成功");
							index = 60;
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
						}else{
							salert("未知错误");
						}
					}
					return false;
				}
			);
		}else{
			salert("请输入正确手机号");
			return false;
		}
	});
					
	
});
var oRemind=document.getElementById('messageBox');
//验证码
function change_img(obj)
{
	var capKey=Date.parse(new Date());
	$('#verifycode_img').attr("src", "<?php echo U('Common/verify');?>&time="+capKey);
}
function close_time() {
	oRemind.style.display='none';
}
function salert(msg){
	oRemind.innerHTML = msg;
	oRemind.style.display = "block";
	setTimeout('close_time()',2000);
}
//图片验证码位数验证
function verify(){
	var verifycode=$('#verifycode').val();
	if(verifycode=='' || verifycode==null || verifycode.length!=4){
		salert("请输入图片4位验证码");
		return false;
	}else{
		oRemind.style.display = "none";
		return true;
	}
}
$("#qbtn3").click(function() {
	$('#deowin3').show();
	$('#mask3').show();
});
$('#winbtn3').click(function(){
	    	$('#deowin3').hide();
	    	$('#mask3').hide();
})
middle();
function middle(){
	var h = $('#deowin3').height();
	var t = -h/2 + "px";
	$('#deowin3').css('marginTop',t);
}
function Reg(){
	//二次验证手机号
	var mobile=$('#account').val();
	if (mobile=='' || mobile==null || mobile.length!=11) {
		salert("请输入正确手机号");
		return false;
	}
	if(!(/^1\d{10}$/.test(mobile))){ 
		salert("请输入正确手机号");
		return false;
	}
	//验证短信验证码
	//var checkma = $("#checkma").val();
	//if(checkma=='' || checkma==null || checkma.length < 6){
	//	salert("请输入短信验证码");
	//	return false;
	//}
	//验证密码格式
	stroInp1 = $("#password").val();
	var reg = new RegExp(/[a-zA-Z0-9_]{6,16}/);
	if(stroInp1.length == 0){
		salert("密码不能为空，请入密码");
		return false;
	}else if(!reg.test(stroInp1)){
		salert("请入6-16位密码!");
		return false;
	}
	if($("#xieyi").attr("checked") == false){
		salert("您需同意协议方能注册");
		return false;
}

var invitor = $('#invitor').val();
	
	//提交注册
	$.post(
		"<?php echo U('User/signup');?>",
		{
		    phone: mobile,
		    invitor: invitor,
			//code:checkma,
			password:stroInp1
		},
		function (data,state){
			if(state != "success"){
				salert("请求失败,请重试");
				return false;
			}else if(data.status == 0){
				salert(data.msg);
				return false;
			}else{
				//注册成功同时会自动登陆,跳转到借款页面
				//salert("注册成功!");
				window.location.href = "<?php echo U('Index/index');?>";
			}
		}
	);
}
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