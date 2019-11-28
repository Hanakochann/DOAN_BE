<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $id = $_GET['id'];

    require_once 'connect.php';

    $sql = "DELETE FROM room WHERE id = '$id'";
    unlink('http://192.168.0.105/android_register_login/room_image/'$id'.jpeg');
    
    if(mysqli_query($conn, $sql)) {

          $result["success"] = "1";
          $result["message"] = "success";

          echo json_encode($result);
          mysqli_close($conn);
      }
  }else{

   $result["success"] = "0";
   $result["message"] = "error!";
   echo json_encode($result);

   mysqli_close($conn);
}

?>


