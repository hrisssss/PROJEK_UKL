<?php
include 'config.php';

if (isset($_POST['update'])) {
        $id_user = $_POST['id_user'];
        $nama_pasien = $_POST['nama_pasien'];
        $keluhan = $_POST['keluhan'];
        $no_wa_pasien = $_POST['no_wa_pasien'];
        $tanggal_konsul = $_POST ['tanggal_konsul'];
        $id_dokter = $_POST['id_dokter'];
        $tanggal_lahir = $_POST['tanggal_lahir'];

        $sql = "INSERT INTO jadwal_konsultasi  (nama_pasien, keluhan, no_wa_pasien, tanggal_konsul, id_dokter, id_user, tanggal_lahir) VALUES ('$nama_pasien', '$keluhan', '$no_wa_pasien', '$tanggal_konsul', '$id_dokter', '$id_user', '$tanggal_lahir')";
    if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error: " . $conn->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Berhasil Dibuat</title>
    <link rel="stylesheet" href="jadwaldone.css">
</head>
<body>
    <div class="slide-up">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#20B2AA;"><path d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z"/></svg>
    </div>
    <h1>Jadwal Berhasil Dibuat</h1>
    <p>Jadwal konsultasi Anda telah berhasil dibuat. Silahkan cek data formulir anda lalu screenshoot dan memulai konsultasi</p>
    <p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.</p>

    <footer>
        <p>&copy; 2025 Dental Health. All rights reserved.</p>
    </footer>
        <a href="formulirjdwl.php">Cek data formulir</a>
        <a href="beranda.php">Kembali ke Beranda</a>
</body>
</html>