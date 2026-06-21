<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</h1>

<!-- Summary Cards Row -->
<div class="row">
    <!-- Total Order -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Sales Order</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_order ?></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-file-invoice fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Draft -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Draft</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $order_draft ?></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-pencil-alt fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dikirim -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Dikirim</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $order_dikirim ?></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-truck fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Selesai -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $order_selesai ?></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($this->session->userdata('role') === 'admin'): ?>
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Produk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_produk ?></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-boxes fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Pelanggan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pelanggan ?></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Recent Orders Table -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Order Terbaru</h6>
        <a href="<?= site_url('sales_order') ?>" class="btn btn-sm btn-primary">Lihat Semua</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No Order</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Sales</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($order_terbaru)): ?>
                        <?php foreach ($order_terbaru as $o): ?>
                        <tr>
                            <td><?= $o->no_order ?></td>
                            <td><?= date('d/m/Y', strtotime($o->tanggal)) ?></td>
                            <td><?= $o->nama_pelanggan ?></td>
                            <td><?= $o->nama_sales ?></td>
                            <td class="text-right">Rp <?= number_format($o->total_harga, 0, ',', '.') ?></td>
                            <td>
                                <span class="badge badge-pill badge-<?= $o->status ?>">
                                    <?= strtoupper($o->status) ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center text-muted">Belum ada data order.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>