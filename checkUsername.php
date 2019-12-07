<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $username = $_POST['username'];

    require_once 'connect.php';

    $sql = "SELECT username FROM user WHERE username='$username'";

    $response = mysqli_query($conn, $sql);

    if ( mysqli_num_rows($response) > 0) {
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