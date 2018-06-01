<?php
class BaseController extends Controller{
	public $layout = "";
	//开启session机制，引入自定义函数，设置网页编码
	function init(){
		session_start();
		require(APP_DIR.'/protected/include/functions.php');
		header("Content-type: text/html; charset=utf-8");
	}
	//提示信息函数
    function tips($msg, $url){
    	$url = "location.href=\"{$url}\";";
		echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><script>function sptips(){alert(\"{$msg}\");{$url}}</script></head><body onload=\"sptips()\"></body></html>";
		exit;
    }
    //url跳转函数
    function jump($url, $delay = 0){
        echo "<html><head><meta http-equiv='refresh' content='{$delay};url={$url}'></head><body></body></html>";
        exit;
    }
} 