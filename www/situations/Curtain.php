<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
$quire="select Username from user where User_id = '$member_id'";
$result=execute($link,$quire);
$user=implode(mysqli_fetch_assoc($result));

if(isset($_POST['Submit-Curtain'])){
    $update3 = "update devices set Device_Status_percentage='{$_POST['Status_percentage_Curtain']}' where Device_Name = 'Curtain' and User_id = '$member_id'";
    execute($link,$update3);
    if($_POST['Status_percentage_Curtain']=='3'){
        $detail= "Curtain turn on.";
    }elseif($_POST['Status_percentage_Curtain']=='2'){
        $detail= "Curtain open halfway.";
    }elseif($_POST['Status_percentage_Curtain']=='1'){
        $detail= "Curtain open 1/4.";
    }else{
        $detail= "Curtain turn off.";
    }
    $insert="insert into log(User,detail,Times) values('$user','$detail',now())";
    execute($link,$insert);
    header("Location: ../Situation Page.html");
}
?>
