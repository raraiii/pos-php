<!-- components/barang/tambah_barang.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Barang</h2>
        <form action="proses_tambah_barang.php" method="post" enctype="multipart/form-data" class="mt-4">
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>
            <div class="form-group">
                <label for="harga_barang">Harga Barang:</label>
                <input type="number" class="form-control" id="harga_barang" name="harga_barang" required>
            </div>
            <div class="form-group">
                <label for="gambar_barang">Gambar Barang:</label>
                <input type="file" class="form-control-file" id="gambar_barang" name="gambar_barang" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Barang</button>
        </form>
    </div>
</body>
</html>
