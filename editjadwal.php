<?php
include 'config.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM jadwal_konsultasi WHERE id_jadwal_konsultasi='$id'");
$row = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_jadwal_konsultasi = $_POST['id_jadwal_konsultasi'];
    $id_user = $_POST['id_user'];
    $nama_pasien = $_POST['nama_pasien'];
    $keluhan = $_POST['keluhan'];
    $no_wa_pasien = $_POST['no_wa_pasien'];
    $tanggal_konsul = $_POST['tanggal_konsul'];
    $id_dokter = $_POST['id_dokter'];
    $status_konsul = $_POST['status_konsul'];

    $sql = "UPDATE jadwal_konsultasi
            SET nama_pasien='$nama_pasien', keluhan='$keluhan', no_wa_pasien='$no_wa_pasien', tanggal_konsul='$tanggal_konsul', id_dokter='$id_dokter', status_konsul='$status_konsul'
            WHERE id_jadwal_konsultasi='$id_jadwal_konsultasi'";

    if ($conn->query($sql) === TRUE) {
        header("Location: listjadwal.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$mail = mysqli_query($conn, "SELECT * FROM jadwal_konsultasi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>list_jadwal</title>

</head>
<body>
    <div class="form-container">
        <h2>List jadwal</h2>
        <form method="post">
            <input type="hidden" name="id_jadwal_konsultasi" value="<?= $row['id_jadwal_konsultasi'] ?>">

            <div class="form-group">
                <label>Nama pasien:</label>
                <input type="text" name="nama_pasien" value="<?= $row['nama_pasien'] ?>" required>
            </div>

            <div class="form-group">
                <label>Keluhan:</label>
                <input type="text" name="keluhan" value="<?= $row['keluhan'] ?>" required>
            </div>

            <div class="form-group">
                <label>tanggal konsul:</label>
                <input type="date" name="tanggal_konsul" value="<?= $row['tanggal_konsul'] ?>" required>
            </div>

            <div class="form-group">
                <label>no wa pasien:</label>
                <input type="text" name="no_wa_pasien" value="<?= $row['no_wa_pasien'] ?>" required>
            </div>

            <div class="form-group">
                <label>id Dokter:</label>
                <input type="text" name="id_dokter" value="<?= $row['id_dokter'] ?>" required>
            </div>
            
            <div class="form-group">
         <label for="status_konsul">Pilih status konsul:</label>
                <select name="status_konsul" id="status_konsul">
                        <option value="terjadwal" <?php if ($row['status_konsul'] == "terjadwal") echo"selected"; ?>>terjadwal</option>
                        <option value="batal" <?php if ($row['status_konsul'] == "batal") echo"selected"; ?>>batal</option>
                        <option value="selesai" <?php if ($row['status_konsul'] == "selesai") echo"selected"; ?>>selesai</option>
                </select>
            </div>

            <div class="form-group">
                <label>id user</label>
                <input type="text" name="id_user" value="<?= $row['id_user'] ?>" required>
            </div>

            <button type="submit">Update</button>

        </form>
    </div>
</body>
</html>
</html>
