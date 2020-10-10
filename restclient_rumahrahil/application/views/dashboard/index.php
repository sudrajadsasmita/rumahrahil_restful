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

    <title><?= $title; ?></title>

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
                        <a href="<?= base_url('login/logout') ?>" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
                    </div><!-- dropdown-menu -->
                </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->

    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Hai, Selamat Datang!</h2>
                        <p class="az-dashboard-text">Selamat melaksanakan tes online.</p>
                    </div>
                </div><!-- az-dashboard-one-title -->
                <div class="row row-sm mg-b-20">
                    <div class="col-lg-7 ht-lg-90p">
                        <div class="card card-dashboard-one ">
                            <div id="card" class="card mb-3" style="max-width: 930px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4" style="height: 365px;">
                                        <img src="<?= base_url('assets'); ?>/img/boy.png" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $user['nama']; ?></h5>
                                            <p class="card-text"><?= $user['asal_sekolah']; ?></p>
                                            <p class="card-text"><small class="text-muted"><?= $user['email']; ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- card -->
                    </div><!-- col -->
                    <div class="col-lg-5 mg-t-20 mg-lg-t-0">
                        <div class="row row-sm">
                            <div class="col-sm-6">
                                <div class="card card-dashboard-two">
                                    <div class="card-header">
                                        <h6>NISN</h6>
                                        <p>Diambil dari API</p>
                                    </div><!-- card-header -->
                                    <div class="card-body">
                                        <div class="chart-wrapper">
                                            <div id="flotChart2" class="flot-chart"></div>
                                        </div><!-- chart-wrapper -->
                                    </div>
                                </div><!-- card -->
                            </div><!-- col -->
                            <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                                <div class="card card-dashboard-two">
                                    <div class="card-header">
                                        <h6>KELAS</h6>
                                        <p><?= $user['kelas_id']; ?></p>
                                    </div><!-- card-header -->
                                    <div class="card-body">
                                        <div class="chart-wrapper">
                                            <div id="flotChart2" class="flot-chart"></div>
                                        </div><!-- chart-wrapper -->
                                    </div><!-- card-body -->
                                </div><!-- card -->
                            </div><!-- col -->
                            <div class="col-sm-6 mt-5">
                                <div class="card card-dashboard-two">
                                    <div class="card-header">
                                        <h6>TANGGAL</h6>
                                        <p>Diambil dari API</p>
                                    </div><!-- card-header -->
                                    <div class="card-body">
                                        <div class="chart-wrapper">
                                            <div id="flotChart2" class="flot-chart"></div>
                                        </div><!-- chart-wrapper -->
                                    </div>
                                </div><!-- card -->
                            </div><!-- col -->
                            <div class="col-sm-6 mg-t-20 mg-sm-t-0 mt-5">
                                <div class="card card-dashboard-two">
                                    <div class="card-header">
                                        <h6>WAKTU</h6>
                                        <p>Diambil dari API</p>
                                    </div><!-- card-header -->
                                    <div class="card-body">
                                        <div class="chart-wrapper">
                                            <div id="flotChart2" class="flot-chart"></div>
                                        </div><!-- chart-wrapper -->
                                    </div><!-- card-body -->
                                </div><!-- card -->
                            </div><!-- col -->
                        </div><!-- row -->
                    </div>
                    <!--col -->
                </div><!-- row -->
            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->

    <div id="footer" class="az-footer ht-40 na">
        <div class="container ht-100p pd-t-0-f">
            <span>&copy; 2019 Azia Responsive Bootstrap 4 Dashboard Template</span>
        </div><!-- container -->
    </div><!-- az-footer -->

    <style>
        #footer {
            position: fixed;
            height: 100px;
            bottom: 0;
            width: 100%;
        }
    </style>
    <script src="<?= base_url('assets/'); ?>lib/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/ionicons/ionicons.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/jquery.flot/jquery.flot.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/chart.js/Chart.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/peity/jquery.peity.min.js"></script>

    <script src="<?= base_url('assets/'); ?>js/azia.js"></script>
    <script src="<?= base_url('assets/'); ?>js/chart.flot.sampledata.js"></script>
    <script src="<?= base_url('assets/'); ?>js/dashboard.sampledata.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script>
        $(function() {
            'use strict'

            var plot = $.plot('#flotChart', [{
                data: flotSampleData3,
                color: '#007bff',
                lines: {
                    fillColor: {
                        colors: [{
                            opacity: 0
                        }, {
                            opacity: 0.2
                        }]
                    }
                }
            }, {
                data: flotSampleData4,
                color: '#560bd0',
                lines: {
                    fillColor: {
                        colors: [{
                            opacity: 0
                        }, {
                            opacity: 0.2
                        }]
                    }
                }
            }], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 8
                },
                yaxis: {
                    show: true,
                    min: 0,
                    max: 100,
                    ticks: [
                        [0, ''],
                        [20, '20K'],
                        [40, '40K'],
                        [60, '60K'],
                        [80, '80K']
                    ],
                    tickColor: '#eee'
                },
                xaxis: {
                    show: true,
                    color: '#fff',
                    ticks: [
                        [25, 'OCT 21'],
                        [75, 'OCT 22'],
                        [100, 'OCT 23'],
                        [125, 'OCT 24']
                    ],
                }
            });

            $.plot('#flotChart1', [{
                data: dashData2,
                color: '#00cccc'
            }], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.2
                            }]
                        }
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 0
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 35
                },
                xaxis: {
                    show: false,
                    max: 50
                }
            });

            $.plot('#flotChart2', [{
                data: dashData2,
                color: '#007bff'
            }], {
                series: {
                    shadowSize: 0,
                    bars: {
                        show: true,
                        lineWidth: 0,
                        fill: 1,
                        barWidth: .5
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 0
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 35
                },
                xaxis: {
                    show: false,
                    max: 20
                }
            });


            //-------------------------------------------------------------//


            // Line chart
            $('.peity-line').peity('line');

            // Bar charts
            $('.peity-bar').peity('bar');

            // Bar charts
            $('.peity-donut').peity('donut');

            var ctx5 = document.getElementById('chartBar5').getContext('2d');
            new Chart(ctx5, {
                type: 'bar',
                data: {
                    labels: [0, 1, 2, 3, 4, 5, 6, 7],
                    datasets: [{
                        data: [2, 4, 10, 20, 45, 40, 35, 18],
                        backgroundColor: '#560bd0'
                    }, {
                        data: [3, 6, 15, 35, 50, 45, 35, 25],
                        backgroundColor: '#cad0e8'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        enabled: false
                    },
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [{
                            display: false,
                            ticks: {
                                beginAtZero: true,
                                fontSize: 11,
                                max: 80
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.6,
                            gridLines: {
                                color: 'rgba(0,0,0,0.08)'
                            },
                            ticks: {
                                beginAtZero: true,
                                fontSize: 11,
                                display: false
                            }
                        }]
                    }
                }
            });

            // Donut Chart
            var datapie = {
                labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
                datasets: [{
                    data: [25, 20, 30, 15, 10],
                    backgroundColor: ['#6f42c1', '#007bff', '#17a2b8', '#00cccc', '#adb2bd']
                }]
            };

            var optionpie = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false,
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            };

            // For a doughnut chart
            var ctxpie = document.getElementById('chartDonut');
            var myPieChart6 = new Chart(ctxpie, {
                type: 'doughnut',
                data: datapie,
                options: optionpie
            });

        });
    </script>
</body>

</html>