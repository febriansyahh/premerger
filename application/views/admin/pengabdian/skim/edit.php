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
                                    if ($this->session->flashdata('ubah')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Berhasil melakukan perubahan data
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('gglubah')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan perubahan data
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    ?>
                                    <div class="col-xxl">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0">Ubah Data Skim</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?php echo base_url('admin/pengabdian/Skim/update'); ?>" method="post" enctype="multipart/form">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Skim</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" class="form-control" name="nama" id="basic-icon-default-fullname" value="<?= $skim->nama_skim ?>" />
                                                            <input type="hidden" class="form-control" name="id" value="<?= $this->variasi->encode($skim->skim_id) ?>" />
                                                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Jabatan Minimal</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <select name="jabatan" class="form-control" id="">
                                                                <option selected>- Piih -</option>
                                                                <?php
                                                                foreach ($jabatan as $value) {
                                                                    if ($value->kode_jabatan == $skim->jabatan_minimal) {
                                                                ?>
                                                                        <option value="<?= $value->kode_jabatan ?>" selected><?= $value->nama_jabatan ?></option>;
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <option value="<?= $value->kode_jabatan ?>"><?= $value->nama_jabatan ?></option>;
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bxs-group"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Biaya Pagu Min</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" id="basic-icon-default-company" name="pagumin" class="form-control" value="<?= $skim->biaya_pagu_min ?>" />
                                                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bxs-purchase-tag"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Biaya Pagu Max</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" id="basic-icon-default-company" name="pagumax" class="form-control" value="<?= $skim->biaya_pagu_max ?>" />
                                                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bxs-purchase-tag"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Kuota Max</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" id="basic-icon-default-company" name="kuota" class="form-control" value="<?= $skim->kuota_skim ?>" />
                                                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bxs-user-account"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Status Skim</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <select name="status" class="form-control" id="">
                                                                <?php
                                                                if ($skim->status_skim == 'Active') {
                                                                    echo '<option value="Active" selected>Active</option>';
                                                                    echo '<option value="Not Active">Not Active</option>';
                                                                }else{
                                                                    echo '<option value="Active">Active</option>';
                                                                    echo '<option value="Not Active" selected>Not Active</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bxs-user-account"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-10">
                                                        <a href="<?= site_url('admin/pengabdian/Skim') ?> " class="btn btn-warning">Kembali</a>
                                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                                    </div>
                                                </div>
                                            </form>
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

</body>

</html>