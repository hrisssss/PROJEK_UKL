<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logon.css">
    <title>Login</title>
</head>
<body>
    <div class="macbook-pro-14-1">
                            <p class="selamat-datang-di"> SELAMAT DATANG DI DENTAL HEALTH</p>
        <div class="macbook-pro-14-1-child">
        <form action="ceklogin.php" method="post" role="form">
            <label>Username</label>
            <input type="text" name="nama" class="form_login" placeholder="Username" autocomplete="off">
            <br>
            <br>
            <br>
            <label>Password</label>
            <input type="password" name="passwod" class="form_login" placeholder="password" autocomplete="off" required>
            <br>
            <button type="submit">
                Login
            </button>
            <button>
            <a href="daftar.php">Daftar</a>
            </button>
        </form>
        </div>


    </div>
    </body>
</html>