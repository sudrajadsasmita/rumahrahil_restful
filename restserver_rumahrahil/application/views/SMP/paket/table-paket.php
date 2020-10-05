<?php $i = 1; ?>
<?php foreach ($paket as $m) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $m['nama_bab']; ?></td>
        <td><?= $m['nama_paket']; ?></td>
        <td>
            <a href="" data-toggle="modal" data-target="#updateModal<?= $m['id_paket_latihan']; ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
            <a href="" data-toggle="modal" data-target="#deleteModal<?= $m['id_paket_latihan']; ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
<?php foreach ($paket as $mp) : ?>
    <div class="modal fade" id="updateModal<?= $mp['id_paket_latihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $mp['id_paket_latihan']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $mp['id_mapel']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('paket/updatePaketlatihan/') . $mp['id_paket_latihan']; ?>" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputBab">Bab</label>
                            <select id="inputBab" class="form-control" name="bab" required>
                                <option value="<?= $paket['bab_latihan_id']; ?>" selected> <?= $paket['nama_bab']; ?></option>
                                <?php foreach ($bab as $t) : ?>
                                    <option value="<?= $t['id_bab_latihan']; ?>"> <?= $t['nama_bab']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Bab
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNamePaket">Nama Paket</label>
                            <input type="text" class="form-control" id="exampleInputNamePaket" placeholder="Masukkan Nama Paket" name="nama_paket" value="<?= $mp['nama_paket']; ?>" required>
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
<?php foreach ($paket as $mp) : ?>
    <div class="modal fade" id="deleteModal<?= $mp['id_paket_latihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $mp['id_paket_latihan']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('paket/deletePaketlatihan/') . $mp['id_paket_latihan']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $mp['id_paket_latihan']; ?>">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus paket <?= $mp['nama_paket']; ?>?</h3>
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