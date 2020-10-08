<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mb-3 col-lg">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h1 class="text-center">Soal SD</h1>
                        <div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="col-md-5 mt-2 mb-2">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                            <select id="sortSoalSd" class="form-control " name="sortSoalSd" required onchange="actionSoalSD()">
                                <option selected value="">Pilih Paket Sesuai Subtema</option>..</option>
                                <?php foreach ($paket as $t) : ?>
                                    <option value="<?= $t['id_paket_latihan_sd']; ?>"><?= $t['nama_paket_sd'] . " : " . $t['nama_subtema']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <table class="table table-hover">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Paket Soal</th>
                                    <th scope="col">Nomer Soal</th>
                                    <th scope="col">Soal Text</th>
                                    <th scope="col">Soal Gambar</th>
                                    <th scope="col">Soal Suara</th>
                                    <th scope="col">Jawaban Benar</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelSoalSd">
                                <?php $i = 1; ?>
                                <?php foreach ($soal as $d) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td> <?= $d['nama_paket_sd'] ?> : <?= $d['nama_subtema'] ?></td>
                                        <td><?= $d['no_soal'] ?></td>
                                        <td><?= $d['soal_text'] ?></td>
                                        <td><?= $d['soal_gambar'] ?></td>
                                        <td><?= $d['soal_suara'] ?></td>
                                        <td><?= $d['jawaban_benar'] ?></td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#updateModal<?= $d['id_soal_latihan_sd'] ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                                            <a href="" data-toggle="modal" data-target="#deleteModal<?= $d['id_soal_latihan_sd'] ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Soal SD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('Sd_Controllers/SoalSd') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_paket_sd">Pilih Paket Soal</label>
                        <select id="nama_paket_sd" class="form-control" name="nama_paket_sd" onchange="inputKunciSDForSoal()" required>
                            <option selected value="">Pilih..</option>
                            <?php foreach ($paket as $t) : ?>
                                <option value="<?= $t['id_paket_latihan_sd']; ?>"><?= $t['nama_paket_sd'] . " : " . $t['nama_subtema']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu paket soal
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_soal_sd">Pilih Nomer Soal</label>
                        <select id="no_soal_sd" class="form-control" name="no_soal_sd" onchange="inputNoSoalSdForSoal()" required>
                            <option selected value="">Pilih Paket Soal</option>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu nomer soal
                        </div>
                    </div>
                    <div class="form-group" id="jawaban_benar">
                        <label for="jawaban_benar">Jawaban Benar</label>
                        <input type="text" class="form-control" value="" readonly>
                        <input type="hidden" name="jawaban_benar_sd" class="form-control" value="">
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu nomer soal
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="soal_text">Ketik Soal Text</label>
                        <textarea class="form-control" name="soal_text" id="soal_text" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="">Soal Gambar</div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                            <label class="custom-file-label" for="image">Pilih Gambar</label>
                        </div>
                        <div class="invalid-feedback">
                            Data Tidak Boleh Kosong
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php foreach ($soal as $stm) : ?>
        <div class="modal fade" id="updateModal<?= $stm['id_soal_latihan_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $stm['id_soal_latihan_sd']; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel<?= $stm['id_soal_latihan_sd']; ?>">Update Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('Sd_Controllers/SoalSd/updateSoal/' . $stm['id_soal_latihan_sd'])  ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="update_nama_paket_sd_<?= $stm['id_soal_latihan_sd']; ?>">Pilih Paket Soal</label>
                            <select id="update_nama_paket_sd_<?= $stm['id_soal_latihan_sd']; ?>" class="form-control" name="nama_paket_sd" onchange="inputUpdateKunciSD<?= $stm['id_soal_latihan_sd']; ?>()" required>
                                <option selected value="<?= $stm['paket_latihan_sd_id']; ?>"><?= $stm['nama_paket_sd'] . " : " . $stm['nama_subtema']; ?></option>
                                <?php foreach ($paket as $t) : ?>
                                    <option value="<?= $t['id_paket_latihan_sd']; ?>"><?= $t['nama_paket_sd'] . " : " . $t['nama_subtema']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu paket soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="update_no_soal_sd_<?= $stm['id_soal_latihan_sd']; ?>">Pilih Nomer Soal</label>
                            <select id="update_no_soal_sd_<?= $stm['id_soal_latihan_sd']; ?>" class="form-control" name="no_soal_sd" onchange="inputUpdateNoSoalSd<?= $stm['id_soal_latihan_sd']; ?>()" required>
                                <option value="">Pilih ulang paket</option>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                        <div class="form-group" id="update_jawaban_benar_<?= $stm['id_soal_latihan_sd']; ?>">
                            <label for="jawaban_benar">Jawaban Benar</label>
                            <input type="text" class="form-control" value="" readonly>
                            <input type="hidden" name="jawaban_benar_sd" class="form-control" value="">
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="soal_text">Ketik Soal Text</label>
                            <textarea class="form-control" name="soal_text" id="soal_text" rows="3"><?= $stm['soal_text'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="">Soal Gambar</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="updateImage" accept="image/*" value="<?= $stm['soal_gambar']; ?>">
                                <label class="custom-file-label" for="image"><?= $stm['soal_gambar']; ?></label>
                                <input type="hidden" name="gambar" value="<?= $stm['soal_gambar']; ?>">
                            </div>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal -->
    <?php foreach ($soal as $tm) : ?>
        <div class="modal fade" id="deleteModal<?= $tm['id_soal_latihan_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $tm['id_soal_latihan_sd']; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('Sd_Controllers/SoalSd/deleteSoal/') . $tm['id_soal_latihan_sd']; ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel<?= $tm['id_soal_latihan_sd']; ?>">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Apakah anda yakin ingin menghapus soal no : <?= $tm['no_soal'] . ", " . $tm['nama_paket_sd'] . " : " . $tm['nama_subtema']; ?>?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Ya</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <style>
        /* .invalid class prevents CSS from automatically applying */
        .invalid input:required:invalid {
            background: #BE4C54;
        }

        /* Mark valid inputs during .invalid state */
        .invalid input:required:valid {
            background: #17D654;
        }
    </style>
    <script>
        function actionSoalSD() {
            let a = document.getElementById('sortSoalSd').value;
            sortSoalSD(a);
        }

        function sortSoalSD(a) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tabelSoalSd").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/SoalSd/tableSoalsd/'); ?>" + a, true);
            xhttp.send();
        }

        function inputKunciSDForSoal() {
            let a = document.getElementById('nama_paket_sd').value;
            pilihKunciSdForSoal(a);
        }

        function inputNoSoalSdForSoal() {
            let a = document.getElementById('no_soal_sd').value;
            let b = document.getElementById('nama_paket_sd').value;
            pilihJawabanBenarForSoal(a, b);
        }

        function pilihKunciSdForSoal(a) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("no_soal_sd").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/SoalSd/selectNoSoal/'); ?>" + a, true);
            xhttp.send();
        }

        function pilihJawabanBenarForSoal(a, b) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("jawaban_benar").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/SoalSd/selectJawabanBenar/'); ?>" + a + "/" + b, true);
            xhttp.send();
        }
        <?php foreach ($soal as $s) : ?>

            function inputUpdateKunciSD<?= $s['id_soal_latihan_sd']; ?>() {
                let a = document.getElementById('update_nama_paket_sd_<?= $s['id_soal_latihan_sd']; ?>').value;
                updatePilihKunciSd<?= $s['id_soal_latihan_sd']; ?>(a);
            }

            function inputUpdateNoSoalSd<?= $s['id_soal_latihan_sd']; ?>() {
                let a = document.getElementById('update_no_soal_sd_<?= $s['id_soal_latihan_sd']; ?>').value;
                let b = document.getElementById('update_nama_paket_sd_<?= $s['id_soal_latihan_sd']; ?>').value;
                updatePilihJawabanBenar<?= $s['id_soal_latihan_sd']; ?>(a, b);
            }

            function updatePilihKunciSd<?= $s['id_soal_latihan_sd']; ?>(a) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("update_no_soal_sd_<?= $s['id_soal_latihan_sd']; ?>").innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", "<?= base_url('Sd_Controllers/SoalSd/selectNoSoal/'); ?>" + a, true);
                xhttp.send();
            }

            function updatePilihJawabanBenar<?= $s['id_soal_latihan_sd']; ?>(a, b) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("update_jawaban_benar_<?= $s['id_soal_latihan_sd']; ?>").innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", "<?= base_url('Sd_Controllers/SoalSd/selectJawabanBenar/'); ?>" + a + "/" + b, true);
                xhttp.send();
            }
        <?php endforeach; ?>
    </script>