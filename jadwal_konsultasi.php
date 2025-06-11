<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat jadwal Konsultasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="jadwal.css">
</head>
<body>

<?php
include 'config.php';

session_start();
if (!isset($_SESSION['id_user'])) {
    echo '<script>alert("Silahkan login atau daftar terlebih dahulu untuk menggunakan fitur ini");</script>';
    echo '<script>window.location.href = "daftar.php?url=jadwal_konsultasi";</script>';
}

$sql = "SELECT id_dokter, nama_dokter, foto_dokter, keterangan_dokter, keaktifan, harga FROM dokter_gigi";
$result = $conn->query($sql)

?>
    <form method="post" enctype="multipart/form-data" action="jadwaldone.php">
        <h1>Buat data konsultasi</h1>
        <input type="text" name="nama_pasien" placeholder="Nama" required>
        <h2>Tanggal lahir</h2>
        <input type="date" name="tanggal_lahir" required>
        <input type="text" name="no_wa_pasien" placeholder="No telp" required>
        <input type="text" name="keluhan" placeholder="Keluhan" required>

        <div class="dokter-container">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                <label>
                    <div class="dokter-card <?php if ($row['keaktifan'] == 'non_aktif') echo 'inactive'; ?>">
                        <img src="<?= $row['foto_dokter'] ?>" alt="Foto Dokter">
                        <h4><?= $row['nama_dokter'] ?></h4>
                        <p><?= $row['keterangan_dokter'] ?></p>
                        <p>Biaya: <?= $row['harga'] ?></p>
                        <input type="radio" name="id_dokter" value="<?= $row['id_dokter'] ?>" <?php if ($row['keaktifan'] == 'non_aktif') echo 'disabled'; ?> >
                    </div>
                </label>
            <?php } ?>
        </div>

        <h2>Waktu konsul</h2>
        <input type="datetime-local" name="tanggal_konsul" required>
        <br>
        <div class="button-container">
            <a class="btn-kembali" href="beranda.php"><i class="fa fa-arrow-left"></i></a>
            <input type="submit" name="update" class="btn-pilih" value="Pilih Dokter">
        </div>
        </form>
        
     <footer class="footer" id="kontak">
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
