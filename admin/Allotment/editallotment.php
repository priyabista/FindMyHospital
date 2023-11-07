<?php
include '../Site_setting/hosconn.php';
$select_query = "SELECT * FROM room_allotment WHERE room_id=".$_GET['id'];
$edit_data = mysqli_query($connect, $select_query);
if(isset($_POST['done'])){
       $id = $_GET['id'];
      $bed_no = $_POST['bed_no'];
      $hospital_name = $_POST['hospital_name'];
      $patient_name = $_POST['patient_name'];
      $allotment_date = $_POST['allotment_date'];
      $discharge_date = $_POST['discharge_date'];
      
      
$q= " update room_allotment SET bed_no='$bed_no', hospital_name='$hospital_name',
patient_name='$patient_name',allotment_date='$allotment_date',discharge_date='$discharge_date' 
WHERE room_id=$id ";  

 
    $query = mysqli_query($connect, $q);
 
   header('location:allotedroom.php');  
}
?>
<html>
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital_Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>
 <body>
    <div class="container">
        <div class="form">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h1>UPDATE ALLOTMENT</h1>
                            <?php
                            while($res = mysqli_fetch_array($edit_data)){
                            ?>
                            <form method="POST">
                            <div class="form-group">
                            <label for="bed_no">Bed no:</label>
                            <input type="text" class="form-control" name="bed_no" 
                            value= "<?php echo $res['bed_no'] ?>">
                            </div>
                            <div class="form-group">
                            <label for="hospitalname">Hospital Name:</label>
                            <input type="text" class="form-control" name="hospital_name" 
                            value= "<?php echo $res['hospital_name'] ?>">
                            </div>
                            <div class="form-group">
                            <label for="name">Patient Name:</label>
                            <input type="text" class="form-control" name="patient_name" 
                            value= "<?php echo $res['patient_name'] ?>">
                            </div>
                            <div class="form-group">
                            <label for="name">Allotment Date:</label>
                            <input type="date" class="form-control" name="allotment_date"
                            value="<?php echo $res['allotment_date']?>">
                            </div>
                            <div class="form-group">
                            <label for="name">Discharge Date:</label>
                            <input type="date" class="form-control" name="discharge_date"
                            value= "<?php echo $res['discharge_date'] ?>">
                            </div>
                        

                        </div>

                        <div class="card-footer">
                        <div class="d-flex">
                        <input type="submit" value="REGISTER" class="btn btn-primary btn-block" name="done">
                        </div>
                      </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                            <?php
                            }
                            ?>

    </body>
</html>

