<?php 
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';//验证管理员是否登录
$template['title']='Admin List Page';
$template['css']=array('style/public.css');
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title">Administrator list</div>
	<table class="list">
		<tr>
			<th>Name</th>	 	 	
			<th>Level</th>
			<th>Creation date</th>
			<th>Operate</th>
		</tr>
		<?php 
		$query="select * from admin";
		$result=execute($link,$query);
		while ($data=mysqli_fetch_assoc($result)){
			if($data['level']==0){
				$data['level']='Super Administrator';
			}else{
				$data['level']='General Administrator';
			}
			
			$url=urlencode("manage_delete.php?id={$data['id']}");
			$return_url=urlencode($_SERVER['REQUEST_URI']);
			$message="Do you really want to remove the admin： {$data['name']} ？";
			$delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
			
$html=<<<A
			<tr>
				<td>{$data['name']} [id:{$data['id']}]</td>
				<td>{$data['level']}</td>
				<td>{$data['create_time']}</td>
				<td><a href="{$delete_url}">[Delete]</a></td>
			</tr>
A;
			echo $html;
		}
		?>
	</table>
</div>
<?php include 'inc/footer.inc.php'?>