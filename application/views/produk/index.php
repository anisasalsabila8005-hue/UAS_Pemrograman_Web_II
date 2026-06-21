<!-- PRODUK INDEX VIEW -->
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800"><i class="fas fa-boxes mr-2"></i>Data Produk</h1>
    <a href="<?= site_url('produk/tambah') ?>" class="btn btn-primary">
        <i class="fas fa-plus mr-1"></i> Tambah Produk
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th class="text-right">Harga</th>
                        <th class="text-center">Stok</th>
                        <th>Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($produk)): ?>
                        <?php $no = 1; foreach ($produk as $p): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><code><?= $p->kode_produk ?></code></td>
                            <td><?= $p->nama_produk ?></td>
                            <td class="text-right">Rp <?= number_format($p->harga, 0, ',', '.') ?></td>
                            <td class="text-center">
                                <span class="badge badge-<?= $p->stok > 0 ? 'success' : 'danger' ?>">
                                    <?= $p->stok ?>
                                </span>
                            </td>
                            <td><?= $p->keterangan ?: '-' ?></td>
                            <td class="text-center">
                                <a href="<?= site_url('produk/edit/' . $p->id) ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= site_url('produk/hapus/' . $p->id) ?>" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Hapus produk ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data produk.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>