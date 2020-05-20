<!-- =============== JAVA SCRIPT =============== -->
<script>
  let perbaikan = {};

  // ================JAVASCRIPT UMUM===============
  jQuery(document).ready(function($) {
    $('.card_ubah_harga').hide();
    $('.card_diskon').hide();
    $('.card_tambah_harga').hide();
    $('#input_persentase').hide();
    $('#input_harga_diskon').hide();
    $('.harga_akhir').hide();
    $('.keterangan_mitra').hide();
    $('.btn_ubah').hide();
    checkConnection()
    $('#input_persentase').ionRangeSlider({
      min     : 0,
      max     : 100,
      type    : 'single',
      step    : 1,
      postfix : ' %',
      prettify: false,
      hasGrid : true
    })

    $('.btn_ubah_harga').on('click', function () {
      $('.ubah_title').html('<code>Ubah Harga</code>');
      $('.btn_diskon').show();
      $('.btn_tambah_harga').show();
      $('.card_persentase').hide();
      $('.card_diskon').hide();
      $('.card_tambah_harga').hide();
      $('.card_ubah_harga').show();
      $('.harga_akhir').hide();
      $('.keterangan_mitra').hide();
      $('.btn_ubah').hide();
    });

    $('.btn_ubah_keterangan').on('click', function () {
      $('.ubah_title').html('<code>Ubah Keterangan</code>');
      $('.btn_diskon').hide();
      $('.btn_tambah_harga').hide();
      $('.card_persentase').hide();
      $('.card_ubah_harga').show();
      $('.card_tambah_harga').hide();
      $('.harga_akhir').hide();
      $('.card_diskon').hide();
      $('.keterangan_mitra').show();
      $('.btn_ubah').val('ubah_keterangan');
    });

    $('.btn_diskon').on('click', function () {
      $('.card_tambah_harga').hide();
      $('.btn_ubah').hide();
      $('.btn_ubah').val('ubah_diskon');
      $('.harga_akhir').show();
      $('.keterangan_mitra').show();
      $('#harga_akhir').val('');
      $('#keterangan_mitra').val('');
      var harga = perbaikan.harga.split('Rp.').pop().split('.').join("").split(',')[0];
      $('.card_diskon').show();
      $('#harga_akhir').autoNumeric('destroy');
      $('#harga_akhir').val(parseInt(harga)) 
      $('#harga_akhir').autoNumeric('init');
    });

    $('.btn_tambah_harga').on('click', function () {
      $('.card_diskon').hide();
      $('.btn_ubah').hide();
      $('.btn_ubah').val('ubah_tambah_harga');
      $('.harga_akhir').show();
      $('.keterangan_mitra').show();
      $('.card_tambah_harga').show();
      $('#harga_akhir').val('');
      $('#keterangan_mitra').val('');
      $('#input_tambah_harga').autoNumeric('init');
      var harga = perbaikan.harga.split('Rp.').pop().split('.').join("").split(',')[0];
      $('#harga_akhir').autoNumeric('destroy');
      $('#harga_akhir').val(parseInt(harga)) 
      $('#harga_akhir').autoNumeric('init');

    });

    $('#option_diskon').on('change', function () {
      var harga = perbaikan.harga.split('Rp.').pop().split('.').join("").split(',')[0];
      if ($(this).val() == "Input Harga Manual") {
        $('#harga_akhir').autoNumeric('destroy');
        $('#harga_akhir').val(parseInt(harga)) 
        $('#harga_akhir').autoNumeric('init');
        $('#input_harga_diskon').autoNumeric('init');
        $('#input_harga_diskon').show();
      }else{
        var diskon = parseInt(harga) * parseInt($(this).val()) / 100;
        var harga_akhir = parseInt(harga - diskon);
        $('#harga_akhir').autoNumeric('destroy');
        $('#harga_akhir').val(harga_akhir);
        $('#harga_akhir').autoNumeric('init');
        $('#input_harga_diskon').hide();
      }
      // alert(parseInt($(this).val()))
    });

    $('#input_harga_diskon').keypress(function () {
      $('.text_harga').text('Perhatikan Harga Yang Anda Masukkan!');
      var harga = perbaikan.harga.split('Rp.').pop().split('.').join("").split(',')[0];
      const input = $(this).autoNumeric('get') + '0';
      if (parseInt(input) >= harga) {
        $('.text_harga').text('Diskon Melebihi Harga Awal!!!!');
        setTimeout(function() {
        toastr.error(
          "Diskon Melebihi Harga Awal!!!!"
        );
      }, 150)
        $(this).val('');
        $('#harga_akhir').autoNumeric('destroy');
        $('#harga_akhir').val(parseInt(harga)) 
        $('#harga_akhir').autoNumeric('init');
      }else{
        var total = harga - parseInt(input)
        $('#harga_akhir').autoNumeric('destroy');
        $('#harga_akhir').val(total) 
        $('#harga_akhir').autoNumeric('init');

      }

    });

    $('#input_tambah_harga').on('keypress', function () {
      var harga = perbaikan.harga.split('Rp.').pop().split('.').join("").split(',')[0];
      var tambah_harga = $(this).autoNumeric('get') + '0';
      harga_akhir = parseInt(harga) + parseInt(tambah_harga);
      var persentase = Math.floor(tambah_harga / harga * 100);
      if (persentase > 0) {
        $('.text_harga_tambah').html('<div class="text_harga_tambah">Anda menaikkan ' + persentase + '% harga!'+"<br><strong>"+' Perbaikan akan di hentikan untuk menunggu persetujuan pelanggan '+"</strong><br>"+' Jika pelanggan menolak, silahkan kembalikan barang pelanggan, dan jika pelanggan menerima silahkan lanjutkan perbaikan</div>');
        $('#harga_akhir').autoNumeric('destroy');
        $('#harga_akhir').val(harga_akhir);
        $('#harga_akhir').autoNumeric('init');
        if (persentase > 50) {
          setTimeout(function() {
            toastr.warning(
              "Perhatian, Anda Menaikkan Harga diatas 50%!!!!"
            );
          }, 150)
        }
        if (persentase >= 100) {
          setTimeout(function() {
            toastr.error(
              "Perhatian, Anda Tidak Bisa Menaikkan Harga diatas 100%!!!!"
            );
          }, 150)
          $('#harga_akhir').val('');
        }
      }
    });

    $('#keterangan_mitra').on('keypress', function () {
      $('.btn_ubah').show();
    });

  });

   // ================CHECK CONNECTION==============

  function checkConnection() {
    var status = navigator.onLine
    if (status) {

    } else {
      setTimeout(function() {
        toastr.warning(
          "Anda Tidak Terhubung Ke Internet!!"
        );
      }, 150)
    }
  }

  // ====FUNCTION AMBIL DATA LAPTOP YG TIDAK TERDAFTAR===

  function laptopttd(id) {
    var kodes = id;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('mitra/laptopTtd'); ?>",
      async: true,
      dataType: 'json',
      data: {
        kode: kodes
      },
      cache: false,
      success: function(data) {
        var text = '';
        var i;
        for (i = 0; i < data.length; i++) {
          text += data[i].merk_laptop.toUpperCase() + ' - ' + data[i].tipe_laptop;
        }
        $('#tipettd_' + id).text(text);
      }
    });
  }

  function get_voucher (id) {
    $.ajax({
      url: '<?= base_url('mitra/getVoucherLaptop_ById') ?>',
      type: 'post',
      dataType: 'json',
      data: {id: id},
      success: function (data) {
        $('.voucher-'+id).text(data[0].voucher_laptop);
      }
    })
    .fail(function() {
      console.log("error");
    });
  }

  // ============== FUNCTION AMBIL DETAIL LAPTOP ==============

  function detail_laptop(id, jenis) {
    checkConnection()
    $.ajax({
      type: 'POST',
      url: "<?= base_url('mitra/perbaikan_detail_laptop'); ?>",
      async: true,
      dataType: 'json',
      data: {
        id: id, jenis: jenis
      },
      cache: true,
      success: function(data) {
        perbaikan = data;
         $('.nama_pelanggan').text(data.nama.toUpperCase());
         $('.laptop_merk').text(data.merk_laptop.toUpperCase())
         $('.tanggal_diterima').text(data.tanggal);
         $('.laptop_tipe').text(data.tipe_laptop);
         $('.harga').text(data.harga);
        if (data.kerusakan_laptop != null) {
          $('.laptop_kerusakan').text(data.kerusakan_laptop);
        }else{
          $('.laptop_kerusakan').text('-');
        }
        if (data.kerusakan_lain != '') {
          $('.laptop_kerusakan_lain').text(data.kerusakan_lain);
        }else{
          $('.laptop_kerusakan_lain').text('-');
        }
        if (data.keterangan_mitra != '') {
          $('.keterangan_mitra_dtl').text(data.keterangan_mitra);
        }else{
          $('.keterangan_mitra_dtl').text('-');
        }
        
      }
    });
  }

  function get_lama_perkiraan (id, jenis) {
    detail_laptop(id,jenis)
    $.ajax({
      url: '<?= base_url('mitra/get_lama_perkiraan_laptop'); ?>',
      type: 'post',
      dataType: 'json',
      data: {id: id},
      success: function (data) {
        $.each(data, function(i, val) {
          let total_hari = val.waktu_hari.split(' ', 1);
          let berakhir = Math.floor(Math.floor(parseInt(val.berakhir) - Math.floor(moment())) / 86400000);
          let hari_terlewati = total_hari - berakhir;
          let persentase = Math.floor(hari_terlewati / total_hari * 100) + '%';
          $('.persentase_waktu').attr('style', 'width:'+ persentase +';');
          $('.text_persentase_waktu').text(persentase);
        });
      }
    });  
  }

  function ubah_data () {
    console.log($('.btn_ubah').val())
  }

</script>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Perbaikan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Perbaikan</a></li>
            <li class="breadcrumb-item active">Perbaikan Laptop</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pengajuan Perbaikan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <th>Perbaikan</th>
              <th>voucher</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($laptop as $val) : ?>
            <?php if ($val['id_status_perbaikan'] == 4) : ?>
            <tr>
              <script>get_voucher(<?= $val['id_perbaikan']; ?>)</script>
              <td><?= $i; ?></td>
              <td>
                <span id="tipettd_<?= $val['id_perbaikan']; ?>"></span>
                <?php if ($val['id_tipe'] == 0) : ?>
                <!-- ===== FUNCTION JAVASCRIPT ===== -->
                <script>
                laptopttd(<?= $val['id_perbaikan']; ?>)
                </script>
                <!-- ======END OF JAVASCRIPT==== -->
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail_perbaikan" style="float: right;" onclick="detail_laptop(<?= $val['id_perbaikan']; ?>, 'ttd')">Detail</button>
                <?php elseif ($val['id_tipe'] != 0) : ?>
                <?= strtoupper($val['merk']); ?> - <?= $val['tipe']; ?>
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail_perbaikan" style="float: right;" onclick="detail_laptop(<?= $val['id_perbaikan']; ?>, 'normal')">Detail</button>
                <?php endif; ?>
              </td>
              <td class="voucher-<?= $val['id_perbaikan']; ?>"></td>
              <?php if ($val['id_tipe'] == 0) : ?>
              <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#ubah" onclick="get_lama_perkiraan(<?= $val['id_perbaikan']; ?>, 'ttd')">Detail</button>
              </td>
              <?php elseif ($val['id_tipe'] != 0) : ?>
              <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#ubah" onclick="get_lama_perkiraan(<?= $val['id_perbaikan']; ?>, 'normal')">Detail</button>
              </td>
              <?php endif; ?>
              <?php endif; ?>
              <?php endforeach; ?>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </section>
</div>


<!-- ==========  BAGIAN MODAL ============= -->
<div class="modal fade" id="detail_perbaikan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <div class="container-fluid">
          <table class="table table-condensed">
            <tr class="bg-gray-dark color-palette">
              <th colspan="2" style="text-align: center;">
                <strong>Informasi Perbaikan</strong>
              </th>
            </tr>
            <tr>
              <td style="width: 30%;">Merk</td>
              <td class="laptop_merk"></td>
            </tr>
            <tr>
              <td>Tipe</td>
              <td class="laptop_tipe"></td>
            </tr>
            <tr>
              <td>Kerusakan</td>
              <td class="laptop_kerusakan"></td>
            </tr>
            <tr>
              <td>Kerusakan Lain</td>
              <td class="laptop_kerusakan_lain"></td>
            </tr>
          </table>
          <table class="table table-condensed">
            <tr class="bg-gray-dark color-palette">
              <th colspan="2" style="text-align: center;">
                <strong>Data Pelanggan</strong>
              </th>
            </tr>
            <tr>
              <td style="width: 30%;">Nama</td>
              <td class="nama_pelanggan"></td>
            </tr>
            <tr>
              <td>Diterima</td>
              <td class="tanggal_diterima"></td>
            </tr>
          </table>
          <table class="table table-condensed">
            <tr class="bg-gray-dark color-palette">
              <th colspan="2" style="text-align: center;">
                <strong>Data Lain</strong>
              </th>
            </tr>
            <tr>
              <td style="width: 30%;">Harga</td>
              <td class="harga"></td>
            </tr>
            <tr>
              <td style="width: 30%;">Keterangan Mitra</td>
              <td class="keterangan_mitra_dtl"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ubah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <button class="btn btn-dark btn_ubah_keterangan col-sm-5" type="button" style="margin: auto;">Ubah Keterangan
            </button>
            <button class="btn btn-dark btn_ubah_harga col-sm-5" type="button" style="margin: auto;">
            Ubah Harga
            </button>
            <!-- ================ CARD PERSENTASE =============== -->
            
            <div class="card col-sm-12 mt-3 card_persentase">
              <div class="card-header">
                <h3 class="card-title"><code>Sisa Perkiraan Waktu Yang Anda Berikan</code></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p><code>Persentase</code></p>
                <div class="progress progress-sm active">
                  <div class="progress-bar bg-success progress-bar-striped persentase_waktu" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                    <span class="text_persentase_waktu"></span>
                  </div>
                </div>
                <span style="float: right;"></span>
              </div>
              <div class="card-body">
                <p><code>Persentase Pengerjaan</code></p>
                <input id="input_persentase" type="text" name="input_persentase" value="" class="irs-hidden-input" tabindex="-1" hidden>
                <span style="float: right;"></span>
              </div>
            </div>
            
            <!-- ================== END OF CARD ============ -->
            
            <!-- =============== CARD UBAH HARGA ============ -->
            <div class="card col-sm-12 mt-3 card_ubah_harga">
              <div class="card-header">
                <h3 class="card-title ubah_title"></h3>
              </div>
              <div class="card-body container-fluid">
                <div class="row">
                  <button class="btn btn-success btn_diskon col-sm-5 mr-1" type="button" style="margin-right: 0; margin-left: auto;">
                  Beri Diskon
                  </button>
                  <button class="btn btn-warning btn_tambah_harga col-sm-5 ml-1" type="button" style="margin-right: auto; margin-left: 0;">
                  Tambah Harga
                  </button>
                </div>
                <div class="card_diskon mt-3">
                  <div class="form-group mt-20">
                    <select class="form-control" id="option_diskon">
                      <option selected="true" disabled>Persentase Diskon</option>
                      <option>Input Harga Manual</option>
                      <option>3%</option>
                      <option>5%</option>
                      <option>10%</option>
                      <option>20%</option>
                      <option>30%</option>
                      <option>40%</option>
                      <option>50%</option>
                      <option>60%</option>
                      <option>70%</option>
                    </select>
                  </div>
                  <div class="form-group mt-20">
                    <input class="form-control" id="input_harga_diskon" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Harga Rupiah">
                    <p class="text_harga" style="color: red;"></p>
                  </div>
                </div>
                <div class="card_tambah_harga mt-3">
                  <div class="form-group mt-20">
                    <input class="form-control" id="input_tambah_harga" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Jumlah Harga Rupiah Yang Ingin Di tambahkan">
                    <p class="text_harga_tambah" style="color: red;"></p>
                  </div>
                </div>

                <div class="form-group harga_akhir">
                  <input class="form-control" id="harga_akhir" name="harga_akhir" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." disabled>
                </div>
                <div class="form-group mt-20 keterangan_mitra">
                  <input class="form-control" id="keterangan_mitra" name="keterangan_mitra" type="text" placeholder="Keterangan">
                </div>
                <div class="form-group mt-20">
                  <button class="btn btn-dark btn_ubah" type="button" style="width: 100%;" onclick="ubah_data()">Ubah</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>