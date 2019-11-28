<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $img_user = $_POST['img_user'];
    $price = $_POST['price'];
    $city_name = $_POST['city_name'];
    $district_name = $_POST['district_name'];
    $street_name = $_POST['street_name'];
    $gender = $_POST['gender'];

    require_once 'connect.php';

    $sql = "INSERT INTO roommate(id_user, username, img_user, price, city_name, district_name, street_name, gender) VALUES ('$id_user', '$username', '$img_user', '$price', '$city_name', '$district_name', '$street_name', '$gender')";

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