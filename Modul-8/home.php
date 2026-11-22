<?php 
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
echo "Selamat Datang Di Tugas Praktikum Modul 8";
echo "<br> <br>";
echo "Dibuat oleh <b>Moch Rizal Maulana Munzir Tamam </b> Dengan NIM : <b> 250411100070 </b>";
?>