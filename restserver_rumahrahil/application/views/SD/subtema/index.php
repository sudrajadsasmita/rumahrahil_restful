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
                    <h5 class="modal-title" id="createModalLabel">Input SubTema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('Sd_Controllers/Subtema'); ?>" novalidate>
                    <div class="modal-body">
                        <div class="notif"></div>
                        <div class="form-group">
                            <label for="inputtema1">Tema</label>
                            <select id="inputtema1" class="form-control" name="nama_tema" required>
                                <option selected value="">Pilih..</option>
                                <?php foreach ($tema as $t) : ?>
                                    <option value="<?= $t['id_tema_sd']; ?>"><?= $t['nama_kelas']; ?> : <?= $t['nama_tema']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Tema
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameTheme1">Nama SubTema</label>
                            <input type="text" class="form-control" id="exampleInputSubNameTheme1" placeholder="Masukkan Nama SubTema" name="nama_subtema" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save-subtheme">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog bd-example-modal-lg" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Input SubTema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('Sd_Controllers/Subtema'); ?>" novalidate>
                    <div class="modal-body">
                        <div class="notif"></div>
                        <div class="form-group">
                            <input type="hidden" id="idUpdate">
                            <label for="inputtema">Tema</label>
                            <select id="inputtema" class="form-control" name="nama_tema" required>
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
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-update-subtema">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Subtema</h5>
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
                    <button type="button" class="btn btn-primary" id="btn-delete-subtheme">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('asset/'); ?>js/jquery.js"></script>

    <script>
        $(document).ready(function() {
            tampilTable();
            $('#example').DataTable();
            $('#btn-save-subtheme').on('click', function() {
                let tema = $('#inputtema1').val();
                let subtema = $('#exampleInputSubNameTheme1').val();
                var notif = "";

                if (tema == "" || subtema == "") {
                    notif = '<div class="alert alert-danger col-lg-12" role="alert">Data tidak boleh kosong</div>';
                } else {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Sd_Controllers/Subtema/insertSubtema') ?>",
                        data: {
                            tema: tema,
                            subtema: subtema
                        },
                        dataType: "JSON",
                        success: function(response) {
                            $('#inputtema1').val('');
                            $('#exampleInputSubNameTheme1').val('');
                            $('#createModal').modal('hide');
                            tampilTable();
                        }
                    });
                }
                var tampilNotif = `<div class="row">${notif}</div>`;
                $('.notif').html(tampilNotif);
                return false;
            });

            $('#tabelsubtema').on('click', '.edit-data', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('Sd_Controllers/Subtema/getIdSubtema') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        response.forEach(element => {
                            $('#idUpdate').val(element.id_subtema_sd);
                            $('#inputtema').val(element.tema_sd_id);
                            $('#exampleInputSubNameTheme').val(element.nama_subtema);
                        });
                    }
                });
            });

            $('#btn-update-subtema').on('click', function() {
                var id = $('#idUpdate').val();
                var tema = $('#inputtema').val();
                var subtema = $('#exampleInputSubNameTheme').val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Sd_Controllers/Subtema/updateSubtema') ?>",
                    data: {
                        id: id,
                        tema: tema,
                        subtema: subtema
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#idUpdate').val('');
                        $('#inputtema').val('');
                        $('#exampleInputSubNameTheme').val('');
                        $('#updateModal').modal('hide');
                        tampilTable();
                    }
                });
            });
            $('#tabelsubtema').on('click', '.delete-data', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('Sd_Controllers/Subtema/getIdSubtema') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        var html = "";
                        response.forEach(element => {
                            html = `<p>Apakah anda yakin ingin menghapus tema ${element.nama_tema} dengan subtema ${element.nama_subtema}</p>`;
                            $('#idHapus').val(element.id_subtema_sd);
                        });
                        $('#modalHapus').html(html);
                    }
                });
            });

            $('#btn-delete-subtheme').on('click', function() {
                var id = $('#idHapus').val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Sd_Controllers/Subtema/deleteSubtema') ?>",
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
                    url: "<?= base_url('Sd_Controllers/Subtema/readSubtema') ?>",
                    async: false,
                    dataType: "JSON",
                    success: function(response) {
                        var html = '';
                        for (let i = 0; i < response.length; i++) {
                            html += `
                            
                            <tr>
                                <th scope="row">${i+1}</th>
                                <td>${response[i].nama_kelas} : ${response[i].nama_tema}</td>
                                <td>${response[i].nama_subtema}</td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-target="#updateModal" class="btn btn-warning px-3 edit-data" id="${response[i].id_subtema_sd}" ><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                                    <a href="javascript:;" class="btn btn-danger px-3 delete-data" data-toggle="modal" data-target="#deleteModal" id="${response[i].id_subtema_sd}" ><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            
                            `;
                        }
                        $('#tabelsubtema').html(html);
                    }
                });
            }
        });
    </script>