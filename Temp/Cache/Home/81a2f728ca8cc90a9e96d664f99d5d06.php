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
			<h5 class="tit bxb-text-center">手机认证</h5>
			
		</div>

		<div class="bxb-cardHk-box ">

			<div class="bxb-form-box">
				
				<div class="weui-cells weui-cells_form">
					
				    <div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-shoujihao"></use>
								</svg>
				        		手机号码
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" type="tel" id="mobile_str" name="mobile_str" placeholder="手机号码" value="<?php echo ($userinfo["user"]); ?>" readOnly="readOnly">
			    		</div>
					</div>

					<div class="weui-cell weui-cell_access">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
							
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-yunyingshang-xuanzhong"></use>
								</svg>
				        		手机运营商
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" id="operator" name="operator"  type="text" placeholder="手机运营商">
			    		</div>
			    		 
					</div>
				    
					<div class="weui-cell weui-cell_icon">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-ai-password"></use>
								</svg>
				        		服务密码
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" type="password" placeholder="服务密码" id="mobilePwd" name="mobilePwd">
			    		</div>			

							
					</div>
					<div class="weui-cell weui-cell_icon">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-ai-password"></use>
								</svg>
				        		图形验证码
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" type="text" id="tpYzm" name="tpYzm" placeholder="请输入验证码">
			     			
			    		</div>			
						<div class="weui-cell__ft"><img src="" style="width:70px;height:25px;float:right;margin-left: 5px;" id="tpYzmImg" onclick="changeImage(this)"/></div>
							
					</div>
				</div>
			</div>


			<div class="bxb-certification-note bxb-p30">
				<p>1.请填写真实信息利于快速通过审核</p>
				<p>2.您提交的所有信息我们都将严格保密</p>
			</div>
			
			
			<div class="bxb-form-btn ">
				<input type="submit" class="weui-btn weui-btn_primary" onclick="checkyys()" id="btn" value="提交">
			</div>

			
		</div>
		

		
		
	</div>
<!-- 提示 -->
		<div style="display: none;" class="errdeo" id="messageBox">
		</div>
	<script type="text/javascript" src="/Public/news/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/Public/news/js/jquery-weui.min.js"></script>
	<script type="text/javascript" src="/Public/news/js/swiper-4.3.5.min.js"></script>
	<script type="text/javascript" src="/Public/news/js/city-picker.min.js"></script>
	<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_cxvxi5xa6jr.js"></script>
	<script type="text/javascript" src="/Public/news/js/js.js"></script>
	


	<script type="text/javascript">
		
       $(function(){
			changeImage($("#tpYzmImg"));
       		$("#operator").picker({
       		  title: "手机运营商",
       		  value:"",
       		  cols: [
       		    {
       		      textAlign: 'center',
       		      values: ['移动', '联通', '电信']
       		    }
       		  ],
		        onChange: function(p, v, dv) {
		          // console.log(p, v, dv);
		        },
		        onClose: function(p, v, d) {
		          // console.log("close");
		          // console.log(p.value)
		        }
       		});
       })
       function showalert(msg){
			$("#messageBox").html(msg);
			$("#messageBox").show();
			setTimeout(function(){
				$("#messageBox").hide();
			},2000);
		}
	   function changeImage(obj){
		$(obj).attr('src', "__APP__/Common/verify/captcha?token=&r="+Math.random());
		}
       function checkyys(){
				var operator = $("#operator").val();
				var code = $("#tpYzm").val();
				var pass = $("#mobilePwd").val();
				if(operator == '' || operator == null){
					showalert("请先选择运营商!");
					return false;
				}
				if(pass == '' || pass == null || pass.length < 4 || pass.length != 6){
					showalert("请输入正确的服务密码!");
					return false;
				}
				if(code == '' || code == null || code.length != 4){
					showalert("请输入正确的图形验证码!");
					return false;
				}
		  		$("#btn").val("查询中...");
				$("#btn").attr("disabled", true);
				setTimeout(yourFunction(),2000);
		  		
			}
			function yourFunction(){
				var code = $("#tpYzm").val();
				var pass = $("#mobilePwd").val();
				$.post(
					"<?php echo U('Info/phoneinfo');?>",
					{
						pass:pass,
						code:code
					},
					function(data,state){
						if(state != "success"){
							showalert("提交数据失败,请重试!");
							$("#btn").val("重新认证");
							$("#btn").removeAttr("disabled");
							return false;	
						}
						if(data.status == 1){
							//showalert("验证成功!");
							setTimeout(function(){
								window.location.href = "<?php echo U('Info/loading');?>";
							},1000);
							return false;
						}else{
							
			               $("#btn").val("重新认证");
							$("#btn").removeAttr("disabled");
							showalert(data.msg);
							return false;
						}
					}
				);
			}
	</script>
<script type="text/javascript">
		window.onload=function(){
		        $('#loading').hide();
		    };
	</script>
</body>



</html>