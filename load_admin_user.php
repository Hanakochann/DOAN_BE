<?php

if ($_SERVER['REQUEST_METHOD']=='GET') {

    require_once 'connect.php';

    $sql = "SELECT user.id, user.username, user.birthday, user.hometown, user.gender, user.phone, user.photo FROM user JOIN user_login WHERE user.id = user_login.id AND role='0'";

    $response = mysqli_query($conn, $sql);

    $result = array();

    if( mysqli_num_rows($response) > 0) {
        while ($row = mysqli_fetch_assoc($response)) {
            $h['id']       = $row['id'] ;
            $h['username']       = $row['username'] ;
            $h['birthday']       = $row['birthday'] ;
            $h['hometown']       = $row['hometown'] ;
            $h['gender']       = $row['gender'] ;
            $h['phone']       = $row['phone'] ;
            $h['photo']       = $row['photo'] ;
            array_push($result, $h);
        }
             echo json_encode($result);
   }
 
 }else {
     echo json_encode($result);
     mysqli_close($conn);
 }
 
 ?>