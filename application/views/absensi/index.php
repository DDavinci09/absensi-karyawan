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
            <?php if ($absensi): ?>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th width="30%">Shift</th>
                        <td><?= $absensi['shift']; ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?= $absensi['status']; ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td><?= $absensi['keterangan'] ? $absensi['keterangan'] : '-'; ?></td>
                    </tr>
                    <tr>
                        <th>Jam Masuk</th>
                        <td><?= $absensi['jam_masuk'] ? $absensi['jam_masuk'] : '-'; ?></td>
                    </tr>
                    <tr>
                        <th>Jam Keluar</th>
                        <td>
                            <?php if ($absensi['status'] != 'Izin' && $absensi['status'] != 'Tidak Hadir'): ?>
                            <?= $absensi['jam_keluar'] ? $absensi['jam_keluar'] : '-'; ?>
                            <?php else: ?>
                            -
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Aksi</th>
                        <td>
                            <?php 
                        // Menampilkan tombol Update Jam Keluar hanya jika status absensi bukan 'Izin' atau 'Tidak Hadir' dan jam_keluar belum diisi
                        if ($absensi['status'] != 'Izin' && $absensi['status'] != 'Tidak Hadir') {
                            if (empty($absensi['jam_keluar'])) {
                                echo '<button class="btn btn-warning" data-toggle="modal" data-target="#updateJamKeluarModal"
                                    data-id="' . $absensi['id_absensi'] . '">Update Jam Keluar</button>';
                            } else {
                                echo '-';
                            }
                        } else {
                            echo '-';
                        }
                    ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php else: ?>
            <p class="text-center text-danger">Anda belum absen hari ini.</p>
            <?php endif; ?>


            <?php if (!$absensi_hari_ini): ?>
            <!-- Button untuk menambah absensi -->
            <button class="btn btn-primary mt-4" data-toggle="modal" data-target="#tambahAbsensiModal">Tambah
                Absensi</button>
            <?php else: ?>
            <!-- Jika sudah ada absensi hari ini, tampilkan pesan atau tidak tampilkan tombol -->
            <p>Absensi sudah ditambahkan untuk hari ini.</p>
            <?php endif; ?>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal: Tambah Absensi -->
<div class="modal fade" id="tambahAbsensiModal" tabindex="-1" aria-labelledby="tambahAbsensiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahAbsensiModalLabel">Tambah Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('absensi/tambahAbsensi'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Hadir">Hadir</option>
                            <option value="Terlambat">Terlambat</option>
                            <option value="Izin">Izin</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="shift">Shift</label>
                        <input type="text" class="form-control" id="shift" name="shift"
                            value="<?= $karyawan['nama_shift']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jam_masuk_shift">Jam Masuk</label>
                        <input type="text" class="form-control" id="jam_masuk_shift" name="jam_masuk_shift"
                            value="<?= $karyawan['jam_masuk_shift']; ?>" readonly>
                    </div>
                    <div class="form-group" id="keterangan-container" style="display: none;">
                        <label for="keterangan">Keterangan (Jika Izin)</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                            placeholder="Masukkan keterangan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Absensi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Update Jam Keluar -->
<div class="modal fade" id="updateJamKeluarModal" tabindex="-1" aria-labelledby="updateJamKeluarModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateJamKeluarModalLabel">Update Jam Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('absensi/updateJamKeluar'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_absensi" name="id_absensi">
                    <div class="form-group">
                        <label for="jam_keluar">Jam Keluar</label>
                        <input type="time" class="form-control" id="jam_keluar" name="jam_keluar"
                            value="<?= date('H:i'); ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update Jam Keluar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Edit Absensi -->
<div class="modal fade" id="editAbsensiModal" tabindex="-1" aria-labelledby="editAbsensiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAbsensiModalLabel">Edit Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('absensi/updateAbsensi'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="edit_id_absensi" name="id_absensi">
                    <div class="form-group">
                        <label for="edit_status">Status</label>
                        <select class="form-control" id="edit_status" name="status" required>
                            <option value="Hadir">Hadir</option>
                            <option value="Terlambat">Terlambat</option>
                            <option value="Izin">Izin</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                    </div>
                    <div class="form-group" id="edit_keterangan-container" style="display: none;">
                        <label for="edit_keterangan">Keterangan (Jika Izin)</label>
                        <input type="text" class="form-control" id="edit_keterangan" name="keterangan"
                            placeholder="Masukkan keterangan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update Absensi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$this->load->view('templates/footer');
?>