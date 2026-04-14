<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memastikan library database sudah terload
        $this->load->database();
        // Memanggil model anggota
        $this->load->model('Anggota_model');
        // Memanggil helper URL untuk base_url() dan redirect()
        $this->load->helper('url');
    }

    // 1. Menampilkan Tabel Data Anggota (Soal No. 2)
    public function index() {
        $data['anggota'] = $this->Anggota_model->get_all();
        
        $this->load->view('templates/header'); 
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }

    // 2. Menampilkan Form Input Anggota (Soal No. 1)
    public function tambah() {
        $this->load->view('templates/header');
        $this->load->view('anggota/tambah');
        $this->load->view('templates/footer');
    }

    // 3. Proses Simpan Data ke Database
    public function simpan() {
        $data = [
            'nomor_anggota' => $this->input->post('nomor_anggota'),
            'nama'          => $this->input->post('nama'),
            'alamat'        => $this->input->post('alamat'),
            'telepon'       => $this->input->post('telepon'),
            'email'         => $this->input->post('email'),
            'tgl_daftar'    => $this->input->post('tgl_daftar'),
            'status'        => 'aktif' // Otomatis aktif sesuai instruksi soal
        ];
        
        $this->Anggota_model->insert($data);
        redirect('anggota');
    }

    // 4. Menampilkan Form Edit
    public function edit($id) {
        $data['anggota'] = $this->Anggota_model->get_by_id($id);
        
        // Cek jika data ditemukan
        if (empty($data['anggota'])) {
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer');
    }

    // 5. Proses Update Data
    public function update() {
        $id = $this->input->post('id_anggota');
        $data = [
            'nomor_anggota' => $this->input->post('nomor_anggota'),
            'nama'          => $this->input->post('nama'),
            'alamat'        => $this->input->post('alamat'),
            'telepon'       => $this->input->post('telepon'),
            'email'         => $this->input->post('email'),
            'status'        => $this->input->post('status')
        ];
        
        $this->Anggota_model->update($id, $data);
        redirect('anggota');
    }

    // 6. Proses Hapus Data
    public function hapus($id) {
        $this->Anggota_model->delete($id);
        redirect('anggota');
    }
}