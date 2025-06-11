<?php
include 'config.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM dokter_gigi WHERE id_dokter=$id");
$doctor = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $nama_dokter = $_POST['nama_dokter'];
    $foto_dokter = $doctor['foto_dokter'];
    $keterangan_dokter = $_POST['keterangan_dokter'];
    $no_dokter = $_POST['no_dokter'];
    $harga = $_POST['harga'];


    $target_dir = "profildokter/";
    if (!empty($_FILES["foto_dokter"]["name"])) {
        
        $target_file = $target_dir . basename($_FILES["foto_dokter"]["name"]);
    if (move_uploaded_file($_FILES["foto_dokter"]["tmp_name"], $target_file)) {
        $foto_dokter = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }

    $sql = "UPDATE dokter_gigi SET nama_dokter='$nama_dokter', keterangan_dokter='$keterangan_dokter', foto_dokter='$foto_dokter', harga='$harga', no_dokter='$no_dokter' WHERE id_dokter=$id";
    } else {
        $sql = "UPDATE dokter_gigi SET nama_dokter='$nama_dokter', keterangan_dokter='$keterangan_dokter', foto_dokter='$foto_dokter', harga='$harga', no_dokter='$no_dokter' WHERE id_dokter=$id";
    } 
    if ($conn->query($sql) === TRUE) {
        header("Location: listdokteradm.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
    <link rel="stylesheet" href="createdokter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <form method="post" enctype="multipart/form-data">
    <a href="listdokteradm.php" class="btn-kembali">Kembali</a>
        <br>
        Nama Dokter: <input type="text" name="nama_dokter" value="<?= $doctor['nama_dokter'] ?>" required><br>
        keterangan dokter: <input type="text" name="keterangan_dokter" value="<?= $doctor['keterangan_dokter'] ?>" required><br>
        Foto Dokter: <br>
        <img src="<?= htmlspecialchars($doctor['foto_dokter']) ?>" alt="Foto Dokter" style="max-width:150px;max-height:150px;"><br>
        <input type="file" name="foto_dokter"><br>
        no wa dokter: <input type="text" name="no_dokter" value="<?= $doctor['no_dokter'] ?>" required><br>
        biaya konsul: <input type="text" name="harga" value="<?= $doctor['harga'] ?>" required><br>
    <input type="submit" name="update" value="Update Dokter">
</form>