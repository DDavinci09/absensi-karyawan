<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model {

    public function get_all_karyawan() {
        $this->db->select('karyawan.*, shift.nama_shift');
        $this->db->from('karyawan');
        $this->db->join('shift', 'karyawan.id_shift = shift.id_shift', 'left');
        return $this->db->get()->result_array();
    }

    public function get_karyawan_by_id($id) {
        return $this->db->get_where('karyawan', ['id_karyawan' => $id])->row_array();
    }

    public function insert_karyawan($data) {
        return $this->db->insert('karyawan', $data);
    }

    public function update_karyawan($id, $data) {
        $this->db->where('id_karyawan', $id);
        return $this->db->update('karyawan', $data);
    }

    public function delete_karyawan($id) {
        return $this->db->delete('karyawan', ['id_karyawan' => $id]);
    }

    public function get_all_shifts() {
        return $this->db->get('shift')->result_array();
    }
}