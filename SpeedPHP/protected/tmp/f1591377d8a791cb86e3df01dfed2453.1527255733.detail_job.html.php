<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>人才招聘信息</title>
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
								<li><a href="<?php echo url(array('c'=>'main', 'a'=>'hole', ));?>">最新漏洞</a></li>
								<li><a href="<?php echo url(array('c'=>'main', 'a'=>'tech', ));?>">技术文章</a></li>
								<li><a href="<?php echo url(array('c'=>'main', 'a'=>'news', ));?>">安全资讯</a></li>
							</ul>
							<form class="navbar-form navbar-right" role="search" method="POST" action="<?php echo url(array('c'=>'main', 'a'=>'Search', ));?>">
								<div class="form-group">
									<input type="text" class="form-control" name="t" id="t">
								</div>
								<button type="submit" class="btn btn-default">搜索</button>
							</form>

						</div>
					</div>
				</nav>
				<div id="tubiao" align="center">
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">人才招聘</h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered" style="text-align: center">
							<thead>
								<tr>
									<th>发布时间</th>
									<th>标题</th>
									<th>内容简述</th>
									<th>信息来源</th>
									<th><i class="icon icon-thumbs-o-up"></i> 浏览量</th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($res_job)){ $_foreach_r_counter = 0; $_foreach_r_total = count($res_job);?><?php foreach( $res_job as $r ) : ?><?php $_foreach_r_index = $_foreach_r_counter;$_foreach_r_iteration = $_foreach_r_counter + 1;$_foreach_r_first = ($_foreach_r_counter == 0);$_foreach_r_last = ($_foreach_r_counter == $_foreach_r_total - 1);$_foreach_r_counter++;?>
								<tr>
									<td><?php echo date("Y年m月d日 H:i:s", $r['pubtime']);?></td>
									<td><a href="<?php echo htmlspecialchars($r['url'], ENT_QUOTES, "UTF-8"); ?>"><?php echo htmlspecialchars($r['title'], ENT_QUOTES, "UTF-8"); ?></a></td>
									<td><?php echo htmlspecialchars($r['content'], ENT_QUOTES, "UTF-8"); ?></td>
									<td><?php $arr=array('tools安全论坛','360安全客');
									echo $arr[array_rand($arr)];?></td>
									<td><?php echo rand(90,100);?></td>
								</tr>
								<?php endforeach; }?>
							</tbody>
						</table>
						<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
							<?php if ($pager) : ?>
							<nav>
							<div class="btn-group" role="group" aria-label="First group">
								<a href="<?php echo url(array('c'=>'main', 'a'=>'job', ));?>">
								 	<button type="button" class="btn btn-default">           
						           		<span aria-hidden="true">首页
						           		</span>
						       		</button>
						       	</a>
								<a href="<?php echo url(array('c'=>'main', 'a'=>'job', 'p'=>$pager['prev_page'], ));?>">
									<button type="button" class="btn btn-default">
						            	<span aria-hidden="true">上一页</span>
						        	</button>
					        	</a>
						        <?php if(!empty($pager['all_pages'])){ $_foreach_p_counter = 0; $_foreach_p_total = count($pager['all_pages']);?><?php foreach( $pager['all_pages'] as $p ) : ?><?php $_foreach_p_index = $_foreach_p_counter;$_foreach_p_iteration = $_foreach_p_counter + 1;$_foreach_p_first = ($_foreach_p_counter == 0);$_foreach_p_last = ($_foreach_p_counter == $_foreach_p_total - 1);$_foreach_p_counter++;?>
						        <?php if ($p == $pager['current_page']) : ?>
						        <?php endif; ?>
						            <a href="<?php echo url(array('c'=>'main', 'a'=>'job', 'p'=>$p, ));?>">
						            	<button type="button" class="btn btn-default"><?php echo htmlspecialchars($p, ENT_QUOTES, "UTF-8"); ?>
						            	</button>
						            </a>
						        <?php endforeach; }?>
						        <a href="<?php echo url(array('c'=>'main', 'a'=>'job', 'p'=>$pager['next_page'], ));?>">
						        	<button type="button" class="btn btn-default">
						                <span aria-hidden="true">下一页</span>
						        	</button>
						        </a>
						        <a href="<?php echo url(array('c'=>'main', 'a'=>'job', 'p'=>$pager['last_page'], ));?>">
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
	<script src="/SpeedPHP/I/js/d3.v3.min.js" charset="utf-8"></script>    
    <script>  
	  
	    //画布大小  
	    var width = 913;  
	    var height = 400;  
	  
	    //在 body 里添加一个 SVG 画布     
	    var svg = d3.select("#tubiao")  
	        .append("svg")  
	        .attr("width", width)  
	        .attr("height", height);  
	  
	    //画布周边的空白  
	    var padding = {left:30, right:30, top:20, bottom:20};  
	  
	    //定义一个数组  
	    var dataset = [<?php echo $beijing;?>, <?php echo $kangzhou;?>, <?php echo $xian;?>, <?php echo $safe;?>, <?php echo $stcs;?>, <?php echo $stu;?>,<?php echo $high;?>, <?php echo $yw;?>];  
	          
	    //x轴的比例尺  
	    var xScale = d3.scale.ordinal()
        .domain(["工作地点：杭州","工作地点：北京","工作地点：南京","安全工程师","渗透测试工程师","实习生","高级工程师","运维岗位"]) 
        .rangeRoundBands([0, width - padding.left - padding.right]);
	    // var xScale = d3.scale.ordinal()  
	    //     .domain(d3.range(dataset.length))  
	    //     .rangeRoundBands([0, width - padding.left - padding.right]);  
	  
	    //y轴的比例尺  
	    var yScale = d3.scale.linear()  
	        .domain([0,d3.max(dataset)])  
	        .range([height - padding.top - padding.bottom, 0]);  
	  
	    //定义x轴  
	    var xAxis = d3.svg.axis()  
	        .scale(xScale)  
	        .orient("bottom");  
	          
	    //定义y轴  
	    var yAxis = d3.svg.axis()  
	        .scale(yScale)  
	        .orient("left");  
	  
	    //矩形之间的空白  
	    var rectPadding = 25;  
	    var xScale1 = [15.5,121.5,227.5,333.5,439.5,545.5,651.5,757.5];
	    //添加矩形元素  
	    var rects = svg.selectAll(".MyRect")  
	        .data(dataset)  
	        .enter()  
	        .append("rect")  
	        .attr("class","MyRect")  
	        .attr("transform","translate(" + padding.left + "," + padding.top + ")")  
	        .attr("x", function(d,i){  
	            return xScale1[i];  
	        } )  
	        .attr("y",function(d){  
	             var min=yScale.domain()[0];  
	            return yScale(min);  
	        })  
	        .attr("width", xScale.rangeBand() - rectPadding )  
	        .attr("height", function(d){  
	            return 0;  
	        })  
	         .transition()  
	            .delay(function(d,i){  
	                    return i*200;  
	            })  
	            .duration(2000)  
	            .ease("bounce")  
	            .attr("y",function(d){  
	                return yScale(d);  
	            })  
	            .attr("height",function(d){  
	                    return height - padding.top - padding.bottom - yScale(d);  
	            })  
	  
	    //添加文字元素  
	    var texts = svg.selectAll(".MyText")  
	        .data(dataset)  
	        .enter()  
	        .append("text")  
	        .attr("class","MyText")  
	        .attr("transform","translate(" + padding.left + "," + padding.top + ")")  
	        .attr("x", function(d,i){  
	            return xScale1[i];  
	        } )  
	        .attr("y",function(d){  
	            return yScale(d);  
	        })  
	        .attr("dx",function(){  
	            return (xScale.rangeBand() - rectPadding)/2;  
	        })  
	        .attr("dy",function(d){  
	            return 20;  
	        })  
	        .text(function(d){  
	            return d;  
	        })  
	            .transition()  
	            .delay(function(d,i){  
	                    return i*200;  
	            })  
	            .duration(2000)  
	            .ease("bounce")  
	            .attr("y",function(d){  
	                return yScale(d);  
	            })  
	  
	    //添加x轴  
	    svg.append("g")  
	        .attr("class","axis")  
	        .attr("transform","translate(" + padding.left + "," + (height - padding.bottom) + ")")  
	        .call(xAxis);   
	          
	    //添加y轴  
	    // svg.append("g")  
	    //     .attr("class","axis")  
	    //     .attr("transform","translate(" + padding.left + "," + padding.top + ")")  
	    //     .call(yAxis);   
	</script>  
</body>
</html>