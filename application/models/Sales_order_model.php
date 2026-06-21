<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order_model extends CI_Model {

    public function get_all()
    {
        $this->db->select('so.*, p.nama_pelanggan, u.nama as nama_sales');
        $this->db->from('sales_order so');
        $this->db->join('pelanggan p', 'p.id = so.id_pelanggan');
        $this->db->join('users u',     'u.id = so.id_sales');
        $this->db->order_by('so.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_all_by_sales($id_sales)
    {
        $this->db->select('so.*, p.nama_pelanggan, u.nama as nama_sales');
        $this->db->from('sales_order so');
        $this->db->join('pelanggan p', 'p.id = so.id_pelanggan');
        $this->db->join('users u',     'u.id = so.id_sales');
        $this->db->where('so.id_sales', $id_sales);
        $this->db->order_by('so.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        $this->db->select('so.*, p.nama_pelanggan, p.alamat, p.telepon, u.nama as nama_sales');
        $this->db->from('sales_order so');
        $this->db->join('pelanggan p', 'p.id = so.id_pelanggan');
        $this->db->join('users u',     'u.id = so.id_sales');
        $this->db->where('so.id', $id);
        return $this->db->get()->row();
    }

    public function get_detail($id_order)
    {
        $this->db->select('sod.*, pr.nama_produk, pr.kode_produk');
        $this->db->from('sales_order_detail sod');
        $this->db->join('produk pr', 'pr.id = sod.id_produk');
        $this->db->where('sod.id_order', $id_order);
        return $this->db->get()->result();
    }

    public function insert_order($data)
    {
        $this->db->insert('sales_order', $data);
        return $this->db->insert_id();
    }

    public function insert_detail($data)
    {
        return $this->db->insert('sales_order_detail', $data);
    }

    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update('sales_order', ['status' => $status]);
    }

    public function delete_order($id)
    {
        // Detail akan terhapus otomatis karena ON DELETE CASCADE
        $this->db->where('id', $id);
        return $this->db->delete('sales_order');
    }

    public function generate_no_order()
    {
        $prefix = 'SO-' . date('Ymd') . '-';
        $this->db->like('no_order', $prefix, 'after');
        $this->db->order_by('no_order', 'DESC');
        $last = $this->db->get('sales_order')->row();
        if ($last) {
            $parts = explode('-', $last->no_order);
            $urut  = (int)end($parts) + 1;
        } else {
            $urut = 1;
        }
        return $prefix . str_pad($urut, 3, '0', STR_PAD_LEFT);
    }
}