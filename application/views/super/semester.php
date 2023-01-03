<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url('assets/') ?>" data-template="vertical-menu-template-free">

<?php $this->load->view("_partials/head.php") ?>

<body>
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
                            <a data-bs-toggle="modal" data-bs-target="#baseSemester" class="btn btn-primary" type="button" style="color: white;">Tambah Periode Semester</a>
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
                                    <h5 class="card-title text-primary">Periode Semester </h5>
                                    <table id="tableapb" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Semester</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($semester as $data) {
                                                $s = $data->tahun_semester;
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->tahun_ajaran ?></td>
                                                    <td><?php if ($s == '1') {
                                                            echo ('Ganjil');
                                                        } else {
                                                            echo ('Genap');
                                                        } ?>
                                                    <td><?php
                                                        if ($data->tahun_status == 'active') {
                                                        ?>
                                                            <a href="<?= site_url('admin/semester/nonactive/' . $this->variasi->encode($data->id_tahun)) ?>" class="btn rounded-pill btn-outline-success btn-sm">Active</a>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a href="<?= site_url('admin/semester/active/' . $this->variasi->encode($data->id_tahun)) ?>" class="btn rounded-pill btn-outline-danger btn-sm">Non Active</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('admin/semester/edit/' . $this->variasi->encode($data->id_tahun)) ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                                                        <a href="<?php echo site_url('admin/semester/delete/' . $this->variasi->encode($data->id_tahun)) ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm">Hapus</a>
                                                    </td>
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
    <div class="modal fade" id="baseSemester" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1"> Periode Semester</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo site_url('admin/semester/add') ?>" method="post" enctype="multipart/form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Tahun Ajaran</label>
                                <input type="text" class="form-control" name="tahun_ajaran" placeholder="Masukkan Tahun Ajaran" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Semester </label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="tahun_semester" class="form-control" id="">
                                            <option value="" selected>Pilih Semester</option>
                                            <option value="1">Semester Ganjil</option>
                                            <option value="2">Semester Genap</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">STATUS </label>
                                <div class="form-line">
                                    <select name="tahun_status" class="form-control" id="">
                                        <option value="" selected>Pilih Status</option>
                                        <option value="active">Active</option>
                                        <option value="nonactive">Nonactive</option>
                                    </select>
                                </div>
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
    <!-- / Layout wrapper -->

    <?php $this->load->view("_partials/js.php") ?>

</body>

</html>