<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
$quire="select Username from user where User_id = '$member_id'";
$result=execute($link,$quire);
$user=implode(mysqli_fetch_assoc($result));

echo implode($_POST);
if(isset($_POST['Submit-TV'])){
    $update2 = "update devices set Device_Status='{$_POST['Device_Status_Bathtub']}', Volume='{$_POST['Temperature_Bathtub']}' where Device_Name = 'Bathtub' and User_id = '$member_id'";
    execute($link,$update2);
    if($_POST['Device_Status_Bathtub']=='1'){
        $detail= "Bathtub turn on and brightness is ".$_POST['Temperature_Bathtub'].".";
    }else{
        $detail= "Bathtub turn off and brightness is ".$_POST['Temperature_Bathtub'].".";
    }
    $insert="insert into log(User_id,User,detail,Times) values('$member_id','$user','$detail',now())";
    execute($link,$insert);
    header("Location: ../index.php");
}
?>
