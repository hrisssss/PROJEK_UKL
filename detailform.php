<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id_user'])) {
    echo '<script>alert("Silahkan login atau daftar terlebih dahulu untuk menggunakan fitur ini");</script>';
    echo '<script>window.location.href = "daftar.php?url=formulirjdwl";</script>';
}
$id_jadwal_konsultasi = $_GET['id'];

$sql = "SELECT * FROM jadwal_konsultasi k JOIN dokter_gigi g ON k.id_dokter = g.id_dokter WHERE k.id_jadwal_konsultasi = $id_jadwal_konsultasi";

$result = mysqli_query($conn, $sql);

$data= mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Formulir</title>
        <link rel="stylesheet" href="detailform.css">
    </head>
<body>
    
    <div class="formulir-container">
    <h2>Detail formulir Konsultasi</h2>
    
    <div class="form-group">
        <span>Nama anda:</span>
        <span><?php echo htmlspecialchars($data['nama_pasien']); ?></span>
    </div>
    
    <div class="form-group">
        <span>Tanggal lahir: </span>
        <span><?php echo htmlspecialchars($data['tanggal_lahir']); ?></span>
    </div>
    
    <div class="form-group">
        <span>No Telp: <?php echo htmlspecialchars($data['no_wa_pasien']); ?></span>
    </div>
    
    <div class="form-group">
        <span>Keluhan: <?php echo htmlspecialchars($data['keluhan']); ?></span>
    </div>
    
    <div class="form-group">
        <span>Dokter: <?php echo htmlspecialchars($data['nama_dokter']); ?></span>
    </div>
    
    <div class="form-group">
        <span>Status konsul: <?php echo htmlspecialchars($data['status_konsul']); ?></span>
    </div>
    
    <div class="form-group">
        <span>Tanggal konsul:</span>
        <span><?php echo htmlspecialchars($data['tanggal_konsul']); ?></span>
    </div>

    <div class="form-group">
        <span>biaya: <?php echo htmlspecialchars($data['harga']); ?></span>
    </div>
    
    <hr>
    <div class="note">Jika sudah screenshot formulir ini, anda dipersilahkan untuk memulai konsultasi ( batas waktu konsultasi adalah 30menit )</div>
    
    <div class="btn-group">
        <a href="cancel.php?id=<?php echo $data['id_jadwal_konsultasi']; ?>" class="btn" onclick="return confirm('Yakin membatalkan jadwal formulir ini?');">Batalkan Jadwal</a>
       <a <?php echo "href='https://wa.me/".$data ['no_dokter']."?text=Halo+Dok+Saya+ingin+Konsultasi.+ini+adalah+formulir+saya+(hasil+screenshoot+halaman+formulir+anda)'";?> class="btn">Mulai Konsultasi</a>       
        <a href="beranda.php" class="btn">Kembali</a>
    </div>
</div>
