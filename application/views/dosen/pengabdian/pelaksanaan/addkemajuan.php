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
                                            <h6 class="card-title text-primary">Judul : <?= $index->usulan_judul ?></h6>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?php echo base_url('dosen/pengabdian/laporan/savekemajuan'); ?>" method="post" enctype="multipart/form-data">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tanggal Kemajuan</label>
                                                    <div class="col-sm-10">
                                                        <input type="hidden" class="form-control" name="idusulan" value="<?= $this->variasi->encode($index->usulan_id) ?>">
                                                        <input type="date" class="form-control" name="tanggal">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Uraian Kemajuan</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="uraian" class="form-control" id="content" cols="80" rows="30"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Keyword Kemajuan</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="keyword" class="form-control" id="" placeholder="Masukkan keyword kemajuan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">File Kemajuan</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="filekemajuan" class="form-control" id="" accept=".pdf">
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- <span>Luaran Pengabdian</span> -->
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Artikel Ilmiah</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="luaran1" class="form-control" id="" accept=".pdf">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Prosiding/ Seminar Nasional</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="luaran2" class="form-control" id="" accept=".pdf">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Media Massa</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="luaran3" class="form-control" id="" accept=".pdf">
                                                    </div>
                                                </div>

                                                <div class="row justify-content-end">
                                                    <div class="col-sm-10 mt-4">
                                                        <a href="<?= site_url('dosen/pengabdian/laporan/detailkemajuan/' . $this->variasi->encode($index->usulan_id)) ?> " class="btn btn-warning">Kembali</a>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
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