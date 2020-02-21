<?php

if ($_SERVER['REQUEST_METHOD']=='GET') {

    require_once 'connect.php';

    $sql = "SELECT * FROM roommate JOIN user ON roommate.id_user = user.id";

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
            $h['note']       = $row['note'] ;
            $h['gender_roommate']        = $row['gender_roommate'] ;
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