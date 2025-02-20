<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    // Halaman Login
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/index');  // Halaman login
        } else {
            $this->_Auth();  // Proses login
        }
    }

    // Fungsi untuk proses login
    private function _Auth()
    {
        // Ambil input dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Cek apakah username adalah 'admin' dan password '123'
        if ($username == 'admin' && $password == '123') {
            // Jika username admin dan password 123, set levelnya menjadi admin
            $data = [
                'username' => $username,
                'level' => 'Admin' // Set level admin
            ];

            // Set session
            $this->session->set_userdata($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Login berhasil, Selamat Datang Admin!
                </div>');
            redirect('Dashboard/index');  // Redirect ke halaman admin
        } else {
            // Jika bukan admin, cek apakah username terdaftar di tabel karyawan

            // Query langsung ke tabel karyawan untuk cek data username
            $this->db->where('username', $username);
            $karyawan = $this->db->get('karyawan')->row_array();

            // Jika karyawan ada
            if ($karyawan) {
                // Cek password
                if (password_verify($password, $karyawan['password'])) {
                    // Jika password benar, set session berdasarkan data karyawan
                    $data = [
                        'id_karyawan' => $karyawan['id_karyawan'],
                        'username' => $karyawan['username'],
                        'level' => $karyawan['level'] // Set level Karyawan
                    ];

                    // Set session
                    $this->session->set_userdata($data);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Login berhasil, Selamat Datang Karyawan!
                        </div>');
                    redirect('Dashboard/index');  // Redirect ke halaman karyawan
                } else {
                    // Jika password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password salah!
                        </div>');
                    redirect('Auth');
                }
            } else {
                // Jika username tidak terdaftar
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Username tidak terdaftar!
                    </div>');
                redirect('Auth');
            }
        }
    }

    // Proses Logout
    public function logout()
    {
        // Hapus session untuk logout
        $this->session->sess_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Anda telah Logout!
        </div>');
        redirect('Auth');  // Redirect ke halaman utama
    }
}