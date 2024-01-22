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
	<div id="bxb-app" class="bxb-bottom-num bxb-p94-top bxb-relative">
		<div id="bxb-top-bar" class="bxb-top-bar bxb-relative bxb-flex">
			<a href="javascript:void(0);" onClick="javascript :history.back(-1);" class="btn pull-left bxb-text-left pic">
				<svg class="icon" aria-hidden="true">
				    <use xlink:href="#icon-iconfont0104"></use>
				</svg>
			</a>
			<h5 class="tit bxb-text-center">工作信息认证</h5>
			
		</div>

		<div class="bxb-cerBaseinfo-box">

			<div class="weui-cells weui-cells_form">
				<div class="weui-cell weui-cell_access">
			    	<div class="weui-cell__hd">
			    		<label class="weui-label">
				      <svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-chengshifuwu"></use>
		    		  </svg>
			    		单位城市</label>
			    	</div>
			    	<div class="weui-cell__bd">
			      		<input class="weui-input" type="text" value="<?php echo ($userinfo["dwaddess_ssq"]); ?>" name="showCityPicker2" placeholder="单位城市" id='city-picker02' readonly="readonly" />
			    	</div>
			    	<div class="weui-cell__ft"></div>
			  	</div>

			  	<div class="weui-cell">
			    	<div class="weui-cell__hd"><label class="weui-label">
					<svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-address"></use>
		    		  </svg>
			    	详细地址</label></div>
			    	<div class="weui-cell__bd">
			      		<input class="weui-input" value="<?php echo ($userinfo["dwaddess_more"]); ?>" id="dwaddess_more" type="text" placeholder="请输入详细单位地址">
			    	</div>
			  	</div>

			  	<div class="weui-cell">
			    	<div class="weui-cell__hd"><label class="weui-label">
					<svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-danwei"></use>
		    		  </svg>
			    	单位名称</label></div>
			    	<div class="weui-cell__bd">
			      		<input class="weui-input"  id="dwname" value="<?php echo ($userinfo["dwname"]); ?>" type="text" placeholder="请输入单位名称">
			    	</div>
			  	</div>

			  	<div class="weui-cell">
			    	<div class="weui-cell__hd"><label class="weui-label">
					<svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-dianhua"></use>
		    		  </svg>
			    	单位电话</label></div>
			    	<div class="weui-cell__bd">
			      		<input class="weui-input" id="dwphone" value="<?php echo ($userinfo["dwphone"]); ?>" type="tel" placeholder="请输入单位电话">
			    	</div>
			  	</div>

			  	<div class="weui-cell weui-cell_access">
			    	<div class="weui-cell__hd"><label class="weui-label">
					<svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-xingye"></use>
		    		  </svg>
			    	行业</label></div>
			    	<div class="weui-cell__bd">
			      		<input class="weui-input" value="<?php echo ($userinfo["workyears"]); ?>" type="text" placeholder="输入单位行业" id="industry" readonly="readonly" >
			    	</div>
			    	<div class="weui-cell__ft"></div>
			  	</div>

			  	<div class="weui-cell weui-cell_access">
			    	<div class="weui-cell__hd"><label class="weui-label">
					<svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-shouru"></use>
		    		  </svg>
			    	收入</label></div>
			    	<div class="weui-cell__bd">
			      		<input class="weui-input" value="<?php echo ($userinfo["dwysr"]); ?>" type="text" placeholder="输入收入区间" id="income" readonly="readonly" >

			    	</div>
			    	<div class="weui-cell__ft"></div>
			  	</div>

			  

			</div>



			<div class="bxb-certification-note bxb-p30">
				<p>1.请填写真实信息利于快速通过审核</p>
				<p>2.您提交的所有信息我们都将严格保密</p>
			</div>


			<div class="bxb-form-btn bxb-margin-center w80">
				<input type="submit" class="weui-btn weui-btn_primary" onclick="saveInfo()" id="btn" value="提交">
			</div>
		</div>
	</div>
<!-- 提示 -->
		<div style="display: none;position: absolute;" class="errdeo" id="messageBox">
		</div>
	<script type="text/javascript" src="/Public/news/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/Public/news/js/jquery-weui.min.js"></script>
	<script type="text/javascript" src="/Public/news/js/swiper-4.3.5.min.js"></script>
	<script type="text/javascript" src="/Public/news/js/city-picker.min.js"></script>
	<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_obk589upqgh.js"></script>
	<script type="text/javascript" src="/Public/news/js/js.js"></script>
	<script>

		$(function(){
			$("#city-picker").cityPicker({
			    title: "请选择居住地址"
			});
			$("#city-picker02").cityPicker({
			    title: "请选择单位地址"
			});

			$("#income").picker({
			  title: "请选择您的收入区间",
			  cols: [
			    {
			      textAlign: 'center',
			      values: ["0", "3000-5000元", "5000-7000元", "7000-10000元", "10000-15000元", "15000元以上"]
			    }
			  ]
			});

			$("#industry").picker({
			  title: "请选择您的行业",
			  cols: [
			    {
			      textAlign: 'center',
			      values: ["互联网", "金融公司", "娱乐行业", "制造行业", "服务行业", "建筑行业", "餐饮行业", "运输行业"]
			    }
			  ]
			});
		})
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
	var dwname = $("#dwname").val();
	var dwaddess_ssq = $("#city-picker02").val();
	var dwaddess_more = $("#dwaddess_more").val();
	var workyears = $("#industry").val();
	var dwphone = $("#dwphone").val();
	var dwysr = $("#income").val();
	 
	if(checkval(dwname) && checkval(dwaddess_ssq) && checkval(dwaddess_more) && checkval(workyears) && checkval(dwysr) ){
		$.post(
			"<?php echo U('Info/workinfo');?>",
			{
				dwname:dwname,
				dwaddess_ssq:dwaddess_ssq,
				dwaddess_more:dwaddess_more,
				workyears:workyears,
				dwphone:dwphone,
				dwysr:dwysr
				 
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