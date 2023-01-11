<?php 
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';

$link=connect();
if(is_manage_login($link)){
	skip('index.php','ok','You are already logged in, please do not log in again!');
}
if(isset($_POST['submit'])){
	include_once 'inc/check_login.inc.php';
	$_POST=escape($link,$_POST);
	$query="select * from admin where name='{$_POST['name']}' and pw=md5('{$_POST['pw']}')";
	$result=execute($link, $query);
	if(mysqli_num_rows($result)==1){
		$data=mysqli_fetch_assoc($result);
		$_SESSION['manage']['name']=$data['name'];
		$_SESSION['manage']['pw']=sha1($data['pw']);
		$_SESSION['manage']['id']=$data['id'];
		$_SESSION['manage']['level']=$data['level'];
		skip('index.php','ok','login successful!');
	}else{
		skip('login.php','error','Username or password is wrong, please try again!');
	}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title>Background login</title>
<meta name="keywords" content="Background login" />
<meta name="description" content="Background login" />
<style type="text/css">
body {
	background:#f7f7f7;
	font-size:14px;
}
#main {
	width:360px;
	height:320px;
	background:#fff;
	border:1px solid #ddd;
	position:absolute;
	top:50%;
	left:50%;
	margin-left:-180px;
	margin-top:-160px;
}
#main .title {
	height: 48px;
	line-height: 48px;
	color:#333;
	font-size:16px;
	font-weight:bold;
	text-indent:30px;
	border-bottom:1px dashed #eee;
}
#main form {
	width:300px;
	margin:20px 0 0 40px;
}
#main form label {
	margin:10px 0 0 0;
	display:block;
}
#main form label input.text {
	width:200px;
	height:25px;
}
#main form label input.submit {
	width:200px;
	display:block;
	height:35px;
	cursor:pointer;
	margin:0 0 0 56px;
}
</style>
</head>
<body>
	<div id="main">
		<div class="title">Admin login</div>
		<form method="post">
			<label>Username：<input class="text" type="text" name="name" /></label></br>
			<label>Password：<input class="text" type="password" name="pw" /></label></br>
</br>
</br>
			<label><input class="submit" type="submit" name="submit" value="Log in" /></label>
		</form>
	</div>
</body>
</html>