<?php
include 'hosconn.php';
$id = $_GET['id'];
$q= " DELETE FROM `record` WHERE hos_id = $id ";
$query= mysqli_query($connect, $q);
header('location:hospitaladmin.php');
?>