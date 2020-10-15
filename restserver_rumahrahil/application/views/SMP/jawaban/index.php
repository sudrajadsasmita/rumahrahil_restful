<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mb-3 col-lg">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h1 class="text-center">Jawaban</h1>
                        <div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                        <div class="col-md-5 mt-2 mb-2">
                            <select id="sortSoal" class="form-control" required onchange="actionJawaban()">
                                <option selected value="all">Tampilkan Semua</option>..</option>
                                <?php foreach ($jawaban as $t) : ?>
                                    <option value="<?= $t['id_soal_latihan']; ?>"><?= $t['soal_text']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Soal</th>
                                    <th scope="col">Option A</th>
                                    <th scope="col">Option B</th>
                                    <th scope="col">Option C</th>
                                    <th scope="col">Option D</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelsoal">
                                <?php $this->load->view('SMP/jawaban/table-jawaban', $jawaban); ?>
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
                    <h5 class="modal-title" id="createModalLabel">Input Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" id="form-theme" novalidate method="POST" action="<?= base_url('Soal/JawabanSMP/'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputSoal">Soal</label>
                            <select id="inputSoal" class="form-control" name="soal" required>
                                <option value="" selected>Pilih Soal....</option>
                                <?php foreach ($soal as $t) : ?>
                                    <option value="<?= $t['id_soal_latihan']; ?>"> <?= $t['soal_text']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameOptionA">Option A</label>
                            <input type="text" class="form-control" id="exampleInputNameOptionA" placeholder="Masukkan Option A" name="option_a" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameOptionB">Option B</label>
                            <input type="text" class="form-control" id="exampleInputNameOptionB" placeholder="Masukkan Option B" name="option_b" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameOptionC">Option C</label>
                            <input type="text" class="form-control" id="exampleInputNameOptionC" placeholder="Masukkan Option C" name="option_c" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameOptionD">Option D</label>
                            <input type="text" class="form-control" id="exampleInputNameOptionD" placeholder="Masukkan Option D" name="option_d" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
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