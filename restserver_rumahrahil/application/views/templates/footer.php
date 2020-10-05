<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin Logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <a href="<?= base_url('Login/logout'); ?>" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>

</div>
<!---Container Fluid-->
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>copyright &copy; <script>
                    document.write(new Date().getFullYear());
                </script> - developed by
                <b><a>Private Coding</a></b>
            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('asset/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('asset/'); ?>js/ruang-admin.min.js"></script>

<script type="text/javascript">
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });



    function actionTemaSD() {
        let a = document.getElementById('sortKelas').value;
        temaSd(a);
    }

    function actionSubTemaSD() {
        let a = document.getElementById('sortTema').value;
        subtemaSd(a);
    }

    function actionPaketSD() {
        let a = document.getElementById('sortSubtema').value;
        paketSd(a);
    }

    function actionKunciSD() {
        let a = document.getElementById('sortPaketSd').value;
        kunciSd(a);
    }

    function actionJawabanSD() {
        let a = document.getElementById('sortJawabanSd').value;
        jawabanSd(a);
    }

    function inputKunciSDForSoal() {
        let a = document.getElementById('nama_paket_sd').value;
        pilihKunciSdForSoal(a);
    }

    function inputKunciSDForJawaban() {
        let a = document.getElementById('nama_paket_sd').value;
        pilihKunciSdForJawaban(a);
    }

    function actionSoalSD() {
        let a = document.getElementById('sortSoalSd').value;
        sortSoalSD(a);
    }

    function inputNoSoalSdForSoal() {
        let a = document.getElementById('no_soal_sd').value;
        let b = document.getElementById('nama_paket_sd').value;
        pilihJawabanBenarForSoal(a, b);
    }

    function inputNoSoalSdForJawaban() {
        let a = document.getElementById('no_soal_sd').value;
        let b = document.getElementById('nama_paket_sd').value;
        pilihSoalGambarForJawaban(a, b);
        pilihSoalTextForJawaban(a, b);
    }

    function actionSoal() {
        let a = document.getElementById('sortPaket').value;
        soal(a);
    }

    function actionMapel() {
        let a = document.getElementById('sortKelas').value;
        mapel(a);
    }

    function actionBab() {
        let a = document.getElementById('sortMapel').value;
        bab(a);
    }

    function actionKunci() {
        let a = document.getElementById('sortPaket').value;
        kunci(a);

    }

    function actionPaket() {
        let a = document.getElementById('sortBab').value;
        paket(a);

    }

    function actionJawaban() {
        let a = document.getElementById('sortSoal').value;
        jawaban(a);

    }

    function temaSd(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabeltema").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/tema/tableTema/'); ?>" + a, true);
        xhttp.send();
    }

    function subtemaSd(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabelsubtema").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/subtema/tableSubtema/'); ?>" + a, true);
        xhttp.send();
    }

    function paketSd(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabelpaketsd").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/PaketSoalSd/tablePaketsd/'); ?>" + a, true);
        xhttp.send();
    }

    function kunciSd(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabelKunciSd").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/KunciJawabanSD/tableKuncisd/'); ?>" + a, true);
        xhttp.send();
    }

    function soalSd(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabelSoalSd").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/SoalSD/tableSoalsd/'); ?>" + a, true);
        xhttp.send();
    }

    function jawabanSd(a) {

        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabelJawabanSd").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/tableJawabansd/'); ?>" + a, true);
        xhttp.send();
    }

    function pilihKunciSdForSoal(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("no_soal_sd").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/SoalSd/selectNoSoal/'); ?>" + a, true);
        xhttp.send();
    }

    function pilihKunciSdForJawaban(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("no_soal_sd").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectNoSoal/'); ?>" + a, true);
        xhttp.send();
    }

    function pilihJawabanBenarForSoal(a, b) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("jawaban_benar").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/SoalSd/selectJawabanBenar/'); ?>" + a + "/" + b, true);
        xhttp.send();
    }

    function pilihSoalTextForJawaban(a, b) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("soal_text").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectSoal/'); ?>" + a + "/" + b, true);
        xhttp.send();

    }

    function pilihSoalGambarForJawaban(a, b) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("soal_gambar").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectSoalGambar/'); ?>" + a + "/" + b, true);
        xhttp.send();

    }


    function sortSoalSD(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabelSoalSd").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('Sd_Controllers/SoalSd/tableSoalsd/'); ?>" + a, true);
        xhttp.send();

    }

    function mapel(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabelmapel").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('mapel/tableMapel/'); ?>" + a, true);
        xhttp.send();
    }

    function bab(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabelbab").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('bab/tableBab/'); ?>" + a, true);
        xhttp.send();
    }

    function soal(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabelsoal").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('soal/tableSoal/'); ?>" + a, true);
        xhttp.send();
    }

    function kunci(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabelkunci").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('kunci/tableKunci/'); ?>" + a, true);
        xhttp.send();
    }

    function paket(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabelpaket").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('paket/tablePaket/'); ?>" + a, true);
        xhttp.send();
    }

    function jawaban(a) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tabeljawaban").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "<?= base_url('jawaban/tableJawaban/'); ?>" + a, true);
        xhttp.send();
    }
    <?php foreach ($soal as $s) : ?>

        function inputUpdateKunciSD<?= $s['id_soal_latihan_sd']; ?>() {
            let a = document.getElementById('update_nama_paket_sd_<?= $s['id_soal_latihan_sd']; ?>').value;
            updatePilihKunciSd<?= $s['id_soal_latihan_sd']; ?>(a);
        }

        function inputUpdateNoSoalSd<?= $s['id_soal_latihan_sd']; ?>() {
            let a = document.getElementById('update_no_soal_sd_<?= $s['id_soal_latihan_sd']; ?>').value;
            let b = document.getElementById('update_nama_paket_sd_<?= $s['id_soal_latihan_sd']; ?>').value;
            updatePilihJawabanBenar<?= $s['id_soal_latihan_sd']; ?>(a, b);
        }

        function updatePilihKunciSd<?= $s['id_soal_latihan_sd']; ?>(a) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("update_no_soal_sd_<?= $s['id_soal_latihan_sd']; ?>").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/SoalSd/selectNoSoal/'); ?>" + a, true);
            xhttp.send();
        }

        function updatePilihJawabanBenar<?= $s['id_soal_latihan_sd']; ?>(a, b) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("update_jawaban_benar_<?= $s['id_soal_latihan_sd']; ?>").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/SoalSd/selectJawabanBenar/'); ?>" + a + "/" + b, true);
            xhttp.send();
        }
    <?php endforeach; ?>
    <?php foreach ($jawaban as $j) : ?>

        function inputKunciSDForJawaban<?= $j['id_jawaban_latihan_sd']; ?>() {
            let a = document.getElementById('update_nama_paket_sd').value;
            pilihKunciSdForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a);
        }

        function inputNoSoalSdForJawaban<?= $j['id_jawaban_latihan_sd']; ?>() {
            let a = document.getElementById('update_no_soal_sd').value;
            let b = document.getElementById('update_nama_paket_sd').value;
            pilihSoalGambarForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a, b);
            pilihSoalTextForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a, b);
        }

        function pilihKunciSdForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("update_no_soal_sd").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectNoSoal/'); ?>" + a, true);
            xhttp.send();
        }

        function pilihSoalTextForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a, b) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("update_soal_text").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectSoal/'); ?>" + a + "/" + b, true);
            xhttp.send();

        }

        function pilihSoalGambarForJawaban<?= $j['id_jawaban_latihan_sd']; ?>(a, b) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("update_soal_gambar").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "<?= base_url('Sd_Controllers/JawabanSd/selectSoalGambar/'); ?>" + a + "/" + b, true);
            xhttp.send();

        }
    <?php endforeach; ?>
</script>

</body>

</html>