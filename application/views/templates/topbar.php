<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <span class="font-weight-bold text-primary d-none d-md-inline">
        <?= isset($title) ? $title : 'Dashboard' ?>
    </span>
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?= $this->session->userdata('nama') ?>
                    &nbsp;<span class="badge badge-primary"><?= strtoupper($this->session->userdata('role')) ?></span>
                </span>
                <img class="img-profile rounded-circle" width="32"
                     src="<?= base_url('assets/img/undraw_profile.svg') ?>">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="userDropdown">
                <div class="dropdown-item-text small px-3 py-2">
                    <div class="font-weight-bold"><?= $this->session->userdata('nama') ?></div>
                    <div class="text-muted">@<?= $this->session->userdata('username') ?></div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#"
                   data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h6 class="modal-title">
                    <i class="fas fa-sign-out-alt mr-1"></i> Konfirmasi Logout
                </h6>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center py-3">
                <p class="mb-0">Yakin ingin <strong>keluar</strong> dari sistem?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i> Batal
                </button>
                <a href="<?= site_url('logout') ?>" class="btn btn-danger btn-sm">
                    <i class="fas fa-sign-out-alt mr-1"></i> Ya, Logout
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">