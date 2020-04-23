  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>UPDATE PROFILE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Profile Mitra</a></li>
              <li class="breadcrumb-item active">Update Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Profile Mitra</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
              <?php Flasher::flash(); ?>
                <form action="<?= BASEURL; ?>/mitra/editDeskripsi" method="POST">
                <?php foreach ($data['mitra'] as $mitra):?>
                <input type="text" id="id_mitra" name="id_mitra" value="<?= $_SESSION['login']['data']['id_mitra'];?>" hidden>
                 <input type="text"  id="nama" name="nama"  class="form-control" style="width: 30%;" value="<?= $mitra['nama']; ?>" >
                 <br>
                 <input type="text"  class="form-control"  id="email" name="email" style="width: 30%;" value="<?= $mitra['email']; ?>" >
                 <br>
                 <input type="text"  class="form-control" id="alamat" name="alamat" style="width: 30%;" value="<?= $mitra['alamat']; ?>" >
                 <br>
                  <input type="text"  class="form-control" id="no_tlp" name="no_tlp" style="width: 30%;" value="<?= $mitra['no_tlp']; ?>" >
                 <br>
                  <input type="text"  class="form-control" id="deskripsi" name="deskripsi" style="width: 30%;" value="<?= $mitra['deskripsi']; ?>" >
                 <br>
               <?php endforeach; ?>
                <button type="submit" class="btn btn-dark">Kirim</button>
                </form>
                </div>
              
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- <?php foreach ($data['deskripsi'] as $result):?>
<script>
  $(document).ready(function(){
    //\ alert($result['id_mitra'])
    if (<?= $_SESSION['login']['data']['id_mitra'];?> == <?= $result['id_mitra']; ?>) {
      $('#formInsert').hide();
    }else{
      $('#formUpdate').hide();
    }
  });
</script> -->
<!-- <?php endforeach; ?> -->