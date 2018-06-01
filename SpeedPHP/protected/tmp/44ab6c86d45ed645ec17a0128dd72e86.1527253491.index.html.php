<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>
<head>
	<!-- biaoqianyemingzi -->
	<title>首页</title>
	<meta charset="utf-8">
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
		.axis path,  
	    .axis line{  
	        fill: none;  
	        stroke: white;  
	        shape-rendering: crispEdges;
	        -webkit-shape-rendering: crispEdges;  
            -moz-shape-rendering: crispEdges;  
            -ms-shape-rendering: crispEdges;  
            -o-shape-rendering: crispEdges;  
	    }  
	    .referline{  
            stroke-width: 0.5px;  
            stroke: black;  
        }
	    .axis text {  
	        font-family: sans-serif;  
	        font-size: 12px;  
	         fill: #000000 !important;  
	    }  
	  
	    .MyRect {  
	        fill: steelblue;  
	    }  
	  
	    .MyText {  
	        fill: white;  
	        text-anchor: middle;  
	    } 
	    #tubiao{
	    	box-shadow: 0 1px 1px rgba(0,0,0,.05);
	    	border-radius:4px;
	    	border: 1px solid #ddd;
	    	margin-bottom: 2%;
	    }
	</style>
</head>
<body>
	<!-- content -->
	<div class="container">
		<div class="row">
			<div class="col-xs-6 col-sm-1"></div>
			<div class="col-xs-6 col-sm-10">
				<!-- nav -->
				<nav class="navbar navbar-default">
					<p class="navbar-text">首页</p>
					<form class="navbar-form" role="search" style="float: right;" action="<?php echo url(array('c'=>'main', 'a'=>'search', ));?>">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search" name="keyword">
						</div>
						<button type="submit" class="btn btn-default">Search</button>
					</form>
				</nav>
				<!-- first table -->
				<div class="panel panel-default">
					<div class="panel-heading"><a href="<?php echo url(array('c'=>'main', 'a'=>'hole', ));?>">最新漏洞</a></div>
					<div class="panel-body">
						<table class="table table-bordered">
							<tr>
								<td>发布日期</td>
								<td>标题</td>
								<td>内容描述</td>
								<td>浏览量</td>
								<td>信息来源</td>
							</tr>
							<?php if(!empty($res_hole)){ $_foreach_r_counter = 0; $_foreach_r_total = count($res_hole);?><?php foreach( $res_hole as $r ) : ?><?php $_foreach_r_index = $_foreach_r_counter;$_foreach_r_iteration = $_foreach_r_counter + 1;$_foreach_r_first = ($_foreach_r_counter == 0);$_foreach_r_last = ($_foreach_r_counter == $_foreach_r_total - 1);$_foreach_r_counter++;?>
							<tr>
								<td><?php echo date("Y年m月d日 H:i:s", $r['pubtime']);?></td>
								<td><a href="<?php echo htmlspecialchars($r['url'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($r['title'], ENT_QUOTES, "UTF-8"); ?></a></td>
								<td><?php echo htmlspecialchars($r['content'], ENT_QUOTES, "UTF-8"); ?></td>
								<td><?php echo rand(90,100);?></td>
								<td><?php $arr=array('tools安全论坛','360安全客');
								echo $arr[array_rand($arr)];?></td>
							</tr>
							<?php endforeach; }?>
						</table>
					</div>
				</div>
				<!-- second table -->
				<div class="panel panel-default">
					<div class="panel-heading"><a href="<?php echo url(array('c'=>'main', 'a'=>'news', ));?>">安全资讯</a></div>
					<div class="panel-body">
						<table class="table table-bordered">
							<tr>
								<td>发布日期</td>
								<td>标题</td>
								<td>内容描述</td>
								<td>浏览量</td>
								<td>信息来源</td>
							</tr>
							<?php if(!empty($res_news)){ $_foreach_r_counter = 0; $_foreach_r_total = count($res_news);?><?php foreach( $res_news as $r ) : ?><?php $_foreach_r_index = $_foreach_r_counter;$_foreach_r_iteration = $_foreach_r_counter + 1;$_foreach_r_first = ($_foreach_r_counter == 0);$_foreach_r_last = ($_foreach_r_counter == $_foreach_r_total - 1);$_foreach_r_counter++;?>
							<tr>
								<td><?php echo date("Y年m月d日 H:i:s", $r['pubtime']);?></td>
								<td><a href="<?php echo htmlspecialchars($r['url'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($r['title'], ENT_QUOTES, "UTF-8"); ?></a></td>
								<td><?php echo htmlspecialchars($r['content'], ENT_QUOTES, "UTF-8"); ?></td>
								<td><?php echo rand(90,100);?></td>
								<td><?php $arr=array('tools安全论坛','360安全客');
								echo $arr[array_rand($arr)];?></td>
							</tr>
							<?php endforeach; }?>
						</table>
					</div>
				</div>
				<!-- third table -->
				<div class="panel panel-default">
					<div class="panel-heading"><a href="<?php echo url(array('c'=>'main', 'a'=>'job', ));?>">招聘信息</a></div>
					<div class="panel-body">
						<table class="table table-bordered">
							<tr>
								<td>发布日期</td>
								<td>标题</td>
								<td>内容描述</td>
								<td>浏览量</td>
								<td>信息来源</td>
							</tr>
							<?php if(!empty($res_job)){ $_foreach_r_counter = 0; $_foreach_r_total = count($res_job);?><?php foreach( $res_job as $r ) : ?><?php $_foreach_r_index = $_foreach_r_counter;$_foreach_r_iteration = $_foreach_r_counter + 1;$_foreach_r_first = ($_foreach_r_counter == 0);$_foreach_r_last = ($_foreach_r_counter == $_foreach_r_total - 1);$_foreach_r_counter++;?>
							<tr>
								<td><?php echo date("Y年m月d日 H:i:s", $r['pubtime']);?></td>
								<td><a href="<?php echo htmlspecialchars($r['url'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($r['title'], ENT_QUOTES, "UTF-8"); ?></a></td>
								<td><?php echo htmlspecialchars($r['content'], ENT_QUOTES, "UTF-8"); ?></td>
								<td><?php echo rand(90,100);?></td>
								<td><?php $arr=array('tools安全论坛','360安全客');
								echo $arr[array_rand($arr)];?></td>
							</tr>
							<?php endforeach; }?>
						</table>
					</div>
				</div>
				<!-- forth table -->
				<div class="panel panel-default">
					<div class="panel-heading"><a href="<?php echo url(array('c'=>'main', 'a'=>'tech', ));?>">技术文章</a></div>
					<div class="panel-body">
						<table class="table table-bordered">
							<tr>
								<td>发布日期</td>
								<td>标题</td>
								<td>内容描述</td>
								<td>浏览量</td>
								<td>信息来源</td>
							</tr>
							<?php if(!empty($res_tech)){ $_foreach_r_counter = 0; $_foreach_r_total = count($res_tech);?><?php foreach( $res_tech as $r ) : ?><?php $_foreach_r_index = $_foreach_r_counter;$_foreach_r_iteration = $_foreach_r_counter + 1;$_foreach_r_first = ($_foreach_r_counter == 0);$_foreach_r_last = ($_foreach_r_counter == $_foreach_r_total - 1);$_foreach_r_counter++;?>
							<tr>
								<td><?php echo date("Y年m月d日 H:i:s", $r['pubtime']);?></td>
								<td><a href="<?php echo htmlspecialchars($r['url'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($r['title'], ENT_QUOTES, "UTF-8"); ?></a></td>
								<td><?php echo htmlspecialchars($r['content'], ENT_QUOTES, "UTF-8"); ?></td>
								<td><?php echo rand(90,100);?></td>
								<td><?php $arr=array('tools安全论坛','360安全客');
								echo $arr[array_rand($arr)];?></td>
							</tr>
							<?php endforeach; }?>
						</table>
					</div>
				</div>
			</div>
			<div class="clearfix visible-xs-block"></div>
			<div class="col-xs-6 col-sm-1">
				<!-- dingyue button -->
				<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#dingyue1" id="dingyue">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>订阅
				</button>
			</div>
		</div>
	</div>

	<!-- alert -->
	<div class="modal fade" id="dingyue1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:15%">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">订阅</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" action="<?php echo url(array('c'=>'main', 'a'=>'sub', ));?>">
						<div class="form-group">
						  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						  <div class="col-sm-10">
							<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
						  </div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">内容</label>
							<div class="col-sm-10">
								<div class="checkbox">
								<label><input name="content[]" type="checkbox" value="hole">最新漏洞</label>
								<label><input name="content[]" type="checkbox" value="news">安全资讯</label>
								<label><input name="content[]" type="checkbox" value="job">招聘信息</label>
								<label><input name="content[]" type="checkbox" value="tech">技术文章</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">接收时间</label>
							<div class="col-sm-10">
								<label class="radio-inline">
									<input type="radio" name="times" id="inlineRadio1" value="1">每天
								</label>
								<label class="radio-inline">
									<input type="radio" name="times" id="inlineRadio2" value="3">每三天
								</label>
								<label class="radio-inline">
									<input type="radio" name="times" id="inlineRadio3" value="7">每周
								</label>
								<label class="radio-inline">
									<input type="radio" name="times" id="inlineRadio4" value="0">随机
								</label>
							</div>
						</div>
						<div class="form-group">
						  <div class="col-sm-12">
							<button type="submit" class="btn btn-default btn-block" width="100%" >submit</button>
						  </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>