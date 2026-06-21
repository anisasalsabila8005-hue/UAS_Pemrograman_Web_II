<h1 class="h3 mb-4 text-gray-800"><i class="fas fa-edit mr-2"></i>Edit Produk</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="<?= site_url('produk/update/' . $produk->id) ?>" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode Produk</label>
                        <input type="text" class="form-control" value="<?= $produk->kode_produk ?>" readonly>
                        <small class="text-muted">Kode tidak dapat diubah</small>
                    </div>
                    <div class="form-group">
                        <label>Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" name="nama_produk" class="form-control"
                               value="<?= set_value('nama_produk', $produk->nama_produk) ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="harga" class="form-control"
                               value="<?= set_value('harga', $produk->harga) ?>" min="0" required>
                    </div>
                    <div class="form-group">
                        <label>Stok <span class="text-danger">*</span></label>
                        <input type="number" name="stok" class="form-control"
                               value="<?= set_value('stok', $produk->stok) ?>" min="0" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2"><?= set_value('keterangan', $produk->keterangan) ?></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <a href="<?= site_url('produk') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-warning float-right">
                <i class="fas fa-save mr-1"></i> Update
            </button>
        </form>
    </div>
</div>