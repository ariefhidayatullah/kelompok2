<script>
  $(document).ready(function(){
     // $("").addClass('active');
     $("[href='<?= BASEURL; ?>/mitra/profile'").addClass('active');
  });
</script>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-dark card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-box"
                       src="<?= BASEURL; ?>/img/mitra/<?= $_SESSION['login']['data']['foto_usaha']; ?>"
                       alt="User profile picture">
                </div>
                <?php foreach ($data['mitra'] as $mitra):?>
                <h3 class="profile-username text-center"><?= strtoupper($_SESSION['login']['data']['nama_usaha']); ?></h3>
                  
                <p class="text-muted text-center text-sm"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nama Mitra</b> <a class="float-right"><?= $mitra ['nama'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>E-mail</b> <a class="float-right"><?= $mitra ['email'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>No Telfon</b> <a class="float-right"><?= $mitra ['no_tlp'] ?></a>
                  </li>
                <input type="text" id="id_mitra1" hidden>
                </ul>
                <?php endforeach; ?>
               
                  <a href="<?= BASEURL; ?>/home/paket" class="btn btn-info btn-blmverifikasi"><b>Verifikasi</b></a>
           

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
<!-- <script>
  $(document).ready(function(){
    $('.btn-verifikasi').hide();


  });
</script> -->
            <!-- About Me Box -->
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Tentang Mitra</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Deskripsi</strong>
                 <?php foreach ($data['mitra'] as $mitra):?>
                <p class="text-muted">
               
                  <?= $mitra['deskripsi']; ?>

                 <a class="btn btn-dark" href="<?= BASEURL; ?>/mitra/deskripsi" role="button">Update Deskripsi</a>
                 
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Lokasi Usaha</strong>

                <p class="text-muted">   <?= $mitra['alamat']; ?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Jenis Perbaikan</strong>

                <p class="text-muted">
                     <?= $mitra['jenis']; ?>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i>Rating</strong>
                  <img style="vertical-align: middle;"src="http://localhost/Kelompok-1/project-repairme/public/img/images/star.png" height="20px" width="20px"  />
                <p class="text-muted"><?= $mitra['rating']; ?></p>
                <?php endforeach; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Pemberitahuan</h3>
              </div>
             
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                      </div>
                      <!-- /.user-block -->
                      <li>
                       Jika mitra masih belum terverifikasi, maka mitra tidak bisa memasang iklan di website.
                       Untuk verifikasi silahkan Klik Tombol "Belum Verifikasi".
                      </li>
                    </div>
                    <!-- /.post -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <!-- end of content -->
  