<?php
class Shift_model extends CI_Model {

    // Konstruktor
    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mendapatkan data shift
    public function get_all_shifts() {
        $query = $this->db->get('shift');
        return $query->result_array();  // Menggunakan result array
    }

    // Fungsi untuk mendapatkan shift berdasarkan id
    public function get_shift_by_id($id) {
        $this->db->where('id_shift', $id);
        $query = $this->db->get('shift');
        return $query->row_array();  // Menggunakan row array
    }

    // Fungsi untuk menambah shift
    public function create_shift($data) {
        return $this->db->insert('shift', $data);
    }

    // Fungsi untuk mengedit shift
    public function update_shift($id, $data) {
        $this->db->where('id_shift', $id);
        return $this->db->update('shift', $data);
    }

    // Fungsi untuk menghapus shift
    public function delete_shift($id) {
        $this->db->where('id_shift', $id);
        return $this->db->delete('shift');
    }
}
?>