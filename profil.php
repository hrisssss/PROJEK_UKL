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

if (!$row) {
    echo '<script>alert("Data akun tidak ditemukan.");</script>';
    header('Location: beranda.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Akun Anda - Klinik Gigi Sehat</title>
    <link rel="stylesheet" href="profil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="dental-account">
        <div class="account-header">
            <h2><span>🦷</span> Data Akun Anda</h2>
            <p class="logo">DENTAL<br>HEALTH</p>
        </div>
        
        <div class="account-content">
            <div class="account-details">
                <div class="detail-row">
                    <div class="detail-label">Username:</div>
                    <div class="detail-value"><?php echo htmlspecialchars($row['nama']); ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">Password:</div>
                    <div class="detail-value"><?php echo htmlspecialchars($row['passwod']); ?></div>
                </div>
            </div>
            
            <div class="account-actions">

                    <form method="POST" onsubmit="return confirm('Apakah Anda yakin ingin logout?');">
                        <input type="submit" class="logout-btn" name="logout" value="Logout">
                    </form>
                
                <a href="formulirjdwl.php?id=<?php echo $row['id_user']; ?>" class="form-link">Cek Riwayat Formulir</a>

                <a class="form-back" href="beranda.php"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    
    </div>
</body>
</html>