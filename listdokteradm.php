<?php
include 'config.php';

        if (isset($_POST['ubah_status'])) { 
            $id_dokter = $_POST['id_dokter'];
            $keaktifan = $_POST['keaktifan'];
             
            $sql = "UPDATE dokter_gigi SET keaktifan='$keaktifan' WHERE id_dokter=$id_dokter";

            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $conn->error;
            }
            echo '<script>alert("Status keaktifan dokter berhasil diubah.");</script>';
                                        }

        $sql = "SELECT id_dokter, nama_dokter, foto_dokter, keterangan_dokter, keaktifan, no_dokter, harga FROM dokter_gigi";
        $result = $conn->query($sql);
?>

<?php
?>
<h1>Daftar Dokter</h1>
<a href="createdokter.php">Tambah Dokter</a>
<a href="admin.php" class="kembali-link">Kembali</a>
<link rel="stylesheet" href="listdktr.css">

<div class="dokter-container">
<?php while ($row = $result->fetch_assoc()) { ?>
    <div class="dokter-card <?php if ($row['keaktifan'] == 'non_aktif') echo 'nonaktif'; ?>">
        <img src="<?= $row["foto_dokter"] ?>" width="150" height="150"><br>
        <h3><?= $row["nama_dokter"] ?></h3>
        <p><?= $row["keterangan_dokter"] ?></p>
        <p>No wa dokter: <?= $row["no_dokter"] ?></p>
        <p>Biaya Konsultasi: <?= $row["harga"] ?></p>
        <a href="updatedokter.php?id=<?= $row['id_dokter'] ?>">Edit informasi dokter</a>
        <br>
        <br>
        <a href="deletedokter.php?id=<?= $row['id_dokter'] ?>">Hapus dokter</a>
        <form method="post">
            <label for="keaktifan">Status Keaktifan:</label>
            <select name="keaktifan" id="keaktifan">
                <option value="aktif" <?= $row['keaktifan'] == "aktif" ? "selected" : "" ?>>Aktif</option>
                <option value="non_aktif" <?= $row['keaktifan'] == "non_aktif" ? "selected" : "" ?>>Non Aktif</option>
            </select>
            <br>
            <input type="submit" value="Ubah Status" name="ubah_status">
            <input type="hidden" name="id_dokter" value="<?= $row['id_dokter'] ?>">
        </form>
    </div>
<?php } ?>
</div>
