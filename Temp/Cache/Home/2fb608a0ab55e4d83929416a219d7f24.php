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
	 <div class="loading" id="loading">
		<img src="/Public/home/imgs/loading-0.gif" alt="加载中">
	</div> 
	<div id="bxb-app" class="bxb-bottom-num bxb-p94-top bxb-relative">
		<div id="bxb-top-bar" class="bxb-top-bar bxb-relative bxb-flex">
			<a href="/index.php?m=User&a=index" class="btn pull-left bxb-text-left pic">
				<svg class="icon" aria-hidden="true">
				    <use xlink:href="#icon-iconfont0104"></use>
				</svg>
			</a>
			<h5 class="tit bxb-text-center">我的认证</h5>
			
		</div>

		<div class="bxb-certification-box">
			<div class="bxb-certification-card bxb-relative bxb-p40 bxb-bg-fff">
				<div class="card-box bxb-flex bxb-margin-center bxb-relative bxb-z10">
					<div class="txt">
						<p>最高20,000额度</p>
						<p class="bxb-m10-top">急速审核，闪电借款</p>
					</div>
					<div class="process bxb-relative">
						<div class="money bxb-absolute bxb-text-center">
							<h6><span><?php echo ($info['quota']); ?></span></h6>
							<p>当前额度</p>
						</div>
						<div id="svgView" class="svgView">
							
						</div>
					</div>
				</div>

				<div class="bg02 bxb-absolute bxb-z5"></div>
				<div class="bg01 bxb-absolute bxb-z1"></div>
			</div>

			<div class="bxb-certification-rz bxb-bg-fff bxb-m15-top">
				<div class="bxb-tit-num01">
					<h6><span></span>基本认证（必填）</h6>
					<div class="bxb-line1px"></div>
				</div>

				<div class="con">
					<ul class="bxb-flex bxb-text-center">
						<li>
							 <?php if($info['baseinfo'] == 1): ?><a href="javascript:tishi();" class="bxb-block bxb-line1px-right">
								 <?php else: ?>
					    			<a href="<?php echo U('Info/baseinfo');?>" class="bxb-block bxb-line1px-right"><?php endif; ?>
								<div class="btn">
									<svg class="icon" aria-hidden="true">
									    <use xlink:href="#icon-shenfenzhenghao"></use>
									</svg>
								</div>
								<div class="text">
									<h6>身份认证</h6>
									<p>前往认证</p>
								</div>
							</a>
						</li>

						<li>
							 <?php if($info['unitinfo'] == 1): ?><a  href="javascript:tishi();" class="bxb-block bxb-line1px-right">
                  <?php else: ?>
	    		<a  href="<?php echo U('Info/unitinfo');?>" class="bxb-block bxb-line1px-right"><?php endif; ?>
							
								<div class="btn">
									<svg class="icon" aria-hidden="true">
									    <use xlink:href="#icon-wodexuanzhong"></use>
									</svg>
								</div>
								<div class="text">
									<h6>联系人信息</h6>
									<p>前往认证</p>
								</div>
							</a>
						</li>

						<li>
							<?php if($info['phoneinfo'] == 1): ?><a href="javascript:tishi();" class="bxb-block bxb-line1px-right">
				                  <?php else: ?>
					    		<a href="<?php echo U('Info/phoneinfo');?>" class="bxb-block bxb-line1px-right"><?php endif; ?>
							 
								<div class="btn">
									<svg class="icon" aria-hidden="true">
									    <use xlink:href="#icon-shoujihao"></use>
									</svg>
								</div>
								<div class="text">
									<h6>手机认证</h6>
									<p>前往认证</p>
								</div>
							</a>
						</li>

						<li>
							<a href="/index.php?m=Info&a=inviteInfo" class="bxb-block bxb-line1px-right">
								<div class="btn">
									<svg class="icon" aria-hidden="true">
									    <use xlink:href="#icon-yaoqing"></use>
									</svg>
								</div>
								<div class="text">
									<h6>邀请好友</h6>
									<p>去邀请</p>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="bxb-certification-rz bxb-bg-fff bxb-m15-top">
				<div class="bxb-tit-num01">
					<h6><span></span>增额项</h6>
					<div class="bxb-line1px"></div>
				</div>

				<div class="con">
					<ul class="bxb-flex bxb-text-center">
						<li>
							<?php if($info['workinfo'] == 1): ?><a  href="javascript:tishi();" class="bxb-block bxb-line1px-right">
				                  <?php else: ?>
					    		<a  href="<?php echo U('Info/workinfo');?>" class="bxb-block bxb-line1px-right"><?php endif; ?>
							 
								<div class="btn">
									<svg class="icon" aria-hidden="true">
									    <use xlink:href="#icon-dkw_gongjijin"></use>
									</svg>
								</div>
								<div class="text">
									<h6>工作信息</h6>
									<p>前往完善</p>
								</div>
							</a>
						</li>

						<li>
							 <?php if($info['moreinfo'] == 1): ?><a  href="javascript:tishi();" class="bxb-block bxb-line1px-right">
				                  <?php else: ?>
					    		<a  href="<?php echo U('Info/moreinfo');?>" class="bxb-block bxb-line1px-right"><?php endif; ?>
							 
								<div class="btn">
									<svg class="icon" aria-hidden="true">
									    <use xlink:href="#icon-renlishebao"></use>
									</svg>
								</div>
								<div class="text">
									<h6>社交账号</h6>
									<p>前往完善</p>
								</div>
							</a>
						</li>

						 <li>
							<?php if($info['creditinfo'] == 1): ?><a  href="javascript:tishi();" class="bxb-block bxb-line1px-right">
				                  <?php else: ?>
					    		<a  href="<?php echo U('Info/creditinfo');?>" class="bxb-block bxb-line1px-right"><?php endif; ?>
								<div class="btn">
									<svg class="icon" aria-hidden="true">
									   
                                       <use xlink:href="#icon-xinyongqiahuankuan"></use>
									</svg>
								</div>
								<div class="text">
									<h6>信用卡</h6>
									<p>前往认证</p>
								</div>
							</a>
						</li> 

						<li>
							<a href="" class="bxb-block bxb-line1px-right">
								<div class="btn">
									<svg class="icon" aria-hidden="true">
									    <use xlink:href="#icon-gengduo1"></use>
									</svg>
								</div>
								<div class="text">
									<h6>更多认证</h6>
									<p>前往认证</p>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>



			<div class="bxb-certification-note bxb-p30">
				<p>1.请填写真实信息利于快速通过审核</p>
				<p>2.您提交的所有信息我们都将严格保密</p>
				<p>3.增额认证信息通过后可提高审批额度</p>
			</div>

			<div class="bxb-form-btn bxb-margin-center">
				<a href="/" class="weui-btn weui-btn_primary">申请借款</a>
			</div>
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
	 
	<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_h5d1zwytsak.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/js.js"></script>
	<script type="text/javascript">
		$(function(){

			var xW = $("#svgView").width()/2;
         	var yW = $("#svgView").height()/2;
         	var zW = $("#svgView").height()/2*0.9;
         	/**
         	 * 传入相应参数返回圆形制定半径的弧度坐标
         	 * @param {*} x 中心点X坐标
         	 * @param {*} y 中心点y坐标
         	 * @param {*} R 圆半径
         	 * @param {*} a 角度
         	 */
         	function coordMap(x, y, R, a) {
         	  var ta = (360 - a) * Math.PI / 180,
         	    tx, ty;
         	  tx = R * Math.cos(ta); // 角度邻边
         	  ty = R * Math.sin(ta); // 角度的对边
         	  return {
         	    x: x + tx,
         	    y: y - ty // 注意此处是“-”号，因为我们要得到的Y是相对于（0,0）而言的。
         	  }
         	}

         	/**
         	 * 创建弧线
         	 * @param {*} data.startAngle 开始角度
         	 * @param {*} data.endAngle 结束角度
         	 * @param {*} data.R 圆半径
         	 * @param {*} data.x 中心点X坐标
         	 * @param {*} data.y 中心点y坐标
         	 * @param {*} data.color 边框颜色  默认#CCC
         	 * @param {*} data.strokeWidth 边框宽度 默认1
         	 * @param {*} data.strokelinecap 不同类型的路径的开始结束点 可选值 butt round square  默认butt
         	 * @param {*} data.strokeDasharray 虚线设置 它是一个<length>和<percentage>数列，数与数之间用逗号或者
         	 * 空白隔开，指定短划线和缺口的长度。如果提供了奇数个值，则这个值的数列重复一次，从而变成偶数个值。因此，5,3,2等同于5,3,2,5,3,2。
         	 * @param {*} data.transform CSS3旋转设置  
         	 */
         	function drawSVG(data) {
         	  var path,
         	    // 起点坐标
         	    s = new coordMap(data.x, data.y, data.R, data.startAngle),
         	    // 结束坐标
         	    e = new coordMap(data.x, data.y, data.R, data.endAngle),
         	    // 创建弧线路径
         	    tpath = document.createElementNS("http://www.w3.org/2000/svg", "path");
         	  // 画一段到(x,y)的椭圆弧. 椭圆弧的 x, y 轴半径分别为 rx,ry. 椭圆相对于 x 轴旋转 x-axis-rotation 度. large-arc=0表明弧线小于180读, large-arc=1表示弧线大于180度. sweep=0表明弧线逆时针旋转, sweep=1表明弧线顺时间旋转.
         	  // svg : [A | a] (rx ry x-axis-rotation large-arc-flag sweep-flag x y)+ 
         	  path = 'M' + s.x + ',' + s.y + 'A' + data.R + ',' + data.R + ',0,' + (+(data.endAngle - data.startAngle > 180)) + ',1,' + e.x + ',' + e.y;
         	  // 设置路径
         	  tpath.setAttribute('d', path);
         	  // 去掉填充
         	  tpath.setAttribute("fill", "none");
         	  // 设置颜色
         	  tpath.setAttribute('stroke', data.color || '#CCC');
         	  // 边线宽度
         	  tpath.setAttribute('stroke-width', data.strokeWidth || 1);
         	  data.strokelinecap ? tpath.setAttribute('stroke-linecap', data.strokelinecap) : '';
         	  data.strokeDasharray ? tpath.setAttribute('stroke-dasharray', data.strokeDasharray) : '';
         	  data.transform ? tpath.setAttribute('transform', data.transform) : '';
         	  return tpath;
         	}

         	/**
         	 * 画进度条
         	 * @param {*} $select  容器
         	 * @param {*} size 多少步 共100步
         	 */
         	
         	function svgView($select, size) {
         	  var size = size,
         	    // 创建SVG
         	    svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
         	  svg.setAttribute("version", "1.1"); // IE9+ support SVG 1.1 version
         	  svg.setAttribute("width", "2.2rem");
         	  svg.setAttribute("height", "2.2rem");
         	  
         	  
         	  // 画底线并加入SVG中
         	
         	  	svg.appendChild(new drawSVG({
         	  	  startAngle: 45,
         	  	  endAngle: 315,
         	  	  x:$("#svgView").width()/2,
         	  	  y:$("#svgView").width()/2,
         	  	  R:$("#svgView").width()/2*0.9,
         	  	  strokelinecap: 'round',
         	  	  color: '#FFF',
         	  	  strokeWidth: 5,
         	  	  transform: 'rotate(0, 0, 0)'
         	  	}));
         	  
         	  
         	  // 步长
         	  var step = (315 - 45) / 100,
         	    i = 1;
         	  // 画第一步并加入SVG中
         	  svg.appendChild(new drawSVG({
         	    startAngle: 45,
         	    endAngle: 45 + step * i,
         	    x:$("#svgView").width()/2,
         	    y:$("#svgView").width()/2,
         	    R:$("#svgView").width()/2*0.9,
         	    strokelinecap: 'round',
         	    strokeWidth: 5,
         	    color: '#ffe400',
         	    transform: 'rotate(0, 0, 0)'
         	  }));
         	  // 写入页面
         	  document.querySelector($select).appendChild(svg);
         	  // 通过设置时间循环步
         	  var tc = setInterval(function() {
         	    // console.log(i, '----', 45 + step * i, '-----', 315);
         	    // 创建新的弧线 替换进度弧线
         	    svg.replaceChild(new drawSVG({
         	      startAngle: 45,
         	      endAngle: 45 + step * i,
         	      x:$("#svgView").width()/2,
         	      y:$("#svgView").width()/2,
         	      R:$("#svgView").width()/2*0.9,
         	      strokelinecap: 'round',
         	      strokeWidth: 5,
         	      color: '#ffe400',
         	      transform: 'rotate(0, 0, 0)'
         	    }), svg.lastChild);
         	    i++;
         	    if (i > size) {
         	      clearInterval(tc);
         	    }
         	  }, 20);
         	};
         	svgView('#svgView', <?php echo ($info['quota']); ?>/100*2);
		})
	</script>
<script type="text/javascript">
		window.onload=function(){
		        document.getElementById("loading").style.display="none";
		    };
	</script>
<script type="text/javascript">
      function tishi(){
         $(".tex").html('资料已经提交过，请不要重复提交！');
        $("#deowin31").show();
        $('#mask3').show();
      };
	  function tishi1(){
         $(".tex").html('请先完善身份信息！');
        $("#deowin31").show();
        $('#mask3').show();
      };
	  function tishi2(){
         $(".tex").html('请先完成基础认证！');
        $("#deowin31").show();
        $('#mask3').show();
      };
     function close(){
            $('#deowin31').hide();
            $('#mask3').hide();    
       };
	</script>
<div style="display: none;">
	<?php
 $name = "cfg_sitecode"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?>
</div>
</body>
</html>