<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->cek_role('admin'); // Hanya admin
        $this->load->model('produk_model');
    }

    public function index()
    {
        $data['title']  = 'Data Produk';
        $data['produk'] = $this->produk_model->get_all();
        $this->render('produk/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Produk';
        $this->render('produk/tambah', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('kode_produk',  'Kode Produk',  'required|trim|is_unique[produk.kode_produk]');
        $this->form_validation->set_rules('nama_produk',  'Nama Produk',  'required|trim');
        $this->form_validation->set_rules('harga',        'Harga',        'required|numeric');
        $this->form_validation->set_rules('stok',         'Stok',         'required|integer');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Tambah Produk';
            $this->render('produk/tambah', $data);
        } else {
            $insert = [
                'kode_produk'  => $this->input->post('kode_produk'),
                'nama_produk'  => $this->input->post('nama_produk'),
                'harga'        => $this->input->post('harga'),
                'stok'         => $this->input->post('stok'),
                'keterangan'   => $this->input->post('keterangan'),
            ];
            $this->produk_model->insert($insert);
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan.');
            redirect('produk');
        }
    }

    public function edit($id)
    {
        $data['title']  = 'Edit Produk';
        $data['produk'] = $this->produk_model->get_by_id($id);
        if (!$data['produk']) show_404();
        $this->render('produk/edit', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('harga',       'Harga',       'required|numeric');
        $this->form_validation->set_rules('stok',        'Stok',        'required|integer');

        if ($this->form_validation->run() === FALSE) {
            $data['title']  = 'Edit Produk';
            $data['produk'] = $this->produk_model->get_by_id($id);
            $this->render('produk/edit', $data);
        } else {
            $update = [
                'nama_produk' => $this->input->post('nama_produk'),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok'),
                'keterangan'  => $this->input->post('keterangan'),
            ];
            $this->produk_model->update($id, $update);
            $this->session->set_flashdata('success', 'Produk berhasil diperbarui.');
            redirect('produk');
        }
    }

    public function hapus($id)
    {
        $this->produk_model->delete($id);
        $this->session->set_flashdata('success', 'Produk berhasil dihapus.');
        redirect('produk');
    }
}