<?php
include 'config.php';

if (isset($_POST['create'])) {
    $nama_dokter = $_POST['nama_dokter'];
    $no_telp = $_POST['no_telp'];

    $sql = "INSERT INTO dokter_gigi (nama_dokter, no_telp) VALUES ('$nama_dokter', '$no_telp')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: readdokter.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form method="post">
    Nama Dokter: <input type="text" name="nama_dokter" required><br>
    No. Telepon: <input type="text" name="no_telp" required><br>
    <input type="submit" name="create" value="Tambah Dokter">
</form>