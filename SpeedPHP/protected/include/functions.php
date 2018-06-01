<?php
//模拟HTTPS请求
function httpsGet($url,$header){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 0.5);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	$data = curl_exec($curl);
	return $data;
	curl_close($curl);
}
//处理网络超时问题
function _httpsGet($url,$header){
	try{
		return httpsGet($url,$header);
	}
	catch(exception $e){
		return _httpsGet($url,$header);
	}
}
//发送邮件函数
function sendemail($address,$title,$content){
	require_once "D:\phpstudy\PHPTutorial\WWW\SpeedPHP\protected\include\phpmailer.php";
	require_once "D:\phpstudy\PHPTutorial\WWW\SpeedPHP\protected\include\smtp.php";	
	$mail = new PHPMailer(true); //建立邮件发送类
	$mail->CharSet = "UTF-8";//设置信息的编码类型
	//$address = "965948592@qq.com";//收件人地址
	$mail->IsSMTP(); // 使用SMTP方式发送
	$mail->Host = "smtp.163.com"; //使用163邮箱服务器
	$mail->SMTPAuth = true; // 启用SMTP验证功能
	$mail->Username = "15832613893@163.com"; //你的163服务器邮箱账号
	$mail->Password = "wqr10086"; // 163邮箱密码
	$mail->Port = 25;//邮箱服务器端口号
	$mail->From = "15832613893@163.com"; //邮件发送者email地址
	$mail->FromName = "情报收集员";//发件人名称
	$mail->AddAddress($address, "亲爱的用户"); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
	  //$mail->AddAttachment("D:\abc.txt"); // 添加附件(注意：路径不能有中文)
	$mail->IsHTML(true);//是否使用HTML格式
	$mail->Subject = $title; //邮件标题
	$mail->Body = $content; //邮件内容，上面设置HTML，则可以是HTML
	if (!$mail->Send()) {
		echo "邮件发送失败. <p>";
	   	echo "错误原因: " . $mail->ErrorInfo;
	   	exit;
	}
	else{
	  	echo "发送成功";
	}
}
