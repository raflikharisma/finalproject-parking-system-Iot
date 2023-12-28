<?php
include 'connection.php';


$table = 'toggled';
$column = 'value';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Retrieve the value from the database
    $result = $con->query("SELECT $column FROM $table LIMIT 1");
    $row = $result->fetch_assoc();
    $value = $row[$column];

    // Return the value as JSON
    header('Content-Type: application/json');
    echo json_encode($value);
}

