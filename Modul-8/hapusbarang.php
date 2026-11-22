<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$id_barang = $_GET['id'];
$cek_ada = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE barang_id = '$id_barang'");

if (mysqli_num_rows($cek_ada) > 0) {
    echo "<script>alert('Barang tidak bisa dihapus karena masih digunakan di transaksi!'); window.location='barang.php';</script>";
} else {
    mysqli_query($conn, "DELETE FROM barang WHERE id = '$id_barang'");
    echo "<script>alert('Data barang berhasil dihapus!'); window.location='barang.php';</script>";
}
?>