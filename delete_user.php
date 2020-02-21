<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];

    require_once 'connect.php';

    $sql = "DELETE FROM user WHERE id = '$id'";
    $sql1 = "DELETE FROM user_login WHERE id = '$id'";
    $sql2 = "DELETE FROM room WHERE id_user = '$id'";
    $sql3 = "DELETE FROM roommate WHERE id_user = '$id'";
    
    if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {

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