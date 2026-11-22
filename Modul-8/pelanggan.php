<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

if($_SESSION['level'] != 1){
    echo "Anda tidak memiliki akses!";
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM pelanggan");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h2>Data Pelanggan</h2>
    <a href="tambah_pelanggan.php">Tambah Pelanggan</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php while($pelanggan = mysqli_fetch_array($query)){ ?>
        <tr>
            <td><?php echo $pelanggan['id']; ?></td>
            <td><?php echo $pelanggan['nama']; ?></td>
            <td><?php echo $pelanggan['jenis_kelamin']; ?></td>
            <td><?php echo $pelanggan['telp']; ?></td>
            <td><?php echo $pelanggan['alamat']; ?></td>
            <td>
                <a href="edit_Pelanggan.php?id=<?php echo $pelanggan['id']; ?>">Edit</a> |
                <a href="hapus_pelanggan.php?id=<?php echo $pelanggan['id']; ?>" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>