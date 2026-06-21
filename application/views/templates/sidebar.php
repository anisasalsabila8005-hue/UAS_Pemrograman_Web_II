<?php $role = $this->session->userdata('role'); ?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('dashboard') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Maju Jaya <sup>SO</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Transaksi</div>

    <!-- Sales Order -->
    <li class="nav-item <?= ($this->uri->segment(1) == 'sales_order') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('sales_order') ?>">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Sales Order</span>
        </a>
    </li>

    <?php if ($role === 'admin' || $role === 'manager'): ?>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Laporan</div>

    <li class="nav-item <?= ($this->uri->segment(1) == 'laporan') ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
           aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse <?= ($this->uri->segment(1) == 'laporan') ? 'show' : '' ?>"
             aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= site_url('laporan/per_periode') ?>">Per Periode</a>
                <a class="collapse-item" href="<?= site_url('laporan/per_sales') ?>">Per Sales</a>
                <a class="collapse-item" href="<?= site_url('laporan/per_produk') ?>">Per Produk</a>
            </div>
        </div>
    </li>
    <?php endif; ?>

    <?php if ($role === 'admin'): ?>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Master Data</div>

    <li class="nav-item <?= ($this->uri->segment(1) == 'produk') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('produk') ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Produk</span>
        </a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(1) == 'pelanggan') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('pelanggan') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Pelanggan</span>
        </a>
    </li>

    <li class="nav-item <?= ($this->uri->segment(1) == 'users') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('users') ?>">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Manajemen User</span>
        </a>
    </li>
    <?php endif; ?>

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<div id="content-wrapper" class="d-flex flex-column">
<div id="content">