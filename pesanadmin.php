<?php
include 'config.php';

$sql = "SELECT * FROM mail ORDER BY id_mail DESC";

    $result=$conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesan Inbox</title>
    <link rel="stylesheet" type="text/css" href="pesan.css">
</head>
<body>
    <h2>Pesan Inbox</h2>
    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID Pesan</th>
                    <th>ID_USER</th>
                    <th>Judul</th>
                    <th>Isi Pesan</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id_mail']); ?></td>
                    <td><?php echo htmlspecialchars($row['id_user']); ?></td>
                    <td><?php echo htmlspecialchars($row['judul_mail']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['isi_mail'])); ?></td>
                    <td>
                        <a href="editpesan.php?id=<?php echo $row['id_mail']; ?>">Edit</a> |
                        <a href="deletepesan.php?id=<?php echo $row['id_mail']; ?>" onclick="return confirm('Yakin ingin menghapus pesan ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada pesan inbox.</p>
    <?php endif; ?>

    <p><a href="createinbox.php">Buat Pesan Baru</a></p>
        <a href="admin.php">Kembali</a>

</body>
</html>