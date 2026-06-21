<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
    }

    public function index()
    {
        $data['title']          = 'Dashboard';
        $data['total_produk']   = $this->dashboard_model->count_produk();
        $data['total_pelanggan']= $this->dashboard_model->count_pelanggan();
        $data['total_order']    = $this->dashboard_model->count_order($this->role, $this->session->userdata('id_user'));
        $data['order_draft']    = $this->dashboard_model->count_order_by_status('draft',   $this->role, $this->session->userdata('id_user'));
        $data['order_dikirim']  = $this->dashboard_model->count_order_by_status('dikirim', $this->role, $this->session->userdata('id_user'));
        $data['order_selesai']  = $this->dashboard_model->count_order_by_status('selesai', $this->role, $this->session->userdata('id_user'));
        $data['order_terbaru']  = $this->dashboard_model->order_terbaru($this->role, $this->session->userdata('id_user'));
        $this->render('dashboard/index', $data);
    }
}