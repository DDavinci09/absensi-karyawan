<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5><?= $title;?></h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Karyawan</th>
                        <th>Shift</th>
                        <th>Status</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($absensi as $data): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['nama_shift']; ?></td>
                        <td><?= $data['status']; ?></td>
                        <td><?= $data['jam_masuk'] ? $data['jam_masuk'] : '-'; ?></td>
                        <td><?= $data['jam_keluar'] ? $data['jam_keluar'] : '-'; ?></td>
                        <td><?= $data['keterangan'] ? $data['keterangan'] : '-'; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
$this->load->view('templates/footer');
?>