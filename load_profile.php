<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $id = $_POST['id'];

    require_once 'connect.php';

    $sql = "SELECT * FROM user WHERE id='$id' ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['read'] = array();

    if( mysqli_num_rows($response) === 1 ) {
        
        if ($row = mysqli_fetch_assoc($response)) {
 
             $h['username']    = $row['username'] ;
             $h['email']       = $row['email'] ;
             $h['birthday']       = $row['birthday'] ;
             $h['gender']       = $row['gender'] ;
             $h['hometown']       = $row['hometown'] ;
             $h['phone']       = $row['phone'] ;
             $h['photo']       = $row['photo'] ;
 
             array_push($result["read"], $h);
 
             $result["success"] = "1";
             $result['message'] = "success";
             echo json_encode($result);

             mysqli_close($conn);
        }
 
   }
 
 }else {
 
     $result["success"] = "0";
     $result["message"] = "Error!";
     echo json_encode($result);
 
     mysqli_close($conn);
 }
 
 ?>