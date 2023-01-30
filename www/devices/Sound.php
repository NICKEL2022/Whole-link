<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
$quire="select Username from user where User_id = '$member_id'";
$result=execute($link,$quire);
$user=implode(mysqli_fetch_assoc($result));

if(isset($_POST['Submit-Sound'])){
    $update = "update devices set Device_Status='{$_POST['Device_Status_Sound']}', Volume='{$_POST['Volume_Sound']}' where Device_Name = 'Speakers' and User_id = '$member_id'";
    execute($link,$update);
    if($_POST['Device_Status_Sound']=='1'){
        $detail= "Speaker turn on and volume is ".$_POST['Volume_Sound'].".";
    }else{
        $detail= "Speaker turn off and volume is ".$_POST['Volume_Sound'].".";
    }
    $insert="insert into log(User,detail,Times) values('$user','$detail',now())";
    execute($link,$insert);
    header("Location: ../index.php");
}
?>
