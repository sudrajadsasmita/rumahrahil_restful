<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <link href="<?= base_url('asset/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        .sidebar {
            height: 100%;
            /* 100% Full-height */
            width: 0;
            /* 0 width - change this with JavaScript */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Stay on top */
            top: 0;
            right: 0;
            background-color: #0275d8;
            /* Black*/
            overflow-x: hidden;
            /* Disable horizontal scroll */
            padding-top: 60px;
            /* Place content 60px from the top */
            transition: 0.5s;
            /* 0.5 second transition effect to slide in the sidebar */
        }

        /* The sidebar links */
        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #FFFF;
            display: block;
            transition: 0.3s;
        }

        /* When you mouse over the navigation links, change their color */
        .sidebar a:hover {
            color: #f1f1f1;
        }

        /* Position and style the close button (top right corner) */
        .sidebar .closebtn {
            position: absolute;
            top: 0;
            left: 25px;
            font-size: 36px;
            margin-right: 50px;
        }

        /* The button used to open the sidebar */
        .openbtn {
            font-size: 16px;
            cursor: pointer;
            background-color: #0275d8;
            color: white;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: skyblue;
        }

        /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
        #main {
            transition: margin-right .5s;
            /* If you want a transition effect */
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }

        #card-soal:hover {
            color: #0275d8;
        }
    </style>
</head>

<body id="main">
    <section>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url('assets'); ?>/img/cms.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    Rumah Rahil Education
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <span class="my-2 my-lg-0">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= base_url('assets'); ?>/img/boy.png" width="30" height="30" class="d-inline-block align-top mr-1" alt="">
                                    User
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
    </section>
    <section>
        <div id="mySidebar" class="sidebar text-light">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="container">
                <h5>Daftar Soal</h5>
                <hr class="bg-light">
                <div class="row text-dark text-center">
                    <div class="col-md-4" id="card-soal">
                        <div class="card" onclick="return alert('no 1')">
                            <div class="card-body">
                                <h3>1</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" id="card-soal">
                        <div class="card" onclick="return alert('no 2')">
                            <div class="card-body">
                                <h3>2</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" id="card-soal">
                        <div class="card" onclick="return alert('no 3')">
                            <div class="card-body">
                                <h3>3</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-5">
            <?php $i = 1; ?>
            <form action="<?= base_url('SD/soal/processAnswer/' . $id); ?>" method="post">
                <?php foreach ($soal as $s) : ?>
                    <div class="card" id="soal<?= $i; ?>">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h5 class="text-uppercase">soal no. <button class="d-inline-block text-light bg-primary" disabled><?= $s['no_soal_id']; ?></button>
                                        </h5>
                                    </div>
                                    <div class="col-sm-7">

                                    </div>
                                    <div class="col-sm-3">
                                        <a class="openbtn ml-5 text-light" onclick="openNav()">&#9776; Daftar Soal</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5><?= $s['soal_text']; ?></h5>
                                    <?php if ($s['soal_gambar'] != 'http://localhost/rumahrahil_restful/restserver_rumahrahil/assets/img/default.png') : ?>
                                        <img src="<?= $s['soal_gambar']; ?>" class="rounded float-left" width="300px">
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1<?= $s['id_soal_latihan_sd']; ?>" name="customRadio<?= $i - 1; ?>" class="custom-control-input" value="A">
                                        <label class="custom-control-label" for="customRadio1<?= $s['id_soal_latihan_sd']; ?>"><?= $s['option_a']; ?></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2<?= $s['id_soal_latihan_sd']; ?>" name="customRadio<?= $i - 1; ?>" class="custom-control-input" value="B">
                                        <label class="custom-control-label" for="customRadio2<?= $s['id_soal_latihan_sd']; ?>"><?= $s['option_b']; ?></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3<?= $s['id_soal_latihan_sd']; ?>" name="customRadio<?= $i - 1; ?>" class="custom-control-input" value="C">
                                        <label class="custom-control-label" for="customRadio3<?= $s['id_soal_latihan_sd']; ?>"><?= $s['option_c']; ?></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio4<?= $s['id_soal_latihan_sd']; ?>" name="customRadio<?= $i - 1; ?>" class="custom-control-input" value="D">
                                        <label class="custom-control-label" for="customRadio4<?= $s['id_soal_latihan_sd']; ?>"><?= $s['option_d']; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="m-4">
                        <div class="container-fluid">
                            <div class="row text-center m-3">
                                <div class="col-sm-4">
                                    <a class="btn btn-primary" href="#" role="button" id="btnback<?= $i; ?>"><i class="far fa-arrow-alt-circle-left mr-1"></i>Nomor Sebelumnya</a>
                                </div>
                                <div class="col-sm-4">
                                    <a class="btn btn-warning" href="#" role="button">Ragu-Ragu<i class="fas fa-check ml-1"></i></a>

                                </div>
                                <div class="col-sm-4">
                                    <a class="btn btn-primary" href="#" role="button" id="btnnext<?= $i; ?>">Nomor Berikutnya<i class="far fa-arrow-alt-circle-right ml-1"></i></a>
                                    <button class="btn btn-primary" type="submit" id="btnsubmit<?= $i; ?>">Akhiri Test<i class="far fa-arrow-alt-circle-right ml-1"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </form>
            <input type="hidden" id="counter" value="<?= $i - 1; ?>">
        </div>
    </section>
    <section>
        <div class="footer-copyright text-light text-center py-3 bg-primary fixed-bottom">
            <span>copyright &copy; <script>
                    document.write(new Date().getFullYear());
                </script> - developed by
                <b><a>Private Coding</a></b>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "500px";
            document.getElementById("main").style.marginRight = "500px";
        }

        /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginRight = "0";
        }

        $(document).ready(function() {
            let counter = $('#counter').val();
            console.log(counter);
            $('#soal1').show();
            $('#btnback1').hide();
            for (let i = 2; i <= counter; i++) {
                $(`#soal${i}`).hide();
            }
            //script button next
            for (let hal = 1; hal <= counter; hal++) {
                $(`#btnnext${hal}`).on('click', function() {
                    for (let i = 1; i <= counter; i++) {
                        $(`#soal${i}`).hide();
                        if (i == hal + 1) {
                            $(`#soal${hal+1}`).show();
                        }
                    }
                });
            }
            //script button back
            for (let hil = counter; hil >= 1; hil--) {
                $(`#btnback${hil}`).on('click', function() {
                    for (let a = counter; a >= 1; a--) {
                        $(`#soal${a}`).hide();
                        if (a == hil - 1) {
                            $(`#soal${hil-1}`).show();
                        }
                    }
                });
            }
            for (let ind = 1; ind <= counter; ind++) {
                if (ind == counter) {
                    console.log(ind);
                    $(`#btnsubmit${ind}`).show();
                    $(`#btnnext${ind}`).hide();
                } else {
                    $(`#btnsubmit${ind}`).hide();
                }
            }
        });
    </script>
</body>

</html>