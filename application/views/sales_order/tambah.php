<h1 class="h3 mb-4 text-gray-800"><i class="fas fa-plus-circle mr-2"></i>Buat Sales Order Baru</h1>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
<?php endif; ?>

<form action="<?= site_url('sales_order/simpan') ?>" method="POST" id="formOrder">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Order</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value="<?= date('d/m/Y') ?>" readonly>
                        <small class="text-muted">Tanggal order otomatis (hari ini)</small>
                    </div>
                    <div class="form-group">
                        <label>Sales</label>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('nama') ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pelanggan <span class="text-danger">*</span></label>
                        <select name="id_pelanggan" class="form-control" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            <?php foreach ($pelanggan as $p): ?>
                            <option value="<?= $p->id ?>"><?= $p->nama_pelanggan ?> (<?= $p->kode_pelanggan ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan" class="form-control" rows="2" placeholder="Catatan tambahan (opsional)"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Produk -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
            <button type="button" class="btn btn-success btn-sm" onclick="tambahBaris()">
                <i class="fas fa-plus mr-1"></i> Tambah Baris
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="tableDetail">
                    <thead>
                        <tr>
                            <th width="35%">Produk</th>
                            <th width="10%">Stok</th>
                            <th width="20%">Harga Satuan</th>
                            <th width="10%">Jumlah</th>
                            <th width="20%">Subtotal</th>
                            <th width="5%"></th>
                        </tr>
                    </thead>
                    <tbody id="bodyDetail">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-right">TOTAL HARGA</th>
                            <th id="grandTotal" class="text-right text-danger">Rp 0</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= site_url('sales_order') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary float-right">
                <i class="fas fa-save mr-1"></i> Simpan Order
            </button>
        </div>
    </div>
</form>

<script>
const produkList = <?php
    $arr = [];
    foreach ($produk as $p) {
        $arr[] = [
            'id'    => $p->id,
            'kode'  => $p->kode_produk,
            'nama'  => $p->nama_produk,
            'harga' => (float)$p->harga,
            'stok'  => (int)$p->stok,
        ];
    }
    echo json_encode($arr);
?>;

let barisCount = 0;

function tambahBaris() {
    barisCount++;
    const tbody = document.getElementById('bodyDetail');

    let opts = '<option value="">-- Pilih Produk --</option>';
    produkList.forEach(p => {
        opts += `<option value="${p.id}" data-harga="${p.harga}" data-stok="${p.stok}">${p.kode} - ${p.nama} (Stok: ${p.stok})</option>`;
    });

    const row = document.createElement('tr');
    row.id = `row_${barisCount}`;
    row.innerHTML = `
        <td>
            <select name="id_produk[]" class="form-control form-control-sm"
                    onchange="piliProduk(this, ${barisCount})" required>
                ${opts}
            </select>
        </td>
        <td>
            <input type="text" id="stok_${barisCount}" class="form-control form-control-sm" readonly>
        </td>
        <td>
            <div class="input-group input-group-sm">
                <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                <input type="text" id="harga_${barisCount}" class="form-control" readonly>
            </div>
        </td>
        <td>
            <input type="number" name="jumlah[]" id="jumlah_${barisCount}"
                   class="form-control form-control-sm" value="1" min="1"
                   onchange="hitungSubtotal(${barisCount})"
                   onkeyup="hitungSubtotal(${barisCount})">
        </td>
        <td id="subtotal_${barisCount}" class="text-right align-middle font-weight-bold">Rp 0</td>
        <td class="text-center align-middle">
            <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(${barisCount})">
                <i class="fas fa-times"></i>
            </button>
        </td>
    `;
    tbody.appendChild(row);
}

function piliProduk(sel, idx) {
    const opt  = sel.options[sel.selectedIndex];
    const harga = parseFloat(opt.getAttribute('data-harga')) || 0;
    const stok  = parseInt(opt.getAttribute('data-stok'))    || 0;
    document.getElementById(`harga_${idx}`).value = formatRupiah(harga);
    document.getElementById(`stok_${idx}`).value  = stok;
    document.getElementById(`jumlah_${idx}`).max  = stok;
    hitungSubtotal(idx);
}

function hitungSubtotal(idx) {
    const hargaStr = document.getElementById(`harga_${idx}`).value.replace(/\./g, '');
    const harga    = parseFloat(hargaStr) || 0;
    const jumlah   = parseInt(document.getElementById(`jumlah_${idx}`).value) || 0;
    const subtotal = harga * jumlah;
    document.getElementById(`subtotal_${idx}`).innerText = 'Rp ' + formatRupiah(subtotal);
    hitungTotal();
}

function hitungTotal() {
    let total = 0;
    document.querySelectorAll('[id^="subtotal_"]').forEach(el => {
        const val = el.innerText.replace('Rp ', '').replace(/\./g, '').replace(/,/g, '');
        total += parseFloat(val) || 0;
    });
    document.getElementById('grandTotal').innerText = 'Rp ' + formatRupiah(total);
}

function hapusBaris(idx) {
    document.getElementById(`row_${idx}`).remove();
    hitungTotal();
}

function formatRupiah(angka) {
    return Math.round(angka).toLocaleString('id-ID');
}

document.getElementById('formOrder').addEventListener('submit', function(e) {
    const rows = document.querySelectorAll('[name="id_produk[]"]');
    if (rows.length === 0) {
        e.preventDefault();
        alert('Harap tambahkan minimal 1 produk!');
        return false;
    }
    let valid = true;
    rows.forEach(sel => { if (!sel.value) valid = false; });
    if (!valid) {
        e.preventDefault();
        alert('Pastikan semua baris produk sudah dipilih!');
        return false;
    }
});

window.onload = function() { tambahBaris(); };
</script>