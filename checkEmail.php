<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $email = $_POST['email'];

    require_once 'connect.php';

    $sql = "SELECT email FROM user WHERE email='$email'";

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