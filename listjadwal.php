<?php
session_start();
include 'config.php';

$sql = "SELECT * FROM jadwal_konsultasi ORDER BY id_jadwal_konsultasi";
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
                    <th>ID jadwal</th>
                    <th>Nama</th>
                    <th>Keluhan</th>
                    <th>Nomor wa</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Dokter yang di pilih</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id_jadwal_konsultasi']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama_pasien']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['keluhan'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['no_wa_pasien'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['tanggal_konsul'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['status_konsul'])); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['id_dokter'])); ?></td>
                    <td>
                        <a href="editjadwal.php?id=<?php echo $row['id_jadwal_konsultasi']; ?>">Edit</a> |
                        <a href="deletejadwal.php?id=<?php echo $row['id_jadwal_konsultasi']; ?>" onclick="return confirm('Yakin ingin menghapus jadwal forlmulir ini?');">Hapus jadwal</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Anda belum membuat jadwal konsultasi</p>
    <?php endif; ?>

    <a href="admin.php">kembali</a>

</body>
</html>