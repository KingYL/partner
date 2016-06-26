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
            var nav = document.getElementsByClassName("hvr-bounce-to-bottom")[2];
            nav.setAttribute("class",nav.getAttribute("class").concat(" active"))
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
        <div class="col-md-3 announce">
            <!-- 公告-->
            <div class="title">
                <p>公告</p>
            </div>
            <hr>
            <marquee direction="up" height="300" scrollamount="1" scrolldelay="100" onMouseOver="this.scrollDelay=500" onMouseOut="this.scrollDelay=1">
                <ol style="margin: 0;padding: 0 15px;font-size: 1.2em;">
                    <u>&nbsp&nbsp&nbsp&nbsp“伙伴”系统正式上线了！！！小伙伴们快来看啊！！！！有健康管理：运动、身体健康（如心率、血压等）、睡眠等；活动管理：发布、修改、删除、参与等。</u>
                </ol>
            </marquee>
        </div>


        <div class="col-md-9">
            <h3 style="padding: 0 10px;font-weight: bold">最新活动</h3>

            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="activity">
                    <div class="activity-img">
                        <a href="/partner/index.php/Home/Activity/activity/ac/<?php echo ($vo["activity_id"]); ?>"><img src="/partner/Application/Public/data/activity/<?php echo ($vo["img_url"]); ?>" alt="浏览器不支持"></a>
                    </div>
                    <div class="activity-block">
                        <div class="activity-content" style="width: 80%;">
                            <a href="/partner/index.php/Home/Activity/activity/ac/<?php echo ($vo["activity_id"]); ?>"><h4><?php echo ($vo["title"]); ?></h4></a>
                            <p><?php echo ($vo["content"]); ?></p>
                        </div>
                        <!--<div class="clearfix"></div>-->
                        <div class="activity-state">
                            <div>
                                <label id="<?php echo ($vo["activity_id"]); ?>"><?php echo ($vo["is_end"]); ?></label>
                                <script>
                                    var label = document.getElementById("<?php echo ($vo["activity_id"]); ?>");
                                    if(label.innerHTML == 0){
                                        label.innerHTML = "正在进行";
                                    }else {
                                        label.innerHTML = "已经结束";
                                    }
                                </script>
                                <label><?php echo ($vo["enter_amount"]); ?>人参与</label>
                            </div>
                        </div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <div style="float: right"><?php echo ($page); ?></div>
            <!--<nav class="page">-->
                <!--<ul class="pagination">-->
                    <!--<li class=""><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>-->
                    <!--<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>-->
                    <!--<li><a href="#">2 <span class="sr-only">(current)</span></a></li>-->
                    <!--<li><a href="#">3 <span class="sr-only">(current)</span></a></li>-->
                    <!--<li><a href="#">4 <span class="sr-only">(current)</span></a></li>-->
                    <!--<li class=""><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>-->
                <!--</ul>-->
            <!--</nav>-->
            <div class="clearfix"></div>
        </div>

    </div>
</div>

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
<script type="text/javascript" src="/partner/Application/Public/js/jquery.min.js"></script>
<script src="/partner/Application/Public/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>