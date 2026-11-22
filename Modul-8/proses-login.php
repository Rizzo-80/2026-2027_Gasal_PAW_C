<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_prepare($conn, "SELECT * FROM user WHERE username = ? AND password = ?");
mysqli_stmt_bind_param($query, "ss", $username, $password);
mysqli_stmt_execute($query);
$hasil = mysqli_stmt_get_result($query);
$data_db = mysqli_fetch_assoc($hasil);
if($data_db){
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data_db['username'];
    $_SESSION['nama'] = $data_db['nama'];
    $_SESSION['level'] = $data_db['level'];

    header("Location:admin.php");
    exit;
} else {
    echo "Username atau password salah.";
    echo '<br><a href="login.php">Kembali</a>';
}
?>
