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
                                    <h5 class="card-title text-primary">Usulan Pengabdian</h5>

                                    <table id="tableusulanadmin" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pengusul</th>
                                                <th>Judul</th>
                                                <th>Tahun Usulan</th>
                                                <!-- <th>Lama Pengabdian</th> -->
                                                <th>Reviewer</th>
                                                <th>Kelengkapan</th>
                                                <th>Review</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($usulan as $data) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->nidn_pengusul . ' - ' . $data->nama ?></td>
                                                    <td><?= $data->usulan_judul ?></td>
                                                    <td><?= $data->usulan_tahun ?></td>
                                                    <!-- <td><?= $data->usulan_lama_pengabdian ?></td> -->
                                                    <td>
                                                        <?php
                                                        $jmlh = $this->Atribut_model->jmlhreview($data->usulan_id);
                                                        $mengisi = $this->Atribut_model->mengisi($data->usulan_id);
                                                        if ($data->status_usulan == 'Ditolak') {
                                                            echo '<span class="badge bg-danger">Usulan Ditolak</span>';
                                                        } else {
                                                            if ($jmlh->jmlh > 0) {
                                                                echo '<span class="badge bg-success">';
                                                                echo $mengisi->jum  . ' / ' . $jmlh->jmlh;
                                                                echo '</span>';
                                                            } else {
                                                                echo '<span class="badge bg-warning">Belum Dipilih</span>';
                                                            }
                                                        ?>
                                                            <a href="<?= site_url('admin/pengabdian/usulan/hslreview/' . $this->variasi->encode($data->usulan_id)) ?>"><i class="bx bxs-zoom-in"></i> </a>
                                                            <?php
                                                            if ($data->hasil_nilai == '') {
                                                            ?>
                                                                <a href="<?= site_url('admin/pengabdian/usulan/reviewer/' . $this->variasi->encode($data->usulan_id)) ?>"><i class="bx bxs-user"></i> </a>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        switch ($data->status_usulan) {
                                                            case 'Menunggu':
                                                                echo '<span class="badge bg-warning">Menunggu</span>';
                                                                break;

                                                            case 'Ditolak':
                                                                echo '<span class="badge bg-danger">Diterima</span>';
                                                                break;

                                                            case 'Diterima':
                                                                echo '<span class="badge bg-primary">Diterima</span>';
                                                                break;

                                                            case 'Selesai':
                                                                echo '<span class="badge bg-success">Selesai</span>';
                                                                break;
                                                        }
                                                        ?>
                                                        /
                                                        <?php
                                                        switch ($data->status_kelengkapan) {
                                                            case 'Menunggu':
                                                                echo '<span class="badge bg-warning">Menunggu</span>';
                                                                break;

                                                            case 'Tidak Lengkap':
                                                                echo '<span class="badge bg-danger">Tidak Lengkap</span>';
                                                                break;

                                                            case 'Lengkap':
                                                                echo '<span class="badge bg-primary">Lengkap</span>';
                                                                break;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        switch ($data->hasil_nilai) {
                                                            case 'Tidak Lolos':
                                                                echo '<span class="badge bg-danger">Tidak Lolos</span>';
                                                                break;

                                                            case 'Lolos':
                                                                echo '<span class="badge bg-success">Lolos</span>';
                                                                break;

                                                            default:
                                                                echo '<span class="badge bg-warning">Menunggu</span>';
                                                                break;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('admin/pengabdian/usulan/detail/' . $this->variasi->encode($data->usulan_id)) ?>" class="btn btn-outline-primary btn-sm"><i class="bx bxs-detail"></i> </a>
                                                        <?php
                                                        if ($data->hasil_nilai != '') {
                                                        ?>
                                                            <a href="<?= site_url('admin/pengabdian/usulan/isdone/' . $this->variasi->encode($data->usulan_id)) ?>" onclick="return confirm('Apakah yakin untuk mengkonfirmasi bahwa usulan ini sudah benar ?');" class="btn btn-outline-success btn-sm"><i class="bx bx-check"></i></a>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a href="<?= site_url('admin/pengabdian/usulan/isconfirm/' . $this->variasi->encode($data->usulan_id)) ?>" onclick="return confirm('Apakah yakin untuk mengkomfirmasi usulan ini ?');" class="btn btn-outline-primary btn-sm"><i class="bx bx-check"></i></a>

                                                        <?php
                                                        }
                                                        ?>
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