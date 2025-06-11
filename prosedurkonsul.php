<?php
 include 'config.php';
session_start();

  $id_user = $_SESSION['id_user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="isi_footer.css">
    <title>prosedur konsultasi</title>
</head>
<body>
    <h1>Prosedur Konsultasi</h1>
    <p>Untuk melakukan konsultasi dengan dokter gigi di Dental Health, Anda dapat mengikuti langkah-langkah berikut:</p>
    <p>1. Silahkan mengisi formulir konsultasi melalui halaman <a href="Jadwal konsultasi.html">Jadwal Konsultasi</a>.</p>
    <p>2. Setelah mengisi formulir, masuk ke halaman list jadwal anda(jika memiliki jadwal jadwal lain sebelum nya)</p>
    <p>3. Jika belum mempunyai janji jadwal konsul sebelum nya, maka anda akan langsung masuk ke halaman formulir detail anda</p>
    
    <p>4. jika sudah masuk ke halaman detail formulir anda, anda diperlukan untuk meng schreenshoot halaman tersebut, lalu mengirimkan hasil screenshoot formulir tersebut ke WhatsApp dokter dengan memencet tombol mulai konsultasi.</p>
    <p>5. Anda diperlukan mengirim hasil screenshoot formulir kepada dokter. Sesudah mengirim formulir anda diminta untuk melakukan pembayaran kepada dokter sebelum bisa memulai konsultasi</p>
    <p>6. lalu dapat mengirimkan pertanyaan atau informasi yang ingin Anda diskusikan dengan dokter gigi.
    <p>7. batas waktu konsultasi anda adalah 30 menit 
    <p>7. Pastikan untuk memberikan informasi yang jelas dan lengkap agar dokter gigi dapat memberikan jawaban yang sesuai.</p>
    <p>8. Setelah mengirimkan pesan, tunggu balasan dari dokter gigi. Dokter akan memberikan jawaban atau informasi yang Anda butuhkan.</p>
    <p>9. Menyelesaikan konsultasi<p> 

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