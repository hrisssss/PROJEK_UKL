<?php
include 'config.php';
session_start();
if (!isset($_SESSION['id_user'])) {
    echo '<script>alert("Silahkan login atau daftar terlebih dahulu untuk menggunakan fitur ini");</script>';
    echo '<script>window.location.href = "daftar.php?url=formulirjdwl";</script>';
}

$nama=$_SESSION['nama'];
$id_user=$_SESSION['id_user'];

$sql = "SELECT * FROM jadwal_konsultasi k JOIN dokter_gigi g ON k.id_dokter = g.id_dokter WHERE k.nama_pasien  = '$nama' OR k.id_user = $id_user ORDER BY k.id_jadwal_konsultasi DESC";
$result=$conn->query($sql);
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Formulir anda</h2>
    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Keluhan</th>
                    <th>Nomor wa</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Nama dokter yang anda pilih</th>
                    <th>No wa dokter</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nama_pasien']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['keluhan'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['no_wa_pasien'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['tanggal_konsul'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['status_konsul'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['nama_dokter'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['no_dokter'])); ?></td>
                    <td>
                        <a href="cancel.php?id=<?php echo $row['id_jadwal_konsultasi']; ?>" onclick="return confirm('Yakin membatalkan jadwal forlmulir ini?');">Batalkan jadwal</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Anda belum membuat jadwal konsultasi</p>
    <?php endif; ?>


</body>
</html>