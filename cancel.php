<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_jadwal_konsultasi = $_GET['id'];

    $sql = "UPDATE jadwal_konsultasi SET status_konsul = 'batal' WHERE id_jadwal_konsultasi = $id_jadwal_konsultasi";
    print_r($sql);
    if ($conn->query($sql)) {
        header("Location: formulirjdwl.php");
        exit;
    } else {
        echo "Error mengganti status: " . $stmt->error;
    }
} else {
    echo "ID jadwal tidak ada.";
}
?>