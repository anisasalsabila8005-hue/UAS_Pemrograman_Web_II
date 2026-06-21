<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard Sales</h1>
    
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url('sales_order/tambah'); ?>" style="text-decoration: none;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Aksi</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">Buat Order Baru</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-plus-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Order Terakhir Saya</h6>
        </div>
        <div class="card-body">
            <p>Tampilkan daftar 5 order terakhir Anda di sini menggunakan tabel.</p>
        </div>
    </div>
</div>