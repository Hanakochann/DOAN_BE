<?php

if ($_SERVER['REQUEST_METHOD']=='GET') {

    require_once 'connect.php';

    $sql = "SELECT * FROM roommate";

    $response = mysqli_query($conn, $sql);

    $result = array();

    if( mysqli_num_rows($response) > 0) {
        
        while ($row = mysqli_fetch_assoc($response)) {
            
            $h['id']       = $row['id'] ;
            $h['id_user']       = $row['id_user'] ;
            $h['username']       = $row['username'] ;
            $h['price']       = $row['price'] ;
            $h['img_user']       = $row['img_user'] ;
            $h['city_name']       = $row['city_name'] ;
            $h['district_name']       = $row['district_name'] ;
            $h['street_name']       = $row['street_name'] ;
            $h['gender']        = $row['gender'] ;
            $h['time_post']        = $row['time_post'] ;
            array_push($result, $h);
        }
             echo json_encode($result);
   }
 
 }else {
     echo json_encode($result);
     mysqli_close($conn);
 }
 
 ?>