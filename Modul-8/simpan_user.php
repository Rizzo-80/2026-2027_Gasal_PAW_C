<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login']) || $_SESSION['level'] != 1){
    header("Location: login.php");
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$level = $_POST['level'];

$simpan = mysqli_query($conn, "INSERT INTO user (username, password, nama, alamat, hp, level) VALUES ('$username', '$password', '$nama', '$alamat', '$hp', '$level')");

if($simpan){
    echo "Data user berhasil ditambahkan!";
    echo "<br><a href='user.php'>Kembali</a>";
} else {
    echo "Data gagal ditambahkan!";
}
?>