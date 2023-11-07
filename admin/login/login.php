<?php
session_start();
include '../Site_setting/hosconn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="refresh" content="" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="all.css">
    <style>
        div.open{
        align-items: center;
        margin-top: 150px;
        margin-left: 350px;
    }
    #submit input{
        margin-top: 10px;
        margin-right: 10px;
    }
        </style>
</head>
<body>
    <div class="open">
        <p id="nep">
            <div style="position: absolute;">
             <img src="30681d50755543.58e48528e184a.jpg" width="350" height="400"></p></div>
    <div class="position">
    <div class="hosimg">
        <h2><p>Find&#160My</p><div style="padding-top: 0px;">
            <i id="pen">
            <img src="Untitled-1.jpg" width="200px"></i></div></h2>
        </div><br><br><br><br>
        <div class="heading">
    <form action="logincheck.php" method="POST">
            <div class="box">
                <div class="session">
    <input type="email" name="email" placeholder="Enter you email">
    
</div>
<br><br><br>
<input type="password" name="password" placeholder="Enter your password">
<br></div>
   <p id="submit">
    <input type="submit" name="submit" ></p>
</form>
        </div>
</div>
    </div>
</body>
</html>