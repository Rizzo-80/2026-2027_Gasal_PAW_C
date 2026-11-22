<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

if($id == $_SESSION['id_user']){
    echo "Tidak bisa menghapus akun yang sedang digunakan!";
    echo "<br><a href='user.php'>Kembali</a>";
    exit;
}

$hapus = mysqli_query($conn, "DELETE FROM user WHERE id_user='$id'");

if($hapus){
    header("Location: user.php");
    exit;
} else {
    echo "Data user gagal dihapus!";
    echo "<br><a href='user.php'>Kembali</a>";
}
?>