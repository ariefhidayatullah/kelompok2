<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>
<script src="<?= BASEURL; ?>/js/tableHTMLExport.js"></script>
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Laptop</h3>
          <br>
          <i class="fas fa-file-download" style="display: inline-block;"></i>
          <a href="#" id="unduhdata">Unduh Data</a>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects" id="tblaptop">
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
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($data['perbaikan']['perbaikan_laptop']); $i++):?>
              <?php if ($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == '8'):?>
              <tr>
                <td>
                  <a>
                    <?= $data['perbaikan']['mitra'][$i][0]['nama_usaha']; ?>
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Handphone</h3>
          <br>
          <i class="fas fa-file-download" style="display: inline-block;"></i>
          <a href="#" id="unduhdata2">Unduh Data</a>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects" id="tbhp">
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
 
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($data['perbaikan2']['perbaikan_hp']); $i++):?>
              <?php if ($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == '8'):?>
              <tr>
                <td>
                  <a>
                    <?= $data['perbaikan']['mitra'][$i][0]['nama_usaha']; ?>
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
        <form action="<?= BASEURL; ?>/mitra/hapusriwayatlaptop" method="POST" id="hapusriwayatlaptop">
          <input type="text" name="id_hapusriwayatlaptop" id="id_hapusriwayatlaptop" hidden>
        </form>
        <form action="<?= BASEURL; ?>/mitra/hapusriwayathp" method="POST" id="hapusriwayathp">
          <input type="text" name="id_hapusriwayathp" id="id_hapusriwayathp" hidden>
        </form>
      </div>


          <script>  
    $(document).ready(function(){
     $('#unduhdata').click(function(){
     $("#tblaptop").tableHTMLExport({type:'csv',filename:'dataperbaikanlaptop.csv'});
     });
     $('#unduhdata2').click(function(){
     $("#tbhp").tableHTMLExport({type:'csv',filename:'dataperbaikanhp.csv'});
     });  
    });
  </script>