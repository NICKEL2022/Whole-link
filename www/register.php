<?php 
define('IN_SFKBBS',true);
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
if($member_id){
	skip('dashboard.php','error','You are already logged in, please do not register again!');
}
if(isset($_POST['submit'])){
	include 'inc/check_register.inc.php';
	$query="insert into user(Username,Password,email,Register_Time,Data_Of_Birth,User_Agreement,Phone_Number,last_time) values('{$_POST['name']}',md5('{$_POST['pw']}'),'{$_POST['email']}',now(),'{$_POST['Date_Of_Birth']}','{$_POST['User_Agreement']}','{$_POST['Phone_number']}',now())";
	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		setcookie('name',$_POST['name']);
		setcookie('pw',sha1(md5($_POST['pw'])));
		$newuser = mysqli_insert_id($link);
		$query2="insert into devices(Device_Name,Device_Type,Device_Status,Device_Status_percentage,Brightness,Modes,Volume,Temperature,User_id) values('Air Conditioner','Air Conditioner', 0, 0, 0, 0, 0, 26,'$newuser'),('Light','Light', 0, 0, 0, 0, 0, 0,'$newuser'),('Speakers','Speakers', 0, 0, 0, 0, 0, 0,'$newuser'),('Android TV','TV', 0, 0, 0, 0, 0, 0,'$newuser'),('Curtain','Curtain', 0, 0, 0, 0, 0, 0,'$newuser'),('Floor Sweeper','Floor Sweeper', 0, 0, 0, 0, 0, 0,'$newuser'),('Coffee Machine','Coffee Machine', 0, 0, 0, 0, 0, 0,'$newuser'),('Bathtub','Bathtub', 0, 0, 0, 0, 0, 26,'$newuser'),('Sockets','Sockets', 0, 0, 0, 0, 0, 0,'$newuser'),('Fan','Fan', 0, 0, 0, 0, 0, 0,'$newuser'),('Temperature Sensor','Sensor', 0, 0, 0, 0, 0, 0,'$newuser'),('Humidity Sensor','Sensor', 0, 0, 0, 0, 0, 0,'$newuser');";
		execute($link,$query2);
		skip('dashboard.php','ok','registration success!');
	}else{
		skip('register.php','eror','Registration failed, please try again!');
	}
}
$template['title']='registration page';
$template['css']=array('style/public.css','style/register.css');
?>
<?php
    include ("Registration.html");
?>