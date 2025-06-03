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

        $sql = "SELECT id_dokter, nama_dokter, foto_dokter, keterangan_dokter, keaktifan, no_dokter FROM dokter_gigi";
        $result = $conn->query($sql);
?>

<h1>
    Pilih dokter untuk konsultasi anda
</h1>

<?php
?>
<h2>Daftar Dokter</h2>
<a href="createdokter.php">Tambah Dokter</a>
<br>
<br>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div <?php if ($row['keaktifan'] == "non_aktif") echo 'style="opacity: 0.5"'; ?>>
           <img src="<?= $row["foto_dokter"] ?>" width="150" height="150"><br>
        </div>

            <h3><?= $row["nama_dokter"] ?></h3>
            <p><?= $row["keterangan_dokter"] ?></p>
            <p>No wa dokter: <?= $row["no_dokter"] ?></p>
            <a href="updatedokter.php?id=<?= $row['id_dokter'] ?>">Edit informasi dokter</a>
            <a href="deletedokter.php?id=<?= $row['id_dokter'] ?>">Hapus dokter</a>
            <br>
            <br>
            <form method="post">
                <label for="keaktifan">Status Keaktifan:</label>
                <select name="keaktifan" id="keaktifan">
                    <option value="aktif"<?php if ($row['keaktifan'] == "aktif") echo"selected"; ?> >Aktif</option>
                    <option value="non_aktif"<?php if ($row['keaktifan'] == "non_aktif") echo"selected";?> >Non Aktif</option>

                </select>
                <br><br>
                <input type="submit" value="Ubah Status" name="ubah_status">
                <input type="hidden" name="id_dokter" value="<?= $row['id_dokter'] ?>">
                </form>
                <br>
                <a href="admin.php">Kembali</a>
<?php } ?>
