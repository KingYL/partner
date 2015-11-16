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
    <script type="text/javascript" src="/partner/Application/Public/js/jquery.min.js"></script>
</head>
<body>
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
                    <ul class="nav navbar-nav">
                        <li class="hvr-bounce-to-bottom active"><a href="index.html">首页 </a></li>
                        <li class="hvr-bounce-to-bottom"><a href="health.html">健康管理</a></li>
                        <li class="hvr-bounce-to-bottom"><a href="activity.html">活动</a></li>
                        <li class="hvr-bounce-to-bottom"><a href="advice.html">建议</a></li>
                        <li class="hvr-bounce-to-bottom"><a href="contact.html">待定</a></li>
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span><img src="images/img2.jpg" alt=""></span>
                                    七秒悲伤
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="user.html">账户设置</a></li>
                                    <li><a href="#">退出登录</a></li>
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
            <div class="cntnt-img">
            </div>
            <div class="bnr-img">
                <img src="images/img2.jpg" alt=""/>
            </div>
            <div class="bnr-text">
                <h1>七秒悲伤</h1>
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
                        <p>30天</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="circle circle-blue">
                        <div class="blank35"></div>
                        <p>累积里程</p>
                        <p>12.8公里</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="circle circle-green">
                        <div class="blank35"></div>
                        <p>共燃烧</p>
                        <p>500.14大卡</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="tabs">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active" style="width: 33.3%">
                        <a href="#home" data-toggle="tab">
                            全站
                        </a>
                    </li>
                    <li style="width: 33.3%"><a href="#ios" data-toggle="tab">动态</a></li>
                    <li class="dropdown" style="width: 33.3%">
                        <a href="#" id="myTabDrop1" class="dropdown-toggle"
                           data-toggle="dropdown">健康
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                            <li><a href="#jmeter" tabindex="-1" data-toggle="tab">jmeter</a></li>
                            <li><a href="#ejb" tabindex="-1" data-toggle="tab">ejb</a></li>
                        </ul>
                    </li>
                </ul>
                <div id="myTabCon" class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <p>
                            W3Cschoool菜鸟教程是一个提供最新的web技术站点，本站免费提供了建站相关的技术文档，帮助广大web技术爱好者快速入门并建立自己的网站。菜鸟先飞早入行——学的不仅是技术，更是梦想。</p>
                    </div>
                    <div class="tab-pane fade" id="ios">
                        <p>iOS 是一个由苹果公司开发和发布的手机操作系统。最初是于 2007 年首次发布 iPhone、iPod Touch 和 Apple
                            TV。iOS 派生自 OS X，它们共享 Darwin 基础。OS X 操作系统是用在苹果电脑上，iOS 是苹果的移动版本。</p>
                    </div>
                    <div class="tab-pane fade" id="jmeter">
                        <p>jMeter 是一款开源的测试软件。它是 100% 纯 Java 应用程序，用于负载和性能测试。</p>
                    </div>
                    <div class="tab-pane fade" id="ejb">
                        <p>Enterprise Java Beans（EJB）是一个创建高度可扩展性和强大企业级应用程序的开发架构，部署在兼容应用程序服务器（比如 JBOSS、Web Logic 等）的 J2EE
                            上。
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

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
<!-- //footer -->
<!-- copy -->
<div class="copy-right">
    <div class="container">
        <p> &copy; 2015 partner. All Rights Reserved | Design by <a href="http://w3layouts.com/"> 洪传旺</a></p>
    </div>
</div>
<!-- copy -->

<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>