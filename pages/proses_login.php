<!-- components/register/process_register.php -->
<?php
require '../DBController.php';

// Include file koneksi ke database

// Ambil data dari formulir
$username = $_POST['username'];
$password = $_POST['password'];

// Enkripsi password

// Query untuk memeriksa apakah username sudah ada
$query_sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    // Username sudah ada
    header("Location: ../index.php");
} else {
    echo"<center><h1>Login gagal. Coba lagi.</h1>
    <button><strong><a href='loginPage.php'>Kembali</a></strong></button>";
}

// Tutup koneksi

?>
