<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_tb_pirdas";


$con = new mysqli($host, $username, $password, $database);

if ($con->connect_error) {
    die("Koneksi gagal: " . $con->connect_error);
}

$con->set_charset("utf8");
?>
