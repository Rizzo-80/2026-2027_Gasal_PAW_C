<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$ubah = mysqli_query($conn, "UPDATE supplier SET nama='$nama', telp='$telp',alamat='$alamat'WHERE id='$id'");
if ($ubah) {
    echo "Data berhasil diubah!";
    echo "<br><a href='data.php'>Kembali</a>";
} else {
    echo "Data gagal diubah!";
}
?>