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
                                            <h5 class="mb-0">Tambah Data Pengguna</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?php echo site_url('admin/akun/save'); ?>" method="post" enctype="multipart/form-data">
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Pengguna Sistem</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bxs-user-account"></i></span>
                                                            <select name="sistem" id="sistemchoice" onclick="ceksistem()" class="form-control" required>
                                                                <option value="">- Pilih -</option>
                                                                <option value="0">Super Admin</option>
                                                                <option value="1">Admin Pengabdian</option>
                                                                <option value="2">Admin Penelitian</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="isusernameadm">
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Username Admin</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                                <input type="text" class="form-control" name="username" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="isusername">
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Username Kode</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                                <input list="datapegawai" name="kode" id="iduser" class="form-control" placeholder="Masukkan Kode User Pegawai" autocomplete="on" onkeyup="getuser(this.value)">
                                                                <datalist id="datapegawai">
                                                                    <div id="listpegawai"></div>
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="isnamauser">
                                                    <div class="row mb-3" id="isnamauser">
                                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Nama User</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bxs-user-pin"></i></span>
                                                                <input type="text" id="basic-icon-default-company" name="nama" class="form-control"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="ispassword">
                                                    <div class="row mb-3" id="ispassword">
                                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Password</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bxs-key"></i></span>
                                                                <input type="password" id="basic-icon-default-company" name="password" class="form-control"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="islevel">
                                                    <div class="row mb-3" id="islevel">
                                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Level Pengguna</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bxs-user-account"></i></span>
                                                                <select name="level" id="" class="form-control" required>
                                                                    <option value="">- Pilih -</option>
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="IT">IT</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-10 mt-4">
                                                        <a href="<?= site_url('admin/akun') ?> " class="btn btn-warning">Kembali</a>
                                                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
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

    <script type="text/javascript">
        document.getElementById("isusernameadm").style.display = "none";
        document.getElementById("isusername").style.display = "none";
        document.getElementById("isnamauser").style.display = "none";
        document.getElementById("ispassword").style.display = "none";
        document.getElementById("islevel").style.display = "none";

        function ceksistem() {
            var sistem = document.getElementById("sistemchoice").value;

            if (sistem !== "") {
                if (sistem == '0') {
                    document.getElementById("isusernameadm").style.display = "block";
                    document.getElementById("isusername").style.display = "none";
                    document.getElementById("isnamauser").style.display = "block";
                    document.getElementById("ispassword").style.display = "block";
                    document.getElementById("islevel").style.display = "block";
                }

                if (sistem == '1' || sistem == '2') {
                    console.log('admin');
                    document.getElementById("isusernameadm").style.display = "none";
                    document.getElementById("isusername").style.display = "block";
                    document.getElementById("isnamauser").style.display = "none";
                    document.getElementById("ispassword").style.display = "none";
                    document.getElementById("islevel").style.display = "block";
                }
                document.getElementById("submitted").style.display = "block";
            } else {
                document.getElementById("isusernameadm").style.display = "none";
                document.getElementById("isusername").style.display = "none";
                document.getElementById("isnamauser").style.display = "none";
                document.getElementById("isnamauser").style.display = "none";
                document.getElementById("ispassword").style.display = "none";
                document.getElementById("islevel").style.display = "none";
            }
        }

        function getuser(str) {
            var id = str;
            var lenght = id.trim().length;
            console.log(id);
            console.log(lenght);
            if (lenght < 3) {
                document.getElementById("listpegawai").innerHTML = "Kosong";
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/akun/getkode'); ?>",
                    data: {
                        id
                    },
                    success: function(response) {
                        console.log(response);
                        document.getElementById("listpegawai").innerHTML = response;
                    },
                });
            }
        }
    </script>

</body>

</html>