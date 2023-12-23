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

// Fetch data from the database
$sql = mysqli_query($con,"SELECT id, jarak FROM tb_data order by id DESC");
$data = mysqli_fetch_array($sql);
$value = $data['jarak'];
echo json_encode($value);


// Assuming id is the primary key
// $result = $con->query($sql);

// if ($result->num_rows > 0) {
//     // Output data as JSON
//     header('Content-Type: application/json');
//     $data = [];
//     while ($row = $result->fetch_assoc()) {
//         $data[] = $row;
//     }
//     echo json_encode($data);
// } else {
//     echo "No data found";
// }

$con->close();
?>

