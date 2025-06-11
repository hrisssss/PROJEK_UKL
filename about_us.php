<?php
include 'config.php';
session_start();


if (isset($_SESSION['id_user'])) {
$id_user = $_SESSION['id_user'];
$cek = mysqli_query($conn, "SELECT COUNT(*) FROM mail WHERE id_user = $id_user AND status = 'belum_dibaca'");
$data = mysqli_fetch_row($cek);
$ada_notifikasi = $data[0] > 0; 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang kami</title>
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="beranda.css">
</head>
<body>

    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo">Dental Health</div>
            <div class="nav-links">
                <a href="beranda.php">Beranda</a>
                <a href="beranda.php">Artikel</a>
                <a href="beranda.php">Buat janji</a>
                <a href="about_us.html">About us</a>
            </div>
        </div>

        <div class="pesan">
               <?php if (isset( $ada_notifikasi )&& $ada_notifikasi): ?>
                <a class="mail-dot" href="pesanuser.php" ><img src="notifications_36dp_20B2AA;_FILL0_wght400_GRAD0_opsz40.svg" alt="">
                <?php else: ?>
                <a class="mail" href="pesanuser.php" ><img src="notifications_36dp_20B2AA;_FILL0_wght400_GRAD0_opsz40.svg" alt="">
        <?php endif;?>
        </div> 

        <div class="login_daftar">
            <?php if (!isset($_SESSION['id_user'])) 
            {

        ?>  
        
            <a class="btn daftar-btn" href="login.php">Login</a>
            <a class="btn daftar-btn" href="daftar.php">Daftar</a>
            <?php } else {
    
            ?>
                <a class="btn daftar-btn" href="profil.php">
                     <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#20B2AA;"><path d="M226-262q59-42.33 121.33-65.5 62.34-23.17 132.67-23.17 70.33 0 133 23.17T734.67-262q41-49.67 59.83-103.67T813.33-480q0-141-96.16-237.17Q621-813.33 480-813.33t-237.17 96.16Q146.67-621 146.67-480q0 60.33 19.16 114.33Q185-311.67 226-262Zm253.88-184.67q-58.21 0-98.05-39.95Q342-526.58 342-584.79t39.96-98.04q39.95-39.84 98.16-39.84 58.21 0 98.05 39.96Q618-642.75 618-584.54t-39.96 98.04q-39.95 39.83-98.16 39.83ZM480.31-80q-82.64 0-155.64-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.51T80-480.18q0-82.82 31.5-155.49 31.5-72.66 85.83-127Q251.67-817 324.51-848.5T480.18-880q82.82 0 155.49 31.5 72.66 31.5 127 85.83Q817-708.33 848.5-635.65 880-562.96 880-480.31q0 82.64-31.5 155.64-31.5 73-85.83 127.34Q708.33-143 635.65-111.5 562.96-80 480.31-80Zm-.31-66.67q54.33 0 105-15.83t97.67-52.17q-47-33.66-98-51.5Q533.67-284 480-284t-104.67 17.83q-51 17.84-98 51.5 47 36.34 97.67 52.17 50.67 15.83 105 15.83Zm0-366.66q31.33 0 51.33-20t20-51.34q0-31.33-20-51.33T480-656q-31.33 0-51.33 20t-20 51.33q0 31.34 20 51.34 20 20 51.33 20Zm0-71.34Zm0 369.34Z"/> </svg>
                </a>

        </div> <?php } ?>
        </nav>


    <div class="container">
        <div class="profile-card">
          <div class="profile-info">
            <h1>Dental Health</h1>
            <p>
              Website ini dibuat untuk masyarakat umum yang membutuhkan konsultasi tentang kesehatan atau masalah gigi kepada dokter gigi kami.
              Kami juga menyediakan artikel artikel seputar kesehatan gigi dan mulut yang dapat diakses secara gratis.
              Kami berkomitmen untuk memberikan informasi yang akurat dan bermanfaat bagi kesehatan gigi Anda.
              Jika anda memiliki pertanyaan atau ingin menjadwalkan konsultasi, <a href="https://wa.me/message/A7ALYZ23WH2AC1">silakan hubungi kami.</a> </p>
            </p>
            <a href="beranda.html" class="cta-button">Kembali ke Beranda</a>
          </div>
        </div>
      </div>

    <footer class="footer">
        <?php include 'footer.php'; ?>
    </footer>

</body>
</html>