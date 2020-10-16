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
                    <div class="container">
                        <div class="row">
                        <div class="col-md-2">No. Soal</div>
                        <div class="col-md-10">Soal</div>
                        <ul class="list_group">
                            <?php foreach ($soal as $s) : ?>
                                <div scope="col"><?= $s['no_soal']?></div>
                                <div scope="col"><?= $s['soal_text']?></div>   
                                
                                <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" aria-label="text1">     A
                                </div>
                                </div>
                                    <input type="text" class="form-control" aria-label="radio1">
                                </div>

                                <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" aria-label="text2"> B
                                </div>
                                </div>
                                    <input type="text" class="form-control" aria-label="radio2">
                                </div>

                                <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" aria-label="text3"> C
                                </div>
                                </div>
                                    <input type="text" class="form-control" aria-label="radio3">
                                </div>

                                <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" aria-label="text4"> D
                                </div>
                                </div>
                                    <input type="text" class="form-control" aria-label="radio4">
                                </div>
                            <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div>


</div>