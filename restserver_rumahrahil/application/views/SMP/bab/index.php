<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mb-3 col-lg">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h1 class="text-center">Bab</h1>
                        <div class="col-lg">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah data</a>
                        <div class="col-md-5 mt-2 mb-2">
                            <select id="sortMapel" class="form-control" required onchange="actionBab()">
                                <option selected value="all">Tampilkan Semua</option>..</option>
                                <?php foreach ($mapel as $t) : ?>
                                    <option value="<?= $t['id_mapel']; ?>"><?= $t['nama_mapel']; ?> : <?= $t['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Mapel</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Nama Bab</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelbab">
                                <?php $this->load->view('SMP/bab/table-bab', $bab); ?>
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
                    <h5 class="modal-title" id="createModalLabel">Input Bab</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" id="form-theme" novalidate method="POST" action="<?= base_url('bab'); ?>">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="mapel">Mapel</label>
                            <select id="mapel" class="form-control" name="mapel" onchange="selectKelas()" required>
                                <option value="" selected>Pilih Mapel....</option>
                                <?php foreach ($mapel as $m) : ?>
                                    <option value="<?= $m['id_mapel']; ?>"> <?= $m['nama_mapel']; ?> : <?= $m['nama_kelas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Mapel
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputJenjang">Jenjang</label>
                            <?php foreach ($jenjang as $g) : ?>
                                <input type="text" class="form-control" value="<?= $g['nama_jenjang']; ?>" readonly>
                                <input type="hidden" name="jenjang" value="<?= $g['id_jenjang']; ?>">
                            <?php endforeach; ?>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Jenjang
                            </div>
                        </div>
                        <div class="form-group" id="kelas">
                            <label for="inputKelas">Kelas</label>
                            <input type="text" class="form-control" value="Kelas....." readonly>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Kelas
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameBab">Nama Bab</label>
                            <input type="text" class="form-control" id="exampleInputNameBab" placeholder="Masukkan Nama Bab" name="nama_bab" required>
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
    <script>
        function selectKelas() {
            let a = document.getElementById('mapel').value;
            pilihKelas(a);
        }



        function pilihKelas(a) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("kelas").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Bab/selectKelas/'); ?>" + a, true);
            xhttp.send();
        }
    </script>