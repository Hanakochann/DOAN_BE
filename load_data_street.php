<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    require_once 'connect.php';

    $sql = "SELECT * FROM data_street JOIN data_district ON data_district.id = data_street.id_district";

    $response = mysqli_query($conn, $sql);

    while($h = mysqli_fetch_assoc($response)){
        $output[] = $h; 
    }
    echo json_encode($output);
    mysqli_close($conn);
}
 
 ?>