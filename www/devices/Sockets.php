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
if(isset($_POST['Submit-Sockets'])){
    $update2 = "update devices set Device_Status='{$_POST['Device_Status_Sockets']}' where Device_Name = 'Sockets' and User_id = '$member_id'";
    execute($link,$update2);
    if($_POST['Device_Status_Sockets']=='1'){
        $detail= "Sockets turn on.";
    }else{
        $detail= "Sockets turn off.";
    }
    $insert="insert into log(User_id,User,detail,Times) values('$member_id','$user','$detail',now())";
    execute($link,$insert);
    header("Location: ../index.php");
}
?>
