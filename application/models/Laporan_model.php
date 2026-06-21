<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    // ── Laporan per periode ──────────────────────────────
    public function per_periode($tgl_awal, $tgl_akhir)
    {
        $this->db->select('so.no_order, so.tanggal, so.total_harga, so.status,
                           p.nama_pelanggan, u.nama as nama_sales');
        $this->db->from('sales_order so');
        $this->db->join('pelanggan p', 'p.id = so.id_pelanggan');
        $this->db->join('users u',     'u.id = so.id_sales');
        $this->db->where('so.tanggal >=', $tgl_awal);
        $this->db->where('so.tanggal <=', $tgl_akhir);
        $this->db->where('so.status !=',  'dibatalkan');
        $this->db->order_by('so.tanggal', 'ASC');
        return $this->db->get()->result();
    }

    public function total_periode($tgl_awal, $tgl_akhir)
    {
        $this->db->select_sum('total_harga', 'grand_total');
        $this->db->where('tanggal >=', $tgl_awal);
        $this->db->where('tanggal <=', $tgl_akhir);
        $this->db->where('status !=',  'dibatalkan');
        return $this->db->get('sales_order')->row();
    }

    // ── Laporan per sales ────────────────────────────────
    public function per_sales($tgl_awal, $tgl_akhir)
    {
        $this->db->select('u.nama as nama_sales, u.username,
                           COUNT(so.id) as total_order,
                           SUM(so.total_harga) as total_penjualan');
        $this->db->from('sales_order so');
        $this->db->join('users u', 'u.id = so.id_sales');
        $this->db->where('so.tanggal >=', $tgl_awal);
        $this->db->where('so.tanggal <=', $tgl_akhir);
        $this->db->where('so.status !=',  'dibatalkan');
        $this->db->group_by('so.id_sales');
        $this->db->order_by('total_penjualan', 'DESC');
        return $this->db->get()->result();
    }

    // ── Laporan per produk ───────────────────────────────
    public function per_produk($tgl_awal, $tgl_akhir)
    {
        $this->db->select('pr.kode_produk, pr.nama_produk,
                           SUM(sod.jumlah) as total_qty,
                           SUM(sod.subtotal) as total_penjualan');
        $this->db->from('sales_order_detail sod');
        $this->db->join('produk pr',       'pr.id = sod.id_produk');
        $this->db->join('sales_order so',  'so.id = sod.id_order');
        $this->db->where('so.tanggal >=', $tgl_awal);
        $this->db->where('so.tanggal <=', $tgl_akhir);
        $this->db->where('so.status !=',  'dibatalkan');
        $this->db->group_by('sod.id_produk');
        $this->db->order_by('total_penjualan', 'DESC');
        return $this->db->get()->result();
    }
}