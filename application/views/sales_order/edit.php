<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Sales Order</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data Transaksi</h6>
        </div>
        <div class="card-body">
            
            <form action="<?= base_url('sales_order/update'); ?>" method="POST">
                
                <input type="hidden" name="id_order" value="<?= $order->id_order; ?>">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kode Order</label>
                    <div class="col-sm-10">
                        <input type="text" name="kode_order" class="form-control" value="<?= $order->kode_order; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                    <div class="col-sm-10">
                        <input type="date" name="tanggal" class="form-control" value="<?= $order->tanggal_order; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID Pelanggan</label>
                    <div class="col-sm-10">
                        <input type="number" name="pelanggan_id" class="form-control" value="<?= $order->pelanggan_id; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID Sales</label>
                    <div class="col-sm-10">
                        <input type="number" name="sales_id" class="form-control" value="<?= $order->sales_id; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID Produk</label>
                    <div class="col-sm-10">
                        <input type="number" name="produk_id" class="form-control" value="<?= $order->produk_id; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah (Qty)</label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlah" class="form-control" value="<?= $order->jumlah; ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Total Harga</label>
                    <div class="col-sm-10">
                        <input type="number" name="total_harga" class="form-control" value="<?= intval($order->total_harga); ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status Pembayaran</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control" required>
                            <option value="Lunas" <?= ($order->status == 'Lunas') ? 'selected' : ''; ?>>Lunas</option>
                            <option value="Pending" <?= ($order->status == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-info text-white"><i class="fas fa-edit"></i> Update Transaksi</button>
                        <a href="<?= base_url('sales_order'); ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>