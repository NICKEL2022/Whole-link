<?php 
define('IN_SFKBBS',true);
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
if($member_id){
	skip('index.php','error','You are already logged in, please do not register again!');
}
if(isset($_POST['submit'])){
	include 'inc/check_register.inc.php';
	$query="insert into user(Username,Password,Register_Time) values('{$_POST['name']}',md5('{$_POST['pw']}'),now());";
	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		setcookie('sfk[name]',$_POST['name']);
		setcookie('sfk[pw]',sha1(md5($_POST['pw'])));
		skip('index.php','ok','registration success!');
	}else{
		skip('register.php','eror','Registration failed, please try again!');
	}
}
$template['title']='registration page';
$template['css']=array('style/public.css','style/register.css');
?>
<?php include 'inc/header.inc.php'?>
	<div id="register" class="auto">
		<h2>Welcome to register as a member</h2>
		<form method="post">
			<label>Username：<input type="text" name="name"  /><span>*Username cannot be empty and not exceed 32 </span></label>
			<label>Password：<input type="password" name="pw"  /><span>*The password must not be less than 6 characters</span></label>
			<label>Comfirm PW：<input type="password" name="confirm_pw"  /><span>*Please enter the same as above</span></label>
			<div style="clear:both;"></div>
			<input class="btn" name="submit" type="submit" value="confirm registration" />
		</form>
	</div>
	<div id="footer" class="auto">
		<div class="copyright">Powered by NICKLE ©2022</div>
	</div>
</body>
</html>