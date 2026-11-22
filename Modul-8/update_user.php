<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$id = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$level = $_POST['level'];

if($password == ""){ $ubah = mysqli_query($conn, "UPDATE user SET username='$username', nama='$nama', alamat='$alamat', hp='$hp', level='$level' WHERE id_user='$id'");
} else {
    $ubah = mysqli_query($conn, "UPDATE user SET username='$username', password='$password', nama='$nama', alamat='$alamat', hp='$hp', level='$level' WHERE id_user='$id'");
}

if($ubah){
    echo "Data user berhasil diubah!";
    echo "<br><a href='user.php'>Kembali</a>";
} else {
    echo "Data gagal diubah!";
}
?>