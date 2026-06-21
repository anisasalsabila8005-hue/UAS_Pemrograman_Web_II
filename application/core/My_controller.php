<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $role;

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect('login');
        }
        $this->role = $this->session->userdata('role');
    }

    protected function cek_role($allowed_roles)
    {
        if (!is_array($allowed_roles)) {
            $allowed_roles = [$allowed_roles];
        }
        if (!in_array($this->role, $allowed_roles)) {
            show_error('Anda tidak memiliki akses ke halaman ini.', 403, 'Akses Ditolak');
        }
    }

    protected function render($view, $data = [])
    {
        $this->load->view('templates/header',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar',  $data);
        $this->load->view($view,               $data);
        $this->load->view('templates/footer',  $data);
    }
}