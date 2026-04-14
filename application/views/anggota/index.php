<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Anggota</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota Perpustakaan</h6>
        </div>
        <div class="card-body">
            
            <div class="mb-3">
                <a href="<?= base_url('index.php/anggota/tambah') ?>" class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Anggota
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Anggota</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tbody>
    <?php if(!empty($anggota)): ?>
        <?php $no=1; foreach($anggota as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nomor_anggota'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['telepon'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= date('d-m-Y', strtotime($row['tgl_daftar'])) ?></td>
            <td>
                <span class="badge <?= ($row['status'] == 'aktif') ? 'badge-success' : 'badge-danger' ?>">
                    <?= $row['status'] ?>
                </span>
            </td>
            <td>
                <a href="<?= base_url('index.php/anggota/edit/' . $row['id_anggota']) ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
                
                <a href="<?= base_url('index.php/anggota/hapus/' . $row['id_anggota']) ?>" 
                   class="btn btn-danger btn-sm" 
                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    <i class="fas fa-trash"></i> Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="9" class="text-center">Data masih kosong. Silakan klik tombol Tambah.</td>
        </tr>
    <?php endif; ?>
</tbody>
                </table>
            </div>
        </div>
    </div>
</div>