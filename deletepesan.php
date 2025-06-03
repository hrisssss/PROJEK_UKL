<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_mail = $_GET['id'];

    $sql = "DELETE FROM mail WHERE id_mail = $id_mail";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        header("Location: pesanadmin.php?message=Pesan berhasil dihapus");
        exit;
    } else {
        echo "Error menghapus pesan: " . $stmt->error;
    }
} else {
    echo "ID pesan tidak ditemukan.";
}
?>