<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>搜索结果信息</title>
	<link rel="stylesheet" type="text/css" href="/SpeedPHP/I/css/bootstrap.min.css">
	<script type="text/javascript" src="/SpeedPHP/I/js/jquery.min.js"></script>
	<script type="text/javascript" src="/SpeedPHP/I/js/bootstrap.min.js"></script>
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
								<li class=""><a href="<?php echo url(array('c'=>'main', 'a'=>'index', ));?>">首页</a></li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">搜索结果列表</h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<tr>
								<td>发布时间</td>
								<td>标题</td>
								<td>内容描述</td>
								<td>信息来源</td>
								<td>浏览量</td>
								
							</tr>
							<?php if(!empty($rec_job)){ $_foreach_r_counter = 0; $_foreach_r_total = count($rec_job);?><?php foreach( $rec_job as $r ) : ?><?php $_foreach_r_index = $_foreach_r_counter;$_foreach_r_iteration = $_foreach_r_counter + 1;$_foreach_r_first = ($_foreach_r_counter == 0);$_foreach_r_last = ($_foreach_r_counter == $_foreach_r_total - 1);$_foreach_r_counter++;?>
							<tr>
								<td><?php echo date("Y年m月d日 H:i:s", $r['pubtime']);?></td>
								<td><a href="<?php echo htmlspecialchars($r['url'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($r['title'], ENT_QUOTES, "UTF-8"); ?></a></td>
								<td><?php echo htmlspecialchars($r['content'], ENT_QUOTES, "UTF-8"); ?></td>
								<td><?php $arr=array('tools安全论坛','360安全客');
									echo $arr[array_rand($arr)];?></td>
									<td><?php echo rand(90,100);?></td>
							</tr>
							<?php endforeach; }?>
							<?php if(!empty($rec_hole)){ $_foreach_r_counter = 0; $_foreach_r_total = count($rec_hole);?><?php foreach( $rec_hole as $r ) : ?><?php $_foreach_r_index = $_foreach_r_counter;$_foreach_r_iteration = $_foreach_r_counter + 1;$_foreach_r_first = ($_foreach_r_counter == 0);$_foreach_r_last = ($_foreach_r_counter == $_foreach_r_total - 1);$_foreach_r_counter++;?>
							<tr>
								<td><?php echo date("Y年m月d日 H:i:s", $r['pubtime']);?></td>
								<td><a href="<?php echo htmlspecialchars($r['url'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($r['title'], ENT_QUOTES, "UTF-8"); ?></a></td>
								<td><?php echo htmlspecialchars($r['content'], ENT_QUOTES, "UTF-8"); ?></td>
								<td><?php $arr=array('tools安全论坛','360安全客');
									echo $arr[array_rand($arr)];?></td>
									<td><?php echo rand(90,100);?></td>
							</tr>
							<?php endforeach; }?>
							<?php if(!empty($rec_news)){ $_foreach_r_counter = 0; $_foreach_r_total = count($rec_news);?><?php foreach( $rec_news as $r ) : ?><?php $_foreach_r_index = $_foreach_r_counter;$_foreach_r_iteration = $_foreach_r_counter + 1;$_foreach_r_first = ($_foreach_r_counter == 0);$_foreach_r_last = ($_foreach_r_counter == $_foreach_r_total - 1);$_foreach_r_counter++;?>
							<tr>
								<td><?php echo date("Y年m月d日 H:i:s", $r['pubtime']);?></td>
								<td><a href="<?php echo htmlspecialchars($r['url'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($r['title'], ENT_QUOTES, "UTF-8"); ?></a></td>
								<td><?php echo htmlspecialchars($r['content'], ENT_QUOTES, "UTF-8"); ?></td>
								<td><?php $arr=array('tools安全论坛','360安全客');
									echo $arr[array_rand($arr)];?></td>
									<td><?php echo rand(90,100);?></td>
							</tr>
							<?php endforeach; }?>
							<?php if(!empty($rec_tech)){ $_foreach_r_counter = 0; $_foreach_r_total = count($rec_tech);?><?php foreach( $rec_tech as $r ) : ?><?php $_foreach_r_index = $_foreach_r_counter;$_foreach_r_iteration = $_foreach_r_counter + 1;$_foreach_r_first = ($_foreach_r_counter == 0);$_foreach_r_last = ($_foreach_r_counter == $_foreach_r_total - 1);$_foreach_r_counter++;?>
							<tr>
								<td><?php echo date("Y年m月d日 H:i:s", $r['pubtime']);?></td>
								<td><a href="<?php echo htmlspecialchars($r['url'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($r['title'], ENT_QUOTES, "UTF-8"); ?></a></td>
								<td><?php echo htmlspecialchars($r['content'], ENT_QUOTES, "UTF-8"); ?></td>
								<td><?php $arr=array('tools安全论坛','360安全客');
									echo $arr[array_rand($arr)];?></td>
									<td><?php echo rand(90,100);?></td>
							</tr>
							<?php endforeach; }?>
						</table>
					</div>
				</div>
			</div>
			<div class="clearfix visible-xs-block"></div>
			<div class="col-xs-6 col-sm-1"></div>
		</div>
	</div>
</body>
</html>