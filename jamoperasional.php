<?php
 include 'config.php';
session_start();

  $id_user = $_SESSION['id_user'];

?>


</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biaya Konsultasi</title>
    <link rel="stylesheet" href="isi_footer.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
      <h1>
        Jam Operasional
    </h1>
    <br>
    <p>
        Dental Health buka setiap hari kecuali hari libur nasional. 
        Berikut adalah jam operasional Dental Health: 09.00 - 19.30.
    </p>
    <br>
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
                <a href="beranda.php">Beranda</a>
                <a href="jamoperasional.php">Jam Operasional</a>
                <a href="biayakonsul.php">Biaya Konsultasi</a>
                <a href="prosedurkonsul.php">Prosedur Konsultasi</a>
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