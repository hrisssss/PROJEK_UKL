<?php
include 'config.php';

if (isset($_POST['create'])) {
    $id_user = $_POST['id_user'];
    $id_dokter = $_POST['id_dokter'];
    $tanggal_konsul = $_POST['tanggal_konsul'];

 $check = $conn->query("SELECT * FROM jadwal_konsultasi WHERE id_user='$id_user' AND id_dokter='$id_dokter' AND tanggal_konsul='$tanggal_konsul'");
    
    if ($check->num_rows > 0) {
        echo "⚠️ Error: Janji temu sudah ada!";
    } else {
        // Jika tidak ada duplikasi, masukkan data baru
        $sql = "INSERT INTO jadwal_konsultasi (id_user, id_dokter, tanggal_konsul, status_konsul)
                VALUES ('$nama_user', '$id_dokter', '$tanggal_konsul', 'jadwal')";
        
        if ($conn->query($sql) === TRUE) {
            echo "✅ Janji temu berhasil dibuat!";
            header("Location: index.php"); // Redirect ke daftar janji temu
        } else {
            echo "❌ Error: " . $conn->error;
        }
    }
}
?>

<h1>
    Atur jadwal konsul kamu disini!
</h1>
<form method="post">
    ID Pasien: <input type="text" name="id_user" required><br>
    ID Dokter: <input type="text" name="id_dokter" required><br>
    Tanggal: <input type="date" name="tanggal_konsul" required><br>
    <input type="submit" name="create" value="Buat Janji Sekarang">
</form>