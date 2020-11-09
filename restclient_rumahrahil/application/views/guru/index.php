<div class="az-content az-content-dashboard">
    <div class="container">
        <div class="az-content-body">
            <div class="az-dashboard-one-title">
                <div>
                    <h2 class="az-dashboard-title">Hai, Selamat Datang!</h2>
                </div>
            </div><!-- az-dashboard-one-title -->
            <div class="row row-sm mg-b-20">
                <div class="col-lg-7 ht-lg-90p">
                    <div class="card card-dashboard-one p-1">
                        <div class="row no-gutters">
                            <div class="col-md-4" style="height: 365px;">
                                <img src="<?= base_url('assets'); ?>/img/girl.png" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                                    <p class="card-text"><?= $user['asal_sekolah']; ?></p>
                                    <p class="card-text"><small class="text-muted"><?= $user['email']; ?></small></p>
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
                                    <span class="d-block"><?=strftime(' %d %B %Y')?></span>
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
                                    <span class="d-block"> <span class="live-clock"><?=date('H:i:s')?></span></span>
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
            </div>
            <!-- row -->
            <hr>
        </div><!-- az-content-body -->
    </div>
</div><!-- az-content -->