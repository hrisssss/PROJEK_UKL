<?php
include 'config.php';

if (isset($_POST['create'])) {
    $nama_dokter = $_POST['nama_dokter'];
    $keterangandktr = $_POST['keterangan_dokter'];
    $no_dokter = $_POST['no_dokter'];
    $harga = $_POST['harga'];
    

    $target_dir = "profildokter/";

    $target_file = $target_dir . basename($_FILES["foto_dokter"]["name"]);
    if (move_uploaded_file($_FILES["foto_dokter"]["tmp_name"], $target_file)) {
        $foto_dokter = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }

$sql = "INSERT INTO dokter_gigi (nama_dokter, keterangan_dokter, foto_dokter, no_dokter, harga) VALUES ('$nama_dokter', '$keterangandktr', '$foto_dokter', '$no_dokter', '$harga')";
    
    if ($conn->query($sql) === TRUE) {
                    header("Location: listdokteradm.php");
    } else {
        echo "Error: " . $conn->error;
    }
        }

?>
<html>
<head>
    <title>Tambah Dokter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="createdokter.css">
</html>
<body>
    <form method="post" enctype="multipart/form-data">
        <a href="listdokteradm.php">Kembali</a>
        <h2>Tambah Dokter</h2>

        <label for="nama_dokter">Nama Dokter:</label>
        <input type="text" name="nama_dokter" id="nama_dokter" required>

        <label for="keterangan_dokter">Keterangan Dokter:</label>
        <input type="text" name="keterangan_dokter" id="keterangan_dokter" required>

        <label for="foto_dokter">Foto Dokter:</label>
        <input type="file" name="foto_dokter" id="foto_dokter" required>
        
        <label for="no_dokter">No. Dokter (format: 62XXXXXXXXXX):</label>
        <input type="text" name="no_dokter" id="no_dokter"
       maxlength="15" pattern="62\d{8,13}" required>

        <label for="harga">Biaya Konsul:</label>
        <input type="text" name="harga" id="harga" required>

        <input type="submit" name="create" value="Tambah Dokter">
    </form>
</body>
