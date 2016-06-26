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
            var nav = document.getElementsByClassName("hvr-bounce-to-bottom")[1];
            nav.setAttribute("class",nav.getAttribute("class").concat(" active"));
            initialDate();
            //script-for-menu
            $("span.menu2").click(function () {
                $("ul.effct1").slideToggle(300, function () {
                    // Animation complete.
                });
            });
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
<div class="main">
    <div class="container" style="margin-top: 130px">
        <div class="col-md-3" style="padding: 0">
            <div class="top-nav2">
                <span class="menu2"><img src="/partner/Application/Public/images/menu.png" alt=""> <lable>健康管理</lable></span>
                <ul class="effct1" style="display: block;">
                    <li class="active m1"><a href="#overview" data-toggle="tab">我的运动</a></li>
                    <li class="m2"><a href="#health" data-toggle="tab">身体管理</a></li>
                    <li class="m3" onclick="getExerciseInfo()"><a href="#exercise" data-toggle="tab">健身追踪器</a></li>
                    <li class="m4" onclick="getSlumberInfo()"><a href="#slumber" data-toggle="tab">睡眠分析</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="overview">
                    <div class="title">
                        <p>你当天的健康状况</p>
                    </div>
                    <div class="circle circle-hole">
                        <div class="blank35"></div>
                        <p>"零夜"安眠</p>

                        <p class="boler"><?php echo ($user["slumber_time"]); ?></p>
                    </div>
                    <div class="circle circle-blue">
                        <div class="blank35"></div>
                        <p>今天运动</p>

                        <p class="boler"><?php echo ($user["step_number"]); ?>步</p>
                    </div>
                    <div class="circle circle-green">
                        <div class="blank35"></div>
                        <p>健康</p>

                        <p class="bolder">BMI <?php echo ($user["BMI"]); ?></p>
                    </div>
                </div>
                <div class="tab-pane fade" id="health">
                    <div class="title">
                        <p>你的身体状况</p>
                    </div>
                    <div>
                        <div class="people inline">
                            <img src="/partner/Application/Public/images/people.png" alt=""/>
                        </div>
                        <div class="inline middle-y">
                            <canvas id = "myCanvas" width="100px">people-line</canvas>
                            <script>
                                var myCanvas = document.getElementById("myCanvas");
                                var context = myCanvas.getContext("2d");
                                context.strokeStyle ='hsl(120,50%,50%)';//线条颜色：绿色
                                context.lineWidth = 3;//设置线宽
                                context.beginPath();
                                context.moveTo(0,3);
                                context.lineTo(50,3);
                                context.lineTo(120,30);
                                context.stroke();//画线框
                                context.beginPath();
                                context.moveTo(50,3);
                                context.lineTo(120,100);
                                context.stroke();//画线框
                            </script>
                        </div>
                        <div class="inline middle-y" style="margin-left: -10px">
                            <div class="body-text">
                                <label>身高：<input type="text" id="height" value="<?php echo ($user["height"]); ?>"> 厘米</label>
                            </div>
                            <div class="body-text">
                                <label>体重：<input type="text" id="weight" value="<?php echo ($user["weight"]); ?>"> 公斤</label>
                            </div>
                            <div class="body-text">
                                <button class="" onclick="saveBaseInfo()">保存</button>
                            </div>
                        </div>
                        <div class="circle circle-green">
                            <div class="blank35"></div>
                            <p>健康</p>
                            <p class="bolder">BMI <?php echo ($user["BMI"]); ?></p>
                        </div>
                    </div>
                    <div class="bmi-text col-md-7" style="float: right">
                        <div>偏瘦</div>
                        <div>正常</div>
                        <div>偏胖</div>
                        <div>肥胖</div>
                    </div>
                    <div class="progress col-md-7" style="float: right;">
                        <div class="progress-bar progress-bar-info" style="width: 25%;"><span>18.5</span>
                            <span class="sr-only">15% Complete (success)</span>
                        </div>

                        <div class="progress-bar progress-bar-success" style="width: 35%"><span>24</span>
                            <span class="sr-only">20% Complete (success)</span>
                        </div>
                        <div class="progress-bar progress-bar-warning" style="width: 20%"><span>28</span>
                            <span class="sr-only">20% Complete (warning)</span>
                        </div>
                        <div class="progress-bar progress-bar-danger" style="width: 20%">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id="exercise">
                    <div class="title">
                        <p>健身追踪</p>
                        <label>每天运动目标：<input type="text" id="exercise_goal" value="<?php echo ($user["exercise_goal"]); ?>">步
                            <button onclick="saveExerciseGoal()">更改</button>
                        </label>
                    </div>
                    <div class="blank35"></div>
                    <div class="col-md-4">
                        <div class="circle circle-hole-sm circle-hole">
                            <div class="blank20"></div>
                            <p>目标完成</p>
                            <p class="boler" id="complete_goal">0%</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="exercise">
                            <div class="blank20"></div>
                            <ul>
                                <li>
                                    <span>运动距离</span>
                                    <br>
                                    <span class="bolder" id="meters">0</span>
                                </li>
                                <li>
                                    <span>运动时长</span>
                                    <br>
                                    <span class="bolder" id="exercise_duration">0</span>
                                </li>
                                <li>
                                    <span>燃烧热量</span>
                                    <br>
                                    <span class="bolder" id="calories">0</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="date-div">
                        <label for="date">日期：</label><input type="date" id="exercise_date" class="date" onchange="updateExerciseInfo()"  />
                    </div>
                    <div class="title-2">
                        <p>运动曲线:<span id="exerciseGot"></span></p>
                    </div>
                    <canvas id="exerciseChart" width="850" height="0"></canvas>
                </div>
                <div class="tab-pane fade in" id="slumber">
                    <div class="title">
                        <p>睡眠分析</p>
                    </div>
                    <div class="blank25"></div>
                    <div class="col-md-4">
                        <div class="circle circle-sm circle-blue">
                            <div class="blank20"></div>
                            <p>睡眠有效率</p>

                            <p class="boler" id="effective_rate">0</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="exercise">
                            <div class="blank20"></div>
                            <ul>
                                <li>
                                    <span>睡眠开始</span>
                                    <br>
                                    <span class="bolder" id="begin_time">00:00:00</span>
                                </li>
                                <li>
                                    <span>睡眠结束</span>
                                    <br>
                                    <span class="bolder" id="end_time">00:00:00</span>
                                </li>
                                <li>
                                    <span>睡眠总时长</span>
                                    <br>
                                    <span class="bolder" id="slumber_time">0</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="date-div">
                        <label for="date">日期：</label><input type="date" id="slumber_date" class="date" onchange="updateSlumberInfo()" value="<?php echo date('Y-m-d');?>">
                    </div>
                    <div class="title-2">
                        <p>睡眠分析:<span id="slumberGot"></span></p>
                    </div>
                    <canvas id="slumberChart" width="800" height="0"></canvas>
                </div>
            </div>
        </div>
    </div> 
	<div class="container">
	<div class="alert alert-success alert-dismissible" role="alert" id="modifyResult"
		style="display:none;margin:0 15px 0 0;">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong id="modifyResultText"></strong>
	</div>
	</div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>

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

<!--footer-->
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h4>网站导航</h4>
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
        <p> &copy; 2015 partner. All Rights Reserved | Design by <a href="#">你的伙伴</a></p>
    </div>
</div>
<!--//copy-right-->

<!-- for bootstrap working -->
<script type="text/javascript" src="/partner/Application/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/partner/Application/Public/js/bootstrap.js"></script>
<script type="text/javascript" src="/partner/Application/Public/js/Chart.js"></script>
<script type="text/javascript" src="/partner/Application/Public/js/health.js"></script>
<script>
    $("#exercise_goal").ready(function() {
        $("#exercise_goal").keypress(function (e) {
          if (e.which == 13) {
            saveExerciseGoal()
            return false;    //<---- Add this line
          }
        });
    });
</script>
<!-- //for bootstrap working -->
</body>
</html>