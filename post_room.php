<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $id_user = $_POST['id_user'];
    $id_type = $_POST['id_type'];
    $price = $_POST['price'];
    $slot_available = $_POST['slot_available'];
    $quantity = $_POST['quantity'];
    $other = $_POST['other'];


    require_once 'connect.php';

    $sql = "INSERT INTO room(id_user, id_type, price, slot_available, quantity, other) VALUES ('$id_user', '$id_type', '$price', '$slot_available', '$quantity', '$other')";

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