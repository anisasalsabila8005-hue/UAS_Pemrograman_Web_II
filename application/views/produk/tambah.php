<h1 class="h3 mb-4 text-gray-800"><i class="fas fa-plus-circle mr-2"></i>Tambah Produk</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="<?= site_url('produk/simpan') ?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Produk <span class="text-danger">*</span></label>
                        <input type="text" name="kode_produk" class="form-control"
                               value="<?= set_value('kode_produk') ?>"
                               placeholder="Contoh: PRD-009" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" name="nama_produk" class="form-control"
                               value="<?= set_value('nama_produk') ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="harga" class="form-control"
                               value="<?= set_value('harga') ?>" min="0" required>
                    </div>
                    <div class="form-group">
                        <label>Stok <span class="text-danger">*</span></label>
                        <input type="number" name="stok" class="form-control"
                               value="<?= set_value('stok', 0) ?>" min="0" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2"><?= set_value('keterangan') ?></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <a href="<?= site_url('produk') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary float-right">
                <i class="fas fa-save mr-1"></i> Simpan
            </button>
        </form>
    </div>
</div>