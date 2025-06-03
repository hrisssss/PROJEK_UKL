<?php
 include 'config.php';
    session_start();
 if (isset($_POST['buat'])){
    $nama = $_POST['nama'];
    $password = $_POST['passwod'];

    $sql = "INSERT INTO logins (nama, passwod) VALUES ('$nama', '$password')";

    $cek = $conn->query("SELECT * FROM logins WHERE nama='$nama'");
    if ($cek->num_rows > 0) {
        echo '<script language="javascript">
        alert("⚠️ Error: Data Sudah Ada!");
        </script>';
        
    } else {
        if ($conn->query($sql) === TRUE) {

        $_SESSION['id_user'] = $conn->insert_id;
        $_SESSION['nama'] = $nama;   
        if (isset($_GET['url'])) {
        echo '<script language="javascript">
        alert("anda berhasil membuat akun!");
        document.location="' . $_GET['url'] . '.php";
        </script>';
            } else {
                        echo '<script language="javascript">
        alert("anda berhasil membuat akun!");
        document.location="beranda.php";
        </script>';

            }
        } else {
            echo "Gagal Daftar" . $conn->error;
        }
        $result = $conn->query("SELECT * FROM logins");
        $sql = "INSERT INTO logins (nama, passwod) VALUES ('$nama', '$passwod')";
    }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logon.css">
    <title>Daftar</title>
</head>
<body>
    <div class="macbook-pro-14-1">
                            <p class="selamat-datang-di"> SELAMAT DATANG DI DENTAL HEALTH</p>
        <div class="macbook-pro-14-1-child">
        <form action="daftar.php" method="post">
            <label>Buat username</label>
            <input type="text" name="nama" class="form_login" placeholder="Username" autocomplete="off">
            <br>
            <br>
            <br>
            <label>Buat password</label>
            <input type="password" name="passwod" class="form_login" placeholder="password" autocomplete="off" required>
            <br>
            <button type="submit" name="buat">
                Daftar
            </button>
            <a href="login.php">Sudah punya akun?</a>
        </form>
        </div>


    </div>
    </body>
</html>