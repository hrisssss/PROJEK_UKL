<?php
include 'config.php';
session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit;
}

$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM mail WHERE id_user = $id_user ORDER BY id_mail DESC";

    $result=$conn->query($sql);
    $sql= "UPDATE mail SET status = 'terbaca' WHERE id_user = $id_user";
    $conn->query($sql);
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
                    <th>Judul</th>
                    <th>Isi Pesan</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['judul_mail']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['isi_mail'])); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada pesan terbaru.</p>
    <?php endif; ?>
</body>
</html>