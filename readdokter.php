<?php
include 'config.php';
$result = $conn->query("SELECT * FROM dokter_gigi");
?>
<h2>Daftar Dokter</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Dokter</th>
        <th>No. Telepon</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id_dokter'] ?></td>
        <td><?= $row['nama_dokter'] ?></td>
        <td><?= $row['no_telp'] ?></td>
        <td>
            <a href="updatedokter.php?id=<?= $row['id_dokter'] ?>">Edit</a> |
            <a href="deletedokter.php?id=<?= $row['id_dokter'] ?>">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="createdokter.php">Tambah Dokter</a>