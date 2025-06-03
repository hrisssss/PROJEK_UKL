<?php
include 'config.php';
session_start();
if (!isset($_SESSION['id_dokter'])) {
    header("Location: login.php");
}

if ($_SESSION['nama'] === 'admin') {
    echo '<script language="javascript">
    alert("anda bukan dokter!");
    document.location="beranda.php";
    </script>';
}
?>