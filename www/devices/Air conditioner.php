<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
$quire="select Username from user where User_id = '$member_id'";
$result=execute($link,$quire);
$user=implode(mysqli_fetch_assoc($result));

if(isset($_POST['Submit-Air'])){
    $update4 = "update devices set Device_Status='{$_POST['Device_Status_Air']}', Modes='{$_POST['Modes_Air']}', Temperature='{$_POST['Temperature_Air']}' where Device_Name = 'Air Conditioner' and User_id = '$member_id'";
    execute($link,$update4);
    if($_POST['Device_Status']=='1'){
        if($_POST['Modes_Air']=='1'){
            $detail= "Air Conditioner turn on , it's modes is cool and temperature is ".$_POST['Temperature_Air'].".";
        }elseif($_POST['Modes_Air']=='2'){
            $detail= "Air Conditioner turn on , it's modes is Warm and temperature is ".$_POST['Temperature_Air'].".";
        }else{
            $detail= "Air Conditioner turn on , it's modes is Dehumidification and temperature is ".$_POST['Temperature_Air'].".";
        }
    }else{
        if($_POST['Modes_Air']=='1'){
            $detail= "Air Conditioner turn off , it's modes is cool and temperature is ".$_POST['Temperature_Air'].".";
        }elseif($_POST['Modes_Air']=='2'){
            $detail= "Air Conditioner turn off , it's modes is Warm and temperature is ".$_POST['Temperature_Air'].".";
        }else{
            $detail= "Air Conditioner turn off , it's modes is Dehumidification and temperature is ".$_POST['Temperature_Air'].".";
        }
    }
    $insert="insert into log(User_id,User,detail,Times) values('$member_id','$user','$detail',now())";
    execute($link,$insert);
    header("Location: ../index.php");
}
?>
