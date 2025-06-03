<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_jadwal_konsultasi = $_GET['id'];

    $sql = "DELETE FROM jadwal_konsultasi WHERE id_jadwal_konsultasi = $id_jadwal_konsultasi";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        header("Location: listjadwal.php? message=data berhasil dihapus");
        exit;
    } else {
        echo "Error menghapus artikel: " . $stmt->error;
    }

} else {
    echo "ID artikel tidak ditemukan.";
}
?>