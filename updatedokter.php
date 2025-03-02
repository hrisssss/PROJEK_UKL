<?php
include 'config.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM dokter_gigi WHERE id_dokter=$id");
$doctor = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $nama_dokter = $_POST['nama_dokter'];
    $no_telp = $_POST['no_telp'];

    $sql = "UPDATE dokter_gigi SET nama_dokter='$nama_dokter', no_telp='$no_telp' WHERE id_dokter=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: readdokter.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="post">
    Nama Dokter: <input type="text" name="nama_dokter" value="<?= $doctor['nama_dokter'] ?>" required><br>
    No. Telepon: <input type="text" name="no_telp" value="<?= $doctor['no_telp'] ?>" required><br>
    <input type="submit" name="update" value="Update Dokter">
</form>
