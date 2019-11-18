<?php

if ($_SERVER['REQUEST_METHOD']=='GET') {

    require_once 'connect.php';

    $sql = "SELECT type_room, price, img_room, city_name, district_name, street_name, number FROM room";

    $response = mysqli_query($conn, $sql);

    $result = array();

    if( mysqli_num_rows($response) > 0) {
        
        while ($row = mysqli_fetch_assoc($response)) {
 
            $h['type_room']       = $row['type_room'] ;
            $h['price']       = $row['price'] ;
            $h['img_room']       = $row['img_room'] ;
            $h['city_name']       = $row['city_name'] ;
            $h['district_name']       = $row['district_name'] ;
            $h['street_name']       = $row['street_name'] ;
            $h['number']        = $row['number'] ;
            array_push($result, $h);
        }
             echo json_encode($result);
   }
 
 }else {
     echo json_encode($result);
     mysqli_close($conn);
 }
 
 ?>