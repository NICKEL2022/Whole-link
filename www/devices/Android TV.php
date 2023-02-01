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
    $update2 = "update devices set Device_Status='{$_POST['Device_Status_TV']}', Volume='{$_POST['Volume_TV']}', Brightness='{$_POST['Brightness_TV']}' where Device_Name = 'Android TV' and User_id = '$member_id'";
    execute($link,$update2);
    if($_POST['Device_Status_TV']=='1'){
        $detail= "Android TV turn on , its volume is ".$_POST['Volume_TV']." and brightness is ".$_POST['Brightness_TV'].".";
    }else{
        $detail= "Android TV turn off , its volume is ".$_POST['Volume_TV']." and brightness is ".$_POST['Brightness_TV'].".";
    }
    $insert="insert into log(User,detail,Times) values('$user','$detail',now())";
    execute($link,$insert);
    header("Location: ../dashboard.php");
}
?>
