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
								<?php if(!empty($res_hole)){ $_foreach_r_counter = 0; $_foreach_r_total = count($res_hole);?><?php foreach( $res_hole as $r ) : ?><?php $_foreach_r_index = $_foreach_r_counter;$_foreach_r_iteration = $_foreach_r_counter + 1;$_foreach_r_first = ($_foreach_r_counter == 0);$_foreach_r_last = ($_foreach_r_counter == $_foreach_r_total - 1);$_foreach_r_counter++;?>
								<tr>
									<td><?php echo date("Y年m月d日 H:i:s", $r['pubtime']);?></td>
									<td><a href="<?php echo htmlspecialchars($r['url'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($r['title'], ENT_QUOTES, "UTF-8"); ?></a></td>
									<td><?php echo htmlspecialchars($r['content'], ENT_QUOTES, "UTF-8"); ?></td>
									<td></td>
									<td>469</td>
								</tr>
								<?php endforeach; }?>
							</tbody>
						</table>
						<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
							<?php if ($pager) : ?>
							<nav>
							<div class="btn-group" role="group" aria-label="First group">
								<a href="<?php echo url(array('c'=>'main', 'a'=>'hole', ));?>">
								 	<button type="button" class="btn btn-default">           
						           		<span aria-hidden="true">首页
						           		</span>
						       		</button>
						       	</a>
								<a href="<?php echo url(array('c'=>'main', 'a'=>'hole', 'p'=>$pager['prev_page'], ));?>">
									<button type="button" class="btn btn-default">
						            	<span aria-hidden="true">上一页</span>
						        	</button>
					        	</a>
						        <?php if(!empty($pager['all_pages'])){ $_foreach_p_counter = 0; $_foreach_p_total = count($pager['all_pages']);?><?php foreach( $pager['all_pages'] as $p ) : ?><?php $_foreach_p_index = $_foreach_p_counter;$_foreach_p_iteration = $_foreach_p_counter + 1;$_foreach_p_first = ($_foreach_p_counter == 0);$_foreach_p_last = ($_foreach_p_counter == $_foreach_p_total - 1);$_foreach_p_counter++;?>
						        <?php if ($p == $pager['current_page']) : ?>
						        <?php endif; ?>
						            <a href="<?php echo url(array('c'=>'main', 'a'=>'hole', 'p'=>$p, ));?>">
						            	<button type="button" class="btn btn-default"><?php echo htmlspecialchars($p, ENT_QUOTES, "UTF-8"); ?>
						            	</button>
						            </a>
						        <?php endforeach; }?>
						        <a href="<?php echo url(array('c'=>'main', 'a'=>'hole', 'p'=>$pager['next_page'], ));?>">
						        	<button type="button" class="btn btn-default">
						                <span aria-hidden="true">下一页</span>
						        	</button>
						        </a>
						        <a href="<?php echo url(array('c'=>'main', 'a'=>'hole', 'p'=>$pager['prev_page'], ));?>">
						        	<button type="button" class="btn btn-default">
						                <span aria-hidden="true">尾页</span>
						            
						        	</button>
						        </a>
							</div>
							</nav>
							<?php endif; ?>
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