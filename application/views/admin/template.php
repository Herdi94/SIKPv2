<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Kerja Praktek Online - Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets/images/jabar.png')?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/AdminBSB/plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/AdminBSB/plugins/node-waves/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/AdminBSB/plugins/animate-css/animate.css')?>" rel="stylesheet" />

    <!-- Preloader Css -->
    <link href="<?php echo base_url('assets/AdminBSB/plugins/material-design-preloader/md-preloader.css')?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/AdminBSB/css/style.css')?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets/AdminBSB/css/themes/all-themes.css')?>" rel="stylesheet" />
</head>

<body class="theme-pink">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="md-preloader pl-size-md">
            <svg viewbox="0 0 75 75">
                <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
            </svg>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo site_url('dashboard/home'); ?>">Kerja Praktek Online - Admin</a>
        </div>

    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php echo base_url('assets/images/herdi.png')?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php
                        echo $this->session->userdata('nama'); ?></div>


                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>

                        <li role="seperator" class="divider"></li>
                        <li><a href="<?php echo site_url('dashboard/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="<?php echo site_url('dashboard/home'); ?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/pembimbing'); ?>">
                        <i class="material-icons">assignment</i>
                        <span>Data Pembimbing</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/pendaftaran'); ?>">
                        <i class="material-icons">view_list</i>
                        <span>Data Pendaftaran</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 <a href="http://diskominfo.jabarprov.go.id/">Dinas Komunikasi dan Informatika <br> Jawa Barat</a>
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->


</section>

<!--start content -->
<?php echo $contents;  ?>
<!--end content-->


<!-- Jquery Core Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/jquery/jquery.min.js')?>"></script>

<!-- Bootstrap Core Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/bootstrap/js/bootstrap.js') ?>"></script>

<!-- Select Plugin Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/bootstrap-select/js/bootstrap-select.js')?>"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/jquery-slimscroll/jquery.slimscroll.js')?>"></script>


<!-- Waves Effect Plugin Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/node-waves/waves.js') ?>"></script>


<!-- Flot Charts Plugin Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/flot-charts/jquery.flot.js')?>"></script>
<script src="<?php echo base_url('assets/AdminBSB/plugins/flot-charts/jquery.flot.resize.js')?>"></script>
<script src="<?php echo base_url('assets/AdminBSB/plugins/flot-charts/jquery.flot.pie.js')?>"></script>
<script src="<?php echo base_url('assets/AdminBSB/plugins/flot-charts/jquery.flot.categories.js')?>"></script>
<script src="<?php echo base_url('assets/AdminBSB/plugins/flot-charts/jquery.flot.time.js')?>"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/jquery-countto/jquery.countTo.js') ?>"></script>


<!-- Custom Js -->
<script src="<?php echo base_url('assets/AdminBSB/js/admin.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminBSB/js/pages/index.js') ?>"></script>

<!-- Demo Js -->
<script src="<?php echo base_url('assets/AdminBSB/js/demo.js') ?>"></script>

</body>

</html>