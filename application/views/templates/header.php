<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">

    <script>
        let log_off = new Date();
        log_off.setSeconds(logg_off.getSeconds() + 5)
        log_off = new Date(log_off)

        let int_logoff = setInterval(function() {
            let now = new Date();
            if (now > log_off) {
                window.location.assign("<?= base_url() ?>pengguna/logout");
                clearInterval(int_logoff);
            }
        }, 5000);

        $('body').on('click', function() {
            log_off = new Date()
            log_off.setSeconds(log_off.getSecond() + 5)
            log_off = new Date(log_off)
            console.log(log_off)
        })
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url(); ?>assets/dist/img/jatim.png" alt="AdminLTELogo" height="90" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url(); ?>/admin" class="nav-link"><b>A-Pel</b></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Cabdin Pasuruan</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="<?php echo base_url(); ?>assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="<?php echo base_url(); ?>assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="<?php echo base_url(); ?>assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url(); ?>admin" class="brand-link">
                <img src="<?php echo base_url(); ?>assets/dist/img/jatim.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Apel_CabdinPas</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $this->session->userdata('nama_user'); ?><br>
                            <small><?php echo $this->session->userdata('jabatan'); ?></small></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin" class="nav-link <?php if ($this->uri->segment('1') == 'admin') {
                                                                                            echo 'active';
                                                                                        } ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Halaman Utama
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">Managemen Apel</li>
                        <li class="nav-item <?php if ($this->uri->segment('1') == 'managemen_kode') {
                                                echo 'menu-open';
                                            } ?>
                                            <?php if ($this->uri->segment('1') == 'managemen_bidang') {
                                                echo 'menu-open';
                                            } ?>
                                            <?php if ($this->uri->segment('1') == 'managemen_user') {
                                                echo 'menu-open';
                                            } ?>
                                            <?php if ($this->uri->segment('1') == 'managemen_pegawai') {
                                                echo 'menu-open';
                                            } ?>
                                            ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Managemen Apel
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>managemen_kode" class="nav-link <?php if ($this->uri->segment('1') == 'managemen_kode') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tahun Surat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>managemen_bidang" class="nav-link <?php if ($this->uri->segment('1') == 'managemen_bidang') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kode Surat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>managemen_user" class="nav-link <?php if ($this->uri->segment('1') == 'managemen_user') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User Apel</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>managemen_pegawai" class="nav-link <?php if ($this->uri->segment('1') == 'managemen_pegawai') {
                                                                                                                echo 'active';
                                                                                                            } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Managemen Pegawai</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Tata Kelola</li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>Managemen_suratmasuk" class="nav-link <?php if ($this->uri->segment('1') == 'Managemen_suratmasuk') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-envelope"></i><span class="badge badge-danger right"><?php echo $total_asset; ?></span>
                                <p>
                                    Surat Masuk
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>managemen_disposisi" class="nav-link <?php if ($this->uri->segment('1') == 'managemen_disposisi') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-envelope"></i><span class="badge badge-primary right"><?php echo $total_disposisi; ?></span>
                                <p>
                                    Disposisi
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>managemen_suratkeluar" class="nav-link <?php if ($this->uri->segment('1') == 'managemen_suratkeluar') {
                                                                                                            echo 'active';
                                                                                                        } ?>">
                                <i class="nav-icon fas fa-envelope"></i><span class="badge badge-success right"><?php echo $total_srt_keluar; ?></span>
                                <p>
                                    Surat Keluar
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Rekap Agenda</li>
                        <li class="nav-item">
                            <a href="" class="nav-link <?php if ($this->uri->segment('1') == 'agenda_masuk') {
                                                            echo 'active';
                                                        } ?>">
                                <i class="nav-icon fas fa-chevron-circle-right"></i>
                                <p>
                                    Agenda Surat Masuk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link <?php if ($this->uri->segment('1') == 'agenda_keluar') {
                                                            echo 'active';
                                                        } ?>">
                                <i class="nav-icon fas fa-chevron-circle-right"></i>
                                <p>
                                    Agenda Surat Masuk
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>/pengguna/logout" class="nav-link">
                                <i class="nav-icon fas fa-file-export"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>