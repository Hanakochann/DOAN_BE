<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST['id'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $hometown = $_POST['hometown'];
    $phone = $_POST['phone'];

    require_once 'connect.php';

    $sql = "UPDATE user SET birthday='$birthday', hometown='$hometown', gender='$gender', phone='$phone' WHERE id='$id' ";

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


