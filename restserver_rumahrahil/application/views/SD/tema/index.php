<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mb-3 col-lg">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h1 class="text-center">Tema</h1>
                        <div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="col-md-5 mt-2 mb-2">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                            <select id="sortKelas" class="form-control" onchange="actionTemaSD()" required>
                                <option selected value="all">Tampilkan Semua</option>..</option>
                                <?php foreach ($kelas as $t) : ?>
                                    <option value="<?= $t['id_kelas']; ?>"><?= $t['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Tingkat</th>
                                    <th scope="col">Nama Tema</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabeltema">
                                <?php $this->load->view('SD/tema/table-tema', $tema); ?>
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
                    <h5 class="modal-title" id="createModalLabel">Input Tema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" id="form-theme" novalidate method="POST" action="<?= base_url('Sd_Controllers/Tema'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputKelas">Kelas</label>
                            <select id="inputKelas" class="form-control" name="kelas" required>
                                <option value="" selected>Pilih Kelas....</option>
                                <?php foreach ($kelas as $t) : ?>
                                    <option value="<?= $t['id_kelas']; ?>"><?= $t['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Kelas
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameTheme">Nama Tema</label>
                            <input type="text" class="form-control" id="exampleInputNameTheme" placeholder="Masukkan Nama Tema" name="nama_tema" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn-save-theme">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function actionTemaSD() {
            let a = document.getElementById('sortKelas').value;
            temaSd(a);
        }

        function temaSd(a) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tabeltema").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/tema/tableTema/'); ?>" + a, true);
            xhttp.send();
        }
    </script>