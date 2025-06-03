<link rel="stylesheet" href="Kondsul dan jadwal.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat jadwal Konsultasi</title>

    <link rel="stylesheet" href="Konsul dan jadwal.css">
    <link rel="stylesheet" href="full.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>

<?php
include 'config.php';

session_start();
if (!isset($_SESSION['id_user'])) {
    echo '<script>alert("Silahkan login atau daftar terlebih dahulu untuk menggunakan fitur ini");</script>';
    echo '<script>window.location.href = "daftar.php?url=jadwal_konsultasi";</script>';
}

$sql = "SELECT id_dokter, nama_dokter, foto_dokter, keterangan_dokter, keaktifan FROM dokter_gigi";
$result = $conn->query($sql)

?>

<form method="post" enctype="multipart/form-data" action="jadwaldone.php" style="border: solid 1px black;"> 
    Nama Anda <input type="text" name="nama_pasien" required><br>
    keluhan: <input type="text" name="keluhan" required><br>
    No Whatsapp: <input type="text" name="no_wa_pasien" required><br>

            <?php while ($row = $result->fetch_assoc()) { ?>
        <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
        <h3><?= $row["nama_dokter"] ?></h3>
        <p style="max-width: 140px;"><?= $row["keterangan_dokter"] ?></p>
            <label for="id_dokter">      
        <div style="position: relative; display: inline-block;">
            <div <?php if ($row['keaktifan'] == "non_aktif") echo 'style =" z-index:100; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(34, 33, 33, 0.76);"'; ?> ></div>              
            <img src="<?= $row["foto_dokter"]  ?>" width="150" height="150" <?php if ($row['keaktifan'] == "non_aktif") echo 'style="background-color: rgba(0, 0, 0, 2);"'; ?>><br>
        </div> 
            </label>
            <br>
                <input type="radio" id="id_dokter" name="id_dokter" value="<?= $row['id_dokter'] ?>" <?php if ($row['keaktifan'] == "non_aktif") echo 'disabled'; ?> >
        <?php } ?> 

    <h2>Tentukan Tanggal nya</h2>
    <input type="date" name="tanggal_konsul" required><br>
    <input type="submit" name="update" value="Buat jadwal">
</form>

    <footer class="footer" id="kontak">
        <div class="footer-grid">
            <div class="footer-section">
                <h3>Kontak</h3>
                <p>Telepon: (62) 857-0757-4883 </p>
                <p>Email: info@gigidanmulut sehat.com</p>
                <p>Alamat: Jl. Pecantingan, Sekardangan Indah, Sekardangan, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61215 </p>
            </div>
            <div class="footer-section">
                <h3>FAQ</h3>
                <a href="#">Jam Operasional</a>
                <a href="#">Biaya Konsultasi</a>
                <a href="#">Prosedur Perawatan</a>
                <a href="#">Metode Pembayaran</a>
            </div>
            <div class="footer-section">
                <h3>LOKASI KITA</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.987058371959!2d112.72276627500177!3d-7.4666797925449115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e6d71181af21%3A0x4232ab0204ccbfe5!2sSMK%20TELKOM%20Sidoarjo!5e0!3m2!1sen!2sid!4v1731633601856!5m2!1sen!2sid" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </footer>
</body>
</html>
