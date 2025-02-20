<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard');?>">
            <div class="sidebar-brand-text mx-3">Sisfo Absensi</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Heading -->
        <div class="sidebar-heading mt-4">
            Menu
        </div>
        <!-- Nav Item - Dashboard -->
        <?php if ($title == 'Dashboard') : ?>
        <li class="nav-item active">
            <?php else : ?>
        <li class="nav-item">
            <?php endif;?>
            <a class="nav-link" href="<?= base_url('dashboard');?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span></a>
        </li>

        <?php if ($this->session->userdata('level') == "Karyawan") { ?>
        <!-- Nav Item - Dashboard -->
        <?php if ($title == 'My Profile') : ?>
        <li class="nav-item active">
            <?php else : ?>
        <li class="nav-item">
            <?php endif;?>
            <a class="nav-link" href="<?= base_url('dashboard/myprofile');?>">
                <i class="fas fa-fw fa-user"></i>
                <span>My Profile</span></a>
        </li>
        <?php } ?>

        <?php if ($title == 'Daftar Shift') : ?>
        <li class="nav-item active">
            <?php else : ?>
        <li class="nav-item">
            <?php endif;?>
            <a class="nav-link" href="<?= base_url('shift'); ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Shift</span></a>
        </li>

        <?php if ($this->session->userdata('level') == "Admin") { ?>

        <!-- Nav Item - Dashboard -->
        <?php if ($title == 'Daftar Karyawan') : ?>
        <li class="nav-item active">
            <?php else : ?>
        <li class="nav-item">
            <?php endif;?>
            <a class="nav-link" href="<?= base_url('Karyawan');?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Data Karyawan</span></a>
        </li>

        <?php } ?>

        <?php if ($this->session->userdata('level') == "Karyawan") { ?>
        <!-- Nav Item - Dashboard -->
        <?php if ($title == 'Ambil Absensi') : ?>
        <li class="nav-item active">
            <?php else : ?>
        <li class="nav-item">
            <?php endif;?>
            <a class="nav-link" href="<?= base_url('Absensi');?>">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Ambil Absensi</span></a>
        </li>

        <?php if ($title == 'Riwayat Absensi') : ?>
        <li class="nav-item active">
            <?php else : ?>
        <li class="nav-item">
            <?php endif;?>
            <a class="nav-link" href="<?= base_url('Absensi/riwayatAbsensi');?>">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Riwayat Absensi</span></a>
        </li>

        <?php } else { ?>

        <?php if ($title == 'Absensi Karyawan') : ?>
        <li class="nav-item active">
            <?php else : ?>
        <li class="nav-item">
            <?php endif;?>
            <a class="nav-link" href="<?= base_url('Absensi/absensiKaryawan');?>">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Absensi Karyawan</span></a>
        </li>
        <?php } ?>

        <?php if ($this->session->userdata('level') == "Admin") { ?>

        <!-- Nav Item - Dashboard -->
        <?php if ($title == 'Laporan') : ?>
        <li class="nav-item active">
            <?php else : ?>
        <li class="nav-item">
            <?php endif;?>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-book"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('Laporan/laporanShift');?>">Laporan Shift</a>
                    <a class="collapse-item" href="<?= base_url('Laporan/laporanKaryawan');?>">Laporan Karyawan</a>
                    <a class="collapse-item" href="<?= base_url('Laporan/laporanAbsensi');?>">Laporan Absensi</a>
                </div>
            </div>
        </li>
        <?php } ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Auth
        </div>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout');?>"
                onclick="return confirm('Apakah Anda ingin Logout?');">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Log Out</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->