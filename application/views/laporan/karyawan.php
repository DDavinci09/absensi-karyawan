<?php
$this->load->view('templates/header');
$this->load->view('templates/sidebar');
$this->load->view('templates/topbar');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <a onclick="printKaryawan()" class="btn btn-success mb-3 btn-sm text-light"><i class="fas fa-print"></i> Cetak</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5><?= $title;?> Data Karyawan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Posisi</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Shift</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($karyawan as $k): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $k['nama']; ?></td>
                            <td><?= $k['jenis_kelamin']; ?></td>
                            <td><?= $k['posisi']; ?></td>
                            <td><?= $k['no_hp']; ?></td>
                            <td><?= $k['alamat']; ?></td>
                            <td><?= $k['nama_shift'] ?: '-'; ?></td>
                            <td><?= $k['status']; ?></td>
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

<script>
function printKaryawan() {
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Cetak Data Karyawan</title>');
    printWindow.document.write('<style>');
    printWindow.document.write('table { width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; }');
    printWindow.document.write('th, td { border: 1px solid black; padding: 8px; text-align: left; }');
    printWindow.document.write('th { background-color: #f2f2f2; }');
    printWindow.document.write('</style></head><body>');
    printWindow.document.write('<h2 style="text-align: center;">Laporan Data Karyawan</h2>');
    printWindow.document.write(document.getElementById('dataTable').outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>

<?php
$this->load->view('templates/footer');
?>