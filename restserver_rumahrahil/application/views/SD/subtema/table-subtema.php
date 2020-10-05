<?php $i = 1; ?>
<?php foreach ($subtema as $st) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $st['nama_tema']; ?></td>
        <td><?= $st['nama_subtema']; ?></td>
        <td>
            <a href="" data-toggle="modal" data-target="#updateModal<?= $st['id_subtema_sd']; ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
            <a href="" data-toggle="modal" data-target="#deleteModal<?= $st['id_subtema_sd']; ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
<?php foreach ($subtema as $stm) : ?>
    <div class="modal fade" id="updateModal<?= $stm['id_subtema_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $stm['id_subtema_sd']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $stm['id_subtema_sd']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('Sd_Controllers/Subtema/updateSubtema/') . $stm['id_subtema_sd']; ?>" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputKelas">Tema</label>
                            <select id="inputKelas" class="form-control" name="nama_tema" required>
                                <option value="<?= $stm['tema_sd_id']; ?>" selected><?= $stm['nama_tema']; ?></option>
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
                            <input type="text" class="form-control" id="exampleInputSubNameTheme" placeholder="Masukkan Nama SubTema" name="nama_subtema" value="<?= $stm['nama_subtema']; ?>" required>
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
<?php foreach ($subtema as $tm) : ?>
    <div class="modal fade" id="deleteModal<?= $tm['id_subtema_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $tm['id_subtema_sd']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('Sd_Controllers/subtema/deleteSubtema/') . $tm['id_subtema_sd']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $tm['id_subtema_sd']; ?>">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus subtema <?= $tm['nama_subtema']; ?>?</h3>
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