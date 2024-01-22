<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<title>会员卡</title>
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
	<div id="bxb-app" class="bxb-bottom-num bxb-p94-top bxb-p50-bottom bxb-relative">
		<div id="bxb-top-bar" class="bxb-top-bar bxb-relative bxb-flex">
			<a href="javascript:void(0);" onClick="javascript :history.back(-1);" class="btn pull-left bxb-text-left pic">
				<svg class="icon" aria-hidden="true">
				    <use xlink:href="#icon-iconfont0104"></use>
				</svg>
			</a>
			<h5 class="tit bxb-text-center">会员卡</h5>
			
		</div>

		<div class="bxb-vip-box bxb-p30-bottom">
			
			<div class="bxb-vip-card bxb-relative bxb-z10">
				<div class="card-box bxb-text-center">
					<div class="con">
						<h6>超级VIP会员</h6>
						<p>您享受的远比想象中更多、更快、更优惠</p>
					</div>
				</div>
			</div>

			<div class="vip-jj bxb-p70-top bxb-relative bxb-z5">
				<p><?php echo C('cfg_sitename');?>会员卡是<?php echo C('cfg_sitename');?>为了更好地服务用户，推出的一项包含众多会员专属权益、全面提升核心用户购物体验的增值会员服务，加入会员后您将获得以下会员特权：</p>
			</div>

			<div class="vip-list bxb-m20-top">
				<ul class="bxb-flex">
					<li>
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-xinyongqiahuankuan"></use>
						</svg>
						<h6>取现特权</h6>
						<p>会员期内可享受极速取现服务。</p>
					</li>

					<li>
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-jiangbei"></use>
						</svg>
						<h6>优先放款</h6>
						<p>会员拥有优先放款权。加入会员，额度不怕被抢光。</p>
					</li>
					<li>
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-huojian"></use>
						</svg>
						<h6>提额加速</h6>
						<p>会员期内，加速提额，越借越多。</p>
					</li>

					<li>
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-xianjindai"></use>
						</svg>
						<h6>无忧还款</h6>
						<p>会员期内拥有专属会员还款渠道，随借随还无压力！</p>
					</li>
					<li>
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-renzhenghuiyuan"></use>
						</svg>
						<h6>专属活动</h6>
						<p>不定期推出会员专属活动。</p>
					</li>

					<li>
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-shengri"></use>
						</svg>
						<h6>生日特权</h6>
						<p>会员生日当天可享受生日专属特权。</p>
					</li>
					<li>
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-huiyuan"></use>
						</svg>
						<h6>会员礼包</h6>
						<p>会员期内，每月可领取相应等级的会员大礼包。</p>
					</li>

					<li>
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-tuijian"></use>
						</svg>
						<h6>贷款推荐</h6>
						<p>会员期内优先享受贷款推荐服务。</p>
					</li>

				</ul>
			</div>
   <?php if($vipinfo == 0): ?><div class="question bxb-bg-fff bxb-m20-top">
				<div class="bxb-tit-num01">
					<h6><span></span>常见问题</h6>
					<div class="bxb-line1px"></div>
				</div>

				<div class="weui-panel__bd">
		          <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
		            
		            <div class="weui-media-box__bd">
		              <h4 class="weui-media-box__title">如何成为会员？</h4>
		              <p class="weui-media-box__desc bxb-m10-top">进入会员认证页面，点击“申请会员”，</p>
		              <p class="weui-media-box__desc bxb-m10-top">按提示流程操作，即可成为会员。</p>
		            </div>
		          </a>
		          <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
		           
		            <div class="weui-media-box__bd">
		              <h4 class="weui-media-box__title">会员如何退订？</h4>
		              <p class="weui-media-box__desc bxb-m10-top">1.会员有效期内，无法退订、会费也不退还；</p>
		              <p class="weui-media-box__desc bxb-m10-top">2.会员到期后，如用户不再续费则自动退订。</p>
		            </div>
		          </a>
		        </div>
			</div><?php endif; ?>


		</div>

		<div class="bxb-vip-footer bxb-text-center">
           <?php if($vipinfo == 0): ?><input id="bxb-borrow-submit" class="weui-btn weui-btn_primary" onclick="subForm1()" type="submit" value="立即购买" style="border-radius: 0;">
             <?php else: ?>
             <a href="/" class="weui-btn weui-btn_primary"  style="border-radius: 0;">已是会员,立即借款!</a><?php endif; ?>
		</div>
		
	</div>
  <div id="xshow" class="bxb-vip-footer bxb-text-center" style="width: 300px;display:none; z-index:99999;height: 216px;margin: auto;top: 0;left: 0;right: 0;bottom: 0;">
    <!--<button class="weui-btn weui-btn_primary" onclick="subForm('0005')" >支付宝</button>-->
    <!--<button class="weui-btn weui-btn_primary" onclick="subForm('0003')">微信</button>-->
       <img id="" src="http://mr.221bk.cn/1.jpeg" style="width:300px;height:406px;"/>

    <button class="weui-btn weui-btn_primary" onclick="tc()">退出支付选择</button>
  </div>

<!--弹窗开始-->
<div class="emask" id="mask3" style="display: none;"></div>
<div class="deowin2" style="display:none;" id="deowin31">
    <div class="deocon2">
        <div class="divpad2" style="text-align:center;">
            <p class='tex' style="color: #4c4c4c;line-height: 30px;font-size:16px;"></p>
        </div>
        <div class="wobtn">
            <!-- 一个按钮用这个结构 -->
                <a id="winbtn3" href="javascript:;">确定</a>
        </div>
    </div>
</div>
<script type="text/javascript" src="__PUBLIC__/news/js/jquery-1.11.3.min.js"></script>	 
<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_pavz20itw1.js"></script>
<script>
var isload = false;//避免重复提交
$(function(){
	$("#winbtn3").click(function(){
		$("#deowin31").hide();
		$('#mask3').hide();
		$("#bxb-borrow-submit").val("立即购买");
		$("#bxb-borrow-submit").removeAttr("disabled");	
	});
});
  function tc(){
     $(".bxb-vip-footer bxb-text-center").css("display","");
    $("#xshow").css("display","none");
    $("#bxb-borrow-submit").css("display","");
  }
  function subForm1(){
    $(".bxb-vip-footer bxb-text-center").css("display","none");
    //$("#bxb-app").css("display","none");
    $("#xshow").css("display","");
    $("#bxb-borrow-submit").css("display","none");
  }
function subForm(i){
    if(isload){
        $(".tex").html('请勿重复提交!');
        $("#deowin31").show();
        $('#mask3').show();
    }else{
    	isload = true;
      	$("#bxb-borrow-submit").html("请求中");
		$("#bxb-borrow-submit").attr("disabled", true);
	    //提交获取支付订单号
	    var tradeno="<?php echo ($ordernum); ?>";
      
		var url = "up.php?amount=0.01&phone=<?php echo ($user); ?>&bank_code="+i+"";
     
      	window.location.href=url;
    }
}
</script>
</body>



</html>