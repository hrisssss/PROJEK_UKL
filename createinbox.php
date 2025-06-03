<?php
include 'config.php';


if (isset($_POST['update'])) {
    $id_mail = $_POST['id_mail'];
    $judul = $_POST['judul_mail'];
    $isi = $_POST['isi_mail'];
    $id_user = $_POST['id_user'];

    $conn->query("UPDATE mail SET judul_mail='$judul', isi_mail='$isi', id_user='$id_user' WHERE id_mail='$id_mail'");
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];
    $isi_mail = $_POST['isi_mail'];
    $judul_mail = $_POST['judul_mail'];

    if (!$id_user || !$isi_mail || !$judul_mail) {
        echo "User ID, Judul, dan Isi pesan harus diisi.";
        exit;
    }

    $sql = "INSERT INTO mail (id_user, isi_mail, judul_mail) 
            VALUES ( '$id_user', '$isi_mail', '$judul_mail')";

    if ($conn->query($sql)) {
        echo "Pesan berhasil dikirim.";
        echo "<br><a href='pesanadmin.php'>Kembali ke Inbox</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    } else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Buat Pesan Inbox</title>
</head>
<body>
    <h2>Buat Pesan Inbox</h2>

    <form method="post" action="">
        <label for="id_user">ID User:</label><br>
        <input type="number" name="id_user" id="id_user" required><br><br>

        <label for="judul_mail">Judul Pesan:</label><br>
        <input type="text" name="judul_mail" id="judul_mail" required><br><br>

        <label for="isi_mail">Isi Pesan:</label><br>
        <textarea name="isi_mail" id="isi_mail" rows="5" required></textarea><br><br>

        <input type="submit" value="Kirim Pesan">
    </form>
</body>
</html>
<?php
}
?>
