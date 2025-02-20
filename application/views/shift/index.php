<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <?php if ($this->session->userdata('level') == "Admin") { ?>
    <a href="<?= base_url('shift/create');?>" class="btn btn-primary mb-3 btn-sm"><i class="fas fa-plus"></i> Tambah
        Data</a>
    <?php } ?>
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
                            <th>Nama Shift</th>
                            <th>Hari Kerja</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;  foreach ($shifts as $shift): ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $shift['nama_shift']; ?></td>
                            <td><?php echo $shift['hari_kerja']; ?></td>
                            <td><?php echo $shift['jam_masuk_shift']; ?></td>
                            <td><?php echo $shift['jam_keluar_shift']; ?></td>
                            <td>
                                <?php if ($this->session->userdata('level') == 'Admin'): ?>
                                <a href="<?php echo site_url('shift/edit/'.$shift['id_shift']); ?>"
                                    class="btn btn-sm btn-warning" title="Edit Shift">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?php echo site_url('shift/delete/'.$shift['id_shift']); ?>"
                                    class="btn btn-sm btn-danger" title="Hapus Shift"
                                    onclick="return confirm('Yakin ingin menghapus shift ini?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <?php else: ?>
                                <button class="btn btn-sm btn-warning" title="Edit Shift" disabled>
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" title="Hapus Shift" disabled>
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <?php endif; ?>
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