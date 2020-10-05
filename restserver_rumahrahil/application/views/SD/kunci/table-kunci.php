<?php $i = 1; ?>
<?php foreach ($kunci as $st) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $st['nama_paket_sd'] . " : " . $st['nama_subtema']; ?></td>
        <td><?= $st['no_soal']; ?></td>
        <td><?= $st['jawaban_benar']; ?></td>
        <td>
            <a href="" data-toggle="modal" data-target="#updateModal<?= $st['id_kunci_jawaban_sd']; ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
            <a href="" data-toggle="modal" data-target="#deleteModal<?= $st['id_kunci_jawaban_sd']; ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
<?php foreach ($kunci as $stm) : ?>
    <div class="modal fade" id="updateModal<?= $stm['id_kunci_jawaban_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $stm['id_kunci_jawaban_sd']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $stm['id_kunci_jawaban_sd']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('Sd_Controllers/KunciJawabanSD/updateKunciSd/') . $stm['id_kunci_jawaban_sd']; ?>" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="no_soal">Pilih Paket Soal</label>
                            <select id="no_soal" class="form-control" name="nama_paket_sd" required>
                                <option selected value="<?= $stm['paket_latihan_sd_id'] ?>"><?= $stm['nama_paket_sd'] . " : " . $stm['nama_subtema']; ?></option>
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
                            <select id="no_soal_sd" class="form-control" name="no_soal" required>
                                <option selected value="<?= $stm['no_soal_id']; ?>"><?= $stm['no_soal'] ?></option>
                                <?php foreach ($no_soal as $t) : ?>
                                    <option value="<?= $t['id_no_soal']; ?>"><?= $t['no_soal']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu nomer soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jawaban_benar">Jawaban Benar</label>
                            <input type="text" class="form-control" id="jawaban_benar" placeholder="Masukkan Jawaban Benar" name="jawaban_benar" value="<?= $stm['jawaban_benar']; ?>" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal -->
<?php foreach ($kunci as $tm) : ?>
    <div class="modal fade" id="deleteModal<?= $tm['id_kunci_jawaban_sd']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $tm['id_kunci_jawaban_sd']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url('Sd_Controllers/KunciJawabanSD/deleteKunciSd/') . $tm['id_kunci_jawaban_sd']; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $tm['id_kunci_jawaban_sd']; ?>">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus jawaban no : <?= $tm['no_soal']; ?>?</h3>
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