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
                        <h5 class="card-title text-primary">Detail Penelitian</h5>
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="card-body">
                                    <?php
                                    if ($this->session->flashdata('verified')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Berhasil melakukan verifikasi data
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                    if ($this->session->flashdata('gglverified')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan verifikasi data
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    ?>

                                    <table width="100%" border="0" class="table">
                                        <tr>
                                            <td width="16%">Nama Dosen</td>
                                            <td width="3%">:</td>
                                            <td width="31%"><?php echo $data->nama ?></td>
                                            <td width="16%">NIP</td>
                                            <td width="3%">:</td>
                                            <td width="34%"><?php echo $data->nidn ?></td>
                                        </tr>

                                        <!-- <tr>
                                            <td>Jabatan Fungsional</td>
                                            <td>:</td>
                                            <td><?php echo $data->anggota_jabatan ?></td>
                                            <td>Fakultas</td>
                                            <td>:</td>
                                            <td><?php echo $data->fakultas ?></td>
                                        </tr> -->

                                        <tr>
                                            <td>Tanggal Ajuan</td>
                                            <td>:</td>
                                            <td><?php echo $data->tgl_usulan ?></td>
                                            <td>Pelaksanaan</td>
                                            <td>:</td>
                                            <td><?= date('d-m-Y', strtotime($data->usulan_tglmulai)) . ' s/d ' . date('d-m-Y', strtotime($data->usulan_tglakhir)) ?></td>
                                        </tr>

                                        <tr>
                                            <td>Skim</td>
                                            <td>:</td>
                                            <td><?php echo $data->skim_name ?></td>
                                            <td>Tahun Ajaran</td>
                                            <td>:</td>
                                            <td><?php echo $data->tahun_ajaran ?></td>
                                        </tr>
                                    </table>

                                    <ul class="nav nav-pills mb-3 mt-4 nav-fill" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-usulan" aria-controls="navs-usulan" aria-selected="true">
                                                <i class="tf-icons bx bx-file"></i> Identitas Usulan
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-atribut" aria-controls="navs-atribut" aria-selected="false">
                                                <i class="tf-icons bx bx-file"></i> Atribut Usulan
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-anggota" aria-controls="navs-anggota" aria-selected="false">
                                                <i class="tf-icons bx bx-user"></i> Anggota Penelitian
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-biaya" aria-controls="navs-biaya" aria-selected="false">
                                                <i class="tf-icons bx bx-money"></i> Biaya usulan
                                            </button>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-isian" aria-controls="navs-isian" aria-selected="false">
                                                <i class="tf-icons bx bxs-report"></i> Isian Pengesahan
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-lembaga" aria-controls="navs-lembaga" aria-selected="false">
                                                <i class="tf-icons bx bxs-building"></i> Lembaga Penelitian
                                            </button>
                                        </li> -->
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="navs-usulan" role="tabpanel">
                                            <p>
                                            </p>
                                            <table width="100%" class="table" border="0">
                                                <tr>
                                                    <td width="20%">Judul Penelitian</td>
                                                    <td width="4%">:</td>
                                                    <td width="74%"><input type="text" name="judul" class="form-control" value="<?php echo $data->usulan_judul ?>" readonly></td>
                                                </tr>

                                                <tr>
                                                    <td>Metode Penelitian</td>
                                                    <td>:</td>
                                                    <td><textarea readonly name="metode" class="form-control" rows="5"><?php echo $data->usulan_metode ?></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>Masalah Penelitian</td>
                                                    <td>:</td>
                                                    <td><textarea id="editor1" readonly name="masalah" class="form-control" rows="5"><?php echo $data->usulan_masalah ?></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>Tujuan Penelitian</td>
                                                    <td>:</td>
                                                    <td><textarea id="editor2" readonly name="tujuan" class="form-control" rows="5"><?php echo $data->usulan_tujuan ?></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>Luaran Penelitian</td>
                                                    <td>:</td>
                                                    <td><textarea readonly name="tujuan" class="form-control" rows="5"><?php echo $data->usulan_luaran ?></textarea></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class=" tab-pane fade" id="navs-atribut" role="tabpanel">
                                            <p></p>
                                            <table width="100%" class="table" border="0">
                                                <tr>
                                                    <td>Lama Penelitian</td>
                                                    <td>:</td>
                                                    <td><?= date('d-m-Y', strtotime($data->usulan_tglmulai)) . ' s/d ' . date('d-m-Y', strtotime($data->usulan_tglakhir)) ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Skim</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->skim_name ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Bidang Pusat Studi</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->pusat_studi_nama ?></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="navs-anggota" role="tabpanel">
                                            <p>Anggota Internal</p>
                                            <table class="table" border="0">
                                                <tr>
                                                    <td style="width: 30%;"><strong>Nama Lengkap</strong></td>
                                                    <td style="width: 20%;"><strong>NIS / NIDN</strong></td>
                                                    <td style="width: 20%;"><strong>Pangkat</strong></td>
                                                    <td style="width: 15%;"><strong>Jabatan</strong></td>
                                                    <td style="width: 15%;"><strong>level</strong></td>
                                                </tr>

                                                <?php
                                                foreach ($anggota as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value->anggota_nama ?></td>
                                                        <td><?php echo $value->anggota_nidn ?></td>
                                                        <td><?php echo $value->anggota_pangkat ?></td>
                                                        <td><?php echo $value->anggota_jabatan ?></td>
                                                        <td style="text-transform: capitalize;"><?php echo $value->anggota_posisi ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                            <br><br>
                                            <p>Anggota Eksternal</p>
                                            <table class="table" border="0">
                                                <tr>
                                                    <td style="width: 30%;"><strong>Nama Lengkap</strong></td>
                                                    <td style="width: 20%;"><strong>No Identitas</strong></td>
                                                    <td style="width: 25%;"><strong>Instansi</strong></td>
                                                    <td style="width: 25%;"><strong>Jenis</strong></td>
                                                </tr>

                                                <?php
                                                foreach ($anggotaeks as $value) {
                                                    $jenis = $value->anggota_eks_instansi != 'Mahasiswa' ? 'Eksternal' : 'Mahasiswa';
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value->anggota_eks_nama ?></td>
                                                        <td><?php echo $value->anggota_eks_kode ?></td>
                                                        <td><?php echo $value->anggota_eks_instansi ?></td>
                                                        <td><?php echo $jenis ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="navs-biaya" role="tabpanel">
                                            <p></p>
                                            <table width="100%" class="table" border="0">
                                                <tr>
                                                    <td colspan="3"><strong>Rincian Biaya</strong></td>
                                                </tr>

                                                <tr>
                                                    <td>Pagu Biaya</td>
                                                    <td>:</td>
                                                    <td style="color:#F00">Maksimum Rp. <?php echo number_format($data->usulan_biaya, 0, '', '.') ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Biaya Ajuan</td>
                                                    <td>:</td>
                                                    <td>Rp. <?php echo number_format($data->usulan_biaya_apb, 0, '', '.')  ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Total Biaya Di Setujui</td>
                                                    <td>:</td>
                                                    <td>Rp. <?php echo number_format($data->usulan_biaya_confirm,  0, '', '.') ?></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <!-- <div class="tab-pane fade" id="navs-isian" role="tabpanel">
                                            <p></p>
                                            <table width="100%" class="table" border="0">
                                                <tr>
                                                    <td colspan="3"><strong>Ketua LPM</strong></td>
                                                </tr>

                                                <tr>
                                                    <td width="22%">Nama yang mengetahui</td>
                                                    <td width="4%">:</td>
                                                    <td width="74%"><?php echo $data->lpm_nama ?></td>
                                                </tr>

                                                <tr>
                                                    <td>NIP / NIK yang mengetahui</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->lpm_nidn ?></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3"><strong>Dekan</strong></td>
                                                </tr>

                                                <tr>
                                                    <td>Nama yang mengetahui</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->dekan_nama ?></td>
                                                </tr>

                                                <tr>
                                                    <td>NIP / NIK yang mengetahui</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->dekan_nidn ?></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3"><strong>Rektor</strong></td>
                                                </tr>

                                                <tr>
                                                    <td>Nama yang menyetujui</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->rektor_nama ?></td>
                                                </tr>

                                                <tr>
                                                    <td>NIP / NIK yang menyetujui</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->rektor_nidn ?></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="navs-lembaga" role="tabpanel">
                                            <p></p>
                                            <table width="100%" class="table" border="0">
                                                <tr>
                                                    <td width="22%">Nama Lembaga</td>
                                                    <td width="4%">:</td>
                                                    <td width="74%"><?php echo $data->lembaga_nama ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Kategori Lembaga</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->lembaga_jabatan ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Nama Pimpinan Lembaga</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->lembaga_pimpinan ?></td>
                                                </tr>

                                                <tr>
                                                    <td>NIP / NIK Pimpinan</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->lembaga_pimpinan_id ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Lokasi</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->lembaga_lokasi ?></td>
                                                </tr>
                                                <tr>
                                                    <td>File Persetujuan</td>
                                                    <td>:</td>
                                                    <td><a href="<?php echo base_url('/upload_file/pengabdian/lembaga/' . $data->lembaga_file);  ?>" target="_blank" title="Download <?php echo $data->nidn_pengusul ?>"><i class="icon-download-alt"></i> <?php echo substr($data->lembaga_file, 0, 30) . '...'; ?></a></td>
                                                </tr>
                                            </table>
                                        </div> -->
                                    </div>
                                    <!-- </div> -->
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="<?= site_url('admin/penelitian/usulan') ?>" class="btn btn-primary">Kembali</a>
                                    <!-- </div> -->
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
    <script>
        CKEDITOR.replace('editor1', {
            height: 130
        });
        CKEDITOR.replace('editor2', {
            height: 130
        });
    </script>

</body>

</html>