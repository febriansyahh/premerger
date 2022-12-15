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
                                <div class="card-body" style="margin: 10px;">
                                    <?php
                                    if ($this->session->flashdata('simpan')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Berhasil melakukan perubahan status periode pengabdian
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('gglsimpan')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan perubahan status periode pengabdian
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('active')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Berhasil melakukan perubahan status data jabatan LPM
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('gglactive')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan perubahan status data jabatan LPM
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('terhapus')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Hapus data berhasil
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    ?>
                                    <h6 class="card-title text-primary">Status Periode Pengabdian</h6>

                                    <form action="<?= site_url('admin/pengabdian/periode/setting') ?>" method="post" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Periode Usulan</label>
                                            <div class="col-sm-10">
                                                <select name="usulan_ket" class="form-control" id="basic-default-name">
                                                    <?php
                                                    if ($usulan->keterangan == 'active') {
                                                        echo '<option value="active" selected>Active</option>';
                                                        echo '<option value="nonactive">Non Active</option>';
                                                    } else {
                                                        echo '<option value="active">Active</option>';
                                                        echo '<option value="nonactive" selected>Non Active</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <input type="hidden" class="form-control" id="basic-default-name" name="usulanid" value="<?= $usulan->setting_id ?>" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Periode Review</label>
                                            <div class="col-sm-10">
                                                <select name="reviewket" class="form-control" id="basic-default-name">
                                                    <?php
                                                    if ($reviewer->keterangan == 'active') {
                                                        echo '<option value="active" selected>Active</option>';
                                                        echo '<option value="nonactive">Non Active</option>';
                                                    } else {
                                                        echo '<option value="active">Active</option>';
                                                        echo '<option value="nonactive" selected>Non Active</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <input type="hidden" class="form-control" id="basic-default-name" name="reviewid" value="<?= $reviewer->setting_id ?>" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary"><i class="bx bx-refresh"></i> Update Data</button>
                                            </div>
                                        </div>
                                    </form>
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