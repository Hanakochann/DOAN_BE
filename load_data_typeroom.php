<?php


    require_once 'connect.php';

    $sql = "SELECT room_type FROM type_room ";

    $response = mysqli_query($conn, $sql);

    while($h = mysqli_fetch_assoc($response)){
        $output[] = $h; 
    }
    echo json_encode($output);
    mysqli_close($conn);

 
 ?>