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
                                    Berhasil melakukan penambahan reviewer
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('gglsimpan')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan penambahan reviewer
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    ?>
                                    <h5 class="card-title text-primary">Reviewer</h5>
                                    <form action="<?= site_url('admin/pengabdian/usulan/addreviewer') ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $this->uri->segment('5') ?>">
                                        <table id="tblrvrw" class="table table-bordered table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIDN</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Jabatan</th>
                                                    <th>Check</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($reviewer as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $value->nidn ?></td>
                                                        <td><?= $value->nama_lengkap ?></td>
                                                        <td><?= $value->jabatan ?></td>
                                                        <td><input type="checkbox" name="reviewer[]" id="reviewer" value="<?php echo $value->reviewer_id ?>"></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                        </table>
                                        <button type="submit" class="btn btn-primary mt-3">Proses Data</button>
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