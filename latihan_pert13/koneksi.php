<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "DbMahasiswa";

$Open = new mysqli($host, $user, $password, $database);

if ($Open->connect_error) {
    die("Koneksi database gagal: " . $Open->connect_error);
}

$Open->set_charset("utf8mb4");
?>