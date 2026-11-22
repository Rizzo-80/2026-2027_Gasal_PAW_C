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

$query = mysqli_query($conn, "SELECT * FROM supplier");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Supplier</title>
</head>
<body> 
    <a href="Tambah_Supplier.php">Tambah Data</a>
    <br><br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['telp']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td>
                <a href="edit_supplier.php?id=<?php echo $data['id']; ?>">Edit</a> |
                <a href="hapus_supplier.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>