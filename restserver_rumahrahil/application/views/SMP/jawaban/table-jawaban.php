<?php $i = 1; ?>
<?php foreach ($jawaban as $m) : ?>
    <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $m['soal_text']; ?></td>
        <td><?= $m['option_a']; ?></td>
        <td><?= $m['option_b']; ?></td>
        <td><?= $m['option_c']; ?></td>
        <td><?= $m['option_d']; ?></td>
        <td>
            <a href="" data-toggle="modal" data-target="#updateModal<?= $m['id_jawaban_latihan']; ?>" class="btn btn-warning px-3"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
            <a href="" data-toggle="modal" data-target="#deleteModal<?= $m['id_jawaban_latihan']; ?>" class="btn btn-danger px-3"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
<?php foreach ($jawaban as $mp) : ?>
    <div class="modal fade" id="updateModal<?= $mp['id_jawaban_latihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?= $mp['id_jawaban_latihan']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel<?= $mp['id_soal_latihan']; ?>">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" method="POST" action="<?= base_url('jawaban/updateJawabanlatihan/') . $mp['id_jawaban_latihan']; ?>" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputJawaban">Jawaban</label>
                            <select id="inputJawaban" class="form-control" name="jawaban" required>
                                <option value="<?= $jawaban['soal_latihan_id']; ?>" selected> <?= $jawaban['soal_text']; ?></option>
                                <?php foreach ($soal as $t) : ?>
                                    <option value="<?= $t['id_soal_latihan']; ?>"> <?= $t['soal_text']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Tolong Pilih Salah Satu Soal
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameOptionA">Option A</label>
                            <input type="text" class="form-control" id="exampleInputNameOptionA" placeholder="Masukkan Nama Option A" name="option_a" value="<?= $mp['option_a']; ?>" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameOptionB">Option B</label>
                            <input type="text" class="form-control" id="exampleInputNameOptionB" placeholder="Masukkan Nama Option B" name="option_b" value="<?= $mp['option_b']; ?>" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameOptionC">Option C</label>
                            <input type="text" class="form-control" id="exampleInputNameOptionC" placeholder="Masukkan Nama Option C" name="option_c" value="<?= $mp['option_c']; ?>" required>
                            <div class="invalid-feedback">
                                Data Tidak Boleh Kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNameOptionD">Option D</label>
                            <input type="text" class="form-control" id="exampleInputNameOptionD" placeholder="Masukkan Nama Option D" name="option_d" value="<?= $mp['option_d']; ?>" required>
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
<?php foreach ($jawaban as $mp) : ?>
    <div class="modal fade" id="deleteModal<?= $mp['id_jawaban_latihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $mp['id_jawaban_latihan']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="<?= base_url('jawaban/deleteJawabanlatihan/') . $mp['id_jawaban_latihan']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel<?= $mp['id_jawaban_latihan']; ?>">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Apakah anda yakin ingin menghapus jawaban <?= $mp['soal_text']; ?>?</h3>
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