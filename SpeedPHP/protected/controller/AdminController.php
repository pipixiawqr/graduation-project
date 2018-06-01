<?php
class AdminController extends BaseController{
	function actionLogin(){
		$this->display("login.html");
	}

	function actionSignin(){		
		$captcha =arg("captcha");
		// var_dump($captcha);
		// var_dump($_SESSION['captcha']);
		// var_dump(strtolower($captcha));
		if (strtolower($captcha) != $_SESSION['captcha']){
			$this->tips("验证码错误",url("admin", "login"));
		}
		$username=arg("username");
		$passwd=md5(arg("passwd"));
		$condition = array(
			"username"   =>$username , 
			"passwd"   => $passwd
		);
		$admin = new Model("_admin");
		$result = $admin->findAll($condition);
		if (in_array(' ',$result)){
			$this->tips("用户名或密码错误",url("admin", "login"));
		} else {
			$_SESSION['admin'] = $result;
			$this->tips("登陆成功",url("manage", "hole"));
		}	
		
	}
	function actionLogout(){
		//销毁session
		unset($_SESSION['admin']);
		session_destroy();
		$this->jump();
	}

	function actionCaptcha(){
		$captcha = new Captcha();
		$captcha->generateCode();
		$_SESSION['captcha'] =$captcha->getCode();
	}


}







?>