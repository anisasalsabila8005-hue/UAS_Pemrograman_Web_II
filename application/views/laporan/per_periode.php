<h1 class="h3 mb-4 text-gray-800"><i class="fas fa-chart-bar mr-2"></i>Laporan Per Periode</h1>

<!-- Filter Form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="GET" action="<?= site_url('laporan/per_periode') ?>" class="form-inline">
            <div class="form-group mr-3">
                <label class="mr-2">Dari</label>
                <input type="date" name="tgl_awal" class="form-control" value="<?= $tgl_awal ?>">
            </div>
            <div class="form-group mr-3">
                <label class="mr-2">Sampai</label>
                <input type="date" name="tgl_akhir" class="form-control" value="<?= $tgl_akhir ?>">
            </div>
            <button type="submit" class="btn btn-primary mr-2">
                <i class="fas fa-search mr-1"></i> Filter
            </button>
            <a href="<?= site_url('laporan/cetak_pdf/periode?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir) ?>"
               target="_blank" class="btn btn-danger">
                <i class="fas fa-file-pdf mr-1"></i> Cetak PDF
            </a>
        </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Periode: <?= date('d/m/Y', strtotime($tgl_awal)) ?> &mdash; <?= date('d/m/Y', strtotime($tgl_akhir)) ?>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Order</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Sales</th>
                        <th class="text-right">Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($laporan)): ?>
                        <?php $no = 1; foreach ($laporan as $l): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $l->no_order ?></td>
                            <td><?= date('d/m/Y', strtotime($l->tanggal)) ?></td>
                            <td><?= $l->nama_pelanggan ?></td>
                            <td><?= $l->nama_sales ?></td>
                            <td class="text-right">Rp <?= number_format($l->total_harga, 0, ',', '.') ?></td>
                            <td><span class="badge badge-success"><?= strtoupper($l->status) ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="text-center text-muted py-4">Tidak ada data pada periode ini.</td></tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr class="table-primary">
                        <th colspan="5" class="text-right">GRAND TOTAL</th>
                        <th class="text-right">
                            Rp <?= number_format($total->grand_total ?? 0, 0, ',', '.') ?>
                        </th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>