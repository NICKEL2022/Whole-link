<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
<!-- MATERIAL CDN -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="./style/dashboard.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./style/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./style/demo.css" />
    <link rel="stylesheet" href="./style/button.css" />
  

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
        <a href="./dashboard.php">
          <span class="material-symbols-sharp">home</span>
          <h3>Dashboard</h3>
        </a>
        <a href="./devices.php">
          <span class="material-symbols-sharp">nest_wifi_mistral</span>
          <h3>Devices</h3>
        </a>
        <a href="./situation.php">
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

    <main>
      <h1>Dashboard</h1>
      <!-- 用户名 -->
     
      <div class="date">
        <input type="date">
      </div>

      <div class="devices">
        <!-- sound -->
        <div class="Sound">
          <!-- 弹窗按钮 -->
            <button class="btn-alert1">
              <span class="material-symbols-sharp">speaker</span>
            </button>
          <!-- 弹窗内容 -->
          <div class="alert1">
            <div class="alert1-body">
                <div class="alert1-title">Speaker</div>
                <div class="alert1-content">
                  <form id="Speakers" action="./devices/Sound.php" method="post">
                    
                      <lable>Switch</lable>
                      <select name="Device_Status_Sound" >
                        <option  value="1">on</option>
                        <option  value="0">off</option>
                      </select>                     
                      <br>
                    <lable>Volume</lable>
                        
                        <select name="Volume_Sound" >
                          <option value="10">10</option>
                          <option value="30">30</option>
                          <option value="50">50</option>
                          <option value="70">70</option>
                          <option value="90">90</option>
                          <option value="100">100</option>
                        </select>
                   
                    <br><br>
                    <input type="submit" name="Submit-Sound" value="OK">
                    
                  </form>
                    
                </div>
            </div>
          </div>
          <div class="middle">
            <div class="left">
              <h3>Speaker</h3>
            </div>
          </div>
        </div>


        <!-- TV -->
        <div class="Tv">
          <!-- 弹窗按钮 -->
          <button class="btn-alert2">
            <span class="material-symbols-sharp">Tv</span>
          </button>
        <!-- 弹窗内容 -->
        <div class="alert2">
          <div class="alert2-body">
              <div class="alert2-title">Tv</div>
              <div class="alert2-content">
                <form id="TV" action="./devices/Android TV.php" methond="post">
                  
                    <lable>Switch</lable>
                    <select name="Device_Status_TV">
                      <option value="1">on</option>
                      <option value="0">off</option>
                    </select>                     
                    <br>
                  <lable>Volume</lable>
                      
                      <select name="Volume_TV">
                        <option value="0">0</option>
                        <option value="10">10</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="70">70</option>
                        <option value="90">90</option>
                        <option value="100">100</option>
                      </select>
                  <lable>Brightness</lable>
                      <select name="Brightness_TV">
                        <option value="0">0</option>
                        <option value="10">10</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="70">70</option>
                        <option value="90">90</option>
                        <option value="100">100</option>
                      </select>
                 
                  <br><br>
                  <input type="submit" name="Submit-TV" value="OK">
                </form>
              </div>
          </div>
        </div>
          <div class="middle">
            <div class="left">
              <h3>Android TV</h3>
            </div>         
          </div>
        </div>
      
        <!-- Curtain -->
        <div class="Curtain">
                    <!-- 弹窗按钮 -->
          <button class="btn-alert3">
            <span class="material-symbols-sharp">Curtains</span>
          </button>
          <div class="alert3">
            <div class="alert3-body">
                <div class="alert3-title">Curtain</div>
                <div class="alert3-content">
                  <form id="Curtain" action="./devices/Curtain.php" methond="post">
                    
                      <lable>Switch</lable>
                      <select name="Status_percentage_Curtain">
                        <option value="3">on</option>
                        <option value="2">Open halfway</option>
                        <option value="1">Open 1/4</option>
                        <option value="1">OFF</option>
                      </select>                     
                      <br>
                   
                    <br><br>
                    <input type="submit" name="Submit-Curtain" value="OK">
                  </form>
                </div>
            </div>
          </div>
          <div class="middle">
            <div class="left">
              <h3>Curtain</h3>
            </div>
        
          </div>
        </div>
        <!-- coffe machine -->
        <div class="Cleaner">
          <button class="btn-alert4">
            <span class="material-symbols-sharp">egg</span>
          </button>
          <div class="alert4">
            <div class="alert4-body">
                <div class="alert4-title">Coffee Machine</div>
                <div class="alert4-content">
                  <form id="Coffee Machine" action="./devices/Coffee Machine.php" methond="post">
                      <lable>Switch</lable>
                      <select name="Device_Status_Coffee">
                        <option value="1">ON</option>
                        <option value="0">OFF</option>
                      </select>                     
                      <br>
                   
                    <br><br>
                    <input type="submit" name="Submit-Coffee" value="OK">
                  </form>
                </div>
            </div>
          </div>
          <div class="middle">
            <div class="left">
              <h3>Coffe machine</h3>
            </div>
          </div>

        </div>
      </div>

      <!-- control -->
      <div class="control">
        <div class="Light">
          <div class="control-title">
            <h4>Light control</h4>
          </div>
          <span class="material-symbols-sharp">light_mode</span>
          <div class="alert5">
            <div class="alert5-body">
             
                <div class="alert-content5">
                  <form id="Light" action="./devices/Light.php" methond="post">
                      <lable>Switch</lable>
                      <select name="Device_Status_light">
                        <option value="1">ON</option>
                        <option value="0">OFF</option>
                      </select>                     
                      <br>
                      <lable>Brightness</lable>
                      <select name="Brightness_light">
                        <option value="0">0</option>
                        <option value="10">10</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="70">70</option>
                        <option value="90">90</option>
                        <option value="100">100</option>
                      </select>
                    <br><br>
                    <input type="submit" name="Submit-Light" value="OK">
                  </form>
                </div>
            </div>
          </div>
        </div>
   

        <div class="Air conditioner">
          <div class="control-title">
            <h4>Air conditioner</h4>
          </div>
          <span class="material-symbols-sharp">mode_fan</span>
          <div class="alert6">
            <div class="alert6-body">
             
                <div class="alert-content6">
                  <form id="Air conditioner" action="./devices/Air conditioner.php" methond="post">
                      <lable>Switch</lable>
                      <select name="Device_Status_Air">
                        <option value="1">ON</option>
                        <option value="0">OFF</option>
                      </select>                     
                      <br>
                      <lable>Modes</lable>
                      <select name="Modes_Air">
                        <option value="1">Cool</option>
                        <option value="2">Warm</option>
                        <option value="3">Dehumidification</option>
                        
                      </select>
                      <br>
                      <lable>Temperature</lable>
                      <select name="Temperature_Air">
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                      </select>    
                    <br><br>
                    <input type="submit" name="Submit-Air" value="OK">
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- sensor -->
      <div class="sensor">
        <div class="humidity">
          
          <div class="middle">
            <div class="left">
              <span class="material-symbols-sharp">humidity_mid</span>
              <h3>humidity</h3>
            </div>
            <div class="progress">
              <svg>
                <circle cx='38' cy='38' r='36'></circle>
              </svg>
              <div class="number">
                <p>
                <?php
                  if($member_id == ''){
                    $humi = 0;
                  }else{
                    $sql_hum = "select Temperature from devices where Device_name = 'Humidity Sensor' and User_id='{$member_id}'";
                    $result_hum=execute($link,$sql_hum);
                    $humi=implode(mysqli_fetch_assoc($result_hum));
                  }
                    echo $humi,"%";
                  ?>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="temperature">
        
          <div class="middle">
            <div class="left">
              <span class="material-symbols-sharp">device_thermostat</span>
              <h3>temperature</h3>
            </div>
            <div class="progress">
              <svg>
                <circle cx='38' cy='38' r='36'></circle>
              </svg>
              <div class="number">
                <p>
                  <?php
                    if($member_id == ''){
                      $temp = 0;
                    }else{
                      $sql_tem = "select Temperature from devices where Device_name = 'Temperature Sensor' and User_id='{$member_id}'";
                      $result_tem=execute($link,$sql_tem);
                      $temp=implode(mysqli_fetch_assoc($result_tem));
                    }
                    echo $temp,"°C";
                  ?>
                </p>
              </div>
            </div>
          </div>

         
        </div>
        
        
      </div>
      <!-- 最近活动 -->
      <div class="recent">
        <h2>Recent activities</h2>
        <table>
          <thead>
            <tr>
              <th>product name</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Foldable mini Drone</td>
            </tr>
          </tbody>
        </table>
        <!-- 展示更多细节 -->
        <a href="#">Show All</a>

      </div>    
    </main>

    <!-- right -->
    <div class="right">
      <div class="top">
        <button id="menu-btn">
          <span class="material-symbols-sharp">menu</span>
        </button>
        <div class="theme-toggler">
          <span class="material-symbols-sharp active">light_mode</span>
          <span class="material-symbols-sharp">dark_mode</span>
        </div>
        <div class="profile">
          <div class="info">
            <p>Hey, <b>Daniel</b></p>
          </div>
          <div class="profile-photo">
            <img src="#">
          </div>
        </div>
      </div>
      <!-- updates -->
      <div class="recent-updates">
        <h2>Recent updates</h2>
        <div class="updates">
          <?php
            $sql = "select * from log where User_id='{$member_id}' order BY id desc limit 6";
            $result = execute($link,$sql); 
            while($row = mysqli_fetch_array($result)){
              echo "<div class='update'>";
              echo "  <div class='message'>";
              echo "    <p><b>".$row['User']." </b>".$row['detail']."</p>";
              echo "    <small class='text-muted'>".$row['Times']."</small>";
              echo "  </div>";
              echo "</div>";
            }
          ?>
        </div>
        
      </div>
      <!-- scence -->
      <div class="scence">
        <h2>Scences</h2>
        
          <div class="item Game">
            <div class="icon">
              <span class="material-symbols-sharp">stadia_controller</span>
            </div>
            <div class="right">
                <div class="info">
                  <h3>Game Time</h3>
                  <small class="text-muted">Turn on</small>
                </div>
              <h5 class="success"> active</h5>
              <h3>Welcome</h3>
            </div>
          </div>
     
          <div class="item TV">
              <div class="icon">
                <span class="material-symbols-sharp">TV</span>
              </div>
              <div class="right">
                  <div class="info">
                    <h3>Watch TV</h3>
                    <small class="text-muted">Turn on</small>
                  </div>
                <h5 class="success"> active</h5>
                <h3>Welcome</h3>
              </div>
          </div>

          <div class="item sleeping">
            <div class="icon">
              <span class="material-symbols-sharp">hotel</span>
            </div>
            <div class="right">
              <div class="info">
                <h3>sleeping</h3>
                <small class="text-muted">Turn on</small>
              </div>
              <h5 class="success"> active</h5>
              <h3>Welcome</h3>
            </div>
          </div>


          <div class="item home">
            <div class="icon">
              <span class="material-symbols-sharp">home</span>
            </div>
            <div class="right">
                <div class="info">
                  <h3>Back home</h3>
                  <small class="text-muted">Turn on</small>
                </div>
              <h5 class="success"> active</h5>
              <h3>Welcome</h3>
            </div>  
          </div>
        

        <div class="item add-scence"> 
          <div>
            <span class="material-symbols-sharp">add</span>
          </div>
          <h3>Add Scences</h3>
        </div>
      </div>

       
    </div>
  </div>
  
 <script>
  //Sound
        let btn1=document.querySelector('.btn-alert1')
        //获得弹窗
        let alertEl1=document.querySelector('.alert1')
        btn1.onclick=function(){
            alertEl1.style.display='flex'
        }
        //获得关闭按钮
       
        alertEl1.onclick=function(e){
            console.log(e)
            if(e.target==alertEl1){
                alertEl1.style.display='none'
            }
           
        }
  // TV
   let btn2=document.querySelector('.btn-alert2')
        //获得弹窗
        let alertEl2=document.querySelector('.alert2')
        btn2.onclick=function(){
            alertEl2.style.display='flex'
        }
        //获得关闭按钮
       
        alertEl2.onclick=function(e){
            console.log(e)
            if(e.target==alertEl2){
                alertEl2.style.display='none'
            }
           
        }
  // Curtain
  let btn3=document.querySelector('.btn-alert3')
        //获得弹窗
        let alertEl3=document.querySelector('.alert3')
        btn3.onclick=function(){
            alertEl3.style.display='flex'
        }
        //获得关闭按钮
       
        alertEl3.onclick=function(e){
            console.log(e)
            if(e.target==alertEl3){
                alertEl3.style.display='none'
            }
           
        }
// coffe machine
        let btn4=document.querySelector('.btn-alert4')
        //获得弹窗
        let alertEl4=document.querySelector('.alert4')
        btn4.onclick=function(){
            alertEl4.style.display='flex'
        }
        //获得关闭按钮
       
        alertEl4.onclick=function(e){
            console.log(e)
            if(e.target==alertEl4){
                alertEl4.style.display='none'
            }
           
        }


      </script>
</body>
 
  
</body>
</html>





