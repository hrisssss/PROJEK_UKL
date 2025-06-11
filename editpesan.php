<?php
include 'config.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM mail WHERE id_mail='$id'");
$row = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_mail = $_POST['id_mail'];
    $judul_mail = $_POST['judul_mail'];
    $isi_mail = $_POST['isi_mail'];
    $status = $_POST['status'];



    $sql = "UPDATE mail 
            SET judul_mail='$judul_mail', isi_mail='$isi_mail', status='$status'
            WHERE id_mail='$id_mail'";

    if ($conn->query($sql) === TRUE) {
        header("Location: pesanadmin.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$mail = mysqli_query($conn, "SELECT * FROM mail");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inbox.css">
    <title>Edit Pesan</title>

</head>
<body>
    <a href="pesanadmin.php">kembali</a>
    <div class="form-container">
        <h2>Edit Pesan</h2>
        <form method="post">
            <input type="hidden" name="id_mail" value="<?= $row['id_mail'] ?>">

            <div class="form-group">
                <label>Judul mail:</label>
                <input type="text" name="judul_mail" value="<?= $row['judul_mail'] ?>" required>
            </div>

            <div class="form-group">
                <label>Isi mail:</label>
                <input type="text" name="isi_mail" value="<?= $row['isi_mail'] ?>" required>
            </div>

            <button type="submit">Update</button>

        </form>
    </div>
</body>
</html>
</html>
