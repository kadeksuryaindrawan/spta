<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SPTA - Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('bootstrap/images/favicon.png') ?>">
    <!-- Pignose Calender -->
    <link href="<?= base_url('bootstrap/plugins/pg-calendar/css/pignose.calendar.min.css') ?>" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="<?= base_url('bootstrap/plugins/chartist/css/chartist.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('bootstrap/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') ?>">
    <!-- Custom Stylesheet -->
    <link href="<?= base_url('bootstrap/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('bootstrap/css/style.css') ?>" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="<?= base_url('Dashboard/admin') ?>">
                    <b class="logo-abbr"><h3 class="text-white">S</h3> </b>
                    <span class="brand-title text-center">
                        <h3 class="text-white">SPTA</h3>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <!-- <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div> -->
                <div class="header-right">
                    <ul class="clearfix">
                        
                        <li class="icons dropdown d-none d-md-flex">
                            <?= $this->session->userdata('name') ?>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative pt-3"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="<?= base_url('bootstrap/images/user/1.png') ?>" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li><a href="<?= base_url('Login/logout') ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="<?= base_url('Dashboard/admin') ?>">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        
                    </li>

                    <li>
                        <a href="<?= base_url('ProdiController') ?>">
                            <i class="icon-book-open menu-icon"></i><span class="nav-text">Prodi</span>
                        </a>
                        
                    </li>

                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-user menu-icon"></i><span class="nav-text">Dosen</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('DosenController') ?>">Data Dosen</a></li>
                        </ul>
                    </li>

                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-user menu-icon"></i><span class="nav-text">Mahasiswa</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('MahasiswaController') ?>">Data Mahasiswa</a></li>
                            <li><a href="<?= base_url('MahasiswaController/pembimbingProposal') ?>">Pembimbing Proposal</a></li>
                            <li><a href="<?= base_url('MahasiswaController/pembimbingTA') ?>">Pembimbing TA</a></li>
                        </ul>
                    </li>

                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Proposal</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('ProposalController') ?>">Data Proposal</a></li>
                            <li><a href="<?= base_url('ProposalController/bimbingan') ?>">Bimbingan</a></li>
                        </ul>
                    </li>

                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Tugas Akhir</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('TAController') ?>">Data TA</a></li>
                            <li><a href="<?= base_url('TAController/bimbingan') ?>">Bimbingan</a></li>
                        </ul>
                    </li>

                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Ujian</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('UjianController') ?>">Ujian Proposal</a></li>
                            <li><a href="<?= base_url('UjianController/ta') ?>">Ujian TA</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->