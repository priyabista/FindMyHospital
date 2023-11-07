<?php
include('../Site_setting/hosconn.php');
?>
<html>
   <head>
      <meta http-equiv="refresh" content="" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../admin.css">
  
      <script src="https://kit.fontawesome.com/5e48b645a5.js" crossorigin="anonymous"></script>
  </head>
  <body style="background-color:rgb(244, 247, 250);width:100%;">
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
                  <li><a href="allpatient.php">All patients</a></li>
                  <li><a href="addpatient.php">Add patient</a></li>
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
      <li><a href="../Site_setting/hospitaladmin.php"><i class="fa-solid fa-gears"></i>Site changes</a></li>

          </ul>
      </div>
      </div>
  
      </nav>

    
     
    <div class="main">
        <!-- <div class="topbar" style=" width: 172vh;">
        <div class="toggle" onclick="toggleMemu();"></div> -->
        <div class="search">
        <label>
            <!-- <input type="text" placeholder="Search here"> -->
        </label>
        </div>  
        </div>
        </div>
        <script>
            function toggleMemu(){
                let toggle = document.querySelector('.toggle');
                let front = document.querySelector('.front');
                toggle.classList.toggle('active');
                front.classList.toggle('active');
               }
        </script>
        
        <?php
         $errors = [];
if(isset($_POST['done'])){
  
      $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
      $dob = $_POST['dob'];
     $gender = $_POST['gender'];
      $phonenumber = $_POST['phonenumber'];
     $age = $_POST['age'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $hospitalname = $_POST['hospitalname'];
        $hospitaladdress = $_POST['hospitaladdress'];
        $maritalstatus = $_POST['maritalstatus'];
       $bloodgroup = $_POST['bloodgroup'];
      $injury = $_POST['injury'];

function check_input($data){
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$firstname = check_input($_POST["firstname"]);
if(preg_match('~[0-9]~',$_POST['firstname'])){ 
$errors[]="username cannot contain number";
  }
$lastname = check_input($_POST["lastname"]);
if(preg_match('~[0-9]~',$_POST['lastname'])){ 
   $errors[]="lastname cannot contain number";

 }
$phonenumber = check_input($_POST['phonenumber']);
$number = preg_match('@[0-9]@',$phonenumber);
if(!$number || strlen($phonenumber)>10 || strlen($phonenumber)<10 ){ 
   $errors[]="Should only contain digits and should be length 10";

  } 
   $address = check_input($_POST["address"]);
   if(preg_match('~[0-9]~',$_POST['address'])){ 
$errors[]="Address cannot contain number";
   
    }
 $injury = check_input($_POST['injury']);
 if(preg_match('~[0-9]~',$_POST['injury'])){ 
$errors[]="Invalid injury";
  
  }
  $check_email = mysqli_query($connect,"SELECT * FROM `list_of_patient` WHERE email ='$email'");
  if(mysqli_num_rows($check_email)){
   $errors[]="Email already exist";
  }

if(empty($errors)){
    $q = "INSERT INTO `list_of_patient`(`firstname`,`lastname`,`gender`,`phonenumber`,`age`,`email`,`address`,`hospitalname`,`hospitaladdress`,`maritalstatus`,`bloodgroup`,`injury`)
     VALUES('$firstname','$lastname','$gender','$phonenumber','$age','$email','$address','$hospitalname','$hospitaladdress','$maritalstatus','$bloodgroup','$injury')";

    $query = mysqli_query($connect, $q);
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>form</title>
</head>
<body >

<?php if(!empty($errors)): ?>
<div class="errors" style="z-index: 100;
    width: 500px;
    height: 400px;
   
    position: absolute;
    left: 60%;
    top: 20%;
    margin-bottom:20px;">
   <h5>errors</h5>
   <?php
   foreach ($errors as $error): ?>
   <div style="margin-bottom:10px;color:red;margin-top:10px;"><?php echo  $error; ?></div>
  <?php endforeach ?>

</div>
<?php endif; ?>

<form class="reg-form" method="POST"> 
   <h1><center>Basic Information</center></h1>
    <h3><center>Add Patient</center></h3>

   <div class="field-row">
      <h1>Basic Information</h1>
      <h3>Add Patient</h3><br>
      <label class="form-label">First Name</label>
      <input type="text"  class="field" required name="firstname">
      
   </div>
   <div class="field-row">
      <label class="form-label">Last Name</label>
      <input type="lname"  class="field" required name="lastname">
   </div>
   <!-- <div class="field-row">
      <label class="form-label">Date of Birth</label>
      <input type="date"  class="field" required name="dob">
   </div> -->
   <div class="field-row">
      <label class="form-label">Gender</label>
      <select class="form-dropdown field" name="gender">
         <option value="Select...">Select.. </option>
         <option value="Male"> Male </option>
         <option value="Female"> Female </option>
         <option value="Female"> Others </option>
      </select>
   </div>
   <div class="field-row">
      <label class="form-level">Phone Number</label>
      <input type="text" class="field"  name="phonenumber" required>
   </div>
   <div class="field-row">
      <label class="form-label">Age</label>
      <input type="number"  class="field" required name="age">
   </div>

   <div class="field-row">
      <label class="form-label">Email</label>
      <input type="email"  class="field" required name="email">
   </div>
   <div class="field-row">
      <label class="form-label"> Address</label>
      <input type="textarea" class="field" required style="padding: 35px;" name="address">
   </div>
   <div class="field-row" >
    <label class="form-label">Hospital name</label>
    <select class="form-dropdown field" name="hospitalname">
        <option value="Select...">Select.. </option>
        <option value="Sahid memorial hospital"> Sahid memorial hospital </option>
        <option value="Alka hospital">Alka hospital </option>
        <option value="Mega hospital"> Mega hospital </option>
        <option value="Narayani hospital"> Narayani hospital </option>
        <option value="Vayodha hospital">Vayodha hospital </option>
     </select>
   </div>
 <div class="field-row" >
    <label class="form-label">Hospital address</label>
    <select class="form-dropdown field" name="hospitaladdress">
        <option value="Select...">Select.. </option>
        <option value="jawalakhel, lalitpur">jawalakhel, lalitpur </option>
        <option value="kalanki, ktm"> kalanki, ktm </option>
        <option value="dhovighat, lalitpur"> dhovighat, lalitpur </option>
        <option value="Birgunj">Birgunj </option>
        <option value="balkhu, ktm">balkhu, ktm</option>
     </select>
 </div>
   <div class="field-row">
      <label class="form-label">Marital status</label>
      <select class="form-dropdown field" name="maritalstatus">
         <option value="Select...">Select.. </option>
         <option value="Single"> Single</option>
         <option value="Married"> Married </option>
      </select>
   </div>
   <div class="field-row">
      <label class="form-label">Blood Group</label>
      <select class="form-dropdown field" name="bloodgroup">
         <option value="Select...">Select.. </option>
         <option value="A+"> A+ </option>
         <option value="A-"> A- </option>
         <option value="B+"> B+ </option>
         <option value="B-"> B- </option>
         <option value="AB+"> AB+ </option>
         <option value="AB-"> AB- </option>
         <option value="O+">O+</option>
         <option value="O-"> O- </option>
      </select>
   </div>
   <!--
   <div class="field-row" >
      <label class="form-label" >Upload Picture</label>
      <input type="file" class="field" id="A" required >
   </div>
            -->
<div class="field-row" >
      <label class="form-label" >Injury/Condition</label>
      <input type="textarea" class="field" required style="padding: 40px;" name="injury">
   </div>
   
   <div class="field-row">
      <label class="form-label"></label>
      <input type="submit" value="REGISTER" style="color: white;background-color: #4CAF50;padding: 7px;" class="btn btn-primary btn-block" name="done">
   </div>

  

</form>


    </body>
</html>
