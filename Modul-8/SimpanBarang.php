<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$simpan = mysqli_query($conn, "INSERT INTO barang (kode_barang, nama_barang, harga, stok) VALUES ('$kode_barang', '$nama_barang', '$harga', '$stok')");

if ($simpan) {
    echo "Data barang berhasil ditambahkan!";
    echo "<br><a href='barang.php'>Kembali</a>";
} else {
    echo "Data gagal ditambahkan!";
}
?>