<!-- ========================== JAVASCRIPT ====================== -->

<script>
  function getVoucher(voucher) {
    $.ajax({
      url: '<?= base_url('mitra/getVoucher') ?>',
      type: 'post',
      dataType: 'json',
      data: {voucher: voucher},
      cache: false,
      async: true,
      success: function (data) {
        if (data == null) {
          $('.data_barang').hide();
          $('.detail_pelanggan').hide();
          setTimeout(function() {
            toastr.error(
              "Voucher Tidak Terdaftar!!"
            );
          }, 10)
        }else{
          setTimeout(function () {
            $('.data_barang').show();
             $('.detail_pelanggan').show();
          }, 10)
          if (data.jenis == 'laptop') {
            $.each(data.data, function(i, val) {
              $('.jenis_barang').text('LAPTOP');
              $('.jenis_perbaikan').val('laptop');
              detail_laptop(val['id_perbaikan_laptop'])
              detail_perbaikan(val['id_perbaikan_laptop'], 'laptop')
            });
          }else if (data.jenis == 'hp') {
            $.each(data.data, function(i, val) {
              $('.jenis_barang').text('HANDPHONE');
              $('.jenis_perbaikan').val('hp');
              detail_hp(val['id_perbaikan_hp'])
              detail_perbaikan(val['id_perbaikan_hp'], 'hp')
            });
          }
        }
      }
    })
    .fail(function() {
      console.log("error voucher laptop");
    });
  }
  // ============== FUNCTION AMBIL DETAIL LAPTOP ==============

  function detail_laptop(id) {
    $.ajax({
      type: 'POST',
      url: "<?= base_url('mitra/detail_laptop'); ?>",
      async: true,
      dataType: 'json',
      data: {kode: id},
      cache: false,
      success: function(data) {
        if (data != '') {
          $.each(data, function(i, val) {
            $('.merk').text(val.merk.toUpperCase());
            $('.tipe').text(val.tipe.toUpperCase());
             if (val.kerusakan == null) {
                $('.kerusakan').text('-');
                $('.keterangan_lain').text(val.kerusakan_lain);
             } else {
                $('.kerusakan').text(val.kerusakan);
             }

             if (val.kerusakan_lain == '') {
                $('.keterangan_lain').text('-');
             } else {
                $('.keterangan_lain').text(val.kerusakan_lain);
             }
          });
        }else{
          detail_laptop_ttd(id);
        }
      }
    });
  }

  function detail_laptop_ttd(id) {
    $.ajax({
      type: 'POST',
      url: "<?= base_url('mitra/detail_laptop_ttd'); ?>",
      async: true,
      dataType: 'json',
      data: {kode: id},
      cache: false,
      success: function(data) {
        $.each(data, function(i, val) {
            $('.merk').text(val.merk.toUpperCase());
            $('.tipe').text(val.tipe.toUpperCase());
             if (val.kerusakan == null) {
                $('.kerusakan').text('-');
                $('.keterangan_lain').text(val.kerusakan_lain);
             } else {
                $('.kerusakan').text(val.kerusakan);
             }

             if (val.kerusakan_lain == '') {
                $('.keterangan_lain').text('-');
             } else {
                $('.keterangan_lain').text(val.kerusakan_lain);
             }
          });
      }
    });
  }
  // ============== FUNCTION AMBIL DETAIL HANDPHONE ==============

  function detail_hp(id) {
    $.ajax({
      type: 'POST',
      url: "<?= base_url('mitra/detail_hp'); ?>",
      async: true,
      dataType: 'json',
      data: {kode: id},
      cache: false,
      success: function(data) {
        if (data != '') {
          $.each(data, function(i, val) {
            $('.merk').text(val.merk.toUpperCase());
            $('.tipe').text(val.tipe.toUpperCase());
             if (val.kerusakan == null) {
                $('.kerusakan').text('-');
                $('.keterangan_lain').text(val.kerusakan_lain);
             } else {
                $('.kerusakan').text(val.kerusakan);
             }

             if (val.kerusakan_lain == '') {
                $('.keterangan_lain').text('-');
             } else {
                $('.keterangan_lain').text(val.kerusakan_lain);
             }
          });
        }else{
          detail_hp_ttd(id);
        }
      }
    });
  }

  function detail_hp_ttd(id) {
    $.ajax({
      type: 'POST',
      url: "<?= base_url('mitra/detail_hp_ttd'); ?>",
      async: true,
      dataType: 'json',
      data: {kode: id},
      cache: false,
      success: function(data) {
        $.each(data, function(i, val) {
            $('.merk').text(val.merk.toUpperCase());
            $('.tipe').text(val.tipe.toUpperCase());
             if (val.kerusakan == null) {
                $('.kerusakan').text('-');
                $('.keterangan_lain').text(val.kerusakan_lain);
             } else {
                $('.kerusakan').text(val.kerusakan);
             }

             if (val.kerusakan_lain == '') {
                $('.keterangan_lain').text('-');
             } else {
                $('.keterangan_lain').text(val.kerusakan_lain);
             }
          });
      }
    });
  }
  function detail_perbaikan (id, jenis) {
    $.ajax({
      url: '<?= base_url('mitra/getPerbaikan'); ?>',
      type: 'post',
      async: true,
      dataType: 'json',
      data: {kode: id, jenis: jenis},
      cache: false,
      success: function (data) {
        $.each(data, function(i, val) {
          $('#jenis_perbaikan').val(jenis);
          $('#id_perbaikan').val(val.id_perbaikan);
          detail_pelanggan(val.id_pelanggan)
          $('.harga').text(val.harga);
          if (val.keterangan_mitra != '') {
            $('.keterangan_mitra').text(val.keterangan_mitra);
          }else{
            $('.keterangan_mitra').text('-');
          }
        });
      }
    })
    .fail(function() {
      console.log("error detail_perbaikan");
    });
    
  }
  function detail_pelanggan(id) {
    $.ajax({
      type: 'POST',
      url: "<?= base_url('mitra/detail_pelanggan'); ?>",
      async: true,
      dataType: 'json',
      data: {
        kode: id
      },
      cache: false,
      success: function(data) {
        $('.nama_pelanggan').text(data[0].nama.toUpperCase())
      }
    });
  }
  jQuery(document).ready(function($) {
      $('.data_barang').hide();
      $('.detail_pelanggan').hide();
      $('.input_voucher').keyup(function() {
        var value = $(this).val();
        $(this).val(value.replace(/ /g, ''));
      });


      $('button.terima_voucher').click(function(e) {
        var voucher = $('.input_voucher').val(); 
        if (voucher == undefined || voucher == '') {
            setTimeout(function() {
              toastr.error(
                "Masukkan Voucher Terlebih Dahulu!!"
              );
            }, 10)
          }else{
            getVoucher(voucher)
          }
      });

      //Date range button
      var start = moment();
      var end = moment().add(170, 'days');
      $('#daterange').daterangepicker({
          minDate: 0,
          ranges: {
            'Hari ini': [moment(), moment()],
            '3 Hari ': [moment(), moment().add(3, 'days')],
            '1 Minggu': [moment(), moment().add(7, 'days')],
            '2 Minggu': [moment(), moment().add(12, 'days')],
            '30 Hari': [moment(), moment().add(30, 'days')]
          },
          minDate: moment()
        },
        function(start, end) {
          $('#reportrange').text(start.format('D-MMMM-YYYY') + ' sampai ' + end.format('D-MMMM-YYYY'));
          var range = Math.floor(Math.floor((end - start)) / 86400000);
          $('#reportrangeday').text(range + ' hari');
          $('#tanggal').val($('#reportrange').text());
          $('#hari').val($('#reportrangeday').text());
          $('#waktu_berakhir').val(Math.floor(end));
          $('.waktulaptop').show();
        }
      );


  });

</script>
<?= $this->session->flashdata('message'); ?>
<div class="content-wrapper mt-5">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Terima Voucher</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Terima Voucher</a></li>
            <li class="breadcrumb-item active">Perbaikan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container-fluid">
    <!-- container fluid -->
    <div class="row">
      <div class="col-sm-5 ml-1">
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Masukkan Voucher</h3>
          </div>
          <div class="card-body">
            <div class="input-group">
              <input class="form-control form-control-lg input_voucher" type="text" id="input_voucher" name="input_voucher" placeholder="Voucher">
              <span class="input-group-append">
                <button type="button" class="btn btn-dark terima_voucher">Terima</button>
              </span>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card card-dark detail_pelanggan">
          <div class="card-header">
            <h3 class="card-title">Informasi Pelanggan</h3>
          </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td style="width: 42%;"><strong>Pengaju</strong></td>
                    <td class="nama_pelanggan"></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-sm-11" style="margin-left: 0; margin-right: auto;">
        <div class="card card-dark data_barang">
          <div class="card-header">
            <h3 class="card-title">Informasi Barang</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td style="width: 30%;"><strong>Jenis Barang</strong></td>
                  <td class="jenis_barang"></td>
                </tr>
                <tr>
                  <td style="width: 30%;"><strong>Merk</strong></td>
                  <td class="merk"></td>
                </tr>
                <tr>
                  <td style="width: 30%;"><strong>Tipe</strong></td>
                  <td class="tipe"></td>
                </tr>
                <tr>
                  <td style="width: 30%;"><strong>Kerusakan</strong></td>
                  <td class="kerusakan"></td>
                </tr>
                <tr>
                  <td style="width: 30%;"><strong>Keterangan Lain</strong></td>
                  <td class="keterangan_lain"></td>
                </tr>
                <tr>
                  <td style="width: 30%;"><strong>Keterangan Mitra</strong></td>
                  <td class="keterangan_mitra"></td>
                </tr>
                <tr>
                  <td style="width: 30%;"><strong>Harga</strong></td>
                  <td class="harga"></td>
                </tr>
              </tbody>
            </table>
            <button class="btn btn-dark btn-block mt-4" data-toggle="modal" data-target="#modal_terima_voucher" type="button">Perbaiki Laptop</button>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="modal_terima_voucher" tabindex="-1" role="dialog" aria-labelledby="terimaLaptopLabel" aria-hidden="true">
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
                <form action="<?= base_url(); ?>mitra/terima_voucher" method="POST">
                  <input type="text" id="jenis_perbaikan" name="jenis_perbaikan" hidden>
                  <input type="text" id="id_perbaikan" name="id_perbaikan" hidden>
                  <input type="text" id="tanggal" name="tanggal" hidden>
                  <input type="text" id="hari" name="hari" hidden>
                  <input type="text" id="waktu_berakhir" name="waktu_berakhir" hidden>
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
  

