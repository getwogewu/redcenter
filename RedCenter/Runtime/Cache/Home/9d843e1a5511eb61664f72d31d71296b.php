<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <!--<meta name="description" content="">-->
    <!--<meta name="author" content="">-->
    <!--标题图标-->
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>会员中心</title>

    <!-- Bootstrap core CSS -->
    <link href="/redcenterold/RedCenter/Home/Public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/redcenterold/RedCenter/Home/Public/css/jquery.Jcrop.min.css" type="text/css" />
    <link href="/redcenterold/RedCenter/Home/Public/css/red_center.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid nav_con">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img alt="logo" src="#">
                </a>

            </div>
            <h3 class="navbar-text font_fa">会员中心</h3>
            <p class="navbar-text navbar-right font_fa nav_user">你好，<?php echo ($nickName); ?>
                <a href="<?php echo U('Home/Login/logout','','');?>" class="navbar-link font_fa nav_out">退出登录</a>
            </p>
        </div>
    </nav>
    <div class="row">
        <div class="row col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
            <div class="con_border">
                <a role="button" tabindex="0" class="left_face thumbnail center-block" title="自定义头像" data-container="body" data-toggle="popover" data-placement="right">
                    <img src="/redcenterold/RedCenter/Home/Public/<?php echo ($headImage); ?>"  alt="face">
                </a>
                <form id="det_form" class="form-horizontal font_fa" action="#">
                    <div class="form-group h4">
                        <label for="name" class="col-lg-3 col-md-4 col-sm-4 control-label form_font">昵称</label>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                            <input name="name" type="text" value="<?php echo ($nickName); ?>" class="form-control" id="name" placeholder="新的昵称">
                        </div>
                    </div>
                    <div class="form-group h4">
                        <label class="col-lg-3 col-md-4 col-sm-4 control-label form_font">等级</label>
                        <div class="col-lg-9 col-md-8 col-sm-8">
                            <p class="form-control-static"><?php echo ($userLevel); ?></p>
                        </div>
                    </div>
                    <div class="form-group h4">
                        <label class="col-lg-3 col-md-4 col-sm-4 control-label form_font">积分</label>
                        <div class="col-lg-9 col-md-8 col-sm-8">
                            <p class="form-control-static"><?php echo ($selfScore); ?></p>
                        </div>
                    </div>
                    <div class="form-group h4">
                        <label class="col-lg-3 col-md-4 col-sm-4 control-label form_font">排名</label>
                        <div class="col-lg-9 col-md-8 col-sm-8">
                            <p class="form-control-static"><?php echo ($selfRank); ?></p>
                        </div>
                    </div>
                    <div class="form-group h4">
                        <label for="intro" class="col-lg-3 col-md-4 col-sm-4 control-label form_font">简介</label>
                        <div class="col-lg-8 col-md-7 col-sm-7">
                            <textarea name="intro" class="form-control" id="intro" placeholder="关于我..."></textarea>
                        </div>
                    </div>
                    <div class="form-group h4">
                        <label for="intro" class="control-label form_font sr-only">保存修改</label>
                        <button class="btn btn-primary col-md-offset-1 col-lg-offset-1 col-sm-offset-1" type="submit">保存修改</button>
                        <a href="#" class=" col-md-offset-4 col-lg-offset-4 col-sm-offset-4">更改密码</a>
                    </div>
                </form>
            </div>

            <table class="table table-hover con_border left_table text-center">
                <thead>
                    <tr>
                        <th class="text-center">昵称</th>
                        <th class="text-center">等级</th>
                        <th class="text-center">积分</th>
                        <th class="text-center">排名</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($rankList)): foreach($rankList as $key=>$vo): ?><tr>
                            <td><?php echo ($vo["nickname"]); ?></td>
                            <td><?php echo ($vo["level"]); ?></td>
                            <td><?php echo ($vo["score"]); ?></td>
                            <td><?php echo ($key+1); ?></td>
                        </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row col-lg-6 col-md-6 col-sm-6 col-md-offset-1  col-lg-offset-1 col-sm-offset-1 font_fa">
            <ul class="nav nav-tabs row"  role="tablist">
                <li role="presentation" class="active"><a class="center1" href="#center"  aria-controls="center" role="tab" data-toggle="tab">我的中心</a></li>
                <li role="presentation"><a class="rule" href="#rule"  aria-controls="rule" role="tab" data-toggle="tab">积分细则</a></li>
                <li role="presentation"><a class="level" href="#level"  aria-controls="level" role="tab" data-toggle="tab">积分等级</a></li>
                <li role="presentation"><a class="exchange" href="#exchange"  aria-controls="exchange" role="tab" data-toggle="tab">兑换中心</a></li>
            </ul>
            <div class="container-fluid con_border row right_det tab-content">
                <div role="tabpanel" id="center" class="tab-pane active">
                    <!--我的中心菜单-->
                    <ul class="nav-tabs nav nav-pills nav-stacked col-lg-3 col-md-4 col-sm-4 con_border" id="right_nav_center" role="tablist">
                        <li role="presentation" class="active text-center btn-sm"><a href="#right_contair_center"  aria-controls="right_contair_center" role="tab" data-toggle="tab">所有动态<span class="badge"><?php echo ($userLog["logCount"]); ?></span></a></li>
                        <li role="presentation" class="text-center btn-sm"><a href="#right_contair_center_bt"  aria-controls="right_contair_center_bt" role="tab" data-toggle="tab">BTdown铺<span class="badge"><?php echo ($BTdownLog["logCount"]); ?></span></a></li>
                        <li role="presentation" class="text-center btn-sm"><a href="#right_contair_center_sh"  aria-controls="right_contair_center_sh" role="tab" data-toggle="tab">拾货<span class="badge"><?php echo ($marketLog["logCount"]); ?></span></a></li>
                        <li role="presentation" class="text-center btn-sm"><a href="#right_contair_center_js"  aria-controls="right_contair_center_js" role="tab" data-toggle="tab">锦瑟南山<span class="badge"><?php echo ($jsnsLog["logCount"]); ?></span></a></li>
                        <li role="presentation" class="text-center btn-sm"><a href="#right_contair_center_cy"  aria-controls="right_contair_center_cy" role="tab" data-toggle="tab">掌上重邮<span class="badge"><?php echo ($zscyLog["logCount"]); ?></span></a></li>
                        <li role="presentation" class="text-center btn-sm"><a href="#right_contair_center_xbs"  aria-controls="right_contair_center_xbs" role="tab" data-toggle="tab">重邮小帮手<span class="badge"><?php echo ($cyxbsLog["logCount"]); ?></span></a></li>
                    </ul>
                    <div class="tab-content">
                        <!--所有动态详细-->
                        <div role="tabpanel" class="tab-pane table-responsive right_det_contair col-lg-9 col-md-8 col-sm-8 active" id="right_contair_center">
                            <?php if(is_array($userLog["log"])): foreach($userLog["log"] as $key=>$vo): ?><div class="alert alert-success" role="alert"><?php echo ($nickName); ?> 访问<?php echo ($vo["project"]); ?> <?php echo ($vo["action"]); ?>，积分+<?php echo ($vo["score"]); ?></div><?php endforeach; endif; ?>
                        </div>
                        <!--BTDown铺详细-->
                        <div role="tabpanel" class="tab-pane table-responsive right_det_contair col-lg-9 col-md-8 col-sm-8" id="right_contair_center_bt">
                            <?php if(is_array($BTdownLog["log"])): foreach($BTdownLog["log"] as $key=>$vo): ?><div class="alert alert-success" role="alert"><?php echo ($nickName); ?> 访问<?php echo ($vo["project"]); ?> <?php echo ($vo["action"]); ?>，积分+<?php echo ($vo["score"]); ?></div><?php endforeach; endif; ?>
                        </div>
                        <!--拾货详细-->
                        <div role="tabpanel" class="tab-pane table-responsive right_det_contair col-lg-9 col-md-8 col-sm-8" id="right_contair_center_sh">
                            <?php if(is_array($marketLog["log"])): foreach($marketLog["log"] as $key=>$vo): ?><div class="alert alert-success" role="alert"><?php echo ($nickName); ?> 访问<?php echo ($vo["project"]); ?> <?php echo ($vo["action"]); ?>，积分+<?php echo ($vo["score"]); ?></div><?php endforeach; endif; ?>
                        </div>
                        <!--锦瑟南山详细-->
                        <div role="tabpanel" class="tab-pane table-responsive right_det_contair col-lg-9 col-md-8 col-sm-8" id="right_contair_center_js">
                            <?php if(is_array($jsnsLog["log"])): foreach($jsnsLog["log"] as $key=>$vo): ?><div class="alert alert-success" role="alert"><?php echo ($nickName); ?> 访问<?php echo ($vo["project"]); ?> <?php echo ($vo["action"]); ?>，积分+<?php echo ($vo["score"]); ?></div><?php endforeach; endif; ?>
                        </div>
                        <!--掌上重邮详细-->
                        <div role="tabpanel" class="tab-pane table-responsive right_det_contair col-lg-9 col-md-8 col-sm-8" id="right_contair_center_cy">
                            <?php if(is_array($zscyLog["log"])): foreach($zscyLog["log"] as $key=>$vo): ?><div class="alert alert-success" role="alert"><?php echo ($nickName); ?> 访问<?php echo ($vo["project"]); ?> <?php echo ($vo["action"]); ?>，积分+<?php echo ($vo["score"]); ?></div><?php endforeach; endif; ?>
                        </div>
                        <!--重邮小帮手详细-->
                        <div role="tabpanel" class="tab-pane table-responsive right_det_contair col-lg-9 col-md-8 col-sm-8" id="right_contair_center_xbs">
                            <?php if(is_array($cyxbsLog["log"])): foreach($cyxbsLog["log"] as $key=>$vo): ?><div class="alert alert-success" role="alert"><?php echo ($nickName); ?> 访问<?php echo ($vo["project"]); ?> <?php echo ($vo["action"]); ?>，积分+<?php echo ($vo["score"]); ?></div><?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" id="rule" class="tab-pane">
                    <!--积分细则菜单-->
                    <ul class="tab-pane nav nav-tabs nav-pills nav-stacked col-lg-3 col-md-3 col-sm-3 con_border" id="right_nav_rule"  role="tablist">
                        <li role="presentation" class="text-center btn-sm active"><a href="#right_contair_rule_bt" aria-controls="right_contair_rule_bt" role="tab" data-toggle="tab">BTdown铺</a></li>
                        <li role="presentation" class="text-center btn-sm"><a href="#right_contair_rule_sell" aria-controls="right_contair_rule_sell" role="tab" data-toggle="tab">拾货</a></li>
                        <li role="presentation" class="text-center btn-sm"><a href="#right_contair_rule_jsns" aria-controls="right_contair_rule_jsns" role="tab" data-toggle="tab">锦瑟南山</a></li>
                        <li role="presentation" class="text-center btn-sm"><a href="#right_contair_rule_cqupt" aria-controls="right_contair_rule_cqupt" role="tab" data-toggle="tab">掌上重邮</a></li>
                        <li role="presentation" class="text-center btn-sm"><a href="#right_contair_rule_helper" aria-controls="right_contair_rule_helper" role="tab" data-toggle="tab">重邮小帮手</a></li>
                    </ul>
                    <!--积分细则表-->
                    <div class="tab-content table-responsive right_det_contair col-lg-9 col-md-9 col-sm-9" id="right_contair_rule">
                        <!--btdown铺-->
                        <div  role="tabpanel" class="tab-pane active" id="right_contair_rule_bt">
                            <table class="table table-hover con_border text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">用户行为</th>
                                    <th class="text-center">积分加减</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($BTdownRule)): foreach($BTdownRule as $key=>$vo): ?><tr>
                                        <td><?php echo ($vo["description"]); ?></td>
                                        <td><?php echo ($vo["once"]); ?></td>
                                    </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!--拾货-->
                        <div  role="tabpanel" class="tab-pane" id="right_contair_rule_sell">
                            <table class="table table-hover con_border text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">用户行为</th>
                                    <th class="text-center">积分加减</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($marketRule)): foreach($marketRule as $key=>$vo): ?><tr>
                                        <td><?php echo ($vo["description"]); ?></td>
                                        <td><?php echo ($vo["once"]); ?></td>
                                    </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!--锦瑟南山-->
                        <div  role="tabpanel" class="tab-pane" id="right_contair_rule_jsns">
                            <table class="table table-hover con_border text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">用户行为</th>
                                    <th class="text-center">积分加减</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($jsnsRule)): foreach($jsnsRule as $key=>$vo): ?><tr>
                                        <td><?php echo ($vo["description"]); ?></td>
                                        <td><?php echo ($vo["once"]); ?></td>
                                    </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!--掌上重邮-->
                        <div  role="tabpanel" class="tab-pane" id="right_contair_rule_cqupt">
                            <table class="table table-hover con_border text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">用户行为</th>
                                    <th class="text-center">积分加减</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($zscyRule)): foreach($zscyRule as $key=>$vo): ?><tr>
                                        <td><?php echo ($vo["description"]); ?></td>
                                        <td><?php echo ($vo["once"]); ?></td>
                                    </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!--重邮小帮手-->
                        <div  role="tabpanel" class="tab-pane" id="right_contair_rule_helper">
                            <table class="table table-hover con_border text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">用户行为</th>
                                    <th class="text-center">积分加减</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($cyxbsRule)): foreach($cyxbsRule as $key=>$vo): ?><tr>
                                        <td><?php echo ($vo["description"]); ?></td>
                                        <td><?php echo ($vo["once"]); ?></td>
                                    </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" id="level" class="tab-pane">
                    <!--积分等级表-->
                    <div class="table-responsive right_det_contair" id="right_contair_level">
                        <table class="table table-hover con_border text-center">
                            <thead>
                            <tr>
                                <th class="text-center">积分</th>
                                <th class="text-center">等级</th>
                                <th class="text-center">图标</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($levelRule)): foreach($levelRule as $key=>$vo): ?><tr>
                                    <td><?php echo ($vo["min_score"]); ?>~<?php echo ($vo["max_score"]); ?></td>
                                    <td><?php echo ($vo["level"]); ?></td>
                                    <td><span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div role="tabpanel" id="exchange" class="tab-pane">
                    <!--兑换中心菜单-->
                    <ul role="tablist" class="nav nav-tabs nav-pills" id="right_nav_exchange">
                        <li role="presentation" class="active"><a href="#right_contair_exchange" aria-controls="right_contair_exchange" role="tab" data-toggle="tab">全部物品</a></li>
                        <li role="presentation"><a href="#right_contair_exchange" aria-controls="right_contair_exchange" role="tab" data-toggle="tab">可兑换的</a></li>
                        <li role="presentation"><a href="#right_contair_have" aria-controls="right_contair_have" role="tab" data-toggle="tab">已兑换的</a></li>
                        <li role="presentation"><a href="#right_contair_help" aria-controls="right_contair_help" role="tab" data-toggle="tab">帮助</a></li>
                    </ul>
                    <div class="tab-content">
                        <!--兑换中心详细-->
                        <div role="tabpanel" class="tab-pane table-responsive row right_det_contair active" id="right_contair_exchange">
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <img src="#" alt="物品">
                                    <div class="caption">
                                        <h3>xxxxxxxxx</h3>
                                        <p>兑换积分：100</p>
                                        <a href="#" class="btn btn-primary" role="button">兑换</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <img src="#" alt="物品">
                                    <div class="caption">
                                        <h3>xxxxxxxxx</h3>
                                        <p>兑换积分：100</p>
                                        <a href="#" class="btn btn-primary disabled" role="button">兑换</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <img src="#" alt="物品">
                                    <div class="caption">
                                        <h3>xxxxxxxxx</h3>
                                        <p>兑换积分：100</p>
                                        <a href="#" class="btn btn-primary" role="button">兑换</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <img src="#" alt="物品">
                                    <div class="caption">
                                        <h3>xxxxxxxxx</h3>
                                        <p>兑换积分：100</p>
                                        <a href="#" class="btn btn-primary" role="button">兑换</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <img src="#" alt="物品">
                                    <div class="caption">
                                        <h3>xxxxxxxxx</h3>
                                        <p>兑换积分：100</p>
                                        <a href="#" class="btn btn-primary" role="button">兑换</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--已兑换-->
                        <div role="tabpanel" class="tab-pane table-responsive right_det_contair" id="right_contair_have">
                            <div class="alert alert-success" role="alert">
                                <img src="#" alt="物品"/>
                                <span>xxxxxxxxx</span>
                                <span>所需积分：100</span>
                                <span>兑换时间：2015.5.10</span>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <img src="#" alt="物品"/>
                                <span>xxxxxxxxx</span>
                                <span>所需积分：100</span>
                                <span>兑换时间：2015.5.10</span>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <img src="#" alt="物品"/>
                                <span>xxxxxxxxx</span>
                                <span>所需积分：100</span>
                                <span>兑换时间：2015.5.10</span>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <img src="#" alt="物品"/>
                                <span>xxxxxxxxx</span>
                                <span>所需积分：100</span>
                                <span>兑换时间：2015.5.10</span>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <img src="#" alt="物品"/>
                                <span>xxxxxxxxx</span>
                                <span>所需积分：100</span>
                                <span>兑换时间：2015.5.10</span>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <img src="#" alt="物品"/>
                                <span>xxxxxxxxx</span>
                                <span>所需积分：100</span>
                                <span>兑换时间：2015.5.10</span>
                            </div>
                        </div>
                        <!--帮助-->
                        <div role="tabpanel" class="tab-pane table-responsive right_det_contair" id="right_contair_help">
                            <div class="alert alert-info" role="alert">这里是啥？</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--<div class="complete">-->
            <!--<div class="complete_bac"></div>-->
            <!--<form id="comp_form" class="container-center font_fa" action="#" method="post">-->
                <!--<div class="alert complete_head text-center" role="alert">第一次登陆成功，请完善个人信息（<span class="comp_sp"> *</span> 为必填）</div>-->
                <!--<div class="form-group h4">-->
                    <!--<label for="inputName" class="form_font comp_label control-label col-sm-4 col-md-4 col-lg-4">昵称：</label>-->
                    <!--<div class="col-sm-8 col-md-8 col-lg-8">-->
                        <!--<input name="name" type="text" id="inputName" class="form-control " autofocus>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="form-group h4">-->
                    <!--<label for="inputIntro" class="form_font comp_label control-label col-sm-4 col-md-4 col-lg-4">简介：</label>-->
                    <!--<div class="col-sm-8 col-md-8 col-lg-8">-->
                        <!--<textarea  name="intro" class="form-control" id="inputIntro" placeholder="关于我..."></textarea>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="form-group h4">-->
                    <!--<label for="inputPass" class="form_font comp_label control-label col-sm-5 col-md-5 col-lg-5">修改密码：</label>-->
                    <!--<div class="col-sm-7 col-md-7 col-lg-7">-->
                        <!--<input name="password" type="password" id="inputPass" class="form-control ">-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="form-group h4">-->
                    <!--<label for="inputPass_again" class="form_font comp_label control-label col-sm-5 col-md-5 col-lg-5">确认密码：</label>-->
                    <!--<div class="col-sm-7 col-md-7 col-lg-7">-->
                        <!--<input name="password_again" type="password" id="inputPass_again" class="form-control ">-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="form-group clearfix">-->
                    <!--<div class="alert alert-info complete_head text-center complete_info" role="alert">若不修改密码，则为默认身份证后六位</div>-->
                <!--</div>-->
                <!--<div class="form-group h4">-->
                    <!--<label for="inputAsk" class="form_font comp_label control-label col-sm-5 col-md-5 col-lg-5">密保问题<span class="comp_sp"> *</span>：</label>-->
                    <!--<div class="col-sm-7 col-md-7 col-lg-7">-->
                        <!--<input name="ask" type="text" id="inputAsk" class="form-control ">-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="form-group h4">-->
                    <!--<label for="inputAns" class="form_font comp_label control-label col-sm-5 col-md-5 col-lg-5">密保答案<span class="comp_sp"> *</span>：</label>-->
                    <!--<div class="col-sm-7 col-md-7 col-lg-7">-->
                        <!--<input name="answer" type="text" id="inputAns" class="form-control ">-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="form-group clearfix">-->
                    <!--<div class="alert alert-info complete_head text-center complete_info" role="alert">密保问题便于您找回密码</div>-->
                <!--</div>-->
                <!--<div class="form-group">-->
                    <!--<button class="btn btn-lg btn-primary complete_sub" type="submit">确定</button>-->
                <!--</div>-->


            <!--</form>-->
    <!--</div>-->


    <!--底部声明-->
    <footer>
        <section>
            <div class="shareTo sina">
                <a target="_blank" href="http://weibo.com/redrockweekly">
                    <img src="/redcenterold/RedCenter/Home/Public/img/sina.png" />
                </a>
            </div>
            <div class="shareTo tecent">
                <a target="_blank" href="http://t.qq.com/redrock_cqupt">
                    <img src="/redcenterold/RedCenter/Home/Public/img/tecent.png" />
                </a>
            </div>
            <div class="shareTo renren">
                <a target="_blank" href="http://page.renren.com/601264336">
                    <img src="/redcenterold/RedCenter/Home/Public/img/renren.png" />
                </a>
            </div>
        </section>
        <nav>
            <!--<span>返回顶部</span>-->
            <a target="_blank" href="#">管理入口</a>
            <a target="_blank" href="http://202.202.43.125">红岩网校主页</a>
            <a target="_blank" href="http://202.202.43.125/sitemap/index.html">站点地图</a>
            <a target="_blank" href="http://202.202.43.125/online/forum.php?mod=forumdisplay&fid=411">指出错误</a>
        </nav>
        <p>本网站由红岩网校工作站负责开发，管理，不经红岩网校委员会书面同意，不得进行转载</p>
        <p>地址：重庆市南岸区黄桷垭镇 重庆邮电大学内 400065 E-mail:redrock@cqupt.edu.cn (023-62461084)</p>
    </footer>
</body>
<script>
    var imgSrc = "/redcenterold/RedCenter/Home/Public/<?php echo ($headImage); ?>";
</script>
<script type="text/javascript" src="/redcenterold/RedCenter/Home/Public/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/redcenterold/RedCenter/Home/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/redcenterold/RedCenter/Home/Public/js/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="/redcenterold/RedCenter/Home/Public/js/form_check.js"></script>
<script type="text/javascript" src="/redcenterold/RedCenter/Home/Public/js/cut.Jcrop.js"></script>
<script type="text/javascript" src="/redcenterold/RedCenter/Home/Public/js/red_center.js"></script>
</html>