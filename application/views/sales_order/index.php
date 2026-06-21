<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle mr-2"></i><?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="fas fa-exclamation-circle mr-2"></i><?= $this->session->flashdata('error') ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800"><i class="fas fa-file-invoice mr-2"></i>Daftar Sales Order</h1>
    <?php if ($this->session->userdata('role') !== 'manager'): ?>
    <a href="<?= site_url('sales_order/tambah') ?>" class="btn btn-primary">
        <i class="fas fa-plus mr-1"></i> Buat  Sales Order Baru
    </a>
    <?php endif; ?>
</div>

<div class="card shadow mb-4">
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
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php $no = 1; foreach ($orders as $o): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><strong><?= $o->no_order ?></strong></td>
                            <td><?= date('d/m/Y', strtotime($o->tanggal)) ?></td>
                            <td><?= $o->nama_pelanggan ?></td>
                            <td><?= $o->nama_sales ?></td>
                            <td class="text-right">Rp <?= number_format($o->total_harga, 0, ',', '.') ?></td>
                            <td class="text-center">
                                <?php
                                $badge = [
                                    'draft'      => 'secondary',
                                    'dikirim'    => 'info',
                                    'selesai'    => 'success',
                                    'dibatalkan' => 'danger',
                                ];
                                $b = $badge[$o->status] ?? 'dark';
                                ?>
                                <span class="badge badge-pill badge-<?= $b ?>">
                                    <?= strtoupper($o->status) ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="<?= site_url('sales_order/detail/' . $o->id) ?>"
                                   class="btn btn-sm btn-info" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <?php if ($this->session->userdata('role') === 'admin'): ?>
                                <a href="<?= site_url('sales_order/hapus/' . $o->id) ?>"
                                   class="btn btn-sm btn-danger" title="Hapus"
                                   onclick="return confirm('Hapus order ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                Belum ada data sales order.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>                  