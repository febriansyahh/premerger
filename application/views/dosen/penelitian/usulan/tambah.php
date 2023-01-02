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
                                            <div class="row">
                                                <div class="col-md-12 mx-0">
                                                    <form id="msform" method="post" action="" enctype="multipart/form-data">
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
                                                                <input type="hidden" name="budget" id="budget">
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Judul</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Usulan Pengabdian">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Kategori Pengabdian (Skim)</label>
                                                                    <div class="col-sm-10">
                                                                        <select name="skim" id="lstSkim" class="form-control" onchange="TampilBudget()">
                                                                            <option selected>- Pilih -</option>
                                                                            <?php
                                                                            foreach ($skema as $value) {
                                                                            ?>
                                                                                <option value=" <?= $value->skema_id ?>" data-budget="<?= $value->skema_biaya_max; ?>"> <?= $value->skema_nama ?> </option>;
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Tempat Pengabdian</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="tempat" class="form-control" placeholder="Masukkan Tempat Penelitian Pengabdian">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Metode Pengabdian</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea name="metode" id="" rows="3" class="form-control" style="resize: none;" placeholder="Masukkan Metode Penelitian Pengabdian"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Masalah Pengabdian</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea name="masalah" id="" rows="3" class="form-control" style="resize: none;" placeholder="Masukkan Masalah Penelitian"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Tujuan Pengabdian</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea name="tujuan" id="" rows="3" class="form-control" style="resize: none;" placeholder="Masukkan Tujuan Penelitian"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Luaran yang dihasilkan</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea name="luaran" id="" rows="2" class="form-control" style="resize: none;" placeholder="Masukkan Luaran yang dihasilkan"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Batasan Anggaran Dana</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="batasan" maxlength="10" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Anggaran Dana Usulan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="dana" class="form-control" placeholder="Masukkan Anggaran yang diusulkan">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <input type="button" name="next" class="next action-button" value="Next Step" /> -->
                                                            <button type="button" style="float: right;" class="next action-button btn btn-success">Selanjutnya</button>
                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="form">
                                                                <h4 class="title" style="text-align: center">Lembaga Usulan</h4>
                                                                <div class=" row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Nama Lembaga</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="lembaga" class="form-control" placeholder="Masukkan Lembaga Usulan Pengabdian">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Jenis Lembaga</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="jns_lembaga" class="form-control" placeholder="Masukkan Jenis Lembaga">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Nama Pimpinan Lembaga</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="pimpinan" class="form-control" placeholder="Masukkan Pimpinan Lembaga">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">NIP / NIS Pimpinan</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="pimpinan" class="form-control" placeholder="Masukkan NIP / NIS Pimpinan">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">Titik Lokasi</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea name="titiklokasi" rows="5" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <input type="button" style="float: right;" name="next" class="next action-button btn btn-success" style="text-align: center" value="Selanjutnya" />
                                                            <input type="button" style="float: right;" name="previous" class="previous action-button-previous" style="text-align: center" value="Sebelumnya" />

                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="form">
                                                                <h4 class="title">File Pendukung</h4>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">File Proposal (.pdf)</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" class="form-control" name="file" accept=".pdf">
                                                                        <span class="mt-2">* <em>Maksimal ukuran file 2 MB</em> </span>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2" for="basic-icon-default-fullname">File Persetujuan Mitra (.pdf)</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" class="form-control" name="filemitra" accept=".pdf">
                                                                        <span class="mt-2">* <em>Maksimal ukuran file 1 MB</em> </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" style="float: right;" class="next action-button btn btn-primary">Simpan</button>
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