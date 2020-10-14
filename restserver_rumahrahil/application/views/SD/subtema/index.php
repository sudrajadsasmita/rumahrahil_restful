<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mb-3 col-lg">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h1 class="text-center">SubTema</h1>
                        <div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <span>
                            <div class="col-md-5 mt-2 mb-2">
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                                <select id="sortTema" class="form-control" name="sortTema" required onchange="actionSubTemaSD()">
                                    <option selected value="all">Tampilkan Semua</option>..</option>
                                    <?php foreach ($tema as $t) : ?>
                                        <option value="<?= $t['id_tema_sd']; ?>"><?= $t['nama_tema']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </span>
                        <table id="example" class="display" style="width:100%">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama tema</th>
                                    <th scope="col">Nama SubTema</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelsubtema">
                                <?php $this->load->view('SD/subtema/table-subtema', $subtema); ?>
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
                    <h5 class="modal-title" id="createModalLabel">Input SubTema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('Sd_Controllers/Subtema'); ?>" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputKelas">Tema</label>
                            <select id="inputKelas" class="form-control" name="nama_tema" required>
                                <option selected value="">Pilih..</option>
                                <?php foreach ($tema as $t) : ?>
                                    <option value="<?= $t['id_tema_sd']; ?>"><?= $t['nama_tema']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Tema
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameTheme">Nama SubTema</label>
                            <input type="text" class="form-control" id="exampleInputSubNameTheme" placeholder="Masukkan Nama SubTema" name="nama_subtema" required>
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
    <script>
        function actionSubTemaSD() {
            let a = document.getElementById('sortTema').value;
            subtemaSd(a);
        }

        function subtemaSd(a) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tabelsubtema").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/subtema/tableSubtema/'); ?>" + a, true);
            xhttp.send();
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
    </script>