<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mb-3 col-lg">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h1 class="text-center">Soal</h1>
                        <div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                        <div class="col-md-5 mt-2 mb-2">
                            <select id="sortPaket" class="form-control" required onchange="actionSoal()">
                                <option selected value="all">Tampilkan Semua</option>..</option>
                                <?php foreach ($soal as $t) : ?>
                                    <option value="<?= $t['id_paket_latihan']; ?>"><?= $t['nama_paket']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No Soal</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Soal Text</th>
                                    <th scope="col">Soal Gambar</th>
                                    <th scope="col">Soal Suara</th>
                                    <th scope="col">Jawaban Benar</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelsoal">
                                <?php $this->load->view('SMP/soal/table-soal', $soal); ?>
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
                    <h5 class="modal-title" id="createModalLabel">Input Soal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" id="form-theme" novalidate method="POST" action="<?= base_url('Soal/SoalSMP/'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputPaket">Paket</label>
                            <select id="inputPaket" class="form-control" name="paket" required>
                                <option value="" selected>Pilih Paket....</option>
                                <?php foreach ($paket as $t) : ?>
                                    <option value="<?= $t['id_paket_latihan']; ?>"> <?= $t['nama_paket']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Paket
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameText">Soal Text</label>
                            <input type="text" class="form-control" id="exampleInputNameText" placeholder="Masukkan Soal Text" name="soal_text" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameGambar">Soal Gambar</label>
                            <input type="text" class="form-control" id="exampleInputNameGambar" placeholder="Masukkan Soal Gambar" name="soal_gambar" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameSuara">Soal Suara</label>
                            <input type="text" class="form-control" id="exampleInputNameSuara" placeholder="Masukkan Soal Suara" name="soal_suara" required>
                        </div>
                        <div class="form-group">
                            <label for="inputJawaban">Jawaban</label>
                            <select id="inputJawaban" class="form-control" name="jawaban" required>
                                <option value="" selected>Pilih Jawaban....</option>
                                <?php foreach ($jawaban as $t) : ?>
                                    <option value="<?= $t['id_kunci_jawaban_latihan']; ?>"> <?= $t['jawaban_benar']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Input Jawaban Benar
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn-save-mapel">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>