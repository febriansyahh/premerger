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
                                    <h5 class="card-title text-primary">Detail Pengabdian</h5>

                                    <table width="100%" border="0" class="table">
                                        <tr>
                                            <td width="16%">Nama Dosen</td>
                                            <td width="3%">:</td>
                                            <td width="31%"><?php echo $data->nama_lengkap ?></td>
                                            <td width="16%">NIP</td>
                                            <td width="3%">:</td>
                                            <td width="34%"><?php echo $data->username ?></td>
                                        </tr>

                                        <tr>
                                            <td>Jabatan Fungsional</td>
                                            <td>:</td>
                                            <td><?php echo $data->nama_jabatan ?></td>
                                            <td>Fakultas</td>
                                            <td>:</td>
                                            <td><?php echo $data->nama_fakultas ?></td>
                                        </tr>

                                        <tr>
                                            <td>Tahun Usulan</td>
                                            <td>:</td>
                                            <td><?php echo $data->tahun_usulan ?></td>
                                            <td>Program Studi</td>
                                            <td>:</td>
                                            <td><?php echo $data->nama_prodi ?></td>
                                        </tr>

                                        <tr>
                                            <td>Skim</td>
                                            <td>:</td>
                                            <td><?php echo $data->nama_skim ?></td>
                                            <td>Tahun Pelaksanaan</td>
                                            <td>:</td>
                                            <td><?php echo $data->tahun_pelaksanaan ?></td>
                                        </tr>

                                        <tr>
                                            <td>Kelengkapan</td>
                                            <td>:</td>
                                            <td><?php echo $data->status_kelengkapan ?></td>
                                            <td>Pengesahan</td>
                                            <td>:</td>
                                            <td><?php if ($data->status_kelengkapan == 'Lengkap') {
                                                    echo '<a href="" title="Download Pengesahan"><i class="icon-download-alt"></i> Pengesahan.pdf</a>';
                                                } else {
                                                    echo '<label class="label label-info">Menunggu</label>';
                                                } ?>
                                            </td>
                                        </tr>

                                        <?Php if ($data->nilai_rata > 0) { ?>
                                            <tr>
                                                <td>Nilai Reviewer</td>
                                                <td>:</td>
                                                <td><b><?php echo $data->nilai_rata; ?></b></td>
                                                <td>Hasil Reviewer</td>
                                                <td>:</td>
                                                <td><b><?php echo $data->hasil_nilai; ?></b></td>

                                            </tr>
                                        <?Php } ?>

                                    </table>

                                    <table width="100%" class="table table-hover">
                                        <tr bgcolor="#F9F9F9">
                                            <td width="18%"><strong>Tanggal</strong></td>
                                            <td width="28%"><strong>Tahap</strong></td>
                                            <td width="54%"><strong>File Download</strong></td>
                                        </tr>

                                        <tr>
                                            <td><?php echo $hibah->tanggal ?></td>
                                            <td><?php echo $hibah->status_tahap ?></td>
                                            <td><a href="<?php echo base_url('/assets/upload/' . $hibah->url_proposal);  ?>" title="Download <?php echo $hibah->status_tahap ?>"><i class="icon-download-alt"></i> <?php echo substr($hibah->url_proposal, 0, 30) . '...'; ?></a></td>
                                        </tr>
                                    </table>
                                    <br>

                                    <!-- <div class="col-xl-12 mt-3"> -->
                                    <!-- <div class="nav-align-top mb-4 mt-6"> -->
                                    <ul class="nav nav-tabs nav-fill" role="tablist">
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
                                                <i class="tf-icons bx bx-user"></i> Anggota Pengabdian
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-biaya" aria-controls="navs-biaya" aria-selected="false">
                                                <i class="tf-icons bx bx-money"></i> Biaya usulan
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-isian" aria-controls="navs-isian" aria-selected="false">
                                                <i class="tf-icons bx bxs-report"></i> Isian Pengesahan
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="navs-usulan" role="tabpanel">
                                            <p>
                                            </p>
                                            <table width="100%" class="table" border="0">
                                                <tr>
                                                    <td width="12%">Judul</td>
                                                    <td width="4%">:</td>
                                                    <td width="84%"><?php echo $data->judul ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Abstrak</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->abstrak ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Keywords</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->keyword ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Surel (e-mail)</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->email_dosen ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Nomor HP</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->nomor_hp ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->alamat_dosen ?></td>
                                                </tr>

                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="navs-atribut" role="tabpanel">
                                            <p></p>
                                            <table width="100%" class="table" border="0">



                                                <tr>



                                                    <td width="24%">Program Studi</td>



                                                    <td width="3%">:</td>



                                                    <td width="73%"><?php echo $data->nama_prodi ?></td>



                                                </tr>



                                                <tr>



                                                    <td>Lama Pengabdian</td>



                                                    <td>:</td>



                                                    <td><?php echo $data->lama_penelitian ?></td>



                                                </tr>

                                                <tr>

                                                    <td>Sifat Kegiatan</td>

                                                    <td>:</td>

                                                    <td><?php echo $data->sifat_kegiatan ?></td>

                                                </tr>

                                                <tr>

                                                    <td>Bidang Keahlian</td>

                                                    <td>:</td>

                                                    <td><?php echo $data->bidang_keahlian ?></td>

                                                </tr>



                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="navs-anggota" role="tabpanel">
                                            <p></p>
                                            <table class="table" border="0">
                                                <tr>
                                                    <td><strong>Nama Lengkap</strong></td>
                                                    <td><strong>NIP / NIM</strong></td>
                                                    <td><strong>Program Studi</strong></td>
                                                    <td><strong>Jenis</strong></td>
                                                </tr>

                                                <?php
                                                foreach ($anggota as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value->nama_lengkap ?></td>
                                                        <td><?php echo $value->username ?></td>
                                                        <td><?php echo $value->nama_prodi ?></td>
                                                        <td><?php echo $value->jenis ?></td>
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
                                                    <td width="30%">Biaya total diusulkan dalam 1 Tahun</td>
                                                    <td width="4%">:</td>
                                                    <td width="66%">Rp. <?php echo $data->apb_umk + $data->biaya_lain ?></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3"><strong>Biaya Tahun berjalan</strong></td>
                                                </tr>

                                                <tr>
                                                    <td>Pagu Biaya</td>
                                                    <td>&nbsp;</td>
                                                    <td style="color:#F00">Minimum Rp. <?php echo $data->biaya_pagu_min ?></td>
                                                </tr>

                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td style="color:#F00">Maksimum Rp. <?php echo $data->biaya_pagu_max ?></td>
                                                </tr>

                                                <tr>
                                                    <td>APB UMK</td>
                                                    <td>:</td>
                                                    <td>Rp. <?php echo $data->apb_umk ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Biaya dari lain</td>
                                                    <td>:</td>
                                                    <td>Rp. <?php echo $data->biaya_lain ?></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="navs-isian" role="tabpanel">
                                            <p></p>
                                            <table width="100%" class="table" border="0">
                                                <tr>
                                                    <td width="30%">Kota Usulan</td>
                                                    <td width="4%">:</td>
                                                    <td width="66%"><?php echo $data->kota_usulan ?></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3"><strong>Ketua LPM</strong></td>
                                                </tr>

                                                <tr>
                                                    <td>Nama yang mengetahui</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->lpm_nama ?></td>
                                                </tr>

                                                <tr>
                                                    <td>NIP / NIK yang mengetahui</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->lpm_nip ?></td>
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
                                                    <td><?php echo $data->dekan_nip ?></td>
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
                                                    <td><?php echo $data->rektor_nip ?></td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="<?= site_url('dosen/pengabdian/Anggota') ?>" class="btn btn-primary">Kembali</a>
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

</body>

</html>