<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    require_once 'connect.php';

    $sql = "SELECT * FROM ward JOIN district ON district.id = ward._district_id";

    $response = mysqli_query($conn, $sql);

    while($h = mysqli_fetch_assoc($response)){
        $output[] = $h; 
    }
    echo json_encode($output);
    mysqli_close($conn);
}
 
 ?>