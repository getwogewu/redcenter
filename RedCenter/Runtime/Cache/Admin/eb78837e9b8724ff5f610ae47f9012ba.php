<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>会员中心</title>
    <link rel="stylesheet" href="/RedCenter/RedCenter/Admin/Public/css/style.default.css" type="text/css" />
    <script type="text/javascript" src="/RedCenter/RedCenter/Admin/Public/js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="/RedCenter/RedCenter/Admin/Public/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="/RedCenter/RedCenter/Admin/Public/js/plugins/jquery.cookie.js"></script>
    <script type="text/javascript" src="/RedCenter/RedCenter/Admin/Public/js/plugins/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="/RedCenter/RedCenter/Admin/Public/js/plugins/jquery.flot.min.js"></script>
    <script type="text/javascript" src="/RedCenter/RedCenter/Admin/Public/js/plugins/jquery.flot.resize.min.js"></script>
    <script type="text/javascript" src="/RedCenter/RedCenter/Admin/Public/js/plugins/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="/RedCenter/RedCenter/Admin/Public/js/custom/general.js"></script>
    <script type="text/javascript" src="/RedCenter/RedCenter/Admin/Public/js/custom/dashboard.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/RedCenter/RedCenter/Admin/Public/js/plugins/excanvas.min.js"></script><![endif]-->
    <!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="/RedCenter/RedCenter/Admin/Public/css/style.ie9.css"/>
    <![endif]-->
    <!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="/RedCenter/RedCenter/Admin/Public/css/style.ie8.css"/>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="/RedCenter/RedCenter/Admin/Public/js/plugins/css3-mediaqueries.js"></script>
    <![endif]-->
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">REDROCK.<span>会员中心</span></h1>
            <span class="slogan">后台管理系统</span>
            <div class="search">
                <form action="" method="post">
                    <input type="text" name="keyword" id="keyword" value="请输入" />
                    <button class="submitbutton"></button>
                </form>
            </div><!--search-->
            <br clear="all" />
        </div><!--left-->
        <div class="right">
            <!--<div class="notification">
                <a class="count" href="ajax/notifications.html"><span>9</span></a>
            </div>-->
            <div class="userinfo">
                <img src="/RedCenter/RedCenter/Admin/Public/images/thumbs/avatar.png" alt="" />
                <span>管理员</span>
            </div><!--userinfo-->
            <div class="userinfodrop">
                <div class="avatar">
                    <a href=""><img src="/RedCenter/RedCenter/Admin/Public/images/thumbs/avatarbig.png" alt="" /></a>
                    <div class="changetheme">
                        切换主题: <br />
                        <a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>
                </div><!--avatar-->
                <div class="userdata">
                    <h4><?php echo ($user_name); ?></h4>
                    <span class="email"><?php echo ($user_email); ?></span>
                    <ul>
                        <li><a href="editprofile.html">编辑资料</a></li>
                        <li><a href="accountsettings.html">账号设置</a></li>
                        <li><a href="help.html">帮助</a></li>
                        <li><a href="<?php echo U('Admin/Index/logout');;?>">退出</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->

    <div class="header">
        <ul class="headermenu">
            <li class="current"><a href="<?php echo U('Admin/Index/index');?>"><span class="icon icon-flatscreen"></span>首页</a></li>
            <li><a href="<?php echo U('Admin/Rbac/index');?>"><span class="icon icon-pencil"></span>用户权限</a></li>
            <li><a href="messages.html"><span class="icon icon-message"></span>应用管理</a></li>
            <li><a href="reports.html"><span class="icon icon-chart"></span>积分管理</a></li>
        </ul>
    </div><!--header-->

    <div class="vernav2 iconmenu">
        <ul>
            <li><a href="#formsub" class="editor">用户权限</a>
                <span class="arrow"></span>
                <ul id="formsub">
                    <li><a href="<?php echo U('Admin/Rbac/index');?>">用户列表</a></li>
                    <li><a href="<?php echo U('Admin/Rbac/role');?>">权限列表</a></li>
                    <li><a href="<?php echo U('Admin/Rbac/node');?>">节点列表</a></li>
                </ul>
            </li>
            <li><a href="#project" class="elements">应用管理</a>
                <span class="arrow"></span>
                <ul id="project">
                    <li><a href="forms.html">应用列表</a></li>
                </ul>
            </li>

            <li><a href="#integral" class="support">积分管理</a>
                <span class="arrow"></span>
                <ul id="integral">
                    <li><a href="forms.html">积分细则</a></li>
                    <li><a href="forms.html">积分等级</a></li>
                </ul>
            </li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
    <div class="centercontent">
    
<div class="pageheader">
    <h1 class="pagetitle">用户管理</h1>
    <span class="pagedesc">新增用户</span>
    <!--<ul class="hornav">-->
    <!--<!--<li><a href="#updates">最新更新</a></li>-->
    <!--<li class="current"><a href="#activities">最近活动</a></li>-->
    <!--</ul>-->
</div><!--pageheader-->

<div id="contentwrapper" class="contentwrapper">

    <div id="updates" class="subcontent">

            <form class="stdform stdform2" method="post" action="<?php echo U('Admin/Rbac/addUserHandle');?>">
                <p>
                    <label>学号</label>
                    <span class="field"><input type="text" name="stu_num" id="firstname2" class="longinput" /></span>
                </p>

                <p>
                    <label>身份证后六位</label>
                    <span class="field"><input type="text" name="stu_idcard" id="lastname2" class="longinput" /></span>
                </p>

                <!--<p>-->
                    <!--<label>Radio Buttons</label>-->
                            <!--<span class="field">-->
                            	<!--<input type="radio" name="radiofield" /> Unchecked Radio &nbsp; &nbsp;-->
                            	<!--<input type="radio" name="radiofield" checked="checked" /> Checked Radio &nbsp; &nbsp;-->
                                <!--<input type="radio" name="radiofield" disabled="disabled" /> Disabled Radio  &nbsp; &nbsp;-->
                                <!--<input type="radio" name="radiofield" checked="checked" disabled="disabled" /> Disabled Radio-->
                            <!--</span>-->
                <!--</p>-->

                <p>
                    <label>邮箱</label>
                    <span class="field"><input type="text" name="email" id="email2" class="longinput" /></span>
                </p>

                <p>
                    <label>昵称</label>
                    <span class="field"><input type="text" name="nickname" id="email2" class="longinput" /></span>
                </p>

                <p>
                    <label>真实姓名</label>
                    <span class="field"><input type="text" name="realname" id="email2" class="longinput" /></span>
                </p>

                <p>
                    <label>密码</label>
                    <span class="field"><input type="password" name="password" id="email2" class="longinput" /></span>
                </p>

                <!--<p>-->
                    <!--<label><small>You can put your own description for this field here.</small></label>-->
                    <!--<span class="field"><textarea cols="80" rows="5" name="location" id="location2" class="longinput"></textarea></span>-->
                <!--</p>-->

                <p>
                    <label>权限</label>
                            <span class="field"><select name="role" id="selection2">
                                <?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["remark"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select></span>
                </p>

                <p class="stdformbutton">
                    <button class="submit radius2">提交</button>
                    <input type="reset" class="reset radius2" value="重置" />
                </p>
            </form>
        <div class="two_third dashboard_left">

        </div><!--two_third dashboard_left -->
        <div class="one_third last dashboard_right">

        </div><!--one_third last-->
    </div><!-- #updates -->
    <div id="activities" class="subcontent" style="display: none;">
        &nbsp;
    </div><!-- #activities -->
</div><!--contentwrapper-->
<br clear="all" />
    </div><!-- centercontent -->
</div><!--bodywrapper-->
</body>
</html>