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
                            <a data-bs-toggle="modal" data-bs-target="#baseJabatan" class="btn btn-primary" type="button" style="color: white;">Tambah Jabatan</a>
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
                                    <h5 class="card-title text-primary">Pengabdian Jabatan</h5>

                                    <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Urutan Jabatan</th>
                                                <th>Nama Jabatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($result as $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value->urutan_jabatan ?></td>
                                                    <td><?= $value->nama_jabatan ?></td>
                                                    <td>
                                                        <!-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editJabatan" onclick="editableJabatan(this)" data-id="<?php echo $this->variasi->encode($value->kode_jabatan) . "~" . $value->urutan_jabatan . "~" . $value->nama_jabatan ?>" class="btn btn-outline-primary btn-sm">Edit</a> -->
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editJabatan" onclick="editableJabatanDos(this)" data-id="<?php echo $this->variasi->encode($value->kode_jabatan) . "~" . $value->urutan_jabatan . "~" . $value->nama_jabatan ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                                                        <a href="<?php echo site_url('admin/pengabdian/Jabatan/delete/' . $this->variasi->encode($value->kode_jabatan)) ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm">Hapus</a>
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
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php $this->load->view("_partials/js.php") ?>

</body>

</html>

<div class="modal fade" id="baseJabatan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Master Jabatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo site_url('admin/pengabdian/jabatan/add') ?>" method="post" enctype="multipart/form">
                <div class="modal-body">
                    <!-- <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Kode Jabatan</label>
                            <input type="text" name="kode" class="form-control" placeholder="Masukkan kode Jabatan " maxlength="3" />
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Urutan Jabatan</label>
                            <input type="text" name="urutan" class="form-control" placeholder="Masukkan Urutan Jabatan" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Nama Jabatan</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Jabatan" />
                        </div>
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

<div class="modal fade" id="editJabatan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Jabatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo site_url('admin/pengabdian/jabatan/edit') ?>" method="post" enctype="multipart/form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Urutan Jabatan</label>
                            <input type="hidden" name="kd_jbtn" id="editkodeJbtn" class="form-control" />
                            <input type="text" name="urutan_jbtn" id="editUrutanJbtn" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Nama Jabatan</label>
                            <input type="text" name="nm_jbtn" id="editNmJbtn" class="form-control" />
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