<h1>
    Pilih dokter untuk konsultasi anda
</h1>

<?php
include 'config.php';



if (isset($_POST['pilihdokter'])) {
    if ($_POST['keaktifan'] == "non_aktif") {
        echo '<script languange = "javascript">
        alert ("Dokter Ini Sedang Tidak Bisa Hadir/Tidak Aktif Anda Bisa Memilih dokter yang lain");</script>';
    } else {
    $id_dokter = $_POST['id_dokter'];
    $sql = "UPDATE jadwal_konsultasi SET id_dokter='$id_dokter' WHERE id_jadwal_konsultasi='$id_jadwal_konsultasi'";
    if ($conn->query($sql) === TRUE) {
        header("Location: jadwaldone.html");
    } else {
        echo "Error: " . $conn->error;
    }
    }
    
}
;
?>

<h2>Daftar Dokter</h2>


<a href="updatejadwal.php?id=<?=$id_jadwal_konsultasi?>">Edit Jadwal</a>


