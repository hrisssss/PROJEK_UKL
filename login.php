<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logon.css">
    <title>Login</title>
</head>
<body>
    <div>
        <p>SELAMAT DATANG DI DENTAL HEALTH</p>
    <div>
        <form action="ceklogin.php" method="post" role="form">
            <label>Username</label>
            <input type="text" name="nama" placeholder="Username" autocomplete="off">
            <br>
            <br>
            <br>
            <label>Password</label>
            <input type="password" name="passwod" placeholder="password" autocomplete="off" required>
            <br>
            
            <button type="submit">
                Login
            </button>
            
            <a href="daftar.php">belum punya akun?</a>
        </form>
    </div>
    <a class="back" href="beranda.php">Beranda</a>
    </div>
    </body>
</html>