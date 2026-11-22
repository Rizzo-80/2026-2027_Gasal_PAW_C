<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION['username']);
unset($_SESSION['nama']);
unset($_SESSION['level']);

echo "Sukses logout. Silahkan login kembali.";
echo '<br><a href="login.php">Login Kembali</a>';

header("Location: login.php");
exit;
?>
