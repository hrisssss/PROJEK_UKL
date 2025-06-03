<?php
session_start();
include 'config.php';


$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM logins ORDER BY id_user DESC";

    $result=$conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>List User</title>
    <link rel="stylesheet" type="text/css" href="pesan.css">
</head>
<body>
    <h2>Pesan Inbox</h2>
    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID_USER</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id_user']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['nama'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['passwod'])); ?></td>
                    <td>
                        <a href="edituser.php?id=<?php echo $row['id_user']; ?>">Edit</a> |
                        <a href="deleteuser.php?id=<?php echo $row['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus user ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada user baru.</p>
    <?php endif; ?>

    <a href="admin.php">Kembali</a>

</body>
</html>