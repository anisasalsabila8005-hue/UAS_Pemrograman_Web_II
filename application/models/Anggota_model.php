<?php
class Anggota_model extends CI_Model {
    public function get_all() {
        return $this->db->get('anggota')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('anggota', $data);
    }

    // Ambil 1 data untuk diedit
    public function get_by_id($id) {
        return $this->db->get_where('anggota', ['id_anggota' => $id])->row_array();
    }

    // Fungsi Update
    public function update($id, $data) {
        $this->db->where('id_anggota', $id);
        return $this->db->update('anggota', $data);
    }

    // Fungsi Hapus
    public function delete($id) {
        $this->db->where('id_anggota', $id);
        return $this->db->delete('anggota');
    }
}