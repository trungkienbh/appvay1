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
</head>
<body>
	<div id="bxb-app" class="bxb-bottom-num bxb-relative">
		
		<div class="bxb-user-box">
			
			<div class="bxb-user-header bxb-flex bxb-relative">
				
				<div class="con bxb-flex">
					<div class="pic bxb-flex">
						<svg class="icon" aria-hidden="true">
						    <use xlink:href="#icon-renzhenghuiyuan"></use>
						</svg>
					</div>

					<div class="text">
                      
						<?php echo substr($user, 0, 3).'****'.substr($user, 7); ?>
					</div>
				</div>

				<div class="infor bxb-absolute">
					<svg class="icon" aria-hidden="true">
					    <use xlink:href="#icon-youxiang"></use>
					</svg>
				</div>

			</div>

			 

			<div class="link-list link-list01 bxb-m10-top">
				<div class="weui-cells">
                  <a class="weui-cell weui-cell_access" href="<?php echo U('Info/index');?>">
				    <div class="weui-cell__bd">
				      <p>
				      <svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-auth"></use>
		    		  </svg>
				      我的认证</p>
				    </div>
				    <div class="weui-cell__ft">
				    </div>
				  </a>
                  <?php if($bankinfo == 1): ?><a class="weui-cell weui-cell_access" href="javascript:tishi();">
                    <?php elseif($baseinfo == 0): ?>
                    <a class="weui-cell weui-cell_access" href="javascript:tishi1();">
                    <?php else: ?>
				  <a class="weui-cell weui-cell_access" href="<?php echo U('Info/bankinfo');?>"><?php endif; ?>
				    <div class="weui-cell__bd">
				      <p>
				      <svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-xinyongqiahuankuan"></use>
		    		  </svg>
				      我的银行卡</p>
				    </div>
				    <div class="weui-cell__ft">
				    </div>
				  </a>
				 
				  <a class="weui-cell weui-cell_access" href="<?php echo U('User/vip');?>">
				    <div class="weui-cell__bd">
				      <p>
				      <svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-ly_huiyuanka"></use>
		    		  </svg>
				      会员卡</p>
				    </div>
				    <div class="weui-cell__ft">
				    </div>
				  </a>
				  <a class="weui-cell weui-cell_access" href="<?php echo U('Info/inviteInfo');?>">
				    <div class="weui-cell__bd">
				      <p>
				      <svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-yaoqing"></use>
		    		  </svg>
				      邀请好友赚现金</p>
				    </div>
				    <div class="weui-cell__ft">
				    </div>
				  </a>
				</div>
			</div>

			<div class="link-list link-list02 bxb-m10-top">
				<div class="weui-cells">
				  <a class="weui-cell weui-cell_access" href="tel:<?php echo C('cfg_tel');?>">
				    <div class="weui-cell__bd">
				      <p>
				      <svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-dianhua"></use>
		    		  </svg>
				      客服电话</p>
				    </div>
				    <div class="weui-cell__ft"><?php echo C('cfg_tel');?>
				    </div>
				  </a>
				  <a class="weui-cell weui-cell_access" href="<?php echo U('Help/index');?>">
				    <div class="weui-cell__bd">
				      <p>
				      <svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-xinxi"></use>
		    		  </svg>
				      常见问题</p>
				    </div>
				    <div class="weui-cell__ft">
				    </div>
				  </a>
				  <a class="weui-cell weui-cell_access" href="javascript:void(0)">
				    <div class="weui-cell__bd">
				      <p>
				      <svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-i"></use>
		    		  </svg>
				      版本号</p>
				    </div>
				    <div class="weui-cell__ft">V1.2.6
				    </div>
				  </a>
				  <a class="weui-cell weui-cell_access" href="<?php echo U('User/setup');?>">
				    <div class="weui-cell__bd">
				      <p>
				      <svg class="icon" aria-hidden="true">
		    		    <use xlink:href="#icon-ai-set"></use>
		    		  </svg>
				      设置</p>
				    </div>
				    <div class="weui-cell__ft">
				    </div>
				  </a>

				 
				</div>
			</div>

			

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
				<li class="bill">
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
				<li class="user focus">
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
                <a id="winbtn3" href="javascript:close();">确定</a>
        </div>
    </div>
</div>
	<script type="text/javascript" src="__PUBLIC__/news/js/jquery-1.11.3.min.js"></script>
	
	<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_pavz20itw1.js"></script>

<script type="text/javascript">
      function tishi(){
         $(".tex").html('银行卡已经绑定成功！');
        $("#deowin31").show();
        $('#mask3').show();
      };
	  function tishi1(){
         $(".tex").html('请先完成身份认证！');
        $("#deowin31").show();
        $('#mask3').show();
      };
     function close(){
            $('#deowin31').hide();
            $('#mask3').hide();    
       };
	</script>
</body>
</html>