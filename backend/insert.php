<?php
include 'connection.php';

$apikey = $_GET['apikey'];

date_default_timezone_set('Asia/Jakarta');

if ($apikey === $key) {
    $jarak = $_GET['jarak'];
    

    $timestamp = date("Y-m-d H:i:s");

    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO tb_data (jarak, time) VALUES (?, ?)");
    $stmt->bind_param("is", $jarak, $timestamp);

    if ($stmt->execute()) {
        echo "Data berhasil dimasukkan";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Parameter tidak valid.";
}

$con->close();
?>
