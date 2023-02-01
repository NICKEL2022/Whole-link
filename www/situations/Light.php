<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
$quire="select Username from user where User_id = '$member_id'";
$result=execute($link,$quire);
$user=implode(mysqli_fetch_assoc($result));

if(isset($_POST['Submit-Light'])){
    $update4 = "update devices set Device_Status='{$_POST['Device_Status_light']}', Brightness='{$_POST['Brightness_light']}' where Device_Name = 'Light' and User_id = '$member_id'";
    execute($link,$update4);
    if($_POST['Device_Status_light']=='1'){
        $detail= "Light turn on and brightness is ".$_POST['Brightness_light'].".";
    }else{
        $detail= "Light turn off and brightness is ".$_POST['Brightness_light'].".";
    }
    $insert="insert into log(User,detail,Times) values('$user','$detail',now())";
    execute($link,$insert);
    header("Location: ../Situation Page.html");
}
?>
