<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mb-3 col-lg">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h1 class="text-center">Kunci</h1>
                        <div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                        <div class="col-md-5 mt-2 mb-2">
                            <select id="sortPaket" class="form-control" required onchange="actionKunci()">
                                <option selected value="all">Tampilkan Semua</option>..</option>
                                <?php foreach ($paket as $t) : ?>
                                    <option value="<?= $t['id_paket_latihan']; ?>"><?= $t['nama_paket']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <table class="table table-hover">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Jawaban</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelkunci">
                                <?php $this->load->view('SMP/kunci/table-kunci', $kunci); ?>
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
                    <h5 class="modal-title" id="createModalLabel">Input Kunci</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" id="form-theme" novalidate method="POST" action="<?= base_url('Soal/KunciSMP/'); ?>">
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="inputPaket">Paket</label>
                            <select id="inputPaket" class="form-control" name="paket" required>
                                <option value="" selected>Pilih Paket....</option>
                                <?php foreach ($paket as $m) : ?>
                                    <option value="<?= $m['id_paket_latihan']; ?>"> <?= $m['nama_paket']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Paket
                            </div>
                            </div>
                        
                        <div class="form-group">
                            <label for="exampleInputNameKunci">Nama Kunci</label>
                            <input type="text" class="form-control" id="exampleInputNameKunci" placeholder="Masukkan Nama Kunci" name="nama_bab" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn-save-bab">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>