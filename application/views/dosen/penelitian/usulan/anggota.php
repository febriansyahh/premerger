<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url('assets/') ?>" data-template="vertical-menu-template-free">

<?php $this->load->view("_partials/head.php") ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php $this->load->view("_partials/sidebar.php") ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php $this->load->view("_partials/navbar.php") ?>


                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class=" container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="card-body">
                                    <?php
                                    if ($this->session->flashdata('simpan')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Berhasil melakukan penambahan data
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('gglsimpan')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan penambahan data
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('ubah')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Berhasil melakukan perubahan data
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('gglUbah')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan perubahan data
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    ?>
                                    <div class="col-xxl">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0 text-primary">Daftar Anggota</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <table width="100%" align="center">
                                                    <tr valign="top" height="20">
                                                        <td width="25%">Judul</td>
                                                        <td width="1%">:</td>
                                                        <td><b><?php echo strtoupper($detanggota->propose_title); ?></b></td>
                                                    </tr>
                                                    <tr valign="top" height="20">
                                                        <td>Tanggal Pengajuan</td>
                                                        <td>:</td>
                                                        <td><?php echo date("d-m-Y", strtotime($detanggota->propose_date)); ?></td>
                                                    </tr>
                                                    <tr valign="top" height="20">
                                                        <td>Pelaksanaan</td>
                                                        <td>:</td>
                                                        <td><?php echo date("d-m-Y", strtotime($detanggota->propose_date1)) . ' s/d ' . date("d-m-Y", strtotime($detanggota->propose_date2)); ?></td>
                                                    </tr>
                                                    <tr valign="top" height="20">
                                                        <td>Jumlah Anggota</td>
                                                        <td>:</td>
                                                        <td>Minimal : <?= $detanggota->skim_anggota_min; ?>, Maksimal : <?= $detanggota->skim_anggota_max; ?></td>
                                                    </tr>
                                                    <tr valign="top" height="20">
                                                        <td>Jumlah Anggota Eksternal</td>
                                                        <td>:</td>
                                                        <td>Eksternal : <?= $detanggota->skim_anggotaeks_min; ?>, Mahasiswa : <?= $detanggota->skim_anggotamhs_min; ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="divider text-end">
                                                <div class="divider-text"></div>
                                            </div>

                                            <p class="text-primary">Daftar Anggota Internal</p>

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th width="15%">NIDN</th>
                                                            <th width="25%">Nama Lengkap</th>
                                                            <th width="10%">Jabatan</th>
                                                            <th width="10%">Fakultas</th>
                                                            <th width="15%">Progdi</th>
                                                            <th width="10%">Status</th>
                                                            <th width="10%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($internal as $value) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $value->user_username ?></td>
                                                                <td><?= $value->user_name ?></td>
                                                                <td><?= $value->team_position_level ?></td>
                                                                <td><?= $value->faculty_name ?></td>
                                                                <td><?= $value->study_program_name ?></td>
                                                                <td><?= $value->team_position_status ?></td>
                                                                <td>
                                                                    <a href="<?= site_url('dosen/penelitian/pengajuan/deleteinternal/' . $this->variasi->encode($value->team_position_id)) ?>" class="btn btn-outline-danger btn-sm"><i class="bx bxs-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="divider text-end">
                                                <div class="divider-text"></div>
                                            </div>

                                            <p class="text-primary">Daftar Anggota Mahasiswa</p>

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th width="15%">NIM</th>
                                                            <th width="25%">Nama Lengkap</th>
                                                            <th>Institusi</th>
                                                            <th>Jenis</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($mahasiswa as $value) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $value->team_eks_kode ?></td>
                                                                <td><?= $value->team_eks_nama ?></td>
                                                                <td><?= $value->team_eks_unit ?></td>
                                                                <td><?= $value->team_eks_jenis ?></td>
                                                                <td>
                                                                    <a href="<?= site_url('dosen/penelitian/pengajuan/deletemahasiswa/' . $this->variasi->encode($value->team_eks_id)) ?>" class="btn btn-outline-danger btn-sm"><i class="bx bxs-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="divider text-end">
                                                <div class="divider-text"></div>
                                            </div>

                                            <p class="text-primary">Daftar Anggota Eksternal</p>

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th width="15%">NIM</th>
                                                            <th width="25%">Nama Lengkap</th>
                                                            <th>Institusi</th>
                                                            <th>Jenis</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($eksternal as $value) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $value->team_eks_kode ?></td>
                                                                <td><?= $value->team_eks_nama ?></td>
                                                                <td><?= $value->team_eks_unit ?></td>
                                                                <td><?= $value->team_eks_jenis ?></td>
                                                                <td>
                                                                    <a href="<?= site_url('dosen/penelitian/pengajuan/deletemahasiswa/' . $this->variasi->encode($value->team_eks_id)) ?>" class="btn btn-outline-danger btn-sm"><i class="bx bxs-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class=" row justify-content-end">
                                                <div class="mt-4">
                                                    <a href="<?= site_url('dosen/penelitian/pengajuan') ?> " class="btn btn-warning">Kembali</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php $this->load->view("_partials/footer.php") ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php $this->load->view("_partials/js.php") ?>

    <script language="JavaScript" type="text/JavaScript">
        function formatNumber (num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
        }

        function TampilBudget() {
            console.log("AAA");
            var x           = document.getElementById("lstSkim");
            var budget      = x.options[(x.selectedIndex)].getAttribute('data-budget');
            var batasan     = formatNumber(budget);
            document.getElementById("budget").value = budget;
            document.getElementById("batasan").value = batasan;
        }
    </script>

</body>

</html>