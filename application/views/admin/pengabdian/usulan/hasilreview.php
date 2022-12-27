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
                        <?php
                        if ($isdone < 1) {
                        ?>
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="card-body">
                                        <div class="alert alert-warning" role="alert">Maaf, reviewer belum dipilih silahkan pilih reviewer terlebih dahulu</div>
                                        <a href="<?= site_url('admin/pengabdian/usulan') ?>" class="btn btn-primary mt-3">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="card mb-3">
                                <div class="d-flex align-items-end row">
                                    <div class="card-body">
                                        <?php
                                        if ($this->session->flashdata('simpan')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                        Biaya Usulan Berhasil Disetujui
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';

                                        if ($this->session->flashdata('gglsimpan')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                            Biaya Usulan Gagal Disetujui
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                                        if ($this->session->flashdata('terhapus')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                            Hapus data hasil reviewer berhasil
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                                        ?>
                                        <p>Biaya yang disetujui</p>
                                        <form action="<?= site_url('admin/pengabdian/usulan/accbiaya') ?>" enctype="multipart/form-data" method="post">
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Biaya Max Skim</label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="<?= number_format($biaya-> usulan_biaya, 0, '', '.') ?>" class="form-control" id="" readonly>
                                                </div>
                                            </div>
                                            <?php
                                            $no = 1;
                                            foreach ($reviewer as $key => $data) {
                                            ?>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Biaya Disetujui Reviewer <?= $no++ ?></label>
                                                    <div class="col-sm-7">
                                                        <input type="text" value="<?php echo number_format($data->dana_ajuan, 0, '', '.')  ?>" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="row mb-3">
                                                <input type="hidden" name="id" value="<?= $this->uri->segment(5) ?>" class="form-control" id="">
                                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Setujui Biaya</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="biayaacc" value="<?= $biaya->setujui_biaya ?>" class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-10 mt-4">
                                                    <a href="<?= site_url('admin/pengabdian/usulan/') ?> " class="btn btn-warning">Kembali</a>
                                                    <button type="submit" id="btnsimpan" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                            foreach ($reviewer as $key => $data) {
                            ?>
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="card-body">
                                            <p class="card-title"><?= $data->nama_lengkap . ' | ' . date('d-m-Y', strtotime($data->tanggal_review)) ?></p>
                                            <?php
                                            if ($data->tanggal_review == '0000-00-00') {
                                                echo '<span class="badge bg-warning">Belum mereview</span>';
                                            } else {
                                                echo '<span class="badge bg-success">Sudah mereview</span>';
                                            } ?> &nbsp;

                                            <a href="<?= site_url('admin/pengabdian/usulan/delrev/' . $this->variasi->encode($data->review_id)) . '~' . $this->uri->segment(5) ?>" onclick="return confirm('Apakah yakin untuk menghapus review ini ?');"><i class="bx bx-message-square-x bx-sm" style="color: red;"></i></a>
                                            <table width="100%" class="table table-hover table-bordered mt-2 ">
                                                <tr bgcolor="#F9F9F9">
                                                    <td width="5%"><strong>No.</strong></td>
                                                    <td width="71%"><strong>Aspek Penilaian</strong></td>
                                                    <td width="15%"><strong>Bobot</strong></td>
                                                    <td width="9%"><strong>Skor</strong></td>
                                                    <td width="9%"><strong>Nilai</strong></td>
                                                </tr>
                                                <?php
                                                $no = 1;
                                                $nilai = 0;
                                                foreach ($aspek as $key => $data1) {
                                                    $skoraspek = $this->Atribut_model->skor($data->review_id, $data1->aspek_id);
                                                    $skor = $skoraspek->skor;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $data1->keterangan ?></td>
                                                        <td><?php echo $data1->nilai ?></td>
                                                        <td><?php if ($skor == null) {
                                                                echo '-';
                                                            } else {
                                                                echo $skor;
                                                            } ?></td>
                                                        <td><?php echo $hasilSkor = $data1->nilai * $skor ?></td>
                                                    </tr>
                                                <?php
                                                    $nilai = $nilai + $hasilSkor;
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="2"><strong>Total Nilai</strong></td>
                                                    <td colspan="3"><strong><?php echo $nilai; ?></strong></td>
                                                </tr>
                                            </table>

                                            <table width="100%" class="table">
                                                <tr>
                                                    <p style="text-decoration: bold;"><b>Catatan :</b></p>
                                                </tr>
                                                <tr>
                                                    <?= $data->catatan ?>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <br>
                        <?php
                            }
                        }
                        ?>
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