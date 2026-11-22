<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM pelanggan WHERE id='$id'");

if($hapus){
    header("Location: pelanggan.php");
    exit;
} else {
    echo "Data pelanggan gagal dihapus!";
    echo "<br><a href='pelanggan.php'>Kembali</a>";
}
?>