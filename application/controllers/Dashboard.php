<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // Cek apakah session user ada
        if (!$this->session->userdata('username')) {
            // Jika tidak ada session user, redirect ke halaman login
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard';

        // Ambil level user dari session
        $level = $this->session->userdata('level');
        $id_karyawan = $this->session->userdata('id_karyawan');

        if ($level === 'Admin') {
            // Dashboard untuk Admin

            // Menghitung total shift
            $query_shift = $this->db->query("SELECT COUNT(*) AS total FROM shift");
            $data['total_shift'] = $query_shift->row()->total;

            // Menghitung total karyawan
            $query_karyawan = $this->db->query("SELECT COUNT(*) AS total FROM karyawan");
            $data['total_karyawan'] = $query_karyawan->row()->total;

            // Menghitung total absensi
            $query_total_absensi = $this->db->query("SELECT COUNT(*) AS total FROM absensi");
            $data['total_absensi'] = $query_total_absensi->row()->total;

            // Menghitung total berdasarkan status absensi
            $statuses = ['Hadir', 'Terlambat', 'Izin', 'Tidak Hadir'];
            foreach ($statuses as $status) {
                $query = $this->db->query("SELECT COUNT(*) AS total FROM absensi WHERE status = '$status'");
                $data['total_' . strtolower(str_replace(' ', '_', $status))] = $query->row()->total;
            }

        } else {
            // Dashboard untuk Karyawan

            // Menghitung total absensi karyawan yang sedang login
            $query_total_absensi = $this->db->query("SELECT COUNT(*) AS total FROM absensi WHERE id_karyawan = $id_karyawan");
            $data['total_absensi'] = $query_total_absensi->row()->total;

            // Menghitung total berdasarkan status absensi karyawan
            $statuses = ['Hadir', 'Terlambat', 'Izin', 'Tidak Hadir'];
            foreach ($statuses as $status) {
                $query = $this->db->query("SELECT COUNT(*) AS total FROM absensi WHERE id_karyawan = $id_karyawan AND status = '$status'");
                $data['total_' . strtolower(str_replace(' ', '_', $status))] = $query->row()->total;
            }

        }
        // Load tampilan dashboard karyawan
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data); // View khusus Karyawan
        $this->load->view('templates/footer');
    }

    
    public function myProfile()
    {
        // Mengambil id_karyawan yang tersimpan di session
        $id_karyawan = $this->session->userdata('id_karyawan');
        
        // Cek apakah session id_karyawan ada
        if (!$id_karyawan) {
            // Jika session id_karyawan tidak ada, redirect ke halaman login
            redirect('auth');
        }

        // Query untuk mengambil data karyawan dan shift berdasarkan id_karyawan
        $this->db->from('karyawan');
        $this->db->join('shift', 'shift.id_shift = karyawan.id_shift', 'left'); // Join dengan tabel shift
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $query = $this->db->get();

        // Ambil hasil query
        $karyawan = $query->row_array();

        // Cek apakah data karyawan ditemukan
        if ($karyawan) {
            // Menampilkan data karyawan
            $data = [
                'karyawan' => $karyawan,
                'title' => 'My Profile'
            ];

            $this->load->view('dashboard/myprofile', $data); // Gantilah dengan view yang sesuai
        } else {
            // Jika data karyawan tidak ditemukan, redirect ke halaman login
            redirect('auth');
        }
    }
}