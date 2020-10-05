<?php $i = 1; ?>
<?php foreach ($soal as $b) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td>Paket <?= $b['nama_paket']; ?></td>
        <td><?= $b['jawaban_benar']; ?></td>
        
        <td>
            <a href="" data-toggle="modal" data-target="#updateModal<?= $b['id_soal_latihan']; ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
            <a href="" data-toggle="modal" data-target="#deleteModal<?= $b['id_soal_latihan']; ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
<?php foreach ($soal as $bb) : ?>
    <div class="modal fade" id="updateModal<?= $bb['id_soal_latihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $bb['id_soal_latihan']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $bb['id_soal_latihan']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('soal/updateSoal/') . $bb['id_soal_latihan']; ?>" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputPaket">Paket</label>
                            <select id="inputPaket" class="form-control" name="paket" required>
                                <option value="<?= $bb['paket_id']; ?>" selected> <?= $bb['nama_paket']; ?></option>
                                <?php foreach ($paket as $t) : ?>
                                    <option value="<?= $t['id_paket_latihan']; ?>"> <?= $t['nama_paket']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Paket
                            </div>
                        <div class="form-group">
                            <label for="exampleInputNameText">Soal Text</label>
                            <input type="text" class="form-control" id="exampleInputNameText" placeholder="Masukkan Soal Text" name="soal_text" value="<?= $bb['soal_text']; ?>" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameGambar">Soal Gambar</label>
                            <input type="text" class="form-control" id="exampleInputNameGambar" placeholder="Masukkan Soal Gambar" name="soal_gambar" value="<?= $bb['soal_gambar']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameSuara">Soal Suara</label>
                            <input type="text" class="form-control" id="exampleInputNameSuara" placeholder="Masukkan Soal Suara" name="soal_suara" value="<?= $bb['soal_suara']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputJawaban">Jawaban</label>
                            <select id="inputJawaban" class="form-control" name="jawaban" required>
                                <option value="<?= $bb['kunci_jawaban_latihan_id']; ?>" selected> <?= $bb['jawaban_benar']; ?></option>
                                <?php foreach ($kunci as $t) : ?>
                                    <option value="<?= $t['id_kunci_jawaban_latihan']; ?>"> <?= $t['jawaban_benar']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Input Kunci Jawaban
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
<?php foreach ($soal as $tm) : ?>
    <div class="modal fade" id="deleteModal<?= $tm['id_soal_latihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $tm['id_soal_latihan']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('soal/deleteSoal/') . $tm['id_soal_latihan']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $tm['id_soal_latihan']; ?>">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus soal <?= $tm['soal_text']; ?>?</h3>
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