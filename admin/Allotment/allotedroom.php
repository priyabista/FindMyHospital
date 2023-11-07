<?php
include '../Site_setting/hosconn.php';
?>
<html>
   <head>
      <meta http-equiv="refresh" content="" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../admin.css">
  
      <script src="https://kit.fontawesome.com/5e48b645a5.js" crossorigin="anonymous"></script>
      <style>
            a:link { text-decoration: none;}
            a:visited { text-decoration: none; }
            a:hover { text-decoration: none; }
            a:active { text-decoration: none; }
        </style>
  </head>
  <body style="background-color:rgb(244, 247, 250);">
      <nav>
<div class="front">
          <h2>Find my
              <i class="fas fa-hospital"></i></h2>
          <ul>
              <div class="menu">
          <li><a href="../adminDashboard.php"><i class="fas fa-home" aria-hidden="true"></i>Dashboard</a></li>
      <div class="all">
          <li><a href="#"><i class="fas fa-procedures"></i>Patient
          </a>
            <ul class="allis">
                  <li><a href="../patient/allpatient.php">All patients</a></li>
                  <li><a href="../patient/addpatient.php">Add patient</a></li>
            </ul>
          
          </li>
<li><a href="room_allotment"><i class="fas fa-bed"></i>Room Allotment</a>
  <ul class="allis">
      <li><a href="allotedroom.php">Alloted Rooms</a></li>
      <li><a href="newallotment.php">New allotment</a></li>
</ul>
</li>
      </div>
      <li><a href="../login/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
      <li><a href="../Site_setting/hospitaladmin.php"><i class="fa-solid fa-gears"></i>Site changes</a></li>

          </ul>
      </div>
      </div>
  
      </nav>
     
    <div class="main">
    <?php
                //displaying data
                if(isset($_POST['done'])){
                      $bed_no = $_POST['bed_no'];
                      $hospital_name = $_POST['hospital_name'];
                      $patient_name = $_POST['patient_name'];
                      $allotment_date = $_POST['allotment_date'];
                      $discharge_date = $_POST['discharge_date'];

    $q = "SELECT * FROM  `room_allotment`";

    $query = mysqli_query($connect, $q);
                       }
    ?>
<!doctype html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
    <body>
        <!--table table-border table-hover  mt-5"-->
        <div class="main" style="margin-top: 200px; white-space: nowrap;  position:fixed;
    overflow-x:scroll; margin-left: 100px;">
                <div class="col-8">
                    <table class= "table table-bordered">
                        <thead>
                            <tr>
                                <th>room_id</th>
                                <th>bed_no</th>
                                <th>Hospital Name</th>
                                <th>Patient Name</th>
                                <th>Allotment Date</th>
                                <th>Discharge Date</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                    <?php
                           $q = "SELECT * FROM room_allotment";

                   $query = mysqli_query($connect, $q);
                while($res = mysqli_fetch_array($query)){
                     ?>

            <tr>
                <td> <?php echo $res['room_id'] ?></td>
                <td> <?php echo $res['bed_no'] ?></td>
                <td><a style="color:#000;" href="hospitalAccord.php?hospital=<?php echo $res['hospital_name'] ?>"> <?php echo $res['hospital_name'] ?></a></td>
                <td> <?php echo $res['patient_name'] ?></td>
                <td> <?php echo $res['allotment_date'] ?></td>
                <td> <?php echo $res['discharge_date'] ?></td>
                <td><a href="<?php echo "editallotment.php?id=".$res['room_id']; 
                ?>"style="color: white;background-color: #4CAF50;padding: 7px;">Update</a></td>
                <td><a href="<?php echo "delete.php?id=".$res['room_id']; 
                ?>"  style="color: white; background-color: #f44336; padding: 7px;" >Delete</a></td>
                
                    
              </tr>
                 <?php
              }
                   ?>

                    </table>
                </div>
            </div>
        </div>
    </body>
</html>