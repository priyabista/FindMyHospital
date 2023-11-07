<?php
include('../Site_setting/hosconn.php');
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
<!-- <div class="toggle" onclick="toggleMemu();"></div> -->
<!-- <div class="search">
<label>
<input type="text" placeholder="Search here">
</label>
</div>   -->
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

require_once('../Site_setting/hosconn.php');

if(isset($_POST['done'])){
$id = $_GET['id'];
$firstname = $_POST['fistname'];
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


$q = "SELECT * FROM  list_of_hospital";

$query = mysqli_query($connect, $q);

header('location:addpatient.php');
}
?>
<!doctype html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="main" style="margin-top: 200px; white-space: nowrap;  position:fixed;
    overflow-x:scroll; ">
<div class="col-8">
<table class= "table table-striped table-grey">
    <thead class="thead-grey">
        <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <!-- <th scope="col">DOB</th> -->
            <th scope="col">Gender</th>
            <th scope="col">Phonenumber</th>
            <th scope="col">Age</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Hospitalname</th>
            <th scope="col">Hospitaladdress</th>
            <!-- <th scope="col">Maritalstatus</th> -->
            <!-- <th scope="col">Bloodgroup</th> -->
            <!-- <th scope="col">Injury</th> -->
            <!-- <th scope="col">p_id</th> -->
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
<?php
        $q = "SELECT * FROM list_of_patient ";

$query = mysqli_query($connect, $q);
while($res = mysqli_fetch_array($query)){
    ?>

<tr>

<td> <?php echo $res['firstname'] ?></td>
<td> <?php echo $res['lastname'] ?></td>
<!-- <td> <?php echo $res['dob'] ?></td> -->
<td> <?php echo $res['gender'] ?></td>
<td> <?php echo $res['phonenumber'] ?></td>
<td> <?php echo $res['age'] ?></td>
<td> <?php echo $res['email'] ?></td>
<td> <?php echo $res['address'] ?></td>
<td> <?php echo $res['hospitalname'] ?></td>
<td> <?php echo $res['hospitaladdress'] ?></td>
<!-- <td> <?php echo $res['maritalstatus'] ?></td>
<td> <?php echo $res['bloodgroup'] ?></td>
<td> <?php echo $res['injury'] ?></td> -->
<!-- <td> <?php //echo $res['p_id'] ?></td> -->
<td><a href="<?php echo "editpatient.php?id=".$res['p_id'];?>" 
class="text-white" style="color: white;background-color: #4CAF50;padding: 7px;">Update</a></td>

<td><a href="<?php echo "deletepatient.php?id=".$res['p_id']; 
?>" class="text-white" style="color: white; background-color: #f44336; padding: 7px;" >Delete</a></td>

</tr>
<?php
}
?>

</table>
<!-- </div>
</div>
</div>
</div> -->
</body>
</html>