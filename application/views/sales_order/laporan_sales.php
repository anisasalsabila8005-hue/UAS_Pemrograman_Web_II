<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Penjualan</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="font-weight-bold text-primary m-0">Rekapitulasi Transaksi PT Maju Jaya</h5>
                <button onclick="window.print()" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-print fa-sm text-white-50"></i> Cetak Laporan
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th width="5%">No</th>
                            <th>Kode Order</th>
                            <th>Tanggal Transaksi</th>
                            <th>ID Pelanggan</th>
                            <th>ID Sales</th>
                            <th>ID Produk</th>
                            <th>Jumlah Qty</th>
                            <th>Total Pendapatan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($orders)): ?>
                            <?php $no=1; $grand_total=0; foreach($orders as $row): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->kode_order ?></td>
                                <td><?= date('d-m-Y', strtotime($row->tanggal_order)) ?></td>
                                <td><?= $row->pelanggan_id ?></td>
                                <td><?= $row->sales_id ?></td>
                                <td><?= $row->produk_id ?></td>
                                <td><?= $row->jumlah ?></td>
                                <td>Rp <?= number_format($row->total_harga, 0, ',', '.') ?></td>
                                <td>
                                    <span class="badge <?= ($row->status == 'Lunas') ? 'badge-success' : 'badge-warning' ?>">
                                        <?= $row->status ?>
                                    </span>
                                </td>
                            </tr>
                            <?php $grand_total += $row->total_harga; endforeach; ?>
                            <tr class="bg-light font-weight-bold">
                                <td colspan="7" class="text-right">Total Seluruh Penjualan:</td>
                                <td colspan="2" class="text-success">Rp <?= number_format($grand_total, 0, ',', '.') ?></td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" class="text-center">Belum ada data transaksi untuk dilaporkan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>