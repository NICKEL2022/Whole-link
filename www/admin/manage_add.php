<?php 
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';//验证管理员是否登录
if(isset($_POST['submit'])){
	include 'inc/check_manage.inc.php';
	$query="insert into admin(name,pw,create_time,level) values('{$_POST['name']}',md5({$_POST['pw']}),now(),{$_POST['level']})";
	execute($link,$query);
	if(mysqli_affected_rows($link)==1){
		skip('manage.php','ok','Congratulations, successfully added!');
	}else{
		skip('manage.php','error','Sorry, failed to add, please try again!');
	}
}
$template['title']='Admin add page';
$template['css']=array('style/public.css');
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title" style="margin-bottom:20px;">Add administrator</div>
	<form method="post">
		<table class="au">
			<tr>
				<td>Administrator name</td>
				<td><input name="name" type="text" /></td>
				<td>
				The name cannot be empty and cannot exceed 32 characters
				</td>
			</tr>
			<tr>
				<td>password</td>
				<td><input name="pw" type="text" /></td>
				<td>
				Cannot be less than 6 digits
				</td>
			</tr>
			<tr>
				<td>Level</td>
				<td>
					<select name="level">
						<option value="1">General administrator</option>
						<option value="0">Super administrator</option>
					</select>
				</td>
				<td>
				The default is an ordinary administrator (does not have, background administrator management rights)
				</td>
			</tr>
		</table>
		<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="add" />
	</form>
</div>
<?php include 'inc/footer.inc.php'?>