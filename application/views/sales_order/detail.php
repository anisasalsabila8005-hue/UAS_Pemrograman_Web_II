<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800"><i class="fas fa-file-invoice mr-2"></i>Detail Sales Order</h1>
    <a href="<?= site_url('sales_order') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left mr-1"></i> Kembali
    </a>
</div>

<div class="row">
    <!-- Info Order -->
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Order</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm table-borderless">
                    <tr><th width="40%">No Order</th><td><strong><?= $order->no_order ?></strong></td></tr>
                    <tr><th>Tanggal</th><td><?= date('d F Y', strtotime($order->tanggal)) ?></td></tr>
                    <tr><th>Sales</th><td><?= $order->nama_sales ?></td></tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <?php
                            $badge = [
                                'draft'      => 'secondary',
                                'dikirim'    => 'info',
                                'selesai'    => 'success',
                                'dibatalkan' => 'danger',
                            ];
                            $b = $badge[$order->status] ?? 'dark';
                            ?>
                            <span class="badge badge-pill badge-<?= $b ?> px-3 py-2">
                                <?= strtoupper($order->status) ?>
                            </span>
                        </td>
                    </tr>
                    <?php if ($order->catatan): ?>
                    <tr><th>Catatan</th><td><?= $order->catatan ?></td></tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Info Pelanggan -->
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Informasi Pelanggan</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm table-borderless">
                    <tr><th width="40%">Nama</th><td><?= $order->nama_pelanggan ?></td></tr>
                    <tr><th>Alamat</th><td><?= $order->alamat ?: '-' ?></td></tr>
                    <tr><th>Telepon</th><td><?= $order->telepon ?: '-' ?></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Detail Produk -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th class="text-right">Harga Satuan</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($details as $d): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d->kode_produk ?></td>
                        <td><?= $d->nama_produk ?></td>
                        <td class="text-right">Rp <?= number_format($d->harga_satuan, 0, ',', '.') ?></td>
                        <td class="text-center"><?= $d->jumlah ?></td>
                        <td class="text-right">Rp <?= number_format($d->subtotal, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5" class="text-right">TOTAL HARGA</th>
                        <th class="text-right text-danger">
                            Rp <?= number_format($order->total_harga, 0, ',', '.') ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Ubah Status (hanya admin & sales) -->
<?php if ($this->session->userdata('role') !== 'manager' && $order->status !== 'selesai' && $order->status !== 'dibatalkan'): ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-warning">Ubah Status Order</h6>
    </div>
    <div class="card-body">
        <form action="<?= site_url('sales_order/ubah_status/' . $order->id) ?>" method="POST"
              class="form-inline">
            <label class="mr-2">Status Baru:</label>
            <select name="status" class="form-control mr-2">
                <?php if ($order->status === 'draft'): ?>
                    <option value="dikirim">Dikirim</option>
                    <option value="dibatalkan">Dibatalkan</option>
                <?php elseif ($order->status === 'dikirim'): ?>
                    <option value="selesai">Selesai</option>
                    <option value="dibatalkan">Dibatalkan</option>
                <?php endif; ?>
            </select>
            <button type="submit" class="btn btn-warning">
                <i class="fas fa-exchange-alt mr-1"></i> Ubah Status
            </button>
        </form>
    </div>
</div>
<?php endif; ?>