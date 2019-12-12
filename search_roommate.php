<?php

if ($_SERVER['REQUEST_METHOD']=='GET') {

    $city_name = $_GET['city_name'];
    $district_name = $_GET['district_name'];
    $ward_name = $_GET['ward_name'];

    require_once 'connect.php';

    $sql = "SELECT * FROM roommate JOIN user ON roommate.id_user = user.id WHERE city_name='$city_name' AND district_name='$district_name' AND ward_name='$ward_name'";

    $response = mysqli_query($conn, $sql);

    $result = array();

    if( mysqli_num_rows($response) > 0) {
        
        while ($row = mysqli_fetch_assoc($response)) {
            
            $h['id']       = $row['id'] ;
            $h['id_user']       = $row['id_user'] ;
            $h['username']       = $row['username'] ;
            $h['hometown']       = $row['hometown'] ;
            $h['birthday']       = $row['birthday'] ;
            $h['gender']        = $row['gender'] ;
            $h['price']       = $row['price'] ;
            $h['img_user']       = $row['img_user'] ;
            $h['city_name']       = $row['city_name'] ;
            $h['district_name']       = $row['district_name'] ;
            $h['ward_name']       = $row['ward_name'] ;
            $h['street_name']       = $row['street_name'] ;
            $h['phone']       = $row['phone'] ;
            $h['gender_roommate']        = $row['gender_roommate'] ;
            $h['time_post']        = $row['time_post'] ;
            array_push($result, $h);
        }
             echo json_encode($result);
   }else{
    echo json_encode($result);
    mysqli_close($conn);
   }

 
 }else {
     echo json_encode($result);
     mysqli_close($conn);
 }
 
 ?>