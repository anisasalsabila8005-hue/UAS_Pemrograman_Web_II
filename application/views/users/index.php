<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <?= $this->session->flashdata('error') ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800"><i class="fas fa-user-cog mr-2"></i>Manajemen User</h1>
    <a href="<?= site_url('users/tambah') ?>" class="btn btn-primary">
        <i class="fas fa-plus mr-1"></i> Tambah User
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Last Login</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($users as $u): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $u->nama ?></td>
                        <td><?= $u->username ?></td>
                        <td>
                            <?php
                            $roleColor = ['admin'=>'danger','sales'=>'primary','manager'=>'success'];
                            $rc = $roleColor[$u->role] ?? 'secondary';
                            ?>
                            <span class="badge badge-<?= $rc ?>"><?= strtoupper($u->role) ?></span>
                        </td>
                        <td><?= $u->last_login ? date('d/m/Y H:i', strtotime($u->last_login)) : '-' ?></td>
                        <td class="text-center">
                            <a href="<?= site_url('users/edit/' . $u->id) ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <?php if ($u->id != $this->session->userdata('id_user')): ?>
                            <a href="<?= site_url('users/hapus/' . $u->id) ?>" class="btn btn-sm btn-danger"
                               onclick="return confirm('Hapus user ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>