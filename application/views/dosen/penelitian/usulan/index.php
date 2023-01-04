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
                            <a href="<?= site_url('dosen/penelitian/usulan/add') ?>" class="btn btn-primary" type="button" style="color: white;">Tambah Proposal</a>
                        </div>
                    </div>


                    <div class="container-xxl flex-grow-1 container-p-y">
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
                                    <h5 class="card-title text-primary">Usulan Penelitian</h5>

                                    <table id="tablepengajuan" class="table table-bordered table-striped table-hover " style="width:100%; overflow-x:auto;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Usulan</th>
                                                <th>SKim</th>
                                                <th>Judul</th>
                                                <th>Tanggal Pelaksanaan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pengajuan as $data) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= date("d-m-Y", strtotime($data->tgl_usulan)) ?></td>
                                                    </td>
                                                    <td><?= $data->skim_name ?></td>
                                                    <td><?= $data->usulan_judul ?></td>
                                                    <td><?= date("d-m-Y", strtotime($data->usulan_tglmulai)) . ' s/d ' . date("d-m-Y", strtotime($data->usulan_tglakhir)) ?></td>
                                                    <td>
                                                        <?php
                                                        if ($data->status_usulan == 1) {
                                                            echo '<span class="badge bg-warning">Baru</span>';
                                                        } else {
                                                            if ($data->usulan_verif_studi == 0) {
                                                                echo '<span class="badge bg-warning">Pending Verifikasi Studi</span>';
                                                            } else if ($data->usulan_verif_studi == 2) {
                                                                echo '
                                                                        <center>
                                                                        <span class="badge bg-danger mb-4">Revisi Pusat Studi</span>
                                                                        <br><br>  
                                                                        <button type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#listrevisi" onclick="verif(this.value)" value="' . $r->usulan_verif_note . '">
                                                                        <i class="material-icons">assignment</i>
                                                                        </button>
                                                                        </center>';
                                                            } else {
                                                                echo '<span class="badge bg-success">Proses</span>';
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($data->status_usulan == '1') {
                                                        ?>
                                                            <a href="<?= site_url('dosen/penelitian/pengajuan/detail/' . $this->variasi->encode($data->usulan_id))  . '/' . $this->variasi->encode($data->nidn) ?>" class="btn btn-outline-primary btn-sm" style="margin-bottom: 5px;"><i class="bx bxs-edit"></i> Detail</a>
                                                            <a href="<?= site_url('dosen/penelitian/pengajuan/anggota/' . $this->variasi->encode($data->usulan_id)) . '/' . $this->variasi->encode($data->nidn) ?>" class="btn btn-outline-primary btn-sm" style="margin-bottom: 5px;"><i class="bx bxs-user"></i> Anggota</a>
                                                            <a href="<?= site_url('dosen/penelitian/pengajuan/delete/' . $this->variasi->encode($data->usulan_id)) ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>
                                                            <?php
                                                        } else {
                                                            if ($data->usulan_verif_studi == '2') {
                                                            ?>
                                                                <a href="<?= site_url('dosen/penelitian/pengajuan/anggota/' . $this->variasi->encode($data->usulan_id)) . '/' . $this->variasi->encode($data->nidn) ?>" class="btn btn-outline-primary btn-sm"><i class="bx bxs-edit"></i> Edit</a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="<?= site_url('dosen/penelitian/pengajuan/anggota/' . $this->variasi->encode($data->usulan_id)) . '/' . $this->variasi->encode($data->nidn) ?>" class="btn btn-outline-primary btn-sm"><i class="bx bxs-user"></i> Anggota</a>
                                                        <?php
                                                            }
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