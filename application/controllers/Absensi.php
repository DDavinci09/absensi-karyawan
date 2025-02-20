<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Absensi_model');  // Pastikan model Absensi_model sudah ada
        // Cek apakah session user ada
        if (!$this->session->userdata('username')) {
            // Jika tidak ada session user, redirect ke halaman login
            redirect('auth');
        }
    }

    // Halaman utama absensi
    public function index()
    {
        $id_karyawan = $this->session->userdata('id_karyawan');  // ID karyawan yang sedang login
        $karyawan = $this->Absensi_model->getKaryawanWithShift($id_karyawan);  // Mengambil data karyawan beserta shift
        $absensi = $this->Absensi_model->getAbsensiByKaryawan($id_karyawan);  // Mengambil data absensi karyawan hari ini

        // Menampilkan data absensi karyawan hari ini
        $data = [
            'karyawan' => $karyawan,
            'absensi' => $absensi,
            'title' => "Ambil Absensi",
            'absensi_hari_ini' => $absensi ? true : false,  // Menambahkan flag apakah absensi sudah ada
        ];

        $this->load->view('absensi/index', $data);  // Load view untuk tampilan absensi
    }

    // Proses untuk menambah absensi
    public function tambahAbsensi()
    {
        $id_karyawan = $this->session->userdata('id_karyawan');  // ID karyawan yang sedang login
        $status = $this->input->post('status');  // Status absensi (Hadir, Terlambat, Izin, Tidak Hadir)
        $shift = $this->input->post('shift');  // Shift karyawan
        $keterangan = $this->input->post('keterangan');  // Keterangan jika statusnya 'Izin'

        // Validasi untuk status 'Izin', jika statusnya 'Izin' maka keterangan harus diisi
        if ($status == 'Izin' && empty($keterangan)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Keterangan izin wajib diisi!
                </div>');
            redirect('absensi');
        }

        // Data untuk absensi baru
        $data = [
            'id_karyawan' => $id_karyawan,
            'status' => $status,
            'keterangan' => ($status == 'Izin' ? $keterangan : NULL),
            'shift' => $shift,
            'tanggal' => date('Y-m-d'),  // Tanggal absensi
            'jam_masuk' => ($status == 'Izin' || $status == 'Tidak Hadir' ? NULL : date('H:i:s'))  // Jika status 'Izin' atau 'Tidak Hadir', maka jam masuk NULL
        ];

        // Simpan absensi
        $this->Absensi_model->tambahAbsensi($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Absensi berhasil!
            </div>');
        redirect('absensi');
    }

    // Proses update jam keluar
    public function updateJamKeluar()
    {
        $id_absensi = $this->input->post('id_absensi');  // ID absensi yang akan diupdate
        $jam_keluar = date('H:i:s');  // Jam keluar (sekarang)

        // Data untuk update jam keluar
        $data = [
            'jam_keluar' => $jam_keluar,  // Update jam keluar
        ];

        // Update absensi
        $this->Absensi_model->updateAbsensi($id_absensi, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jam keluar berhasil diupdate!
            </div>');
        redirect('absensi');
    }

    public function riwayatAbsensi()
    {
        $id_karyawan = $this->session->userdata('id_karyawan'); // ID karyawan yang sedang login
        $karyawan = $this->Absensi_model->getKaryawanById($id_karyawan); // Ambil data karyawan
        $riwayat_absensi = $this->Absensi_model->getRiwayatAbsensi($id_karyawan); // Ambil riwayat absensi karyawan

        // Menampilkan data riwayat absensi karyawan
        $data = [
            'karyawan' => $karyawan,
            'riwayat_absensi' => $riwayat_absensi,
            'title' => "Riwayat Absensi"
        ];

        $this->load->view('absensi/riwayatAbsensi', $data); // Tampilkan view riwayat absensi
    }

    // Halaman untuk menampilkan semua data absensi
    public function absensiKaryawan()
    {
        // Ambil semua data absensi
        $absensi = $this->Absensi_model->getAllAbsensi();

        // Menyiapkan data untuk ditampilkan
        $data = [
            'title' => 'Absensi Karyawan',
            'absensi' => $absensi  // Data absensi
        ];

        // Load view dengan data absensi
        $this->load->view('absensi/absensiKaryawan', $data);
    }

    
}