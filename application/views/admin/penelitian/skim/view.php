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
                            <a data-bs-toggle="modal" data-bs-target="#baseSkim" class="btn btn-primary" type="button" style="color: white;">Tambah Skim Penelitian</a>
                        </div>
                    </div>

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

                                    if ($this->session->flashdata('terhapus')) echo '<div class="alert alert-success alert-dismissible" role="alert">
                                    Hapus data berhasil
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                    ?>
                                    <h5 class="card-title text-primary">Skim Penelitian</h5>

                                    <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Skim Penelitian</th>
                                                <th>Budget</th>
                                                <th>Eksternal</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($skim as $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value->skim_name ?></td>
                                                    <td><?= $value->skim_budget ?></td>
                                                    <td><?= $value->skim_external ?></td>
                                                    <td><?php
                                                    if ($value->skim_active == 'Active'){
                                                            echo '<span class="badge bg-success">Active</span>';
                                                    }else{
                                                        echo '<span class="badge bg-danger">Non Active</span>';
                                                    } ?></td>
                                                    <td>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editSkim" onclick="editableSkim(this)" data-id="<?php echo $this->variasi->encode($value->skim_id) . "~" . $value->skim_name . "~" . $value->skim_budget . "~" . $value->skim_active . "~" . $value->skim_external . "~" . $value->skim_anggota_min . "~" . $value->skim_anggota_max . "~" . $value->skim_anggotamhs_min . "~" . $value->skim_anggotaeks_min ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                                                        <a href="<?php echo site_url('admin/penelitian/skim/deleteskim/' . $this->variasi->encode($value->skim_id)) ?>" onclick="return confirm('Apakah yakin untuk menghapus data ini ?');" class="btn btn-outline-danger btn-sm">Hapus</a>
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

<div class="modal fade" id="baseSkim" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Skim Penelitian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo site_url('admin/penelitian/skim/saveskim') ?>" method="post" enctype="multipart/form">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default-name">Skim Penelitian</label>
                        <div class="col-sm-8">
                            <input type="text" name="skim" class="form-control" id="basic-default-name" placeholder="Masukkan nama kategori penelitian" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default-company">Anggota</label>
                        <div class="col-sm-4">
                            <input type="text" name="min_anggota" class="form-control" id="basic-default-company" placeholder="Minimal" />
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="max_anggota" class="form-control" id="basic-default-company" placeholder="Maxsimal" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default">Anggota Mahasiswa</label>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default" name="anggota_mhs" class="form-control" placeholder="Minimal" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default">Anggota Eksternal</label>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default" name="anggota_eks" class="form-control" placeholder="Minimal" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default">Budget</label>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default" name="budget" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default">Status </label>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <select name="status" class="form-control" id="basic-default">
                                    <option selected>- Pilih -</option>
                                    <option value="Active">Active</option>
                                    <option value="Non Active">Non Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default">Review Eksternal ? </label>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <select name="eksternal" class="form-control" id="basic-default">
                                    <option selected>- Pilih -</option>
                                    <option value="1">Ya</option>
                                    <option value="">Tidak</option>
                                </select>
                            </div>
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

<div class="modal fade" id="editSkim" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Skim Penelitian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo site_url('admin/penelitian/skim/updateskim') ?>" method="post" enctype="multipart/form">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default-name">Skim Penelitian</label>
                        <input type="hidden" name="id_skim" class="form-control" id="editId" placeholder="Masukkan nama kategori penelitian" />
                        <div class="col-sm-8">
                            <input type="text" name="skim" class="form-control" id="editNama" placeholder="Masukkan nama kategori penelitian" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default-company">Anggota</label>
                        <div class="col-sm-4">
                            <input type="text" name="min_anggota" class="form-control" id="editAnggotamin" placeholder="Minimal" />
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="max_anggota" class="form-control" id="editAnggotamax" placeholder="Maxsimal" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default">Anggota Mahasiswa</label>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <input type="text" id="editAnggotamhsmin" name="anggota_mhs" class="form-control" placeholder="Minimal" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default">Anggota Eksternal</label>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <input type="text" id="editAnggotaeksmin" name="anggota_eks" class="form-control" placeholder="Minimal" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default">Budget</label>
                        <div class="col-sm-8">
                            <div class="input-group input-group-merge">
                                <input type="text" id="editBudget" name="budget" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default">Status </label>
                        <div class="col-sm-8">
                            <div id="status"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="basic-default">Review Eksternal ? </label>
                        <div class="col-sm-8">
                            <div id="eksternal"></div>
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