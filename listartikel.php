<?php
include 'config.php';
session_start();
if (isset($_POST['update'])){
    $id_artikel = $_POST['id_artikel'];
    $judul_artikel = $_POST['judul_artikel'];
    $deskripsi_artikel = $_POST['deskripsi_artikel'];
    $isi_artikel = $_POST['isi_artikel'];

    $target_dir = "artikel_foto/";
    print_r (basename($_FILES["gambar_artikel"]["name"]));
    $target_file = $target_dir . basename($_FILES["gambar_artikel"]["name"]);
    if (move_uploaded_file($_FILES["gambar_artikel"]["tmp_name"], $target_file)) {
        $gambar_artikel = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }

    $sql = "UPDATE artikel SET judul_artikel='$judul_artikel', deskripsi_artikel='$deskripsi_artikel', gambar_artikel='$gambar_artikel', isi_artikel='$isi_artikel' WHERE id_artikel='$id_artikel'";
    
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
    <link rel="stylesheet" type="text/css" href="pesan.css">
</head>
<body>
    <h2>List artikel</h2>
    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>id artikel</th>
                    <th>judul artikel</th>
                    <th>deskripsi artikel</th>
                    <th>gambar artikel</th>
                    <th>isi artikel</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id_artikel']) ?></td>
                    <td><?= htmlspecialchars($row['judul_artikel']) ?></td>
                    <td><?= htmlspecialchars($row['deskripsi_artikel']) ?></td>
                        <td>
                        <img src="<?= $row["gambar_artikel"] ?>" width="150" height="150"><br>
                        </td>
                        <td><p><?= htmlspecialchars($row['isi_artikel']) ?></td>
                        <td>
                        <a href="editartikel.php?id=<?php echo $row['id_artikel']; ?>">Edit</a> |
                        <a href="deleteartikel.php?id=<?php echo $row['id_artikel']; ?>" onclick="return confirm('Yakin ingin menghapus artikel ini?');">Hapus</a>
                        </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada artikel baru.</p>
    <?php endif; ?>

    <p><a href="createartikel.php">Buat Artikel baru</a></p>
    <a href="admin.php">Kembali</a>
</body>
</html>