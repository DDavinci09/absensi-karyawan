<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->model('Shift_model');
        // Cek apakah session user ada
        if (!$this->session->userdata('username')) {
            // Jika tidak ada session user, redirect ke halaman login
            redirect('auth');
        }
    }

    // Menampilkan daftar karyawan
    public function index() {
        $data['title'] = 'Daftar Karyawan';
        $data['karyawan'] = $this->Karyawan_model->get_all_karyawan();
        
        $this->load->view('karyawan/index', $data);
    }

    // Form tambah karyawan
    public function create() {
        $data['title'] = 'Tambah Karyawan';
        $data['shifts'] = $this->Shift_model->get_all_shifts();
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[karyawan.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('karyawan/create', $data);
        } else {
            $insert_data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'posisi' => $this->input->post('posisi'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'id_shift' => $this->input->post('id_shift'),
                'status' => $this->input->post('status'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level' => "Karyawan"
            ];

            $this->Karyawan_model->insert_karyawan($insert_data);
            $this->session->set_flashdata('success', 'Karyawan berhasil ditambahkan!');
            redirect('karyawan');
        }
    }

    // Form edit karyawan
    public function edit($id) {
        $data['title'] = 'Edit Karyawan';
        $data['karyawan'] = $this->Karyawan_model->get_karyawan_by_id($id);
        $data['shifts'] = $this->Shift_model->get_all_shifts();

        if (!$data['karyawan']) {
            show_404();
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('karyawan/edit', $data);
        } else {
            $update_data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'posisi' => $this->input->post('posisi'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'id_shift' => $this->input->post('id_shift'),
                'status' => $this->input->post('status'),
                'username' => $this->input->post('username'),
                'level' => "Karyawan"
            ];

            // Jika ada password baru, update password
            if (!empty($this->input->post('password'))) {
                $update_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $this->Karyawan_model->update_karyawan($id, $update_data);
            $this->session->set_flashdata('success', 'Data karyawan berhasil diperbarui!');
            redirect('karyawan');
        }
    }

    // Hapus karyawan
    public function delete($id) {
        $this->Karyawan_model->delete_karyawan($id);
        $this->session->set_flashdata('success', 'Karyawan berhasil dihapus!');
        redirect('karyawan');
    }
}