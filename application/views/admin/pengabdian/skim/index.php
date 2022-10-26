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
                            <a data-bs-toggle="modal" data-bs-target="#baseJabatan" class="btn btn-primary" type="button" style="color: white;"><i class="bx bx-plus"></i> Skim Pengabdian</a>
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
                                    <h5 class="card-title text-primary">SKim Pengabdian</h5>

                                    <table id="tableskim" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Skim</th>
                                                <th>Jabatan Minimal</th>
                                                <th>Pagu Minimal</th>
                                                <th>Pagu Maksimal</th>
                                                <th>Kuota Skim</th>
                                                <th>Status Skim</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($skim as $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value->nama_skim ?></td>
                                                    <td><?= $value->jabatan_minimal ?></td>
                                                    <td><?= $value->biaya_pagu_min ?></td>
                                                    <td><?= $value->biaya_pagu_max ?></td>
                                                    <td><?= $value->kuota_skim ?></td>
                                                    <td>
                                                        <?php
                                                        if ($value->status_skim == 'Active') {
                                                        ?>
                                                            <span class="badge bg-success">Active</span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <span class="badge bg-warning">Not Active</span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('admin/pengabdian/Skim/edit/' . $this->variasi->encode($value->skim_id)) ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                                                        <a href="<?php echo site_url('admin/pengabdian/Skim/delete/' . $this->variasi->encode($value->skim_id)) ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm">Hapus</a>
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
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Skim Pengabdian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo site_url('admin/pengabdian/Skim/save') ?>" method="post" enctype="multipart/form">
                    <div class="modal-body">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama Skim</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama Skim" name="nama">
                        </div>

                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Minimal Jabatan</label>
                            <select name="jabatan" id="" class="form-control">
                                <option selected>- Pilih -</option>
                                <?php
                                foreach ($jabatan as $value) {
                                ?>
                                    <option value="<?= $value->kode_jabatan ?>"><?= $value->nama_jabatan ?></option>;
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Biaya Pagu Min</label>
                            <input type="text" class="form-control" placeholder="Masukkan Pagu Biaya Minimal" name="pagumin">
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Biaya Pagu Max</label>
                            <input type="text" class="form-control" placeholder="Masukkan Pagu Biaya Maksimal" name="pagumax">
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Kuota Skim</label>
                            <input type="text" class="form-control" placeholder="Masukkan kuota lolos skim" name="kuota">
                        </div>
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Status Skim</label>
                            <select name="status" class="form-control">
                                <option selected>- Pilih -</option>
                                <option value="Active">Active</option>
                                <option value="Not Active">Not Active</option>
                            </select>
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
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php $this->load->view("_partials/js.php") ?>
</body>

</html>