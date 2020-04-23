<script>
  $(document).ready(function(){
     $("[href='<?= BASEURL; ?>/pelanggan/profile'").addClass('active');
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
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= BASEURL; ?>/panel-master/dist/img/user1.png"
                       alt="User profile picture">
                </div>
                <?php foreach ($data['pelanggan'] as $pelanggan ) :?>
                <h3 class="profile-username text-center"><?= $pelanggan ['nama'] ?></p></h3>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?= $pelanggan ['email'] ?></a>
                  </li>
                   <li class="list-group-item">
                    <b>No Telepon</b> <a class="float-right"><?= $pelanggan ['no_tlp'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right"><?= $pelanggan ['alamat'] ?></a>
                  </li>
                </ul>
              <?php endforeach; ?>

                <a href="#" class="btn btn-primary btn-block"><b>Biodata Pelanggan</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
    <!-- /.content -->
  </div>
</div>
</div>
</section>
  <!-- /.content-wrapper -->

    <!-- end of content -->