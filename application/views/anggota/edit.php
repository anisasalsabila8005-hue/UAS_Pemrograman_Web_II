<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Anggota</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Perubahan Data</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('index.php/anggota/update') ?>" method="post">
                
                <input type="hidden" name="id_anggota" value="<?= $anggota['id_anggota'] ?>">

                <div class="form-group mb-3">
                    <label>Nomor Anggota</label>
                    <input type="text" name="nomor_anggota" class="form-control" value="<?= $anggota['nomor_anggota'] ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?= $anggota['nama'] ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required><?= $anggota['alamat'] ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?= $anggota['telepon'] ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $anggota['email'] ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="aktif" <?= ($anggota['status'] == 'aktif') ? 'selected' : '' ?>>Aktif</option>
                        <option value="tidak aktif" <?= ($anggota['status'] == 'tidak aktif') ? 'selected' : '' ?>>Tidak Aktif</option>
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">Update Data</button>
                    <a href="<?= base_url('index.php/anggota') ?>" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>