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

                                    if ($this->session->flashdata('gglUbah')) echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                        Gagal melakukan perubahan data
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    ?>
                                    <div class="col-xxl">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0">Tambah Proposal</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?php echo base_url('dosen/penelitian/pengajuan/update'); ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $this->variasi->encode($detail->propose_id) ?>">
                                                <input type="hidden" name="nidn" value="<?= $this->variasi->encode($detail->user_username) ?>">
                                                <input type="hidden" name="file_sebelum" value="<?= $this->variasi->encode($detail->propose_proposal) ?>">
                                                <input type="hidden" name="budget" value="<?= $detail->propose_budget ?>" id="budget">

                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Tanggal Pengajuan</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="judul" class="form-control" value="<?= date("d-m-Y", strtotime($detail->propose_date)) ?>" placeholder="Masukkan Judul Usulan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Periode</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="date1" class="form-control" id="" value="<?= date("d/m/Y", strtotime($detail->propose_date1)) ?>" placeholder="Dari tanggal" onfocus="(this.type='date')">
                                                    </div>

                                                    <div class="col-sm-5">
                                                        <input type="text" name="date2" class="form-control" id="" value="<?= date("d/m/Y", strtotime($detail->propose_date2)) ?>" placeholder="Sampai tanggal" onfocus="(this.type='date')">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Judul</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="judul" class="form-control" value="<?= $detail->propose_title ?>" placeholder="Masukkan Judul Usulan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Bidang Penelitian (Pusat Studi)</label>
                                                    <div class="col-sm-10">
                                                        <select name="pusat" id="" class="form-control">
                                                            <option selected>- Pilih -</option>
                                                            <?php
                                                            foreach ($pusat as $value) {
                                                                if ($detail->pusat_studi_id == $value->pusat_studi_id) {
                                                                    echo '<option value=' . $value->pusat_studi_id . ' selected >' . $value->pusat_studi_nama . '</option>';
                                                                } else {
                                                                    echo '<option value=' . $value->pusat_studi_id . '>' . $value->pusat_studi_nama . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Kategori Penelitian (Skim)</label>
                                                    <div class="col-sm-10">
                                                        <select name="skim" id="lstSkim" class="form-control" onchange="TampilBudget()">
                                                            <option selected>- Pilih -</option>
                                                            <?php
                                                            foreach ($skim as $value) {
                                                                if ($detail->skim_id == $value->skim_id) {
                                                            ?>
                                                                    <option value=" <?= $value->skim_id ?>" data-budget="<?= $value->skim_budget; ?>" selected> <?= $value->skim_name ?> </option>;
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <option value=" <?= $value->skim_id ?>" data-budget="<?= $value->skim_budget; ?>"> <?= $value->skim_name ?> </option>;
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
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Tempat Penelitian</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="tempat" value="<?= $detail->propose_place ?>" class="form-control" placeholder="Masukkan Tempat Penelitian">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Metode Penelitian</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="metode" id="" rows="3" class="form-control" style="resize: none;" placeholder="Masukkan Metode Penelitian"><?= $detail->propose_method ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Masalah Penelitian</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="masalah" id="" rows="3" class="form-control" style="resize: none;" placeholder="Masukkan Masalah Penelitian"><?= $detail->propose_masalah ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Tujuan Penelitian</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="tujuan" id="" rows="3" class="form-control" style="resize: none;" placeholder="Masukkan Tujuan Penelitian"><?= $detail->propose_purpose ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Luaran yang dihasilkan</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="luaran" id="" rows="5" class="form-control" style="resize: none;" placeholder="Masukkan Luaran yang dihasilkan"><?= $detail->propose_luaran ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Batasan Anggaran Dana</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" value="<?= number_format($detail->propose_budget, 0, '', ',') ?>" class="form-control" id="batasan" maxlength="10" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Anggaran Dana Usulan</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="dana" value="<?= $detail->propose_fund ?>" class="form-control" placeholder="Masukkan Anggaran yang diusulkan">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Ganti File Proposal (.pdf)</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" name="file" accept=".pdf">
                                                        <span class="mt-2">* <em>Maksimal ukuran file 2 MB</em> </span>
                                                    </div>
                                                </div>

                                                <div class=" row justify-content-end">
                                                    <div class="col-sm-10 mt-4">
                                                        <a href="<?= site_url('dosen/penelitian/pengajuan') ?> " class="btn btn-warning">Kembali</a>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
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
    </script>

</body>

</html>