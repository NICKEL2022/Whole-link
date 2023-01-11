<?php 
if(empty($_POST['name'])){
	skip('login.php','error','Administrator name cannot be empty!');
}
if(mb_strlen($_POST['name'])>32){
	skip('login.php','error','Administrator name must not exceed 32 characters!');
}
if(mb_strlen($_POST['pw'])<6){
	skip('login.php','error','The password must not be less than 6 characters!');
}
?>