<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sales_order_model');
        $this->load->model('pelanggan_model');
        $this->load->model('produk_model');
    }

    public function index()
    {
        $data['title'] = 'Daftar Sales Order';
        $id_sales      = $this->session->userdata('id_user');

        // Sales hanya lihat ordernya sendiri; admin & manager lihat semua
        if ($this->role === 'sales') {
            $data['orders'] = $this->sales_order_model->get_all_by_sales($id_sales);
        } else {
            $data['orders'] = $this->sales_order_model->get_all();
        }
        $this->render('sales_order/index', $data);
    }

    public function tambah()
    {
        // Manager tidak bisa buat order
        $this->cek_role(['admin', 'sales']);
        $data['title']     = 'Buat Sales Order Baru';
        $data['pelanggan'] = $this->pelanggan_model->get_all();
        $data['produk']    = $this->produk_model->get_all_aktif();
        $this->render('sales_order/tambah', $data);
    }

    public function simpan()
    {
        $this->cek_role(['admin', 'sales']);

        // Ambil data dari form
        $id_pelanggan = $this->input->post('id_pelanggan');
        $catatan      = $this->input->post('catatan');
        $id_produk    = $this->input->post('id_produk');
        $jumlah       = $this->input->post('jumlah');

        // Validasi minimal ada 1 produk
        if (empty($id_produk) || !is_array($id_produk)) {
            $this->session->set_flashdata('error', 'Harus menambahkan minimal 1 produk.');
            redirect('sales_order/tambah');
            return;
        }

        // Generate nomor order
        $no_order = $this->sales_order_model->generate_no_order();

        // Hitung total dan siapkan detail
        $total_harga = 0;
        $details     = [];
        foreach ($id_produk as $key => $pid) {
            if (empty($pid)) continue;
            $produk       = $this->produk_model->get_by_id($pid);
            $qty          = (int)$jumlah[$key];
            $harga_satuan = $produk->harga;
            $subtotal     = $harga_satuan * $qty;
            $total_harga += $subtotal;
            $details[] = [
                'id_produk'    => $pid,
                'jumlah'       => $qty,
                'harga_satuan' => $harga_satuan,
                'subtotal'     => $subtotal,
            ];
        }

        // Simpan header
        $order = [
            'no_order'     => $no_order,
            'tanggal'      => date('Y-m-d'),
            'id_pelanggan' => $id_pelanggan,
            'id_sales'     => $this->session->userdata('id_user'),
            'total_harga'  => $total_harga,
            'status'       => 'draft',
            'catatan'      => $catatan,
        ];
        $id_order = $this->sales_order_model->insert_order($order);

        // Simpan detail & kurangi stok
        foreach ($details as $d) {
            $d['id_order'] = $id_order;
            $this->sales_order_model->insert_detail($d);
            $this->produk_model->kurangi_stok($d['id_produk'], $d['jumlah']);
        }

        $this->session->set_flashdata('success', "Sales Order {$no_order} berhasil dibuat.");
        redirect('sales_order');
    }

    public function detail($id)
    {
        $order = $this->sales_order_model->get_by_id($id);
        if (!$order) show_404();

        // Sales hanya boleh lihat ordernya sendiri
        if ($this->role === 'sales' && $order->id_sales != $this->session->userdata('id_user')) {
            show_error('Anda tidak memiliki akses ke order ini.', 403);
        }

        $data['title']   = 'Detail Sales Order';
        $data['order']   = $order;
        $data['details'] = $this->sales_order_model->get_detail($id);
        $this->render('sales_order/detail', $data);
    }

    public function ubah_status($id)
    {
        $this->cek_role(['admin', 'sales']);
        $status = $this->input->post('status');
        $allowed = ['draft', 'dikirim', 'selesai', 'dibatalkan'];
        if (in_array($status, $allowed)) {
            $this->sales_order_model->update_status($id, $status);
            $this->session->set_flashdata('success', 'Status order berhasil diubah.');
        }
        redirect('sales_order/detail/' . $id);
    }

    public function hapus($id)
    {
        $this->cek_role('admin');
        $this->sales_order_model->delete_order($id);
        $this->session->set_flashdata('success', 'Sales order berhasil dihapus.');
        redirect('sales_order');
    }

    /**
     * AJAX: Ambil harga produk berdasarkan ID
     */
    public function get_produk($id)
    {
        $produk = $this->produk_model->get_by_id($id);
        echo json_encode($produk);
    }
}