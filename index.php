<?php
//displaying data
include ('./admin/Site_setting/hosconn.php');
include ('dbconfig.php');
$data_count = selectCountColumn($connect, 'record', 'hos_id');
//$count_hospitalname = selectCountHospitalName($connect, 'list_of_patient', 'hospitalname');

//$data_count_result = selectCountColumn($connect, 'record', 'hos_id');
if(isset($_POST['done'])){
       $hos_id = $_POST['hos_id'];
      $hospitalname = $_POST['hospitalname'];
      $Address = $_POST['Address'];
      $contact_no = $_POST['contact_no'];
      $email = $_POST['email'];
      $hospital_description = $_POST['hospital_description'];

      $q = "Select * from record";

    $query = mysqli_query($connect, $q);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_Panel</title>
    <link rel="stylesheet" type="text/css" href="./user/userdashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            overflow-x: hidden;
            align-items: center;
        }
        div.container-fluid{
            align-items: center;
            display: grid;
        }
        #top-menu{
            margin-left: -140px;
            margin-right: -140px;
        }
        .row{
            
        }
        </style>

</head>
<body>   
            <div class="heading" style="background-color: #FFFFFF;">      
            <h1><center>Welcome to Find My Hospital
            <img src="logo.jpg" width= 5% height= 1%></center></h1>
            </div>
            <div class="container-fluid" id="top-menu" style="margin-right:50px;padding:0;margin-left: -120px; width: 150%;">
                <div class="row" style="margin:0  0 0 120px;">
                <?php
                    $q = "select * from record ";
                    $query = mysqli_query($connect, $q);
                    while($res = mysqli_fetch_array($query)){
                    ?>
                    <div class="col-md-3" style="width: auto;margin:0 0px 0px 0px;">
                   
                        <div class="card" style="width:600px;">
                        
                            <div class="card-header" style="color: #3366CC; background-color: #FFFFFF;">
                                <h1 style= "font-family: Clarendon Blk BT;"><?php echo $res['hospitalname'] ?></h1>
                            </div>
                            
                            <div class="card-body" style="background-color: #6699CC;height:200px;">
                            <?php
                                 $data = countPatient($connect,'firstname', 'list_of_patient', $res['hospitalname']); 
                                    // echo "<h4> Total Patient: ".$data['totalpatient']. "</h4>";
                                ?>
                                <!-- <p><h4 style="font-family: Clarendon BT;">Total no of beds:</h4><?php  echo $res['Total_no_of_beds'] ?></p> -->
                                <p ><b style="display:inline-block; font-size:30px;">Available no of beds:</b><span style="display:block;font-size:25px; background:white;width:50px;position:absolute;top:145px;left:150px;border-radius:50px;height:50px;padding:5px 0 0 5px;">
                                <?php echo $res['Total_no_of_beds']-$data['totalpatient'] ?></span></p>
                           <div class="image-container" style="width:240px;height:inherit;background:pink;position:relative;top:-77px;left:343px;">
                           <img src="<?php echo $res['hos_image'];?>"  style="width:inherit;height:inherit;"></div>
                                
                                <!-- <p><h4>hospital_id:</h4><?php// echo $res['hos_id'] ?></p> -->
                                </div>
                                
                                <div class="card-footer" style="background-color: #FFFFFF;">
                                <h3 style="font-family: Arial Black; font-size: 26px;"><?php echo $res['Address'] ?></h3>
                                <h3><?php echo $res['contact_no'] ?></h3>
                                <h4 style="font-family: Bahnschrift SemiLight Condensed;"><?php echo $res['email'] ?></h4>
                                <div class="description" style="width:330px; height:210px;">
                                <h4 style="font-family:Malgun Gothic; font-size:23px;"><?php echo $res['hospital_description'] ?></h4></div>
                                <!-- <p><a href="edit/<?php //echo $res['hos_id'] ?>">Edit</a></p> -->
                              <div class="image-container" style="width:250px;height:210px;position:absolute;left:347px;top:330px;">
                              <iframe src="<?php echo $res['hos_location'];?>"
                                 style="border:0;width:inherit;height:inherit;" allowfullscreen="" loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                            </div>
                        </div>
                         
                    </div>
        
                                       
    <?php
            }
    ?>
    <!-- <div class="row">
        <h4>Total no. of beds:</h4><?//php echo $data_count['total'];?></h4>
    </div> -->
    <!-- <h4><?php //echo include('..\admin\adminDashboard.php');
    
    ?>Click here for registration</h4>
</body>
</html>
 -->
