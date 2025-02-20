<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <a href="<?= base_url('karyawan/create');?>" class="btn btn-primary mb-3 btn-sm"><i class="fas fa-plus"></i> Tambah
        Data</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5><?= $title;?></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Shift</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($karyawan as $k): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $k['username']; ?></td>
                            <td><?= $k['nama']; ?></td>
                            <td><?= $k['posisi']; ?></td>
                            <td><?= $k['nama_shift'] ?: '-'; ?></td>
                            <td>
                                <span class="badge badge-<?= $k['status'] == 'Aktif' ? 'success' : 'danger'; ?>">
                                    <?= $k['status']; ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= site_url('karyawan/edit/'.$k['id_karyawan']); ?>"
                                    class="btn btn-sm btn-warning" title="Edit Karyawan">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= site_url('karyawan/delete/'.$k['id_karyawan']); ?>"
                                    class="btn btn-sm btn-danger" title="Hapus Karyawan"
                                    onclick="return confirm('Yakin ingin menghapus karyawan ini?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php
$this->load->view('templates/footer');
?>