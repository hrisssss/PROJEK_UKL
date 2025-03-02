<?php
include 'config.php';
$id = $_GET['id'];

// Pastikan dokter tidak memiliki janji temu aktif
$check = $conn->query("SELECT * FROM jadwal_konsultasi WHERE id_dokter=$id");
if ($check->num_rows > 0) {
    echo "Dokter tidak dapat dihapus karena masih memiliki janji temu aktif!";
} else {
    $conn->query("DELETE FROM dokter_gigi WHERE id_dokter=$id");
    header("Location: readdokter.php");
}
?>