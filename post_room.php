<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $id_user = $_POST['id_user'];
    $type_room = $_POST['type_room'];
    $price = $_POST['price'];
    $slot_available = $_POST['slot_available'];
    $other = $_POST['other'];
    $city_name = $_POST['city_name'];
    $district_name = $_POST['district_name'];
    $street_name = $_POST['street_name'];
    $number = $_POST['number'];

    require_once 'connect.php';

    $sql = "INSERT INTO room(id_user, type_room, price, slot_available, other, city_name, district_name, street_name, number) VALUES ('$id_user', '$type_room', '$price', '$slot_available', '$other', '$city_name', '$district_name', '$street_name', '$number')";

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