<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h2>Tambah Data User Baru</h2>
    <form method="POST" action="simpan_user.php">
        <table cellpadding="8">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td>HP</td>
                <td><input type="text" name="hp" required></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <select name="level" required>
                        <option value="">Pilih Level</option>
                        <option value="1">Owner</option>
                        <option value="2">Kasir</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Simpan</button>
                    <a href="user.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>