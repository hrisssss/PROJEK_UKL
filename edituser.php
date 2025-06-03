<?php
include 'config.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM logins WHERE id_user='$id'");
$row = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'];
    $password = $_POST['passwod'];
    $username = $_POST['username'];

    $sql = "UPDATE logins
            SET id_user='$id_user', passwod='$password', nama='$username'
            WHERE id_user='$id_user'";

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

</head>
<body>
    <div class="form-container">
        <h2>Edit Pesan</h2>
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

            <div class="form-group">
                <label>id user:</label>
                <input type="text" name="id_user" value="<?= $row['id_user'] ?>" required>
            </div>

            <button type="submit">Update</button>

        </form>
    </div>
</body>
</html>
</html>
