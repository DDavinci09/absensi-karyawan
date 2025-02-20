<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-warning text-white">
                <h5 class="mb-0"><?= $title; ?></h5>
            </div>
            <div class="card-body">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <form action="<?php echo site_url('shift/edit/'.$shift['id_shift']); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_shift" class="font-weight-bold">Nama Shift</label>
                        <input type="text" name="nama_shift" id="nama_shift" class="form-control"
                            value="<?= $shift['nama_shift']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="hari_kerja" class="font-weight-bold">Hari Kerja</label>
                        <input type="text" name="hari_kerja" id="hari_kerja" class="form-control"
                            value="<?= $shift['hari_kerja']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="jam_masuk_shift" class="font-weight-bold">Jam Masuk Shift</label>
                        <input type="time" id="jam_masuk_shift" name="jam_masuk_shift" id="jam_masuk_shift"
                            class="form-control" value="<?= $shift['jam_masuk_shift']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="jam_keluar_shift" class="font-weight-bold">Jam Keluar Shift</label>
                        <input type="time" id="jam_keluar_shift" name="jam_keluar_shift" id="jam_keluar_shift"
                            class="form-control" value="<?= $shift['jam_keluar_shift']; ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= site_url('shift'); ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
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