<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h1 class="text-center">Soal SD</h1>
            <div class="row mt-3">
                <div class="col-md-12">
                    <h5 class="text-left">Tema 1 : </h5>
                </div>
            </div>
            <div class="table table-hover">
                <?php foreach ($soal as $s) : ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1"><?= $s['no_soal_id'] ?></div>
                            <div class="col-md-10"><?= $s['soal_text'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <!--Radio buttons-->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="jawaban" id="jawaban">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="a. ashnflh" readonly>
                                </div>
                                <!--Radio buttons-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <!--Radio buttons-->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="jawaban" id="jawaban">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="a. ashnflh" readonly>
                                </div>
                                <!--Radio buttons-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <!--Radio buttons-->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="jawaban" id="jawaban">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="a. ashnflh" readonly>
                                </div>
                                <!--Radio buttons-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <!--Radio buttons-->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="jawaban" id="jawaban">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="a. ashnflh" readonly>
                                </div>
                                <!--Radio buttons-->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


</div>