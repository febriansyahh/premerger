<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="<?php echo base_url('assets/img/penelitian.png') ?>">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <?php
    if ($this->session->userdata('level') == 'Admin') {
        switch ($this->session->userdata('sistem')) {
            case '1':
    ?>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="<?= site_url('admin/home') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Beranda</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pengabdian</span>
                    </li>
                    <!-- Layouts -->

                    <li class="menu-item">
                        <a href="<?= site_url('admin/pengabdian/reviewer') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Analytics">Reviewer</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Layouts">Master Data Pengabdian</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/jabatan') ?>" class="menu-link">
                                    <div data-i18n="Without menu">Jabatan LPM</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/skema') ?>" class="menu-link">
                                    <div data-i18n="Basic">Skema Pengabdian</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/pemeriksaan') ?>" class="menu-link">
                                    <div data-i18n="Container">Pemeriksaan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/aspek') ?>" class="menu-link">
                                    <div data-i18n="Container">Aspek Penilaian</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/batas') ?>" class="menu-link">
                                    <div data-i18n="Container">Batas Minimal</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxs-layer"></i>
                            <div data-i18n="Layouts">Usulan</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/periode') ?>" class="menu-link">
                                    <div data-i18n="Without menu">Periode</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/usulan') ?>" class="menu-link">
                                    <div data-i18n="Without navbar">Daftar Usulan</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxs-file"></i>
                            <div data-i18n="Layouts">Laporan Pelaksanaan</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/catatan') ?>" class="menu-link">
                                    <div data-i18n="Without menu">Catatan Harian</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/laporan/kemajuan') ?>" class="menu-link">
                                    <div data-i18n="Without navbar">Laporan Kemajuan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/laporan/akhir') ?>" class="menu-link">
                                    <div data-i18n="Without navbar">Laporan Akhir</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            <?php
                break;
            case '2':
            ?>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="<?= site_url('dosen/home') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Beranda</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Penelitian</span>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Layouts">Master Penelitian</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/periode') ?>" class="menu-link">
                                    <div data-i18n="Container">Periode Pengajuan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/luaran') ?>" class="menu-link">
                                    <div data-i18n="Container">Kategori Publikasi</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/skim') ?>" class="menu-link">
                                    <div data-i18n="Container">Kategori Penelitian</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/pusatstudi') ?>" class="menu-link">
                                    <div data-i18n="Container">Pusat Studi</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/kompro') ?>" class="menu-link">
                                    <div data-i18n="Container">Komponen Proposal</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/komlap') ?>" class="menu-link">
                                    <div data-i18n="Container">Komponen Pelaporan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/status') ?>" class="menu-link">
                                    <div data-i18n="Container">Status Proposal</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/tkt') ?>" class="menu-link">
                                    <div data-i18n="Container">TKT Master</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/tkt') ?>" class="menu-link">
                                    <div data-i18n="Container">TKT Detail</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Layouts">Master Umum</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/fakultas') ?>" class="menu-link">
                                    <div data-i18n="Without navbar">Fakultas</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/progdi') ?>" class="menu-link">
                                    <div data-i18n="Without navbar">Program Studi</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/pendidikan') ?>" class="menu-link">
                                    <div data-i18n="Without menu">Pendidikan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/jabatan')  ?>" class="menu-link">
                                    <div data-i18n="Container">Jabatan Akademik</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/pangkat') ?>" class="menu-link">
                                    <div data-i18n="Container">Pangkat</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxs-file"></i>
                            <div data-i18n="Layouts">Proposal</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= site_url('penelitian/pengajuan/list') ?>" class="menu-link">
                                    <div data-i18n="Container">Pengajuan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div data-i18n="Container">Hasil Keputusan</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            <?php
                break;
            case '0':
            ?>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="<?= site_url('admin/home') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Beranda</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pengabdian</span>
                    </li>
                    <!-- Layouts -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Layouts">Master Data Pengabdian</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?php echo site_url('admin/pengabdian/jabatan') ?>" class="menu-link">
                                    <div data-i18n="Without menu">Jabatan</div>
                                </a>
                            </li>
                            <!-- <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/jabatan/lpm') ?>" class="menu-link">
                                    <div data-i18n="Without menu">Jabatan LPM</div>
                                </a>
                            </li> -->
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/pemeriksaan') ?>" class="menu-link">
                                    <div data-i18n="Container">Pemeriksaan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/aspek') ?>" class="menu-link">
                                    <div data-i18n="Container">Aspek Penilaian</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/pengabdian/batas') ?>" class="menu-link">
                                    <div data-i18n="Container">Batas Minimal</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="<?= site_url('admin/pengabdian/skema') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-street-view"></i>
                            <div data-i18n="Basic">Skema Pengabdian</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Penelitian</span>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Layouts">Master Penelitian</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/periode') ?>" class="menu-link">
                                    <div data-i18n="Container">Periode Pengajuan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/luaran') ?>" class="menu-link">
                                    <div data-i18n="Container">Kategori Publikasi</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/skim') ?>" class="menu-link">
                                    <div data-i18n="Container">Kategori Penelitian (SBK)</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/pusatstudi') ?>" class="menu-link">
                                    <div data-i18n="Container">Pusat Studi</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/kompro') ?>" class="menu-link">
                                    <div data-i18n="Container">Komponen Proposal</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/komlap') ?>" class="menu-link">
                                    <div data-i18n="Container">Komponen Pelaporan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/status') ?>" class="menu-link">
                                    <div data-i18n="Container">Status Proposal</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/tkt') ?>" class="menu-link">
                                    <div data-i18n="Container">TKT Master</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/tkt') ?>" class="menu-link">
                                    <div data-i18n="Container">TKT Detail</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Layouts">Master Umum</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/fakultas') ?>" class="menu-link">
                                    <div data-i18n="Without navbar">Fakultas</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/progdi') ?>" class="menu-link">
                                    <div data-i18n="Without navbar">Program Studi</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/pendidikan') ?>" class="menu-link">
                                    <div data-i18n="Without menu">Pendidikan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/jabatan')  ?>" class="menu-link">
                                    <div data-i18n="Container">Jabatan Akademik</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url('admin/penelitian/pangkat') ?>" class="menu-link">
                                    <div data-i18n="Container">Pangkat</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="cards-basic.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-street-view"></i>
                            <div data-i18n="Basic">Reviewer</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Super Admin</span>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div data-i18n="Without navbar">Semester</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                            <div data-i18n="Authentications">Setting Akun</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= site_url('admin/akun') ?>" class="menu-link">
                                    <div data-i18n="Basic">User Pengguna</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Components -->

                </ul>
        <?php
                break;
        }
    } else {
        ?>
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
                <a href="<?= site_url('admin/home') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Beranda</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Pengabdian</span>
            </li>
            <!-- Layouts -->
            <li class="menu-item">
                <a href="<?= site_url('dosen/pengabdian/usulan') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-file-plus"></i>
                    <div data-i18n="Basic">Usulan Baru</div>
                </a>
            </li>

            <!-- <li class="menu-item">
                <a href="<?= site_url('dosen/pengabdian/usulan') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-edit-alt"></i>
                    <div data-i18n="Basic">Perbaikan Usulan</div>
                </a>
            </li> -->

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-layer"></i>
                    <div data-i18n="Layouts">Pelaksanaan Kegiatan</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="<?= site_url('dosen/pengabdian/catatan') ?>" class="menu-link">
                            <div data-i18n="Without menu">Catatan Harian</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= site_url('dosen/pengabdian/laporan/kemajuan') ?>" class="menu-link">
                            <div data-i18n="Without navbar">Laporan Kemajuan</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?= site_url('dosen/pengabdian/laporan/akhir') ?>" class="menu-link">
                            <div data-i18n="Without navbar">Laporan Akhir</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Penelitian</span>
            </li>

            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-spreadsheet"></i>
                    <div data-i18n="Basic">Ukur TKT</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-book-alt"></i>
                    <div data-i18n="Layouts">Proposal</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i18n="Without menu">Usulan Baru</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i18n="Without navbar">Revisi & Penilaian</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i18n="Without navbar">Hasil Keputusan</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-layer"></i>
                    <div data-i18n="Layouts">Pelaksanaan Kegiatan</div>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i18n="Without menu">Catatan Harian</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i18n="Without navbar">Laporan Kemajuan</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#" class="menu-link">
                            <div data-i18n="Without navbar">Laporan Akhir</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-history"></i>
                    <div data-i18n="Basic">Riwayat Usulan</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user"></i>
                    <div data-i18n="Basic">Konfirmasi Anggota</div>
                </a>
            </li>

        </ul>
    <?php
    }
    ?>


</aside>