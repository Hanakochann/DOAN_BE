<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    require_once 'connect.php';

    $sql = "SELECT * FROM district JOIN province ON province.id = district._province_id";

    $response = mysqli_query($conn, $sql);

    while($h = mysqli_fetch_assoc($response)){
        $output[] = $h; 
    }
    echo json_encode($output);
    mysqli_close($conn);
}
 
 ?>