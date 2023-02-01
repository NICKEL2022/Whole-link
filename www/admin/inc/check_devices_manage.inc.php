<?php 
if($_POST['EV']>100 || $_POST['EV']<0){
	skip('Devices_manage.php','error','Status must be in (0,100)!');
}
if(empty($_POST['DS'])){
	skip('Devices_manage.php','error','Device Status must not be empty!');
}
if(empty($_POST['DU'])){
	skip('Devices_manage.php','error','User id must not be empty!');
}
if(empty($_POST['DN'])){
	skip('Devices_manage.php','error','Device name must not be empty!');
}
$_POST=escape($link,$_POST);
?>