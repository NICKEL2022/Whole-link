<?php 
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';

$link=connect();
include_once 'inc/is_manage_login.inc.php';//验证管理员是否登录
$query="select * from info where id=1";
$result_info=execute($link, $query);
$data_info=mysqli_fetch_assoc($result_info);
if(isset($_POST['submit'])){
	$_POST=escape($link,$_POST);
	$query="update info set title='{$_POST['title']}',keywords='{$_POST['keywords']}',description='{$_POST['description']}' where id=1";
	execute($link, $query);
	if(mysqli_affected_rows($link)==1){
		skip('web_set.php','ok','Successfully modified！');
	}else{
		skip('web_set.php','error','Modification failed, please try again!');
	}
}
$template['title']='Site settings';
$template['css']=array('style/public.css');
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title" style="margin-bottom:20px;">website settings</div>
	<form method="post">
		<table class="au">
			<tr>
				<td>website title</td>
				<td><input name="title" type="text" value="<?php echo $data_info['title']?>" /></td>
				<td>
				is the title of the front page
				</td>
			</tr>
			<tr>
				<td>keywords</td>
				<td><input name="keywords" type="text" value="<?php echo $data_info['keywords']?>" /></td>
				<td>
				keywords
				</td>
			</tr>
			<tr>
				<td>description</td>
				<td>
					<textarea name="description"><?php echo $data_info['description']?></textarea>
				</td>
				<td>
				description
				</td>
			</tr>
		</table>
		<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="set" />
	</form>
</div>
<?php include 'inc/footer.inc.php'?>