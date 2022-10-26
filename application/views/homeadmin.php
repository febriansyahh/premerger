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
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <span>
                                <h5 style="color: #5f61e6;">Profile Anda</h5>
                            </span>
                            <div class="row mb-8">
                                <div class="col-md-6">
                                    <div class="card">
                                        <a href="#">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium menu_profile_title">Penelitian</p>
                                                        <h4 class="mb-0 menu_profile_desc"><?= $penelitian->jumlah ?></h4>
                                                    </div>
                                                    <img src="<?= base_url('assets/img/icons/home/search.png') ?>" style="width: 10%; height: 10%;" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <a href="#">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium menu_profile_title">Pengabdian</p>
                                                        <h4 class="mb-0 menu_profile_desc"><?= $pengabdian->jumlah ?></h4>
                                                    </div>
                                                    <img src="<?= base_url('assets/img/icons/home/rating.png') ?>" style="width: 10%; height: 10%;" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br><br>
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