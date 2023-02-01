<?php 
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';//验证管理员是否登录

$template['title']='Devices page';
$template['css']=array('style/public.css');
?>
<?php include 'inc/header.inc.php'?>
<?php
$query = "select distinct User_id from devices";
$res = mysqli_query($link,$query);
?>
<div id='main'>
<form method='post'>
<label>Choose UserID:</label></br>
<select name='DS'>
<option value=''>--Please choose an option--</option>
<?php
while ($row = mysqli_fetch_array($res)) {
    echo "<option value='" . $row['User_id'] ."'>" . $row['User_id'] ."</option>";
}
?>
</select></br></br>

<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="search" /></br></br>
</form>
<?php
if(isset($_POST['submit'])){
    $query1 = "select Device_Name,Device_Type,Device_Status,Device_Status_percentage,Brightness,Modes,Volume,Temperature,User_id from devices where User_id='{$_POST['DS']}'";
    $res2 = mysqli_query($link,$query1);
    echo "<table border='1'>
	<tr>
	<th>Device_Name</th>
	<th>Device_Type</th>
	<th>Device_Status</th>
    <th>Device_Status_percentage</th>
    <th>Brightness</th>
    <th>Modes</th>
    <th>Volume</th>
    <th>Temperature</th>
    <th>User_id</th>
	</tr>";

    while($row2 = mysqli_fetch_array($res2))
	{
		echo "<tr>";
		echo "<td>" . $row2['Device_Name'] . "</td>";
		echo "<td>" . $row2['Device_Type'] . "</td>";
		echo "<td>" . $row2['Device_Status'] . "</td>";
        echo "<td>" . $row2['Device_Status_percentage'] . "</td>";
        echo "<td>" . $row2['Brightness'] . "</td>";
        echo "<td>" . $row2['Modes'] . "</td>";
        echo "<td>" . $row2['Volume'] . "</td>";
        echo "<td>" . $row2['Temperature'] . "</td>";
        echo "<td>" . $row2['User_id'] . "</td>";
		echo "</tr>";
	}
	echo "</table></br></br>";
}
?>


</div>
<?php include 'inc/footer.inc.php'?>