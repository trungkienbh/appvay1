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
	<link href="__PUBLIC__/news/css/weui.min.css" rel="stylesheet" type="text/css">
	<link href="__PUBLIC__/news/css/jquery-weui.min.css" rel="stylesheet" type="text/css">
	<link href="__PUBLIC__/news/css/swiper-4.3.5.min.css" rel="stylesheet" type="text/css">
	<link href="__PUBLIC__/news/css/style.css?v1.3" rel="stylesheet" type="text/css">
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
			<h5 class="tit bxb-text-center">绑定银行卡</h5>
			
		</div>

		<div class="bxb-cardHk-box ">
<form id="form" method="post" onsubmit="return false">
			<div class="bxb-form-box">
				<div class="weui-cells__title">身份认证</div>
				<div class="weui-cells weui-cells_form">

				    <div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-xingming"></use>
								</svg>
				        		姓名
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" type="text" placeholder="姓名" value="<?php echo ($userinfo["name"]); ?>" readonly>
			    		</div>
					</div>
					<div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-shenfenzhenghao"></use>
								</svg>
				        		身份证号
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" type="number" placeholder="身份证号" value="<?php echo ($userinfo["usercard"]); ?>" readonly>
			    		</div>
					</div>
				</div>
			</div>

			<div class="bxb-form-box">
				<div class="weui-cells__title">绑定银行卡</div>
				<div class="weui-cells weui-cells_form">

				    <div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-yinhangqiahao"></use>
								</svg>
				        		银行卡号
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" type="number" name="bank_card_no" id="bank_card_no" placeholder="银行卡号" value="<?php echo ($userinfo["bankcard"]); ?>">
			    		</div>
					</div>
					<div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-yinhang"></use>
								</svg>
				        		所属银行
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" name="banks" type="text" id="user-bank" value="" placeholder="所属银行">
			    		</div>
					</div>
					<div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-shoujihao"></use>
								</svg>
				        		预留手机号
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" type="tel" name="ylshouji" id="ylshouji" maxlength="11" placeholder="银行预留手机号">
			    		</div>
					</div>
				</div>
			</div>
			</form>
			<div class="bxb-form-note bxb-m50-top bxb-color-999">
				<h6>温馨提示</h6>
				<p>填写的银行卡须是本人名下的储蓄卡。</p>
				<p></p>
			</div>
			
			
			<div class="bxb-form-btn bxb-m50-top">
				<button type="button" id="subBtn" class="weui-btn weui-btn_primary" onclick="saveInfo();">提交</button>
			</div>
		</div>
	</div>
<!-- 提示 -->
	<div style="display: none;" class="errdeo" id="messageBox"></div>	
	
	<script type="text/javascript" src="__PUBLIC__/news/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/jquery-weui.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/swiper-4.3.5.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/city-picker.min.js"></script>
	<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_c62wfsv1p8l.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/js.js"></script>

	<script type="text/javascript">
		
       $(function(){


		// window.addEventListener('touchmove', picker, { passive: false })

       		$("#user-bank").picker({
       		  title: "请选择银行",
       		  value:"",
       		  cols: [
       		    {
       		      textAlign: 'center',
       		      values: ['工商银行', '中国银行', '建设银行', '招商银行', '广发银行', '邮储银行', '农业银行', '兴业银行', '平安银行', '中信银行', '华夏银行', '光大银行','浦发银行', '民生银行']
       		    }
       		  ],
		        onChange: function(p, v, dv) {
		          // console.log(p, v, dv);
		        },
		        onClose: function(p, v, d) {
		          console.log("close");
		          console.log(p.value)
		        }
       		});
       		


       	
       })
	</script>
<script type="text/javascript">
		
		window.onload=function(){
		        document.getElementById("loading").style.display="none";
		    };
	</script>
<script>
var userbank = "<?php echo ($userinfo["bankname"]); ?>";
if(userbank != '' && userbank != null){
	$("#user-bank").val(userbank);
}
function salert(msg){
	$('#messageBox').html(msg);
	$('#messageBox').show();
	setTimeout(function(){
		$('#messageBox').hide();
	},2200);
}

function saveInfo(){
	var bankname = $("#user-bank").val();
	var bankcard = $("#bank_card_no").val();
	var ylshouji = $("#ylshouji").val();
	if(bankname != '' && bankname != null && bankcard != '' && bankcard != null && ylshouji != '' && ylshouji != null){
		$.post(
			"<?php echo U('Info/bankinfo');?>",
			{
				bankname:bankname,
				bankcard:bankcard
			},
			function (data,state){
				if(state != "success"){
					salert("请求数据失败,请重试!");
				}else if(data.status == 1){
					salert("保存成功!");
					window.location.href = "<?php echo U('Info/index');?>";
				}else{
					salert(data.msg);
				}
			}
		);
	}else{
		salert("银行卡资料填写不完整!");
	}
}
</script>
</body>



</html>