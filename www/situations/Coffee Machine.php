<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
$quire="select Username from user where User_id = '$member_id'";
$result=execute($link,$quire);
$user=implode(mysqli_fetch_assoc($result));

if(isset($_POST['Submit-Coffee'])){
    $update4 = "update devices set Device_Status='{$_POST['Device_Status_Coffee']}' where Device_Name = 'Coffee Machine' and User_id = '$member_id'";
    execute($link,$update4);
    if($_POST['Device_Status_Coffee']=='1'){
        $detail= "Coffee Machine turn on.";
    }else{
        $detail= "Coffee Machine turn off.";
    }
    $insert="insert into log(User,detail,Times) values('$user','$detail',now())";
    execute($link,$insert);
    header("Location: ../Situation Page.html");
}
?>
