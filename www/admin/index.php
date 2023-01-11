<?php 
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';//验证管理员是否登录


$query="select * from admin where id={$_SESSION['manage']['id']}";
$result_manage=execute($link, $query);
$data_manage=mysqli_fetch_assoc($result_manage);

//$query="select count(*) from sfk_father_module";
//$count_father_module=num($link,$query);

//$query="select count(*) from sfk_son_module";
//$count_son_module=num($link,$query);

//$query="select count(*) from sfk_content";
//$count_content=num($link,$query);

//$query="select count(*) from sfk_reply";
//$count_reply=num($link,$query);

$query="select count(*) from user";
$count_member=num($link,$query);

$query="select count(*) from admin";
$count_manage=num($link,$query);

if($data_manage['level']=='0'){
	$data_manage['level']='Super Administrator';
}else{
	$data_manage['level']='General Administrator';
}
$template['title']='System Message';
$template['css']=array('style/public.css');
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title">System Message</div>
	<div class="explain">
		<ul>
			<li>|- Hello，<?php echo $data_manage['name']?></li>
			<li>|- Role：<?php echo $data_manage['level']?> </li>
			<li>|- Creation time：<?php echo $data_manage['create_time']?></li>
		</ul>
	</div>
	<div class="explain">
		<ul>
			<li>|- 父版块(<?php echo $count_father_module?>)
			                 子版块(<?php echo $count_son_module?>)
			                 帖子(<?php echo $count_content?>)
			                 回复(<?php echo $count_reply?>)
			                 User(<?php echo $count_member?>)
			                 Admin(<?php echo $count_manage?>)
			</li>
		</ul>
	</div>
	<div class="explain">
		<ul>
			<li>|- server operating system：<?php echo PHP_OS?> </li>
			<li>|- server software：<?php echo $_SERVER['SERVER_SOFTWARE']?> </li>
			<li>|- MySQL version：<?php echo  mysqli_get_server_info($link)?></li>
			<li>|- Maximum uploaded files：<?php echo ini_get('upload_max_filesize')?></li>
			<li>|- memory limit：<?php echo ini_get('memory_limit')?></li>
			<li>|- <a target="_blank" href="phpinfo.php">PHP configuration information</a></li>
		</ul>
	</div>
</div>
<?php include 'inc/footer.inc.php'?>