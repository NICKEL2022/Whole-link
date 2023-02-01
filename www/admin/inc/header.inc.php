<?php 

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title><?php echo $template['title'] ?></title>
<meta name="keywords" content="Background Interface" />
<meta name="description" content="Background Interface" />
<?php 
foreach ($template['css'] as $val){
	echo "<link rel='stylesheet' type='text/css' href='{$val}' />";
}
?>
</head>
<body>
<div id="top">
	<div class="logo">
	Control center
	</div>
	<div class="login_info">
		<a target="_blank" href="../index.php" style="color:#fff;">Index</a>&nbsp;|&nbsp;
		Administrator：<?php echo $_SESSION['manage']['name']?> <a href="logout.php">[log out]</a>
	</div>
</div>
<div id="sidebar">
	<ul>
		<li>
			<div class="small_title">System</div>
			<ul class="child">
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='index.php'){echo 'class="current"';}?> href="index.php">System message</a></li>
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='manage.php'){echo 'class="current"';}?> href="manage.php">Administrator</a></li>
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='manage_add.php'){echo 'class="current"';}?> href="manage_add.php">Add administrator</a></li>
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='web_set.php'){echo 'class="current"';}?> href="web_set.php">Site settings</a></li>
			</ul>
		</li>
		<li><!--  class="current" -->
			<div class="small_title">content management</div>
			<ul class="child">
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='message_list.php'){echo 'class="current"';}?> href="message_list.php">message list</a></li>
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='Devices.php'){echo 'class="current"';}?> href="Devices.php">Devices</a></li>
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='Devices_manage.php'){echo 'class="current"';}?> href="Devices_manage.php">Devices manage</a></li>
			</ul>
		</li>
	</ul>
</div>