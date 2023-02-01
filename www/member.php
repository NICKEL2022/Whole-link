<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$member_id=is_login($link);

$quire="select Username from user where User_id = '$member_id'";
$result=execute($link,$quire);

$quire1="select email from user where User_id = '$member_id'";
$result1=execute($link,$quire1);

$quire2="select Password from user where User_id = '$member_id'";
$result2=execute($link,$quire2);

if($member_id){
    $user=implode(mysqli_fetch_assoc($result));
	$useremail=implode(mysqli_fetch_assoc($result1));
	$userpwd=implode(mysqli_fetch_assoc($result2));
}else{
    $user="";
	$useremail="";
	$userpwd="";
}


$template['title']='User Info';
$template['css']=array('style/dashboard.css','style/public.css','style/index.css');
?>
<?php include 'inc/header.inc.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserInfo</title>
<!-- MATERIAL CDN -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="./style/situation.css" class="template-customizer-core-css" />
    <script src="dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    
  

</head>

<body>
 
  <div class="container">
    <aside>
      <div class="top">
        <h2>Whole-Link</h2>
      </div>
      <div class="close" id="close-btn">
        <span class="material-symbols-sharp">close</span>
      </div>

      <div class="sidebar">
        <a href="dashboard.php">
          <span class="material-symbols-sharp">home</span>
          <h3>Dashboard</h3>
        </a>
        <a href="devices.html">
          <span class="material-symbols-sharp">nest_wifi_mistral</span>
          <h3>Devices</h3>
        </a>
        <a href="Situation Page.html">
          <span class="material-symbols-sharp">grid_view</span>
          <h3>situation</h3>
        </a>
        <a href="History Page.php">
          <span class="material-symbols-sharp">summarize</span>
          <h3>Historical Record</h3>
        </a>
        <a href="support.php">
          <span class="material-symbols-sharp">Settings</span>          
          <h3>Support</h3>
        </a>
      
      </div>
    </aside>
  
  
      <main>
	  <h1>Member Centre</h1>
     
      <div class="date">
        <p>Date/Time  : <span id="datetime"></span></p>
      </div>
        <div class="devices">
        <div class="col-md-9">
        <div class="panel panel-warning">
            <div class="panel-body">
                <form method="post" action="./inc/member_inc.php" >
                    <fieldset>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;Username</label>
                                <input id="input_name" class="form-control" placeholder="Username" name="name" type="text" autofocus value="<?php echo $user ?>">
                            </div>
                            <div class="col-md-12" id="error_name"></div>
                            <div class="form-group">
                                <label for="input_email"><span class="glyphicon glyphicon-envelope"></span>&nbsp;email</label>
                                <input id="input_email" class="form-control" placeholder="email" name="email" type="email" autofocus value="<?php echo $useremail ?>">
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-password"></span>&nbsp;Password</label>
                                <input id="input_password" class="form-control" placeholder="password" name="pw" type="text">
                            </div></br>
							<input name="Submit-User" type="submit" value="OK">
                        </fieldset>
                </form>
            </div>
        </div>
        </div>
       
    

  
    
    
   <script>
    //Sound
      
  
          var dt = new Date();
  document.getElementById("datetime").innerHTML = dt.toLocaleString();
 
 
        </script>
  </body>
   
    
  </body>
  </html>


  <?php include 'inc/footeruser.inc.php'?>

  <?php include 'inc/footeruser1.inc.php'?>

  <?php include 'inc/footeruser2.inc.php'?>

  <?php include 'inc/footeruser3.inc.php'?>

  
  
  
	