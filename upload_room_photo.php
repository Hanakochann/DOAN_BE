<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $photo = $_POST['photo'];

    $path = "room_image/$id.jpeg";
    $finalPath = "http://192.168.43.69/android_register_login/".$path;

    require_once 'connect.php';

    $sql = "UPDATE room SET img_room='$finalPath' WHERE id='$id' ";

    if (mysqli_query($conn, $sql)) {
        
        if ( file_put_contents( $path, base64_decode($photo) ) ) {
            
            $result['success'] = "1";
            $result['message'] = "success";

            echo json_encode($result);
            mysqli_close($conn);

        }

    }

}

?>