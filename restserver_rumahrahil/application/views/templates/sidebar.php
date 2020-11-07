<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/'); ?>img/favlogo.png">
        </div>
        <div class="sidebar-brand-text mx-3">Rumah Rahil Education</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapSD" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>SD</span>
        </a>
        <div id="collapseBootstrapSD" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data SD</h6>
                <a class="collapse-item" href="<?= base_url('Sd_Controllers/Tema'); ?>">Tema</a>
                <a class="collapse-item" href="<?= base_url('Sd_Controllers/Subtema'); ?>">Sub Tema</a>
                <a class="collapse-item" href="<?= base_url('Sd_Controllers/PaketSoalSd'); ?>">Paket Latihan</a>
                <a class="collapse-item" href="<?= base_url('Sd_Controllers/SoalSd'); ?>">Soal</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapSMP" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>SMP</span>
        </a>
        <div id="collapseBootstrapSMP" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data SMP</h6>
                <a class="collapse-item" href="<?= base_url('Mapel'); ?>">Mata Pelajaran</a>
                <a class="collapse-item" href="<?= base_url('Bab'); ?>">Bab</a>
                <a class="collapse-item" href="<?= base_url('SMP/PaketSMP/'); ?>">Paket</a>
                <a class="collapse-item" href="<?= base_url('SMP/KunciSMP/'); ?>">Kunci Jawaban</a>
                <a class="collapse-item" href="<?= base_url('SMP/SoalSMP/'); ?>">Soal</a>
                <a class="collapse-item" href="<?= base_url('SMP/JawabanSMP/'); ?>">Option Jawaban</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapSMA" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>SMA</span>
        </a>
        <div id="collapseBootstrapSMA" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data SMA</h6>
                <a class="collapse-item" href="buttons.html">Mata Pelajaran</a>
                <a class="collapse-item" href="dropdowns.html">Bab</a>
                <a class="collapse-item" href="modals.html">Kunci Jawaban</a>
                <a class="collapse-item" href="popovers.html">Soal</a>
                <a class="collapse-item" href="progress-bar.html">Option Jawaban</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-table"></i>
            <span>Tes</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">SBMPTN, Kedinasan dan Ujian</h6>
                <a class="collapse-item" href="simple-tables.html">SBMPTN</a>
                <a class="collapse-item" href="datatables.html">KEDINASAN</a>
                <a class="collapse-item" href="datatables.html">UJIAN SEKOLAH</a>
                <a class="collapse-item" href="datatables.html">UAS</a>
                <a class="collapse-item" href="datatables.html">UTS</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Examples
    </div>
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
            <i class="fas fa-fw fa-columns"></i>
            <span>Nilai</span>
        </a>
        <div id="collapsePage" class="collapse hide" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kumpulan Nilai</h6>
                <a class="collapse-item" href="login.html">Nilai Latihan SD</a>
                <a class="collapse-item" href="register.html">Nilai Latihan SMP</a>
                <a class="collapse-item" href="404.html">Nilai Latihan SMA</a>
                <a class="collapse-item" href="blank.html">Nilai Tes SBMPTN</a>
                <a class="collapse-item" href="blank.html">Nilai Tes Kedinasan</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->