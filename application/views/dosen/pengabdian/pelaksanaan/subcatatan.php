<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url('assets/') ?>" data-template="vertical-menu-template-free">

<?php $this->load->view("_partials/head.php") ?>

<?php
$sts = $this->Header_model->statususulan($this->variasi->encode($judul->usulan_id));
$usulan = $sts->status_usulan;
$lengkap = $sts->status_kelengkapan;
$tahap = $sts->status_tahap;
?>

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
                    if ($usulan == 'Diterima' && $lengkap == 'Lengkap') {
                        ?>
                        <div class="container">
                            <div class="form-group mt-4">
                                <a data-bs-toggle="modal" data-bs-target="#basePemeriksaan" class="btn btn-primary" type="button" style="color: white;">Tambah Catatan Harian</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
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
                                    <h6 class="card-title text-primary">Judul : <?= $judul->usulan_judul ?></h6>

                                    <table id="tablesubcatatan" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Uraian</th>
                                                <th>Persentase</th>
                                                <th>Download</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($detail as $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= date("d-m-Y", strtotime($value->catatan_tanggal)) ?></td>
                                                    <td><?= $value->catatan_uraian ?></td>
                                                    <td><?= $value->catatan_persentase . ' %' ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('/upload_file/pengabdian/pelaksanaan/' . $value->catatan_file);  ?>" target="_blank" title="Download <?php echo $value->catatan_file ?>"><i class="icon-download-alt"></i> <?php echo substr($value->catatan_file, 0, 30) . '...'; ?></a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('dosen/pengabdian/catatan/delete/' . $this->variasi->encode($value->catatan_id) . '~' . $this->uri->segment('5')) ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>
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

    <div class="modal fade" id="basePemeriksaan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Catatan Harian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo site_url('dosen/pengabdian/catatan/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Tanggal</label>
                                <input type="hidden" class="form-control" name="id" value="<?= $this->uri->segment('5') ?>">
                                <input type="date" class="form-control" name="tanggal">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Uraian Catatan</label>
                                <textarea name="uraian" id="content" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Persentase</label>
                                    <input type="text" class="form-control" name="persentase" maxlength="3" placeholder="Masukkan dengan format angka tanpa %, contoh : 80">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Catatan File</label>
                                    <input type="file" class="form-control" name="filecatatan" accept=".pdf">
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

    <?php $this->load->view("_partials/js.php") ?>

</body>

</html>