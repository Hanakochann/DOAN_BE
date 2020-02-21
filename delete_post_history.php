<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];

    require_once 'connect.php';

    $sql = "DELETE FROM room WHERE id = '$id'";
    $sql1 = "DELETE FROM image_room WHERE id = '$id'";
    // unlink('http://192.168.0.104/android_register_login/room_image/'$id'.jpeg');
    
    if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {

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


