<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= $judul ?></title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; margin: 20px; }
        h2 { text-align: center; margin-bottom: 5px; }
        .subtitle { text-align: center; margin-bottom: 20px; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #4e73df; color: white; padding: 8px; text-align: left; }
        td { padding: 6px 8px; border-bottom: 1px solid #ddd; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        tfoot td, tfoot th { font-weight: bold; background: #f0f0f0; }
        .header-box { border: 1px solid #ddd; padding: 10px; margin-bottom: 15px; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>

<div class="header-box">
    <h2>PT MAJU JAYA</h2>
    <p class="subtitle"><?= $judul ?><br>
    Periode: <?= date('d/m/Y', strtotime($tgl_awal)) ?> s/d <?= date('d/m/Y', strtotime($tgl_akhir)) ?><br>
    Dicetak: <?= date('d/m/Y H:i:s') ?>
    </p>
</div>

<div class="no-print" style="margin-bottom:15px;">
    <button onclick="window.print()" style="padding:8px 16px;background:#4e73df;color:white;border:none;cursor:pointer;border-radius:4px;">
        🖨️ Cetak / Simpan PDF
    </button>
    <button onclick="window.close()" style="padding:8px 16px;background:#ccc;border:none;cursor:pointer;border-radius:4px;margin-left:8px;">
        Tutup
    </button>
</div>

<?php if ($jenis === 'periode'): ?>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>No Order</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Sales</th>
            <th class="text-right">Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($laporan as $l): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $l->no_order ?></td>
            <td><?= date('d/m/Y', strtotime($l->tanggal)) ?></td>
            <td><?= $l->nama_pelanggan ?></td>
            <td><?= $l->nama_sales ?></td>
            <td class="text-right">Rp <?= number_format($l->total_harga, 0, ',', '.') ?></td>
            <td><?= strtoupper($l->status) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><strong>GRAND TOTAL</strong></td>
            <td class="text-right"><strong>Rp <?= number_format($total->grand_total ?? 0, 0, ',', '.') ?></strong></td>
            <td></td>
        </tr>
    </tfoot>
</table>

<?php elseif ($jenis === 'sales'): ?>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Sales</th>
            <th>Username</th>
            <th class="text-center">Jumlah Order</th>
            <th class="text-right">Total Penjualan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($laporan as $l): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $l->nama_sales ?></td>
            <td><?= $l->username ?></td>
            <td class="text-center"><?= $l->total_order ?></td>
            <td class="text-right">Rp <?= number_format($l->total_penjualan, 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php elseif ($jenis === 'produk'): ?>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Nama Produk</th>
            <th class="text-center">Total Qty</th>
            <th class="text-right">Total Penjualan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($laporan as $l): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $l->kode_produk ?></td>
            <td><?= $l->nama_produk ?></td>
            <td class="text-center"><?= $l->total_qty ?></td>
            <td class="text-right">Rp <?= number_format($l->total_penjualan, 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>

</body>
</html>