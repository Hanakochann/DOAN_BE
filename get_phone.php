<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $username = $_POST['username'];

    require_once 'connect.php';

    $sql = "SELECT phone FROM user WHERE username='$username' ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['read'] = array();

    if( mysqli_num_rows($response) === 1 ) {
        
        if ($row = mysqli_fetch_assoc($response)) {

             $h['phone']       = $row['phone'] ;
 
             array_push($result["read"], $h);
 
             $result["success"] = "1";
             $result['message'] = "success";
             echo json_encode($result);

             mysqli_close($conn);
        }
 
   }else {
 
     $result["success"] = "0";
     $result["message"] = "Error!";

     echo json_encode($result);
     mysqli_close($conn);
    }
 }
 ?>