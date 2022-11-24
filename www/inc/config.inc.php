<?php 
date_default_timezone_set('Asia/Shanghai');//set time zone
session_start();
header('Content-type:text/html;charset=utf-8');
if(version_compare(PHP_VERSION,'5.4.0')<0){
	exit('Your PHP version is '.PHP_VERSION.', our program requires that the PHP version is not lower than 5.4.0!');
}
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','forum');
define('DB_PORT',3306);
//Our project (program), the absolute path on the server
define('SA_PATH',dirname(dirname(__FILE__)));
//The location of our project under the web root directory (which directory)
define('SUB_URL',str_replace($_SERVER['DOCUMENT_ROOT'],'',str_replace('\\','/',SA_PATH)).'/');
if(!file_exists(SA_PATH.'/inc/install.lock')){
	header('Location:'.SUB_URL.'install.php');
}
?>