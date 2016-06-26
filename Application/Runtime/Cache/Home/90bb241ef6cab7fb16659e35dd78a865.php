<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>伙伴</title>
    <!--fonts-->
    <!--<link href='http://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>-->
    <!--<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>-->
    <!--//fonts-->
    <link href="/partner/Application/Public/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="/partner/Application/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/partner/Application/Public/js/bootstrap.js"></script>
    <link href="/partner/Application/Public/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- //for-mobile-apps -->
	<script type="text/javascript" src="/partner/Application/Public/js/util.js"></script>
    <script>
        function setCookie(){
            document.cookie = "userId=<?php echo ($user["uid"]); ?>";
            var nav = document.getElementsByClassName("hvr-bounce-to-bottom")[3];
            nav.setAttribute("class",nav.getAttribute("class").concat(" active"));
//            script for menu
            $("span.menu2").click(function () {
                $("ul.effct1").slideToggle(300, function () {
                    // Animation complete.
                });
            });
            getMyDoctors();
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
        <div class="col-md-3" style="padding: 0; min-height: 500px">
            <div class="top-nav2">
                <span class="menu2"><img src="/partner/Application/Public/images/menu.png" alt=""> <lable>伙伴建议</lable></span>
                <ul class="effct1" style="display: block;">
                    <li class="active m5" onclick="getMyDoctors()"><a href="#doctor" data-toggle="tab">我的医生</a></li>
                    <li class="m6" onclick="getMyCoaches()"><a href="#coach" data-toggle="tab">我的教练</a></li>
                    <li class="m7" onclick="getAdvices()"><a href="#advice_list" data-toggle="tab">我的建议</a></li>
                    <li class="m8" onclick="getMyQuestions()"><a href="#question_list" data-toggle="tab">我的提问</a></li>
                    <li class="m9"><a href="#search" data-toggle="tab">搜索</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div id="advice" class="tab-content">
                <div class="tab-pane fade in active" id="doctor">
                    <h2>医疗专家</h2>
                    <hr>
                    <div class="doctors" id="doctors">
                        <div id="myDoctors"></div>
                        <nav class="page" id="doctorsPage">
                        </nav>
                    </div>
                </div>
                <div class="tab-pane fade" id="coach">
                    <h2>专业教练</h2>
                    <hr>
                    <div class="doctors">
                        <div id="myCoaches"></div>
                        <nav class="page" id="coachPage">
                        </nav>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="advice_list">
                    <h2>伙伴建议</h2>
                    <hr>
                    <div class="doctors">
                        <div id="advices"></div>
                        <nav class="page" id="advicePage">
                        </nav>
                        <div class="clearfix"></div>
                    </div>
				</div>
                <div class="tab-pane fade" id="question_list">
                    <h2>我的提问</h2>
                    <hr>
                    <div class="question-input">
                        <textarea class="my_question" name="question_title" placeholder="标题" id="new_question_title" cols="20" rows="1"></textarea>
                        <textarea class="my_question" name="question_content" placeholder="发表新的问题" id="new_question_content" cols="40" rows="5"></textarea>
                        <button style="float: right" onclick="question()">发表</button>
                        <div class="clearfix"></div>
                    </div>
                    <hr>
                    <div id="myQuestions"></div>
                    <nav class="page" id="questionPage">
                    </nav>
                    <div class="clearfix"></div>
                </div>
                <div class="tab-pane fade" id="search">
                    <h2>搜索你要的</h2>
                    <hr>
                    <div class="search">
                        <form>
                            <input type="search" id="searchName" placeholder="搜索你想要的">
                            <input type="button" onclick="searchUser()">
                        </form>
                        <div id="result">

                        </div>
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

<!-- for bootstrap working -->
<script type="text/javascript" src="/partner/Application/Public/js/advice.js"></script>
<!-- //for bootstrap working -->
</body>
</html>