<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mb-3 col-lg">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h1 class="text-center">Paket</h1>
                        <div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                        <div class="col-md-5 mt-2 mb-2">
                            <select id="sortBab" class="form-control" required onchange="actionPaket()">
                                <option selected value="all">Tampilkan Semua</option>..</option>
                                <?php foreach ($bab as $t) : ?>
                                    <option value="<?= $t['id_bab_latihan']; ?>"><?= $t['nama_bab']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Bab</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelpaket">
                                <?php $this->load->view('SMP/paket/table-paket', $paket); ?>
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
                    <h5 class="modal-title" id="createModalLabel">Input Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" id="form-theme" novalidate method="POST" action="<?= base_url('Soal/PaketSMP/'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputBab">Bab</label>
                            <select id="inputBab" class="form-control" name="bab" required>
                                <option value="" selected>Pilih Bab....</option>
                                <?php foreach ($bab as $t) : ?>
                                    <option value="<?= $t['id_bab_latihan']; ?>"> <?= $t['nama_bab']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Bab
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamePaket">Nama Paket</label>
                            <input type="text" class="form-control" id="exampleInputNamePaket" placeholder="Masukkan Nama Paket" name="nama_paket" required>
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