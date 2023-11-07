<?php
$username ="root";
$password = "";
$host ="localhost";
$dbname= "hospitals"; 


$connect = mysqli_connect($host, $username, $password, $dbname);

if(!$connect){
    echo mysqli_connect_error();
}else{
     //echo "connection success";

}


 
?>