<h1 class="h3 mb-4 text-gray-800"><i class="fas fa-user-edit mr-2"></i>Edit User</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="<?= site_url('users/update/' . $user->id) ?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control"
                               value="<?= set_value('nama', $user->nama) ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?= $user->username ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password" class="form-control"
                               placeholder="Kosongkan jika tidak ingin ubah password">
                        <small class="text-muted">Min. 6 karakter jika diisi</small>
                    </div>
                    <div class="form-group">
                        <label>Role <span class="text-danger">*</span></label>
                        <select name="role" class="form-control" required>
                            <option value="admin"   <?= ($user->role=='admin')   ? 'selected' : '' ?>>Admin</option>
                            <option value="sales"   <?= ($user->role=='sales')   ? 'selected' : '' ?>>Sales</option>
                            <option value="manager" <?= ($user->role=='manager') ? 'selected' : '' ?>>Manager</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <a href="<?= site_url('users') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-warning float-right">
                <i class="fas fa-save mr-1"></i> Update
            </button>
        </form>
    </div>
</div>