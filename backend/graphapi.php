<?php

include 'connection.php';
header('Content-Type: application/json');

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    
}


if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

$con->set_charset("utf8");

$query = "SELECT jarak, time FROM tb_data";
$result = $con->query($query);


$data = array();
while ($row = $result->fetch_assoc()) {
    // Format timestamp to display only clock time
    $formattedTime = date("H:i", strtotime($row['time']));
    
    $data[] = array(
        'jarak' => $row['jarak'],
        'time' => $formattedTime
    );
}

$con->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
