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
	<link href="__PUBLIC__/news/css/weui.min.css" rel="stylesheet" type="text/css">
	<link href="__PUBLIC__/news/css/jquery-weui.min.css" rel="stylesheet" type="text/css">
	<link href="__PUBLIC__/news/css/swiper-4.3.5.min.css" rel="stylesheet" type="text/css">
	<link href="__PUBLIC__/news/css/style.css?v1.3" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/pay-2b02ca7987.css">
<style>

.xk_1,.xk_2{overflow:hidden;background:#fff;margin:20px 0;padding-top: 20px;}
.xk_1 p,.xk_2 p{color: #4c4c4c;
    font-size: 16px;
    text-align: center;
    padding: 5px 0;}
.xk_1 .sfzwrap{float:left;width:50%;}
</style>
</head>
<body>
	 <div class="loading" id="loading">
		<img src="/Public/home/imgs/loading-0.gif" alt="加载中">
	</div>
	<div id="bxb-app" class="bxb-bottom-num bxb-p94-top bxb-relative">
		<div id="bxb-top-bar" class="bxb-top-bar bxb-relative bxb-flex">
			<a href="javascript:void(0);" onClick="javascript :history.back(-1);" class="btn pull-left bxb-text-left pic">
				<svg class="icon" aria-hidden="true">
				    <use xlink:href="#icon-iconfont0104"></use>
				</svg>
			</a>
			<h5 class="tit bxb-text-center">身份认证</h5>
			
		</div>

		<div class="bxb-cerBaseinfo-box">

			<div class="weui-cells__title">为避免影响借款,请务必填写真实信息~</div>
			<div class="weui-cells weui-cells_form">
				<div class="weui-cell">
			    	<div class="weui-cell__hd"><label class="weui-label">
					<svg class="icon" aria-hidden="true">
					    <use xlink:href="#icon-xingming"></use>
					</svg>
			    	姓名</label></div>
			    	<div class="weui-cell__bd">
			      		<input class="weui-input" id="usr" name="truename" value="<?php echo ($userinfo["name"]); ?>" type="text" placeholder="请输入姓名">
			    	</div>
			  	</div>

			  	<div class="weui-cell">
			    	<div class="weui-cell__hd"><label class="weui-label">
			    	<svg class="icon" aria-hidden="true">
					    <use xlink:href="#icon-shenfenzhenghao"></use>
					</svg>
					身份证号</label></div>
			    	<div class="weui-cell__bd">
			      		<input class="weui-input" id="percard" value="<?php echo ($userinfo["usercard"]); ?>" name="sfzhaoma" type="text" placeholder="请输入身份证号">
			    	</div>
			  	</div>
			</div>

			 

			<div class="cerBaseinfo-card">
				<div class="mui-input-group regfrm">
    <section > 
	<div class="xk_1">
	<p>身份证照</p>
	<p>点击开始识别身份证正反面</p>
	   <!-- 证件 -->	
			<!-- pho -->
		<div class="sfzwrap prel"  id="sfz_zm_div" >
   			<div class="phoes" id="mode1" class="uploader-list">
   				<input type="hidden" id="sfz_zm" />
	   				 
		   			<div style="display:none;">
		   				<input type="file" accept="image/*" capture="camera" id="sfz_zm_input" onChange="uploadImg('sfz_zm','sfz_zm_pic',this);" />
		   			</div>
				<div class="hcamera pab" onClick="Selfile('sfz_zm_input');">
					<img src="__PUBLIC__/news/images/sfz_zm.jpg" id="sfz_zm_pic">
				</div>
				<div class="sfztip pab">身份证 人面像</div>
		 	</div>	
		</div>
	   	<!-- pho -->
	   	 <!-- pho -->
	   		<div class="sfzwrap prel" id="sfz_fm_div" >
	   			<div class="phoes" id="mode2" class="uploader-list">
	   				<input type="hidden" id="sfz_fm" />
		   			 
		   			<div style="display:none;">
		   				<input type="file" accept="image/*" capture="camera" id="sfz_fm_input" onChange="uploadImg('sfz_fm','sfz_fm_pic',this);" />
		   			</div>
		   	<div class="hcamera pab" onClick="Selfile('sfz_fm_input');">
		   		<img src="__PUBLIC__/news/images/sfz_fm.jpg" id="sfz_fm_pic">
		   	</div>
		   	<div class="sfztip pab">身份证 国徽像</div>
	   			</div>
	   		</div>
	   	<!-- pho -->
		   <!-- 证件 end-->
		   </div>
		   <div class="xk_2">
		   <p>人脸识别</p>
		   <p>点击开始上传手持身份证拍照</p>
		   <!-- 证件 -->
		   	<!-- pho -->
		   		<div class="sfzwrap prel h130"  id="sfz_hb_div">
		   		<div class="phoes" id="mode3" class="uploader-list">
		   				<input type="hidden" id="sfz_hb" />
			   			 
			   			<div style="display:none;">
			   				<input type="file" accept="image/*" capture="camera" id="sfz_hb_input" onChange="uploadImg('sfz_hb','sfz_hb_pic',this);" />
			   			</div>
			   			<div class="hcamera pab" onClick="Selfile('sfz_hb_input');">
			   			 	<img src="__PUBLIC__/news/images/sfz_hb.jpg" id="sfz_hb_pic">
			   			</div>
		   			</div>
		   		</div>
		   	<!-- pho -->
		   <!-- 证件 end-->
		    </div>
		   </section>
	</div>
			</div>
			


			<div class="bxb-form-btn bxb-margin-center bxb-m50 w80">
				<button type="button" class="weui-btn weui-btn_primary" onClick="saveInfo();">提交</button>
				 
			</div>
		</div>
	</div>
<!-- 提示 -->
		<div style="display: none;" class="errdeo" id="messageBox">
		</div>	
	<script type="text/javascript" src="__PUBLIC__/news/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_jl6l9k1jqg.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/js.js"></script>
<script>
var isupload = false;
//判断如果已经上传了图片就显示
var sfz_zm = "<?php echo ($userinfo["cardphoto_1"]); ?>";
var sfz_fm = "<?php echo ($userinfo["cardphoto_2"]); ?>";
var sfz_hb = "<?php echo ($userinfo["cardphoto_4"]); ?>";
var sfz_sc = "<?php echo ($userinfo["cardphoto_3"]); ?>";
if(sfz_zm != ''){
	$("#sfz_zm").val(sfz_zm);
	document.getElementById("sfz_zm_pic").src=sfz_zm;
}
if(sfz_fm != ''){
	$("#sfz_fm").val(sfz_fm);
 	document.getElementById("sfz_fm_pic").src=sfz_fm;
}
if(sfz_hb != ''){
	$("#sfz_hb").val(sfz_hb);
	document.getElementById("sfz_hb_pic").src=sfz_hb;
	}

$('#sel').change(function(){
	change('sel','sela')
});
$('.inputblur').click(function(){
	$(this).blur();
	$('.nofocus').blur();
});

function showalert(msg){
	$("#messageBox").html(msg);
	$("#messageBox").show();
	setTimeout(function(){
		$("#messageBox").hide();
	},2000);
}
function Selfile(inputid){
	if(isupload != false){
		showalert("其他文件正在上传...请稍后");
	}else{
		$("#"+inputid).click();
	}
}
function uploadImg(hiddenid,divid,obj){
	var filename = $(obj).val();
    if(filename != '' && filename != null){
    	isupload = true;
        var pic = $(obj)[0].files[0];
        var fd = new FormData();
        fd.append('imgFile', pic);
        $.ajax({
            url:"__PUBLIC__/main/js/kindeditor/php/upload.php",
            type:"post",
            dataType:'json',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data && data.error == '0'){
              		showalert("上传成功");
                    var imgurl = data.url;
                  var uptp = document.getElementById(divid);
					uptp.src=imgurl;
                    $("#" + hiddenid).val(imgurl);
                }else{
                	showalert("上传出错了...");
                }
            },
            error:function (){
				showalert("上传出错了...");
            }
        });
        isupload = false;
    }
    isupload = false;
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
	var name = $("#usr").val();
	var card = $("#percard").val();
	var cardphoto_1 = $("#sfz_zm").val();
	var cardphoto_2 = $("#sfz_fm").val();
	var cardphoto_4 = $("#sfz_hb").val();
	if(checkval(name) && checkval(card) && checkval(cardphoto_1) && checkval(cardphoto_2)&& checkval(cardphoto_4)){
		$.post(
			"<?php echo U('Info/baseinfo');?>",
			{
				name:name,
				usercard:card,
				cardphoto_1:cardphoto_1,
				cardphoto_2:cardphoto_2,
				cardphoto_4:cardphoto_4,
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
		        document.getElementById("loading").style.display="none";
		    };
	</script>
<div style="display: none;">
	<?php
 $name = "cfg_sitecode"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?>
</div>
</body>
</html>