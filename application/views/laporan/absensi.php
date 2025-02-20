<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <a onclick="printAbsensi()" class="btn btn-success mb-3 btn-sm text-light"><i class="fas fa-print"></i> Cetak</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5><?= $title;?> Data Absensi Karyawan</h5>
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

<script>
function printAbsensi() {
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Cetak Data Absensi</title>');
    printWindow.document.write('<style>');
    printWindow.document.write('table { width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; }');
    printWindow.document.write('th, td { border: 1px solid black; padding: 8px; text-align: left; }');
    printWindow.document.write('th { background-color: #f2f2f2; }');
    printWindow.document.write('</style></head><body>');
    printWindow.document.write('<h2 style="text-align: center;">Laporan Data Absensi Karyawan</h2>');
    printWindow.document.write(document.getElementById('dataTable').outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>

<?php
$this->load->view('templates/footer');
?>