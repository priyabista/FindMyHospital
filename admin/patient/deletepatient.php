<?php
require_once('../Site_setting/hosconn.php');
$id = $_GET['id'];
$q= " DELETE FROM `list_of_patient` WHERE p_id = $id ";
$query= mysqli_query($connect, $q);
header('location:allpatient.php');
?>