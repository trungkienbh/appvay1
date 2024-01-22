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
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/feiqi-ee5401a8e6.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/newpay-bb7fcb5546.css">

<link href="__PUBLIC__/news/css/weui.min.css" rel="stylesheet" type="text/css">
	<link href="__PUBLIC__/news/css/style.css?v1.3" rel="stylesheet" type="text/css">
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
  <SCRIPT language=javascript> 
<!-- 
window.onerror=function(){return true;} 
// --> 
</SCRIPT>
<style>
.bxb-borrow{padding:0}
.mui-log img{
    width: 101%;
    display: block;
}
</style>
<style>
	.mui-table-view-cell:after {
	    height: 0px;
	}
	.mui-table-view-cell.mui-collapse .mui-table-view .mui-table-view-cell {
	    font-size: 14px;
	}

</style>
</head>
<body class="whtbg">
   <div class="loading" id="loading">
		<img src="/Public/home/imgs/loading-0.gif" alt="加载中">
	</div>
 <div id="bxb-app" class="bxb-bottom-num bxb-p94-top bxb-p50-bottom bxb-relative">
		<div id="bxb-top-bar" class="bxb-top-bar bxb-relative bxb-flex">
			<a href="javascript:void(0);" onClick="javascript :history.back(-1);" class="btn pull-left bxb-text-left pic">
				<svg class="icon" aria-hidden="true">
				    <use xlink:href="#icon-iconfont0104"></use>
				</svg>
			</a>
			<h5 class="tit bxb-text-center">借款订单</h5>
			
		</div>
	<!-- header end-->
<div class="mui-content helpcon">
	<div class="mui-card" style="margin-top: 0px;">
		<ul class="mui-table-view mui-table-view-chevron helpDet">
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li  class="mui-table-view-cell mui-collapse " id="Article_Li_<?php echo ($vo["id"]); ?>">
				<a class="mui-navigate-right" href="javascript:;">
					<?php echo ($vo["title"]); ?>
				</a>
				<ul class="mui-table-view mui-table-view-chevron answ">
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right" href="javascript:;">
							<?php echo ($vo["description"]); ?>
						</a>
					</li>
				</ul>
			</li><?php endforeach; endif; ?>
		</ul>
	</div>
</div>
  
</div>

<script src="__PUBLIC__/home/js/jquery.js" ></script>
<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_h5d1zwytsak.js"></script>
<script src="__PUBLIC__/home/js/mui.min.js"></script>
<script>
$(function (){
	var aid = "<?php echo ($aid); ?>";
	if(aid != "0"){
		$("#Article_Li_"+aid).removeClass("mui-table-view-cell mui-collapse");
		$("#Article_Li_"+aid).addClass("mui-table-view-cell mui-collapse mui-active");
		window.location.hash = "#Article_Li_"+aid;
	}
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