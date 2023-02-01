<?php 
if(empty($_POST['db_host'])){
	exit('Database address must not be empty!<a href="install.php">Click back</a>');
}
if(empty($_POST['db_port'])){
	exit('The database service port must not be empty!<a href="install.php">Click back</a>');
}
if(empty($_POST['db_user'])){
	exit('The database user name must not be empty!<a href="install.php">Click back</a>');
}
if(!isset($_POST['db_pw'])){
	exit('Database password does not exist!<a href="install.php">Click back</a>');
}
if(empty($_POST['db_database'])){
	exit('Database name must not be empty!<a href="install.php">Click back</a>');
}
$_POST['manage_name']='admin';
if(empty($_POST['manage_pw']) || mb_strlen($_POST['manage_pw'])<6){
	exit('Background administrator password must not be less than 6 characters!<a href="install.php">Click back</a>');
}
if(empty($_POST['manage_pw_confirm']) || $_POST['manage_pw']!=$_POST['manage_pw_confirm']){
	exit('The two passwords entered are inconsistent!<a href="install.php">Click back</a>');
}
$link=@mysqli_connect($_POST['db_host'],$_POST['db_user'],$_POST['db_pw'],'',$_POST['port']);
if(mysqli_connect_errno()){
	exit('The database connection failed, please fill in the correct database connection information!<a href="install.php">Click back</a>');
}
mysqli_set_charset($link,'utf8');
if(!mysqli_select_db($link,$_POST['db_database'])){
	$query="CREATE DATABASE IF NOT EXISTS `{$_POST['db_database']}` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
	mysqli_query($link,$query);
	if(mysqli_errno($link)){
		exit('Database creation failed, please check database account permissions!<a href="install.php">Click back</a>');
	}
	mysqli_select_db($link,$_POST['db_database']);
}
?>