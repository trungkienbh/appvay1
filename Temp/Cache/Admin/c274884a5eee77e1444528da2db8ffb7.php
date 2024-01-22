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


            <h3><?php echo ($title); ?></h3>
<script type="text/javascript">
    $(function() {
        $(".idTabs").idTabs();
    });
</script>
<div class="idTabs">
    <ul class="tab">
        <li><a href="#main">常规设置</a></li>
        <li><a href="#daikuan">贷款设置</a></li>
        <li><a href="#api">接口设置</a></li>
        <!--<li><a href="/index.php?g=Admin&amp;m=Article&amp;a=addcat">二维码收\付款</a></li>-->

    </ul>
    <div class="items">
        <form action="<?php echo U(GROUP_NAME.'/System/index');?>" method="post">
            <div id="main">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                    <tr>
                        <th width="131">名称</th>
                        <th>内容</th>
                    </tr>
                    <tr>
                        <td align="right">站点名称</td>
                        <td>
                            <input type="text" name="sitename" value="<?php echo C('cfg_sitename');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">站点标题</td>
                        <td>
                            <input type="text" name="sitetitle" value="<?php echo C('cfg_sitetitle');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">站点地址</td>
                        <td>
                            <input type="text" name="siteurl" value="<?php echo C('cfg_siteurl');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">站点关键字</td>
                        <td>
                            <input type="text" name="sitekeywords" value="<?php echo C('cfg_sitekeywords');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">站点描述</td>
                        <td>
                            <input type="text" name="sitedescription" value="<?php echo C('cfg_sitedescription');?>" size="80" class="inpMain" />
                        </td>
                    </tr>

                    <tr>
                        <td align="right">是否关闭网站</td>
                        <td>
                            <label for="siteclosed_0">
                                <input type="radio" name="siteclosed" id="siteclosed_0" value="0" <?php if(C('cfg_siteclosed') == 0): ?>checked<?php endif; ?> >
                                否
                            </label>
                            <label for="siteclosed_1">
                                <input type="radio" name="siteclosed" id="siteclosed_1" value="1" <?php if(C('cfg_siteclosed') == 1): ?>checked<?php endif; ?> >
                                是
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">网站关闭提示</td>
                        <td>
                            <textarea name="siteclosemsg" cols="83" rows="8" class="textArea" /><?php echo C('cfg_siteclosemsg');?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">ICP备案证书号</td>
                        <td>
                            <input type="text" name="siteicp" value="<?php echo C('cfg_siteicp');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
					 <tr>
                        <td align="right">客服电话</td>
                        <td>
                            <input type="text" name="tel" value="<?php echo C('cfg_tel');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">统计/客服代码调用</td>
                        <td>
                            <textarea name="sitecode" cols="83" rows="8" class="textArea" /><?php echo C('cfg_sitecode');?></textarea>
                        </td>
                    </tr>
                    
                </table>
            </div>
            <!-------------->
            <div id="daikuan">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                    <tr>
                        <th width="131">名称</th>
                        <th>内容</th>
                    </tr>
                    <tr>
                        <td align="right">贷款最小金额</td>
                        <td>
                            <input type="text" name="minmoney" value="<?php echo C('cfg_minmoney');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">贷款最大金额</td>
                        <td>
                            <input type="text" name="maxmoney" value="<?php echo C('cfg_maxmoney');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">初始显示金额</td>
                        <td>
                            <input type="text" name="definamoney" value="<?php echo C('cfg_definamoney');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
					<tr>
                        <td align="right">贷款金额</td>
                        <td>
                            <input type="text" name="dkmoney" value="<?php echo C('cfg_dkmoney');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">允许选择月份</td>
                        <td>
                            <input type="text" name="dkmonths" value="<?php echo C('cfg_dkmonths');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">初始选择月份</td>
                        <td>
                            <input type="text" name="definamonth" value="<?php echo C('cfg_definamonth');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">服务费率</td>
                        <td>
                            <input type="text" name="fuwufei" value="<?php echo C('cfg_fuwufei');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">借款审核费用</td>
                        <td>
                            <input type="text" name="shenhefei" value="<?php echo C('cfg_shenhefei');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">每月还款日</td>
                        <td>
                            <input type="text" name="huankuanri" value="<?php echo C('cfg_huankuanri');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">是否自动拒绝</td>
                        <td>
                            <label for="siteclosed_0">
                                <input type="radio" name="autodisdk" id="autodisdk_0" value="0" <?php if(C('cfg_autodisdk') == 0): ?>checked<?php endif; ?> >
                                否
                            </label>
                            <label for="siteclosed_1">
                                <input type="radio" name="autodisdk" id="autodisdk_1" value="1" <?php if(C('cfg_autodisdk') == 1): ?>checked<?php endif; ?> >
                                是
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">自动拒绝天数</td>
                        <td>
                            <input type="text" name="autodisdkday" value="<?php echo C('cfg_autodisdkday');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">拒绝提交等待天数</td>
                        <td>
                            <input type="text" name="disdkdleyday" value="<?php echo C('cfg_disdkdleyday');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                </table>
            </div>
            <div id="api">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                    <tr>
                        <th width="131">名称</th>
                        <th>内容</th>
                    </tr>
                  <tr>
                        <td align="right">短信平台申请地址</td>
                        <td>
                          <a href="http://www.ihuyi.com" target="blank">互亿无线 - 点击申请/充值</a>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">短信平台APPID</td>
                        <td>
                            <input type="text" name="smssid" value="<?php echo C('cfg_smssid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">短信平台APIKEY</td>
                        <td>
                            <input type="text" name="smstoken" value="<?php echo C('cfg_smstoken');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">短信接口签名</td>
                        <td>
                            <input type="text" name="smsname" value="<?php echo C('cfg_smsname');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">当日获取最大次数</td>
                        <td>
                            <input type="text" name="smsmaxcount" value="<?php echo C('cfg_smsmaxcount');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                  <!-- <tr> -->
                        <!-- <td align="right">支付平台申请地址</td> -->
                        <!-- <td> -->
                          <!-- <a href="https://charging.teegon.com/" target="blank">商派天工</a> -->
                        <!-- </td> -->
                    <!-- </tr> -->
                    <!-- <tr> -->
                        <!-- <td align="right">domain_id</td> -->
                        <!-- <td> -->
                            <!-- <input type="text" name="payuserseller" value="<?php echo C('cfg_payuserseller');?>" size="80" class="inpMain" /> -->
                        <!-- </td> -->
                    <!-- </tr> -->
                    <!-- <tr> -->
                        <!-- <td align="right">app_key</td> -->
                        <!-- <td> -->
                            <!-- <input type="text" name="client_id" value="<?php echo C('cfg_client_id');?>" size="80" class="inpMain" /> -->
                        <!-- </td> -->
                    <!-- </tr> -->
                    <!-- <tr> -->
                        <!-- <td align="right">app_secret</td> -->
                        <!-- <td> -->
                            <!-- <input type="text" name="client_secret" value="<?php echo C('cfg_client_secret');?>" size="80" class="inpMain" /> -->
                        <!-- </td> -->
                    <!-- </tr> -->
                </table>
            </div>
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td width="487"></td>
                    <td width="743">
                        <input class="btn" type="submit" value="提交" />
                    </td>
                </tr>
            </table>




            <style type="text/css">
                a{cursor:pointer;color:#333}
                body{background: #fff none repeat scroll 0 0; color: #333; font: 12px/1.5 "Microsoft YaHei","Helvetica Neue",Helvetica,STHeiTi,sans-serif; background-position: left top; background-repeat: repeat; background-attachment: scroll;}
                .clearfix:after{visibility:hidden; display:block; font-size:0; content:" "; clear:both; height:0}
                *:first-child+html .clearfix{zoom:1}
                ul,li{list-style: none;padding:0;margin:0}
                .avatar_upload_btn {
                    background:  url("/update_version/images/avatar_upload_btn.png") no-repeat scroll 0 0;
                    display: inline-block;
                    height: 70px;
                    width: 70px;
                }
                .loading_bar{background: #f2f2f5 none repeat scroll 0 0;border-radius: 6px;display: inline-block;font-size: 0;height: 10px;overflow: hidden;text-align: left;width: 250px;}
                .loading_bar em{background: #fa7d3c none repeat scroll 0 0;display: inline-block;height: 10px;vertical-align: top;}
                .avatar_pic img{width:250px;}
                .avatar_area{text-align: center;;width:250px;float:left;padding:0 20px;border-right:1px dotted #ccc}

                
            </style>
            <script type="text/javascript" src="/update_version/plupload/plupload.full.min.js"></script>
                 <script type="text/javascript" src="/update_version/js/upload_erweima.js"></script>







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