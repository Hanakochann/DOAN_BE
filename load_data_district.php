<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    require_once 'connect.php';

    $sql = "SELECT * FROM data_district JOIN data_city ON data_city.id = data_district.id_city";

    $response = mysqli_query($conn, $sql);

    while($h = mysqli_fetch_assoc($response)){
        $output[] = $h; 
    }
    echo json_encode($output);
    mysqli_close($conn);
}
 
 ?>