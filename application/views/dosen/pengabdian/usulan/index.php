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
                    <div class="container">
                        <div class="form-group mt-4">
                            <a href="<?= site_url('dosen/pengabdian/usulan/add') ?>" class="btn btn-primary" type="button" style="color: white;">Ajukan Usulan</a>
                        </div>
                    </div>

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

                                    <table id="tableusulan" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Skema</th>
                                                <th>Tahun Usulan</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Review</th>
                                                <th>Kelengkapan</th>
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
                                                    <td><?= $data->usulan_judul ?></td>
                                                    <td><?php if ($data->skema_nama == ''){
                                                        echo 'Usulan Lama';
                                                    }else{
                                                        echo $data->skema_nama;
                                                    } ?></td>
                                                    <td><?= $data->usulan_tahun ?></td>
                                                    <td><?= $data->tahun_ajaran . ' ' . $data->semester ?></td>
                                                    <!-- <td>
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
                                                    </td> -->
                                                    <td>
                                                        <?php
                                                        $jmlh = $this->Atribut_model->jmlhreview($data->usulan_id);
                                                        $mengisi = $this->Atribut_model->mengisi($data->usulan_id);
                                                        if ($jmlh->jmlh > 0) {
                                                            echo '<span class="badge bg-success">';
                                                            echo $mengisi->jum  . ' / ' . $jmlh->jmlh;
                                                            echo '</span>';
                                                        ?>
                                                            <a href="<?= site_url('dosen/pengabdian/usulan/hslreview/' . $this->variasi->encode($data->usulan_id)) ?>"><i class="bx bxs-zoom-in"></i> </a>
                                                        <?php
                                                        } else {
                                                            echo '<span class="badge bg-warning">Belum Dipilih</span>';
                                                        }
                                                        ?>
                                                        <br>
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
                                                        /
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
                                                    </td>
                                                    <td width="15%">
                                                        <a href="<?= site_url('dosen/pengabdian/usulan/detail/' . $this->variasi->encode($data->usulan_id)) ?>" class="btn btn-outline-primary btn-sm"><i class="bx bxs-detail"></i>Detail</a>
                                                        <a style="margin-top: 4px; margin-bottom: 4px" href="<?= site_url('dosen/pengabdian/usulan/anggota/' . $this->variasi->encode($data->usulan_id)) ?>" class="btn btn-outline-primary btn-sm"><i class="bx bxs-user"></i>Anggota</a>
                                                        <a href="<?php echo site_url('dosen/pengabdian/usulan/deleteusulan/' . $this->variasi->encode($data->usulan_id)) ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm"><i class="bx bxs-trash"></i>Hapus</a>

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