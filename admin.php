<?php
include 'config.php';
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
}

if ($_SESSION['nama'] !== 'admin') {
    echo '<script language="javascript">
    alert("Anda bukan admin!");
    document.location="beranda.php";
    </script>';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="admin-container">
        <h1 class="admin-title">Admin</h1>
        <div class="admin-links">
            <a href="listdokteradm.php" class="admin-link">List Dokter</a>
            <a href="listartikel.php" class="admin-link">List Artikel</a>
            <a href="pesanadmin.php" class="admin-link">List Pesan</a>
            <a href="listuser.php" class="admin-link">List User</a>
            <a href="listjadwal.php" class="admin-link">List Jadwal</a>
        </div>
        <div class="admin-bottom">
            <a href="profil.php" class="admin-link">Profil</a>
        </div>
    </div>
</body>
</html>