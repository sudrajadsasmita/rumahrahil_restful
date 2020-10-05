<div class="row justify-content-center">

    <div class="col-lg-12 mt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi Siswa/Guru</h1>
                            </div>
                            <?= form_open_multipart('login/registrasi') ?>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="role_id">Register Sebagai</label>
                                    <select id="role_id" name="role_id" class="form-control" value="<?= set_value('role_id'); ?>">
                                        <option value="<?= null; ?>" selected>Pilih....</option>
                                        <?php foreach ($role as $ro) : ?>
                                            <option value="<?= $ro['id_role']; ?>"><?= $ro['nama_role']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="jenjang_id">Jenjang</label>
                                    <select id="jenjang_id" name="jenjang_id" class="form-control" value="<?= set_value('jenjang_id'); ?>">
                                        <option value="<?= null; ?>" selected>Pilih....</option>
                                        <?php foreach ($jenjang as $je) : ?>
                                            <option value="<?= $je['id_jenjang']; ?>"><?= $je['nama_jenjang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('jenjang_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="jurusan_id">Jurusan</label>
                                    <select id="jurusan_id" name="jurusan_id" class="form-control">
                                        <option selected>Pilih....</option>
                                        <?php foreach ($jurusan as $ju) : ?>
                                            <option value="<?= $ju['id_jurusan']; ?>"><?= $ju['nama_jurusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="mapel_id">Mata Pelajaran</label>
                                    <select id="mapel_id" name="mapel_id" class="form-control">
                                        <option selected>Pilih....</option>
                                        <?php foreach ($mapel as $mp) : ?>
                                            <option value="<?= $mp['id_mapel']; ?>"><?= $mp['nama_mapel']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="kelas_id">Kelas</label>
                                    <select id="kelas_id" name="kelas_id" class="form-control">
                                        <option selected>Pilih....</option>
                                        <?php foreach ($kelas as $k) : ?>
                                            <option value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengakap" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ulangi Password</label>
                                    <input type="password" class="form-control" name="password1" id="exampleInputPasswordRepeat" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Asal Sekolah</label>
                                <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah" value="<?= set_value('asal_sekolah'); ?>">
                                <?= form_error('asal_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="image">Foto Profile</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Pilih Gambar</label>
                                </div>
                                <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('login'); ?>">Sudah Memiliki Akun...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>