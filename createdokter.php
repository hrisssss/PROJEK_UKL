<?php
include 'config.php';

if (isset($_POST['create'])) {
    $nama_dokter = $_POST['nama_dokter'];
    $keterangandktr = $_POST['keterangan_dokter'];
    $no_wa_dokter = $_POST['no_dokter'];
    

    $target_dir = "profildokter/";

    $target_file = $target_dir . basename($_FILES["foto_dokter"]["name"]);
    if (move_uploaded_file($_FILES["foto_dokter"]["tmp_name"], $target_file)) {
        $foto_dokter = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }

    $sql = "INSERT INTO dokter_gigi (nama_dokter, keterangan_dokter, foto_dokter, no_dokter) VALUES ('$nama_dokter', '$keterangandktr', '$foto_dokter', '$no_wa_dokter')";
    
    if ($conn->query($sql) === TRUE) {
    $nama = $_POST['nama'];
    $password = $_POST['passwod'];

    $sql = "INSERT INTO logins (nama, passwod) VALUES ('$nama', '$password')";

    $cek = $conn->query("SELECT * FROM logins WHERE nama='$nama'");
    if ($cek->num_rows > 0) {
        echo '<script language="javascript">
        alert("⚠️ Error: Data Sudah Ada!");
        </script>';
        
    } else {
        if ($conn->query($sql) === FALSW) {            
            echo "Gagal Daftar" . $conn->error;
        }    }
 }
        header("Location: listdokteradm.php");
    } else {
        echo "Error: " . $conn->error;
    }
}



?>
<form method="post" enctype="multipart/form-data">
    Nama Dokter: <input type="text" name="nama_dokter" required><br>
    keterangan Dokter: <input type="text" name="keterangan_dokter" required><br>
    Foto Dokter: <input type="file" name="foto_dokter" required><br>
    No WhatsApp Dokter: <input type="text" name="no_dokter" required><br>
    <input type="submit" name="create" value="Tambah Dokter">
</form>
