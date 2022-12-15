<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?= site_url('reviewer/home') ?>" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="<?php echo base_url('assets/img/penelitian.png') ?>">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="<?= site_url('reviewer/home') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Beranda</div>
            </a>
        </li>


        <li class="menu-item">
            <a href="<?= site_url('reviewer/usulan') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Usulan Pengabdian</div>
            </a>
        </li>
    </ul>


</aside>