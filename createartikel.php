<?php include 'config.php'; 
if (isset($_POST['create'])) {
    $isi_artikel = $_POST['isi_artikel'];
    $judul_artikel = $_POST['judul_artikel'];
    $gambar_artikel = $_POST['gambar_artikel'];
    $tautan_artikel = $_POST['tautan_artikel'];
    $deskripsi_artikel = $_POST['deskripsi_artikel'];

    $target_dir = "artikel_foto/";

    $target_file = $target_dir . basename($_FILES["gambar_artikel"]["name"]);
    if (move_uploaded_file($_FILES["gambar_artikel"]["tmp_name"], $target_file)) {
        $gambar_artikel = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }

    $sql = "INSERT INTO artikel (isi_artikel, judul_artikel, deskripsi_artikel, tautan_artikel, gambar_artikel) 
                        VALUES ('$isi_artikel', '$judul_artikel', '$deskripsi_artikel', '$tautan_artikel','$gambar_artikel')";
    
    if ($conn->query($sql) === TRUE) {
                    header("Location: listartikel.php");
    } else {
        echo "Error: " . $conn->error;
    }
        }
?>
<form method="post" enctype="multipart/form-data">
    Gambar Artikel: <input type="file" name="gambar_artikel" required><br>
    judul artikel: <input type="text" name="judul_artikel" required><br>
    Isi Artikel: <textarea name="isi_artikel" required></textarea><br>
    deskripsi artikel: <input type="text" name="deskripsi_artikel" required><br>
    Tautan artikel: <input type="text" name="tautan_artikel" required><br>
    <input type="submit" name="create" value="Tambah Artikel">
</form>