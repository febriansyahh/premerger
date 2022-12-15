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

                                    <table id="tablesubcatatanadmin" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Uraian</th>
                                                <th>Keyword</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($detail as $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= date("d-m-Y", strtotime($value->tanggal)) ?></td>
                                                    <td><?= $value->laporan_ringkasan ?></td>
                                                    <td><?= $value->laporan_keyword ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('/upload_file/pengabdian/pelaksanaan/' . $value->laporan_file);  ?>" target="_blank" title="Download <?php echo $value->laporan_file ?>"><span class="badge bg-primary"><?php echo substr($value->laporan_file, 0, 30) . '...'; ?></span></a>
                                                        <a href="<?php echo base_url('/upload_file/pengabdian/pelaksanaan/' . $value->luaran_satu);  ?>" style="margin-top: 5px ;" target="_blank" title="Download <?php echo $value->luaran_satu ?>"><span class="badge bg-primary"> <?php echo substr($value->luaran_satu, 0, 32) . '...'; ?> </span></a>
                                                        <a href="<?php echo base_url('/upload_file/pengabdian/pelaksanaan/' . $value->luaran_dua);  ?>" style="margin-top: 5px; margin-bottom: 5px;" target="_blank" title="Download <?php echo $value->luaran_dua ?>"><span class="badge bg-primary"><?php echo substr($value->luaran_dua, 0, 32) . '...'; ?></span></a>
                                                        <a href="<?php echo base_url('/upload_file/pengabdian/pelaksanaan/' . $value->luaran_tiga);  ?>" target="_blank" title="Download <?php echo $value->luaran_tiga ?>"><span class="badge bg-primary"><?php echo substr($value->luaran_tiga, 0, 32) . '...'; ?></span></a>
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