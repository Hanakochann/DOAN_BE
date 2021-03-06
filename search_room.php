<?php

if ($_SERVER['REQUEST_METHOD']=='GET') {

    $city_name = $_GET['city_name'];
    $district_name = $_GET['district_name'];
    $ward_name = $_GET['ward_name'];
    $price_start = $_GET['price_start'];
    $price_end = $_GET['price_end'];

    require_once 'connect.php';

    $sql = "SELECT * FROM room JOIN user ON room.id_user = user.id JOIN image_room ON image_room.id = room.id WHERE city_name='$city_name' AND district_name='$district_name' AND ward_name='$ward_name' AND price >= '$price_start' AND price <= '$price_end'";

    $response = mysqli_query($conn, $sql);

    $result = array();

    if( mysqli_num_rows($response) > 0) {
        
        while ($row = mysqli_fetch_assoc($response)) {
            $h['username']       = $row['username'] ;
            $h['type_room']       = $row['type_room'] ;
            $h['price']       = $row['price'] ;
            $h['lenght']       = $row['lenght'] ;
            $h['width']       = $row['width'] ;
            $h['slot_available']       = $row['slot_available'] ;
            $h['other']       = $row['other'] ;
            $h['image_name']       = $row['image_name'] ;
            $h['city_name']       = $row['city_name'] ;
            $h['district_name']       = $row['district_name'] ;
            $h['ward_name']       = $row['ward_name'] ;
            $h['street_name']       = $row['street_name'] ;
            $h['number']        = $row['number'] ;
            $h['verified']        = $row['verified'] ;
            $h['time_post']        = $row['time_post'] ;
            $h['birthday']        = $row['birthday'] ;
            $h['hometown']        = $row['hometown'] ;
            $h['gender']        = $row['gender'] ;
            $h['phone']        = $row['phone'] ;
            $h['photo']        = $row['photo'] ;
            array_push($result, $h);
        }
             echo json_encode($result);
   }
 
 }else {
     echo json_encode($result);
     mysqli_close($conn);
 }
 
 ?>