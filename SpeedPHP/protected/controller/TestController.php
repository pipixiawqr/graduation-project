<?php
class TestController extends BaseController{
	function actiontest(){
		
		$address="zhangyinghao1998@163.com";
		$title="最新安全资讯信息";
		$model=new model("news");
		$res=$model->findAll(null,"pubtime desc","url,title,content,pubtime","0,1");
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




?>