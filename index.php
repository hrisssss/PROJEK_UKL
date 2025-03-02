<?php
include 'config.php';
$result = $conn->query("SELECT j.*, u.nama_user, d.nama_dokter FROM jadwal_konsultasi j
                        JOIN user u ON j.id_user = u.id_user
                        JOIN dokter_gigi d ON j.id_dokter = d.id_dokter");
?>

<h2>Daftar Janji Temu</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Pasien</th>
        <th>Dokter</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id_jadwal_konsultasi'] ?></td>
        <td><?= $row['nama_user'] ?></td>
        <td><?= $row['nama_dokter'] ?></td>
        <td><?= $row['tanggal_konsul'] ?></td>
        <td><?= $row['status_konsul'] ?></td>
        <td>
            <a href="update.php?id=<?= $row['id_jadwal_konsultasi'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id_jadwal_konsultasi'] ?>">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="create.php">Tambah Janji Temu</a>
