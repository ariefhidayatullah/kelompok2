<script src="<?= BASEURL; ?>/js/autoNumeric.js"></script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Paket</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="#">Paket</a></li>
            <li class="breadcrumb-item active">Tambah Paket</li>
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
              <div class="card-header tambah">
                <h3 class="card-title">Tambah Paket</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
                </div>
              </div>
              
              <div class="card-body">
              <div class="notif" style="width: 50%; height: 10%; top: 0; left: 50%; position: absolute;">
                  <?php Flasher::flash(); ?>
                </div>
                <form action="<?= BASEURL; ?>/admin/tambahpaketlagi" method="POST">
                  <div class="form-group row">
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="nama_paket" placeholder="paket" name="nama_paket"  style=" width: 150%; " required="">
                      <br>
                      <input type="text" class="form-control" id="harga"  name="harga"  style=" width: 150%;  "  data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Harga Rupiah " required>
                    </div>
                  </div>
                <button type="submit" class="btn btn-block  btn-secondary" style="position: absolute; right: 20%; width: 25%; top:64%;" id="submit">TAMBAH PAKET</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
      
            </div>
            <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DAFTAR PAKET</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
                </div>
              </div>
               <div class="card-body">
                <div class="notif" style="width: 50%; height: 10%; top: 0; left: 50%; position: absolute;">
                  <?php Flasher::flash(); ?>
                </div>
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
               <tr role="row"><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10px;">No</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 194px;">Paket</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 194px;">Harga</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 219px;">Opsi</th></tr>
                </thead>
                 
               <tbody>
                    <?php foreach ($data['paket'] as $paket) :?>
                <tr>
                    <td><?= $paket['id_paket']; ?></td>
                    <td><?= $paket['nama_paket']; ?></td> 
                    <td><?= $paket['harga']; ?></td>
                    <td>
                    <a href="<?= BASEURL; ?>/admin/deletepaket/<?= $paket['id_paket']; ?>" class="badge badge-danger float-right ml-1">Hapus</a>
                     <button class="btn btn-dark btn-sm btn-u-paket" data-toggle="modal" data-target="#exampleModal2" value="<?= $paket['id_paket']; ?>">
                        update
                    </button>
                <!--     <a href="" class="badge badge-primary float-right tampilubah" data-id ="<?=$paket['id_paket'];  ?>"data-toggle="modal" data-target="#exampleModal2">Ubah</a> -->
                  </td>                  
                </tr>
                 <?php endforeach; ?>
                  </tbody>
              
            </div>
            <!-- /.card -->
           
            
          </div>
        </div>
      </div>
    </div>
  </div>
              
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Update paket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                            
  <!-- isi dari class modal -->
                                            
     <form action="<?= BASEURL; ?>/admin/editPaket/" method="POST">
      
    <!--   <div class="notif" style="width: 50%; height: 10%; top: 0; left: 50%; position: absolute;">
                  <?php Flasher::flash(); ?>
                </div>   -->
       <input type="text" class="form-control"  id="id_ubh" name="id_ubh" hidden>
     
       <input type="text"  id="nama_paket_ubh" name="nama_paket_ubh" class="form-control mt-20">
      <br>
       <input type="text" id="harga_ubh" name="harga_ubh" class="form-control"  data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Harga Rupiah " required>

      
       <div class="modal-footer">
        <button type="submit" name="submit" id="submit" class="btn btn-secondary">update</button>

      </div>
      
    </form>
   
    </div>
    </div>
  </div>
</div>


                  


 <script> 
    $(document).ready(function(){
      $('#harga').autoNumeric('init');
      <?php foreach ($data['paket'] as $paket) :?>
      $('.btn-u-paket').click(function(){
         $('#harga_ubh').autoNumeric('init');
        // console.log($(this).val())
        if ("<?= $paket['id_paket']; ?>" === $(this).val()) {
          $('#id_ubh').val("<?= $paket['id_paket']; ?>");
        $('#nama_paket_ubh').val("<?= $paket['nama_paket']; ?>");    
        $('#harga_ubh').val("<?= $paket['harga']; ?>"); 
        }
      });
 
  <?php endforeach; ?>


});
   </script>