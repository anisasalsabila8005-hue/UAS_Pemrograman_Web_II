<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->cek_role(['admin', 'manager']);
        $this->load->model('laporan_model');
    }

    public function index()
    {
        redirect('laporan/per_periode');
    }

    // ── Laporan per periode ──────────────────────────────
    public function per_periode()
    {
        $data['title']  = 'Laporan Per Periode';
        $tgl_awal  = $this->input->get('tgl_awal')  ?: date('Y-m-01');
        $tgl_akhir = $this->input->get('tgl_akhir') ?: date('Y-m-d');
        $data['tgl_awal']  = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['laporan']   = $this->laporan_model->per_periode($tgl_awal, $tgl_akhir);
        $data['total']     = $this->laporan_model->total_periode($tgl_awal, $tgl_akhir);
        $this->render('laporan/per_periode', $data);
    }

    // ── Laporan per sales ────────────────────────────────
    public function per_sales()
    {
        $data['title']   = 'Laporan Per Sales';
        $tgl_awal  = $this->input->get('tgl_awal')  ?: date('Y-m-01');
        $tgl_akhir = $this->input->get('tgl_akhir') ?: date('Y-m-d');
        $data['tgl_awal']  = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['laporan']   = $this->laporan_model->per_sales($tgl_awal, $tgl_akhir);
        $this->render('laporan/per_sales', $data);
    }

    // ── Laporan per produk ───────────────────────────────
    public function per_produk()
    {
        $data['title']   = 'Laporan Per Produk';
        $tgl_awal  = $this->input->get('tgl_awal')  ?: date('Y-m-01');
        $tgl_akhir = $this->input->get('tgl_akhir') ?: date('Y-m-d');
        $data['tgl_awal']  = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['laporan']   = $this->laporan_model->per_produk($tgl_awal, $tgl_akhir);
        $this->render('laporan/per_produk', $data);
    }

    // ── Cetak PDF ────────────────────────────────────────
    public function cetak_pdf($jenis = 'periode')
    {
        $tgl_awal  = $this->input->get('tgl_awal')  ?: date('Y-m-01');
        $tgl_akhir = $this->input->get('tgl_akhir') ?: date('Y-m-d');

        // Load library DOMPDF (pastikan sudah diinstall via composer)
        // Alternatif: gunakan library mpdf atau tcpdf
        // Di sini menggunakan pendekatan HTML + browser print
        $data['tgl_awal']  = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['jenis']     = $jenis;

        if ($jenis === 'sales') {
            $data['laporan'] = $this->laporan_model->per_sales($tgl_awal, $tgl_akhir);
            $data['judul']   = 'Laporan Penjualan Per Sales';
        } elseif ($jenis === 'produk') {
            $data['laporan'] = $this->laporan_model->per_produk($tgl_awal, $tgl_akhir);
            $data['judul']   = 'Laporan Penjualan Per Produk';
        } else {
            $data['laporan'] = $this->laporan_model->per_periode($tgl_awal, $tgl_akhir);
            $data['total']   = $this->laporan_model->total_periode($tgl_awal, $tgl_akhir);
            $data['judul']   = 'Laporan Penjualan Per Periode';
        }

        // Load view cetak (tanpa template layout)
        $this->load->view('laporan/cetak_pdf', $data);
    }
}