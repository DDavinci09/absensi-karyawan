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

                <form action="<?= site_url('karyawan/edit/'.$karyawan['id_karyawan']); ?>" method="post">
                    <input type="hidden" name="id_karyawan" value="<?= $karyawan['id_karyawan']; ?>">

                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" name="nama" class="form-control" value="<?= $karyawan['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="Laki-Laki"
                                <?= $karyawan['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?>>Laki-Laki</option>
                            <option value="Perempuan"
                                <?= $karyawan['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Posisi</label>
                        <input type="text" name="posisi" class="form-control" value="<?= $karyawan['posisi']; ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control" value="<?= $karyawan['no_hp']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3"><?= $karyawan['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Shift</label>
                        <select name="id_shift" class="form-control" required>
                            <option value="">Pilih Shift</option>
                            <?php foreach ($shifts as $shift): ?>
                            <option value="<?= $shift['id_shift']; ?>"
                                <?= $shift['id_shift'] == $karyawan['id_shift'] ? 'selected' : ''; ?>>
                                <?= $shift['nama_shift']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Aktif" <?= $karyawan['status'] == 'Aktif' ? 'selected' : ''; ?>>Aktif
                            </option>
                            <option value="Nonaktif" <?= $karyawan['status'] == 'Nonaktif' ? 'selected' : ''; ?>>
                                Nonaktif</option>
                        </select>
                    </div>
                    <hr>
                    <h5 class="text-primary">Akun Karyawan</h5>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $karyawan['username']; ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Password Baru (Opsional)</label>
                        <input type="password" name="password" class="form-control">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="confirm_password" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?= site_url('karyawan'); ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-warning">Update</button>
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