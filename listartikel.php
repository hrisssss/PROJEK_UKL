<?php
include 'config.php';
session_start();
if (isset($_POST['update'])){
    $id_artikel = $_POST['id_artikel'];
    $judul_artikel = $_POST['judul_artikel'];
    $gambar_artikel = $_FILES['gambar_artikel'];
    $deskripsi_artikel = $_POST['deskripsi_artikel'];
    $isi_artikel = $_POST['isi_artikel'];
    $tanggal = $_POST['tanggal'];

    if (!empty($_FILES["gambar_artikel"]["name"])) {
        $target_dir = "artikel_foto/";
        $target_file = $target_dir . basename($_FILES["gambar_artikel"]["name"]);
        if (move_uploaded_file($_FILES["gambar_artikel"]["tmp_name"], $target_file)) {
            $gambar_artikel = $target_file;
            $sql = "UPDATE artikel SET judul_artikel='$judul_artikel', deskripsi_artikel='$deskripsi_artikel', gambar_artikel='$gambar_artikel', isi_artikel='$isi_artikel', tanggal='$tanggal' WHERE id_artikel='$id_artikel'";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        $sql = "UPDATE artikel SET judul_artikel='$judul_artikel', deskripsi_artikel='$deskripsi_artikel', gambar_artikel='$gambar_artikel', isi_artikel='$isi_artikel', tanggal='$tanggal' WHERE id_artikel='$id_artikel'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: listartikel.php?message=Artikel berhasil diperbarui");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql = "SELECT * FROM artikel";

    $result=$conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>listartikel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listartikel.css">
</head>
<body>

    <p><a href="createartikel.php">Buat Artikel baru</a></p>
    <br>
    <a href="admin.php">Kembali</a>
<div class="container">
    <h2>List artikel</h2>
    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Id artikel</th>
                    <th>Judul artikel</th>
                    <th>Deskripsi artikel</th>
                    <th>Gambar artikel</th>
                    <th>Isi artikel</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($row['id_artikel']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($row['judul_artikel']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($row['deskripsi_artikel']) ?>
                    </td>
                    <td>
                        <img src="<?= $row["gambar_artikel"] ?>" width="150" height="150"><br>
                    </td>
                    <td>
                        <p><?= htmlspecialchars($row['isi_artikel']) ?>
                    </td>
                    <td>
                        <p><?= htmlspecialchars($row['tanggal']) ?></p>
                    </td>
                    <td>
                        <a href="editartikel.php?id=<?php echo $row['id_artikel']; ?>">Edit</a> |
                        <br>
                        <br>
                        <br>
                        <a href="deleteartikel.php?id=<?php echo $row['id_artikel']; ?>" onclick="return confirm('Yakin ingin menghapus artikel ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada artikel baru.</p>
    <?php endif; ?>
    <br>
    </div>
</body>
</html>