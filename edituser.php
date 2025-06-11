<?php
include 'config.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM logins WHERE id_user='$id'");
$row = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['passwod'];
    $username = $_POST['username'];

    $sql = "UPDATE logins
            SET passwod='$password', nama='$username'
            WHERE id_user='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: listuser.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$mail = mysqli_query($conn, "SELECT * FROM logins");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>User Data</title>
    <link rel="stylesheet" href="createdokter.css">
</head>
<body>
    <div class="form-container">
        <a href="listuser.php">Kembali</a>
        <h2>Edit data usser</h2>
        <form method="post">
            <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">

            <div class="form-group">
                <label>Nama user:</label>
                <input type="text" name="username" value="<?= $row['nama'] ?>" required>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="text" name="passwod" value="<?= $row['passwod'] ?>" required>
            </div>

            <input type="submit" name="update" value="Update User">
        </form>
    </div>
</body>
</html>
</html>
