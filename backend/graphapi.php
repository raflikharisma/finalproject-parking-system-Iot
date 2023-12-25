<?php

include 'connection.php';
header('Content-Type: application/json');

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}
// Set the character set to UTF-8
$con->set_charset("utf8");

// Fetch data from the database (replace with your actual table and column names)
$query = "SELECT jarak, time FROM tb_data";
$result = $con->query($query);

// Fetch the data as an associative array
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$con->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
