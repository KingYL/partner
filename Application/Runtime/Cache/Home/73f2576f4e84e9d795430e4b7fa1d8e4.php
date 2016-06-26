<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>伙伴登陆</title>
<link rel="stylesheet" type="text/css" href="/partner/Application/Public/css/signin.css">
</head>
<body>

<div class="htmleaf-container">
	<div class="wrapper">
		<div class="container">
			<h1>欢迎登陆“伙伴”</h1>
			
			<form class="form" method="post" action="<?php echo U('Login/signIn');?>">
				<input type="text" name="id" placeholder="用户名">
				<input type="password" name="password" placeholder="密码">
				<button id="login-button">登陆</button>
				<p>没有账号？<a href="<?php echo U('Login/signUp');?>">立即注册>></a></p>
			</form>
		</div>
		
		<ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</div>

<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';color:#000000">
<p>欢迎来到你的“伙伴”</p>
<p>Copyright &copy; 2015<a target="_blank" href="#">伙伴</a></p>
</div>

<script type="text/javascript" src="/partner/Application/Public/js/user.js"></script>
</body>
</html>