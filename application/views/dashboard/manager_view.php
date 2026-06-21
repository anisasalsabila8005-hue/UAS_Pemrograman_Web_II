<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard Manager</h1>
    
    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pendapatan Bulan Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 50.000.000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Menu Laporan</h6>
        </div>
        <div class="card-body text-center">
            <p>Gunakan menu di samping atau tombol di bawah untuk mengunduh laporan penjualan.</p>
            <a href="<?= base_url('sales_order/laporan'); ?>" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50"><i class="fas fa-file-pdf"></i></span>
                <span class="text">Download Laporan Penjualan (PDF)</span>
            </a>
        </div>
    </div>
</div>