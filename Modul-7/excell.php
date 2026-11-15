<?php
include 'koneksi.php';
$tglawal   = $_GET['mulai'] ?? '';
$tglakhir = $_GET['selesai'] ?? '';

if ($tglawal == '' || $tglakhir == '') {
    die("Tanggal belum dipilih.");
}
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=rekap_penjualan_" . $tglawal . "_sd_" . $tglakhir . ".xls");

$sql = "SELECT DATE(waktu_transaksi) AS tgl, SUM(total) AS total_harian FROM transaksi WHERE waktu_transaksi BETWEEN ? AND ? GROUP BY DATE(waktu_transaksi)ORDER BY tgl ASC";
$harian= mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($harian, "ss", $tglawal, $tglakhir);
mysqli_stmt_execute($harian);
$hasil = mysqli_stmt_get_result($harian);

$sql2 = "SELECT COUNT(DISTINCT pelanggan_id) AS jml, SUM(total) AS total_semua FROM transaksi WHERE waktu_transaksi BETWEEN ? AND ?";
$qt2 = mysqli_prepare($conn, $sql2);
mysqli_stmt_bind_param($qt2, "ss", $tglawal, $tglakhir);
mysqli_stmt_execute($qt2);
$r2 = mysqli_fetch_assoc(mysqli_stmt_get_result($qt2));
?>
<h3>Rekap Laporan Penjualan <?= htmlspecialchars($tglawal) ?> sampai <?= htmlspecialchars($tglakhir) ?></h3>
<table border="1">
    <tr>
        <th>No</th>
        <th>Total Pendapatan</th>
        <th>Tanggal Transaksi</th>
    </tr>
    <?php $no = 1; while ($r = mysqli_fetch_assoc($hasil)): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $r['total_harian'] ?></td>
        <td><?= $r['tgl'] ?></td>
    </tr>
    <?php endwhile; ?>
    <tr>
        <td colspan="2">Jumlah Pelanggan</td>
        <td><?= $r2['jml'] ?? 0 ?> Orang</td>
    </tr>
    <tr>
        <td colspan="2">Total Pendapatan</td>
        <td><?= $r2['total_semua'] ?? 0 ?></td>
    </tr>
</table>
