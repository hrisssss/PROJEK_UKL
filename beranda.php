<?php
include 'config.php';
session_start();
?>
<?php date_default_timezone_set('Asia/Jakarta'); $jam_sekarang = date("H"); 
$fitur_aktif = ($jam_sekarang >= 8 && $jam_sekarang < 24); ?>

<?php
if (isset($_SESSION['id_user'])) {
$id_user = $_SESSION['id_user'];
$cek = mysqli_query($conn, "SELECT COUNT(*) FROM mail WHERE id_user = $id_user AND status = 'belum dibaca'");
$data = mysqli_fetch_row($cek);
$ada_notifikasi = $data[0] > 0; 
}


    $sql = "SELECT * FROM artikel";

    $result=$conn->query($sql);

?>

    
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Health</title>
    <link rel="stylesheet" href="beranda.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="pesan.css">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo">Dental Health</div>
            <div class="nav-links">
                <a href="#Beranda">Beranda</a>
                <a href="#artikel">Artikel</a>
                <a href="#Konsultasi">Buat janji</a>
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
                     <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#20B2AA;"><path d="M226-262q59-42.33 121.33-65.5 62.34-23.17 132.67-23.17 70.33 0 133 23.17T734.67-262q41-49.67 59.83-103.67T813.33-480q0-141-96.16-237.17Q621-813.33 480-813.33t-237.17 96.16Q146.67-621 146.67-480q0 60.33 19.16 114.33Q185-311.67 226-262Zm253.88-184.67q-58.21 0-98.05-39.95Q342-526.58 342-584.79t39.96-98.04q39.95-39.84 98.16-39.84 58.21 0 98.05 39.96Q618-642.75 618-584.54t-39.96 98.04q-39.95 39.83-98.16 39.83ZM480.31-80q-82.64 0-155.64-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.51T80-480.18q0-82.82 31.5-155.49 31.5-72.66 85.83-127Q251.67-817 324.51-848.5T480.18-880q82.82 0 155.49 31.5 72.66 31.5 127 85.83Q817-708.33 848.5-635.65 880-562.96 880-480.31q0 82.64-31.5 155.64-31.5 73-85.83 127.34Q708.33-143 635.65-111.5 562.96-80 480.31-80Zm-.31-66.67q54.33 0 105-15.83t97.67-52.17q-47-33.66-98-51.5Q533.67-284 480-284t-104.67 17.83q-51 17.84-98 51.5 47 36.34 97.67 52.17 50.67 15.83 105 15.83Zm0-366.66q31.33 0 51.33-20t20-51.34q0-31.33-20-51.33T480-656q-31.33 0-51.33 20t-20 51.33q0 31.34 20 51.34 20 20 51.33 20Zm0-71.34Zm0 369.34Z"/>
                        </svg></a>

        </div> <?php } ?>
        </nav>

    <div class="cta-background">
        <div class="hero-content">
            <h1>Senyum Sehat, Hidup Bahagia</h1>
            <p>Kami hadir untuk memberikan layanan <br> konsultasi kesehatan gigi dengan dokter gigi yang berpengalaman dan profesional </p>
            <a href="#Konsultasi" class="cta-button">Buat Janji Sekarang</a>
        </div>
    </div>

    <section class="articles">
        <h2 class="section-title">Artikel Kesehatan Gigi</h2>
        <div class="articles-grid">
            <?php
            foreach ($result as $key => $value) 
            {                            
            ?>
            <div class="article-card">
            <img src="<?php echo $value['gambar_artikel']; ?>" alt="Gambar Artikel" class="article-image">
                <div class="article-content">
                    <h3><?php echo $value['judul_artikel']; ?></h3>
                    <p><?php echo $value['deskripsi_artikel']; ?></p>
                    <a href="artikelusr.php?id=<?php echo $value['id_artikel']; ?>"class="read-more">Baca lebih lanjut</a>
                </div>
            </div>
            <?php 
            }
            ?>
            
        </div>
    </section>
    
    <div class="container_konsultasi" id="Konsultasi">
        <div class="content_konsultasi">
            <h1>Ayo pilih dokter gigi <br >untuk menjadi konsultan mu &#128525</h1>
                <p>Di kesempatan emas ini, mulailah konsultasi dengan para dokter yang berpengalaman <br> agar kamu bisa mengetahui jalan untuk menjaga kesehatan gigi dan mulut dengan baik dan <br> benar berdasarkan dari pesan pesan dokter kami &#128513 <br></p>
            <?php if ($fitur_aktif): ?> 
                <a class="button" href="jadwal_konsultasi.php">Konsultasi</a>
             <?php else: ?>
             <p>Fitur konsultasi hanya tersedia antara jam 08.00 hingga 19.00</p> <?php endif; ?>
        </div>
        <img src="photo-1584516150909-c43483ee7932.jpeg" alt="" class="image_konsultasi">
    </div>
    

    
 
    <footer class="footer" id="kontak">
        <div class="footer-grid">
            <div class="footer-section">
                <h3>Kontak</h3>
                <p>Telepon: (62) 857-0711-6496</p>
                <p>Email: dentalhealth@gmail.com</p>
                <p>Alamat: Jl. Pecantingan, Sekardangan Indah, Sekardangan, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61215 </p>
            </div>
            <div class="footer-section">
                <h3>FAQ</h3>
                <a href="jamoperasional.html">Jam Operasional</a>
                <a href="biayakonsul.html">Biaya Konsultasi</a>
                <a href="#">Prosedur Konsultasi</a>
                <a href="https://wa.me/message/A7ALYZ23WH2AC1">Hubungi Kami</a>
                <?php if (isset($_SESSION['id_user'])) 
            {
                ?><a href="formulirjdwl.php">Cek riwayat formulir</a>
                <?php } ?>
            </div>
            <div class="footer-section">
                <h3>LOKASI KITA</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.987058371959!2d112.72276627500177!3d-7.4666797925449115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e6d71181af21%3A0x4232ab0204ccbfe5!2sSMK%20TELKOM%20Sidoarjo!5e0!3m2!1sen!2sid!4v1731633601856!5m2!1sen!2sid" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <p echo style="color:white;";>&copy; 2025 Dental Health. All rights reserved.</small></p>
    </footer>
</body>
</html>


