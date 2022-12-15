<?php 
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
if(!$member_id){
	skip('index.php','error','You are not logged in, no need to log out!');
}
setcookie('name','',time()-3600);
setcookie('pw','',time()-3600);
skip('index.php','ok','logout successfully！');
?>