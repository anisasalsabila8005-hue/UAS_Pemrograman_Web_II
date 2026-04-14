<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Form Input Anggota</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Anggota Baru</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('index.php/anggota/simpan') ?>" method="post">
                
                <div class="form-group mb-3">
                    <label>Nomor Anggota</label>
                    <input type="text" name="nomor_anggota" class="form-control" placeholder="Masukkan Nomor Anggota" required>
                </div>

                <div class="form-group mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                </div>

                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <label>Nomor Telepon</label>
                    <input type="text" name="telepon" class="form-control" placeholder="Contoh: 08123456789" required>
                </div>

                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="contoh@email.com" required>
                </div>

                <div class="form-group mb-3">
                    <label>Tanggal Daftar</label>
                    <input type="date" name="tgl_daftar" class="form-control" value="<?= date('Y-m-d') ?>" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                    <a href="<?= base_url('index.php/anggota') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>