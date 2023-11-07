<?php
session_start();
include '../Site_setting/hosconn.php';


if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $pass= $_POST ['password'];
    $sql= "select * from  adminlogin where  email= '$email' and  password= '$pass' ";
    $query= mysqli_query($connect, $sql);
    $row =  mysqli_num_rows($query);
        if($row == 1){
             echo  "login successful";
             $_SESSION['email']= $email;
             header('location: ../adminDashboard.php');
        }else{
            echo "login failed";
            header ('location: login.php');
        }

}

?>