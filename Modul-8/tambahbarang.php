<?php
include "koneksi.php";
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
    <title>Tambah Barang</title>
</head>
<body>
    <h2>Tambah Data Barang Baru</h2>
    <form method="POST" action="SimpanBarang.php">
        <table cellpadding="8">
            <tr>
                <td><label>Kode Barang</label></td>
                <td><input type="text" name="kode_barang" placeholder="Masukkan kode barang" required></td>
            </tr>

            <tr>
                <td><label>Nama Barang</label></td>
                <td><input type="text" name="nama_barang" placeholder="Masukkan nama barang" required></td>
            </tr>

            <tr>
                <td><label>Harga</label></td>
                <td><input type="number" name="harga" placeholder="Masukkan harga barang" required></td>
            </tr>

            <tr>
                <td><label>Stok</label></td>
                <td><input type="number" name="stok" placeholder="Masukkan stok barang" required></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit">Simpan</button>
                    <a href="barang.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>