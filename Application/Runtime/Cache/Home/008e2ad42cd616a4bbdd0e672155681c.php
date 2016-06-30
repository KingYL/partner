<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>伙伴</title>
    <!--fonts-->
    <!--<link href='http://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>-->
    <!--<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>-->
    <!--//fonts-->
    <link href="/partner/Application/Public/css/bootstrap.css" rel="stylesheet">
    <link href="/partner/Application/Public/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- //for-mobile-apps -->
    <script>
        function setCookie(){
            document.cookie = "userId=<?php echo ($user["uid"]); ?>";
            initGender();
        }
    </script>
</head>
<body onload="setCookie()">
<!-- header -->
<div class="header navbar-fixed-top">
    <div class="container">
        <div class="header-left">
            <a href="<?php echo U('Index/index');?>">你的“伙伴”</a>
        </div>
        <div class="navigation">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">按钮导航</span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                    </button>
                </div>
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" id="navbar-nav">
                        <li class="hvr-bounce-to-bottom"><a href="<?php echo U('Index/index');?>">首页 </a></li>
                        <li class="hvr-bounce-to-bottom"><a href="<?php echo U('Health/index');?>">健康管理</a></li>
                        <li class="hvr-bounce-to-bottom"><a href="<?php echo U('Home/Activity/index/p/1');?>">活动</a></li>
                        <li class="hvr-bounce-to-bottom"><a href="<?php echo U('Advice/index');?>">建议</a></li>
                    </ul>
                    
                    <div class="clearfix"></div>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>

        <ul  id="navbar-nav-user">
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span><img src="/partner/Application/Public/data/<?php echo ($user["icon_url"]); ?>" alt=""></span>
                                    <?php echo ($user["name"]); ?>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="<?php echo U('User/user');?>">账户设置</a></li>
                                    <li><a href="#">我的好友</a></li>
                                    <li><a href="#">我的兴趣</a></li>
                                    <li><a href="#">消息中心</a></li>
                                    <li><a href="#">帮助反馈</a></li>
                                    <li><a href="<?php echo U('Login/signOut');?>">退出登录</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>

        <div class="clearfix"></div>

    </div>

</div>
<!-- //header -->

<div class="main" style="margin-top: 130px">
    <div class="container">

        <div class="col-md-8 col-md-offset-2">
            <h2>个人设置</h2>
            <div class="tabs">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active" style="width: 33.3%">
                        <a href="#user_info" data-toggle="tab">
                            个人资料
                        </a>
                    </li>
                    <li style="width: 33.3%"><a href="#user_icon" data-toggle="tab">头像设置</a></li>
                </ul>
                <div id="myTabCon" class="tab-content">
                    <div class="tab-pane fade in active" id="user_info">
                        <dl class="profile_list">
                            <dt class="f1">昵称</dt>
                            <dd><input type="text" id="name" value="<?php echo ($user["name"]); ?>"></dd>
                            <div class="clearfix"></div>
                        </dl>
                        <dl class="profile_list">
                            <dt class="fl">性别</dt>
                            <dd id="gender">
                                <input name="gender" type="radio" value="<?php echo ($user["gender"]); ?>">&nbsp;女 &nbsp; <input name="gender" type="radio" value="<?php echo ($user["gender"]); ?>">&nbsp;男
                            </dd>
                            <div class="clearfix"></div>
                        </dl>
                        <dl class="profile_list">
                            <dt class="f1">出生日期</dt>
                            <dd><input type="date" id="birthday" value="<?php echo ($user["birthday"]); ?>"></dd>
                        </dl>
                        <dl class="profile_list">
                            <dt class="f1">邮箱</dt>
                            <dd><input type="text"id="email" value="<?php echo ($user["email"]); ?>"></dd>
                        </dl>
                        <dl class="profile_list">
                            <dt class="fl">个性签名</dt>
                            <dd>
                                <textarea name="sign" id="sign"><?php echo ($user["sign"]); ?></textarea>
                                <label id="err_sign"  style="color:red;display:none;">
                                    个性签名不能超过50字!
                                </label>
                            </dd>
                        </dl>
                        <button class="my-button" onclick="saveUserInfo()">保存</button>
                    </div>
                    <div class="tab-pane fade" id="user_icon" style="text-align: center">
                        <form action="<?php echo U('User/uploadIcon');?>" method="post" enctype="multipart/form-data">
                            <div class="user-img">
                                <img src="/partner/Application/Public/data/<?php echo ($user["icon_url"]); ?>" alt="">
                            </div>
                            <div>
                                <input type="file" name="icon_url">
                            </div>
                            <div>
                                注意：头像图片只支持png、jpg、jpeg格式；头像文件必须小于5M；
                            </div>
                            <div style="background-color: white;color: white">
                                <button class="my-button">上传</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!--modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true" style="top:20%">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    保存信息
                </h4>
            </div>
            <div class="modal-body">
                保存成功！
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">关闭
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!--//modal-->
<!--footer-->
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h4>网站导航</h4>
                <ul class="web-nav">
                    <li><a href="<?php echo U('Index/health');?>">健康管理</a></li>
                    <li><a href="<?php echo U('Index/activity');?>">活动中心</a></li>
                    <li><a href="<?php echo U('Index/advice');?>">建议管理</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>联系我们</h4>
                <ul>
                    <li><a href="mailto:zuimoeacg@163.com" alt="" title="点击联系我们">zuimoeacg@163.com</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>友情链接</h4>
                <ul>
                    <li><a href="http://www.codoon.com" target="_blank"><!-- <img class="friend-logo" src="/partner/Application/Public/images/gudong-logo.jpg" alt="咕咚"/> -->咕咚网</a></li>
                    <li><a href="http://www.dongqil.com/"><!-- <img class="friend-logo" src="/partner/Application/Public/images/quyundong-logo.png" > -->去运动网</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h3><a href="<?php echo U('Index/index');?>">YOUR PARTNER</a></h3>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//footer-->
<!--copy-right-->
<div class="copy-right">
    <div class="container">
        <p> &copy; 2015 partner. All Rights Reserved | Design by <a href="#">你的伙伴</a></p>
    </div>
</div>
<!--//copy-right-->

<!-- for js working -->
<script type="text/javascript" src="/partner/Application/Public/js/jquery.min.js"></script>
<script src="/partner/Application/Public/js/bootstrap.js"></script>
<script type="text/javascript" src="/partner/Application/Public/js/user.js"></script>
<!-- //for js working -->
</body>
</html>