<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url('assets/') ?>" data-template="vertical-menu-template-free">

<?php $this->load->view("_partialreviewer/head.php") ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php $this->load->view("_partialreviewer/sidebar.php") ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php $this->load->view("_partialreviewer/navbar.php") ?>


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
                                    <h5 class="card-title text-primary">Isikan penilaian usulan</h5>
                                    <form action="<?= site_url('reviewer/usulan/addreview') ?>" method="post" enctype="multipart/form-data">
                                        <table border="0" class="table">
                                            <tr>
                                                <td>NIDN Pengusul</td>
                                                <td><?php echo $data->nidn_pengusul ?></td>
                                            </tr>

                                            <tr>
                                                <td>Nama Dosen</td>
                                                <!-- <td>:</td> -->
                                                <td><?php echo $data->nama ?></td>
                                            </tr>

                                            <tr>
                                                <td>Judul</td>
                                                <!-- <td>:</td> -->
                                                <td><?php echo $data->usulan_judul ?></td>
                                            </tr>

                                            <tr>
                                                <td>Luaran</td>
                                                <!-- <td>:</td> -->
                                                <td><?php echo $data->target_luaran ?></td>
                                            </tr>

                                            <tr>
                                                <td>Download Proposal</td>
                                                <td><a href="<?php echo base_url('/upload_file/pengabdian/file/' . $data->file_usulan);  ?>" target="_blank" title="Download <?php echo $data->nidn_pengusul ?>"><i class="icon-download-alt"></i> <?php echo substr($data->file_usulan, 0, 40) . '...'; ?></a></td>
                                            </tr>
                                        </table>
                                        <textarea name="catatan" class="form-control span12" id="content" cols="80" rows="50">Catatan....</textarea>
                                        <table width="100%" class="table table-hover table-bordered mt-4">
                                            <tr bgcolor="#F9F9F9">
                                                <td width="5%"><strong>No.</strong></td>
                                                <td width="70%"><strong>Aspek Penilaian</strong></td>
                                                <td><strong>Bobot</strong></td>
                                                <td><strong>Skor</strong></td>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            foreach ($aspek as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $value->keterangan ?></td>
                                                    <td><?php echo $value->nilai ?></td>
                                                    <td><select name="nilai<?php echo $no ?>" id="nilai" class="form-control radio">
                                                            <option value="1">1 (sangat kurang)</option>
                                                            <option value="2">2 (kurang)</option>
                                                            <option value="4">4 (baik)</option>
                                                            <option value="5">5 (sangat baik)</option>
                                                        </select>
                                                        <input type="hidden" name="aspek_id<?php echo $no ?>" value="<?php echo $value->aspek_id; ?>">
                                                    </td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                            <input type="hidden" name="jumlah" value="<?php echo $no ?>">
                                            <input type="hidden" name="review_id" value="<?php echo $this->variasi->encode($data->review_id) ?>">
                                            <input type="hidden" name="usulan_id" value="<?php echo $this->variasi->encode($data->usulan_id) ?>">
                                        </table>

                                        <a href="<?= site_url('reviewer/usulan') ?>" style="float: left; margin-right: 10px" class="btn btn-primary mt-3">Kembali</a>
                                        <button name="simpan" type="submit" style="float: left;" class="btn btn-success mt-3" onclick="return confirm('Apakah yakin untuk mengkonfirmasi usulan ini ?');">Simpan</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php $this->load->view("_partialreviewer/footer.php") ?>
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
    <?php $this->load->view("_partialreviewer/js.php") ?>

</body>

</html>