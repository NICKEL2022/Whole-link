<?php 
if(file_exists('inc/install.lock')){
	header("Location:index.php");
}
header('Content-type:text/html;charset=utf-8');
if(version_compare(PHP_VERSION,'5.4.0')<0){
	exit('Your PHP version is'.PHP_VERSION.'! Our program requirement is that the PHP version is not lower than 5.4.0!');
}
if(isset($_POST['submit'])){
	include 'inc/check_install.inc.php';
	$query=array();
	$query['admin']="
		CREATE TABLE IF NOT EXISTS `admin` (
		`name` varchar(32) NOT NULL,
		`pw` varchar(32) DEFAULT NULL,
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`level` tinyint(4) NOT NULL DEFAULT '1',
		`create_time` datetime DEFAULT NULL,
		PRIMARY KEY (`id`) 
	  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
	";
	$query['devices']="
	CREATE TABLE IF NOT EXISTS `devices` (
		`Device_id` int(11) NOT NULL AUTO_INCREMENT,
		`Device_Name` varchar(45) DEFAULT NULL,
		`Device_Type` varchar(45) NOT NULL,
		`Device_Status` tinyint(4) DEFAULT NULL,
		`Device_Status_percentage` int(11) DEFAULT NULL,
		`Brightness` int(11) DEFAULT NULL,
		`Modes` int(11) DEFAULT NULL,
		`Volume` int(11) DEFAULT NULL,
		`Temperature` int(11) NOT NULL,
		`User_id` int(11) DEFAULT NULL,
		PRIMARY KEY (`Device_id`,`Device_Type`),
		KEY `User_id` (`User_id`)
	  ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;	
	";
	$query['info']="
	CREATE TABLE IF NOT EXISTS `info` (
	  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	  `title` varchar(255) NOT NULL,
	  `keywords` varchar(255) NOT NULL,
	  `description` varchar(255) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;	
	";
	$query['log']="
	CREATE TABLE IF NOT EXISTS `log` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`Times` datetime NOT NULL,
		`User` varchar(20) NOT NULL,
		`detail` varchar(100) NOT NULL,
		PRIMARY KEY (`id`)
	  ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;	
	";
	$query['message']="
	CREATE TABLE IF NOT EXISTS `message` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`Username` varchar(20) NOT NULL,
		`Email` varchar(32) NOT NULL,
		`Message` varchar(50000) NOT NULL,
		PRIMARY KEY (`id`)
	  ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
	";
	$query['situation']="
	CREATE TABLE IF NOT EXISTS `situation` (
		`Situation_id` int(11) NOT NULL AUTO_INCREMENT,
		`Situation` varchar(45) DEFAULT NULL,
		`Device_Name` varchar(45) DEFAULT NULL,
		`Device_Status` int(11) DEFAULT '0',
		`Device_Status_percentage` int(11) DEFAULT '0',
		`Brightness` int(11) DEFAULT '0',
		`Modes` int(45) DEFAULT '0',
		`Volume` int(11) DEFAULT '0',
		`Temperature` int(11) DEFAULT NULL,
		`User_id` int(11) DEFAULT NULL,
		PRIMARY KEY (`Situation_id`)
	  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
	";
	$query['user']="
	CREATE TABLE IF NOT EXISTS `user` (
		`Username` varchar(20) DEFAULT NULL,
		`User_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
		`Password` varchar(32) DEFAULT NULL,
		`email` varchar(32) DEFAULT NULL,
		`User_Agreement` tinyint(1) DEFAULT NULL,
		`Phone_Number` varchar(32) DEFAULT NULL,
		`Data_Of_Birth` date DEFAULT NULL,
		`Register_Time` datetime DEFAULT NULL,
		`last_time` datetime DEFAULT NULL,
		PRIMARY KEY (`User_id`)
	  ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
	";
	foreach ($query as $key=>$val){
		mysqli_query($link,$val);
		if(mysqli_errno($link)){
			echo "data sheet {$key} Creation failed, please check whether the database account has the permission to create a table!<a href='install.php'>click back</a>";
			exit();
		}
	}
	$query_info_s="select * from info where id=1";
	$result=mysqli_query($link, $query_info_s);
	if(mysqli_num_rows($result)!=1){
		$query_info_i="INSERT INTO `info` (`id`, `title`, `keywords`, `description`) VALUES(1, 'Whole-link', 'smart-house', 'NICKLE');";
		mysqli_query($link,$query_info_i);
		if(mysqli_errno($link)){
			exit("Database info failed to write data, please check the corresponding permissions!<a href='install.php'>click back</a>");
		}
	}
	$query_manage_s="select * from admin where name='admin'";
	$result=mysqli_query($link, $query_manage_s);
	if(mysqli_num_rows($result)!=1){
		$query_manage_i="INSERT INTO `admin` (`name`, `pw`, `create_time`, `level`) VALUES('admin',md5('{$_POST['manage_pw']}'),now(), 0)";
		mysqli_query($link,$query_manage_i);
		if(mysqli_errno($link)){
			exit("Administrator creation failed, please check whether the data table manage has write permission!<a href='install.php'>click back</a>");
		}
	}
	$filename='inc/config.inc.php';
	$str_file=file_get_contents($filename);
	$pattern="/'DB_HOST',.*?\)/";
	if(preg_match($pattern,$str_file)){
		$_POST['db_host']=addslashes($_POST['db_host']);
		$str_file=preg_replace($pattern,"'DB_HOST','{$_POST['db_host']}')", $str_file);
	}
	$pattern="/'DB_USER',.*?\)/";
	if(preg_match($pattern,$str_file)){
		$_POST['db_user']=addslashes($_POST['db_user']);
		$str_file=preg_replace($pattern,"'DB_USER','{$_POST['db_user']}')", $str_file);
	}
	$pattern="/'DB_PASSWORD',.*?\)/";
	if(preg_match($pattern,$str_file)){
		$_POST['db_pw']=addslashes($_POST['db_pw']);
		$str_file=preg_replace($pattern,"'DB_PASSWORD','{$_POST['db_pw']}')", $str_file);
	}
	$pattern="/'DB_DATABASE',.*?\)/";
	if(preg_match($pattern,$str_file)){
		$_POST['db_database']=addslashes($_POST['db_database']);
		$str_file=preg_replace($pattern,"'DB_DATABASE','{$_POST['db_database']}')", $str_file);
	}
	$pattern="/\('DB_PORT',.*?\)/";
	if(preg_match($pattern,$str_file)){
		$_POST['db_port']=addslashes($_POST['db_port']);
		$str_file=preg_replace($pattern,"('DB_PORT',{$_POST['db_port']})", $str_file);
	}
	if(!file_put_contents($filename, $str_file)){
		exit("Failed to write the configuration file, please check the permissions of the config.inc.php file!<a href='install.php'>click back</a>");
	}
	if(!file_put_contents('inc/install.lock',':))')){
		exit('The creation of the file inc/install.lock failed, but your system has already been installed, you can manually create the inc/install.lock file!');
	}
	echo "<div style='font-size:16px;color:green;'>:)) Congratulations, the installation is successful! <a href='index.php'>visit homepage</a> | <a href='admin/login.php'>access background</a></div>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title>Welcome to this boot installer</title>
<meta name="keywords" content="Welcome to this boot installer" />
<meta name="description" content="Welcome to this boot installer" />
<style type="text/css">
body {
	background:#f7f7f7;
	font-size:14px;
}
#main {
	width:560px;
	height:490px;
	background:#fff;
	border:1px solid #ddd;
	position:absolute;
	top:50%;
	left:50%;
	margin-left:-280px;
	margin-top:-280px;
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
	width:400px;
	margin:20px 0 0 10px;
}
#main form label {
	margin:10px 0 0 0;
	display:block;
	text-align:right;
}
#main form label input.text {
	width:200px;
	height:25px;
}

#main form label input.submit {
	width:204px;
	display:block;
	height:35px;
	cursor:pointer;
	float:right;
}
</style>
</head>
<body>
	<div id="main">
		<div class="title">Welcome to this boot installer</div>
		<form method="post">
			<label>Database address:<input class="text" type="text" name="db_host" value="localhost" /></label>
			<label>port:<input class="text" type="text" name="db_port" value="3306" /></label>
			<label>database username:<input class="text" type="text" name="db_user" /></label>
			<label>database password:<input class="text" type="password" name="db_pw" /></label>
			<label>Name database:<input class="text" type="text" name="db_database" /></label>
			<br /><br />
			<label>Background administrator name:<input class="text" type="text" name="manage_name" readonly="readonly" value="admin" /></label>
			<label>password:<input class="text" type="password" name="manage_pw" /></label>
			<label>retype password:<input class="text" type="password" name="manage_pw_confirm" /></label>
			<label><input class="submit" type="submit" name="submit" value="OK to install" /></label>
		</form>
	</div>
</body>
</html>