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

                                    <table id="tableusulanpenelitianadmin" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pengusul</th>
                                                <th>Judul</th>
                                                <th>Skim</th>
                                                <th>Tanggal</th>
                                                <th>Tanggal Pelaksanaan</th>
                                                <th>Status</th>
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
                                                    <td><?= $data->nidn . ' - ' . $data->nama ?></td>
                                                    <td><?= $data->usulan_judul ?></td>
                                                    <td>
                                                        <?= $data->skim_name ?>
                                                    </td>
                                                    <td><?= date('d-m-Y', strtotime($data->tgl_usulan)) ?></td>
                                                    <td>
                                                        <?= date('d-m-Y', strtotime($data->usulan_tglmulai)) . ' s/d ' . date('d-m-Y', strtotime($data->usulan_tglakhir)) ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        switch ($data->status) {
                                                            case '1':
                                                                echo '<span class="badge bg-danger">';
                                                        ?>
                                                            <?php
                                                                echo $data->status_desc . '</span>';
                                                                break;

                                                            case '2':
                                                                echo '<span class="badge bg-primary">'
                                                            ?>
                                                            <?php
                                                                echo $data->status_desc . '</span>';
                                                                break;

                                                            case '3':
                                                                echo '<span class="badge bg-primary">';
                                                            ?>
                                                        <?php
                                                                echo $data->status_desc . '</span>';
                                                                break;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('admin/penelitian/usulan/detail/' . $this->variasi->encode($data->usulan_id)) ?>" class="btn btn-outline-primary btn-sm"><i class="bx bxs-detail"></i> </a>
                                                        <?php
                                                        if ($data->status != '2') {
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