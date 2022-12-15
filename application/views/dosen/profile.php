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
                                    <h5 text-align="center">Profile Pengguna</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3" for="basic-icon-default-fullname">Kode User</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="judul" class="form-control" value="<?= $profile['kode'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3" for="basic-icon-default-fullname">NIDN</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="judul" class="form-control" value="<?= $profile['nidn'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3" for="basic-icon-default-fullname">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="judul" class="form-control" value="<?= $profile['nama'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3" for="basic-icon-default-fullname">Program Studi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="judul" class="form-control" value="<?= $profile['prodi'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3" for="basic-icon-default-fullname">Pangkat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="judul" class="form-control" value="<?= $profile['pangkat'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3" for="basic-icon-default-fullname">Golongan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="judul" class="form-control" value="<?= $profile['golongan'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3" for="basic-icon-default-fullname">No Hp</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="judul" class="form-control" value="<?= $profile['nohp'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label class="col-sm-3" for="basic-icon-default-fullname">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="judul" class="form-control" value="<?= $profile['email'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url('home') ?>" class="btn btn-warning action-button" style="float: left; text-align: center; background: warning;">Kembali</a>
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