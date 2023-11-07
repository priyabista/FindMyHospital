<?php

include ('./Site_setting/hosconn.php');
session_start();

?>


<html>
    <head>
        <meta http-equiv="refresh" content="" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="admin.css">
    
        <script src="https://kit.fontawesome.com/5e48b645a5.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav>
 <div class="front">
            <h2>Find my
                <i class="fas fa-hospital"></i></h2>
            <ul>
                <div class="menu">
            <li><a href="adminDashboard.php"><i class="fas fa-home" aria-hidden="true"></i>Dashboard</a></li>
        <div class="all">
            <li><a href="#"><i class="fas fa-procedures"></i>Patient
            </a>
              <ul class="allis">
                    <li><a href="patient/allpatient.php" target="_self">All patients</a></li>
                    <li><a href="patient/addpatient.php">Add patient</a></li>
              </ul>
            
            </li>
 <li><a href="room_allotment"><i class="fas fa-bed"></i>Room Allotment</a>
    <ul class="allis">
        <li><a href="./Allotment/allotedroom.php">Alloted Rooms</a></li>
        <li><a href="./Allotment/newallotment.php">New allotment</a></li>
  </ul>
</li>
        </div>
        <li><a href="./login/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        <li><a href="./Site_setting/hospitaladmin.php"><i class="fa-solid fa-gears"></i>Site changes</a>
        </li>

            </ul>
        </div>
        </div>
    
</nav>
          
          <div class="admininfo">
              <?php 
             
              include './Site_setting/hosconn.php';
              $qq= "select * from  adminlogin  ";
              $que= mysqli_query($connect, $qq);
              $row=mysqli_fetch_array($que);
              
              ?>
              <div class="info" style="position:relative;margin-left:1200px; margin-top: 70px; background-color: grey;">
              <h5>Admin</h5>
              <h5><?php echo "email : ".$row['email'] ?></h5>
              <h5><?php echo "Id : ".$row['id'] ?></h5>
              
              
              </div>
          <div class="sub-container" style=" color: black; position: relative; margin-top: 200px; margin-left: 600px;">
          <p style="font-family: Clarendon BT; font-size: 45px; box-shadow:5px 10px #FFFFFF;text-shadow: 2px 2px 5px black;">Welcome to Admin Dashboard</p>
                </div>
    </body>
</html>