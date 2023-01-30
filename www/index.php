<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);


$template['title']='Dashboard';
$template['css']=array('style/public.css','style/index.css');
?>
<?php include 'login.php'?>