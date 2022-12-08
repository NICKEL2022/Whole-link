<?php 
if(!defined('IN_SFKBBS')){
	exit(':((');
}
if(empty($_POST['name'])){
	skip('register.php', 'error', 'Username cannot be empty!');
}
if(mb_strlen($_POST['name'])>32){
	skip('register.php', 'error', 'Username length should not exceed 32 characters!');
}
if(mb_strlen($_POST['pw'])<6){
	skip('register.php', 'error','The password must not be less than 6 characters!');
}
if($_POST['pw']!=$_POST['confirm_pw']){
	skip('register.php', 'error','The two passwords entered are inconsistent!');
}
$_POST=escape($link,$_POST);
$query="select * from user where Username='{$_POST['name']}'";
$result=execute($link, $query);
if(mysqli_num_rows($result)){
	skip('register.php', 'error', 'This username has already been registered by someone else!');
}
?>