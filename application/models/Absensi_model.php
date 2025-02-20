<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model {

    public function getKaryawanWithShift($id_karyawan)
    {
        $this->db->select('karyawan.*, shift.nama_shift, shift.jam_masuk_shift');
        $this->db->from('karyawan');
        $this->db->join('shift', 'karyawan.id_shift = shift.id_shift', 'left');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        return $this->db->get()->row_array();
    }

    public function getAbsensiByKaryawan($id_karyawan)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->where('DATE(tanggal)', date('Y-m-d'));  // Ambil data hari ini
        $this->db->order_by('id_absensi', 'DESC');
        return $this->db->get('absensi')->row_array();
    }

    // Di model Absensi_model
    public function getRiwayatAbsensi($id_karyawan)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        return $this->db->get('absensi')->result_array(); // Mengambil semua data absensi
    }

    // Mengambil semua data absensi dengan join karyawan dan shift
    public function getAllAbsensi()
    {
        $this->db->select('absensi.*, karyawan.nama, karyawan.id_shift, shift.nama_shift');  // Pilih data absensi, nama karyawan, id_shift, dan nama_shift
        $this->db->from('absensi');
        $this->db->join('karyawan', 'karyawan.id_karyawan = absensi.id_karyawan');  // Join dengan tabel karyawan
        $this->db->join('shift', 'shift.id_shift = karyawan.id_shift');  // Join dengan tabel shift
        $this->db->order_by('absensi.tanggal', 'DESC');  // Urutkan berdasarkan tanggal
        return $this->db->get()->result_array();  // Mengembalikan hasil query dalam bentuk array
    }

    // Tambah data absensi baru
    public function tambahAbsensi($data)
    {
        return $this->db->insert('absensi', $data);
    }

    // Update data absensi (misalnya untuk jam keluar)
    public function updateAbsensi($id_absensi, $data)
    {
        $this->db->where('id_absensi', $id_absensi);
        return $this->db->update('absensi', $data);
    }

    // Ambil data karyawan berdasarkan ID
    public function getKaryawanById($id_karyawan)
    {
        return $this->db->get_where('karyawan', ['id_karyawan' => $id_karyawan])->row_array();
    }
}