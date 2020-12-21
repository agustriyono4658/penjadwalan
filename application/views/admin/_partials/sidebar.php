<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/pelamar') ?>">Data Pelamar</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/klien') ?>">Data Klien</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/posisi') ?>">Data Posisi</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/kota') ?>">Data Kota</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/pewawancara') ?>">Data pewawancara</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/tempsi') ?>">Data Tempat Psikotes</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/klinik') ?>">Data Klinik</a>
        </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/jadwan') ?>">Jadwal wawancara</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/jadpsi') ?>">Jadwal Psikotes</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/jadmcu') ?>">Jadwal MCU</a>
            
        </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Akun</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/procoor') ?>">Project coordinator</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/staff') ?>">Staff</a> 
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('login') ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Logout</span></a>
             </a>
</ul>