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
                            <a data-bs-toggle="modal" data-bs-target="#baseJabatan" class="btn btn-primary" type="button" style="color: white;"><i class="bx bx-plus"></i> Skema Pengabdian</a>
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

                                    if ($this->session->flashdata('gglubah')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan perubahan data
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
                                    <h5 class="card-title text-primary">Skema Pengabdian</h5>

                                    <table id="tableskema" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Skema</th>
                                                <th>Skema Kuota</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($skema as $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value->skema_nama ?></td>
                                                    <td><?= $value->skema_kuota ?></td>
                                                    <td>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editSkema" onclick="editableSkema(this)" data-id="<?php echo $this->variasi->encode($value->skema_id) . "~" . $value->skema_nama . "~" . $value->skema_biaya_max . "~" . $value->skema_kuota . "~" . $value->skema_parent . "~" . $value->skema_status ?>" class="btn btn-outline-primary btn-sm"><i class='bx bxs-edit'></i> Edit</a>
                                                        <a href="<?= site_url('admin/pengabdian/Skema/child/' . $this->variasi->encode($value->skema_id)) ?>" class="btn btn-outline-warning btn-sm"><i class='bx bxs-server'></i> Child</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                    </table>
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

    <!-- Modal -->
    <div class="modal fade" id="baseJabatan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Skema Pengabdian Kepada Masyarakat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo site_url('admin/pengabdian/Skema/save') ?>" method="post" enctype="multipart/form">
                    <div class="modal-body">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama Skema</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama Skim" name="nama">
                        </div>

                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Kuota Skim</label>
                            <input type="text" class="form-control" placeholder="Masukkan kuota lolos skim" name="kuota" maxlength="3">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editSkema" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Skema Pengabdian Masyarakat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo site_url('admin/pengabdian/Skema/update') ?>" method="post" enctype="multipart/form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-0">
                                <input type="hidden" name="id" id="editId" class="form-control" />
                                <input type="hidden" name="budget" id="editBudget" class="form-control" />
                                <input type="hidden" name="parent" id="editParent" class="form-control" />
                                <input type="hidden" name="status" id="editStatus" class="form-control" />
                                <label for="emailBasic" class="form-label">Nama Skema</label>
                                <input type="text" name="nama" id="editNama" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Kuota Skema</label>
                                <input type="text" name="kuota" id="editKuota" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php $this->load->view("_partials/js.php") ?>
</body>

</html>