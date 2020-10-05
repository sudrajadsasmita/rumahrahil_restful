<?php $i = 1; ?>
<?php foreach ($paket as $st) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $st['nama_subtema']; ?></td>
        <td><?= $st['nama_paket_sd']; ?></td>
        <td>
            <a href="" data-toggle="modal" data-target="#updateModal<?= $st['id_paket_latihan_sd']; ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
            <a href="" data-toggle="modal" data-target="#deleteModal<?= $st['id_paket_latihan_sd']; ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
<?php foreach ($paket as $stm) : ?>
    <div class="modal fade" id="updateModal<?= $stm['id_paket_latihan_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $stm['id_paket_latihan_sd']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $stm['id_paket_latihan_sd']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('Sd_Controllers/PaketSoalSd/updatePaketsd/') . $stm['id_paket_latihan_sd']; ?>" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputKelas">SubTema</label>
                            <select id="inputKelas" class="form-control" name="nama_subtema" required>
                                <option value="<?= $stm['subtema_sd_id']; ?>" selected><?= $stm['nama_subtema']; ?></option>
                                <?php foreach ($subtema as $t) : ?>
                                    <option value="<?= $t['id_subtema_sd']; ?>"><?= $t['nama_subtema']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Tema
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameTheme">Paket Soal</label>
                            <input type="text" class="form-control" id="exampleInputSubNameTheme" placeholder="Masukkan Nama SubTema" name="paket_soal" value="<?= $stm['nama_paket_sd']; ?>" required>
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
<?php foreach ($paket as $tm) : ?>
    <div class="modal fade" id="deleteModal<?= $tm['id_paket_latihan_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $tm['id_paket_latihan_sd']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('Sd_Controllers/PaketSoalSd/deletePaketsd/') . $tm['id_paket_latihan_sd']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $tm['id_paket_latihan_sd']; ?>">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus subtema <?= $tm['nama_paket_sd']; ?>?</h3>
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