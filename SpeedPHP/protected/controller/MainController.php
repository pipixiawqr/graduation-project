<?php
class MainController extends BaseController {

	function actionIndex(){
		$job=new model('job');
		$this->res_job=$job->findAll(null,"pubtime desc","url,title,content,pubtime","0,4");

		$hole=new model('hole');
		$this->res_hole=$hole->findAll(null,"pubtime desc","url,title,content,pubtime","0,4");

		$tech=new model('tech');
		$this->res_tech=$tech->findAll(null,"pubtime desc","url,title,content,pubtime","0,4");

		$news=new model('news');
		$this->res_news=$news->findAll(null,"pubtime desc","url,title,content,pubtime","0,4");

		$this->display("index.html");
	}

	function actionSearch(){
		$keyword=arg("keyword");
		$job=new model('job');
		$rec_job=$job->findAll(array("content like :word",":word" =>'%'.$keyword.'%'),null,"url,title,content,pubtime");
		if ($rec_job) {
			$this->rec_job=$rec_job;
		}

		$hole=new model('hole');
		$rec_hole=$hole->findAll(array("content like :word",":word" =>'%'.$keyword.'%'),null,"url,title,content,pubtime");
		if ($rec_hole) {
			$this->rec_hole=$rec_hole;
		}

		$tech=new model('tech');
		$rec_tech=$tech->findAll(array("content like :word",":word" =>'%'.$keyword.'%'),null,"url,title,content,pubtime");
		if ($rec_tech) {
			$this->rec_tech=$rec_tech;
		}

		$news=new model('news');
		$rec_news=$news->findAll(array("content like :word",":word" =>'%'.$keyword.'%'),null,"url,title,content,pubtime");
		if ($rec_news) {
			$this->rec_news=$rec_news;
		}	

		$this->display("search.html");
	}

	function actionSub(){
		$email=arg("email");
		$content=implode(',',arg("content"));
		$times=arg("times");
		$newrow = array( 
				    'email' => $email,
				    'content' => $content,
				    'times' => $times
					);	
		$users=new model("users");
		if ($users->create($newrow)) {
			echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><script>function sptips(){alert(\"订阅成功\");}</script></head><body onload=\"sptips()\"></body></html>";
		}	



	}
	function actionHole(){
		//分页操作
		$page = (int)arg("p", 1);
		$hole=new model('hole');
		$this->res_hole=$hole->findAll(null,"pubtime desc","url,title,content,pubtime",array($page,6));
		$this->pager = $hole->page;
		//图表数据分析
		//CSRF
		$count=$hole->findCount(null);
		$csrf_count=$hole->findCount(array("content like :word", 
          ":word" => '%CSRF%'));
		$this->csrf=(int)($csrf_count/$count*1000);
		//XSS
		$XSS_count=$hole->findCount(array("content like :word", 
          ":word" => '%XSS%'));
		$this->XSS=(int)($XSS_count/$count*1000);
		//SQL注入
		$SQL_count=$hole->findCount(array("content like :word", 
          ":word" => '%SQL注入%'));
		$this->SQL=(int)($SQL_count/$count*1000);
		//枚举
		$mj_count=$hole->findCount(array("content like :word", 
          ":word" => '%枚举%'));
		$this->mj=(int)($mj_count/$count*1000);
		//文件
		$file_count1=$hole->findCount(array("content like :word", 
          ":word" => '%文件上传%'));
		$file_count2=$hole->findCount(array("content like :word", 
          ":word" => '%文件读取%'));
		$this->file=(int)(($file_count1+$file_count1)/$count*1000);
		//若口令
		$weekpw_count=$hole->findCount(array("content like :word", 
          ":word" => '%弱口令%'));
		$this->weekpw=(int)($weekpw_count/$count*1000);
		//越权
		$yq_count=$hole->findCount(array("content like :word", 
          ":word" => '%越权%'));
		$this->yq=(int)($yq_count/$count*1000);
		//命令执行
		$mlzx_count=$hole->findCount(array("content like :word", 
          ":word" => '%命令执行%'));
		$this->mlzx=(int)($mlzx_count/$count*1000);
		$this->display('detail_hole.html');
	}
	function actionJob(){
		//分页操作
		$page = (int)arg("p", 1);
		$job=new model('job');
		$this->res_job=$job->findAll(null,"pubtime desc","url,title,content,pubtime",array($page,6));
		$this->pager = $job->page;
		//图表数据分析
		//工作地点北京
		$count=$job->findCount(null);
		$beijing_count=$job->findCount(array("title like :word", 
          ":word" => '%北京%'));
		$this->beijing=(int)($beijing_count/$count*1000);
		//var_dump($this->beijing);
		//工作地点杭州
		$kangzhou_count=$job->findCount(array("title like :word", 
          ":word" => '%杭州%'));
		$this->kangzhou=(int)($kangzhou_count/$count*1000);
		//工作地点西安
		$xian_count=$job->findCount(array("title like :word", 
          ":word" => '%南京%'));
		$this->xian=(int)($xian_count/$count*1000);
		//工作岗位，安全工程师
		$safe_count=$job->findCount(array("title like :word", 
          ":word" => '%安全工程师%'));
		$this->safe=(int)($safe_count/$count*1000);
		//工作岗位，渗透测试工程师
		$stcs_count=$job->findCount(array("title like :word", 
          ":word" => '%渗透测试%'));
		$this->stcs=(int)($stcs_count/$count*1000);
		//工作岗位，实习
		$stu_count=$job->findCount(array("title like :word", 
          ":word" => '%实习%'));
		$this->stu=(int)($stu_count/$count*1000);
		//工作岗位，高级
		$high_count=$job->findCount(array("title like :word", 
          ":word" => '%高级%'));
		$this->high=(int)($high_count/$count*1000);
		//工作岗位，运维
		$yw_count=$job->findCount(array("title like :word", 
          ":word" => '%运维%'));
		$this->yw=(int)($yw_count/$count*1000);
		$this->display('detail_job.html');
	}
	function actionNews(){
		$page = (int)arg("p", 1);
		$news=new model('news');
		$this->res_news=$news->findAll(null,"pubtime desc","url,title,content,pubtime",array($page,6));
		$this->pager = $news->page;
		//黑客攻击
		$count=$news->findCount(null);
		$gongji_count=$news->findCount(array("content like :word", 
          ":word" => '%黑客攻击%'));
		$this->gongji=(int)($gongji_count/$count*100);
		//高危漏洞
		$gwld_count=$news->findCount(array("content like :word", 
          ":word" => '%高危漏洞%'));
		$this->gwld=(int)($gwld_count/$count*1000);
		//"软件勒索"
		$rjls_count=$news->findCount(array("content like :word", 
          ":word" => '%软件%'));
		$this->rjls=(int)($rjls_count/$count*100);
		//"货币加密"
		$hbjm_count=$news->findCount(array("content like :word", 
          ":word" => '%加密%'));
		$this->hbjm=(int)($hbjm_count/$count*100);
		//"谷歌"
		$google_count=$news->findCount(array("content like :word", 
          ":word" => '%谷歌%'));
		$this->google=(int)($google_count/$count*100);
		//"程序员"
		$cxy_count=$news->findCount(array("content like :word", 
          ":word" => '%程序%'));
		$this->cxy=(int)($cxy_count/$count*100);
		//"人工智能"
		$rgzn_count=$news->findCount(array("content like :word", 
          ":word" => '%人工智能%'));
		$this->rgzn=(int)($rgzn_count/$count*1000);
		//"安全热点"
		$aqrd_count=$news->findCount(array("content like :word", 
          ":word" => '%安全%'));
		$this->aqrd=(int)($aqrd_count/$count*100);
		$this->display('detail_news.html');
	}
	function actionTech(){
		$page = (int)arg("p", 1);
		$tech=new model('tech');
		$this->res_tech=$tech->findAll(null,"pubtime desc","url,title,content,pubtime",array($page,6));
		$this->pager = $tech->page;
		//"投稿文章",,,,,,,
		$count=$tech->findCount(null);
		$tgwz_count=$tech->findCount(array("title like :word", 
          ":word" => '%投稿文章%'));
		$this->tgwz=(int)($tgwz_count/$count*1000);
		//"PHP"
		$php_count=$tech->findCount(array("title like :word", 
          ":word" => '%PHP%'));
		$this->php=(int)($php_count/$count*1000);
		//"python"
		$python_count=$tech->findCount(array("title like :word", 
          ":word" => '%python%'));
		$this->python=(int)($python_count/$count*1000);
		//"weblogic"
		$weblogic_count=$tech->findCount(array("title like :word", 
          ":word" => '%weblogic%'));
		$this->weblogic=(int)($weblogic_count/$count*1000);
		//"mysql"
		$mysql_count=$tech->findCount(array("title like :word", 
          ":word" => '%文件读取%'));
		$this->mysql=(int)($mysql_count/$count*1000);
		//"writeup"
		$writeup_count=$tech->findCount(array("title like :word", 
          ":word" => '%writeup%'));
		$this->writeup=(int)($writeup_count/$count*1000);
		//"cms"
		$cms_count=$tech->findCount(array("title like :word", 
          ":word" => '%cms%'));
		$this->cms=(int)($cms_count/$count*1000);
		//"漏洞"
		$ld_count=$tech->findCount(array("title like :word", 
          ":word" => '%漏洞%'));
		$this->ld=(int)($ld_count/$count*100);
		$this->display('detail_tech.html');
	}


	
}