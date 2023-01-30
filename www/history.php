<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);
$date_from = null;
$date_to = null;

if(isset($_POST['submit'])){
    $date_from = $_POST['fromTime'];
    $date_to = $_POST['toTime'];
    /*$date = now();
    if($date_from == $date and $date_to == $date){
        $date_from = '';
        $date_to = '';
    }*/
}

$template['title']='History';
$template['css']=array('style/history.css','style/public.css','style/index.css');
?>
<?php include 'inc/header.inc.php'?>

<?php include 'History Page.php'?>

<?php include 'inc/footer.inc.php'?>