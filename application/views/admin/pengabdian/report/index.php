<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url('assets/') ?>" data-template="vertical-menu-template-free">

<?php $this->load->view("_partials/head.php") ?>

<body>
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
                                    <div class="body">
                                        <h5 class="card-title text-primary">Report Usulan</h5>
                                        <form role="form" method="post" action="<?php echo site_url('admin/pengabdian/report/cari'); ?>">
                                            <div class="row clearfix">
                                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                                                    <label>Tanggal Awal</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="date" class="datepicker form-control" placeholder="Pilih Tanggal" name="tanggal1" value="<?php echo set_value('tanggal1'); ?>" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                                                    <label>Tanggal Selesai</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="date" class="datepicker form-control" placeholder="Pilih Tanggal" name="tanggal2" autocomplete="off" value="<?php echo set_value('tanggal2'); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                                                    <label>Status</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <select name="status" class="form-control" id="">
                                                                <option value="" selected>pilih</option>
                                                                <option value="Menunggu">Menunggu</option>
                                                                <option value="Ditolak">Ditolak</option>
                                                                <option value="Diterima">Diterima</option>
                                                                <option value="Selesai">Selesai</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                                                    <label></label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <button type="submit" class="btn btn-primary waves-effect"><i class='bx bx-search'></i> Cari</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <?php
                                // var_dump($show);
                                if ($show == true) { ?>
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Report Usulan</h5>
                                        <form action="<?php echo site_url('admin/pengabdian/report/export'); ?>" method="post" enctype="multipart/form" class="mb-3" target="_blank">
                                            <input type="hidden" name='ta' value="<?= $report['tanggal1'] ?>">
                                            <input type="hidden" name='tk' value="<?= $report['tanggal2'] ?>">
                                            <input type="hidden" name='status' value="<?= $report['status'] ?>">
                                            <button type="submit" name="export" class="btn btn-success">Export Excel</button>
                                        </form>
                                        </a>
                                        <!-- <a target="_blank" href="export_excel.php">EXPORT KE EXCEL</a> -->
                                        <table id="tablereport" class="table table-bordered table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pengusul</th>
                                                    <th>Judul</th>
                                                    <th>Tahun Usulan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($listLaporan as $data) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $data->nidn_pengusul . ' - ' . $data->nama ?></td>
                                                        <td><?= $data->usulan_judul ?></td>
                                                        <td><?= $data->usulan_tahun ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                        </table>
                                    </div>
                                <?php } ?>

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

    <?php $this->load->view("_partials/js.php") ?>

</body>

</html>