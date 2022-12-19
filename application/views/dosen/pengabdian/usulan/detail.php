<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url('assets/') ?>" data-template="vertical-menu-template-free">

<?php $this->load->view("_partials/head.php") ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<style>
    #grad1 {
        background-color: #9C27B0;
        background-image: linear-gradient(120deg, #FF4081, #81D4FA);
    }

    /*form styles*/
    #msform {
        position: relative;
        margin-top: 20px;
    }

    #msform fieldset .form-card {
        background: white;
        border: 0 none;
        border-radius: 0px;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        padding: 20px 40px 30px 40px;
        box-sizing: border-box;
        width: 94%;
        margin: 0 3% 20px 3%;

        /*stacking fieldsets above each other*/
        position: relative;
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;

        /*stacking fieldsets above each other*/
        position: relative;
    }

    /*Hide all except first fieldset*/
    #msform fieldset:not(:first-of-type) {
        display: none;
    }

    #msform fieldset .form-card {
        text-align: left;
        color: #9E9E9E;
    }

    #msform input,
    #msform textarea {
        /* padding: 0px 8px 4px 8px; */
        /* border: none; */
        /* border-bottom: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%; */
        /* box-sizing: border-box; */
        /* font-family: montserrat; */
        color: #2C3E50;
        font-size: 16px;
        letter-spacing: 1px;
    }

    #msform input:focus,
    #msform textarea:focus {
        /* -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important; */
        border: none;
        /* font-weight: bold; */
        border-bottom: 2px solid skyblue;
        outline-width: 0;
    }

    /*Blue Buttons*/
    #msform .action-button {
        width: 130px;
        background: primary;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 6px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue;
    }

    /*Previous Buttons*/
    #msform .action-button-previous {
        width: 130px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 6px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
    }

    /*Dropdown List Exp Date*/
    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px;
    }

    select.list-dt:focus {
        border-bottom: 2px solid skyblue;
    }

    /*The background card*/
    .card {
        z-index: 0;
        border: none;
        border-radius: 0.5rem;
        position: relative;
    }

    /*FieldSet headings*/
    .fs-title {
        font-size: 25px;
        color: #2C3E50;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: left;
    }

    /*progressbar*/
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey;
        text-align: center;
    }

    #progressbar .active {
        color: #000000;
    }

    #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 33%;
        float: left;
        position: relative;
    }

    /*Icons in the ProgressBar*/
    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f007";
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f0f7";
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f15c";
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c";
    }

    /*ProgressBar before any progress*/
    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 18px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px;
    }

    /*ProgressBar connectors*/
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1;
    }

    /*Color number of the step and the connector before it*/
    #progressbar li.active:before,
    #progressbar li.active:after {
        background: skyblue;
    }

    /*Imaged Radio Buttons*/
    .radio-group {
        position: relative;
        margin-bottom: 25px;
    }

    .radio {
        display: inline-block;
        width: 204;
        height: 104;
        border-radius: 0;
        background: lightblue;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        cursor: pointer;
        margin: 8px 2px;
    }

    .radio:hover {
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
    }

    .radio.selected {
        box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
    }

    /*Fit image in bootstrap div*/
    .fit-image {
        width: 100%;
        object-fit: cover;
    }
</style>

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
                    if ($cekpem > 0 && $data->status_kelengkapan == 'Tidak Lengkap') {
                    ?>
                        <div class=" container-xxl flex-grow-1 container-p-y">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" class="form-control" value="<?= $this->uri->segment(5) ?>">
                                            <table width="100%" class="table table-hover">
                                                <tr bgcolor="#F9F9F9">
                                                    <td><strong>No.</strong></td>
                                                    <td><strong>Materi Pemeriksaan</strong></td>
                                                    <td><strong>Hasil</strong></td>
                                                </tr>
                                                <?php
                                                $cekno = 1;
                                                foreach ($pemeriksaan as $key => $cek) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $cekno ?></td>
                                                        <td><?php echo $cek->materi_pemeriksaan ?></td>
                                                        <td><select name="cek_pilihan<?php echo $cekno ?>" class="form-control" id="cek_pilihan" class="radio" readonly>
                                                                <option value="Tidak" <?php if ($cek->cek_pilihan == 'Tidak') {
                                                                                            echo 'selected';
                                                                                        } ?>>Tidak</option>
                                                                <option value="Ya" <?php if ($cek->cek_pilihan == 'Ya') {
                                                                                        echo 'selected';
                                                                                    } ?>>Ya</option>
                                                            </select>
                                                            <input type="hidden" name="pemeriksaan_id<?php echo $cekno ?>" value="<?php echo $cek->pemeriksaan_id; ?>">
                                                        </td>
                                                    </tr>
                                                <?php $cekno++;
                                                } ?>
                                                <input type="hidden" name="jumlah" value="<?php echo $cekno; ?>">
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

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

                                    if ($this->session->flashdata('gglUbah')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan perubahan data
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    ?>
                                    <div class="col-xxl">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0">Detail Usulan Pengabdian</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mx-0">
                                                    <form id="msform" method="post" action="<?= site_url('dosen/pengabdian/usulan/update') ?>" enctype="multipart/form-data">
                                                        <?php
                                                        if ($data->status_usulan == 'Menunggu') {
                                                            $disabled = '';
                                                        } else {
                                                            $disabled = 'disabled';
                                                        }
                                                        ?>
                                                        <!-- progressbar -->
                                                        <ul id="progressbar">
                                                            <li class="active" id="account"><strong>Identitas Ajuan</strong></li>
                                                            <li id="personal"><strong>Lembaga Usulan</strong></li>
                                                            <li id="payment"><strong>File Pendukung</strong></li>
                                                        </ul>
                                                        <!-- fieldsets -->
                                                        <fieldset>
                                                            <div class="form">
                                                                <h4 class="title" style="text-align: center">Identitas Ajuan</h4>
                                                                <input type="hidden" name="id" value="<?= $this->variasi->encode($data->usulan_id) ?>">
                                                                <input type="hidden" name="budget" value="<?= $data->usulan_biaya ?>" id="budget">
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Judul</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="judul" value="<?= $data->usulan_judul ?>" class="form-control" placeholder="Masukkan Judul Usulan Pengabdian" <?= $disabled ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Abstrak</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea name="abstrak" class="form-control" id="content" rows="5" value="<?= $data->usulan_abstrak ?>" <?= $disabled ?>><?= $data->usulan_abstrak ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Keyword</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="keyword" value="<?= $data->usulan_keyword ?>" class="form-control" placeholder="Masukkan Judul Usulan Pengabdian" <?= $disabled ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Kategori Pengabdian (Skim)</label>
                                                                    <div class="col-sm-10">
                                                                        <select name="skim" id="lstSkim" class="form-control" onchange="TampilBudget()" <?= $disabled ?>>
                                                                            <?php
                                                                            foreach ($skema as $value) {
                                                                                if ($value->skema_id == $data->skema_id) {
                                                                            ?>
                                                                                    <option value=" <?= $value->skema_id ?>" data-budget="<?= $value->skema_biaya_max; ?>" selected> <?= $value->skema_nama ?> </option>;
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <option value=" <?= $value->skema_id ?>" data-budget="<?= $value->skema_biaya_max; ?>"> <?= $value->skema_nama ?> </option>;
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Tahun Usulan Pengabdian</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="tahun_usulan" value="<?= $data->usulan_tahun ?>" class="form-control" placeholder="<?= date('Y') ?>" <?= $disabled ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Tahun Pelaksanaan Pengabdian</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="tahun_pelaksanaan" value="<?= $data->usulan_tahun_pelaksanaan ?>" class="form-control" placeholder="<?= date('Y') ?>" <?= $disabled ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Lama Pengabdian</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="lama" value="<?= $data->usulan_lama_pengabdian ?>" class="form-control" placeholder="Masukkan Lama Penelitian Pengabdian" <?= $disabled ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Usulan Anggaran Dana</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" value="<?= $data->usulan_biaya ?>" class="form-control" name="batasanusulan" id="batasan" maxlength="10" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Usulan Total Biaya</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" value="<?= $data->usulan_total_biaya ?>" class="form-control" name="total" id="totbiaya" onkeyup="CekBiaya()" maxlength="10" placeholder="Total Biaya Pengabdian" <?= $disabled ?>>
                                                                        <span id="lebihan" style="color: red; font-style: italic;"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Target Luaran</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea name="luaran" id="" rows="3" class="form-control" style="resize: none;" <?= $disabled ?>> <?= $data->target_luaran ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Kota Usulan Pengabdian</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="kota" class="form-control" value="<?= $data->usulan_kota ?>" <?= $disabled ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Jumlah Mahasiswa</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="number" name="jmlmhs" value="<?= $data->jmlh_mahasiswa ?>" class="form-control" <?= $disabled ?>>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-- <input type="button" name="next" class="next action-button" value="Next Step" /> -->
                                                            <button type="button" style="float: right;" id="next1" class="next action-button btn btn-success">Selanjutnya</button>
                                                            <a href="<?php echo site_url('dosen/pengabdian/usulan') ?>" class="btn btn-warning action-button" style="float: right; text-align: center; background: warning;">Kembali</a>
                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="form">
                                                                <h4 class="title" style="text-align: center">Lembaga Usulan</h4>
                                                                <div class=" row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Nama Lembaga</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" value="<?= $data->lembaga_nama ?>" name="lembaga" class="form-control" placeholder="Masukkan Lembaga Usulan Pengabdian" <?= $disabled ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Jenis Lembaga</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" value="<?= $data->lembaga_jabatan ?>" name="jns_lembaga" class="form-control" placeholder="Masukkan Jenis Lembaga" <?= $disabled ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Nama Pimpinan Lembaga</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" value="<?= $data->lembaga_pimpinan ?>" name="pimpinan" class="form-control" placeholder="Masukkan Pimpinan Lembaga" <?= $disabled ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">NIP / NIS Pimpinan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" value="<?= $data->lembaga_pimpinan_id ?>" name="nopim" class="form-control" placeholder="Masukkan NIP / NIS Pimpinan" <?= $disabled ?>>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Titik Lokasi</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea name="titiklokasi" rows="5" class="form-control" <?= $disabled ?>><?= $data->lembaga_lokasi ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <input type="button" style="float: right;" name="next" class="next action-button btn btn-success" style="text-align: center" value="Selanjutnya" />
                                                            <input type="button" style="float: right;" name="previous" class="previous action-button-previous" style="text-align: center" value="Sebelumnya" />

                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="form">
                                                                <h4 class="title" style="text-align: center">File Pendukung</h4>
                                                                <?php
                                                                if ($data->status_usulan != 'Menunggu') {
                                                                ?>
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
                                                                                <td><?php echo $data->status_tahap ?></td>
                                                                                <td><a href="<?php echo base_url('/upload_file/pengabdian/file/' . $data->file_usulan);  ?>" target="_blank" title="Download <?php echo $data->nidn_pengusul ?>"><i class="icon-download-alt"></i> <?php echo substr($data->file_usulan, 0, 30) . '...'; ?></a></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </table>

                                                            <?php
                                                                } else {
                                                            ?>
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4" for="basic-icon-default-fullname">File Proposal (.pdf)</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="file" class="form-control" name="fileproposal" accept=".pdf">
                                                                                <span class="mt-2">* <em>Maksimal ukuran file 2 MB</em> </span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4" for="basic-icon-default-fullname">Preview File Proposal</label>
                                                                            <?php
                                                                            $files = './upload_file/pengabdian/file/' . $data->file_usulan;
                                                                            // echo $data->file_usulan;
                                                                            if (file_exists($files)) {
                                                                                $file = base_url() . 'upload_file/pengabdian/file/' . $data->file_usulan;
                                                                            } else {
                                                                                $file = base_url() . 'upload_file/pengabdian/file/default.pdf';
                                                                            }
                                                                            ?>
                                                                            <iframe class="mt-4" src="<?php echo $file ?>" frameborder="0" width="420px" height="680px"></iframe>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4" for="basic-icon-default-fullname">File Persetujuan Mitra (.pdf)</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="file" class="form-control" name="filemitra" accept=".pdf">
                                                                                <span class="mt-2">* <em>Maksimal ukuran file 1 MB</em> </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4" for="basic-icon-default-fullname">Preview File Mitra</label>
                                                                            <?php
                                                                            if ($data->lembaga_file != '') {
                                                                            ?>
                                                                                <iframe class="mt-4" src="<?php echo base_url() . 'upload_file/pengabdian/lembaga/' . $data->lembaga_file; ?>" frameborder="0" width="420px" height="680px"></iframe>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <iframe class="mt-4" src="<?php echo base_url() . 'upload_file/pengabdian/lembaga/default.pdf'; ?>" frameborder="0" width="420px" height="680px"></iframe>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            <?php
                                                                }
                                                            ?>

                                                            </div>
                                                            <button type="submit" style="float: right;" class="next action-button btn btn-primary">Update</button>
                                                            <input type="button" style="float: right;" name="previous" class="previous action-button-previous" value="Sebelumnya" />
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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

    <script language="JavaScript" type="text/JavaScript">
        function formatNumber (num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
        }

        function TampilBudget() {
            console.log("AAA");
            var x           = document.getElementById("lstSkim");
            var budget      = x.options[(x.selectedIndex)].getAttribute('data-budget');
            var batasan     = formatNumber(budget);
            document.getElementById("budget").value = budget;
            document.getElementById("batasan").value = batasan;
        }

        function CekBiaya() {
            var total           = document.getElementById("totbiaya").value;
            var batasan         = document.getElementById("batasan").value;

            var limit           = batasan.replace(/,/g, ""); 

            if (parseInt(total) > parseInt(limit)) {
                document.getElementById("lebihan").innerHTML = "Maaf, Total Budget melebihi batasan";
                document.getElementById("next1").style.display = "none";
            }else{
                document.getElementById("lebihan").innerHTML = "";
                document.getElementById("next1").style.display = "block";
            }
        }
    </script>

    <script>
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function() {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function() {
                return false;
            })

        });
    </script>

</body>

</html>