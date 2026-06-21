<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->cek_role('admin'); // Hanya admin
        $this->load->model('pelanggan_model');
    }

    public function index()
    {
        $data['title']     = 'Data Pelanggan';
        $data['pelanggan'] = $this->pelanggan_model->get_all();
        $this->render('pelanggan/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pelanggan';
        $this->render('pelanggan/tambah', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('kode_pelanggan',  'Kode Pelanggan',  'required|trim|is_unique[pelanggan.kode_pelanggan]');
        $this->form_validation->set_rules('nama_pelanggan',  'Nama Pelanggan',  'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Tambah Pelanggan';
            $this->render('pelanggan/tambah', $data);
        } else {
            $insert = [
                'kode_pelanggan' => $this->input->post('kode_pelanggan'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'alamat'         => $this->input->post('alamat'),
                'telepon'        => $this->input->post('telepon'),
                'email'          => $this->input->post('email'),
            ];
            $this->pelanggan_model->insert($insert);
            $this->session->set_flashdata('success', 'Pelanggan berhasil ditambahkan.');
            redirect('pelanggan');
        }
    }

    public function edit($id)
    {
        $data['title']     = 'Edit Pelanggan';
        $data['pelanggan'] = $this->pelanggan_model->get_by_id($id);
        if (!$data['pelanggan']) show_404();
        $this->render('pelanggan/edit', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $data['title']     = 'Edit Pelanggan';
            $data['pelanggan'] = $this->pelanggan_model->get_by_id($id);
            $this->render('pelanggan/edit', $data);
        } else {
            $update = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'alamat'         => $this->input->post('alamat'),
                'telepon'        => $this->input->post('telepon'),
                'email'          => $this->input->post('email'),
            ];
            $this->pelanggan_model->update($id, $update);
            $this->session->set_flashdata('success', 'Pelanggan berhasil diperbarui.');
            redirect('pelanggan');
        }
    }

    public function hapus($id)
    {
        $this->pelanggan_model->delete($id);
        $this->session->set_flashdata('success', 'Pelanggan berhasil dihapus.');
        redirect('pelanggan');
    }
}