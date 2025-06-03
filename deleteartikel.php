<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_artikel = $_GET['id'];

    $sql = "DELETE FROM artikel WHERE id_artikel = $id_artikel";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        header("Location: listartikel.php? message=data berhasil dihapus");
        exit;
    } else {
        echo "Error menghapus artikel: " . $stmt->error;
    }

} else {
    echo "ID artikel tidak ditemukan.";
}


?>