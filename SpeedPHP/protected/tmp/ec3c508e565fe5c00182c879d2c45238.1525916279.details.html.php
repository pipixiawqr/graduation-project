<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>information</title>
	<link rel="stylesheet" type="text/css" href="/SpeedPHP/I/css/bootstrap.min.css">
	<script type="text/javascript" src="/SpeedPHP/I/js/jquery.min.js"></script>
	<script type="text/javascript" src="/SpeedPHP/I/js/bootstrap.min.js"></script>
	<style type="text/css">
		th{
			text-align: center;
			background-color: #f1f1f1;
		}
		button{
			outline:none;
		}
		li:hover{
			background-color:#e7e7e7;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-6 col-sm-1"></div>
			<div class="col-xs-6 col-sm-10">
				<!-- nav -->
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
						</div>
						<div class="collapse navbar-collapse navbar-collapse-example">
							<ul class="nav navbar-nav">
								<li class=""><a href="">主页</a></li>
								<li><a href="">漏洞</a></li>
								<li><a href="">招聘</a></li>
								<li><a href="">咨询</a></li>
							</ul>
							<form class="navbar-form navbar-right" role="search" method="POST" action="">
								<div class="form-group">
									<input type="text" class="form-control" name="t" id="t">
								</div>
								<button type="submit" class="btn btn-default">搜索</button>
							</form>

						</div>
					</div>
				</nav>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">文章列表</h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered" style="text-align: center">
							<thead>
								<tr>
									<th>发布时间</th>
									<th>标题</th>
									<th>综述</th>
									<th>信息分类</th>
									<th><i class="icon icon-thumbs-o-up"></i> 浏览量</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>2018-3-30</td>
									<td>PHPCMSv9逻辑漏洞导致备份文件名可猜测</td>
									<td>PHPCMSv9逻辑漏洞导致备份文件名可猜测</a></td>
									<td>[P]</td>
									<td>469</td>
								</tr>
								<tr>
									<td>2018-3-30</td>
									<td>PHPCMSv9逻辑漏洞导致备份文件名可猜测</td>
									<td>PHPCMSv9逻辑漏洞导致备份文件名可猜测</a></td>
									<td>[P]</td>
									<td>469</td>
								</tr>
							</tbody>
						</table>
						<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
							<div class="btn-group" role="group" aria-label="First group">
								<button type="button" class="btn btn-default">当前页</button>
								<button type="button" class="btn btn-default">首页</button>
								<button type="button" class="btn btn-default">下页</button>
								<button type="button" class="btn btn-default">1</button>
								<button type="button" class="btn btn-default">2</button>
								<button type="button" class="btn btn-default">3</button>
								<button type="button" class="btn btn-default">尾页</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix visible-xs-block"></div>
			<div class="col-xs-6 col-sm-1"></div>
		</div>
	</div>
</body>
</html>