<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>伙伴</title>
    <link href="/partner/Application/Public/css/bootstrap.css" rel="stylesheet">
    <link href="/partner/Application/Public/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- //for-mobile-apps -->
    <script>
        function setCookie(){
            document.cookie = "userId=<?php echo ($user["uid"]); ?>";
            var nav = document.getElementsByClassName("hvr-bounce-to-bottom")[0];
            nav.setAttribute("class",nav.getAttribute("class").concat(" active"))
        }
    </script>
</head>
<body onload="setCookie()">
<!-- header -->
<div class="header navbar-fixed-top">
    <div class="container">
        <div class="header-left">
            <a href="index.html">你的“伙伴”</a>
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
                        <li class="hvr-bounce-to-bottom"><a href="#">待定</a></li>
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
                <!-- /.navbar-collapse -->
            </nav>
        </div>

        <div class="clearfix"></div>

    </div>

</div>
<!-- //header -->

<div class="main" style="margin-top: 130px">
    <div class="container">
        <div class="col-md-4">
            <div style="height: 80px;;"></div>
            <div class="cntnt-img">
            </div>
            <div class="bnr-img">
                <img src="/partner/Application/Public/data/<?php echo ($user["icon_url"]); ?>" alt="user_icon"/>
            </div>
            <div class="bnr-text">
                <h1><?php echo ($user["name"]); ?></h1>
                <h5>www.qq.com</h5>
            </div>
        </div>

        <div class="col-md-8">
            <div class="summary col-md-12">
                <h1>自加入伙伴以来</h1>

                <div class="col-md-4">
                    <div class="circle circle-yellow">
                        <div class="blank35"></div>
                        <p>已运动</p>
                        <p><?php echo ($user["exercise_amount"]); ?>天</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="circle circle-blue">
                        <div class="blank35"></div>
                        <p>已加入</p>
                        <p id="enter_time"><?php echo ($user["enter_time"]); ?></p>
                        <script>
                            var enter_time = document.getElementById("enter_time");
                            enter_time.innerHTML = parseInt((new Date().getTime() - new Date(enter_time.innerHTML).getTime())/(24 * 60 * 60 * 1000)) + "天";
                        </script>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="circle circle-green">
                        <div class="blank35"></div>
                        <p>共燃烧</p>
                        <p><?php echo ($user["exercise_amount"]); ?>千卡</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="tabs">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active" style="width: 33.3%">
                        <a href="#home" data-toggle="tab">
                            总排名
                        </a>
                    </li>
                    <li style="width: 33.3%">
                        <a href="#ios" data-toggle="tab">
                            朋友排名
                        </a>
                    </li>
                </ul>
                <div id="myTabCon" class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <ol class="rounded-list">
                            <li><a href=""><img src="/partner/Application/Public/images/team-1.jpg" alt="1"><span>七秒悲伤</span></a></li>
                            <li><a href=""><img src="/partner/Application/Public/images/team-2.jpg" alt="1"><span>三秒悲痛</span></a></li>
                            <li><a href=""><img src="/partner/Application/Public/images/team-3.jpg" alt="1"><span>大西瓜</span></a></li>
                            <li><a href=""><img src="/partner/Application/Public/images/team-4.jpg" alt="1"><span>情定前夕</span></a></li>
                            <li><a href=""><img src="/partner/Application/Public/images/333.jpg" alt="1"><span>西风残照之伤</span></a></li>
                            <li><a href=""><img src="/partner/Application/Public/images/222.jpg" alt="1"><span>暗红</span></a></li>
                            <li><a href=""><img src="/partner/Application/Public/images/111.jpg" alt="1"><span>方正电脑5</span></a></li>
                        </ol>
                    </div>
                    <div class="tab-pane fade" id="ios">
                        <ol class="rounded-list">
                            <li><a href=""><img src="/partner/Application/Public/images/team-2.jpg" alt="1"><span>三秒悲痛</span></a></li>
                            <li><a href=""><img src="/partner/Application/Public/images/team-4.jpg" alt="1"><span>情定前夕</span></a></li>
                            <li><a href=""><img src="/partner/Application/Public/images/333.jpg" alt="1"><span>呵呵哒</span></a></li>
                            <li><a href=""><img src="/partner/Application/Public/images/team-3.jpg" alt="1"><span>大西瓜</span></a></li>
                            <li><a href=""><img src="/partner/Application/Public/images/team-1.jpg" alt="1"><span>暗红</span></a></li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!--footer-->
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h4>地址</h4>
                <ul>
                    <li>南京大学——鼓楼校区</li>
                    <li>陶园1舍</li>
                    <li>230064</li>
                    <li>Hours: Mon-Fri 9am - 6:00pm</li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>联系我们</h4>
                <ul>
                    <li>电话: +1 234-567-890</li>
                    <li>传真: +1 646-216-9789</li>
                    <li>邮件: <a href="mailto:info@example.com">1016990109@qq.com </a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>获得帮助</h4>

                <form>
                    <input type="email" value="输入你的邮箱" onfocus="this.value = '';"
                           onblur="if (this.value == '') {this.value = 'Enter your email';}" required="">
                    <input type="submit" value=" ">
                </form>
            </div>
            <div class="col-md-3 footer-grid">
                <h3><a href="index.html">YOUR PARTNER</a></h3>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//footer-->
<!--copy-right-->
<div class="copy-right">
    <div class="container">
        <p> &copy; 2015 partner. All Rights Reserved | Design by <a href="http://w3layouts.com/"> 洪传旺</a></p>
    </div>
</div>
<!--//copy-right-->

<!-- for bootstrap working -->
<script type="text/javascript" src="/partner/Application/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/partner/Application/Public/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>