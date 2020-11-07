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
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Paket Soal</th>
                                    <th scope="col">No.Soal</th>
                                    <th scope="col">Soal Text</th>
                                    <th scope="col">Soal Gambar</th>
                                    <th scope="col">option_A</th>
                                    <th scope="col">option_B</th>
                                    <th scope="col">option_C</th>
                                    <th scope="col">option_D</th>
                                    <th scope="col">Kunci</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelSoalSd">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Soal SD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createForm" action="#" method="post">
                    <div class="modal-body">
                        <div class="notif"></div>
                        <div class="form-group">
                            <label for="nama_paket_sd">Pilih Paket Soal</label>
                            <select id="nama_paket_sd" class="form-control" name="nama_paket_sd" required>
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
                            <select id="no_soal_sd" class="form-control" name="no_soal_sd" required>
                                <option selected value="">Pilih Paket Soal</option>
                                <?php foreach ($no_soal as $no) : ?>
                                    <option value="<?= $no['id_no_soal']; ?>"><?= $no['no_soal']; ?></option>
                                <?php endforeach; ?>
                            </select>
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
                        <div class="form-group">
                            <label for="option_a">Option Jawaban A</label>
                            <input type="text" class="form-control" name="option_a" id="option_a" rows="3" placeholder="Inputkan Jawaban A"></input>
                        </div>
                        <div class="form-group">
                            <label for="option_b">Option Jawaban B</label>
                            <input type="text" class="form-control" name="option_b" id="option_b" rows="3" placeholder="Inputkan Jawaban b"></input>
                        </div>
                        <div class="form-group">
                            <label for="option_c">Option Jawaban C</label>
                            <input type="text" class="form-control" name="option_c" id="option_c" rows="3" placeholder="Inputkan Jawaban C"></input>
                        </div>
                        <div class="form-group">
                            <label for="option_d">Option Jawaban D</label>
                            <input type="text" class="form-control" name="option_d" id="option_d" rows="3" placeholder="Inputkan Jawaban D"></input>
                        </div>
                        <div class="form-group">
                            <label for="jawaban_benar">Jawaban Benar</label>
                            <select id="jawaban_benar" class="form-control" name="jawaban_benar" required>
                                <option selected value="">Pilih Option</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" id="btn-create-soal" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Soal SD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createForm" action="#" method="post">
                    <div class="modal-body">
                        <div class="notif"></div>
                        <input type="hidden" name="id" id="idUpdate">
                        <div class="form-group">
                            <label for="nama_paket_sd">Pilih Paket Soal</label>
                            <select id="nama_paket_sd1" class="form-control" name="nama_paket_sd1" required>
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
                            <select id="no_soal_sd1" class="form-control" name="no_soal_sd1" required>
                                <option selected value="">Pilih Paket Soal</option>
                                <?php foreach ($no_soal as $no) : ?>
                                    <option value="<?= $no['id_no_soal']; ?>"><?= $no['no_soal']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="soal_text">Ketik Soal Text</label>
                            <textarea class="form-control" name="soal_text1" id="soal_text1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="">Soal Gambar</div>
                            <div class="custom-file">
                                <input type="hidden" id="img" name="img">
                                <input type="file" class="custom-file-input" id="image1" name="image1" accept="image/*">
                                <label class="custom-file-label" for="image" id="labelImg" name="labelImg">Pilih Gambar</label>
                            </div>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="option_a">Option Jawaban A</label>
                            <input type="text" class="form-control" name="option_a1" id="option_a1" rows="3" placeholder="Inputkan Jawaban A"></input>
                        </div>
                        <div class="form-group">
                            <label for="option_b">Option Jawaban B</label>
                            <input type="text" class="form-control" name="option_b1" id="option_b1" rows="3" placeholder="Inputkan Jawaban b"></input>
                        </div>
                        <div class="form-group">
                            <label for="option_c">Option Jawaban C</label>
                            <input type="text" class="form-control" name="option_c1" id="option_c1" rows="3" placeholder="Inputkan Jawaban C"></input>
                        </div>
                        <div class="form-group">
                            <label for="option_d">Option Jawaban D</label>
                            <input type="text" class="form-control" name="option_d1" id="option_d1" rows="3" placeholder="Inputkan Jawaban D"></input>
                        </div>
                        <div class="form-group">
                            <label for="jawaban_benar">Jawaban Benar</label>
                            <select id="jawaban_benar1" class="form-control" name="jawaban_benar1" required>
                                <option selected value="">Pilih Option</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" id="btn-update-soal" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Soal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idHapus">
                    <input type="hidden" id="urlGambar">
                    <div class="container" id="modalHapus">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-delete-soal">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
    <script src="<?= base_url('asset/'); ?>js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            tampilTable()
            $('#example').DataTable();

            $('#btn-create-soal').on('click', function() {
                let id = $('#nama_paket_sd').val();
                let no = $('#no_soal_sd').val();
                let text = $('#soal_text').val();
                let image = $('#image')[0].files[0];
                let a = $('#option_a').val();
                let b = $('#option_b').val();
                let c = $('#option_c').val();
                let d = $('#option_d').val();
                let kunci = $('#jawaban_benar').val();
                let notif = '';
                if (id == '' || no == '' || text == '' || a == '' || b == '' || c == '' || d == '' || kunci == '') {
                    notif = '<div class="alert alert-danger col-lg-12" role="alert">Data tidak boleh kosong</div>';
                } else {
                    var formData = new FormData();
                    formData.append('id', id);
                    formData.append('no', no);
                    formData.append('text', text);
                    formData.append('image', image);
                    formData.append('a', a);
                    formData.append('b', b);
                    formData.append('c', c);
                    formData.append('d', d);
                    formData.append('kunci', kunci);
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Sd_Controllers/SoalSd/createSoal'); ?>",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function(response) {
                            $('[name="nama_paket_sd"]').val('');
                            $('[name="no_soal_sd"]').val('');
                            $('[name="soal_text"]').val('');
                            $('[name="image"]').val('');
                            $('.custom-file-label').html('Pilih Gambar');
                            $('[name="option_a"]').val('');
                            $('[name="option_b"]').val('');
                            $('[name="option_c"]').val('');
                            $('[name="option_d"]').val('');
                            $('[name="jawaban_benar"]').val('');
                            $('#createModal').modal('hide');
                            tampilTable();
                        },
                        error: function(jqXHR, textStatus, error) {
                            $('[name="nama_paket_sd"]').val('');
                            $('[name="no_soal_sd"]').val('');
                            $('[name="soal_text"]').val('');
                            $('[name="image"]').val('');
                            $('.custom-file-label').html('Pilih Gambar');
                            $('[name="option_a"]').val('');
                            $('[name="option_b"]').val('');
                            $('[name="option_c"]').val('');
                            $('[name="option_d"]').val('');
                            $('[name="jawaban_benar"]').val('');
                            $('#createModal').modal('hide');
                            tampilTable();
                        }
                    });
                }
                var tampilNotif = `<div class="row">${notif}</div>`;
                $('.notif').html(tampilNotif);
            });

            $('#tabelSoalSd').on('click', '.edit-data', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('Sd_Controllers/SoalSd/readSoalWhereId') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        response.forEach(element => {
                            $('#idUpdate').val(element.id_soal_latihan_sd);
                            $('#nama_paket_sd1').val(element.id_paket_latihan_sd);
                            $('#no_soal_sd1').val(element.no_soal_id);
                            $('#soal_text1').val(element.soal_text);
                            $('#img').val(element.soal_gambar);
                            $('#option_a1').val(element.option_a);
                            $('#option_b1').val(element.option_b);
                            $('#option_c1').val(element.option_c);
                            $('#option_d1').val(element.option_d);
                            $('#jawaban_benar1').val(element.jawaban_benar);
                        });
                    }
                });
            });

            $('#btn-update-soal').on('click', function() {
                let idSoal = $('#idUpdate').val();
                let id = $('#nama_paket_sd1').val();
                let no = $('#no_soal_sd1').val();
                let text = $('#soal_text1').val();
                let urlImage = $('#img').val();
                let image = $('#image1')[0].files[0];
                let a = $('#option_a1').val();
                let b = $('#option_b1').val();
                let c = $('#option_c1').val();
                let d = $('#option_d1').val();
                let kunci = $('#jawaban_benar1').val();

                var notif = '';

                if (id == '' || no == '' || text == '' || a == '' || b == '' || c == '' || d == '' || kunci == '') {
                    notif = '<div class="alert alert-danger col-lg-12" role="alert">Data tidak boleh kosong</div>';
                } else {
                    var formData = new FormData()
                    formData.append('id_soal', idSoal);
                    formData.append('id', id);
                    formData.append('no', no);
                    formData.append('text', text);
                    formData.append('urlImage', urlImage);
                    formData.append('image', image);
                    formData.append('a', a);
                    formData.append('b', b);
                    formData.append('c', c);
                    formData.append('d', d);
                    formData.append('kunci', kunci);
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Sd_Controllers/SoalSd/updateSoal') ?>",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function(response) {
                            $('[name="nama_paket_sd1"]').val('');
                            $('[name="no_soal_sd1"]').val('');
                            $('[name="soal_text1"]').val('');
                            $('[name="image1"]').val('');
                            $('.custom-file-label').html('Pilih Gambar');
                            $('[name="option_a1"]').val('');
                            $('[name="option_b1"]').val('');
                            $('[name="option_c1"]').val('');
                            $('[name="option_d1"]').val('');
                            $('[name="jawaban_benar1"]').val('');
                            $('#updateModal').modal('hide');
                            tampilTable();
                        },
                        error: function(jqXHR, textStatus, error) {
                            $('[name="nama_paket_sd1"]').val('');
                            $('[name="no_soal_sd1"]').val('');
                            $('[name="soal_text1"]').val('');
                            $('[name="image1"]').val('');
                            $('.custom-file-label').html('Pilih Gambar');
                            $('[name="option_a1"]').val('');
                            $('[name="option_b1"]').val('');
                            $('[name="option_c1"]').val('');
                            $('[name="option_d1"]').val('');
                            $('[name="jawaban_benar1"]').val('');
                            $('#updateModal').modal('hide');
                            tampilTable();
                        }
                    });
                }
            });

            $('#tabelSoalSd').on('click', '.delete-data', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('Sd_Controllers/SoalSd/readSoalWhereId') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        var html = "";
                        response.forEach(element => {
                            html = `<p>Apakah anda yakin ingin menghapus Soal ${element.nama_paket_sd} : ${element.soal_text}</p>`;
                            $('#idHapus').val(element.id_soal_latihan_sd);
                            $('#urlGambar').val(element.soal_gambar);
                        });
                        $('#modalHapus').html(html);
                    }
                });
            });

            $('#btn-delete-soal').on('click', function() {
                var id = $('#idHapus').val();
                var url = $('#urlGambar').val();

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Sd_Controllers/SoalSd/deleteSoal'); ?>",
                    data: {
                        id: id,
                        url: url
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#deleteModal').modal('hide');
                        tampilTable();
                    },
                    error: function(jqXHR, textStatus, error) {
                        $('#deleteModal').modal('hide');
                        tampilTable();
                    }
                });
            });

            function tampilTable() {
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('Sd_Controllers/SoalSd/readSoal'); ?>",
                    async: false,
                    dataType: "JSON",
                    success: function(response) {
                        var html = '';
                        for (let i = 0; i < response.length; i++) {
                            var image;
                            if (response[i].soal_gambar == 'http://localhost/rumahrahil_restful/restserver_rumahrahil/assets/img/') {
                                image = '<?= base_url('assets/img/') ?>default.png';
                            } else {
                                image = response[i].soal_gambar;
                            }
                            html += `
                                <tr>
                                        <th scope="row"> ${i+1} </th>
                                        <td>${response[i].nama_paket_sd} : ${response[i].nama_subtema}</td>
                                        <td>${response[i].no_soal_id}</td>
                                        <td>${response[i].soal_text}</td>
                                        <td><img src="${image}" class="rounded mx-auto d-block" alt="..." width="50px" height="50px"></td>
                                        <td>${response[i].option_a}</td>
                                        <td>${response[i].option_b}</td>
                                        <td>${response[i].option_c}</td>
                                        <td>${response[i].option_d}</td>
                                        <td>${response[i].jawaban_benar}</td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#updateModal" class="btn btn-warning px-3 edit-data" id="${response[i].id_soal_latihan_sd}"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                                            <a href="" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger px-3 delete-data" id="${response[i].id_soal_latihan_sd}"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                            `;

                        }
                        $('#tabelSoalSd').html(html);
                    }
                });
            }
        });
    </script>