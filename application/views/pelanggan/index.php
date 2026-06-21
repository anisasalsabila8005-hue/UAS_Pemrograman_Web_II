<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800"><i class="fas fa-users mr-2"></i>Data Pelanggan</h1>
    <a href="<?= site_url('pelanggan/tambah') ?>" class="btn btn-primary">
        <i class="fas fa-plus mr-1"></i> Tambah Pelanggan
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
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pelanggan)): ?>
                        <?php $no = 1; foreach ($pelanggan as $p): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><code><?= $p->kode_pelanggan ?></code></td>
                            <td><?= $p->nama_pelanggan ?></td>
                            <td><?= $p->alamat ?: '-' ?></td>
                            <td><?= $p->telepon ?: '-' ?></td>
                            <td><?= $p->email ?: '-' ?></td>
                            <td class="text-center">
                                <a href="<?= site_url('pelanggan/edit/' . $p->id) ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= site_url('pelanggan/hapus/' . $p->id) ?>" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Hapus pelanggan ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data pelanggan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>