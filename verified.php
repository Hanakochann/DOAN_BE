<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $verified = $_POST['verified'];
    $id = $_POST['id'];

    require_once 'connect.php';

    $sql = "UPDATE room SET verified='$verified' WHERE id='$id' ";

    if(mysqli_query($conn, $sql)) {

          $result["success"] = "1";
          $result["message"] = "success";

          echo json_encode($result);
          mysqli_close($conn);
      }
  }

else{

   $result["success"] = "0";
   $result["message"] = "error!";
   echo json_encode($result);

   mysqli_close($conn);
}

?>


