<?php 
if(empty($_POST['name'])){
	skip('manage_add.php','error','Administrator name cannot be empty!');
}
if(mb_strlen($_POST['name'])>32){
	skip('manage_add.php','error','Administrator name must not exceed 32 characters!');
}
if(mb_strlen($_POST['pw'])<6){
	skip('manage_add.php','error','The password must not be less than 6 characters!');
}
$_POST=escape($link,$_POST);
$query="select * from admin where name='{$_POST['name']}'";
$result=execute($link,$query);
if(mysqli_num_rows($result)){
	skip('manage_add.php','error','The name already exists!');
}
if(!isset($_POST['level'])){
	$_POST['level']=1;
}elseif ($_POST['level']=='0'){
	$_POST['level']=0;
}elseif ($_POST['level']=='1'){
	$_POST['level']=1;
}else{
	$_POST['level']=1;
}
?>