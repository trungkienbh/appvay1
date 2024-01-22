<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo ($title); ?> - <?php
 $name = "cfg_sitetitle"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> </title>
    <link href="__PUBLIC__/main/css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="__PUBLIC__/main/js/jquery.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/main/js/global.js"></script>
    <script type="text/javascript" src="__PUBLIC__/main/js/jquery.tab.js"></script>
    <script src="__PUBLIC__/layer/layer.js"></script>
</head>
<body>
<div id="dcWrap">

    <div id="dcHead">
    <div id="head">
        <div class="logo">
          <a href="<?php echo U(GROUP_NAME.'/Main/index');?>">
            <div style="width: 178px;height: 40px;background-image: url('__PUBLIC__/main/images/logo.png');background-size:cover;"></div>
          </a>
        </div>
        <div class="nav">
            <ul>
                <li class="M">
                    <a href="JavaScript:void(0);" class="topAdd">新建</a>
                    <div class="drop mTopad">
                        <a href="<?php echo U(GROUP_NAME.'/Article/add');?>">文章</a>
                        <a href="<?php echo U(GROUP_NAME.'/Article/addcat');?>">文章分类</a>
                        <!--<a href="<?php echo U(GROUP_NAME.'/link/add');?>">友情链接</a>-->
                        <a href="<?php echo U(GROUP_NAME.'/Admin/add');?>">管理员</a>
                    </div>
                </li>
                <li><a href="<?php
 $name = "cfg_siteurl"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?>" target="_blank">查看站点</a></li>
                <li><a href="<?php echo U(GROUP_NAME.'/Main/clearcache');?>">清除缓存</a></li>
                
            </ul>

            <ul class="navRight">
              <li class="M noLeft">
                  <a href="JavaScript:void(0);">您好，<?php echo session('admin_user');?> </a>
                  <div class="drop mUser">
                      <a href="<?php echo U(GROUP_NAME.'/Admin/chagemypass');?>">修改密码</a>
                  </div>
              </li>
              <li class="noRight">
                  <a href="<?php echo U(GROUP_NAME.'/Index/logout');?>">退出</a>
              </li>
          </ul>
        </div>
    </div>
</div>
    <!-- dcHead 结束 -->
    <div id="dcLeft">
	<div id="menu">
      <a href="/index.php?g=Admin&amp;m=Main&amp;a=index">
            <div style="width:178px;height: 40px;background-color: #181a21 !important;color: #fff;text-align: center;line-height: 40px;font-size: 17px;"><?php echo C('cfg_sitename');?>后台管理</div>
          </a>
		<ul class="top">
            <li>
                <a href="<?php echo U(GROUP_NAME.'/Main/index');?>">
                    <i class="home"></i>
                    <em>管理首页</em>
                </a>
            </li>
        </ul>
        <ul>
            <li id="nav_System_index">
                <a href="<?php echo U(GROUP_NAME.'/System/index');?>">
                    <i class="system"></i>
                    <em>系统设置</em>                </a></li>
            <li id="nav_Admin_index">
                <a href="<?php echo U(GROUP_NAME.'/Admin/index');?>">
                    <i class="manager"></i>
                    <em>网站管理员</em>                </a></li>
            <li id="nav_Block_index">
            	<a href="<?php echo U(GROUP_NAME.'/Block/index');?>">
            		<i class="theme"></i>
       		<em>自由块</em></a></li>
            <li id="nav_User_index">
              <a href="<?php echo U('User/index');?>">
                <i class="user"></i>
                <em>用户管理</em>              </a></li>
            <li id="nav_Article_catlist">
                <a href="<?php echo U(GROUP_NAME.'/Article/catlist');?>">
                    <i class="articleCat"></i>
                    <em>文章分类</em>
                </a>
            </li>
            <li id="nav_Article_index">
                <a href="<?php echo U(GROUP_NAME.'/Article/index');?>">
                    <i class="article"></i>
                    <em>文章列表</em>
                </a>
            <li id="nav_Daikuan_index"><a href="<?php echo U(GROUP_NAME.'/Daikuan/index');?>">
            <i class="product"></i>
            <em>借款订单</em> </a></li>
			<li id="nav_Daikuan_index1">
                <a href="<?php echo U(GROUP_NAME.'/Daikuan/index1',array('isYuqi'=>1));?>">
                    <i class="product"></i>
                    <em>逾期订单</em>
				</a></li>
            <li id="nav_Bills_index"><a href="<?php echo U(GROUP_NAME.'/Bills/index');?>">
              <i class="guestbook"></i>
            <em>还款订单</em> </a></li>
            <li id="nav_Payorder_index"><a href="<?php echo U(GROUP_NAME.'/Payorder/index');?>">
              <i class="order"></i>
            <em>订单状态</em> </a></li>
          <li id="nav_Sms_index"><a href="<?php echo U(GROUP_NAME.'/Sms/index');?>">
              <i class="order"></i>
            <em>短信记录</em> </a></li>
            
        </ul>
  </div>
</div>
<script>
    //设置cur效果
    var MODULE_NAME = "<?php echo MODULE_NAME;?>";
    var ACTION_NAME = "<?php echo ACTION_NAME;?>";
    if(MODULE_NAME != "Main"){
        $("#nav_"+MODULE_NAME+"_"+ACTION_NAME).addClass("cur");
    }
</script>


    <div id="dcMain"> <!-- 当前位置 -->
        <div id="urHere">
            <?php echo ($title); ?>
        </div>
        <div id="index" class="mainBox" style="padding-top:18px;height:auto!important;height:550px;min-height:550px;">


            <h3>
    <?php echo ($title); ?>
</h3>
<?php if(isset($yuqi)): else: ?>
<div class="filter">
    <form action="<?php echo U(GROUP_NAME.'/Daikuan/index');?>" method="post">
        <input name="keyword" type="text" class="inpMain" value="<?php echo ($keyword); ?>" size="20" placeholder="请输入手机号" />
        <input name="submit" class="btnGray" type="submit" value="筛选" />
    </form>
</div><?php endif; ?>
<div id="list">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <?php if(isset($yuqi)): ?><th width="50" align="center">ID</th>
                    <th width="120" align="center">订单号</th>
                    <th width="80" align="center">用户名</th>
                    <th width="70">借款金额</th>
                    <th width="70">逾期费用</th>
                    <th width="70">借款期限</th>
                    <th width="150" align="center">创建日期</th>
                    <!--<th width="150" align="center">还款日期</th>-->
                    <!--<th width="80">逾期天数</th>-->
					<th align="center">操作</th>
                    <?php else: ?>
                    <th width="50" align="center">ID</th>
                    <th width="120" align="center">订单号</th>
                    <th width="80" align="center">用户名</th>
                  	<th width="80" align="center" style="color:red">VIP会员</th>
                    <th width="150">借款金额</th>
                    <th width="70">借款期限</th>
                  	 <th width="70">借款利息</th>
                  	 <th width="70" style="color:red">提现申请</th>
                    <th width="150" align="center">创建日期</th>
                    <th width="80">状态</th>
                    <th align="center">操作</th><?php endif; ?>

            </tr>
                <?php if(isset($yuqi)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td align="center"><?php echo ($vo["id"]); ?></td>
                    <td align="center"><?php echo ($vo["ordernum"]); ?></td>
                    <td align="center"><?php echo ($vo["user"]); ?></td>
                    <td align="center"><?php echo ($vo["money"]); ?>元</td>
                <td align="center"><?php echo (($vo["yuqimoney"])?($vo["yuqimoney"]):'未逾期'); ?></td>
                    <td align="center"><?php echo ($vo["months"]); ?>天</td>
                    
                    <td align="center"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
					<!--<td align="center"><?php echo (date('Y-m-d',$vo["last_hk_date"])); ?></td>-->
                    <!--<td><?php echo ($vo["days"]); ?>天</td>-->
					<td align="center">
					<a href="<?php echo U(GROUP_NAME.'/User/userinfo',array('user' => $vo['user']));?>">查看资料</a>|
                    <a href="javascript:del('<?php echo ($vo["ordernum"]); ?>','<?php echo U(GROUP_NAME.'/Bills/del',array('id'=>$vo['id']));?>');">删除订单</a>
					</td><?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php else: ?>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td align="center"><?php echo ($vo["id"]); ?></td>
						<!--隐藏订单 <td align="center"><?php echo ($vo["ordernum"]); ?></td> -->
                        <td align="center">H<?php echo substr_replace(substr($vo[ordernum],1),'****',5,6); ?></td>
                        <td align="center"><?php echo ($vo["user"]); ?></td>
                      	 <td align="center"> <?php if($vo['vip'] == 0 ): ?>否 <?php else: ?><font color="red">是</font><?php endif; ?></td>
                        <td align="center"><?php echo ($vo["money"]); ?>元
						<br>
						<form action="index.php?g=Admin&m=Daikuan&a=changestatus&act=1&id=<?php echo ($vo["id"]); ?>&=<?php echo ($vo["id"]); ?>" method="post">
						<input type="text" name="money" value="" style="width:50px;border:1px solid;">
						<input type="submit" value="修改金额">
						</form>
						</td>
                        <td align="center"><?php echo ($vo["months"]); ?>天</td>
                       <td align="center"><?php echo $vo[monthmoney]-$vo[money];?>元</td>
                      	<td align="center" > <?php if($vo['tixian'] == 0 ): ?>未申请 <?php else: ?><font color="red">已申请</font><?php endif; ?></td>
                        <td align="center"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
                       
                        <?php if($vo['status'] == 0 ): ?><td align="center" style="color:red">支付失败</td>
                            <?php elseif($vo['status'] == 1): ?>
                            <td align="center">审核中</td>
                            <?php elseif($vo['status'] == 2): ?>
                            <td align="center" style="color:green">放款成功</td>
							<?php elseif($vo['status'] == 3): ?>
                            <td align="center" style="color:green">审核通过</td>
							<?php elseif($vo['status'] == 4): ?>
                            <td align="center" style="color:green">正在放款</td>
                            <?php elseif($vo['status'] == -1): ?>
                            <td align="center" style="color:red">审核不通过</td><?php endif; ?>
                        <td align="center">
						    <a href="<?php echo U(GROUP_NAME.'/User/userinfo',array('user' => $vo['user']));?>">查看资料</a>|
                            <a href="javascript:changestatus('<?php echo ($vo["ordernum"]); ?>','<?php echo ($vo["id"]); ?>','status<?php echo ($vo["status"]); ?>');">修改订单状态</a> |
                            <a href="javascript:showbank('<?php echo ($vo["bank"]); ?>','<?php echo ($vo["banknum"]); ?>');">查看打款信息</a> |
                            <a href="javascript:del('<?php echo ($vo["ordernum"]); ?>','<?php echo U(GROUP_NAME.'/Daikuan/del',array('id'=>$vo['id'],'ordernum'=>$vo['ordernum']));?>');">删除订单</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>


        </table>
</div>
<div class="clear"></div>
<div class="pager">
    <?php echo ($page); ?>
	<p style=" margin-top: 10px;"><input type="text" id="input" style="border: #cdcdcd solid 1px;width:100px;"><a class="bt-search" id="button">跳转</a></p>
	<script>
$("document").ready(function(){
    $("#button").click(function(){
        $val = $("#input").val();
        window.location.href = '/index.php?g=Admin&m=Daikuan&a=index&p=' + $val;
    })
})
</script>
</div>
</div>
<script>
    function del(num,jumpurl){
        layer.confirm(
                '确定要删除借款订单:'+num+'吗?',
                function (){
                    window.location.href = jumpurl;
                }
        );
    }
    function showbank(bankname,banknum){
  		layer.alert(
  			'打款银行:' + bankname + "<br>" + '银行卡号:' + banknum,
  			{
	    		skin: 'layui-layer-lan',
	    		closeBtn: 0,
	    		anim: 4
  			}
  		);
    }
    function changestatus(ordernum,oid,check){
    	$("#changestatus_span").html(ordernum);
    	$("#orderid").val(oid);
      	$("input[name='status']").removeAttr("checked",false);
		$("#"+ check).attr("checked",true);
		layer.open({
		  	type: 1,
		  	skin: 'layui-layer-rim', //加上边框
		  	area: ['440px', '195px'], //宽高
		  	content: $("#changestatus_div").html()
		});
    }
    function savestatus(){
    	var id = $("#orderid").val();
    	var status = $('input:radio[name="status"]:checked').val();
    	if(status != 'undefined' && status != '' && status != null){
    		$.post(
    			"<?php echo U(GROUP_NAME.'/Daikuan/changestatus');?>",
    			{id:id,status:status},
    			function(data,state){
    				if(state != "success"){
    					layer.msg("请求数据失败!");
    				}else if(data.status == 1){
    					layer.msg("保存成功!");
    					setTimeout(function(){
    						window.location.href = window.location.href;
    					},2000);
    				}else{
    					layer.msg(data.msg);
    				}
    			}
    		);
    	}else{
    		layer.msg("请选择订单状态!");
    	}
    }
</script>
<div style="display: none;" id="changestatus_div">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <td width="100" align="right">订单号</td>
            <td>
                <span id="changestatus_span"></span>
                <input type="hidden" id="orderid" value="" />
            </td>
        </tr>
        <tr>
            <td align="right">状态</td>
            <td>
               <!-- <label>
                    <input type="radio" id="status0" name="status" value="0" >
					支付失败
                </label>-->
                <label>
                    <input type="radio" id="status1" name="status" value="1" >
					审核中
                </label>
				<label>
                    <input type="radio" id="status3" name="status" value="3"  >
					审核通过
                </label>
				<label>
                    <input type="radio" id="status4" name="status" value="4"  >
					正在放款
                </label>
                <label>
                    <input type="radio" id="status2" name="status" value="2"  >
					放款成功
                </label>
                <label>
                    <input type="radio" id="status-1" name="status" value="-1"  >
					审核不通过
                </label>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" onclick="savestatus();" class="btn" value="提交" />
            </td>
        </tr>
    </table>
</div>


        </div>
    </div>
    <div class="clear"></div>
    	<div id="dcFooter">
		 <div id="footer">
		  <div class="line"></div>
			  <ul>
			   版权所有 © 2018 <a href="/" target="_blank"><?php echo C('cfg_sitename');?></a>，并保留所有权利。
			  </ul>
		 </div>
	</div>

    <!-- dcFooter 结束 -->
    <div class="clear"></div>
</div>
</body>
</html>