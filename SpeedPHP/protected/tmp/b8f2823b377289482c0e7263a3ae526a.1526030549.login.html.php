<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="/SpeedPHP/I/css/bootstrap.min.css">
	<script type="text/javascript" src="/SpeedPHP/I/js/jquery.min.js"></script>
	<script type="text/javascript" src="/SpeedPHP/I/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default" style="margin-bottom: 0px">
	</nav>
	<div class="jumbotron" style="margin-bottom: 0px">
		<h1 style="text-align:center;font-family:sansserif">后台登陆页面</h1>
	</div>
	<div class="container" style="margin-top: 5%">
		<div class="row">
		<div class="col-xs-6 col-sm-1"></div>
		<div class="col-xs-6 col-sm-10">
			<form class="form-horizontal" action="<?php echo url(array('c'=>'admin', 'a'=>'signin', ));?>">
				<div class="form-group has-feedback">
					<label class="control-label col-sm-2" for="inputSuccess3">用户名</label>
					<div class="col-sm-10">
						<input name="username" type="text" class="form-control input-lg" id="inputSuccess3" aria-describedby="inputSuccess3Status">
						<span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>
						<span id="inputSuccess3Status" class="sr-only">(success)</span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label col-sm-2" for="inputSuccess4">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
					<div class="col-sm-10">
						<input name="passwd" type="password" class="form-control input-lg" id="inputSuccess4" aria-describedby="inputSuccess3Status">
						<span class="glyphicon glyphicon-lock form-control-feedback" aria-hidden="true"></span>
						<span id="inputSuccess3Status" class="sr-only">(success)</span>
					</div>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label col-sm-2"  for="inputSuccess5">验证码</label>

					<div class="col-sm-2">
						<input type="text" name="captcha" class="form-control" id="inputSuccess5">
					</div>
					<div class="col-xs-8">
						<!-- 验证码 -->
						<img src="<?php echo url(array('c'=>'admin', 'a'=>'captcha', ));?>" width="145" height="35" alt="CAPTCHA" border="1" onclick="this.src=<?php echo url(array('c'=>'admin', 'a'=>'captcha', ));?>" style="cursor: pointer;" title="看不清？点击更换另一个验证码">
					</div>
				</div>
				<div class="col-sm-1"></div>
				<div class="col-sm-11" style="padding-right: 0px">
					<button type="submit" class="btn btn-primary btn-lg btn-block">登陆</button>
				</div>
			</form>
		</div>
		<!-- Optional: clear the XS cols if their content doesn't match in height -->
		<div class="clearfix visible-xs-block"></div>
		<div class="col-xs-6 col-sm-1">.</div>
		</div>
	</div>
</body>
</html>