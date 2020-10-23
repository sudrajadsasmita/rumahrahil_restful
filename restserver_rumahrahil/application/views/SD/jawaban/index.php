<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mb-3 col-lg">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h1 class="text-center">Jawaban SD</h1>
                        <div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="col-md-5 mt-2 mb-2">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                            <select id="sortJawabanSd" class="form-control " name="sortJawabanSd" required onchange="actionJawabanSD()">
                                <option selected value="">Pilih Paket Sesuai Subtema</option>..</option>
                                <?php foreach ($paket as $t) : ?>
                                    <option value="<?= $t['id_paket_latihan_sd']; ?>"><?= $t['nama_paket_sd'] . " : " . $t['nama_subtema']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Paket Soal</th>
                                    <th scope="col">Nomer Soal</th>
                                    <th scope="col">Soal Text</th>
                                    <th scope="col">Soal Gambar</th>
                                    <th scope="col">Option A</th>
                                    <th scope="col">Option B</th>
                                    <th scope="col">Option C</th>
                                    <th scope="col">Option D</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelJawabanSd">
                                <?php $i = 1; ?>
                                <?php foreach ($jawaban as $d) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td> <?= $d['nama_paket_sd'] ?> : <?= $d['nama_subtema'] ?></td>
                                        <td><?= $d['no_soal'] ?></td>
                                        <td><?= $d['soal_text'] ?></td>
                                        <td><?= $d['soal_gambar'] ?></td>
                                        <td><?= $d['option_a'] ?></td>
                                        <td><?= $d['option_b'] ?></td>
                                        <td><?= $d['option_c'] ?></td>
                                        <td><?= $d['option_d'] ?></td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#updateModal<?= $d['id_jawaban_latihan_sd'] ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                                            <a href="" data-toggle="modal" data-target="#deleteModal<?= $d['id_jawaban_latihan_sd'] ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
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
                    <h5 class="modal-title" id="createModalLabel">Option Jawaban SD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('Sd_Controllers/JawabanSd') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_paket_sd">Pilih Paket Soal</label>
                        <select id="nama_paket_sd" class="form-control" name="nama_paket_sd" onchange="inputKunciSDForJawaban()" required>
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
                        <select id="no_soal_sd" class="form-control" name="no_soal_sd" onchange="inputNoSoalSdForJawaban()" required>
                            <option selected value="">Pilih Paket Soal</option>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu nomer soal
                        </div>
                    </div>
                    <div class="form-group" id="soal_text">
                        <label for="soal_text">Soal Text</label>
                        <input type="text" class="form-control" value="" readonly>
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu nomer soal
                        </div>
                    </div>
                    <div class="form-group" id="soal_gambar">
                        <label for="jawaban_benar">Soal gambar</label>
                        <img src="<?= base_url('assets/img/') ?>default.png" alt="..." class="img-thumbnail">
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu nomer soal
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="soal_text">Option A</label>
                        <input type="text" class="form-control" name="option_a" placeholder="Masukkan Opsi Jawaban">
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu nomer soal
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="soal_text">Option B</label>
                        <input type="text" class="form-control" name="option_b" placeholder="Masukkan Opsi Jawaban">
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu nomer soal
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="soal_text">Option C</label>
                        <input type="text" class="form-control" name="option_c" placeholder="Masukkan Opsi Jawaban">
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu nomer soal
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="soal_text">Option D</label>
                        <input type="text" class="form-control" name="option_d" placeholder="Masukkan Opsi Jawaban">
                        <div class="invalid-feedback">
                            Tolong Pilih Salah Satu nomer soal
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
    <?php foreach ($jawaban as $stm) : ?>
        <div class="modal fade" id="updateModal<?= $stm['id_jawaban_latihan_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $stm['id_jawaban_latihan_sd']; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel<?= $stm['id_jawaban_latihan_sd']; ?>">Update Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('Sd_Controllers/JawabanSd/updateJawaban/' . $stm['id_jawaban_latihan_sd'])  ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="update_nama_paket_sd">Pilih Paket Soal</label>
                            <select id="update_nama_paket_sd<?= $stm['id_jawaban_latihan_sd']; ?>" class="form-control" name="nama_paket_sd" onchange="inputKunciSDForJawaban<?= $stm['id_jawaban_latihan_sd']; ?>()" required>
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
                            <label for="update_no_soal_sd">Pilih Nomer Soal</label>
                            <select id="update_no_soal_sd<?= $stm['id_jawaban_latihan_sd']; ?>" class="form-control" name="no_soal_sd<?= $stm['id_jawaban_latihan_sd']; ?>" onchange="inputNoSoalSdForJawaban<?= $stm['id_jawaban_latihan_sd']; ?>()" required>
                                <option selected value="">Pilih Paket Soal</option>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                        <div class="form-group" id="update_soal_text<?= $stm['id_jawaban_latihan_sd']; ?>">
                            <label for="soal_text">Soal Text</label>
                            <input type="text" class="form-control" value="" readonly>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                        <div class="form-group" id="update_soal_gambar<?= $stm['id_jawaban_latihan_sd']; ?>">
                            <label for="jawaban_benar">Soal gambar</label>
                            <img src="<?= base_url('assets/img/') ?>default.png" alt="..." class="img-thumbnail">
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="soal_text">Option A</label>
                            <input type="text" class="form-control" name="option_a" placeholder="Masukkan Opsi Jawaban" value="<?= $stm['option_a']; ?>">
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="soal_text">Option B</label>
                            <input type="text" class="form-control" name="option_b" placeholder="Masukkan Opsi Jawaban" value="<?= $stm['option_b']; ?>">
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="soal_text">Option C</label>
                            <input type="text" class="form-control" name="option_c" placeholder="Masukkan Opsi Jawaban" value="<?= $stm['option_c']; ?>">
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="soal_text">Option D</label>
                            <input type="text" class="form-control" name="option_d" placeholder="Masukkan Opsi Jawaban" value="<?= $stm['option_d']; ?>">
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
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
    <?php foreach ($jawaban as $tm) : ?>
        <div class="modal fade" id="deleteModal<?= $tm['id_jawaban_latihan_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $tm['id_jawaban_latihan_sd']; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('Sd_Controllers/JawabanSd/deleteJawaban/') . $tm['id_jawaban_latihan_sd']; ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel<?= $tm['id_jawaban_latihan_sd']; ?>">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Apakah anda yakin ingin menghapus Jawaban no : <?= $tm['no_soal'] . ", " . $tm['nama_paket_sd'] . " : " . $tm['nama_subtema']; ?>?</h3>
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
        function actionJawabanSD() {
            let a = document.getElementById('sortJawabanSd').value;
            jawabanSd(a);
        }

        function jawabanSd(a) {

            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tabelJawabanSd").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/tableJawabansd/'); ?>" + a, true);
            xhttp.send();
        }

        function inputKunciSDForJawaban() {
            let a = document.getElementById('nama_paket_sd').value;
            pilihKunciSdForJawaban(a);
        }

        function inputNoSoalSdForJawaban() {
            let a = document.getElementById('no_soal_sd').value;
            let b = document.getElementById('nama_paket_sd').value;
            pilihSoalGambarForJawaban(a, b);
            pilihSoalTextForJawaban(a, b);
        }

        function pilihKunciSdForJawaban(a) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("no_soal_sd").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectNoSoal/'); ?>" + a, true);
            xhttp.send();
        }

        function pilihSoalGambarForJawaban(a, b) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("soal_gambar").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectSoalGambar/'); ?>" + a + "/" + b, true);
            xhttp.send();

        }

        function inputNoSoalSdForJawaban() {
            let a = document.getElementById('no_soal_sd').value;
            let b = document.getElementById('nama_paket_sd').value;
            pilihSoalGambarForJawaban(a, b);
            pilihSoalTextForJawaban(a, b);
        }

        function pilihSoalTextForJawaban(a, b) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("soal_text").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectSoal/'); ?>" + a + "/" + b, true);
            xhttp.send();

        }
        <?php foreach ($jawaban as $j) : ?>

            function inputKunciSDForJawaban<?= $j['id_jawaban_latihan_sd']; ?>() {
                let a = document.getElementById('update_nama_paket_sd<?= $j['id_jawaban_latihan_sd']; ?>').value;
                pilihKunciSdForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a);
            }

            function inputNoSoalSdForJawaban<?= $j['id_jawaban_latihan_sd']; ?>() {
                let a = document.getElementById('update_no_soal_sd<?= $j['id_jawaban_latihan_sd']; ?>').value;
                let b = document.getElementById('update_nama_paket_sd<?= $j['id_jawaban_latihan_sd']; ?>').value;
                pilihSoalGambarForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a, b);
                pilihSoalTextForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a, b);
            }

            function pilihKunciSdForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("update_no_soal_sd<?= $j['id_jawaban_latihan_sd']; ?>").innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectNoSoal/'); ?>" + a, true);
                xhttp.send();
            }

            function pilihSoalTextForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a, b) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("update_soal_text<?= $j['id_jawaban_latihan_sd']; ?>").innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectSoal/'); ?>" + a + "/" + b, true);
                xhttp.send();

            }

            function pilihSoalGambarForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a, b) {
                var xhttp;
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("update_soal_gambar<?= $j['id_jawaban_latihan_sd']; ?>").innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectSoalGambar/'); ?>" + a + "/" + b, true);
                xhttp.send();

            }
        <?php endforeach; ?>
    </script>