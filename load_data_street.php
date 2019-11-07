<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id = $_POST['id'];
    
    require_once 'connect.php';

    $sql = "SELECT street_name FROM data_street WHERE id_district IN 
    (SELECT id FROM data_district WHERE id = '$id')";

    $response = mysqli_query($conn, $sql);

    while($h = mysqli_fetch_assoc($response)){
        $output[] = $h; 
    }
    echo json_encode($output);
    mysqli_close($conn);
}
 
 ?>