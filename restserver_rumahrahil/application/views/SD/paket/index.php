<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mb-3 col-lg">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h1 class="text-center">Paket Soal</h1>
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
                                    <th scope="col">Nama SubTema</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tabelpaketsd">

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
                    <h5 class="modal-title" id="createModalLabel">Input paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('Sd_Controllers/PaketSoalSd'); ?>" novalidate>
                    <div class="modal-body">
                        <div class="notif"></div>
                        <div class="form-group">
                            <label for="inputSubtema">Pilih SubTema</label>
                            <select id="inputSubtema" class="form-control" name="nama_subtema" required>
                                <option selected value="">Pilih..</option>
                                <?php foreach ($subtema as $t) : ?>
                                    <option value="<?= $t['id_subtema_sd']; ?>"><?= $t['nama_tema']; ?> : <?= $t['nama_subtema']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Tema
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPaket">Paket Soal</label>
                            <input type="text" class="form-control" id="exampleInputPaket" placeholder="Masukkan Nama SubTema" name="paket_soal" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" id="btn-save-paket" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Input paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('Sd_Controllers/PaketSoalSd'); ?>" novalidate>
                    <div class="modal-body">
                        <input type="hidden" id="idUpdate">
                        <div class="notif"></div>
                        <div class="form-group">
                            <label for="inputSubtema1">Pilih SubTema</label>
                            <select id="inputSubtema1" class="form-control" name="nama_subtema" required>
                                <option selected value="">Pilih..</option>
                                <?php foreach ($subtema as $t) : ?>
                                    <option value="<?= $t['id_subtema_sd']; ?>"><?= $t['nama_subtema']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Tema
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPaket1">Paket Soal</label>
                            <input type="text" class="form-control" id="exampleInputPaket1" placeholder="Masukkan Nama SubTema" name="paket_soal" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" id="btn-update-paket" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idHapus">
                    <div class="container" id="modalHapus">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-delete-paket">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('asset/'); ?>js/jquery.js"></script>

    <script>
        $(document).ready(function() {
            tampilTable()
            $('#example').DataTable();
            $('#btn-save-paket').on('click', function() {
                let subtema = $('#inputSubtema').val();
                let paket = $('#exampleInputPaket').val();

                var notif = "";

                if (subtema == "" || paket == "") {
                    notif = '<div class="alert alert-danger col-lg-12" role="alert">Data tidak boleh kosong</div>';
                } else {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Sd_Controllers/PaketSoalSd/insertPaketSD') ?>",
                        data: {
                            subtema: subtema,
                            paket: paket
                        },
                        dataType: "JSON",
                        success: function(response) {
                            $('#inputSubtema').val('');
                            $('#exampleInputPaket').val('');
                            $('#createModal').modal('hide');
                            tampilTable();
                        }
                    });
                }
                var tampilNotif = `<div class="row">${notif}</div>`;
                $('.notif').html(tampilNotif);
                return false;
            });

            $('#tabelpaketsd').on('click', '.edit-data', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('Sd_Controllers/PaketSoalSd/readPaketSDWhereId') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        response.forEach(element => {
                            $('#idUpdate').val(element.id_paket_latihan_sd);
                            $('#inputSubtema1').val(element.subtema_sd_id);
                            $('#exampleInputPaket1').val(element.nama_paket_sd);
                        });
                    }
                });
            });

            $('#btn-update-paket').on('click', function() {
                var id = $('#idUpdate').val();
                var subtema = $('#inputSubtema1').val();
                var paket = $('#exampleInputPaket1').val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Sd_Controllers/PaketSoalSd/updatePaketsd') ?>",
                    data: {
                        id: id,
                        subtema: subtema,
                        paket: paket
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#idUpdate').val('');
                        $('#inputSubtema1').val('');
                        $('#exampleInputPaket1').val('');
                        $('#updateModal').modal('hide');
                        tampilTable();
                    }
                });
            });

            $('#tabelpaketsd').on('click', '.delete-data', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('Sd_Controllers/PaketSoalSd/readPaketSDWhereId') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        var html = "";
                        response.forEach(element => {
                            html = `<p>Apakah anda yakin ingin menghapus subtema ${element.nama_subtema} ${element.nama_paket_sd}</p>`;
                            $('#idHapus').val(element.id_paket_latihan_sd);
                        });
                        $('#modalHapus').html(html);
                    }
                });
            });

            $('#btn-delete-paket').on('click', function() {
                var id = $('#idHapus').val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Sd_Controllers/PaketSoalSd/deletePaketsd') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#deleteModal').modal('hide');
                        tampilTable();
                    }
                });
            });

            function tampilTable() {
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('Sd_Controllers/PaketSoalSd/readPaketSD') ?>",
                    async: false,
                    dataType: "JSON",
                    success: function(response) {
                        var html = '';
                        for (let i = 0; i < response.length; i++) {

                            html += `
                            
                            <tr>
                                <th scope="row">${i+1}</th>
                                <td>${response[i].nama_subtema}</td>
                                <td>${response[i].nama_paket_sd}</td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-target="#updateModal" class="btn btn-warning px-3 edit-data" id="${response[i].id_paket_latihan_sd}" ><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                                    <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger px-3 delete-data" id="${response[i].id_paket_latihan_sd}"> <i class="far fa-trash-alt" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            
                            `;
                        }
                        $('#tabelpaketsd').html(html);
                    }
                });
            }
        });
    </script>