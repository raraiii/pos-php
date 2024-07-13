<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Selamat Datang di Aplikasi Kami</h1>

        <?php
        if (isset($_SESSION['username'])) {
            echo "<p>Selamat datang, " . $_SESSION['username'] . "!</p>";
            echo "<a href='components/login/logout.php' class='btn btn-danger'>Logout</a>";
            echo "<a href='components/barang/tambah_barang.php' class='btn btn-success ml-2'>Tambah Barang</a>";
        } else {
            echo "<a href='pages/registerPage.php' class='btn btn-primary mr-2'>Daftar</a>";
            echo "<a href='pages/loginPage.php' class='btn btn-primary mr-2'>Login</a>";
            echo "<a href='pages/barang/tambah_barang.php' class='btn btn-primary'>Tambah Barang</a>";
        }
        ?>

        <h2 class="mt-5">Daftar Barang</h2>
        <div class="row">
            <?php
            // Include file koneksi ke database
            include_once("DBController.php");

            // Query untuk mengambil data barang dari database
            $sql = "SELECT nama_barang, harga_barang, gambar_barang FROM barang";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Tampilkan data barang
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mt-4">';
                    echo '<div class="card">';
                    echo '<img src="' . substr($row['gambar_barang'], 6) . '" class="card-img-top" alt="' . $row['nama_barang'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['nama_barang'] . '</h5>';
                    echo '<p class="card-text">Harga: Rp' . number_format($row['harga_barang'], 0, ',', '.') . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Tidak ada barang tersedia.</p>";
            }

            // Tutup koneksi
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
