<?php 
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';

$link=connect();
include_once 'inc/is_manage_login.inc.php';//验证管理员是否登录

$template['title']='Devices manage page';
$template['css']=array('style/public.css');
if(isset($_POST['submit'])){
    include 'inc/check_devices_manage.inc.php';
    $query2 = "update devices set {$_POST['DS']}='{$_POST['EV']}' where User_id='{$_POST['DU']}' and Device_Name='{$_POST['DN']}'";
    execute($link, $query2);
	if(mysqli_affected_rows($link)==1){
		skip('Devices_manage.php','ok','Successfully modified！');
	}else{
		skip('Devices_manage.php','error','Modification failed, please try again!');
	}
}
?>
<?php include 'inc/header.inc.php'?>
<?php
$query = "select distinct User_id from devices";
$res = mysqli_query($link,$query);
$query1 = "select  distinct Device_Name from devices";
$res1 = mysqli_query($link,$query1);
?>
<div id='main'>
<form method='post'>
<label>Choose UserID:</label></br>
<select name='DU'>
<option value=''>--Please choose an option--</option>
<?php
while ($row = mysqli_fetch_array($res)) {
    echo "<option value='" . $row['User_id'] ."'>" . $row['User_id'] ."</option>";
}
?>
</select></br></br>

<label>Choose Device_name:</label></br>
<select name='DN'>
<option value=''>--Please choose an option--</option>
<?php
while ($row1 = mysqli_fetch_array($res1)) {
    echo "<option value='" . $row1['Device_Name'] ."'>" . $row1['Device_Name'] ."</option>";
}
?>
</select></br></br>

<label>Choose Device_Status:</label></br>
<select name='DS'>
<option value=''>--Please choose an option--</option>
<option value='Device_Status'>Device_Status</option>
<option value='Device_Status_percentage'>Device_Status_percentage</option>
<option value='Brightness'>Brightness</option>
<option value='Modes'>Modes</option>
<option value='Volume'>Volume</option>
<option value='Temperature'>Temperature</option>
</select></br></br>

<label>Please please enter a value:</label></br>
<input name="EV" type="text"/></br></br>


<input style="margin-top:20px;cursor:pointer;" class="btn" type="submit" name="submit" value="set" />
</form>
</div>
<?php include 'inc/footer.inc.php'?>