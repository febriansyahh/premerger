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
                            <a data-bs-toggle="modal" data-bs-target="#basePemeriksaan" class="btn btn-primary" type="button" style="color: white;">Tambah Reviewer Pengabdian</a>
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
                                    Berhasil melakukan aktivasi reviewer
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('gglactive')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan aktivasi reviewer
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('nonactive')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Berhasil melakukan penonaktifan reviewer
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('gglnonactive')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan penonaktifan reviewer
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('terhapus')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Hapus data berhasil
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    ?>
                                    <h5 class="card-title text-primary">Reviewer</h5>

                                    <table id="tablereviewer" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIDN</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jabatan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($reviewer as $data) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->nidn ?></td>
                                                    <td><?= $data->nama_lengkap ?></td>
                                                    <td><?= $data->jabatan ?></td>
                                                    <td>
                                                        <?php
                                                        switch ($data->status) {
                                                            case 'Active':
                                                                echo '<span class="badge bg-primary">Aktif</span>';
                                                                break;

                                                            case 'Nonactive':
                                                                echo '<span class="badge bg-danger">Non Aktif</span>';
                                                                break;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        switch ($data->status) {
                                                            case 'Active':
                                                        ?>
                                                                <a href="<?= site_url('admin/pengabdian/reviewer/nonactived/' . $this->variasi->encode($data->reviewer_id)) ?>" onclick="return confirm('Apakah yakin untuk menonaktifkan reviewer ini ?');" class="btn btn-outline-warning btn-sm"><i class="bx bxs-user-x"></i> </a>
                                                            <?php
                                                                break;

                                                            case 'Nonactive':
                                                            ?>
                                                                <a href="<?= site_url('admin/pengabdian/reviewer/actived/' . $this->variasi->encode($data->reviewer_id)) ?>" onclick="return confirm('Apakah yakin untuk mengaktifkan reviewer ini ?');" class="btn btn-outline-primary btn-sm"><i class="bx bxs-user-check"></i> </a>
                                                        <?php
                                                                break;
                                                        }
                                                        ?>
                                                        <a href="<?= site_url('admin/pengabdian/reviewer/delete/' . $this->variasi->encode($data->reviewer_id)) ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm"><i class="bx bxs-trash"></i> </a>
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

<div class="modal fade" id="basePemeriksaan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Reviewer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo site_url('admin/pengabdian/reviewer/add') ?>" method="post" enctype="multipart/form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">NIDN / NIS Reviewer</label>
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

</html>



<script type="text/javascript">
    function showResultDosen(str) {
        var id = str;
        var lenght = id.trim().length;
        console.log(id);
        if (lenght < 4) {
            document.getElementById("listdosen").innerHTML = "Kosong";
        } else {
            $.ajax({
                type: "POST",
                url: "<?= site_url('admin/pengabdian/reviewer/dosen'); ?>",
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