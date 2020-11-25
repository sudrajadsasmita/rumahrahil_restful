<section>
    <div class="container mt-5">
        <?php $i = 1; ?>
        <form id="form_soal" action="<?= base_url('SD/soal/processAnswer/' . $id); ?>" method="post">

            <?php foreach ($soal as $s) : ?>
                <div class="card" id="soal<?= $i; ?>">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h5 class="text-uppercase">soal no. <button class="d-inline-block text-light bg-primary" disabled><?= $s['no_soal_id']; ?></button>
                                    </h5>
                                </div>
                                <div class="col-sm-7">

                                </div>
                                <div class="col-sm-3">
                                    <a class="openbtn ml-5 text-light" onclick="openNav()">&#9776; Daftar Soal</a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $s['soal_text']; ?></h5>
                                <?php if ($s['soal_gambar'] != 'http://localhost/rumahrahil_restful/restserver_rumahrahil/assets/img/default.png') : ?>
                                    <img src="<?= $s['soal_gambar']; ?>" class="rounded float-left" width="300px">
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1<?= $s['id_soal_latihan_sd']; ?>" name="customRadio<?= $i - 1; ?>" class="custom-control-input" value="A">
                                    <label class="custom-control-label" for="customRadio1<?= $s['id_soal_latihan_sd']; ?>"><?= $s['option_a']; ?></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2<?= $s['id_soal_latihan_sd']; ?>" name="customRadio<?= $i - 1; ?>" class="custom-control-input" value="B">
                                    <label class="custom-control-label" for="customRadio2<?= $s['id_soal_latihan_sd']; ?>"><?= $s['option_b']; ?></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio3<?= $s['id_soal_latihan_sd']; ?>" name="customRadio<?= $i - 1; ?>" class="custom-control-input" value="C">
                                    <label class="custom-control-label" for="customRadio3<?= $s['id_soal_latihan_sd']; ?>"><?= $s['option_c']; ?></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio4<?= $s['id_soal_latihan_sd']; ?>" name="customRadio<?= $i - 1; ?>" class="custom-control-input" value="D">
                                    <label class="custom-control-label" for="customRadio4<?= $s['id_soal_latihan_sd']; ?>"><?= $s['option_d']; ?></label>
                                </div>
                                <input type="radio" class="hiddenRadio" id="customRadio5<?= $s['id_soal_latihan_sd']; ?>" name="customRadio<?= $i - 1; ?>" value="" checked>
                            </div>
                        </div>
                    </div>

                    <hr class="m-4">
                    <div class="container-fluid">
                        <div class="row text-center m-3">
                            <div class="col-sm-4">
                                <a class="btn btn-primary" href="#" role="button" id="btnback<?= $i; ?>"><i class="far fa-arrow-alt-circle-left mr-1"></i>Nomor Sebelumnya</a>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-warning" href="#" role="button">Ragu-Ragu<i class="fas fa-check ml-1"></i></a>

                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-primary" href="#" role="button" id="btnnext<?= $i; ?>">Nomor Berikutnya<i class="far fa-arrow-alt-circle-right ml-1"></i></a>
                                <button type="submit" class="btn btn-primary text-light submit-soal" id="btnsubmit<?= $i; ?>">Akhiri Test<i class="far fa-arrow-alt-circle-right ml-1"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </form>
        <input type="hidden" id="counter" value="<?= $i - 1; ?>">
    </div>
</section>