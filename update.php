<?php
include 'config.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM jadwal_konsultasi WHERE id_jadwal_konsultasi='$id'")->fetch_assoc();

if (isset($_POST['update'])) {
    $id_dokter = $_POST['id_dokter'];
    $tanggal_konsul = $_POST['tanggal_konsul'];
    $sql = "UPDATE jadwal_konsultasi SET id_dokter='$id_dokter', tanggal_konsul='$tanggal_konsul' WHERE id_jadwal_konsultasi='$id'";
    $conn->query($sql);
    header("Location: index.php");
}
?>

<form method="post">
    ID Dokter: <input type="text" name="id_dokter" value="<?= $data['id_dokter'] ?>"><br>
    Tanggal: <input type="date" name="tanggal_konsul" value="<?= $data['tanggal_konsul'] ?>"><br>
    <input type="submit" name="update" value="Update Janji">
</form>
