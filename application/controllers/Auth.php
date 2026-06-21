<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Pastikan nama model di sini sama dengan nama file di folder models
        $this->load->model('auth_model'); 
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Fungsi utama untuk menampilkan form login
    public function index()
    {
        if ($this->session->userdata('login')) {
            redirect('dashboard');
        }
        $this->load->view('auth/login');
    }

    // Fungsi untuk memproses data dari form login
    public function proses() 
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Gunakan nama model yang konsisten (huruf kecil semua sesuai load di construct)
        $user = $this->auth_model->cek_login($username, $password);

        if ($user) {
            $data = [
                'id_user'  => $user->id,
                'username' => $user->username,
                'nama'     => $user->nama,
                'role'     => $user->role,
                'login'    => TRUE
            ];
            
            $this->session->set_userdata($data);
            $this->auth_model->update_last_login($user->id);
            
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}