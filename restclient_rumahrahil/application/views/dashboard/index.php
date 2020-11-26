<div class="az-content az-content-dashboard">
    <div class="container">
        <div class="az-content-body">
            <div class="az-dashboard-one-title">
                <div>
                    <h1 class="az-dashboard-title ">Hai, Selamat Datang!</h1>
                    <p class="az-dashboard-text">Selamat melaksanakan tes online.</p>
                </div>
            </div><!-- az-dashboard-one-title -->
            <div class="row row-sm mg-b-20">
                <div class="col-lg-7 ht-lg-90p">
                    <div class="card card-dashboard-one p-1">
                        <div class="row no-gutters">
                            <div class="col-md-5 m-auto">
                                <img src="<?= base_url('assets'); ?>/img/boy.png" class="card-img">
                            </div>
                            <div class="col-md-5 m-auto">
                                <div class="card-body">
                                    <h1 class="card-title"><?= $user['nama']; ?></h1>
                                    <h3 class="card-text"><?= $user['asal_sekolah']; ?></h3>
                                    <h3 class="card-text"><small class="text-muted"><?= $user['email']; ?></small></h3>
                                </div>
                            </div>
                        </div>
                    </div><!-- card -->
                </div><!-- col -->
                <div class="col-lg-5 mg-t-20 mg-lg-t-0">
                    <div class="row row-sm">
                        <div class="col-sm-6">
                            <div class="card card-dashboard-two">
                                <div class="row p-3">
                                    <div class="card-header">
                                        <h6>NISN</h6>
                                        <p>Diambil dari API</p>
                                    </div><!-- card-header -->
                                    <div class="card-body m-auto">
                                        <div class="chart-wrapper text-center">
                                            <h1>
                                                <i class="fas fa-id-card"></i>
                                            </h1>
                                        </div><!-- chart-wrapper -->
                                    </div>
                                </div>
                            </div><!-- card -->
                        </div><!-- col -->
                        <div class="col-sm-6">
                            <div class="card card-dashboard-two">
                                <div class="row p-3">

                                    <div class="card-header">
                                        <h6>KELAS</h6>
                                        <p><?= $user['kelas_id']; ?></p>
                                    </div><!-- card-header -->
                                    <div class="card-body m-auto">
                                        <div class="chart-wrapper text-center">
                                            <h1>
                                                <i class="fas fa-school"></i>
                                            </h1>
                                        </div>
                                    </div><!-- chart-wrapper -->
                                </div><!-- card-body -->
                            </div><!-- card -->
                        </div><!-- col -->
                        <div class="col-sm-6 mt-3">
                            <div class="card card-dashboard-two">
                                <div class="row p-3">
                                    <div class="card-header">
                                        <h6>TANGGAL</h6>
                                        <span class="d-block"><?= strftime(' %d %B %Y') ?></span>
                                    </div><!-- card-header -->
                                    <div class="card-body m-auto">
                                        <div class="chart-wrapper text-center">
                                            <h1>
                                                <i class="far fa-calendar-alt"></i>
                                            </h1>
                                        </div><!-- chart-wrapper -->
                                    </div>
                                </div>
                            </div><!-- card -->
                        </div><!-- col -->
                        <div class="col-sm-6 mt-3">
                            <div class="card card-dashboard-two">
                                <div class="row p-3">
                                    <div class="card-header">
                                        <h6>WAKTU</h6>
                                        <span class="d-block"> <span class="live-clock"><?= date('H:i:s') ?></span></span>
                                    </div><!-- card-header -->
                                    <div class="card-body m-auto">
                                        <div class="chart-wrapper text-center">
                                            <h1>
                                                <i class="far fa-clock"></i>
                                            </h1>
                                        </div><!-- chart-wrapper -->
                                    </div><!-- card-body -->
                                </div>
                            </div><!-- card -->
                        </div><!-- col -->
                    </div><!-- row -->
                </div>
                <!--col -->
            </div>
            <!-- row -->
            <hr>
            <?php if ($roleId == 3) : ?>
                <div class="text-center">
                    <h3>Daftar Ujian</h3>
                </div>
                <div class="table-responsive">
                    <table id="example" class="display text-center" style="width:100%">
                        <thead class="bg-primary">
                            <tr>
                                <th scope="col" style="color: white;">#</th>
                                <th scope="col" style="color: white;">Tema</th>
                                <th scope="col" style="color: white;">Sub Tema</th>
                                <th scope="col" style="color: white;">Paket</th>
                                <th scope="col" style="color: white;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($paket as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $p['nama_tema']; ?></td>
                                    <td><?= $p['nama_subtema']; ?></td>
                                    <td><?= $p['nama_paket_sd']; ?></td>
                                    <td>
                                        <a href="<?= base_url('SD/Soal/index/') . $p['id_paket_latihan_sd']; ?>" class="btn btn-primary" onclick="return confirm('Apa anda yakin memulai tes online?')"><i class="far fa-paper-plane mr-2"></i>Mulai Ujian</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div><!-- az-content-body -->
    </div>
</div><!-- az-content -->