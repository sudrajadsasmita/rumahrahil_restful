<?php $i = 1; ?>
<?php foreach ($mapel as $m) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td>Kelas <?= $m['nama_kelas']; ?></td>
        <td><?= $m['nama_mapel']; ?></td>
        <td>
            <a href="" data-toggle="modal" data-target="#updateModal<?= $m['id_mapel']; ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
            <a href="" data-toggle="modal" data-target="#deleteModal<?= $m['id_mapel']; ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
<?php foreach ($mapel as $mp) : ?>
    <div class="modal fade" id="updateModal<?= $mp['id_mapel']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $mp['id_mapel']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $mp['id_mapel']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('mapel/updateMapel/') . $mp['id_mapel']; ?>" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputKelas">Kelas</label>
                            <select id="inputKelas" class="form-control" name="kelas" required>
                                <option value="<?= $mapel['kelas_id']; ?>" selected>SD <?= $mapel['nama_kelas']; ?></option>
                                <?php foreach ($kelas as $t) : ?>
                                    <option value="<?= $t['id_kelas']; ?>">SD <?= $t['nama_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Kelas
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameMapel">Nama Mapel</label>
                            <input type="text" class="form-control" id="exampleInputNameMapel" placeholder="Masukkan Nama Mapel" name="nama_mapel" value="<?= $mp['nama_mapel']; ?>" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal -->
<?php foreach ($mapel as $mp) : ?>
    <div class="modal fade" id="deleteModal<?= $mp['id_mapel']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $mp['id_mapel']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('mapel/deleteMapel/') . $mp['id_mapel']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $mp['id_mapel']; ?>">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus mapel <?= $mp['nama_mapel']; ?>?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ya</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
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