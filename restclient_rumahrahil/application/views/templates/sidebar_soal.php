<section>
    <div id="mySidebar" class="sidebar text-light">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="container">
            <h5>Daftar Soal</h5>
            <hr class="bg-light">
            <div class="row text-dark text-center">
                <?php $c = 1; ?>
                <?php foreach ($soal as $sl) : ?>
                    <div class="col-md-4 mb-3" id="card-soal">
                        <div class="card" onclick="selectHalaman(<?= $c; ?>)">
                            <div class="card-body">
                                <h3><?= $sl['no_soal_id']; ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php $c++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>