
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
      <li><a href="../Allotment/allotedroom.php">Alloted Rooms</a></li>
      <li><a href="../Allotment/newallotment.php">New allotment</a></li>
</ul>
</li>
      </div>
      <li><a href="../login/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
      <li><a href="hospitaladmin.php"><i class="fa-solid fa-gears"></i>Site changes</a></li>

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
include 'hosconn.php';
if(isset($_POST['done'])){
      $hospitalname = $_POST['hospitalname'];
      $Address = $_POST['Address'];
      $contact_no = $_POST['contact_no'];
      $email = $_POST['email'];
      $hospital_description = $_POST['hospital_description'];
      $Total_no_of_beds = $_POST['Total_no_of_beds'];
      $hos_image = $_POST['hos_image'];
      $hos_location = $_POST['hos_location'];


    $q = "INSERT INTO `record`(`hospitalname`,`Address`,`contact_no`,`email`,`hospital_description`,`Total_no_of_beds`,`hos_image`,`hos_location`) VALUES
    ('$hospitalname','$Address','$contact_no','$email','$hospital_description','$Total_no_of_beds', '$hos_image','$hos_location')";

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
<div class="main" style="padding-left: 200px; padding-top:50px; white-space: nowrap;  position:relative;
     ">

<script>
        function validateForm(){
            var hosname= document.getElementById('hosname').value;
            var address= document.getElementById('address').value;
            var contact= document.getElementById('contact').value;
            var emails= document.getElementById('emails').value;
            var hosdesc= document.getElementById('hosdesc').value;
            var bed= document.getElementById('bed').value;
            var img= document.getElementById('img').value;

            if((hosname.length<=6)|| (hosname.length>20)){
                document.getElementById('hname').innerHTML=" ** must be at least 6 letters";
                       return false;
            }
            <?php
            $hosname= mysqli_query($connect, "SELECT * FROM record WHERE hospitalname= '$hospitalname'");
            if(mysqli_num_rows($hosname)){?>
              
               document.getElementById('hname').innerHTML=" ** enter different hospital name"; 
         <?php   }

            ?>
            
            if(!isNaN(hosname)){
            document.getElementById('hname').innerHTML=" ** only characters are allowed";
                       return false;
            }
            if(!isNaN(address)){
            document.getElementById('adress').innerHTML=" ** only characters are allowed";
                       return false;
            }
            if(isNaN(contact)){
            document.getElementById('phone').innerHTML=" ** only numbers are allowed";
                       return false;
            }
            if(contact.length!==10){
            document.getElementById('phone').innerHTML=" ** number must be 10 digits";
                       return false;
            }
            if(emails.charAt(emails.length-4)!='.'){
                document.getElementById('mail').innerHTML=" ** Invalid position";
                       return false;
            }
            if(!isNaN(hosdesc)){
            document.getElementById('desc').innerHTML=" ** only characters are allowed";
                       return false;
            }
            if(isNaN(bed)){
            document.getElementById('noofbed').innerHTML=" ** only numbers are allowed";
                       return false;
            }
            if(bed.length>2){
            document.getElementById('noofbed').innerHTML=" ** number must be upto 2 digits";
                       return false;
            }

        }
        </script>



    <div class="container">
        <div class="form" style="width: 1500px;">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h1>Hospital_Details</h1>
                        </div>
                        <form onsubmit= "return validateForm()" method="post">
                            <div class="form-group">
                            <label for="hospitalname">Hospital Name:</label>
                  <input type="text" class="form-control" id="hosname" name="hospitalname" required>
                  <span id="hname" class="text-danger font-weight-bold"></span>
                            </div>
                            <div class="form-group">
                            <label for="name">Address:</label>
                            <input type="text" class="form-control" id="address" name="Address" required>
                            <span id="adress" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                            <label for="name">Contact no:</label>
                            <input type="text" class="form-control" id="contact" name="contact_no" required>
                            <span id="phone" class="text-danger"></span>
                           </div>
                            <div class="form-group">
                            <label for="name">Email:</label>
                            <input type="email" class="form-control" id="emails" name="email" required>
                            <span id="mail" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                            <label for="name">Hospital Description:</label>
                            <input type="text" class="form-control" id="hosdesc" name="hospital_description" required>
                            <span id="desc" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                            <label for="name">Total no of beds:</label>
                            <input type="text" class="form-control" id="bed" name="Total_no_of beds" required>
                            <span id="noofbed" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                            <label for="name">Hospital image:</label>
                            <input type="file" class="form-control-file" id="img" name="hos_image" required>
                            </div>
                            
                            <div class="form-group">
                            <label for="name">Hospital location:</label>
                            <input type="text" class="form-control" name="hos_location">
                            </div>
                        

                        </div>

                        <div class="card-footer">
                        <div class="d-flex">
                        <input type="submit" value="REGISTER" class="btn btn-primary btn-block" name="done">
                        </div>

                        </div>
</form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
    

    </body>
</html>

           <!-- Displaying the list in table  -->     
           <?php
                //displaying data
        if(isset($_POST['done'])){
            $hospitalname = $_POST['hospitalname'];
            $Address = $_POST['Address'];
            $contact_no = $_POST['contact_no'];
            $email = $_POST['email'];
            $hospital_description = $_POST['hospital_description'];
            $Total_no_of_beds = $_POST['Total_no_of_beds'];
            $hos_image = $_POST['hos_image'];
            $hos_location = $_POST['hos_location'];


    $q = "SELECT * FROM  record";

    $query = mysqli_query($connect, $q);
}
?>
<!doctype html>
<html>
    <body>
    <div class="main">
        <!--"table table-border table-hover  mt-5"-->
                <div class="col-8">
                    <table class= "table table-bordered">
                        <thead>
                            <tr>
                                <!-- <th>hos_id</th> -->
                                <th>Hospital Name</th>
                                <th>Address</th>
                                <th>Contact no</th>
                                <th>Email</th>
                                <th>Hospital description</th>
                                <th>Total no of beds</th>
                                <th>Hospital image</th>
                                <th>Hospital location</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                    <?php
                           $q = "SELECT * FROM record ";

                   $query = mysqli_query($connect, $q);
                while($res = mysqli_fetch_array($query)){
                     ?>

            <tr>
                <!-- <td> <?php echo $res['hos_id'] ?></td> -->
                <td> <?php echo $res['hospitalname'] ?></td>
                <td> <?php echo $res['Address'] ?></td>
                <td> <?php echo $res['contact_no'] ?></td>
                <td> <?php echo $res['email'] ?></td>
                <td> <?php echo $res['hospital_description'] ?></td>
                <td> <?php echo $res['Total_no_of_beds'] ?></td>
                <td> <?php if($res['hos_image']!=''){ ?>
                            <img src="../images/<?php echo $res['hos_image']; ?>" style="width: 150px; height: 100px;" />
                            <?php } ?></td>
                <td> <iframe src="<?php echo $res['hos_location'];?>"
                                 style="border:0;width:210px;height:inherit;" allowfullscreen="" loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"></iframe></td>            
                <td><a href="<?php echo "update.php?id=".$res['hos_id']; 
                ?> " style="color: white;background-color: #4CAF50;padding: 6px;">Update</a></td>
                <td><a href="<?php echo "delete.php?id=".$res['hos_id']; 
                ?>" style="color: white; background-color: #f44336; padding: 6px;">Delete</a></td> 
                               
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