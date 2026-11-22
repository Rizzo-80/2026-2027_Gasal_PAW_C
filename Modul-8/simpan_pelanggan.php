<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$simpan = mysqli_query($conn, "INSERT INTO pelanggan (nama, jenis_kelamin, telp, alamat) VALUES ('$nama', '$jenis_kelamin', '$telp', '$alamat')");

if($simpan){
    echo "Data pelanggan berhasil ditambahkan!";
    echo "<br><a href='pelanggan.php'>Kembali</a>";
} else {
    echo "Data gagal ditambahkan!";
}
?>