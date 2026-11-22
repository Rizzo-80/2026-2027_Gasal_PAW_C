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

$query = mysqli_query($conn, "SELECT * FROM user");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h2>Data User</h2>
    <a href="tambah_user.php">Tambah User</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID User</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>HP</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
        <?php while($user = mysqli_fetch_array($query)){ ?>
        <tr>
            <td><?php echo $user['id_user']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['nama']; ?></td>
            <td><?php echo $user['alamat']; ?></td>
            <td><?php echo $user['hp']; ?></td>
            <td><?php echo $user['level']; ?></td>
            <td>
                <a href="edit_user.php?id=<?php echo $user['id_user']; ?>">Edit</a> |
                <a href="hapus_user.php?id=<?php echo $user['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>

    </table>
</body>
</html>