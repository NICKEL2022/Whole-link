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
      <h1>Dashboard</h1>
      <!-- 用户名 -->
     
      <div class="date">
        <p>Date/Time  : <span id="datetime"></span></p>
      </div>
      <nav id="primary_nav_wrap" >
        <ul>
          <li class="current-menu-item"><a href="Situation Page.html">Customize</a></li>
          
         
          </li>
          <li><a href="Situation Page Salon.html">Salon</a>
            
          </li>
          <li><a href="Situation Page Bedroom.html">Bedroom</a>

          </li>
          <li><a href="Situation Page Library.html">Library</a></li>
          <li><a href="Situation Page Gameroom.html">Gameroom</a></li>
        </ul>
        </nav>
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
                  <form id="Speakers" method="post" action="../devices/Sound.php" >
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
                    <input name="Submit-Sound" type="submit" value="OK" >
                    
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
                <form id="TV" method="post" action="../devices/Android TV.php">
                  
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
                  <input name="Submit-TV" type="submit" value="OK">
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
                  <form id="Curtain" method="post" action="./devices/Curtain.php">
                    
                      <lable>Switch</lable>
                      <select name="Status_percentage_Curtain">
                        <option value="3">on</option>
                        <option value="2">Open halfway</option>
                        <option value="1">Open 1/4</option>
                        <option value="0">OFF</option>
                      </select>                     
                      <br>
                   
                    <br><br>
                    <input name="Submit-Curtain" type="submit" value="OK">
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
                <div class="alert4-title">Coffe machine</div>
                <div class="alert4-content">
                  <form id="Coffee Machine" method="post" action="./devices/Coffee Machine.php">
                      <lable>Switch</lable>
                      <select name="Device_Status_Coffee">
                        <option value="1">ON</option>
                        <option value="0">OFF</option>
                      </select>                     
                      <br>
                   
                    <br><br>
                    <input name="Submit-Coffee"type="submit" value="OK">
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
                  <form id="Light" method="post" action="./devices/Light.php">
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
                    <input name="Submit-Light" type="submit" value="OK">
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
                  <form id="Air conditioner" method="post" action="./devices/Air conditioner.php">
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
                    <input name="Submit-Air" type="submit" value="OK">
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
        <div class="item add-scence" style="background-color: transparent;
        border: 2px dashed var(--color-primary);
        color:var(--color-primary);
        display:flex;
        align-items: center;
        justify-content: center;"> 
          <div>
            <span class="material-symbols-sharp">add</span>
          </div>
  
          <a href="devices.html" style="color:var(--color-primary);">Supported Devices</a>
        </div>
        
        
      </div>
      <!-- 最近活动 -->
      <div class="recent">
        <h2>Activities Analysis</h2>
        <div class="chart">
          <canvas id="myChart" style="width:100%;max-width:750px"></canvas>
          <script>
              var xValues = [0,2,4,6,8,10,12,14,16,18,20,24];
              var yValues = [0.5,0.3,0.2,0.6,1.1,2.5,3.0,3.0,4.2,3.2,4.0,2.2];
              
              new Chart("myChart", {
                type: "line",
                data: {
                  labels: xValues,
                  datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues
                  }]
                },
                options: {
                  legend: {display: false},
                  scales: {
                    yAxes: [{ticks: {min: 0.1, max:4.5}}],
                  }
                }
              });
          </script>
        </div>
        <!-- 展示更多细节 -->
        <a href="History Page.php">Show All</a>

      </div>    
    </main>

    <!-- right -->
    <div class="right">
      <div class="top">
        <button id="menu-btn">
          <span class="material-symbols-sharp">menu</span>
        </button>
       
      </div>
      <!-- updates -->
      <div class="recent-updates">
        <h2>Recent updates</h2>
        <div class="updates">
        <?php
            $sql = "select * from log where User='{$user}' order BY id desc limit 6";
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
        <a href="History Page.php" style="text-align: center;
        display: block;
        margin: 1rem auto;
        color: var(--color-primary);">Show All</a>
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
                  <a href="Situation Page GameRoom.html" >GameRoom</a>
                  <!-- <small class="text-muted">Turn on</small> -->
                </div>
              
              <!-- <h3>Welcome</h3> -->
            </div>
          </div>
     
          <div class="item TV">
              <div class="icon">
                <span class="material-symbols-sharp">TV</span>
              </div>
              <div class="right">
                  <div class="info">
                    <a href="Situation Page Library.html" >Library</a>
                    <!-- <small class="text-muted">Turn on</small> -->
                  </div>
          
                <!-- <h3>Welcome</h3> -->
              </div>
          </div>

          <div class="item sleeping">
            <div class="icon">
              <span class="material-symbols-sharp">hotel</span>
            </div>
            <div class="right">
              <div class="info">
                <a href="Situation Page BedRoom.html" >Bedroom</a>
                <!-- <small class="text-muted">Turn on</small> -->
              </div>
<!--         
              <h3>Welcome</h3> -->
            </div>
          </div>


          <div class="item home">
            <div class="icon">
              <span class="material-symbols-sharp">home</span>
            </div>
            <div class="right">
                 <div class="info">
                  <a href="Situation Page Salon.html" >Salon</a>
                </div> 
              <!-- <h5 class="success"> active</h5> -->
              <!-- <h3>Welcome</h3> -->
            </div>  
          </div>
        

        <div class="item add-scence"> 
          <div>
            <span class="material-symbols-sharp">add</span>
          </div>
          <a href="Situation Page.html" style="color:var(--color-primary);">Add Scences</a>
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

            var formDataSpeakers = $(this).serialize();
              // Update the database with the form data
                $.ajax({
                    type: "POST",
                    url: "form.php",
                    data: formDataSpeakers,
                    
                 });

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
            var formDataTV = $(this).serialize();
              // Update the database with the form data
                $.ajax({
                    type: "POST",
                    url: "form.php",
                    data: formDataTV,
                  });

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
        var dt = new Date();
        document.getElementById("datetime").innerHTML = dt.toLocaleString();


        // form
        // //提交表单

          // $("#Speakers").click(function(){
          //   var formDataSpeakers = $(this).serialize();
          //       // Update the database with the form data
          //       $.ajax({
          //           type: "POST",
          //           url: "form.php",
          //           data: formDataSpeakers,
                    
          //       });
          //     // $("#Speaker_submit").click(function(){
          //     //   Speakers=$("#Speakers").val();
          //     //   $.post("form.php");
          //     // });
          //   // $("#TV_submit").click(function(){
          //   //   Speakers=$("#TV").val();
          //   //   $.post("form.php");
          //   // });
          //   // $("#Curtain_submit").click(function(){
          //   //   Speakers=$("#Curtain").val();
          //   //   $.post("form.php");
          //   // });
          //   // $("#Coffee Machine_submit").click(function(){
          //   //   Speakers=$("#Coffee Machine").val();
          //   //   $.post("form.php");
          //   // });
          // });

      </script>
</body>
 
  
</body>
</html>





