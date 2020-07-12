<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="kmg">
    <meta name="keywords" content="kmg">
    <meta name="author" content="kmg">
    <title><?php echo $page_title; ?></title>

    <!-- Ganti icon web -->
    <link rel="icon" href="<?php echo base_url();?>assets/images/logo-bri.png" type="image/ico">
    <link href="<?php echo base_url();?>assets/css/googleapis.css" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
    <!-- END: Custom CSS-->



</head>
<!-- END: Head-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns navbar-floating footer-static" 
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <?php 
        $userdata = $this->session->userdata('user_data'); 
        $id_role  = $userdata['id_role'];
        $nama     = ucfirst($userdata['nama_lengkap']);
    ?>

    <!-- BEGIN: Header-->
    <!--<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav bg-primary navbar-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <?php if(!$userdata){ ?>
                            <li class="dropdown dropdown-user nav-item">
                                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <span>
                                        <img class="round" src="<?php echo base_url();?>assets/images/portrait/small/guest.png" alt="avatar" height="40" width="40">
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo base_url()?>auth/login"><i class="feather icon-log-in"></i> Login</a>
                                </div>
                            </li>
                        <?php } else { ?>
                            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none">
                                        <span class="user-name text-bold-600">
                                            <?php echo $nama; ?>
                                        </span>
                                        <span class="user-status">Available</span>
                                    </div>
                                    <span>
                                        <img class="round" src="<?php echo base_url();?>assets/images/portrait/small/user.jpg" alt="avatar" height="40" width="40">
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo base_url()?>auth/logout"><i class="feather icon-log-out"></i> Logout</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="<?php echo base_url('home'); ?>">
                        <div class="brand-logo"></div>
                        <h4 class="brand-text mb-0">KMG</h2>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <?php if(!$userdata){ ?>
                    <li class=" nav-item"><a href="<?php echo base_url('home'); ?>"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Home">Home</span></a>
                <?php } else { ?>
                    <li class=" nav-item"><a href="<?php echo base_url('home'); ?>"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Home">Home</span></a>
                    <li class=" nav-item"><a href="<?php echo base_url('staff_app'); ?>"><i class="feather icon-globe"></i><span class="menu-title" data-i18n="Tabel">Staff App</span></a>
                    <li class=" nav-item"><a href="<?php echo base_url('bagian'); ?>"><i class="feather icon-grid"></i><span class="menu-title" data-i18n="Tabel">Bagian</span></a>
                    <li class=" nav-item"><a href="<?php echo base_url('bidang'); ?>"><i class="feather icon-server"></i><span class="menu-title"data-i18n="Tabel">Bidang</span></a>
                    <li class=" nav-item"><a href="<?php echo base_url('self_learning'); ?>"><i class="feather icon-command"></i><span class="menu-title"data-i18n="Tabel">Self Learning</span></a>
                    <li class=" nav-item"><a href="<?php echo base_url('nilai_learning'); ?>"><i class="feather icon-award"></i><span class="menu-title"data-i18n="Tabel">Nilai Self Learning</span></a>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->