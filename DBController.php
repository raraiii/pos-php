<?php
// Konfigurasi koneksi ke database
$servername = "localhost";
$dbname = "penjualan";
$username = "root";
$password = "";
$dbname = "penjualan";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


?>
