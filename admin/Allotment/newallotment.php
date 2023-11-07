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
            body{
                overflow-x: hidden;
            }
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
     
    <!-- <div class="main">
        <div class="topbar">
        <div class="toggle" onclick="toggleMemu();"></div>
        <!-- <div class="search">
        <label>
            <input type="text" placeholder="Search here">
        </label>
        </div>   -->
    </div> -->
    </div>
<?php
include '../Site_setting/hosconn.php';
if(isset($_POST['done'])){
      $bed_no = $_POST['bed_no'];
      $hospital_name = $_POST['hospital_name'];
      $patient_name = $_POST['patient_name'];
      $allotment_date = $_POST['allotment_date'];
      $discharge_date = $_POST['discharge_date'];
    $q = "INSERT INTO `room_allotment`(`bed_no`,`hospital_name`,`patient_name`,`allotment_date`,`discharge_date`) VALUES
    ('$bed_no','$hospital_name','$patient_name','$allotment_date','$discharge_date')";

    $query = mysqli_query($connect, $q);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital_Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div class="main" style="padding-left: 200px; padding-top:50px; white-space: nowrap;  position:relative;">
    <div class="container">
        <div class="form" style="width: 1500px;">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h1>Room_Details</h1>
                            <form onsubmit= "return validateform()"  method="post" name="myform">
                        </div>
                            <div class="form-group">
                            <label for="name">Bed_no</label>
                            <input type="number"  class="form-control" min="101" max="109" name="bed_no" required >
                             </div>
                            <div class="form-group">
                            <label for="name">HospitalName</label>
                            <div class="mb-3">
                            <select class="form-dropdown field" name="hospital_name" style="margin-left:0;width:100%;">
                            <option value="Select...">Select.. </option>
                            <option value="Sahid memorial hospital"> Sahid memorial hospital </option>
                            <option value="Alka hospital">Alka hospital </option>
                            <option value="Mega hospital"> Mega hospital </option>
                            <option value="Narayani hospital"> Narayani hospital </option>
                            <option value="Vayodha hospital">Vayodha hospital </option>
                            </select>
                            </div>
                            </div>
                          
                            <div class="form-group">
                            <label for="name">PatientName</label>
                            <input type="text" class="form-control" name="patient_name" required>
                            </div>
                            <div class="form-group">
                            <label for="name">Allotment_date</label>
                            <input type="date" class="form-control" name="allotment_date" required>
                            
                            </div>
                            <div class="form-group">
                            <label for="name">Discharge_date:</label>
                            <input type="date" class="form-control" name="discharge_date" required>
                            </div>
                       

                        </div>

                        <div class="card-footer">
                        <div class="d-flex">
                        <input type="submit" value="REGISTER" class="btn btn-primary btn-block" name="done">
                        </div>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
     function validateform(){
            var bedno= document.myform.bed_no.value;
            var patname= document.myform.patient_name.value;
        
            if(!isNaN(patname)){
                alert("name cannot be number");
                       return false;
            }
           
        }
           
        </script>
    </body>
</html>

            
           