<?php
include 'config.php';
session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit;
}

$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM mail WHERE id_user = $id_user ORDER BY id_mail DESC";
$result = $conn->query($sql);

$sql_update = "UPDATE mail SET status = 'terbaca' WHERE id_user = $id_user";
$conn->query($sql_update);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesan Inbox</title>
    <link rel="stylesheet" type="text/css" href="pesan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="pesan-inbox">
    <a href="listdokteradm.php" class="btn-kembali">Kembali</a>
    <h1 class="ddr">Halo! <?php echo $_SESSION['nama']?></h1>

    <div class="inbox-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="message-box">
                    <div class="icon">
                        <img src="mail_24dp_75FBFD_FILL0_wght400_GRAD0_opsz24.png" alt="">
                    </div>
                    <div class="message-content">
                        <p class="message-title"><?php echo htmlspecialchars($row['judul_mail']); ?></p>
                        <p class="message-body"><?php echo nl2br(htmlspecialchars($row['isi_mail'])); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="no-message">Tidak ada pesan terbaru.</p>
        <?php endif; ?>
    </div>
</body>
</html>
