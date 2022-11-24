<?php 
if(empty($_POST['name'])){
	skip('login.php', 'error', 'Username cannot be empty!');
}
if(mb_strlen($_POST['name'])>32){
	skip('login.php', 'error', 'Username length should not exceed 32 characters!');
}
if(empty($_POST['pw'])){
	skip('login.php', 'error', 'Password must not be empty!');
}
if(empty($_POST['time']) || is_numeric($_POST['time']) || $_POST['time']>2592000){
	$_POST['time']=2592000;
}
?>