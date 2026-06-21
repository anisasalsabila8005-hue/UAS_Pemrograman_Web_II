<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function count_produk()
    {
        return $this->db->count_all('produk');
    }

    public function count_pelanggan()
    {
        return $this->db->count_all('pelanggan');
    }

    public function count_order($role, $id_sales)
    {
        if ($role === 'sales') {
            $this->db->where('id_sales', $id_sales);
        }
        return $this->db->count_all_results('sales_order');
    }

    public function count_order_by_status($status, $role, $id_sales)
    {
        $this->db->where('status', $status);
        if ($role === 'sales') {
            $this->db->where('id_sales', $id_sales);
        }
        return $this->db->count_all_results('sales_order');
    }

    public function order_terbaru($role, $id_sales)
    {
        $this->db->select('so.*, p.nama_pelanggan, u.nama as nama_sales');
        $this->db->from('sales_order so');
        $this->db->join('pelanggan p', 'p.id = so.id_pelanggan');
        $this->db->join('users u',     'u.id = so.id_sales');
        if ($role === 'sales') {
            $this->db->where('so.id_sales', $id_sales);
        }
        $this->db->order_by('so.created_at', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result();
    }
}