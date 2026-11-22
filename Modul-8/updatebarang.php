<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$id = $_POST['id'];
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$ubah = mysqli_query($conn, "UPDATE barang SET kode_barang='$kode_barang',nama_barang='$nama_barang',harga='$harga',stok='$stok' WHERE id='$id'");

if ($ubah) {
    echo "Data berhasil diubah!";
    echo "<br><a href='barang.php'>Kembali</a>";
} else {
    echo "Data gagal diubah!";
}
?>