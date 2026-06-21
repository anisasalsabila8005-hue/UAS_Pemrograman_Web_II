<h1 class="h3 mb-4 text-gray-800"><i class="fas fa-user-plus mr-2"></i>Tambah Pelanggan</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="<?= site_url('pelanggan/simpan') ?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Pelanggan <span class="text-danger">*</span></label>
                        <input type="text" name="kode_pelanggan" class="form-control"
                               value="<?= set_value('kode_pelanggan') ?>"
                               placeholder="Contoh: PLG-005" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Pelanggan <span class="text-danger">*</span></label>
                        <input type="text" name="nama_pelanggan" class="form-control"
                               value="<?= set_value('nama_pelanggan') ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                               value="<?= set_value('email') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="telepon" class="form-control"
                               value="<?= set_value('telepon') ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="4"><?= set_value('alamat') ?></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <a href="<?= site_url('pelanggan') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary float-right">
                <i class="fas fa-save mr-1"></i> Simpan
            </button>
        </form>
    </div>
</div>