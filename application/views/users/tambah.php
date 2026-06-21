<h1 class="h3 mb-4 text-gray-800"><i class="fas fa-user-plus mr-2"></i>Tambah User</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="<?= site_url('users/simpan') ?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control"
                               value="<?= set_value('nama') ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control"
                               value="<?= set_value('username') ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control"
                               placeholder="Min. 6 karakter" required>
                    </div>
                    <div class="form-group">
                        <label>Role <span class="text-danger">*</span></label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin"   <?= set_select('role','admin') ?>>Admin</option>
                            <option value="sales"   <?= set_select('role','sales') ?>>Sales</option>
                            <option value="manager" <?= set_select('role','manager') ?>>Manager</option>
                        </select>
                        <small class="text-muted">
                            Admin: kelola semua data | Sales: buat & lihat order | Manager: lihat laporan
                        </small>
                    </div>
                </div>
            </div>
            <hr>
            <a href="<?= site_url('users') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary float-right">
                <i class="fas fa-save mr-1"></i> Simpan
            </button>
        </form>
    </div>
</div>