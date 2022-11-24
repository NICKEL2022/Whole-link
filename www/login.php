<?php 
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
if($member_id){
	skip('index.php','error','You are already logged in, please do not log in again!');
}
if(isset($_POST['submit'])){
	include 'inc/check_login.inc.php';
	escape($link,$_POST);
	$query="select * from sfk_member where name='{$_POST['name']}' and pw=md5('{$_POST['pw']}')";
	$result=execute($link, $query);
	if(mysqli_num_rows($result)==1){
		setcookie('sfk[name]',$_POST['name'],time()+$_POST['time']);
		setcookie('sfk[pw]',sha1(md5($_POST['pw'])),time()+$_POST['time']);
		/*Set the last_time field of this logged-in member to now()*/
		skip('index.php','ok','login successful!');
	}else{
		skip('login.php', 'error', 'Username or password is wrong!');
	}
}
$template['title']='Login please';
$template['css']=array('style/public.css','style/register.css');
?>
<?php
    include ("Login Page.html");
?>
