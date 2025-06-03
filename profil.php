<?php
include 'config.php';
session_start();


if (isset($_POST['logout'])) {
    session_destroy();
                echo '<script>alert("Apakah Anda Yakin Untuk Logout?.");</script>';
    header('Location: beranda.php');
    }

if (!isset($_SESSION['id_user'])) {
    header('Location: beranda.php');
    exit;
}
   $sql = "SELECT * FROM logins WHERE id_user = '".$_SESSION['id_user']."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Akun Anda</title>
    <link rel="stylesheet" type="text/css" href="pesan.css">
</head>
<body>
    <h2>Data Akun Anda</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['passwod'])); ?></td>
                    <form METHOD="POST">
                        <input type="submit" name="logout" value='Logout'> 
                    </form>
                    </tr>
            </tbody>
        </table>
</body>
</html>