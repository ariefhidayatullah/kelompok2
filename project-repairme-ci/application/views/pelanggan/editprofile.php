  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Profile Pelanggan</a></li>
              <li class="breadcrumb-item active">Ubah Profil</li>
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
                <h3 class="card-title">Ubah Profil</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <form action="<?= BASEURL; ?>/pelanggan/editProfilePel" method="POST">
                <input type="text" id="id_pelanggan" name="id_pelanggan" value="<?= $_SESSION['login']['data']['id_pelanggan'];?>" hidden>
                <tr>
                  <td>
                    <label for="nama">Nama:</label>
                <input type="text" class="form-control" value="<?= $_SESSION['login']['data']['nama']; ?>" name="nama" id="nama">
                </td>
                 <td>
                  <label for="email ">Email:</label>
                <input type="email" class="form-control" value="<?= $_SESSION['login']['data']['email']; ?>" name="email" id="email">
                </td>
                 <td>
                 <label for="no_tlp">No Telfon:</label>
                <input type="text" class="form-control" value="<?= $_SESSION['login']['data']['no_tlp']; ?>" name="no_tlp" id="no_tlp">
                </td>
                <td>
                 <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" value="<?= $_SESSION['login']['data']['alamat']; ?>" name="alamat" id="alamat">
                </td>
                </tr>
                <tr>
                  <td>
                    <br>
                <button type="submit" class="btn btn-dark">Ubah</button>
                </td>
                </tr>
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
 <script>
   $('#nama').on('keyup',function(){
      var regex = /^[a-z A-Z]+$/;
      if (regex.test(this.value) !== true) {
      this.value = this.value.replace(/[^a-zA-Z]+/, '');
      }else if ($(this).val().length < 5) {
      $('.nama').text('Anda Yakin Nama Anda Terdiri Dari '+ $(this).val().length + ' Huruf?');
      }else{
      $('.nama').text('');
      }
      if ($(this).val().length == 0) {
      $('.nama').text('Nama Harus Di isi!');
      }

      var email;
        $('#email').on('keyup', function(){


        var valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!this.value.match(valid)){
        $('.email').text('Isi Email dengan Benar!');
        email = false;
        }
        <?php foreach ($data['pelanggan'] as $pelanggan): ?>
        else if($(this).val() == "<?= $pelanggan['email']; ?>"){
        $('.email').text('Email Sudah Terdaftar!');
        email = false;
        }
        <?php endforeach; ?>
        else{
        $('.email').text('');
        email = true;
        }
        });

        $('#no_tlp').on('keyup', function(){
        var regex = /^[0-9]+$/;
        if (regex.test(this.value) !== true) {
        this.value = this.value.replace(/[^0-9]+/, '');
        }else{
        $('.no_tlp').text('');
        }
        });

        

 </script>