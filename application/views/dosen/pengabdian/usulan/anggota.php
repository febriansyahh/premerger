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

                                    if ($this->session->flashdata('terhapus')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Berhasil menghapus data anggota
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('gglhapus')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal menghapus data anggota
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('ubah')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Berhasil melakukan perubahan data
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('gglUbah')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan perubahan data
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('tugas')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Anggota tersebut saat ini sedang status tugas belajar, penambahan anggota gagal !
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    ?>
                                    <div class="col-xxl">
                                        <table id="tableinternal" class="table table-bordered table-striped table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th style="width:25;">Judul</th>
                                                    <th style="width:25%;">Skema</th>
                                                    <th style="width:18%;">Jumlah Mahasiswa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= $usulan->usulan_judul ?></td>
                                                    <td><?= $usulan->skema_nama ?></td>
                                                    <td><?= $usulan->jmlh_mahasiswa ?></td>
                                                </tr>
                                        </table>
                                    </div>
                                    <div class="col-xxl" style="margin-top: 40px">
                                        <h6>Anggota Pengabdian Internal
                                            <?php
                                            if ($usulan->status_usulan == 'Menunggu' && $usulan->hasil_nilai == '') {
                                            ?>
                                                <a data-bs-toggle="modal" data-bs-target="#anggotainter" class="btn btn-primary btn-sm" type="button" style="color: white;"><i class="bx bx-plus"></i>Anggota</a>
                                            <?php
                                            }
                                            if ($usulan->status_usulan == 'Diterima' && $usulan->status_kelengkapan == 'Tidak Lengkap') {
                                            ?>
                                                <a data-bs-toggle="modal" data-bs-target="#anggotainter" class="btn btn-primary btn-sm" type="button" style="color: white;"><i class="bx bx-plus"></i>Anggota</a>
                                            <?php
                                            }
                                            ?>
                                        </h6>
                                        <table id="tableinternal" class="table table-bordered table-striped table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%;">No</th>
                                                    <th style="width:15%;">NIDN</th>
                                                    <th style="width:20%;">Nama</th>
                                                    <th style="width:15%;">Pangkat</th>
                                                    <th style="width:15%;">Jabatan</th>
                                                    <th style="width:20%;">Jobdesk</th>
                                                    <th style="width:10%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($internal as $data) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $data->anggota_nidn ?></td>
                                                        <td><?= $data->anggota_nama ?></td>
                                                        <td><?= $data->anggota_pangkat ?></td>
                                                        <td><?= $data->anggota_jabatan ?></td>
                                                        <td><?= $data->anggota_jobdesk ?></td>
                                                        <td>
                                                            <?php
                                                            if ($usulan->status_usulan == 'Menunggu' && $usulan->hasil_nilai == '') {
                                                            ?>
                                                                <a href="<?php echo site_url('dosen/pengabdian/usulan/deleteanggota/' . $this->variasi->encode($data->anggota_id)) . '-' . $this->uri->segment('5') ?> " onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm"><i class="bx bxs-trash"></i></a>
                                                            <?php
                                                            } else {
                                                                echo '<span class="badge bg-success">Selesai</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                        </table>
                                    </div>
                                    <div class="col-xxl" style="margin-top: 40px">
                                        <h6>Anggota Pengabdian Mahasiswa
                                            <?php
                                            if ($usulan->status_usulan == 'Menunggu' && $usulan->hasil_nilai == '' && $jmlmhs < $usulan->jmlh_mahasiswa) {
                                            ?>
                                                <a data-bs-toggle="modal" data-bs-target="#anggotamhs" class="btn btn-primary btn-sm" type="button" style="color: white;"><i class="bx bx-plus"></i>Anggota</a>
                                            <?php
                                            }
                                            if ($usulan->status_usulan == 'Diterima' && $usulan->status_kelengkapan == 'Tidak Lengkap') {
                                            ?>
                                                <a data-bs-toggle="modal" data-bs-target="#anggotamhs" class="btn btn-primary btn-sm" type="button" style="color: white;"><i class="bx bx-plus"></i>Anggota</a>
                                            <?php
                                            }
                                            ?>
                                        </h6>
                                        <table class="table table-bordered table-striped table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%;">No</th>
                                                    <th style="width:15%;">NIM</th>
                                                    <th style="width:20%;">Nama</th>
                                                    <th style="width:15%;">Instansi</th>
                                                    <th style="width:15%;">Jobdesk</th>
                                                    <th style="width:15%;">Email</th>
                                                    <th style="width:15%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($mahasiswa as $data) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $data->anggota_eks_kode ?></td>
                                                        <td><?= $data->anggota_eks_nama ?></td>
                                                        <td><?= $data->anggota_eks_instansi ?></td>
                                                        <td><?= $data->anggota_eks_jobdesk ?></td>
                                                        <td><?= $data->anggota_eks_email ?></td>
                                                        <td>
                                                            <?php
                                                            if ($usulan->status_usulan == 'Menunggu' && $usulan->hasil_nilai == '') {
                                                            ?>
                                                                <a href="<?php echo site_url('dosen/pengabdian/usulan/deleteeks/' . $this->variasi->encode($data->anggota_eks_id)) . '-' . $this->uri->segment('5') ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm"><i class="bx bxs-trash"></i></a>
                                                            <?php
                                                            } else {
                                                                echo '<span class="badge bg-success">Selesai</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                        </table>
                                    </div>
                                    <div class="col-xxl" style="margin-top: 40px; margin-bottom:15px">
                                        <h6>Anggota Pengabdian Eksternal
                                            <?php
                                            if ($usulan->status_usulan == 'Menunggu' && $usulan->hasil_nilai == '') {
                                            ?>
                                                <a data-bs-toggle="modal" data-bs-target="#anggotaeks" class="btn btn-primary btn-sm" type="button" style="color: white;"><i class="bx bx-plus"></i>Anggota</a>
                                            <?php
                                            }
                                            if ($usulan->status_usulan == 'Diterima' && $usulan->status_kelengkapan == 'Tidak Lengkap') {
                                            ?>
                                                <a data-bs-toggle="modal" data-bs-target="#anggotaeks" class="btn btn-primary btn-sm" type="button" style="color: white;"><i class="bx bx-plus"></i>Anggota</a>
                                            <?php
                                            }
                                            ?>
                                        </h6>
                                        <table class="table table-bordered table-striped table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%;">No</th>
                                                    <th style="width:15%;">Identitas</th>
                                                    <th style="width:20%;">Nama</th>
                                                    <th style="width:15%;">Instansi</th>
                                                    <th style="width:15%;">Jobdesk</th>
                                                    <th style="width:15%;">Email</th>
                                                    <th style="width:15%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($eksternal as $data) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $data->anggota_eks_kode ?></td>
                                                        <td><?= $data->anggota_eks_nama ?></td>
                                                        <td><?= $data->anggota_eks_instansi ?></td>
                                                        <td><?= $data->anggota_eks_jobdesk ?></td>
                                                        <td><?= $data->anggota_eks_email ?></td>
                                                        <td>
                                                            <?php
                                                            if ($usulan->status_usulan == 'Menunggu' && $usulan->hasil_nilai == '') {
                                                            ?>
                                                                <a href="<?php echo site_url('dosen/pengabdian/usulan/deleteeks/' . $this->variasi->encode($data->anggota_eks_id)) . '-' . $this->uri->segment('5') ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm"><i class="bx bxs-trash"></i></a>
                                                            <?php
                                                            } else {
                                                                echo '<span class="badge bg-success">Selesai</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                        </table>
                                    </div>
                                    <a href="<?php echo site_url('dosen/pengabdian/usulan') ?>" class="btn btn-warning action-button" style="float: left; text-align: center; background: warning;">Kembali</a>
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

<div class="modal fade" id="anggotainter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Anggota Internal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo site_url('dosen/pengabdian/usulan/saveanggota') ?>" method="post" enctype="multipart/form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">NIS / NIDN Anggota</label>
                            <input type="hidden" name="id_usulan" class="form-control" value="<?= $this->uri->segment('5') ?>">
                            <input type="hidden" name="jenis" class="form-control" value="internal">
                            <input list="datadosen" name="kode_dos" id="kode_dos" class="form-control" placeholder="Masukkan NIDN Dosen" autocomplete="on" onkeyup="showResultDosen(this.value)">
                            <datalist id="datadosen">
                                <div id="listdosen"></div>
                            </datalist>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">NIS / NIDN Anggota</label><br>
                            <select class="form-control select2" name="state">
                                <option value="AL">Alabama</option>
                                <option value="AB">Amsterdam</option>
                                <option value="NY">New York</option>
                                <option value="LG">London</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Jobdesk Anggota</label>
                            <textarea name="jobdesk" rows="3" class="form-control" required></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="anggotamhs" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Anggota Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo site_url('dosen/pengabdian/usulan/saveanggota') ?>" method="post" enctype="multipart/form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">NIM Anggota</label>
                            <input type="hidden" name="id_usulan" class="form-control" value="<?= $this->uri->segment('5') ?>">
                            <input type="hidden" name="jenis" class="form-control" value="mahasiswa">
                            <input list="datamhs" name="eks_kodemhs" id="eks_kodemhs" class="form-control" placeholder="Masukkan NIM Mahasiswa" autocomplete="on" onkeyup="showResultMhs(this.value)">
                            <datalist id="datamhs">
                                <div id="listmhs"></div>
                            </datalist>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Jobdesk Anggota</label>
                            <textarea name="jobdesk" rows="3" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="anggotaeks" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Anggota Eksternal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo site_url('dosen/pengabdian/usulan/saveanggota') ?>" method="post" enctype="multipart/form">
                <div class="modal-body">

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Identitas Anggota</label>
                            <input type="hidden" name="id_usulan" class="form-control" value="<?= $this->uri->segment('5') ?>">
                            <input type="hidden" name="jenis" class="form-control" value="eksternal">
                            <input type="text" name="kodeeks" class="form-control" placeholder="Masukkan Nomor Identitas KTP/SIM" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama Anggota</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkkan nama anggota" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Nama Instansi</label>
                            <input type="text" name="instansi" class="form-control" placeholder="Masukkkan instansi anggota" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Email Anggota</label>
                            <input type="text" name="email" class="form-control" placeholder="Masukkkan email anggota" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Jobdesk Anggota</label>
                            <textarea name="jobdesk" rows="3" class="form-control" required></textarea>
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

<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#anggotainter'),
        });

    });
</script>
<script type="text/javascript">
    function showResultDosen(str) {
        var id = str;
        var lenght = id.trim().length;
        console.log(id);
        if (lenght < 3) {
            document.getElementById("listdosen").innerHTML = "Kosong";
        } else {
            $.ajax({
                type: "POST",
                url: "<?= site_url('dosen/pengabdian/usulan/dosen'); ?>",
                data: {
                    id
                },
                success: function(response) {
                    document.getElementById("listdosen").innerHTML = response;
                },
            });
        }
    }

    function showResultMhs(str) {
        var id = str;
        var lenght = id.trim().length;
        console.log(id);
        if (lenght < 6) {
            document.getElementById("listmhs").innerHTML = "Kosong";
        } else {
            $.ajax({
                type: "POST",
                url: "<?= site_url('dosen/pengabdian/usulan/mahasiswa'); ?>",
                data: {
                    id
                },
                success: function(response) {
                    document.getElementById("listmhs").innerHTML = response;
                },
            });
        }
    }
</script>