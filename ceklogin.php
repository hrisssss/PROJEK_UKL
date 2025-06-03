<?php
    session_start();
    include "config.php";

    $nama = $_POST['nama'];
    $passwod = $_POST['passwod'];

    $sql = mysqli_query($conn, "SELECT * FROM logins WHERE nama = '".$nama."'") or die (mysqli_error($conn));
    $data = mysqli_fetch_array($sql);

    if ($data) {

        if ($passwod == $data['passwod']) {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['nama'] = $data['nama'];
            if ($data['nama'] === 'admin') {
                echo '<script language="javascript">
                alert("anda berhasil login sebagai admin!");
                document.location="admin.php";
                </script>';
                
               
            } elseif (isset($data['id_dokter'])) {
                $_SESSION['id_dokter'] = $data['id_dokter'];
                echo '<script language="javascript">
                alert("anda berhasil login sebagai dokter!");
                document.location="dokter.php";
                </script>';
                
            } elseif (isset($_GET['url'])) {
                echo '<script language="javascript">
                alert("anda berhasil login!.");
                document.location="' . $_GET['url'] . '.php";
                </script>';
            } else {
                echo '<script language="javascript">
                alert("anda berhasil login!.");
                document.location="beranda.php";
                </script>';
               
            }
        } else {
            echo '<script language="javascript">
            alert("username dan password salah silahkan login kembali, jika belum mempunyai akun silahkan daftar terlebih dahulu.");
            document.location="login.php";
            </script>';
           
        }
    } else {
        $error = "Akun tidak di temukan.";
        echo '<script language="javascript">
        alert("Akun tidak di temukan.");
        document.location="login.php";
        </script>';
       
    }
?>