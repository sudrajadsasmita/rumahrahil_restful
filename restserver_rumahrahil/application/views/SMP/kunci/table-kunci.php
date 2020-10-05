<?php $i = 1; ?>
<?php foreach ($kunci as $st) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $st['nama_paket']; ?></td>
        <td><?= $st['jawaban_benar']; ?></td>
        <td>
            <a href="" data-toggle="modal" data-target="#updateModal<?= $st['id_kunci_jawaban_latihan']; ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
            <a href="" data-toggle="modal" data-target="#deleteModal<?= $st['id_kunci_jawaban_latihan']; ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
<?php foreach ($kunci as $stm) : ?>
    <div class="modal fade" id="updateModal<?= $stm['id_kunci_jawaban_latihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $stm['id_kunci_jawaban_latihan']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $stm['id_kunci_jawaban_latihan']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('kunci/updateKuncilatihan/') . $stm['id_kunci_jawaban_latihan']; ?>" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputPaket">Pilih Paket Soal</label>
                            <select id="inputPaket" class="form-control" name="paket" required>
                                <option selected value="<?=$stm['paket_latihan_id']?>"><?= $stm['nama_paket']; ?></option>
                                <?php foreach ($paket as $t) : ?>
                                    <option value="<?= $t['id_paket_latihan']; ?>"><?= $t['nama_paket']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu paket soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jawaban_benar">Jawaban Benar</label>
                            <input type="text" class="form-control" id="jawaban_benar" placeholder="Masukkan Jawaban Benar" name="jawaban_benar" value="" required>
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
<?php foreach ($kunci as $tm) : ?>
    <div class="modal fade" id="deleteModal<?= $tm['id_kunci_jawaban_latihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $tm['id_kunci_jawaban_latihan']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('kunci/deleteKuncilatihan/') . $tm['id_kunci_jawaban_latihan']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $tm['id_kunci_jawaban_latihan']; ?>">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus jawaban ?</h3>
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