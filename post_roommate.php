<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $id_user = $_POST['id_user'];
    $id_address = $_POST['id_type'];
    $price = $_POST['price'];


    require_once 'connect.php';

    $sql = "INSERT INTO roommate(id_user, id_address, price) VALUES ('$id_user', '$id_address', '$price')";

    if ( mysqli_query($conn, $sql) ) {
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);

    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }
}
?>