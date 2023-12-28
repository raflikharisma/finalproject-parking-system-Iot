<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_tb_pirdas";

$key = "b88ace51-6059-4bee-a313-7a975ff0fa48";

$con = new mysqli($host, $username, $password, $database);

if ($con->connect_error) {
    die("Koneksi gagal: " . $con->connect_error);
}

$con->set_charset("utf8");
?>
