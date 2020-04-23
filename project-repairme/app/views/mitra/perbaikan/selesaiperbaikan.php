<!-- daterange picker -->
<link rel="stylesheet" href="<?= BASEURL; ?>/panel-master/plugins/daterangepicker/daterangepicker.css">
<script src="<?= BASEURL; ?>/panel-master/plugins/moment/moment.min.js"></script>
<script src="<?= BASEURL; ?>/panel-master/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?= BASEURL; ?>/js/autoNumeric.js"></script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Perbaikan Selesai</h1>
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
      <div class="card card-dark">
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
            <thead>
              <tr>
                <th style="width: 13%">
                  Pelanggan
                </th>
                <th style="width: 13%">
                  Laptop
                </th>
                <th style="width: 13%;">
                  Kerusakan
                </th>
                <th style="width: 15%">
                  Harga
                </th>
                <th style="width: 15%;">
                  
                </th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($data['perbaikan']['perbaikan_laptop']); $i++):?>
              <?php if ($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == '7'):?>
              <tr>
                <td>
                  <a>
                    <?= $data['perbaikan']['pelanggan'][$i][0]['nama']; ?>
                  </a>
                </td>
                <td>
                  <ul class="list-inline">
                    <?= $data['perbaikan']['merk_laptop'][$i][0]['merk_laptop']; ?>
                    <?= $data['perbaikan']['tipe_laptop'][$i][0]['tipe_laptop']; ?>
                  </ul>
                </td>
                <td>
                  <ul class="list-inline">
                    <?= $data['perbaikan']['kerusakan_laptop'][$i][0]['kerusakan_laptop']; ?>,
                    <?= $data['perbaikan']['keterangan_lain'][$i]; ?>
                  </ul>
                </td>
                <td >
                  <ul class="list-inline">
                    <?= $data['perbaikan']['harga'][$i]; ?>
                  </ul>
                </td>
                <td>
                  <ul class="list-inline">
                    <button class="btn btn-success btn-sm selesai-laptop" value="<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan']; ?>">
                      Telah Dijemput
                    </button>
                  </ul>
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

    <!-- untuk perbaikan hp -->

          <!-- Default box -->
      <div class="card card-dark">
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
            <thead>
              <tr>
                <th style="width: 13%">
                  Pelanggan
                </th>
                <th style="width: 13%">
                  Handphone
                </th>
                <th style="width: 13%;">
                  Kerusakan
                </th>
                <th style="width: 15%">
                  Harga
                </th>
                <th style="width: 15%;">
                  
                </th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($data['perbaikan2']['perbaikan_hp']); $i++):?>
              <?php if ($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == '7'):?>
              <tr>
                <td>
                  <a>
                    <?= $data['perbaikan2']['pelanggan'][$i][0]['nama']; ?>
                  </a>
                </td>
                <td>
                  <ul class="list-inline">
                    <?= $data['perbaikan2']['merk_hp'][$i][0]['merk_hp']; ?>
                    <?= $data['perbaikan2']['tipe_hp'][$i][0]['tipe_hp']; ?>
                  </ul>
                </td>
                <td>
                  <ul class="list-inline">
                    <?= $data['perbaikan2']['kerusakan_hp'][$i][0]['kerusakan_hp']; ?>,
                    <?= $data['perbaikan2']['keterangan_lain'][$i]; ?>
                  </ul>
                </td>
                <td >
                  <ul class="list-inline">
                    <?= $data['perbaikan2']['harga'][$i]; ?>
                  </ul>
                </td>
                 <td>
                  <ul class="list-inline">
                    <button class="btn btn-success btn-sm selesai-hp" value="<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan']; ?>">
                      Telah Dijemput
                    </button>
                  </ul>
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
      <div>
        <form action="<?= BASEURL; ?>/mitra/laptopdijemput" method="POST" id="laptopdijemput">
          <input type="text" name="id_laptopdijemput" id="id_laptopdijemput" hidden>
        </form>
        <form action="<?= BASEURL; ?>/mitra/hpdijemput" method="POST" id="hpdijemput">
          <input type="text" name="id_hpdijemput" id="id_hpdijemput" hidden>
        </form>
      </div>


      <script>
        $(document).ready(function(){
          var selesai = false;
          $('.selesai-laptop').click(function(){
            konfirmasi();
            if (selesai == true) {
              $('#id_laptopdijemput').val($(this).val());
              $('#laptopdijemput').submit();
            }else{
              alert('Silahkan Tunggu barang sampai dijemput');
            }

          });

          $('.selesai-hp').click(function(){
           // alert($(this).val());
            konfirmasi();
            if (selesai == true) {
              $('#id_hpdijemput').val($(this).val());
              $('#hpdijemput').submit();
            }else{
              alert('Silahkan Tunggu barang sampai dijemput');
            }            
          });

          function konfirmasi(){
            if (confirm('Apakah Barang Benar-Benar Telah Dijemput?')) {
              selesai = true;
            }else{
              selesai = false;
            }
          }
        })
      </script>