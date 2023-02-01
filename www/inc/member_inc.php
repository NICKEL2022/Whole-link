<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);

$quire="select Username from user where User_id = '$member_id'";
$result=execute($link,$quire);

$quire1="select email from user where User_id = '$member_id'";
$result1=execute($link,$quire1);

$quire2="select Password from user where User_id = '$member_id'";
$result2=execute($link,$quire2);

  if(isset($_POST['Submit-User'])){
    $update = "update user set Username='{$_POST['name']}',email='{$_POST['email']}',Password=md5('{$_POST['pw']}') where  User_id = '$member_id'";
    execute($link,$update);
    header("Location: ../login.php");
}
?>