<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="<?= base_url('admin/home') ?>" class="" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="<?= base_url('admin/konfirmasi') ?>" class="" aria-expanded="false">
                    <i class="fas fa-user-check"></i>
                    <span class="nav-text">Konfirmasi Saldo</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-chart-line"></i>
                    <span class="nav-text">Rekapitulasi</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('admin/uang_masuk') ?>">Uang Masuk</a></li>
                    <li><a href="<?= base_url('admin/uang_keluar') ?>">Uang Keluar</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-users"></i>
                    <span class="nav-text">Master Data</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('admin/donatur') ?>">Donatur Tetap</a></li>
                    <li><a href="<?= base_url('admin/donatur/lain') ?>">Donatur Sukarela</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>