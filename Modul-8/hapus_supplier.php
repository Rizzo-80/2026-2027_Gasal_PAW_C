<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM supplier WHERE id='$id'");

if ($hapus) {
    echo "Data supplier berhasil dihapus!";
    echo "<br><a href='data_supplier.php'>Kembali</a>";
} else {
    echo "Data gagal dihapus!";
}
?>