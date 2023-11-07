<?php
require_once('../Site_setting/hosconn.php');
$select_query = "SELECT * FROM list_of_patient WHERE p_id=".$_GET['id'];
$edit_data = mysqli_query($connect, $select_query);

//print_r($edit_data);
if(isset($_POST['done'])){
     $id = $_GET['id'];
     $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
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

   $q= " update list_of_patient SET firstname='$firstname',lastname='$lastname',
   gender='$gender',phonenumber='$phonenumber',age='$age',
     email='$email',address='$address',hospitalname='$hospitalname',
     hospitaladdress='$hospitaladdress',maritalstatus='$maritalstatus',
     bloodgroup='$bloodgroup',injury='$injury',p_id=$id WHERE p_id=$id ";  


   $query = mysqli_query($connect, $q);

  header('location:allpatient.php');
   //header('location:addpatient.php');
   }
?>
 
<html>
    <head>
         <meta http-equiv="refresh" content="" charset="utf-8">
     <link rel="stylesheet" type="text/css" href="../admin.css">
     
         <script src="https://kit.fontawesome.com/5e48b645a5.js" crossorigin="anonymous"></script>
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
           <div class="topbar">
           
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
           <h1><center>Basic Information</center></h1>
            <h3><center>Edit Patient</center></h3>
         <?php
         while($res = mysqli_fetch_array($edit_data)){
         ?>
         <form method="POST" class="reg-form">
         
            <h1>Basic Information</h1>
            <h3>Edit Patient</h3><br>
            <div class="field-row">
            <label class="form-label">First Name</label>
            <input type="text"  class="field" required name="firstname" 
            value="<?php echo $res['firstname'] ?>">
         </div>
         <div class="field-row">
            <label class="form-label">Last Name</label>
            <input type="text"  class="field" required name="lastname" 
            value="<?php echo $res['lastname'] ?>">
         </div>
         <div class="field-row">
            <label class="form-label">Gender</label>
            <select class="form-dropdown field" name="gender" 
            value="<?php echo $res['gender'] ?>">
               <option value="Select...">Select.. </option>
               <option value="Male"> Male </option>
               <option value="Female"> Female </option>
               <option value="Female"> Others </option>
            </select>
         </div>
         <div class="field-row">
            <label class="form-level">Phone Number</label>
            <input type="tel" id="phonenumber" class="field" required 
            name="phonenumber" value="<?php echo $res['phonenumber'] ?>">
         </div>
         <div class="field-row">
            <label class="form-label">Age</label>
            <input type="number"  class="field" required name="age" 
            value="<?php echo $res['age'] ?>">
         </div>

         <div class="field-row">
            <label class="form-label">Email</label>
            <input type="email"  class="field" required name="email" 
            value="<?php echo $res['email'] ?>">
         </div>
         <div class="field-row">
            <label class="form-label"> Address</label>
            <input type="textarea"  class="field"name="address" 
            value="<?php echo $res['address'] ?>"
             required style="padding: 35px;">
         </div>
         <div class="field-row">
            <label class="form-label">Marital status</label>
            <select class="form-dropdown field" name="maritalstatus" 
            value="<?php echo $res['maritalstatus'] ?>">
               <option value="Select...">Select.. </option>
               <option value="Single"> Single</option>
               <option value="Married"> Married </option>
            </select>
         </div>
         <div class="field-row" >
            <label class="form-label">Hospital name</label>
            <select class="form-dropdown field" name="hospitalname" 
            value="<?php echo $res['hospitalname'] ?>">
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
            <select class="form-dropdown field" name="hospitaladdress" 
            value="<?php echo $res['hospitaladdress'] ?>">
            <option value="Select...">Select.. </option>
            <option value="jawalakhel, lalitpur">jawalakhel, lalitpur </option>
            <option value="kalanki, ktm"> kalanki, ktm </option>
            <option value="dhovighat, lalitpur"> dhovighat, lalitpur </option>
            <option value="Birgunj">Birgunj </option>
            <option value="balkhu, ktm">balkhu, ktm</option>
               </select>
               </div>
         <div class="field-row">
            <label class="form-label">Blood Group</label>
            <select class="form-dropdown field" name="bloodgroup" 
            value="<?php echo $res['bloodgroup'] ?>">
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
         <div class="field-row" >
            <label class="form-label" >Injury/Condition</label>
            <input type="textarea" class="field" required style="padding: 40px;" 
            name="injury" value="<?php echo $res['injury'] ?>">
         </div>
         <div class="field-row">
        <label class="form-label"></label>
            <input type="submit" class="form-button"name="done" style="background-color: rgb(95, 95, 204);"></button>
            <button class="form-button" style="background-color: grey;"><center>Cancel</center></button>
         </div>
         
         </form>
         <?php
         }
         ?>
            </body>
         </html>