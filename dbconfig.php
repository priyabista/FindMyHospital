<?php 
include ('C:\xampp\htdocs\projectfinal\admin\Site_setting\hosconn.php');

function selectCountColumn($connect, $table_name, $column){
    $sql = "SELECT COUNT('.$column.') as total FROM ".$table_name;
    $query = mysqli_query($connect, $sql);
            if(mysqli_num_rows($query)>0){
                while($row = mysqli_fetch_assoc($query)){
            $data = [
            'total' => $row['total'],
            ];
        }
        return $data;
    }
}


function countPatient($connect, $column, $table_name, $hospitalname){
    $sql = "SELECT COUNT($column) as total FROM ".$table_name." WHERE hospitalname= '".$hospitalname."'";
    $query = mysqli_query($connect, $sql);

        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_assoc($query)){
            $count = [
            'totalpatient' => $row['total'],
            ];
        }
        return $count;
    }
    
}

// function totalBed($connect, $column, $table_name, $hospitalname){
//     $sql = "SELECT COUNT($column) as total FROM ".$table_name." WHERE hospitalname= '".$hospitalname."'";
//     $query = mysqli_query($connect, $sql);

//         if(mysqli_num_rows($query)>0){
//             while($row = mysqli_fetch_assoc($query)){
//             $count = [
//             'totalpatient' => $row['total'],
//             ];
//         }
//         return $count;
//     }
    
// }

function selectQueryBuilder($connect, $sql_select){
    $result = mysqli_query($connect, $sql_select);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $data[] =  [
                'hos_id' => $row['hos_id'],
                'hospitalname' => $row['hospitalname'],
                'Address' => $row['Address'],
                'contact_no' => $row['contact_no'],
                'email' => $row['email'],
                'hospital_description' => $row['hospital_description'],
            ];
        }
        return $data;
    }

}

function insertQueryBuilder($connect, $sql){
    // mysqli_query() - this methos is use to execute query
    // this method takes two parameter
    // 1. Connection object
    // 2. Query string

    $response = mysqli_query($connect, $sql);
    if($response){
        return true;
    }else{
        return false;
    }
}


function checkAvailability($connect, $table_name, $column){
    $sql = "SELECT username  FROM ".$table_name." WHERE username=".$value;

    $query = mysqli_query($connect, $sql);
    if(mysqli_num_rows($query)>0){
            return true;
    }
    else{
        return false;
    }
}
?>