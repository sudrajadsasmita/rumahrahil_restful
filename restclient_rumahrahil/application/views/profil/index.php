    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Profil</h2>
                    </div>
                </div><!-- az-dashboard-one-title -->
                <div class="row row-sm mg-b-20">
                    <div class="col-lg-7 ht-lg-90p">
                        <div class="card card-dashboard-one ">
                            <div id="card" class="card mb-3" style="max-width: 930px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4" style="height: 365px;">
                                        <img src="<?= base_url('assets'); ?>/img/boy.png" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $user['nama']; ?></h5>
                                            <h5 class="card-title"><?= $user['asal_sekolah']; ?></h5>
                                            <h5 class="card-title"><?= $user['email']; ?></h5>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#detail">detail</a>
                                    <a href="" class="btn btn-outline-success" data-toggle="modal" data-target="#Edit">Edit Profile</a>
                                </div>                                                                
                            </div>
                        </div><!-- card -->
                    </div><!-- col -->
                    <div class="col-lg-5 mg-t-20 mg-lg-t-0">
                        <div class="row row-sm">
                            <!-- Button trigger modal -->

<!-- Modal detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Profil</h5>
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
                                  <li class="list-group-item">Nama : <?= $user['nama']; ?> </li>
                                  <li class="list-group-item">Kelas : <?= $user['kelas_id']; ?> </li>
                                  <li class="list-group-item">Asal Sekolah : <?= $user['asal_sekolah']; ?> </li>
                                  <li class="list-group-item">Alamat : <?= $user['alamat']; ?> </li>
                                  <li class="list-group-item">Email : <?= $user['email']; ?></li>
                                  
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


                            
                        </div><!-- row -->
                    </div>
                    <!--col -->
                </div><!-- row -->
            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->

    
