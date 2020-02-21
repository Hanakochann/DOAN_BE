<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $id_user = $_GET['id_user'];

    require_once 'connect.php';

    $sql = "DELETE FROM room WHERE id_user = $id_user";
    $sql1 = "DELETE FROM roommate WHERE id_user = $id_user";
    
    if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {

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


