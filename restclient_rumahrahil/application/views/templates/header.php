<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-90680653-2');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title><?php echo $title; ?></title>

    <!-- vendor css -->
    <link href="<?= base_url('assets/'); ?>lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <!-- azia CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/azia.css">

</head>

<body>

    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="<?= base_url('dashboard'); ?>" class="az-logo"><span></span> Rumah Rahil Education</a>
                <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            </div><!-- az-header-left -->
            <div class="az-header-menu">
                <div class="az-header-menu-header">
                    <a href="<?= base_url('dashboard'); ?>" class="az-logo"><span></span> Rumah Rahil</a>
                    <a href="" class="close">&times;</a>
                </div><!-- az-header-menu-header -->
                <ul class="nav">
                    <li class="nav-item active show">
                        <a href="<?= base_url('dashboard'); ?>" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="chart-chartjs.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i> Nilai</a>
                    </li>
                    <li class="nav-item">
                        <a href="form-elements.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i> Profile</a>
                    </li>
                </ul>
            </div><!-- az-header-menu -->
            <div class="az-header-right">


                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user"><img src="<?= base_url('assets'); ?>/img/boy.png" alt=""></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                                <img src="<?= base_url('assets'); ?>/img/boy.png" alt="">
                            </div><!-- az-img-user -->
                            <h6><?= $user['nama']; ?></h6>
                            <span>Premium Member</span>
                        </div><!-- az-header-profile -->

                        <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                        <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                        <a href="<?= base_url('logout') ?>" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
                    </div><!-- dropdown-menu -->
                </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->