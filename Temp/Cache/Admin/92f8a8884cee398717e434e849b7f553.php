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
    <a href="<?php echo U(GROUP_NAME.'/Block/add');?>" class="actionBtn add">
        添加自由块
    </a>
    <?php echo ($title); ?>
</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <th width="30">ID</th>
            <th width="300" align="left">名称</th>
            <th width="140" align="left">添加时间</th>
            <th width="100" align="center">操作</th>
        </tr>
        <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
                <td align="center"><?php echo ($vo["id"]); ?></td>
                <td align="left"><?php echo ($vo["name"]); ?></td>
                <td><?php echo (date("Y/m/d",$vo["addtime"])); ?></td>
                <td align="center">
                    <a href="<?php echo U(GROUP_NAME.'/Block/edit',array('id'=>$vo['id']));?>">编辑</a> |
                    <a href="javascript:delCat('<?php echo ($vo["name"]); ?>','<?php echo U(GROUP_NAME.'/Block/del',array('id'=>$vo['id']));?>');">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
<script>
    function delCat(name,jumpurl){
        layer.confirm(
                '确定要删除自由块:['+name+']吗?',
                function (){
                    window.location.href = jumpurl;
                }
        );
    }
</script>


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