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
		<script type="text/javascript" src="__PUBLIC__/news/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/leftTime.min.js"></script>
</head>
<body>
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

		<div class="bxb-vipBuy-box bxb-p30-bottom ">
			<?php if(empty($data)): ?><div class="xinf">
			<div class="mydiv">
				<img src="__PUBLIC__/home/imgs/p_01.png" alt="">
			</div>
		</div>
		<div class="atxt">
			你的账单有点空
		</div>
		<section class="bbtn">
			<a class="combtn" href="/">立即借款</a>
		</section>
	<?php else: ?>
 
	<?php if(is_array($data)): foreach($data as $key=>$vo): ?><div class="vip-result bxb-text-center bxb-bg-fff">
              
				<h6>
					<i class="weui-icon-success"></i><?php if($order["status"] == 2): ?>恭喜您提现成功，您的借款金额为<?php elseif($order["status"] == 1): ?>您的申请正在审核中，额度为<?php elseif($order["status"] == -1): ?>审核未通过，请重新申请！<?php else: ?>恭喜您通过审核，您的额度为<?php endif; ?>
				</h6>
             
				<h5>￥<?php echo ($vo["money"]); ?></h5>
				<div class="text">
					<p>温馨提示，完善更多信息，获得<a href="/index.php?m=Info&a=index">更高额度</a></p>
					<?php if($vipinfo == 0): ?><p>您还未申请<a href="/index.php?m=User&a=vip">会员服务</a>暂时无法提现</p>
					<?php $date1= date("Y-m-d H:i:s",$vo[addtime]); $time=(date("Y/m/d H:i:s",strtotime("$date1 +3 day"))); ?>
					<p><span class="time" id="dateShow1"><i class="d">00</i>天<i class="h">00</i>时<i class="m">00</i>分<i class="s">00</i>秒</span>后认证失败,需重新申请</p>
					<?php else: ?>
					
					<p>您已成为<a href="/index.php?m=User&a=vip">VIP会员</a>可立即提现！</p><?php endif; ?>
				</div>
			</div>
			
			<div class="bxb-vipBuy-card bxb-m20-top bxb-bg-fff">
              <?php if($vipinfo == 0): ?><h6 class="tit">购买会员卡，享极速提现服务</h6><?php endif; ?>
				<div class="card-box bxb-margin-center">
					<h6><?php if($vipinfo == 0): ?>￥<span class="money">299.00</span><?php else: ?><span class="money">VIP会员</span><?php endif; ?> <a href="<?php echo U('User/vip');?>" class="bxb-fr">购买会员</a></h6>

					<h3><?php if($vipinfo == 0): ?>新手专享<?php else: ?>卡号<?php endif; ?><span class="num bxb-fr">NO:<?php echo ($vo["ordernum"]); ?></span></h3>

				</div>
<?php if($vipinfo == 0): ?><div class="price bxb-text-center">
					<h6>售价</h6>
					<h5><span class="note">￥</span>299.00</h5>
				</div><?php endif; ?>
			</div>

			<div class="weui-cells">
			  <div class="weui-cell">
			    <div class="weui-cell__hd"><img src=""></div>
			    <div class="weui-cell__bd">
			      <p>借款额度</p>
			    </div>
			    <div class="weui-cell__ft"><?php echo ($vo["money"]); ?>元</div>
			  </div>
			  <div class="weui-cell">
			    <div class="weui-cell__hd"><img src=""></div>
			    <div class="weui-cell__bd">
			      <p>借款期限</p>
			    </div>
			    <div class="weui-cell__ft"><?php echo ($vo["months"]); ?>天</div>
			  </div>
			  <div class="weui-cell">
			    <div class="weui-cell__hd"><img src=""></div>
			    <div class="weui-cell__bd">
			      <p>借款利息</p>
			    </div>
			    <div class="weui-cell__ft"><?php echo $vo[monthmoney]-$vo[money] ?>元</div>
			  </div>
			 
			</div>
			
			<div class="bxb-form-btn bxb-m30-top w70 bxb-margin-center">
              <?php if($order["status"] == 1): ?><a href="javascript:;" class="weui-btn weui-btn_primary"  >审核中...</a>
              <?php elseif($vipinfo == 0): ?>
				<a href="<?php echo U('User/vip');?>" id="bxb-borrow-submit" class="weui-btn weui-btn_primary"  >申请会员</a>
                 <?php elseif($order["tixian"] == 0): ?>
               <a href="javascript:;" id="show-actions" class="weui-btn weui-btn_primary"  >申请提现</a>
				<?php elseif($order["status"] == 2): ?>
				<a href="<?php echo U('Order/info',array('oid' => $vo['id']));?>" class="weui-btn weui-btn_primary"  >查看订单并还款</a>
				<?php else: ?>
				<a href="javascript:;" id="jindu" src="<?php echo U('Order/info',array('oid' => $vo['id']));?>" class="weui-btn weui-btn_primary"  >查看进度</a><?php endif; ?>
			</div><?php endforeach; endif; endif; ?>
		</div>

		<div class="bxb-footer-nav-box">
			<ul class="bxb-flex">
				<li class="home ">
					<a href="/">
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-shouye"></use>
						</svg>
						<h6>首页</h6>
					</a>
				</li>
				<li class="bill focus">
					<a href="<?php echo U('Order/lists');?>">
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-zhangdan1"></use>
						</svg>
						<h6>账单</h6>
					</a>
				</li>
				 
				<li class="invitation">
					<a href="<?php echo U('Info/inviteInfo');?>">
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-yaoqing"></use>
						</svg>
						<h6>邀请</h6>
					</a>
				</li>
				<li class="user">
					<a href="<?php echo U('User/index');?>">
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-wodexuanzhong"></use>
						</svg>
						<h6>我的</h6>
					</a>
				</li>
			</ul>
		</div>
		
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
<!-- 提示 -->
		<div style="display: none;" class="errdeo" id="messageBox">
		</div>

	<script type="text/javascript" src="__PUBLIC__/news/js/jquery-weui.min.js"></script>
	<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_h5d1zwytsak.js"></script>

	
<script type="text/javascript">
<?php if($vipinfo == 0): ?>$(function(){
		//日期倒计时
		$.leftTime("<?php echo $time;?>",function(d){
			if(d.status){
				var $dateShow1=$("#dateShow1");
				$dateShow1.find(".d").html(d.d);
				$dateShow1.find(".h").html(d.h);
				$dateShow1.find(".m").html(d.m);
				$dateShow1.find(".s").html(d.s);
			}else{
			apiready = function(){
			var dialogBox = api.require('dialogBox');
				dialogBox.alert({
					texts: {
						content: '因在有效期内未申请会员提现服务，当前额度已失效，请重新申请！ >>',
						leftBtnTitle: '取消',
						rightBtnTitle: '确认'
					},
					styles: {
						bg: '#fff',
						w: 300,
						corner:2,
						 
						content: {
							color: '#000',
							size: 14
						},
						 
						right: {
							marginB: 7,
							marginL: 10,
							w: 70,
							h: 35,
							corner: 2,
							bg: '#f60',
							color: '#fff',
							size: 13
						}
					}
				}, function(ret) {
					if (ret.eventType == 'right') {
						window.location.href="/";
						dialogBox.close({
							dialogName: 'alert'
						});
					}
				});
			};
			return false;
			}
		});
	});<?php endif; ?>
  <?php if($order[status] == -1): ?>$(function(){
		//日期倒计时
			apiready = function(){
			var dialogBox = api.require('dialogBox');
				dialogBox.alert({
					texts: {
						content: '审核未通过，请重新申请！ >>',
						leftBtnTitle: '取消',
						rightBtnTitle: '确认'
					},
					styles: {
						bg: '#fff',
						w: 300,
						corner:2,
						 
						content: {
							color: '#000',
							size: 14
						},
						 
						right: {
							marginB: 7,
							marginL: 10,
							w: 70,
							h: 35,
							corner: 2,
							bg: '#f60',
							color: '#fff',
							size: 13
						}
					}
				}, function(ret) {
					if (ret.eventType == 'right') {
						window.location.href="/";
						dialogBox.close({
							dialogName: 'alert'
						});
					}
				});
			};
			return false;
	});<?php endif; ?>
		function showalert(msg){
			$("#messageBox").html(msg);
			$("#messageBox").show();
			setTimeout(function(){
				$("#messageBox").hide();
			},2000);
		}
		$(document).on("click", "#show-actions", function() {
        $.actions({
          title: "请选择真实提现用途",
          onClose: function() {
            console.log("close");
          },
          actions: [
            {
              text: "生活消费",
              onClick: function() {
                tixian();
              }
            },
            {
              text: "资金周转",
              onClick: function() {
                tixian();
              }
            },
            {
              text: "购物消费",
              onClick: function() {
                tixian();
              }
            }
          ]
        });
      });
	  function tixian(){
		var ordernum = "<?php echo ($order["ordernum"]); ?>";
		$.post(
			"<?php echo U('Order/tixian');?>",
			{
				ordernum:ordernum
			},
			function (data,state){
				if(state != "success"){
					showalert("请求数据失败,请重试!");
					return false;
					 
				}else if(data.status != 1){
					showalert(data.msg);
					return false;
					 
				}else{
					showalert(data.msg);
					setTimeout("window.location.href = '<?php echo U('Order/lists');?>';",2000);
					
					isload = true;
				}
			}
		);
	  };
	  $(function(){
			$('#winbtn3').click(function(){
					$('#deowin31').hide();
					$('#mask3').hide();    
			   });
		});
	$(document).on("click", "#jindu", function() {
			 $.alert("正在放款，请耐心等待短信通知...");
      });
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