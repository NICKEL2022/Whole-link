<?php 
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';//验证管理员是否登录

$template['title']='Message list page';
$template['css']=array('style/public.css');
?>
<?php include 'inc/header.inc.php'?>
<?php
$query = "select distinct Username from message";
$res = mysqli_query($link,$query);
$res1 = mysqli_query($link,$query);
?>
<div id='main'>
<form method='post'>
<label>Choose Username:</label></br>
<select name='DS'>
<option value=''>--Please choose an option--</option>
<?php
while ($row = mysqli_fetch_array($res)) {
    echo "<option value='" . $row['Username'] ."'>" . $row['Username'] ."</option>";
}
?>
</select></br></br>

<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="search" /></br></br>
</form>
<?php
if(isset($_POST['submit'])){
    $query1 = "select Username,Email,Message from message where Username='{$_POST['DS']}'";
    $res2 = mysqli_query($link,$query1);
    echo "<table border='1'>
	<tr>
	<th>Username</th>
	<th>Email</th>
	<th>Message</th>
	</tr>";

    while($row2 = mysqli_fetch_array($res2))
	{
		echo "<tr>";
		echo "<td>" . $row2['Username'] . "</td>";
		echo "<td>" . $row2['Email'] . "</td>";
		echo "<td>" . $row2['Message'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
</div>
<?php include 'inc/footer.inc.php'?>