<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];

    $sql = "DELETE FROM logins WHERE $id_user = id_user";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        header("Location: listuser.php?message=user berhasil dihapus");
        exit;
    } else {
        echo "Error menghapus pesan: " . $stmt->error;
    }
} else {
    echo "ID user tidak ada.";
}
?>