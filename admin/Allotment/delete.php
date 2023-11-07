<?php
include '../Site_setting/hosconn.php';
$id = $_GET['id'];
$q= " DELETE FROM `room_allotment` WHERE room_id = $id ";
$query= mysqli_query($connect, $q);
header('location:allotedroom.php');
?>