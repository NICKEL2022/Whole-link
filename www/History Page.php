<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historical Record</title>

    <link rel="stylesheet" href="./style/history.css" />
    <!-- navigation css-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="./style/dashboard.css" class="template-customizer-core-css" />
</head>

<body>
<!-- Layout wrapper -->
<div class="container">
    <!-- / Navbar -->
    <aside>
        <div class="top">
          <h2>Whole-Link</h2>
        </div>
        <div class="close" id="close-btn">
          <span class="material-symbols-sharp">close</span>
        </div>
  
        <div class="sidebar">
          <a href="./dashboard.php">
            <span class="material-symbols-sharp">home</span>
            <h3>Dashboard</h3>
          </a>
          <a href="./devices.php">
            <span class="material-symbols-sharp">nest_wifi_mistral</span>
            <h3>Devices</h3>
          </a>
          <a href="#">
            <span class="material-symbols-sharp">grid_view</span>
            <h3>situation</h3>
          </a>
          <a href="./history.php">
            <span class="material-symbols-sharp">summarize</span>
            <h3>Historical Record</h3>
          </a>
          <a href="./support.php">
            <span class="material-symbols-sharp">Settings</span>          
            <h3>Support</h3>
          </a>
        </div>
    </aside>
    <!-- / Navbar -->

    
    <main class="context">
        <p>Logs</p>
        <form method="post">
            Times:&emsp;From <input type="datetime-local" name="fromTime" placeholder="Last Name" class="time" /> &emsp;
            To <input type="datetime-local" name="toTime" placeholder="Last Name" class="time" /> &emsp;
            <input type="submit" value="Search" class="submit" name="submit" />
        </form>
        <br/>
        <table class="log">
            <tr class="log_line">
                <th class="log_line">No.</th>
                <th class="log_line">Times</th>
                <th class="log_line">User</th>
                <th class="log_line">Log Details</th>
            </tr>
            <?php
                if($date_to =='' and $date_from ==''){
                  $sql = "select * from log where User_id='{$member_id}' order BY Times desc";
                }else{
                  $sql = "select * from log where Times<'$date_to' and Times>'$date_from' and User_id='{$member_id}' order BY Times desc";
                }
                $result = execute($link,$sql); 
                while($row = mysqli_fetch_array($result)){
                    echo "<tr class='log_line'>";
                    echo "    <td class='log_line'>" . $row['id'] . "</td>";
                    echo "    <td class='log_line'>" . $row['Times'] . "</td>";
                    echo "    <td class='log_line'>" . $row['User'] . "</td>";
                    echo "    <td class='log_line'>" . $row['detail'] . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </main>

</div>
    
    
</body>