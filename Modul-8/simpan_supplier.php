<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$simpan = mysqli_query($conn, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')");
if ($simpan) {
    echo "Data berhasil disimpan!";
    echo "<br><a href='data_supplier.php'>Kembali</a>";
} else {
    echo "Data gagal disimpan!";
}
?>