<?php
include 'config.php';
$id = $_GET['id'];
$conn->query("DELETE FROM jadwal_konsultasi WHERE id_jadwal_konsultasi='$id'");
header("Location: index.php");
?>
