<?php $i = 1; ?>
<?php foreach ($bab as $b) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $b['nama_mapel']; ?></td>
        <td><?= $b['nama_kelas']; ?></td>
        <td><?= $b['nama_bab']; ?></td>
        <td>
            <a href="" data-toggle="modal" data-target="#updateModal<?= $b['id_bab_latihan']; ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
            <a href="" data-toggle="modal" data-target="#deleteModal<?= $b['id_bab_latihan']; ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
<?php foreach ($bab as $bb) : ?>
    <div class="modal fade" id="updateModal<?= $bb['id_bab_latihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $bb['id_bab_latihan']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $bb['id_bab_latihan']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('bab/updateBab/') . $bb['id_bab_latihan']; ?>" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputMapel">Mapel</label>
                            <select id="inputMapel" class="form-control" name="mapel" required>
                                <option value="<?= $bb['mapel_id']; ?>" selected>SD <?= $bb['nama_mapel']; ?></option>
                                <?php foreach ($mapel as $t) : ?>
                                    <option value="<?= $t['id_mapel']; ?>">SD <?= $t['nama_mapel']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Mapel
                            </div>
                            <div class="form-group">
                                <label for="inputJenjang">Jenjang</label>
                                <select id="inputJenjang" class="form-control" name="jenjang" required>
                                    <option value="<?= $bb['jenjang_id']; ?>" selected>SD <?= $bb['nama_jenjang']; ?></option>
                                    <?php foreach ($jenjang as $t) : ?>
                                        <option value="<?= $t['id_jenjang']; ?>">SD <?= $t['nama_jenjang']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Tolong Pilih Salah Satu Jenjang
                                </div>
                                <div class="form-group">
                                    <label for="inputKelas">Kelas</label>
                                    <select id="inputKelas" class="form-control" name="kelas" required>
                                        <option value="<?= $bb['kelas_id']; ?>" selected>SD <?= $bb['nama_kelas']; ?></option>
                                        <?php foreach ($kelas as $t) : ?>
                                            <option value="<?= $t['id_kelas']; ?>">SD <?= $t['nama_kelas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Tolong Pilih Salah Satu Kelas
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNameBab">Nama Bab</label>
                                    <input type="text" class="form-control" id="exampleInputNameBab" placeholder="Masukkan Nama Bab" name="nama_bab" value="<?= $bb['nama_bab']; ?>" required>
                                    <div class="invalid-feedback">
                                        Data Tidak Boleh Kosong
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal -->
<?php foreach ($bab as $tm) : ?>
    <div class="modal fade" id="deleteModal<?= $tm['id_bab_latihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $tm['id_bab_latihan']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('bab/deleteBab/') . $tm['id_bab_latihan']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $tm['id_bab_latihan']; ?>">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus bab <?= $tm['nama_bab']; ?>?</h3>
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