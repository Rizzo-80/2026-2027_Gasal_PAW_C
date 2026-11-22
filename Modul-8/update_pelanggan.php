<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$ubah = mysqli_query($conn, "UPDATE pelanggan SET nama='$nama', jenis_kelamin='$jenis_kelamin', telp='$telp', alamat='$alamat' WHERE id='$id'");

if($ubah){
    echo "Data pelanggan berhasil diubah!";
    echo "<br><a href='pelanggan.php'>Kembali</a>";
} else {
    echo "Data gagal diubah!";
}
?>