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
                    <?php
                    if ($this->session->userdata('level') == 'dosen') {
                    ?>
                    
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <span>
                                <h5 style="color: #5f61e6;">Profile Anda</h5>
                            </span>
                            <div class="row mb-8">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="#">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium menu_profile_title">Identitas</p>
                                                        <h4 class="mb-0 menu_profile_desc"><?= $this->session->userdata('nama_gelar') ?></h4>
                                                    </div>
                                                    <img src="<?= base_url('assets/img/icons/home/user.png') ?>" style="width: 10%; height: 10%;" alt="">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                                <div class="col-md-3">
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
                        <?php
                    } else {
                        if ($this->session->userdata('level') == 'Admin') {
                        ?>
                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="row">
                                    <!-- Total Revenue -->
                                    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                                        <div class="card">
                                            <div class="row row-bordered g-0">
                                                <div class="col-md-8">
                                                    <h5 class="card-header m-0 me-2 pb-3">Total Detail</h5>

                                                    <div id="totalRevenueChart" class="px-2"></div>
                                                </div>
                                                <div class="col-md-4">

                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    2022
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                                                    <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="growthChart"></div>
                                                    <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                                                    <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                                        <div class="d-flex">
                                                            <div class="me-2">
                                                                <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <small>2022</small>
                                                                <h6 class="mb-0">$32.5k</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="me-2">
                                                                <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <small>2021</small>
                                                                <h6 class="mb-0">$41.2k</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Total Revenue -->
                                    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                                        <div class="row">
                                            <div class="col-6 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-title d-flex align-items-start justify-content-between">
                                                            <div class="avatar flex-shrink-0">
                                                                <img src="<?php echo base_url('assets/img/icons/unicons/paypal.png') ?>" alt="Credit Card" class="rounded" />
                                                            </div>
                                                            <div class="dropdown">
                                                                <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="d-block mb-1">Payments</span>
                                                        <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                                                        <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-title d-flex align-items-start justify-content-between">
                                                            <div class="avatar flex-shrink-0">
                                                                <img src="<?php echo base_url('assets/img/icons/unicons/cc-primary.png') ?>" alt="Credit Card" class="rounded" />
                                                            </div>
                                                            <div class="dropdown">
                                                                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="fw-semibold d-block mb-1">Transactions</span>
                                                        <h3 class="card-title mb-2">$14,857</h3>
                                                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                                <div class="card-title">
                                                                    <h5 class="text-nowrap mb-2">Profile Report</h5>
                                                                    <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                                                                </div>
                                                                <div class="mt-sm-auto">
                                                                    <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> 68.2%</small>
                                                                    <h3 class="mb-0">$84,686k</h3>
                                                                </div>
                                                            </div>
                                                            <div id="profileReportChart"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

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