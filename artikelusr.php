<?php
include 'config.php';
session_start();
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
}
$id_artikel = $_GET['id'];


$query = mysqli_query($conn, "SELECT * FROM artikel WHERE id_artikel = $id_artikel");
$artikel = mysqli_fetch_assoc($query);

if ($artikel) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $artikel['judul_artikel']; ?></title>
    <link rel="stylesheet" href="Artikel.css">
</head>
<body>
    <h1 class="inti"><?php echo $artikel['judul_artikel']; ?></h1>
    <img src="<?php echo $artikel['gambar_artikel']; ?>" alt="Gambar Artikel">
    <p class="inti"><?php echo date('d F Y', strtotime($artikel['tanggal'])); ?></p>
    <p class="inti"><?php echo nl2br($artikel['isi_artikel']); ?></p>
    <div class="back-container">
        <a class="back" href="beranda.php">Kembali</a>
    </div>
</body>
</html>
<?php
} else {
    echo "Artikel tidak ditemukan.";
}
?>
    <footer class="footer">
        <?php include 'footer.php'; ?>
    </footer>