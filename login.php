<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logon.css">
    <title>Login</title>
</head>
<body>
    <div class="kotak_login">
        <p class="tulisan_login"> Silahkan Login</p>
        <form action="ceklogin.php" method="post" role="form">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="username" autocomplete="off">
            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="password" autocomplete="off">
            <input type="submit">
            <form action="beranda.php" method="POST">
        </form>
    </div>
</body>
</html>