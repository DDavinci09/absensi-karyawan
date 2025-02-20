<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets/');?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/');?>js/demo/datatables-demo.js"></script>

<script src="<?= base_url('assets/');?>js/script.js"></script>
<script src="<?= base_url('assets/');?>js/script-jabatan.js"></script>

<script>
// Menangani perubahan status pada form tambah absensi
document.getElementById('status').addEventListener('change', function() {
    var status = this.value;
    var keteranganContainer = document.getElementById('keterangan-container');
    if (status == 'Izin') {
        keteranganContainer.style.display = 'block';
    } else {
        keteranganContainer.style.display = 'none';
    }
});

// Menangani perubahan status pada form edit absensi
document.getElementById('edit_status').addEventListener('change', function() {
    var status = this.value;
    var keteranganContainer = document.getElementById('edit_keterangan-container');
    if (status == 'Izin') {
        keteranganContainer.style.display = 'block';
    } else {
        keteranganContainer.style.display = 'none';
    }
});

// Mengisi modal edit absensi dengan data absensi yang dipilih
$('#editAbsensiModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id_absensi = button.data('id');
    var status = button.data('status');
    var keterangan = button.data('keterangan');

    var modal = $(this);
    modal.find('#edit_id_absensi').val(id_absensi);
    modal.find('#edit_status').val(status);
    modal.find('#edit_keterangan').val(keterangan);
});

// Mengisi modal update jam keluar dengan id absensi
$('#updateJamKeluarModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id_absensi = button.data('id');

    var modal = $(this);
    modal.find('#id_absensi').val(id_absensi);
});
</script>



</body>

</html>