<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM barang WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Barang</title>
</head>
<body>
    <h2>Edit Data Barang</h2>
    <form action="updatebarang.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <table cellpadding="8">
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="kode_barang" value="<?php echo $row['kode_barang']; ?>"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" value="<?php echo $row['harga']; ?>"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok" value="<?php echo $row['stok']; ?>"></td>
            </tr>
        </table>
        <button type="submit">Update</button>
        <a href="barang.php">Kembali</a>
    </form>
</body>
</html>