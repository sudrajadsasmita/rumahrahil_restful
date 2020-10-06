<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title><?= $title; ?></title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url('asset/') ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url('asset/') ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Vendor CSS-->
    <link href="<?php echo base_url('asset/') ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url('asset/') ?>vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url('asset/') ?>css/main-regist.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Buat Akun Baru</h2>
                </div>
                <div class="card-body">
                    <form class="needs-validation" method="POST" action="<?= base_url('Login'); ?>" name="myForm" onsubmit="return validateForm()" novalidate>
                        <div class="form-row">
                            <div class="name">Nama Lengkap</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search col-md-12">
                                        <input class="input--style-5" type="text" name="nama" placeholder="Ketikkan Nama Lengkap....." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Registrasi Sebagai</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search col-md-12">
                                        <select name="role" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Jenjang</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search col-md-12">
                                        <select name="role" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Kelas</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search col-md-12">
                                        <select name="role" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Jurusan</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search col-md-12">
                                        <select name="role" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Mata Pelajaran</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search col-md-12">
                                        <select name="role" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search row col-md-12">
                                        <div class="col-6">
                                            <div class="input-group-desc">
                                                <input class="input--style-5" type="password" name="password1" placeholder="ketikkan password..." required>
                                                <label class="label--desc">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group-desc">
                                                <input class="input--style-5" type="password" name="password1" placeholder="Ulangi Password..." required>
                                                <label class="label--desc">Ulangi Password</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search col-md-12">
                                        <input class="input--style-5" type="email" name="email" placeholder="ketikkan email..." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Asal Sekolah</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search col-md-12">
                                        <input class="input--style-5" type="text" name="email" placeholder="ketikkan asal sekolah..." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-row">
                                <div class="name">Pilih Foto</div>
                                <div class="value">
                                    <div class="input-group">
                                        <div class="rs-select2 js-select-simple select--no-search col-md-12">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url('asset/') ?>vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo base_url('asset/') ?>vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url('asset/') ?>vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url('asset/') ?>vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url('asset/') ?>js/global.js"></script>
    <script>
        function validateForm() {
            var name = document.forms['myForm']['nama'].value;
            if (name === "") {
                alert("Name must be filled out");
                return false;
            }
        }
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->