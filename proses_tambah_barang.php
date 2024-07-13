<?php
// Pastikan data yang diterima dari formulir tidak kosong
if (isset($_POST['nama_barang']) && isset($_POST['harga_barang'])) {
    // Ambil data dari formulir
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];

    // Hubungkan ke database
    $conn = new mysqli("localhost", "username", "password", "penjualan");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk menambahkan barang ke dalam database
    $sql = "INSERT INTO barang (nama_barang, harga_barang) VALUES ('$nama_barang', '$harga_barang')";

    if ($conn->query($sql) === TRUE) {
        // Jika berhasil ditambahkan, kembalikan ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Jika tidak ada data yang diterima, kembalikan ke halaman utama
    header("Location: index.php");
    exit();
}
?>
