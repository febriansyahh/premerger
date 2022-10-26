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

                    <div class="container">
                        <div class="form-group mt-4">
                        </div>
                    </div>

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

                                    if ($this->session->flashdata('terhapus')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Hapus data berhasil
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    ?>

                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Periode Pengajuan</h5>
                                        <form action="<?= site_url('admin/penelitian/periode/updateperiode') ?>" method="post" enctype="multipart/form">
                                            <?php
                                            $data = $periode[0];
                                            ?>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal Mulai</label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" class="form-control" id="basic-default-name" name="id" value="<?= $this->variasi->encode($data['periode_id']) ?>" />
                                                    <input type="date" class="form-control" id="basic-default-name" name="dari" value="<?= $data['periode_dari'] ?>" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal Selesai</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" id="basic-default-name" name="sampai" value="<?= $data['periode_sampai'] ?>" />
                                                </div>
                                            </div>
                                            <div class=" row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-name">Maks. Sebagai Ketua</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="basic-default-name" name="maks_ketua" value="<?= $data['periode_max_ketua'] ?>" class="form-control phone-mask" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-name">Maks. Sebagai Anggota</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="basic-default-name" name="maks_anggota" value="<?= $data['periode_max_anggota'] ?>" class="form-control phone-mask" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-name">Maks. Usulan Dosen</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="basic-default-name" name="maks_usulan" value="<?= $data['periode_max_usulan'] ?>" class="form-control phone-mask" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-name">Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control" id="">
                                                        <option value="">- Pilih -</option>
                                                        <?php
                                                        if ($data['periode_status'] == 'Aktif') {
                                                            echo '<option value="Aktif" selected >Aktif</option>';
                                                            echo '<option value="Non Aktif">Non Aktif</option>';
                                                        } else {
                                                            echo '<option value="Aktif">Aktif</option>';
                                                            echo '<option value="Non Aktif" selected>Non Aktif</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
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