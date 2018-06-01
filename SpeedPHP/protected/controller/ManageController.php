<?php
class ManageController extends BaseController{

	function actionHole(){
		error_reporting(0);
		if (!$_SESSION['admin']) {
			$this->tips("请登陆！！！",url("admin","login"));	
		}
		$page = (int)arg("p", 1);
		$hole=new model('hole');
		$this->res_hole=$hole->findAll(null,"pubtime","id,url,title,content,pubtime",array($page,6));
		$this->pager = $hole->page;
		$this->display('delete_hole.html');
	}
	function actionjob(){
		error_reporting(0);
		if (!$_SESSION['admin']) {
			$this->tips("请登陆！！！",url("admin","login"));	
		}
		$page = (int)arg("p", 1);
		$job=new model('job');
		$this->res_job=$job->findAll(null,"pubtime","id,url,title,content,pubtime",array($page,6));
		$this->pager = $job->page;
		$this->display('delete_job.html');
	}
	function actionnews(){
		error_reporting(0);
		if (!$_SESSION['admin']) {
			$this->tips("请登陆！！！",url("admin","login"));	
		}
		$page = (int)arg("p", 1);
		$news=new model('news');
		$this->res_news=$news->findAll(null,"pubtime","id,url,title,content,pubtime",array($page,6));
		$this->pager = $news->page;
		$this->display('delete_news.html');
	}
	function actiontech(){
		error_reporting(0);
		if (!$_SESSION['admin']) {
			$this->tips("请登陆！！！",url("admin","login"));	
		}
		$page = (int)arg("p", 1);
		$tech=new model('tech');
		$this->res_tech=$tech->findAll(null,"pubtime","id,url,title,content,pubtime",array($page,6));
		$this->pager = $tech->page;
		$this->display('delete_tech.html');
	}

	function actionHole_del(){
		error_reporting(0);
		if (!$_SESSION['admin']) {
			$this->tips("请登陆！！！",url("admin","login"));	
		}
		$content =arg("content");
		foreach ($content as $id) {
			$hole=new model('hole');
			if ($hole->delete(array('id'=>$id))) {
				$this->tips("成功删除",url("manage","hole"));
			}
		}
	}
	function actionNews_del(){
		error_reporting(0);
		if (!$_SESSION['admin']) {
			$this->tips("请登陆！！！",url("admin","login"));	
		}
		$content =arg("content");
		foreach ($content as $id) {
			$news=new model('news');
			if ($news->delete(array('id'=>$id))) {
				$this->tips("成功删除",url("manage","news"));
			}
		}
	}
	function actionJob_del(){
		error_reporting(0);
		if (!$_SESSION['admin']) {
			$this->tips("请登陆！！！",url("admin","login"));	
		}
		$content =arg("content");
		foreach ($content as $id) {
			$job=new model('job');
			if ($job->delete(array('id'=>$id))) {
				$this->tips("成功删除",url("manage","job"));
			}
		}
	}
	function actionTech_del(){
		error_reporting(0);
		if (!$_SESSION['admin']) {
			$this->tips("请登陆！！！",url("admin","login"));	
		}
		$content =arg("content");
		foreach ($content as $id) {
			$tech=new model('tech');
			if ($tech->delete(array('id'=>$id))) {
				$this->tips("成功删除",url("manage","tech"));
			}
		}
	}


}







?>