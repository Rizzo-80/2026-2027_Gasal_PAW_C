<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id='$id'");
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
    <h2>Edit Data Pelanggan</h2>
    <form action="update_pelanggan.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <table cellpadding="8">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="jenis_kelamin">
                        <option value="L" <?php if($row['jenis_kelamin'] == 'L') echo "selected"; ?>>Laki-laki</option>
                        <option value="P" <?php if($row['jenis_kelamin'] == 'P') echo "selected"; ?>>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telp" value="<?php echo $row['telp']; ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required></td>
            </tr>
        </table>
        <button type="submit">Update</button>
        <a href="pelanggan.php">Kembali</a>

    </form>
</body>
</html>