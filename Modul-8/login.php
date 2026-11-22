<?php 
session_start();

if(isset($_SESSION['login'])){
    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<h2>Silahkan Masukkan Username dan Password anda :> </h2>
	<form action="proses-login.php" method="POST">
	  	<label>Username</label>
	  	<input type="text" name="username" placeholder="Enter the username">
	  	<br><br>
	  	<label>Password</label>
	  	<input type="password" name="password" placeholder="Enter the password">
	  	<br><br>
	  	<input type="submit" value="Login">
	  </form>
</body>
</html>