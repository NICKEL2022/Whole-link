<?php 
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
if($member_id){
	skip('dashboard.php','error','You are already logged in, please do not log in again!');
}
if(isset($_POST['submit'])){
	include 'inc/check_login.inc.php';
	escape($link,$_POST);
	$expires=time()+$_POST['times'];
	$date = date('Y-m-d H:i:s',$expires);
	$query="select * from user where Username='{$_POST['name']}' and Password=md5('{$_POST['pw']}')";
	$query1="update user set last_time ='$date' where Username='{$_POST['name']}'";
	$result=execute($link, $query);
	if(mysqli_num_rows($result)==1){
		setcookie('name',$_POST['name'],time()+$_POST['times']);
		setcookie('pw',sha1(md5($_POST['pw'])),time()+$_POST['times']);
		/*Set the last_time field of this logged-in member to now()+posted time*/
		execute($link,$query1);
		skip('dashboard.php','ok','login secess！');
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
