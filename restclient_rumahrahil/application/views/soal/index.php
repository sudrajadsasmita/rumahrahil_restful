<div class="container">

    <div class="row mt-5">
        <div class="col-md-6">
            <a href="" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Soal SMP</h1>
            <ul class="list-group">
                <?php foreach($soal as $s) : ?>
                    <li class="list-group-item"><?= $s['paket_latihan_id'];  ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>