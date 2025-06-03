<?php
include 'config.php';


$id_artikel = $_GET['id'];


$query = mysqli_query($conn, "SELECT * FROM artikel WHERE id_artikel = $id_artikel");
$artikel = mysqli_fetch_assoc($query);

if ($artikel) {
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $artikel['judul_artikel']; ?></title>
</head>
<body>
    <h1><?php echo $artikel['judul_artikel']; ?></h1>
    <img src="<?php echo $artikel['gambar_artikel']; ?>" alt="Gambar Artikel" style="width : 700px; height : 200px; object-fit: cover;">
    <p><?php echo nl2br($artikel['isi_artikel']); ?></p>
</body>
</html>
<?php
} else {
    echo "Artikel tidak ditemukan.";
}
?>