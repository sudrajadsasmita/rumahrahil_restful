<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mb-3 col-lg">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h1 class="text-center">Mapel</h1>
                        <div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                        <div class="col-md-5 mt-2 mb-2">
                            <select id="sortKelas" class="form-control" required onchange="actionMapel()">
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
                                    <th scope="col">Nama Mapel</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelmapel">
                                <?php $this->load->view('SMP/mapel/table-mapel', $mapel); ?>
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
                    <h5 class="modal-title" id="createModalLabel">Input Mapel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" id="form-theme" novalidate method="POST" action="<?= base_url('mapel'); ?>">
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
                            <label for="exampleInputNameMapel">Nama Mapel</label>
                            <input type="text" class="form-control" id="exampleInputNameMapel" placeholder="Masukkan Nama Mapel" name="nama_mapel" required>
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