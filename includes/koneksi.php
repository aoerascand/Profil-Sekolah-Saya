<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "db_profil";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    error_log("Koneksi database gagal: " . mysqli_connect_error());
    die("Koneksi database gagal, silakan coba lagi nanti.");
}
?>
