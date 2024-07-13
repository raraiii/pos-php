<!-- components/barang/proses_tambah_barang.php -->
<?php
session_start();

// Include file koneksi ke database
include_once("../../DBController.php");

// Ambil data dari formulir
$nama_barang = $_POST['nama_barang'];
$harga_barang = $_POST['harga_barang'];

// Proses upload gambar
$target_dir = "../../uploadgit inits/"; // Direktori tempat menyimpan gambar
$target_file = $target_dir . basename($_FILES["gambar_barang"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["gambar_barang"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["gambar_barang"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["gambar_barang"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["gambar_barang"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Simpan informasi barang ke dalam database jika upload gambar berhasil
if ($uploadOk == 1) {
    // Query untuk memasukkan data barang ke dalam tabel
    $sql = "INSERT INTO barang (nama_barang, harga_barang, gambar_barang) VALUES ('$nama_barang', '$harga_barang', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "Data barang berhasil dimasukkan ke dalam database.";
        // Redirect atau tampilkan pesan sukses
        header("Location: tambah_barang.php?status=success");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>
