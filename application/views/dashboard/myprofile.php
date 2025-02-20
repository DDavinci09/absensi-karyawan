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
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td><?= $karyawan['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?= $karyawan['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                            <td>Posisi</td>
                            <td><?= $karyawan['posisi']; ?></td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td><?= $karyawan['no_hp'] ? $karyawan['no_hp'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $karyawan['alamat'] ? $karyawan['alamat'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><?= $karyawan['status']; ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><?= $karyawan['username']; ?></td>
                        </tr>
                        <tr>
                            <td>Shift</td>
                            <td><?= $karyawan['nama_shift']; ?></td>
                        </tr>
                        <tr>
                            <td>Hari Kerja</td>
                            <td><?= $karyawan['hari_kerja']; ?></td>
                        </tr>
                        <tr>
                            <td>Jam Masuk</td>
                            <td><?= $karyawan['jam_masuk_shift']; ?></td>
                        </tr>
                        <tr>
                            <td>Jam Keluar</td>
                            <td><?= $karyawan['jam_keluar_shift']; ?></td>
                        </tr>
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