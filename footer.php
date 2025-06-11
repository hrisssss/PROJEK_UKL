<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="footer.css">
    <title>Footer</title>
</head>
<body class="footer-body">
    <footer class="footer">
       <div class="footer-grid">
            <div class="footer-section">
                <h3>Kontak</h3>
                <p>Telepon: (62) 857-0711-6496</p>
                <p>Email: dentalhealth@gmail.com</p>
                <p>Alamat: Jl. Pecantingan, Sekardangan Indah, Sekardangan, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61215 </p>
            </div>
            <div class="footer-section">
                <h3>FAQ</h3>
                <a class="tombol" href="beranda.php">Beranda</a>
                <a class="tombol" href="jamoperasional.php">Jam Operasional</a>
                <a class="tombol" href="biayakonsul.php">Biaya Konsultasi</a>
                <a class="tombol" href="prosedurkonsul.php">Prosedur Konsultasi</a>
                <a class="tombol" href="https://wa.me/message/A7ALYZ23WH2AC1">Hubungi Kami</a>
                <?php if (isset($_SESSION['id_user'])) 
            {
                ?><a class="tombol "href="formulirjdwl.php">Cek riwayat formulir</a>
                <?php } ?>
            </div>
            <div class="footer-section">
                <h3>LOKASI KITA</h3>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.9871065035777!2d112.72276627442814!3d-7.466674473603685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e6d71181af21%3A0x4232ab0204ccbfe5!2sSMK%20TELKOM%20Sidoarjo!5e0!3m2!1sen!2sid!4v1749368055355!5m2!1sen!2sid" width="330" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
        </div>
        <p class="copyright" style="color:white;">&copy; 2025 Dental Health. All rights reserved.</p>
</footer>
</body>
</html>