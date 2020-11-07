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
                    <h5 class="modal-title" id="createModalLabel">Input Tema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" id="form-theme" novalidate>
                    <div class="modal-body">
                        <div class="notif"></div>
                        <div class="form-group">
                            <label for="inputKelas1">Kelas</label>
                            <select id="inputKelas1" class="form-control" name="kelas" required>
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
                            <input type="text" class="form-control" id="exampleInputNameTheme1" placeholder="Masukkan Nama Tema" name="nama_tema" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save-theme">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Tema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" id="form-theme" novalidate>
                    <input type="hidden" id="idUpdate">
                    <div class="modal-body">
                        <div class="notif"></div>
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
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-update-theme">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Tema</h5>
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
                    <button type="button" class="btn btn-primary" id="btn-delete-theme">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('asset/'); ?>js/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


    <script>
        $(document).ready(function() {
            tampilTable();
            //update tema
            $('#example').DataTable();
            $('#btn-save-theme').on('click', function() {
                let kelas = $('#inputKelas1').val();
                let tema = $('#exampleInputNameTheme1').val();
                var notifKelas = "";
                var notifTema = "";
                if (kelas == "" || tema == "") {
                    notifKelas = '<div class="alert alert-danger col-lg-12" role="alert">Data tidak boleh kosong</div>';
                } else {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Sd_Controllers/Tema/insertTheme') ?>",
                        data: {
                            kelas: kelas,
                            tema: tema
                        },
                        dataType: "JSON",
                        success: function(response) {
                            $('#inputKelas1').val('');
                            $('#exampleInputNameTheme1').val('');
                            $('#createModal').modal('hide');
                            tampilTable();
                        }
                    });
                }
                var tampilNotif = `<div class="row">${notifKelas}</div>`;
                $('.notif').html(tampilNotif);
                return false;
            });

            //tampil modal update
            $('#tabeltema').on('click', '.edit-data', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('Sd_Controllers/Tema/getIdTheme') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        response.forEach(element => {
                            $('#idUpdate').val(element.id_tema_sd);
                            $('#inputKelas').val(element.kelas_id);
                            $('#exampleInputNameTheme').val(element.nama_tema);
                        });
                    }
                });

            });
            $('#btn-update-theme').on('click', function() {
                var id = $('#idUpdate').val();
                var kelas = $('#inputKelas').val();
                var tema = $('#exampleInputNameTheme').val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Sd_Controllers/Tema/updateTheme') ?>",
                    data: {
                        id: id,
                        kelas: kelas,
                        tema: tema
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('#idUpdate').val('');
                        $('#inputKelas').val('');
                        $('#exampleInputNameTheme').val('');
                        $('#updateModal').modal('hide');
                        tampilTable();
                    }
                });
            });

            $('#tabeltema').on('click', '.delete-data', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('Sd_Controllers/Tema/getIdTheme') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        var html = "";
                        response.forEach(element => {
                            html = `<p>Apakah anda yakin ingin menghapus kelas ${element.nama_kelas} dengan tema ${element.nama_tema}</p>`;
                            $('#idHapus').val(element.id_tema_sd);
                        });
                        $('#modalHapus').html(html);
                    }
                });
            });

            $('#btn-delete-theme').on('click', function() {
                var id = $('#idHapus').val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Sd_Controllers/Tema/deleteTheme') ?>",
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
                    url: "<?= base_url('Sd_Controllers/Tema/readTheme') ?>",
                    async: false,
                    dataType: "JSON",
                    success: function(response) {
                        var html = '';
                        for (let i = 0; i < response.length; i++) {
                            html += `
                            
                            <tr>
                                <th scope="row">${i+1}</th>
                                <td>${response[i].nama_kelas}</td>
                                <td>${response[i].nama_tema}</td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-target="#updateModal" class="btn btn-warning px-3 edit-data" id="${response[i].id_tema_sd}" ><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                                    <a href="javascript:;" class="btn btn-danger px-3 delete-data" data-toggle="modal" data-target="#deleteModal" id="${response[i].id_tema_sd}" ><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            
                            `;
                        }
                        $('#tabeltema').html(html);
                        //$('#example').DataTable().ajax.reload();
                    }
                });
            }
        });
    </script>