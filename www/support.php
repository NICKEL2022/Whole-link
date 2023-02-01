<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $query="insert into message(Username,Email,Message) value('$name','$email','$message')";
    execute($link,$query);
    if(mysqli_affected_rows($link)==1){
		setcookie('sfk[name]',$_POST['name']);
		setcookie('sfk[email]',$_POST['email']);
		skip('support.php','ok','Your message is sent successfully!');
	}else{
		skip('support.php','error','Message sent Failed.');
	}
}


$template['title']='Support';
$template['css']=array('support.css','style/index.css');
?>

<?php include 'support.html'?>