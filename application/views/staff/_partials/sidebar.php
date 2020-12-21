<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('staff') ?>">
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
            <a class="dropdown-item" href="<?php echo site_url('staff/pelamar') ?>">Data Pelamar</a>
            <a class="dropdown-item" href="<?php echo site_url('staff/workorder') ?>">Data WO</a>
        </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('staff/cetaksp') ?>">Cetak SP</a>
            <a class="dropdown-item" href="<?php echo site_url('staff/ctkjadwan') ?>">Cetak undangan <br>wawancara</a>
            <a class="dropdown-item" href="<?php echo site_url('staff/ctkjadpsi') ?>">Cetak undangan <br>Psikotes</a>
            <a class="dropdown-item" href="<?php echo site_url('staff/ctkjadmcu') ?>">Cetak undangan <br>MCU</a>
            
        </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('staff/laporan') ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>laporan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('login') ?>">
            <i class="fas fa-fw fa-cog"></i>
            <span>Logout</span></a>
    </li>
</ul>