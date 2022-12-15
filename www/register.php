<?php 
define('IN_SFKBBS',true);
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
if($member_id){
	skip('index.php','error','You are already logged in, please do not register again!');
}
if(isset($_POST['submit'])){
	include 'inc/check_register.inc.php';
	$query="insert into user(Username,Password,email,Register_Time,Data_Of_Birth,User_Agreement,Phone_Number,last_time) values('{$_POST['name']}',md5('{$_POST['pw']}'),'{$_POST['email']}',now(),'{$_POST['Date_Of_Birth']}','{$_POST['User_Agreement']}','{$_POST['Phone_number']}',now())";
	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		setcookie('sfk[name]',$_POST['name']);
		setcookie('sfk[pw]',sha1(md5($_POST['pw'])));
		skip('index.php','ok','registration success!');
	}else{
		skip('register.php','eror','Registration failed, please try again!');
	}
}
$template['title']='registration page';
$template['css']=array('style/public.css','style/register.css');
?>
<?php include 'inc/header.inc.php'?>
<?php
    include ("Registration.html");
?>
