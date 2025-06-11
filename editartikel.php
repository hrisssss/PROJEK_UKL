<?php
session_start();
include 'config.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM artikel WHERE id_artikel='$id'");

?>

<?php
while ($artikel = $result->fetch_assoc()) { ?>
<link rel="stylesheet" href="createdokter.css">
<form method="post" action="listartikel.php" enctype="multipart/form-data">
    <input type="hidden" name="id_artikel" value="<?= $artikel['id_artikel'] ?>" required><br>
    <a href="listartikel.php">Kembali</a><br>
    Judul Artikel: <input type="text" name="judul_artikel" value="<?= $artikel['judul_artikel'] ?>" required><br>
    Deskripsi Artikel: <input type="text" name="deskripsi_artikel" value="<?= $artikel['deskripsi_artikel'] ?>" required><br>
    gambar artikel: <input type="file" name="gambar_artikel" value="<?= $artikel['gambar_artikel'] ?>" required><br>
    tanggal: <input type="date" name="tanggal" value="<?= $artikel['tanggal'] ?>" required><br><br>
    Isi Artikel: <input type="text" name="isi_artikel" value="<?= $artikel['isi_artikel'] ?>" required><br>
    <input type="submit" name="update" value="Update Jadwal">
    </form>
<?php } ?>
