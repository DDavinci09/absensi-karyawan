<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Absensi_model');  // Pastikan model Absensi_model sudah ada
        $this->load->model('Karyawan_model');
        $this->load->model('Shift_model');
        // Cek apakah session user ada
        if (!$this->session->userdata('username')) {
            // Jika tidak ada session user, redirect ke halaman login
            redirect('auth');
        }
    }

    // Halaman untuk menampilkan semua data absensi
    public function LaporanAbsensi()
    {
        // Ambil semua data absensi
        $absensi = $this->Absensi_model->getAllAbsensi();

        // Menyiapkan data untuk ditampilkan
        $data = [
            'title' => 'Laporan',
            'absensi' => $absensi  // Data absensi
        ];

        // Load view dengan data absensi
        $this->load->view('laporan/absensi', $data);
    }

    // Menampilkan daftar karyawan
    public function LaporanKaryawan() {
        $data['title'] = 'Laporan';
        $data['karyawan'] = $this->Karyawan_model->get_all_karyawan();
        
        $this->load->view('laporan/karyawan', $data);
    }

    // Menampilkan daftar shift
    public function LaporanShift() {
        $data['title'] = 'Laporan';
        $data['shifts'] = $this->Shift_model->get_all_shifts();
        $this->load->view('laporan/shift', $data);
    }

    
}