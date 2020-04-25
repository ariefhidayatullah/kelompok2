<script src="<?= BASEURL; ?>/js/autoNumeric.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perbaikan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Perbaikan</a></li>
              <li class="breadcrumb-item active">Pengajuan Perbaikan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <?php Flasher::flash(); ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Laptop</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
            <?php for ($i=0; $i < count($data['perbaikan']['perbaikan_laptop']); $i++):?>
            <?php if ($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == 1):?>
              <thead>
                  <tr>
                      <th style="width: 20%">
                          Nama Pelanggan
                      </th>
                      <th style="width: 15%">
                          Merk Laptop
                      </th>
                      <th style="width: 15%">
                          Tipe Laptop
                      </th>
                      <th style="width: 15%;">
                          Kerusakan
                      </th>
                      <th style="width: 15%;">
                          Keterangan Lain
                      </th>
                      <th style="width: 15%">

                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                          <a>
                              <?= $data['perbaikan']['pelanggan'][$i][0]['nama']; ?>
                          </a>                   
                      </td>
                      <td>
                          <ul class="list-inline">
                              <?= $data['perbaikan']['merk_laptop'][$i][0]['merk_laptop']; ?>
                          </ul>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <?= $data['perbaikan']['tipe_laptop'][$i][0]['tipe_laptop']; ?>
                          </ul>
                      </td>
                      <td >
                         <ul class="list-inline">
                              <?= $data['perbaikan']['kerusakan_laptop'][$i][0]['kerusakan_laptop']; ?>
                          </ul>
                      </td>
                      <td >
                         <ul class="list-inline">
                              <?= $data['perbaikan']['keterangan_lain'][$i]; ?>
                          </ul>
                      </td>
                      <td class="project-actions text-right">
                          <button class="btn btn-success btn-sm t-terimalaptop" data-toggle="modal" data-target="#terimaLaptop" value="<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan']; ?>">
                              Terima 
                          </button>
                          <button class="btn btn-danger btn-sm t-tolaklaptop" data-toggle="modal" data-target="#tolakLaptop" value="<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan']; ?>">
                              Tolak
                          </button>
                      </td>
                  </tr>
              </tbody>
            <?php endif; ?>
            <?php endfor; ?>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <br><br>
    <!-- untuk hp -->

          <div class="card">
        <div class="card-header">
          <h3 class="card-title">Handphone</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
            <?php for ($i=0; $i < count($data['perbaikan2']['perbaikan_hp']); $i++):?>
              <?php if ($data['perbaikan2']['status'][$i][0]['id_status_perbaikan'] == 1):?>
                       <thead>
                  <tr>
                      <th style="width: 20%">
                          Nama Pelanggan
                      </th>
                      <th style="width: 15%">
                          Merk hp
                      </th>
                      <th style="width: 15%">
                          Tipe hp
                      </th>
                      <th style="width: 15%;">
                          Kerusakan
                      </th>
                      <th style="width: 15%;">
                          Keterangan Lain
                      </th>
                      <th style="width: 15%">

                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                          <a>
                              <?= $data['perbaikan2']['pelanggan'][$i][0]['nama']; ?>
                          </a>                   
                      </td>
                      <td>
                          <ul class="list-inline">
                              <?= $data['perbaikan2']['merk_hp'][$i][0]['merk_hp']; ?>
                          </ul>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <?= $data['perbaikan2']['tipe_hp'][$i][0]['tipe_hp']; ?>
                          </ul>
                      </td>
                      <td >
                         <ul class="list-inline">
                              <?= $data['perbaikan2']['kerusakan_hp'][$i][0]['kerusakan_hp']; ?>
                          </ul>
                      </td>
                      <td >
                         <ul class="list-inline">
                              <?= $data['perbaikan2']['keterangan_lain'][$i]; ?>
                          </ul>
                      </td>
                      <td class="project-actions text-right">
                          <button class="btn btn-success btn-sm t-terimahp" data-toggle="modal" data-target="#terimahp" value="<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan']; ?>">
                              Terima 
                          </button>
                          <button class="btn btn-danger btn-sm t-tolakhp" data-toggle="modal" data-target="#tolakHp" value="<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan']; ?>">
                              Tolak
                          </button>
                      </td>
                  </tr>
              </tbody>
              <?php endif; ?>
            <?php endfor; ?>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper-->

<!-- penolakan -->
<!-- Modal -->
<div class="modal fade" id="tolakLaptop" tabindex="-1" role="dialog" aria-labelledby="tolakLaptopLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tolakLaptopLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="form-group">
                <form action="<?= BASEURL; ?>/admin/tolakperbaikanlaptop" method="POST">
                   <input type="text" id="id_perbaikan_laptopx" name="id_perbaikan_laptopx" hidden>
                <select class="form-control" id="alasanPenolakanLaptop">
                  <option selected="true" disabled="">Alasan Penolakan</option>
                  <option>Teknisi Belum Ready</option>
                  <option>Permintaan Masih Penuh</option>
                  <option>Permintaan Tidak Benar</option>
                  <option style="color: red;" value="false">Alasan Lain</option>
                </select>
              </div>
            <div class="form-group mt-20">
              <input class="form-control" id="ketpenolakanlaptop" name="ketpenolakanlaptop" type="text" placeholder="Alasan Anda">
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Tolak Permintaan</button>
        </form>
      </div>
      </div>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="tolakHp" tabindex="-1" role="dialog" aria-labelledby="tolakHpLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tolakHpLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
                <form action="<?= BASEURL; ?>/admin/tolakperbaikanhp" method="POST">
                  <input type="text" id="id_perbaikan_hpx" name="id_perbaikan_hpx" hidden>
                <select class="form-control" id="alasanPenolakanHp">
                 <option selected="true" disabled="">Alasan Penolakan</option>
                  <option>Teknisi Belum Ready</option>
                  <option>Permintaan Masih Penuh</option>
                  <option>Permintaan Tidak Benar</option>
                  <option style="color: red;" value="false">Alasan Lain</option>
                </select>

              </div>
            <div class="form-group mt-20">
              <input class="form-control" id="ketpenolakanhp" name="ketpenolakanhp" type="text" placeholder="Alasan Anda">
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Tolak Permintaan</button>
         </form>
      </div>
    </div>
  </div>
</div>


<!-- untuk penerimaan -->

<!-- Modal -->
<div class="modal fade" id="terimaLaptop" tabindex="-1" role="dialog" aria-labelledby="terimaLaptopLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="terimaLaptopLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mt-20">
          <form action="<?= BASEURL; ?>/admin/terimaperbaikanlaptop" method="POST">
            <input type="text" id="id_perbaikan_laptop" name="id_perbaikan_laptop" hidden>
            <input type="text" id="voucherlaptop" name="voucherlaptop" hidden>
              <input class="form-control" id="hargalaptop" name="hargalaptop" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Harga Rupiah">
            </div>
            <p class="hargalaptop" style="color: red;"></p>
            <div class="form-group mt-20">
              <input class="form-control" id="ketlaptoplain" name="ketlaptoplain" type="text" placeholder="Keterangan Lain">
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Terima Permintaan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- terima hp -->


<!-- Modal -->
<div class="modal fade" id="terimahp" tabindex="-1" role="dialog" aria-labelledby="terimahpLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="terimahpLabel">Menerima Permintaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mt-20">
          <form action="<?= BASEURL; ?>/mitra/terimaperbaikanhp" method="POST">
            <input type="text" id="id_perbaikan_hp" name="id_perbaikan_hp" hidden>
            <input type="text" id="voucherhp" name="voucherhp" hidden>
              <input class="form-control" id="hargahp" name="hargahp" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Harga Rupiah">
            </div>
            <p class="hargahp" style="color: red;"></p>
            <div class="form-group mt-20">
              <input class="form-control" id="kethplain" name="kethplain" type="text" placeholder="Keterangan Lain">
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Terima Permintaan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){

    //membuat voucher

    function voucher(){
      var result = '';
    var character = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var characterLength = character.length;
    for (var i = 0; i < 7; i++) {
      result += character.charAt(Math.floor(Math.random() * characterLength));
    }
    return result;
    }

    //penolakan laptop

    $('#ketpenolakanlaptop').hide();
    $('#alasanPenolakanLaptop').change(function() {
      $('#ketpenolakanlaptop').val('');
      if ($(this).val() == 'false') {
        $('#ketpenolakanlaptop').show();
      }else{
        $('#ketpenolakanlaptop').hide();
        $('#ketpenolakanlaptop').val($(this).val());
      }
    });
    $('.t-tolaklaptop').click(function(){
      $('#id_perbaikan_laptopx').val($(this).val());
    });

    // penolakan hp

     $('#ketpenolakanhp').hide();
    $('#alasanPenolakanHp').change(function() {
      if ($(this).val() == 'false') {
        $('#ketpenolakanhp').show();
      }else{
        $('#ketpenolakanhp').hide();
        $('#ketpenolakanhp').val($(this).val());
      }
    });
    $('.t-tolakhp').click(function(){
      $('#id_perbaikan_hpx').val($(this).val());
    });
    //penerimaan laptop

    $('.t-terimalaptop').click(function(){
      $('#id_perbaikan_laptop').val($(this).val());
      var vlaptop = voucher();
      $('#terimaLaptopLabel').text("Kode Voucher : " + vlaptop);
      $('#voucherlaptop').val(vlaptop);
    });

    //penerimaan hp

    $('.t-terimahp').click(function(){
      $('#id_perbaikan_hp').val($(this).val());
      var vhp = voucher();
      $('#terimahpLabel').text("Kode Voucher : " + vhp);
      $('#voucherhp').val(vhp);
    });


  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#hargalaptop').autoNumeric('init');
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#hargahp').autoNumeric('init');
    });
</script>

