<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

if($_SESSION['level'] != 1){
    echo "Anda tidak memiliki akses!";
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
</head>
<body>
    <h2>Data Barang</h2>
    <a href="tambahbarang.php">Tambah Barang</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($barang = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $barang['id']; ?></td>
            <td><?php echo $barang['kode_barang']; ?></td>
            <td><?php echo $barang['nama_barang']; ?></td>
            <td>Rp <?php echo $barang['harga']; ?></td>
            <td><?php echo $barang['stok']; ?></td>
            <td>
                <a href="EditBarang.php?id=<?php echo $barang['id']; ?>">Edit</a> |
                <a href="hapusbarang.php?id=<?php echo $barang['id']; ?>" onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>