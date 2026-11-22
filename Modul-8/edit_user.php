<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h2>Edit Data User</h2>
    <form action="update_user.php" method="POST">
        <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
        <table cellpadding="8">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $row['username']; ?>" required></td>
            </tr>
            <tr>
                <td>Password Baru</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required></td>
            </tr>
            <tr>
                <td>HP</td>
                <td><input type="text" name="hp" value="<?php echo $row['hp']; ?>" required></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <select name="level">
                        <option value="1" <?php if($row['level'] == 1) echo "selected"; ?>>Owner</option>
                        <option value="2" <?php if($row['level'] == 2) echo "selected"; ?>>Kasir</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit">Update</button>
        <a href="user.php">Kembali</a>
    </form>
</body>
</html>