<!-- daterange picker -->
<link rel="stylesheet" href="<?= BASEURL; ?>/panel-master/plugins/daterangepicker/daterangepicker.css">
<!-- InputMask -->
<script src="<?= BASEURL; ?>/panel-master/plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="<?= BASEURL; ?>/panel-master/plugins/daterangepicker/daterangepicker.js"></script>
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
            <li class="breadcrumb-item active">Perbaikan</li>
          </ol>
        </div>
      </div>
      </div><!-- /.container-fluid -->
      <?php Flasher::flash(); ?>
    </section>

    <div class="container-fluid">
      <!-- container fluid -->
    <div class="row">
      <div class="col-sm-4 ml-1">
    <div class="card card-dark">
      <div class="card-header">
        <h3 class="card-title">Masukkan Voucher</h3>
      </div>
      <div class="card-body">
        <div class="input-group">
          <input class="form-control form-control-lg" type="text" id="cariVoucher" name="cariVoucher"  placeholder="Voucher">
          <span class="input-group-append">
            <button type="button" class="btn btn-dark terimaVoucher">Terima</button>
          </span>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    </div>
        
    <!-- untuk laptop -->
    <div class="col-sm-6 offset-sm-1">
    <div class="card card-dark dataLaptop">
      <div class="card-header">
        <h3 class="card-title">Informasi Laptop</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td style="width: 30%;"><strong>Merk Laptop</strong></td>
              <td class="merklaptop"></td>
            </tr>
            <tr>
              <td style="width: 30%;"><strong>Tipe Laptop</strong></td>
              <td class="tipelaptop"></td>
            </tr>
            <tr>
              <td style="width: 30%;"><strong>Kerusakan Laptop</strong></td>
              <td class="kerusakanlaptop"></td>
            </tr>
            <tr>
              <td style="width: 30%;"><strong>Keterangan Lain</strong></td>
              <td class="keteranganlainlaptop"></td>
            </tr>
            <tr>
              <td style="width: 30%;"><strong>Keterangan Mitra</strong></td>
              <td class="keteranganmitralaptop"></td>
            </tr>
            <tr>
              <td style="width: 30%;"><strong>Harga</strong></td>
              <td class="hargalaptop"></td>
            </tr>
          </tbody>
        </table>
        <button class="btn btn-dark btn-block mt-4" data-toggle="modal" data-target="#terimaLaptop" type="button">Perbaiki Laptop</button>
      </div>
      </div>
      <!-- /.card-body -->
    </div>
    
    <div class="col-sm-4">
    <div class="card card-dark pelangganLaptop">
      <div class="card-header">
        <h3 class="card-title">Informasi Pelanggan</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td style="width: 42%;"><strong>Nama Pelanggan</strong></td>
              <td class="namapelangganlaptop"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      </div>
      </div>
    </div>


    <!-- untuk hp -->
    <div class="card card-dark datahp" style="width: 40%; position: absolute; right: 5%; top: 10%;">
      <div class="card-header">
        <h3 class="card-title">Informasi Handphone</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td style="width: 30%;"><strong>Merk Handphone</strong></td>
              <td class="merkhp"></td>
            </tr>
            <tr>
              <td style="width: 30%;"><strong>Tipe hp</strong></td>
              <td class="tipehp"></td>
            </tr>
            <tr>
              <td style="width: 30%;"><strong>Kerusakan Handphone</strong></td>
              <td class="kerusakanhp"></td>
            </tr>
            <tr>
              <td style="width: 30%;"><strong>Keterangan Lain</strong></td>
              <td class="keteranganlainhp"></td>
            </tr>
            <tr>
              <td style="width: 30%;"><strong>Keterangan Mitra</strong></td>
              <td class="keteranganmitrahp"></td>
            </tr>
            <tr>
              <td style="width: 30%;"><strong>Harga</strong></td>
              <td class="hargahp"></td>
            </tr>
          </tbody>
        </table>
        <button class="btn btn-dark btn-block mt-4" data-toggle="modal" data-target="#terimaHp" type="button">Perbaiki Handphone</button>
      </div>
      <!-- /.card-body -->
    </div>
    <div class="card card-dark pelangganhp" style="width: 35%;  margin-left: 20px">
      <div class="card-header">
        <h3 class="card-title">Informasi Pelanggan</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td style="width: 42%;"><strong>Nama Pelanggan</strong></td>
              <td class="namapelangganhp"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
</div>
<!-- untuk penerimaan -->

<!-- Modal -->
<div class="modal fade" id="terimaLaptop" tabindex="-1" role="dialog" aria-labelledby="terimaLaptopLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card  card-dark" style="position: absolute; right: 0; left: 0; top: 0;">
              <div class="card-header">
                <h3 class="card-title">Date picker</h3>
              </div>
              <div class="card-body">
              <!-- Date and time range -->
                <div class="form-group">
                  <label>Perkiraan Mitra :</label>

                  <div class="input-group">
                    <button type="button" class="btn btn-default float-right" id="daterange">
                      <i class="far fa-calendar-alt"></i>Perkiraan Lama Perbaikan
                    </button>
                  </div>
                </div>
                <div class="waktulaptop">
                  <table border="1" cellpadding="10">
                  <tr>
                    <td style="width: 15%"><strong>Waktu</strong></td>
                    <td><span id="reportrange"></span></td>
                  </tr>
                  <tr>
                    <td><strong style="width: 15%">Lama</strong></td>
                    <td><span id="reportrangeday"></span></td>
                  </tr>
                <!-- /.form group -->
                </table>
                
                <!-- untuk form lama perbaikan laptop -->
                <form action="<?= BASEURL; ?>/mitra/vouchermasuk" method="POST">
                <input type="text" id="idlaptop" name="idlaptop" hidden>
                <input type="text" id="tanggallaptop" name="tanggallaptop" hidden>
                <input type="text" id="harilaptop" name="harilaptop" hidden>
                <input type="text" id="berakhirlaptop" name="berakhirlaptop" hidden>
                <button type="submit" class="btn btn-dark btn-block mt-4">Perbaiki</button>
                </form>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="terimaHp" tabindex="-1" role="dialog" aria-labelledby="terimaHpLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card  card-dark" style="position: absolute; right: 0; left: 0; top: 0;">
              <div class="card-header">
                <h3 class="card-title">Date picker</h3>
              </div>
              <div class="card-body">
              <!-- Date and time range -->
                <div class="form-group">
                  <label>Perkiraan Mitra :</label>

                  <div class="input-group">
                    <button type="button" class="btn btn-default float-right" id="daterange2">
                      <i class="far fa-calendar-alt"></i>Perkiraan Lama Perbaikan
                    </button>
                  </div>
                </div>
                <div class="waktuhp">
                  <table border="1" cellpadding="10">
                  <tr>
                    <td style="width: 15%"><strong>Waktu</strong></td>
                    <td><span id="reportrange2"></span></td>
                  </tr>
                  <tr>
                    <td><strong style="width: 15%">Lama</strong></td>
                    <td><span id="reportrangeday2"></span></td>
                  </tr>
                <!-- /.form group -->
                </table>
                
                <!-- untuk form lama perbaikan laptop -->
                <form action="<?= BASEURL; ?>/mitra/vouchermasuk2" method="POST">
                <input type="text" id="idhp" name="idhp" hidden>
                <input type="text" id="tanggalhp" name="tanggalhp" hidden>
                <input type="text" id="harihp" name="harihp" hidden>
                <input type="text" id="berakhirhp" name="berakhirhp" hidden>
                <button type="submit" class="btn btn-dark btn-block mt-4">Perbaiki</button>
                </form>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('.dataLaptop').hide();
    $('.pelangganLaptop').hide();
    $('.datahp').hide();
    $('.pelangganhp').hide();
    $('.waktulaptop').hide();
    $('.waktuhp').hide();
    var laptop = true;
    var hp = true;
    $('.terimaVoucher').click(function(){
      <?php foreach ($data['voucher'] as $voucher):?>
        if ("<?= $voucher['voucher_laptop']; ?>" === $('#cariVoucher').val()) {
          <?php for ($i=0; $i < count($data['perbaikan']['perbaikan_laptop']); $i++):?>
            if ("<?= $voucher['id_perbaikan_laptop']; ?>" === "<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan']; ?>") {
              $('#cariVoucher').val('');
              //untuk barang
              $('.merklaptop').text("<?= $data['perbaikan']['merk_laptop'][$i][0]['merk_laptop']; ?>");
              $('.tipelaptop').text("<?= $data['perbaikan']['tipe_laptop'][$i][0]['tipe_laptop']; ?>");
              $('.kerusakanlaptop').text("<?= $data['perbaikan']['kerusakan_laptop'][$i][0]['kerusakan_laptop']; ?>");
              $('.keteranganlainlaptop').text("<?= $data['perbaikan']['keterangan_lain'][$i]; ?>");
              $('.keteranganmitralaptop').text("<?= $data['perbaikan']['perbaikan_laptop'][$i]['keterangan_mitra']; ?>");
              $('.hargalaptop').text("<?= $data['perbaikan']['harga'][$i]; ?>");

              //untuk form 
              $('#idlaptop').val("<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan']; ?>");

              //untuk data pelanggan
              $('.namapelangganlaptop').text("<?= $data['perbaikan']['pelanggan'][$i][0]['nama']; ?>");
              $('.datahp').hide();
              $('.pelangganhp').hide();

              $('.dataLaptop').show();
              $('.pelangganLaptop').show();
            }
             laptop = false;
          <?php endfor; ?>

        }
      <?php endforeach; ?>
         // alert(hp);
       
    });

    $('.terimaVoucher').click(function(){
          <?php foreach ($data['voucher2'] as $voucher):?>
        if("<?= $voucher['voucher_hp']; ?>" === $('#cariVoucher').val()){
          <?php for ($i=0; $i < count($data['perbaikan2']['perbaikan_hp']); $i++):?>
            if ("<?= $voucher['id_perbaikan_hp']; ?>" === "<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan']; ?>") {
              $('#cariVoucher').val('');
              //untuk barang
              $('.merkhp').text("<?= $data['perbaikan2']['merk_hp'][$i][0]['merk_hp']; ?>");
              $('.tipehp').text("<?= $data['perbaikan2']['tipe_hp'][$i][0]['tipe_hp']; ?>");
              $('.kerusakanhp').text("<?= $data['perbaikan2']['kerusakan_hp'][$i][0]['kerusakan_hp']; ?>");
              $('.keteranganlainhp').text("<?= $data['perbaikan2']['keterangan_lain'][$i]; ?>");
              $('.keteranganmitrahp').text("<?= $data['perbaikan2']['perbaikan_hp'][$i]['keterangan_mitra']; ?>");
              $('.hargahp').text("<?= $data['perbaikan2']['harga'][$i]; ?>");

              //untuk form 
              $('#idhp').val("<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan']; ?>");

              //untuk data pelanggan
              $('.namapelangganhp').text("<?= $data['perbaikan2']['pelanggan'][$i][0]['nama']; ?>");
              $('.dataLaptop').hide();
              $('.pelangganLaptop').hide();
              $('.datahp').show();
              $('.pelangganhp').show();
            }
          hp = false;
          <?php endfor; ?>
        }
        
         <?php endforeach; ?>
           if (laptop === true && hp === true) {
          alert("Voucher Tidak Di Temukan")
         }
    });

    //Date range button
    var start = moment();
    var end = moment().add(170,'days');
    $('#daterange').daterangepicker(
      {
        minDate : 0,
        ranges   : {
          'Hari ini'       : [moment(), moment()],
          '3 Hari '   : [moment(), moment().add(3, 'days')],
          '1 Minggu' : [moment(), moment().add(7, 'days')],
          '2 Minggu': [moment(), moment().add(12, 'days')],
          '30 Hari'  : [moment(), moment().add(30,'days')]
        },
        minDate : moment()
      },
      function (start, end) {
        $('#reportrange').text(start.format('D-MMMM-YYYY') + ' sampai ' + end.format('D-MMMM-YYYY'));
        var range = Math.floor(Math.floor((end - start)) / 86400000);
        $('#reportrangeday').text(range + ' hari');
        $('#tanggallaptop').val($('#reportrange').text());
        $('#harilaptop').val($('#reportrangeday').text());
        $('#berakhirlaptop').val(Math.floor(end));
        $('.waktulaptop').show();
      }
    );


    //Date range button 2
    var start = moment();
    var end = moment().add(170,'days');
    $('#daterange2').daterangepicker(
      {
        minDate : 0,
        ranges   : {
          'Hari ini'       : [moment(), moment()],
          '3 Hari '   : [moment(), moment().add(3, 'days')],
          '1 Minggu' : [moment(), moment().add(7, 'days')],
          '2 Minggu': [moment(), moment().add(12, 'days')],
          '30 Hari'  : [moment(), moment().add(30,'days')]
        },
        minDate : moment()
      },
      function (start, end) {
        $('#reportrange2').text(start.format('D-MMMM-YYYY') + ' sampai ' + end.format('D-MMMM-YYYY'));
        var range = Math.floor(Math.floor((end - start)) / 86400000);
        $('#reportrangeday2').text(range + ' hari');
        $('#tanggalhp').val($('#reportrange2').text());
        $('#harihp').val($('#reportrangeday2').text());
        $('#berakhirhp').val(Math.floor(end));
        $('.waktuhp').show();
      }
    );

});
</script>
