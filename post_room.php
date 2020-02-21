<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $id_user = $_POST['id_user'];
    $img_room = $_POST['img_room'];
    $username = $_POST['username'];
    $type_room = $_POST['type_room'];
    $price = $_POST['price'];
    $lenght = $_POST['lenght'];
    $width = $_POST['width'];
    $slot_available = $_POST['slot_available'];
    $other = $_POST['other'];
    $city_name = $_POST['city_name'];
    $district_name = $_POST['district_name'];
    $ward_name = $_POST['ward_name'];
    $street_name = $_POST['street_name'];
    $number = $_POST['number'];
    $verified = $_POST['verified'];

    require_once 'connect.php';
    
    $sql = "SELECT id FROM room ORDER BY id DESC LIMIT 1";

    $res = mysqli_query($conn,$sql);
		
		if( mysqli_num_rows($res) > 0) {
		    while($row = mysqli_fetch_row($res)){
				$id = $row[0];
            }
        }else{
            $id = 0;
        }
        $path = "room_image/$$id.jpeg";
        $finalPath = "http://192.168.43.69/android_register_login/".$path;

    $sql1 = "INSERT INTO room(id_user, username, type_room, lenght, width, price, slot_available, other, city_name, district_name, ward_name, street_name, number, verified) VALUES ('$id_user', '$username', '$type_room', '$lenght', '$width', '$price', '$slot_available', '$other', '$city_name', '$district_name', '$ward_name', '$street_name', '$number', '$verified')";
    $sql2 = "INSERT INTO image_room(image_name) VALUES('$finalPath')";

    if ( mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) ) {
        if ( file_put_contents( $path, base64_decode($img_room) ) ){

        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);
        }

    } 
}else {

    $result["success"] = "0";
    $result["message"] = "error";

    echo json_encode($result);
    mysqli_close($conn);
}

?>