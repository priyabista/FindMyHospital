<?php
include 'hosconn.php';
$select_query = "SELECT * FROM record WHERE hos_id=".$_GET['id'];
$edit_data = mysqli_query($connect, $select_query);

//print_r($edit_data);
if(isset($_POST['done'])){
     $id = $_GET['id'];
     $hospitalname = $_POST['hospitalname'];
     $Address = $_POST['Address'];
     $contact_no = $_POST['contact_no'];
     $email = $_POST['email'];
     $hospital_description = $_POST['hospital_description'];
     $Total_no_of_beds = $_POST['Total_no_of_beds'];
     $hos_image = $_POST['hos_image'];
     $hos_location = $_POST['hos_location'];

$q = " update record SET hos_id=$id, hospitalname='$hospitalname',
Address='$Address',contact_no='$contact_no',
email='$email',hospital_description='$hospital_description', Total_no_of_beds='$Total_no_of_beds',
hos_image='$hos_image',hos_location='$hos_location' WHERE hos_id=$id ";

$query = mysqli_query($connect, $q);

header('location:hospitaladmin.php');
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
                            <h1>UPDATE</h1>
                            <?php
                            while($res = mysqli_fetch_assoc($edit_data)){
                                $description = $res['hospital_description'];
                                $location = $res['hos_location'];
                                // echo"<pre>";var_dump($res);die;
                            ?>
                            <form method="POST">
                            <div class="form-group">
                            <label for="hos_id">Hospital ID:</label>
                            <input type="text" class="form-control" name="hos_id" 
                            value="<?php echo $res['hos_id'] ?>">
                            </div>
                            <div class="form-group">
                            <label for="hospitalname">Hospital Name:</label>
                            <input type="text" class="form-control" name="hospitalname" 
                            value="<?php echo $res['hospitalname'] ?>">
                            </div>
                            <div class="form-group">
                            <label for="name">Address:</label>
                            <input type="text" class="form-control" name="Address" 
                            value="<?php echo $res['Address'] ?>">
                            </div>
                            <div class="form-group">
                            <label for="name">Contact no:</label>
                            <input type="text" class="form-control" name="contact_no"
                            value="<?php echo $res['contact_no']?>">
                            </div>
                            <div class="form-group">
                            <label for="name">Email:</label>
                            <input type="email" class="form-control" name="email"
                            value="<?php echo $res['email'] ?>">
                            </div>
                            <div class="form-group">
                            <label for="name">Hospital Description:</label>
                            <textarea name="hospital_description"  class="form-control" style="height:150px; overflow:hidden;">
                            <?php echo $description ?></textarea>
                            </div>
                            <div class="form-group">
                            <label for="name">Total no of bed:</label>
                            <input type="text" class="form-control" name="Total_no_of_beds"
                            value="<?php echo $res['Total_no_of_beds'] ?>">
                            </div>
                            <div class="form-group">
                            <label for="name">Hospital image:</label>
                            <input type="file" class="form-control-file"  name="hos_image"
                            value="<?php echo $res['hos_image'] ?>">
                            <?php if($res['hos_image']!=''){ ?>
                            <img src="../../user/<?php echo $res['hos_image']; ?>" style="width:500px; height: 200px;" />
                            <?php } ?>
                            </div>
                            <div class="form-group">
                            <label for="name">Hospital location:</label>
                            <input type="text" class="form-control" name="hos_location"
                            value="<?php echo $res['hos_location'];?>">
                            </div>
                            
                        <div class="card-footer">
                        <div class="d-flex">
                        <input type="submit" value="UPDATE" class="btn btn-primary btn-block" name="done">
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