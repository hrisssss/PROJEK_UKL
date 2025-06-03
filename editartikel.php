<?php
session_start();
include 'config.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM artikel WHERE id_artikel='$id'");

?>

<?php
while ($artikel = $result->fetch_assoc()) { ?>
    <form method="post" action="listartikel.php" enctype="multipart/form-data">
     <input type="hidden" name="id_artikel" value="<?= $artikel['id_artikel'] ?>" required><br>
    Judul Artikel: <input type="text" name="judul_artikel" value="<?= $artikel['judul_artikel'] ?>" required><br>
    Deskripsi Artikel: <input type="text" name="deskripsi_artikel" value="<?= $artikel['deskripsi_artikel'] ?>" required><br>
    gambar artikel: <input type="file" name="gambar_artikel" value="<?= $artikel['gambar_artikel'] ?>" required><br>
    Isi Artikel: <input type="text" name="isi_artikel" value="<?= $artikel['isi_artikel'] ?>" required><br>
    Tautan Artikel: <input type="text" name="tautan_artikel" value="<?= $artikel['tautan_artikel'] ?>" required><br>
    <input type="submit" name="update" value="Update Jadwal">
    </form>
<?php } ?>
