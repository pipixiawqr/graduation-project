<?php
error_reporting(0);
ignore_user_abort();//关掉浏览器，PHP脚本也可以继续执行.
set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
class TimeController extends BaseController{
	function actionAdd(){
		$interval=60*30;// 每隔半小时运行
		if (!file_exists(APP_DIR.'I/1.txt')) {	
			$myfile = fopen(APP_DIR.'I/1.txt', 'w') or die("Unable to open file!");
			$txt = "wqr\n";
			fwrite($myfile, $txt);
			fclose($myfile);
		}
		else{
			do{

				 $header=array('User-Agent'=>'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:59.0) Gecko/20100101 Firefox/59.0');
//tools招聘
				 $url="https://www.t00ls.net/HR-articles.html";
				 $res=_httpGet($url,$header);
				 preg_match_all('/<div class=\"col col_12_of_12\">.*?<h4><a href=\"(.*?)\" >(.*?)<\/a><\/h4>.*?<p>(.*?)<\/p>.*?<span class=\"meta_date\">(.*?)<\/span>.*?<\/div>/is',$res,$matches);
				 $job=new model('job');
				 for ($i=0; $i < 10; $i++) { 
					$md5=md5($matches[2][$i].$matches[4][$i]);
					$urldb='https://www.t00ls.net/'.$matches[1][$i];
					$title=$matches[2][$i];
					$content=$matches[3][$i];
					$pubtime=time($matches[4][$i]);	
					$encryption=$job->findAll(array('encryption'=>$md5),"pubtime desc","encryption");
					if (empty($encryption)) {
						echo 1;
						$newrow = array( 
					    'url' => $urldb,
					    'title' => $title,
					    'content' => $content,
					    'pubtime' =>$pubtime,
					    'encryption'=>$md5
						);	
						if ($job->create($newrow)) {
							echo "job success!";
						}
					}	
					else{
						echo "existed!";
						break;
					}			
				 }

//安全客招聘
				$url_1="https://api.anquanke.com/data/v1/posts?size=10&page=1";
				$res_1=_httpGet($url_1,$header);
				$res_1=json_decode($res_1,1);
				for ($j=0; $j < 10; $j++) { 
					$md5_1=md5($res_1['data'][$j]['title'].$res_1['data'][$j]['date']);
					$urldb_1="https://www.anquanke.com/post/id/".$res_1['data'][$j]['id'];
					$title_1=$res_1['data'][$j]['title'];
					$content_1=$res_1['data'][$j]['desc'];
					$pubtime_1=time($res_1['data'][$j]['date']);
					$encryption_1=$job->findAll(array('encryption'=>$md5_1),"pubtime desc","encryption");
					//var_dump($encryption_1);
					if (empty($encryption_1)) {
						//echo 1;
						$newrow_1 = array( 
					    'url' => $urldb_1,
					    'title' => $title_1,
					    'content' => $content_1,
					    'pubtime' =>$pubtime_1,
					    'encryption'=>$md5_1
						);	
						if ($job->create($newrow_1)) {
							echo "job1 success!";
						}
					}	
					else{
						echo "existed!";
						break;
					}			
				}

			
				$url_hole="https://www.t00ls.net/vuls.html?page=1";
				$res_hole=_httpGet($url_hole,$header);
				preg_match_all('/<div class=\"col col_12_of_12\">.*?<h4><a href=\"(.*?)\" >(.*?)<\/a><\/h4>.*?<p>(.*?)<\/p>.*?<span title=\"(.*?)\">.*?<\/div>/is',$res_hole,$matches_hole);
				$hole=new model('hole');
				for ($k=0; $k < 4; $k++) { 
					$md5_hole=md5($matches_hole[2][$k].$matches_hole[4][$k]);
					$urldb_hole='https://www.t00ls.net/'.$matches_hole[1][$k];
					$title_hole=$matches_hole[2][$k];
					$content_hole=$matches_hole[3][$k];
					$pubtime_hole=time($matches_hole[4][$k]);	
					$encryption_hole=$hole->findAll(array('encryption'=>$md5_hole),"pubtime desc","encryption");
					if (empty($encryption_hole)) {
						$newrow_hole = array( 
					    'url' => $urldb_hole,
					    'title' => $title_hole,
					    'content' => $content_hole,
					    'pubtime' =>$pubtime_hole,
					    'encryption'=>$md5_hole
						);	
						if ($hole->create($newrow_hole)) {
							echo "hole success!";
						}
					}	
					else{
						echo "existed!";
						break;
					}			
				}



				$url_hole_1="https://www.anquanke.com/vul";
				$res_hole_1=_httpGet($url_hole_1,$header);
				preg_match_all('/<div class=\"vul-item.*?<a href=\"(.*?)\".*?<h2>(.*?)<\/h2>.*?<span>(.*?)<\/span>.*?<span style=\"padding-left.*?\".*?发布时间：(.*?)<\/span>.*?<\/div>/is',$res_hole_1,$matches_hole_1);
				for ($m=0; $m < 10; $m++) { 
					$md5_hole_1=md5($matches_hole_1[2][$m].$matches_hole_1[4][$m]);
					$urldb_hole_1=$matches_hole_1[1][$m];
					$title_hole_1=$matches_hole_1[2][$m];
					$content_hole_1=$matches_hole_1[3][$m];
					$pubtime_hole_1=time($matches_hole_1[4][$m]);	
					$encryption_hole_1=$hole->findAll(array('encryption'=>$md5_hole_1),"pubtime desc","encryption");
					if (empty($encryption_hole_1)) {
						$newrow_hole_1 = array( 
					    'url' => $urldb_hole_1,
					    'title' => $title_hole_1,
					    'content' => $content_hole_1,
					    'pubtime' =>$pubtime_hole_1,
					    'encryption'=>$md5_hole_1
						);	
						if ($hole->create($newrow_hole_1)) {
							echo "hole1 success!";
						}
					}	
					else{
						echo "existed!";
						break;
					}			
				}



				$url_tech="https://www.t00ls.net/tech.html";
				$res_tech=_httpGet($url_tech,$header);
				preg_match_all('/<div class=\"col col_12_of_12\">.*?<h4><a href=\"(.*?)\" >(.*?)<\/a><\/h4>.*?<p>(.*?)<\/p>.*?<span class=\"meta_date\"(.*?)<\/span>.*?<\/div>/is',$res_tech,$matches_tech);
				$tech=new model('tech');
				for ($n=0; $n < 9; $n++) { 
					if (strlen($matches_tech[4][$n])==54) {
					$pubtime_tech=time(substr($matches_tech[4][$n], 13,15));	
					}	
					$md5_tech=md5($matches_tech[2][$n].$matches_tech[4][$n]);
					$urldb_tech='https://www.t00ls.net/'.$matches_tech[1][$n];
					$title_tech=$matches_tech[2][$n];
					$content_tech=$matches_tech[3][$n];	
					$pubtime_tech=time($matches_tech[4][$n]);
					$encryption_tech=$tech->findAll(array('encryption'=>$md5_tech),"pubtime desc","encryption");
					if (empty($encryption_tech)) {
						$newrow_tech = array( 
					    'url' => $urldb_tech,
					    'title' => $title_tech,
					    'content' => $content_tech,
					    'pubtime' =>$pubtime_tech,
					    'encryption'=>$md5_tech
						);	
						if ($tech->create($newrow_tech)) {
							echo "tech success!";
						}
					}	
					else{
						echo "existed!";
						break;
					}			
				}


//安全客技术文章
				$url_tech_1="https://api.anquanke.com/data/v1/posts?size=10&page=1&category=knowledge";
				$res_tech_1=_httpGet($url_tech_1,$header);
				$res_tech_1=json_decode($res_tech_1,1);
				for ($a=0; $a < 10; $a++) { 
					$md5_tech_1=md5($res_tech_1['data'][$a]['title'].$res_tech_1['data'][$a]['date']);
					$urldb_tech_1="https://www.anquanke.com/post/id/".$res_tech_1['data'][$a]['id'];
					$title_tech_1=$res_tech_1['data'][$a]['title'];
					$content_tech_1=$res_tech_1['data'][$a]['desc'];
					$pubtime_tech_1=time($res_tech_1['data'][$a]['date']);
					$encryption_tech_1=$tech->findAll(array('encryption'=>$md5_tech_1),"pubtime desc","encryption");
					if (empty($encryption_tech_1)) {
						$newrow_tech_1 = array( 
					    'url' => $urldb_tech_1,
					    'title' => $title_tech_1,
					    'content' => $content_tech_1,
					    'pubtime' =>$pubtime_tech_1,
					    'encryption'=>$md5_tech_1
						);	
						if ($tech->create($newrow_tech_1)) {
							echo "tech1 success!";
						}
					}	
					else{
						echo "existed!";
						break;
					}			
				}


				$url_news="https://www.t00ls.net/news.html";
				$res_news=_httpGet($url_news,$header);
				preg_match_all('/<div class=\"col col_12_of_12\">.*?<h4><a href=\"(.*?)\" >(.*?)<\/a><\/h4>.*?<p>(.*?)<\/p>.*?<span class=\"meta_date\"(.*?)<\/span>.*?<\/div>/is',$res_news,$matches_news);
				$news=new model('news');
				for ($b=0; $b < 10; $b++) { 	
					$md5_news=md5($matches_news[2][$b].$matches_news[4][$b]);
					$urldb_news='https://www.t00ls.net/'.$matches_news[1][$b];
					$title_news=$matches_news[2][$b];
					$content_news=$matches_news[3][$b];	
					$pubtime_news=time($matches_news[4][$b]);
					$encryption_news=$news->findAll(array('encryption'=>$md5_news),"pubtime desc","encryption");
					if (empty($encryption_news)) {
						$newrow_news = array( 
					    'url' => $urldb_news,
					    'title' => $title_news,
					    'content' => $content_news,
					    'pubtime' =>$pubtime_news,
					    'encryption'=>$md5_news
						);	
						if ($news->create($newrow_news)) {
							echo "news success!";
						}
					}	
					else{
						echo "existed!";
						break;
					}			
				}


				$url_news_1="https://api.anquanke.com/data/v1/posts?size=10&page=1&category=news";
				$res_news_1=_httpGet($url_news_1,$header);
				$res_news_1=json_decode($res_news_1,1);
				for ($c=0; $c < 10; $c++) { 
					$md5_news_1=md5($res_news_1['data'][$c]['title'].$res_news_1['data'][$c]['date']);
					$urldb_news_1="https://www.anquanke.com/post/id/".$res_news_1['data'][$c]['id'];
					$title_news_1=$res_news_1['data'][$c]['title'];
					$content_news_1=$res_news_1['data'][$c]['desc'];
					$pubtime_news_1=time($res_news_1['data'][$c]['date']);
					$encryption_news_1=$news->findAll(array('encryption'=>$md5_news_1),"pubtime desc","encryption");
					if (empty($encryption_news_1)) {
						$newrow_news_1 = array( 
					    'url' => $urldb_news_1,
					    'title' => $title_news_1,
					    'content' => $content_news_1,
					    'pubtime' =>$pubtime_news_1,
					    'encryption'=>$md5_news_1
						);	
						if ($news->create($newrow_news_1)) {
							echo "news1 success!";
						}
					}	
					else{
						echo "existed!";
						break;
					}			
				}
			}while(true);
			sleep($interval);				
		}
	}


	function actionEmail(){
		if (!file_exists(APP_DIR.'I/2.txt')) {
			$myfile2 = fopen(APP_DIR.'I/2.txt', "w") or die("Unable to open file!");
			$txt2 = "wqr2\n";
			fwrite($myfile2, $txt2);
			fclose($myfile2);
		}else{
				$users=new model("users");
				$times=$users->findAll(null,null,"times");
				foreach ($times as $value) {
					if ($value['times']==1) {
						do{
							$res=$users->findAll(null,null,"email,content");
							foreach ($res as $value) {
								$address=$value['email'];
								$title=$value['content'];
								$arr=explode(',',$value['content']);
								foreach ($arr as $v) {
									$model=new model("$v");
									$res=$model->findAll(null,"pubtime desc","url,title,content,pubtime","0,1");
									echo "<pre>";
									var_dump($res);
									$content="<!DOCTYPE html>
										<html>
										<head>
											<meta charset=\"utf-8\">
										</head>
										<body>
											<table>
											<tr>
												<td><a href=".$res[0]['url'].">".$res[0]['title']."</a></td>
												<td>".$res[0]['content']."</td>
											</tr>
											</table>
										</body>
										</html>";
										sendemail($address,$title,$content);
								}						
							}
							sleep(24*60*60);
						}while(true);
					}
					if ($value['times']==3) {
						do{
							$res=$users->findAll(null,null,"email,content");
							foreach ($res as $value) {
								$address=$value['email'];
								$title=$value['content'];
								$arr=explode(',',$value['content']);
								foreach ($arr as $v) {
									$model=new model("$v");
									$res=$model->findAll(null,"pubtime desc","url,title,content,pubtime","0,1");
									echo "<pre>";
									var_dump($res);
									$content="<!DOCTYPE html>
										<html>
										<head>
											<meta charset=\"utf-8\">
										</head>
										<body>
											<table>
											<tr>
												<td><a href=".$res[0]['url'].">".$res[0]['title']."</a></td>
												<td>".$res[0]['content']."</td>
											</tr>
											</table>
										</body>
										</html>";
										sendemail($address,$title,$content);
								}						
							}
							sleep(3*24*60*60);
						}while(true);
					}
					if ($value['times']==7) {
						do{
							$res=$users->findAll(null,null,"email,content");
							foreach ($res as $value) {
								$address=$value['email'];
								$title=$value['content'];
								$arr=explode(',',$value['content']);
								foreach ($arr as $v) {
									$model=new model("$v");
									$res=$model->findAll(null,"pubtime desc","url,title,content,pubtime","0,1");
									echo "<pre>";
									var_dump($res);
									$content="<!DOCTYPE html>
										<html>
										<head>
											<meta charset=\"utf-8\">
										</head>
										<body>
											<table>
											<tr>
												<td><a href=".$res[0]['url'].">".$res[0]['title']."</a></td>
												<td>".$res[0]['content']."</td>
											</tr>
											</table>
										</body>
										</html>";
										sendemail($address,$title,$content);
								}						
							}
							sleep(7*24*60*60);
						}while(true);
					}
					if ($value['times']==0) {
						do{
							$res=$users->findAll(null,null,"email,content");
							foreach ($res as $value) {
								$address=$value['email'];
								$title=$value['content'];
								$arr=explode(',',$value['content']);
								foreach ($arr as $v) {
									$model=new model("$v");
									$res=$model->findAll(null,"pubtime desc","url,title,content,pubtime","0,1");
									echo "<pre>";
									var_dump($res);
									$content="<!DOCTYPE html>
										<html>
										<head>
											<meta charset=\"utf-8\">
										</head>
										<body>
											<table>
											<tr>
												<td><a href=".$res[0]['url'].">".$res[0]['title']."</a></td>
												<td>".$res[0]['content']."</td>
											</tr>
											</table>
										</body>
										</html>";
										sendemail($address,$title,$content);
								}						
							}
							sleep(24*60*60);
						}while(true);
					}

				}
		}

	}





}








?>