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
	<div id="bxb-app" class=" bxb-p94-top bxb-relative">
		<div id="bxb-top-bar" class="bxb-top-bar bxb-relative bxb-flex">
			<a href="javascript:void(0);" onClick="javascript :history.back(-1);" class="btn pull-left bxb-text-left pic">
				<svg class="icon" aria-hidden="true">
				    <use xlink:href="#icon-iconfont0104"></use>
				</svg>
			</a>
			<h5 class="tit bxb-text-center">紧急联系人</h5>
			
		</div>

		<div class="bxb-cardHk-box ">

			<div class="bxb-form-box">
				<div class="weui-cells__title">紧急联系人1</div>
				<div class="weui-cells weui-cells_form">
					

					<div class="weui-cell weui-cell_access">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-guanxi"></use>
								</svg>
				        		与本人关系
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" name="personname1" value="<?php echo ($userinfo["persongx_1"]); ?>" id="zxqsname1" placeholder="请选择关系" >
			    		</div>
			    		 
					</div>
				    <div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-xingming"></use>
								</svg>
				        		联系人姓名
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" type="text"  value="<?php echo ($userinfo["personname_1"]); ?>" id="xingming1" placeholder="联系人姓名">
			    		</div>
					</div>
					<div class="weui-cell weui-cell_icon">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-shoujihao"></use>
								</svg>
				        		手机号码
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input"  type="text" value="<?php echo ($userinfo["personphone_1"]); ?>"  name="phone1" id="phone1" placeholder="手机号码">
			    		</div>			
			    		<svg class="icon bxb-focus right" aria-hidden="true">
						    <use xlink:href="#icon-tongxunlu"></use>
						</svg>
							
					</div>
				</div>
			</div>

			<div class="bxb-form-box">
				<div class="weui-cells__title">紧急联系人2</div>
				<div class="weui-cells weui-cells_form">
					

					<div class="weui-cell weui-cell_access">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-guanxi"></use>
								</svg>
				        		与本人关系
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" id="zxqsname2" value="<?php echo ($userinfo["persongx_2"]); ?>" name="personname2" placeholder="请选择关系">
			    		</div>
			    		 
					</div>
				    <div class="weui-cell">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-xingming"></use>
								</svg>
				        		联系人姓名
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" type="text" id="xingming2"  value="<?php echo ($userinfo["personname_2"]); ?>" placeholder="联系人姓名">
			    		</div>
					</div>
					<div class="weui-cell weui-cell_icon">
				        <div class="weui-cell__hd">
				        	<label class="weui-label">
								<svg class="icon" aria-hidden="true">
								    <use xlink:href="#icon-shoujihao"></use>
								</svg>
				        		手机号码
				        	</label>
				        </div>
			    	 	<div class="weui-cell__bd">
			     			<input class="weui-input" type="text" id="phone2"  value="<?php echo ($userinfo["personphone_2"]); ?>" name="phone2" placeholder="手机号码">
			    		</div>			
			    		<svg class="icon bxb-focus right" aria-hidden="true">
						    <use xlink:href="#icon-tongxunlu"></use>
						</svg>
							
					</div>
				</div>
			</div>

			<div class="bxb-certification-note bxb-p30">
				<p>1.请填写真实信息利于快速通过审核</p>
				<p>2.您提交的所有信息我们都将严格保密</p>
			</div>
			
			
			<div class="bxb-form-btn ">
				<button type="button" class="weui-btn weui-btn_primary" onClick="saveInfo();">提交</button>
			</div>
		</div>
	</div>
<!-- 提示 -->
		<div style="display: none;" class="errdeo" id="messageBox">
		</div>	
	<script type="text/javascript" src="__PUBLIC__/news/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="http://at.alicdn.com/t/font_822806_vgb7ik22ee.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/js.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/jquery-weui.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/news/js/swiper-4.3.5.min.js"></script>

	<script type="text/javascript" src="__PUBLIC__/news/js/city-picker.min.js"></script>

	<script type="text/javascript">
       $(function(){
       		$("#zxqsname1").picker({
       		  title: "与本人关系",
       		  value:"",
       		  cols: [
       		    {
       		      textAlign: 'center',
       		      values: ['父母', '同事', '兄妹', '夫妻', '亲戚', '朋友']
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

       		$("#zxqsname2").picker({
       		  title: "与本人关系",
       		  value:"",
       		  cols: [
       		    {
       		      textAlign: 'center',
       		      values: ['父母', '同事', '兄妹', '夫妻', '亲戚', '朋友']
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
     $('#xingming1').click(function(){
  			var contacts = api.require('contacts');
            contacts.select(function(ret, err) {
                if (ret) {
                  	if(ret.fullName){
                      $("#xingming1").val(ret.fullName);
                      var data1 = ret.phones[0];
                     
                      for(var tmp in data1){
                      	$("#phone1").val(data1[tmp]);
                    	}
                	}else{
                    alert("获取联系人信息失败,请重新设置应用权限或者重新安装!");
                    }
                } else {
                    alert(err);
                }
            });
  			
    });
$('#xingming2').click(function(){
  			var contacts = api.require('contacts');
            contacts.select(function(ret, err) {
                if (ret) {
                     if(ret.fullName){
                  	  $("#xingming2").val(ret.fullName);
                      var data1 = ret.phones[0];
                      for(var tmp in data1){
                      	$("#phone2").val(data1[tmp]);
                    	}
                     }else{
                    alert("获取联系人信息失败,请重新设置应用权限或者重新安装!");
                    }
                } else {
                    alert(JSON.stringify(err));
                }
            });
    });
	</script>
<script>
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
	
	var personname_1 = $("#xingming1").val();
	var personname_2 = $("#xingming2").val();
	var personphone_1 = $("#phone1").val();
	var personphone_2 = $("#phone2").val();
	var persongx_1 = $("#zxqsname1").val();
	var persongx_2 = $("#zxqsname2").val();
	if(checkval(persongx_1) && checkval(persongx_2) && checkval(personname_1) && checkval(personname_2) && checkval(personphone_1) && checkval(personphone_2) ){
		$.post(
			"<?php echo U('Info/unitinfo');?>",
			{
				 
				personname_1:personname_1,
				personname_2:personname_2,
				personphone_1:personphone_1,
				personphone_2:personphone_2,
				persongx_1:persongx_1,
				persongx_2:persongx_2
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