<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-success text-white">
                <h5 class="mb-0"><?= $title; ?></h5>
            </div>
            <div class="card-body">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <form action="<?= site_url('karyawan/create'); ?>" method="post">
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Posisi</label>
                        <input type="text" name="posisi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Shift</label>
                        <select name="id_shift" class="form-control" required>
                            <option value="">Pilih Shift</option>
                            <?php foreach ($shifts as $shift): ?>
                            <option value="<?= $shift['id_shift']; ?>"><?= $shift['nama_shift']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>
                    <hr>
                    <h5 class="text-primary">Akun Karyawan</h5>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?= site_url('karyawan'); ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
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