<?php
include 'koneksi.php';

$tglawal   = $_GET['mulai'] ?? '';
$tglakhir = $_GET['selesai'] ?? '';
$tampil  = ($tglawal != '' && $tglakhir != '');

$rekap = [];
$label = [];
$nilai = [];
$jml_pelanggan = 0;
$total_pendapatan = 0;

if ($tampil) {
    $sql = "SELECT DATE(waktu_transaksi) AS tgl, SUM(total) AS total_harian FROM transaksi WHERE waktu_transaksi BETWEEN ? AND ? GROUP BY DATE(waktu_transaksi) ORDER BY tgl ASC";
    $harian= mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($harian, "ss", $tglawal, $tglakhir);
    mysqli_stmt_execute($harian);
    $hasil = mysqli_stmt_get_result($harian);

    while ($row = mysqli_fetch_assoc($hasil)) {
        $rekap[] = $row;
        $label[] = $row['tgl'];
        $nilai[] = (int) $row['total_harian'];
    }
    $sql2 = "SELECT COUNT(DISTINCT pelanggan_id) AS jml, SUM(total) AS total_semua FROM transaksi WHERE waktu_transaksi BETWEEN ? AND ?";
    $qt2 = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($qt2, "ss", $tglawal, $tglakhir);
    mysqli_stmt_execute($qt2);
    $r2 = mysqli_fetch_assoc(mysqli_stmt_get_result($qt2));

    $jml_pelanggan    = $r2['jml'] ?? 0;
    $total_pendapatan = $r2['total_semua'] ?? 0;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="no-print">
        <h2>Laporan Penjualan</h2>
        <form method="GET">
            <label>Dari : </label>
            <input type="date" name="mulai" value="<?= htmlspecialchars($tglawal) ?>" required>
            <br>
            <label>Sampai : </label>
            <input type="date" name="selesai" value="<?= htmlspecialchars($tglakhir) ?>" required>
            <br>
            <button type="submit">Tampilkan</button>
        </form>
        <?php if ($tampil): ?>
            <br>
            <button onclick="window.print()">Cetak</button>
            <button onclick="location.href='excell.php?mulai=<?= urlencode($tglawal) ?>&selesai=<?= urlencode($tglakhir) ?>'">Excel</button>
        <?php endif; ?>
    </div>
        <?php if ($tampil): ?>
            <?php if (count($rekap) == 0): ?>
                <p>Tidak ada transaksi pada rentang tanggal ini.</p>
            <?php else: ?>
                <h3>Grafik Penjualan<h3>
                <canvas id="grafik" width="700" height="300"></canvas>
                <script>
                    new Chart(document.getElementById('grafik'), {
                        type: 'bar',
                        data: {
                            labels: <?= json_encode($label) ?>,
                            datasets: [{
                                label: 'Total Pendapatan',
                                data: <?= json_encode($nilai) ?>
                            }]
                        },
                        options: {
                            responsive: false,
                            scales: {
                                x: { title: { display: true, text: 'Tanggal Transaksi' } },
                                y: { title: { display: true, text: 'Total Pendapatan (Rp)' }, beginAtZero: true }
                            }
                        }
                    });
                </script>
                <br>
                <table border="1" cellpadding="5" cellspacing="0" width="700">
                    <h3>Rekap Laporan Penjualan</h3>
                    <tr>
                        <th>No</th>
                        <th>Total Pendapatan</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                    <?php $no = 1; foreach ($rekap as $r): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>Rp <?= number_format($r['total_harian'], 0, ',', '.') ?></td>
                        <td><?= date('d M Y', strtotime($r['tgl'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <table border="1" cellpadding="5" cellspacing="0">
                    <h3>Total</h3>
                    <tr>
                        <th>Jumlah Pelanggan</th>
                        <th>Jumlah Pendapatan</th>
                    </tr>
                    <tr>
                        <td><?= $jml_pelanggan ?> Orang</td>
                        <td>Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></td>
                    </tr>
                </table>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>