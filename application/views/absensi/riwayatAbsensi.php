<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <!-- DataTales Example -->
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
                        <th>Shift</th>
                        <th>Status</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($riwayat_absensi as $absensi): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $absensi['tanggal']; ?></td>
                        <td><?= $absensi['shift']; ?></td>
                        <td><?= $absensi['status']; ?></td>
                        <td><?= $absensi['jam_masuk'] ? $absensi['jam_masuk'] : '-'; ?></td>
                        <td><?= $absensi['jam_keluar'] ? $absensi['jam_keluar'] : '-'; ?></td>
                        <td><?= $absensi['keterangan'] ? $absensi['keterangan'] : '-'; ?></td>
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