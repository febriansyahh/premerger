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
                    <?php
                    if ($data->status_usulan == 'Menunggu') {
                    ?>
                        <div class=" container-xxl flex-grow-1 container-p-y">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="card-body">
                                        <form action="<?= site_url('admin/pengabdian/usulan/verifikasi') ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="hidden" name="id" class="form-control" value="<?= $this->uri->segment(5) ?>">
                                                    <div class=" row">
                                                        <div class="col-md-6">
                                                            <label class="radio inline"><input name="usulan" type="radio" value="Diterima" checked /> <label class="label label-success "> Terima Usulan</label></label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="radio inline"><input name="usulan" type="radio" value="Ditolak" /> <label class="label label-important">Tolak Usulan</label></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input name="alasan" type="text" class="form-control mt-2" placeholder="Alasan Ditolak" size="150">
                                            <button name="verifikasi" type="submit" class="btn btn-primary mt-3">Verifikasi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } elseif ($data->status_usulan == 'Ditolak') {
                        echo '
                        <div class=" container-xxl flex-grow-1 container-p-y">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="card-body">
                                    <div class="alert alert-danger" role="alert">Usulan Pengabdian Ini Ditolak !</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    // echo $data->status_kelengkapan;
                    if (($data->status_usulan == 'Diterima' && $data->status_kelengkapan == 'Menunggu') or ($data->status_usulan == 'Diterima' && $data->status_kelengkapan == 'Tidak Lengkap')) {
                    ?>
                        <div class=" container-xxl flex-grow-1 container-p-y">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="card-body">
                                        <?php
                                        if ($this->session->flashdata('verifikasi')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Berhasil melakukan verifikasi data
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';

                                        if ($this->session->flashdata('gglverifikasi')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan verifikasi data
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                        ?>
                                        <form action="<?= site_url('admin/pengabdian/usulan/donepemeriksaan') ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" class="form-control" value="<?= $this->uri->segment(5) ?>">
                                            <table width="100%" class="table table-hover">
                                                <tr bgcolor="#F9F9F9">
                                                    <td><strong>No.</strong></td>
                                                    <td><strong>Materi Pemeriksaan</strong></td>
                                                    <td><strong>Pilihan</strong></td>
                                                </tr>
                                                <?php
                                                $cekno = 1;
                                                foreach ($pemeriksaan as $key => $cek) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $cekno ?></td>
                                                        <td><?php echo $cek->materi_pemeriksaan ?></td>
                                                        <td><select name="cek_pilihan<?php echo $cekno ?>" class="form-control" id="cek_pilihan" class="radio" required>
                                                                <?php
                                                                if ($cekis > 0) {
                                                                ?>
                                                                    <option value="Tidak" <?php if ($cek->cek_pilihan == 'Tidak') {
                                                                                                echo 'selected';
                                                                                            } ?>>Tidak</option>
                                                                    <option value="Ya" <?php if ($cek->cek_pilihan == 'Ya') {
                                                                                            echo 'selected';
                                                                                        } ?>>Ya</option>
                                                                <?php
                                                                } else {
                                                                    echo '
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak" >Tidak</option>
                                                                ';
                                                                }
                                                                ?>

                                                            </select>
                                                            <input type="hidden" name="pemeriksaan_id<?php echo $cekno ?>" value="<?php echo $cek->pemeriksaan_id; ?>">
                                                        </td>
                                                    </tr>
                                                <?php $cekno++;
                                                } ?>
                                                <input type="hidden" name="jumlah" value="<?php echo $cekno; ?>">
                                            </table>
                                            <span class="pull-right"><button name="simpan" type="submit" style="float: right;" class="btn btn-success mt-3" onclick="return confirm('Apakah yakin untuk mengkonfirmasi usulan ini ?');">Simpan</button></span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>



                    <div class=" container-xxl flex-grow-1 container-p-y">
                        <h5 class="card-title text-primary">Detail Pengabdian</h5>
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
                                            <td width="34%"><?php echo $data->nidn_pengusul ?></td>
                                        </tr>

                                        <tr>
                                            <td>Jabatan Fungsional</td>
                                            <td>:</td>
                                            <td><?php echo $data->anggota_jabatan ?></td>
                                            <td>Fakultas</td>
                                            <td>:</td>
                                            <td><?php echo $data->fakultas ?></td>
                                        </tr>

                                        <tr>
                                            <td>Tahun Usulan</td>
                                            <td>:</td>
                                            <td><?php echo $data->usulan_tahun ?></td>
                                            <td>Program Studi</td>
                                            <td>:</td>
                                            <td><?php echo $data->program_studi ?></td>
                                        </tr>

                                        <tr>
                                            <td>Skim</td>
                                            <td>:</td>
                                            <td><?php echo $data->skema_nama ?></td>
                                            <td>Tahun Ajaran</td>
                                            <td>:</td>
                                            <td><?php echo $data->tahun_ajaran ?></td>
                                        </tr>

                                        <!-- <tr>
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
                        <?Php } ?> -->

                                    </table>

                                    <table width="100%" class="table table-hover">
                                        <tr bgcolor="#F9F9F9">
                                            <td width="18%"><strong>Tanggal</strong></td>
                                            <td width="28%"><strong>Tahap</strong></td>
                                            <td width="54%"><strong>File Download</strong></td>
                                        </tr>
                                        <?php
                                        foreach ($tahap as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?php echo date('d-m-Y', strtotime($value->tanggal)) ?></td>
                                                <td><?php echo $value->status_tahap ?></td>
                                                <td><a href="<?php echo base_url('/upload_file/pengabdian/file/' . $value->filetahap);  ?>" target="_blank" title="Download <?php echo $data->nidn_pengusul ?>"><i class="icon-download-alt"></i> <?php echo substr($value->filetahap, 0, 30) . '...'; ?></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <br>
                                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
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
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-lembaga" aria-controls="navs-lembaga" aria-selected="false">
                                                <i class="tf-icons bx bxs-building"></i> Lembaga Pengabdian
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
                                                    <td width="84%"><input type="text" name="judul" class="form-control" value="<?php echo $data->usulan_judul ?>" readonly></td>
                                                </tr>

                                                <tr>
                                                    <td>Abstrak</td>
                                                    <td>:</td>
                                                    <td><textarea readonly name="abstrak" id="content" class="form-control" rows="5" value="<?php echo $data->usulan_abstrak ?>"><?php echo $data->usulan_abstrak ?></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>Keywords</td>
                                                    <td>:</td>
                                                    <td><input type="text" name="keyword" class="form-control" value="<?php echo $data->usulan_keyword ?>"></td>
                                                </tr>

                                                <tr>
                                                    <td>Surel (e-mail)</td>
                                                    <td>:</td>
                                                    <td><input type="text" name="email" class="form-control" value="<?php echo $data->email ?>" readonly></td>
                                                </tr>

                                                <tr>
                                                    <td>Nomor HP</td>
                                                    <td>:</td>
                                                    <td><input type="text" name="" class="form-control" value="" readonly></td>
                                                </tr>

                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><input type="text" name="" class="form-control" value="" readonly></td>
                                                </tr>

                                            </table>
                                        </div>

                                        <div class=" tab-pane fade" id="navs-atribut" role="tabpanel">
                                            <p></p>
                                            <table width="100%" class="table" border="0">
                                                <tr>
                                                    <td width="24%">Program Studi</td>
                                                    <td width="3%">:</td>
                                                    <td width="73%"><?php echo $data->program_studi ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Lama Pengabdian</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->usulan_lama_pengabdian ?></td>
                                                </tr>

                                                <!-- <tr>

                                    <td>Sifat Kegiatan</td>

                                    <td>:</td>

                                    <td><?php echo $data->sifat_kegiatan ?></td>

                                </tr> -->

                                                <tr>
                                                    <td>Bidang Keahlian</td>
                                                    <td>:</td>
                                                    <td><?php echo $data->skema_nama ?></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="navs-anggota" role="tabpanel">
                                            <p>Anggota Internal</p>
                                            <table class="table" border="0">
                                                <tr>
                                                    <td style="width: 30%;"><strong>Nama Lengkap</strong></td>
                                                    <td style="width: 20%;"><strong>NIS / NIDN</strong></td>
                                                    <td style="width: 25%;"><strong>Pangkat</strong></td>
                                                    <td style="width: 25%;"><strong>Jabatan</strong></td>
                                                </tr>

                                                <?php
                                                foreach ($anggota as $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value->anggota_nama ?></td>
                                                        <td><?php echo $value->anggota_nidn ?></td>
                                                        <td><?php echo $value->anggota_pangkat ?></td>
                                                        <td><?php echo $value->anggota_jabatan ?></td>
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
                                                    <td width="30%">Biaya total diusulkan dalam 1 Tahun</td>
                                                    <td width="4%">:</td>
                                                    <!-- <td width="66%">Rp. <?php echo $data->usulan_total_biaya ?></td> -->
                                                    <td width="66%">Rp. <?php echo number_format($data->usulan_total_biaya, 0, '', '.') ?></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3"><strong>Biaya Tahun berjalan</strong></td>
                                                </tr>

                                                <tr>
                                                    <td>Pagu Biaya</td>
                                                    <td>:</td>
                                                    <td style="color:#F00">Maksimum Rp. <?php echo number_format($data->usulan_biaya, 0, '', '.') ?></td>
                                                </tr>

                                                <tr>
                                                    <td>APB UMK</td>
                                                    <td>:</td>
                                                    <td>Rp. <?php echo number_format($data->usulan_biaya_apb, 0, '', '.')  ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Biaya Lain</td>
                                                    <td>:</td>
                                                    <td>Rp. <?php echo number_format($data->usulan_biaya_lain, 0, '', '.') ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Total Biaya Keseluruhan</td>
                                                    <td>:</td>
                                                    <td>Rp. <?php echo number_format($data->usulan_total_biaya,  0, '', '.') ?></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade" id="navs-isian" role="tabpanel">
                                            <p></p>
                                            <table width="100%" class="table" border="0">
                                                <!-- <tr>
                                    <td width="30%">Kota Usulan</td>
                                    <td width="4%">:</td>
                                    <td width="66%"><?php echo $data->kota_usulan ?></td>
                                </tr> -->
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
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="<?= site_url('admin/pengabdian/usulan') ?>" class="btn btn-primary">Kembali</a>
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