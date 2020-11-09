<div class="az-content az-content-dashboard">
    <div class="container">
        <div class="az-content-body">
            <div class="text-center mb-5">
                <div>
                    <h2 class="az-dashboard-title center">Daftar Siswa</h2>
                </div>
            </div><!-- az-dashboard-one-title -->
            <div class="row row-sm mg-b-20">
                <!-- <div class="col-lg-5 mg-t-20 mg-lg-t-0"> -->
                        <div class="col-md-3">
                            <div class="card card-dashboard-two mb-3">
                                <div class="col-md-4 mt-3" style="height: 365px;">
                                    <img src="<?= base_url('assets'); ?>/img/boy.png" class="card-img">
                                </div>
                                <div class="col-md-8 mt-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama</h5>
                                        <p class="card-text">Kelas</p>
                                    </div>
                                <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#detail">detail</a>
                                </div>
                            </div><!-- card -->
                        </div><!-- col -->
                        <div class="col-md-3">
                            <div class="card card-dashboard-two mb-3">
                                <div class="col-md-4 mt-3" style="height: 365px;">
                                    <img src="<?= base_url('assets'); ?>/img/boy.png" class="card-img">
                                </div>
                                <div class="col-md-8 mt-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama</h5>
                                        <p class="card-text">Kelas</p>
                                    </div>
                                <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#detail">detail</a>
                                </div>
                            </div><!-- card -->
                        </div><!-- col -->
                        <div class="col-md-3">
                            <div class="card card-dashboard-two mb-3">
                                <div class="col-md-4 mt-3" style="height: 365px;">
                                    <img src="<?= base_url('assets'); ?>/img/boy.png" class="card-img">
                                </div>
                                <div class="col-md-8 mt-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama</h5>
                                        <p class="card-text">Kelas</p>
                                    </div>
                                <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#detail">detail</a>
                                </div>
                            </div><!-- card -->
                        </div><!-- col -->
                        <div class="col-md-3">
                            <div class="card card-dashboard-two mb-3">
                                <div class="col-md-4 mt-3" style="height: 365px;">
                                    <img src="<?= base_url('assets'); ?>/img/boy.png" class="card-img">
                                </div>
                                <div class="col-md-8 mt-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama</h5>
                                        <p class="card-text">Kelas</p>
                                    </div>
                                <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#detail">detail</a>
                                </div>
                            </div><!-- card -->
                        </div><!-- col -->
               <!--  </div> -->
                <!--col -->
            </div>
            <!-- row -->
            <hr>
        </div><!-- az-content-body -->
    </div>
</div><!-- az-content -->

<!-- Modal detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets'); ?>/img/boy.png" class="img-fluid">
                            </div>

                            <div class="col-md-8">
                                <ul class="list-group">
                                  <li class="list-group-item">Nama : </li>
                                  <li class="list-group-item">Kelas : </li>
                                  <li class="list-group-item">Asal Sekolah : </li>
                                  <li class="list-group-item">Alamat : </li>
                                  <li class="list-group-item">Email : </li>
                                  <br>
                                    <ul class="list-group">
                                        <h3>Nilai : </h3>
                                        <li class="list-group-item">Paket 1 : </li>
                                        <li class="list-group-item">Paket 2 : </li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end Modal detail -->