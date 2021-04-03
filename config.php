<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$pass = "";
$database = "penjualan_buku";
$db = mysqli_connect($host, $user, $pass, $database);
if ($db->connect_error) {
    die('Koneksi Database Gagal : '.$db->connect_error);
}
?>