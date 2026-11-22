<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <a href="tambahbarang.php">Tambah Barang</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php while ($barang = mysqli_fetch_array($query)) { ?>
        <tr>
            <td><?php echo $barang['id']; ?></td>
            <td><?php echo $barang['kode_barang']; ?></td>
            <td><?php echo $barang['nama_barang']; ?></td>
            <td>Rp <?php echo $barang['harga']; ?></td>
            <td><?php echo $barang['stok']; ?></td>
            <td>
                <a href="editbarang.php?id=<?php echo $barang['id']; ?>">Edit</a> |
                <a href="HapusBarang.php?id=<?php echo $barang['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>