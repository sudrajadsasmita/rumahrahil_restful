<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <form class="user" method="POST" action="<?= base_url('Login'); ?>" class="needs-validation" novalidate>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Alamat Email" name="email" required>
                                    <div class="invalid-feedback">
                                        Data Tidak Boleh Kosong
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password" required>
                                    <div class="invalid-feedback">
                                        Data Tidak Boleh Kosong
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('login/registrasi'); ?>">Buat Akun!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>