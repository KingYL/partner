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
        function setCookie() {
            document.cookie = "userId=<?php echo ($user["uid"]); ?>";
            var nav = document.getElementsByClassName("hvr-bounce-to-bottom")[2];
            nav.setAttribute("class", nav.getAttribute("class").concat(" active"));
            console.log(nav);
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
        <div class="col-md-8 col-md-offset-2" id="myTabContent">
            <br>

            <h3 style="padding: 0 10px;font-weight: bold;color: #78be09"><?php echo ($activity["title"]); ?></h3>

            <p style="text-align: right;color: #636486">发表于 <?php echo ($activity["post_time"]); ?></p>
            <hr>
            <div>
                <img src="<?php echo ($activity["img_url"]); ?>" alt="图片丢失"
                     style="width: 50%;height: auto;border-radius: 10px">
            </div>
            <hr>
            <div style="color: #7aa92f;margin-top: -10px;">
                <p>开始时间：<?php echo (date("Y-m-d H:m:00",strtotime($activity['begin_time']))) ?></p>
                <p>结束时间：<?php echo (date("Y-m-d H:m:00",strtotime($activity['end_time']))) ?></p>
            </div>
            <p style="font-size: 1.5em; margin: 20px 0px">&nbsp&nbsp&nbsp&nbsp<?php echo ($activity["content"]); ?></p>

            <div style="display:flex; justify-content:center;">
                <button id="<?php echo ($activity["activity_id"]); ?>" class="btn btn-success" style="width: 40%; margin: 20px">
                    <?php echo ($activity["is_enter"]); ?>
                </button>
            </div>

            <?php if(is_array($users)): $i = 0; $__LIST__ = array_slice($users,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><a href="../../../User/user/userId/<?php echo ($user["uid"]); ?>">
                    <img src="/partner/Application/Public/data/<?php echo ($user["avatar"]); ?>" alt="" style="display:inline-block;border-radius:50px" width="40px" height="40px" >
                </a><?php endforeach; endif; else: echo "" ;endif; ?>

            <p style="text-align:right"><?php echo count($users) > 10 ? '等' : '共';?> <?php echo count($users);?> 人参与</p>
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
                    <li><a href="<?php echo U('Advice/index');?>">建议管理</a></li>
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
                    <li><a href="http://www.dongqil.com/" target="_blank"><!-- <img class="friend-logo" src="/partner/Application/Public/images/quyundong-logo.png" > -->去运动网</a></li>
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
<script>
    var label = document.getElementById("<?php echo ($activity["activity_id"]); ?>");
    var activity_id = "<?php echo ($activity["activity_id"]); ?>";
    if (label.innerHTML == 0) {
        label.innerHTML = "点击参加";
        $(label).removeClass('btn-danger')
        $(label).addClass('btn-success')
        label.onclick = function(){
            console.log('click');
            $.post(
                    "/partner/index.php/Home/Activity/enterActivity",
                    {activity_id:activity_id},
                    function(data){
                        if(data){
                            location.reload();
                        }else{
                            alert("参与失败！");
                        }
                    }
            );
        }
    } else {
        label.innerHTML = "退出活动";
        $(label).removeClass('btn-success')
        $(label).addClass('btn-danger')
        label.onclick = function(){
            $.post(
                    "/partner/index.php/Home/Activity/exitActivity",
                    {activity_id:activity_id},
                    function(data){
                        if(data){
                            location.reload();
                        }else{
                            alert("退出失败！");
                        }
                    }
            );
        }
    }
</script>
</body>
</html>