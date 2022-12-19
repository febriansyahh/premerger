 <?php
    $nidn = $this->session->userdata('nidn');
    $nis = $this->session->userdata('nis');
    $check_reviewer    = $this->Header_model->reviewer($nidn);
    $check_pusat_studi = $this->Header_model->pusat_studi($nis);
    $check_reviewer_pengabdian = $this->Header_model->reviewerpengabdian($nidn);

    ?>
 <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
     <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
         <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
             <i class="bx bx-menu bx-sm"></i>
         </a>
     </div>

     <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
         <!-- Search -->
         <div class="navbar-nav align-items-center">
             <div class="nav-item d-flex align-items-center">
                 <span class="title"><b>Pengabdian dan Penelitian Dosen</b></span>
             </div>
         </div>
         <!-- /Search -->

         <ul class="navbar-nav flex-row align-items-center ms-auto">
             <?php
                if ($this->session->userdata('level') == 'dosen') {
                ?>
                 <div class="btn-group dropddown">
                     <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Ganti Peran
                     </button>
                     <ul class="dropdown-menu">
                         <?php
                            if ($check_reviewer_pengabdian == '1') {
                            ?>
                             <li><a class="dropdown-item" href="<?php echo site_url('reviewer/home'); ?>">Reviewer Pengabdian</a></li>
                         <?php
                            }

                            if ($check_reviewer == '1') {
                                echo '<li><a class="dropdown-item" href="javascript:void(0);">Reviewer Penelitian</a></li>
                            ';
                            }

                            if ($check_pusat_studi == '1') {
                                echo '<li><a class="dropdown-item" href="javascript:void(0);">Pusat Studi</a></li>
                                    <li>
                                    <hr class="dropdown-divider" />
                                    </li>';
                            }

                            if ($check_reviewer == '0' & $check_pusat_studi == '0' && $check_reviewer_pengabdian == '0') {
                                echo '
                            <li><a class="dropdown-item" href="javascript:void(0);">Tidak ada peran lain</a></li>
                            ';
                            }
                            ?>
                     </ul>
                 </div>
             <?php
                }
                ?>
             <!-- User -->
             &nbsp;&nbsp;
             <li class="nav-item navbar-dropdown dropdown-user dropdown">
                 <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                     <div class="avatar avatar-online">
                         <img src="<?php echo base_url('assets/img/avatars/user.png') ?>" alt class="w-px-40 h-auto rounded-circle" />
                     </div>
                 </a>
                 <?php
                    if ($this->session->userdata('level') == 'Admin') {
                        $sistem = $this->session->userdata('sistem') == '1' ? 'Pengabdian' : ($this->session->userdata('sistem') == '2' ? 'Penelitian' : 'Super');
                    ?>
                     <ul class="dropdown-menu dropdown-menu-end">
                         <li>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex">
                                     <div class="flex-shrink-0 me-3">
                                         <div class="avatar avatar-online">
                                             <img src="<?php echo base_url('assets/img/avatars/user.png') ?>" alt class="w-px-40 h-auto rounded-circle" />
                                         </div>
                                     </div>
                                     <div class="flex-grow-1">
                                         <span class="fw-semibold d-block"><?= $this->session->userdata('nama') ?></span>
                                         <small class="text-muted" style="text-transform: capitalize;"><?= $this->session->userdata('level') . ' - ' . $sistem ?></small>
                                     </div>
                                 </div>
                             </a>
                         </li>
                         <li>
                             <div class="dropdown-divider"></div>
                         </li>
                         <li>
                             <a class="dropdown-item" href="<?php echo base_url('Login/Logout') ?>">
                                 <i class="bx bx-power-off me-2"></i>
                                 <span class="align-middle">Log Out</span>
                             </a>
                         </li>
                     </ul>
                 <?php
                    } else {
                    ?>
                     <ul class="dropdown-menu dropdown-menu-end">
                         <li>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex">
                                     <div class="flex-shrink-0 me-3">
                                         <div class="avatar avatar-online">
                                             <img src="<?php echo base_url('assets/img/avatars/user.png') ?>" alt class="w-px-40 h-auto rounded-circle" />
                                         </div>
                                     </div>
                                     <div class="flex-grow-1">
                                         <span class="fw-semibold d-block"><?= $this->session->userdata('nama_gelar') ?></span>
                                         <small class="text-muted" style="text-transform: capitalize;"><?= $this->session->userdata('level') ?></small>
                                     </div>
                                 </div>
                             </a>
                         </li>
                         <li>
                             <div class="dropdown-divider"></div>
                         </li>
                         <li>
                             <a class="dropdown-item" href="<?php echo base_url('Login/Logout') ?>">
                                 <i class="bx bx-power-off me-2"></i>
                                 <span class="align-middle">Log Out</span>
                             </a>
                         </li>
                     </ul>
                 <?php
                    }
                    ?>
             </li>
         </ul>
     </div>
 </nav>