<?php
// Ensure you have a valid database connection
include 'connection.php'; // Include your database connection file


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
// Assuming the table name is 'your_table' and the column name is 'your_column'
$table = 'toggled';
$column = 'value';

// Decode the JSON data sent from the React component
$data = json_decode(file_get_contents("php://input"));

// Extract the value from the data
$value = $data->value;

try {
    // Update the database column
    $stmt = $con->prepare("UPDATE $table SET $column = ?");
    $stmt->bind_param('i', $value);
    $stmt->execute();

    // Return a success response to the client
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    // Return an error response to the client if there's an issue with the database update
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

// Close the prepared statement
$stmt->close();

// Close the MySQLi connection
$con->close();
?>
