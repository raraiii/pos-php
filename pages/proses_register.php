<!-- components/register/process_register.php -->
<?php
require '../DBController.php';

// Ambil data dari formulir
$username = $_POST['username'];
$password = $_POST['password'];


// Enkripsi password
$query_sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";



if(mysqli_query($conn, $query_sql)) {
    header("Location: ../index.php");
} else{
    echo "Pendaftaran gagal. Silakan coba lagi." . mysqli_error($conn);
}

?>
