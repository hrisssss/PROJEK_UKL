<?php
include 'config.php';
session_start();

if (!isset($_SESSION['id_user'])) {
    echo '<script>alert("Silahkan login atau daftar terlebih dahulu untuk menggunakan fitur ini");</script>';
    echo '<script>window.location.href = "daftar.php?url=formulirjdwl";</script>';
}
$nama=$_SESSION['nama'];
$id_user=$_SESSION['id_user'];
        
        $sql = "SELECT * FROM jadwal_konsultasi  WHERE  id_user = $id_user";

 $konsultasi = $conn->query($sql);
 if( $konsultasi->num_rows == 1) {
    $data = $konsultasi->fetch_assoc();
     header("Location: detailform.php?id=" . $data['id_jadwal_konsultasi']);
    exit;
 }

 $sql = '';
if (isset($_GET['status_konsul'])) {
    $status_konsul = $_GET['status_konsul'];
    $sql = "SELECT * FROM jadwal_konsultasi k JOIN dokter_gigi g ON k.id_dokter = g.id_dokter WHERE k.status_konsul = '$status_konsul' AND (k.nama_pasien  = '$nama' OR k.id_user = $id_user) ORDER BY k.id_jadwal_konsultasi DESC";
} else {
    $sql = "SELECT * FROM jadwal_konsultasi k JOIN dokter_gigi g ON k.id_dokter = g.id_dokter WHERE k.status_konsul <> 'batal' AND (k.nama_pasien  = '$nama' OR k.id_user = $id_user) ORDER BY k.id_jadwal_konsultasi DESC";
}
$result=$conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List data formulir anda</title>
        <link rel="stylesheet" href="formulirjdwl.css">
    </head>
<body>
    <main class="formulirjdwl">
    <h1><?php if (isset($_GET['status_konsul'])) echo"jadwal yang dibatalkan"; else echo"Jadwal anda"; ?></h1>
    <section class="formulir-container">
    <?php if ($result->num_rows > 0): ?>
        <table class="tabel-user" border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal lahir</th>
                    <th>Keluhan</th>
                    <th>Nomor wa</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Nama dokter yang anda pilih</th>
                    <th>No wa dokter</th>
                    <th>Detail formulir</th>
                    <?php if (!isset($_GET['status_konsul'])): ?>
                    <th>Batalkan jadwal</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nama_pasien']); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal_lahir']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['keluhan'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['no_wa_pasien'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['tanggal_konsul'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['status_konsul'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['nama_dokter'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['no_dokter'])); ?></td>
                    <td>
                        <a href="detailform.php?id=<?php echo $row['id_jadwal_konsultasi']; ?>">Detail</a>
                    </td>
                    <?php if (!isset($_GET['status_konsul'])): ?>
                    <td>
                        <a href="cancel.php?id=<?php echo $row['id_jadwal_konsultasi']; ?>" onclick="return confirm('Yakin membatalkan jadwal forlmulir ini?');">Batalkan</a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </section>

    
    <?php else: ?>
        <p class="tdk-jadwal">Anda belum membuat jadwal konsultasi</p>
    <?php endif; ?>
        <div>
            <a class="button" href="beranda.php">Beranda</a>
            <?php if (!isset($_GET['status_konsul'])): ?>
            <a class="button" href="formulirjdwl.php?status_konsul=batal">jadwal terbalkan</a>
            <?php else: ?>
            <a class="button" href="formulirjdwl.php">Kembali</a>
            <?php endif; ?>
        </div>
    </main>

    <footer class="footer">
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>