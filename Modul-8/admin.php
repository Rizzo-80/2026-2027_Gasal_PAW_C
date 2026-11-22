<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Penjualan</title>
</head>
<body>
    <table width="100%" bgcolor="blue">
        <tr>
            <td><h2>Sistem Penjualan</h2></td>
            <td align="center"><button type="button"onclick="document.getElementById('tampilan').src='home.php'">Home</button></td>
            <?php if($_SESSION['level'] == 1){ ?>
            <td align="center">
                <details>
                    <summary><button type="button">Data Master</button></summary>
                    <br>
                    <button type="button"onclick="document.getElementById('tampilan').src='barang.php'">Data Barang</button>
                    <br><br>
                    <button type="button"onclick="document.getElementById('tampilan').src='data_supplier.php'">Data Supplier</button>
                    <br><br>
                    <button type="button"onclick="document.getElementById('tampilan').src='pelanggan.php'">Data Pelanggan</button>
                    <br><br>
                    <button type="button"onclick="document.getElementById('tampilan').src='user.php'">Data User</button>
                </details>
            </td>
            <?php } ?>
            <td align="center">
                <button type="button"onclick="document.getElementById('tampilan').src='transaksi.php'">Transaksi</button>
            </td>
            <td align="center">
                <button type="button"onclick="document.getElementById('tampilan').src='laporan.php'">Laporan</button>
            </td>
            <td align="right">
                <details>
                    <summary>
                        <button type="button"><?php echo $_SESSION['nama']; ?></button>
                    </summary>
                    <br>
                    <button type="button"onclick="location.href='logout.php'">Logout</button>
                </details>
            </td>
        </tr>
    </table>
    <hr>
    <iframe
        id="tampilan"
        src="home.php"
        width="100%"
        height="800"
        frameborder="0">
    </iframe>
</body>
</html>
