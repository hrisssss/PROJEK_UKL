<?php
    include "koneksi.php";

   $username = $_POST['username'];
   $password = $_POST['password'];

   $sql = mysqli_query($CONNECTION, "SELECT * FROM tb_login WHERE username = '".$username."' AND password = '".$password."' ") or die (mysqli_error());

   if(mysqli_num_rows ($sql) == 0){
    echo'<script languange= "javascipt">
    alert ("username dan password salah silahkan login kembali."); document.location="login.php";</script>';
    } else {
        echo '<script languange = "javascript">
        alert ("anda berhasil login!."); document.location="halaman.php";</script>';
        header("Location: beranda.html");
        exit();
    }
?> 