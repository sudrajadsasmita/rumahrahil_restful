<?php $i = 1; ?>
<?php foreach ($tema as $t) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $t['nama_kelas']; ?></td>
        <td><?= $t['nama_tema']; ?></td>
        <td>
            <a href="" data-toggle="modal" data-target="#updateModal<?= $t['id_tema_sd']; ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
            <a href="" data-toggle="modal" data-target="#deleteModal<?= $t['id_tema_sd']; ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
<?php foreach ($tema as $tm) : ?>
    <div class="modal fade" id="updateModal<?= $tm['id_tema_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $tm['id_tema_sd']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $tm['id_tema_sd']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('Sd_Controllers/tema/updateTheme/') . $tm['id_tema_sd']; ?>" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputKelas">Kelas</label>
                            <select id="inputKelas" class="form-control" name="kelas" required>
                                <option value="<?= $tm['kelas_id']; ?>" selected><?= $tm['nama_kelas']; ?></option>
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
                            <input type="text" class="form-control" id="exampleInputNameTheme" placeholder="Masukkan Nama Tema" name="nama_tema" value="<?= $tm['nama_tema']; ?>" required>
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
<?php foreach ($tema as $tm) : ?>
    <div class="modal fade" id="deleteModal<?= $tm['id_tema_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $tm['id_tema_sd']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('Sd_Controllers/tema/deleteTheme/') . $tm['id_tema_sd']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $tm['id_tema_sd']; ?>">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus tema <?= $tm['nama_tema']; ?>?</h3>
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