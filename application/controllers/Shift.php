<?php
class Shift extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Shift_model');
        $this->load->library('form_validation');
        // Cek apakah session user ada
        if (!$this->session->userdata('username')) {
            // Jika tidak ada session user, redirect ke halaman login
            redirect('auth');
        }
    }

    // Menampilkan daftar shift
    public function index() {
        $data['title'] = 'Daftar Shift';
        $data['shifts'] = $this->Shift_model->get_all_shifts();
        $this->load->view('shift/index', $data);
    }

    // Membuat shift baru
    public function create() {
        $data['title'] = 'Tambah Shift';

        $this->form_validation->set_rules('nama_shift', 'Nama Shift', 'required');
        $this->form_validation->set_rules('hari_kerja', 'Hari Kerja', 'required');
        $this->form_validation->set_rules('jam_masuk_shift', 'Jam Masuk Shift', 'required');
        $this->form_validation->set_rules('jam_keluar_shift', 'Jam Keluar Shift', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('shift/create', $data);
        } else {
            $data_insert = array(
                'nama_shift' => $this->input->post('nama_shift'),
                'hari_kerja' => $this->input->post('hari_kerja'),
                'jam_masuk_shift' => $this->input->post('jam_masuk_shift'),
                'jam_keluar_shift' => $this->input->post('jam_keluar_shift')
            );
            $this->Shift_model->create_shift($data_insert);
            redirect('shift');
        }
    }

    // Mengedit shift
    public function edit($id) {
        $data['title'] = 'Edit Shift';
        $data['shift'] = $this->Shift_model->get_shift_by_id($id);

        if (empty($data['shift'])) {
            show_404();
        }

        $this->form_validation->set_rules('nama_shift', 'Nama Shift', 'required');
        $this->form_validation->set_rules('hari_kerja', 'Hari Kerja', 'required');
        $this->form_validation->set_rules('jam_masuk_shift', 'Jam Masuk Shift', 'required');
        $this->form_validation->set_rules('jam_keluar_shift', 'Jam Keluar Shift', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('shift/edit', $data);
        } else {
            $update_data = array(
                'nama_shift' => $this->input->post('nama_shift'),
                'hari_kerja' => $this->input->post('hari_kerja'),
                'jam_masuk_shift' => $this->input->post('jam_masuk_shift'),
                'jam_keluar_shift' => $this->input->post('jam_keluar_shift')
            );
            $this->Shift_model->update_shift($id, $update_data);
            redirect('shift');
        }
    }

    // Menghapus shift
    public function delete($id) {
        $this->Shift_model->delete_shift($id);
        redirect('shift');
    }
}
?>