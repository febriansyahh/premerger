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
                            <a data-bs-toggle="modal" data-bs-target="#baseJabatan" class="btn btn-primary" type="button" style="color: white;">Tambah Jabatan LPM</a>
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
                                    <h5 class="card-title text-primary">Jabatan LPM</h5>

                                    <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Ketua LPM</th>
                                                <th>NIS</th>
                                                <th>NIDN</th>
                                                <th>Jabatan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($jabatan as $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value->nama_jab_lpm ?></td>
                                                    <td><?= $value->nis_jab_lpm ?></td>
                                                    <td><?= $value->nidn_jab_lpm ?></td>
                                                    <td><?= $value->jenis_jab_lpm ?></td>
                                                    <td>
                                                        <?php
                                                        if ($value->status_jab_lpm == 1) {
                                                        ?>
                                                            <a href="<?= site_url('admin/pengabdian/Jabatan/nonactive/' . $this->variasi->encode($value->id_jab_lpm)) ?>" class="btn rounded-pill btn-outline-success btn-sm">Active</a>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a href="<?= site_url('admin/pengabdian/Jabatan/active/' . $this->variasi->encode($value->id_jab_lpm)) ?>" class="btn rounded-pill btn-outline-danger btn-sm">Non Active</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('admin/pengabdian/Jabatan/editjabatan/' . $this->variasi->encode($value->id_jab_lpm)) ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                                                        <a href="<?php echo site_url('admin/pengabdian/Jabatan/deletelpm/' . $this->variasi->encode($value->id_jab_lpm)) ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm">Hapus</a>
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
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Jabatan LPM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo site_url('admin/pengabdian/jabatan/addlpm') ?>" method="post" enctype="multipart/form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">NIDN Jabatan</label>
                                <input list="datadosen" name="kode_dos" id="kode_dos" class="form-control" placeholder="Masukkan NIDN Dosen" autocomplete="on" onkeyup="showResultDosen(this.value)">
                                <datalist id="datadosen">
                                    <div id="listdosen"></div>
                                </datalist>
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

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php $this->load->view("_partials/js.php") ?>
    <script>
        function showResultDosen(str) {
            console.log(str);
            var id = str;
            var lenght = id.trim().length;
            if (lenght < 3) {
                document.getElementById("listdosen").innerHTML = "Kosong";
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('pengabdian/jabatan/dosen'); ?>",
                    data: {
                        id
                    },
                    success: function(response) {
                        document.getElementById("listdosen").innerHTML = response;
                    },
                });
            }
        }
    </script>

</body>

</html>