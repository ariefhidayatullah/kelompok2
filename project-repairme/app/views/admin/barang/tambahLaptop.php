<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Daftar Laptop Baru</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">admin</a></li>
            <li class="breadcrumb-item"><a href="#">Barang</a></li>
            <li class="breadcrumb-item active">Tambah Daftar Laptop Baru</li>
          </ol>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Daftar Laptop</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
              </div>
            </div>
            
            <div class="card-body">
              <div class="row">
              <div class="col-sm-12">
              <div class="notif">
                <?php Flasher::flash(); ?>
              </div>
              </div>
              </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-6 offset-sm-1 mt-3">
                    <select class="form-control select2">
                      <option selected="selected">Merk</option>
                      <?php foreach ($data['merk'] as $merk):?>
                      <option value="<?= $merk['id_merk_laptop']; ?>"><?= $merk['merk_laptop']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-4 mt-3" >
                    <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#exampleModal2">TAMBAH MERK</button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 offset-sm-1 mt-3">
                    <form action="<?= BASEURL; ?>/admin/tambahTipeLaptop" method="POST" id="formKat">
                      <input type="text" name="tipelaptop" class="form-control" id="tipelaptop" placeholder="Tipe Laptop Baru">
                    </div>
                    <div class="col-sm-4 mt-3">
                      <button type="submit" class="btn btn-block btn-success" id="submit">TAMBAH BARANG</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- /.card-body -->
              
              <input type="text" id="merklaptop" name="merklaptop" hidden>
            </form>
          </div>
          <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  
                </div><div class="col-sm-12 col-md-6">
                  
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 text-center">
                  <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th>Tipe Laptop</th>
                <th>Merk Laptop</th>
                <th>Ubah Data</th>
                <th>Hapus Data</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($data['tipe'] as $tipe):?>
                <tr role="row" class="odd">
                  <td><?= $tipe['tipe_laptop']; ?></td>
                  <td><?= $tipe['merk_laptop']; ?></td>
                  <td><button class="btn btn-success btn-sm btn-u-ubahlap" data-toggle="modal" data-target="#modalubahlaptop" value="<?= $tipe['tipe_laptop']; ?>">
                  update
                  </button></td>
                  <td><a href="<?= BASEURL; ?>/admin/deletelaptop/<?= $tipe['id_tipe_laptop'];?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
            <tfoot>
            
            </tfoot>
          </table></div></div>
        </div>
        <!-- /.card -->
      </div>
      
      <!-- end card body -->
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
$(document).ready(function(){
$('.select2').change(function(){
var value = $(this).val();
$('#merklaptop').attr('value',parseInt(value));
});
$('#submit').click(function(){
$('#formKat').submit();
});
});
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Tambah Merk Laptop Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <!-- isi dari class modal -->
        
        <form action="<?=BASEURL;?>/admin/tambahMerkLaptop" method="POST" id="formmodmerk" data-parsley-validate="">
          <label for="merk">Merk Laptop Baru</label>
          <input id="merk_laptop" type="text" name="merk_laptop" data-parsley-trigger="change"  placeholder="Isi Dengan Merk Laptop Baru" autocomplete="off" class="form-control">
          <br><br>
          <button type="submit" name="submit1" id="submit1" class="btn btn-secondary">Tambah</button>
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modalubahlaptop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Tipe Laptop</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <!-- isi dari class modal -->
        
        <form action="<?= BASEURL; ?>/admin/edittipeLaptop" method="POST">
          <input type="text" class="form-control"  id="tipe_lp_lm" name="tipe_lp_lm" hidden>
          
          <input type="text"  id="tipelaptop_ubh" name="tipelaptop_ubh" class="form-control mt-20">
          
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
$('.btn-u-ubahlap').click(function(){
$('#tipelaptop_ubh').val($(this).val());
$('#tipe_lp_lm').val($(this).val());
});
});
</script>