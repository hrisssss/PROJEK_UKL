<?php
include 'config.php';
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
}

if ($_SESSION['nama'] !== 'admin') {
    echo '<script language="javascript">
    alert("anda bukan admin!");
    document.location="beranda.php";
    </script>';
}


?>
<h1>admin</h1>
<a href="listdokteradm.php">List Dokter</a><br>
<a href="listartikel.php">List Artikel</a><br>
<a href="pesanadmin.php">List Pesan</a><br>
<a href="listuser.php">List User</a><br>
<a href="listjadwal.php">List Jadwal</a><br>
<br>
<br>
<a href="profil.php">Profil</a><br>
