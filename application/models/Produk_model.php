<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        return $this->db->order_by('kode_produk', 'ASC')->get('produk')->result();
    }

    public function get_all_aktif()
    {
        return $this->db->where('stok >', 0)->order_by('nama_produk', 'ASC')->get('produk')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('produk', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('produk', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('produk', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('produk');
    }

    public function kurangi_stok($id_produk, $jumlah)
    {
        $this->db->set('stok', 'stok - ' . (int)$jumlah, FALSE);
        $this->db->where('id', $id_produk);
        $this->db->update('produk');
    }

    public function tambah_stok($id_produk, $jumlah)
    {
        $this->db->set('stok', 'stok + ' . (int)$jumlah, FALSE);
        $this->db->where('id', $id_produk);
        $this->db->update('produk');
    }
}