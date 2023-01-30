<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);

$quire="select Username from user where User_id = '$member_id'";
$result=execute($link,$quire);
if($member_id){
    $user=implode(mysqli_fetch_assoc($result));
}else{
    $user="";
}


$template['title']='Dashboard';
$template['css']=array('style/dashboard.css','style/public.css','style/index.css');
?>
<?php include 'inc/header.inc.php'?>

<?php include 'dashboard page.php'?>

<?php include 'inc/footer.inc.php'?>

