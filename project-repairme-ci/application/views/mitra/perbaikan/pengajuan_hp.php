<!-- =============== JAVA SCRIPT =============== -->
<script>
  // ================CHECK CONNECTION==============
  jQuery(document).ready(function($) {
    $('#hargahp').autoNumeric('init');
    data_hp()
    // interval === auto update data ===

    setInterval(function () {
      data_hp()
    }, 1000); 

    $('#form_terima_hp').submit(function (e) {
      $('#tanggal').val(moment().format("Do MMMM YYYY, HH:mm:ss"));
      $('#terima_hp').modal('hide');
      e.preventDefault();
      $.ajax({
          url: '<?= base_url(); ?>mitra/terimaperbaikanhp',
          type: 'post',
          dataType: 'text',
          data: $('#form_terima_hp').serializeArray(),
          success: function (data) {
            if (data == 'success') {
              setTimeout(function() {
                toastr.success(
                  "Perbaikan telah diterima!"
                );
              }, 100)
            }
          }
        })
    });
  });


  // ============ AMBIL DATA hp ==========

  function data_hp() {
     let button_detail_hp;
     $.ajax({
        url: '<?= base_url(); ?>mitra/data_hp',
        type: 'get',
        dataType: 'json',
        cache: true,
        success: function (data) {
          $.each(data, function(index, val) {

            // ================ JIKA ADA PERUBAHAN HAPUS TR =============

            if (val.id_perbaikan == $('#tabel_pengajuan tr#'+val.id_perbaikan).attr('id') && val.id_status_perbaikan != 1) {
              
              console.log("hapus tr status id = 1")
              
              $('#tabel_pengajuan tr#'+val.id_perbaikan).remove();
            }
            if (val.id_perbaikan == $('#tabel_perbaikan_diterima tr#'+val.id_perbaikan).attr('id') && val.id_status_perbaikan != 2) {

              console.log("hapus tr status id = 2")
              
              $('#tabel_perbaikan_diterima tr#'+val.id_perbaikan).remove();
            }
            if (val.id_perbaikan == $('#tabel_perbaikan_ditolak tr#'+val.id_perbaikan).attr('id') && val.id_status_perbaikan != 3) {

              console.log("hapus tr status id = 3")

              $('#tabel_perbaikan_ditolak tr#'+val.id_perbaikan).remove();
            }

            // =================== ATTRIBUTE TABLE PENGAJUAN PERBAIKAN =================
            if (val.id_status_perbaikan == 1 && $('#tabel_pengajuan tr#'+val.id_perbaikan).attr('id') != val.id_perbaikan) {

              console.log("tambah tr status id = 1")

              let nomor = `<td>`+ parseInt(index+1) +`</td>`;
              let pelanggan = `<td>`+ val.pelanggan.toUpperCase() +` <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail_pelanggan" style="float: right;" onclick="detail_pelanggan(`+ val.id_pelanggan +`)">Detail</button></td>`;
              let btn_proses = `<td><button class="btn btn-success btn-sm btn_terima_hp" data-toggle="modal" data-target="#terima_hp" onclick="detail_hp_(`+val.id_perbaikan+`,`+ val.id_tipe+`);voucher()"> Terima </button>
                    <button class="btn btn-danger btn-sm btn_tolak_hp" data-toggle="modal" data-target="#tolak_hp" onclick="detail_tolak(`+val.id_perbaikan+`)"> Tolak </button></td>`
              if (val.id_tipe == 0){
                  hpttd(val.id_perbaikan)
                  $('#tabel_pengajuan').append(function () {
                    return `<tr id="`+ val.id_perbaikan +`">
                      `+ nomor +`
                      <td>
                      <span id="tipettd_`+ val.id_perbaikan +`"></span>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp_ttd(`+ val.id_perbaikan +`)">Detail</button>
                      </td>
                      `+ pelanggan +`<td class="tanggal">`+tanggal(val.tanggal)+`</td>
                      `+ btn_proses +`
                    </tr>`              
                  });
              }
              if (val.id_tipe != 0){
                  $('#tabel_pengajuan').append(function () {
                    return `<tr id="`+ val.id_perbaikan +`">
                      `+ nomor +`
                      <td>
                      `+ val.merk.toUpperCase() +` - `+ val.tipe +`
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp(`+ val.id_perbaikan +`)">Detail</button>
                      </td>
                      `+ pelanggan +`<td class="tanggal">`+tanggal(val.tanggal)+`</td>
                      `+ btn_proses +`
                    </tr>`              
                  });
              }
            }

            // ================== ATTRIBUTE TABLE PERBAIKAN DITERIMA =================

            if (val.id_status_perbaikan == 2 && $('#tabel_perbaikan_diterima tr#'+val.id_perbaikan).attr('id') != val.id_perbaikan) {

              console.log("tambah tr status id = 2")

              let nomor = `<td>`+ parseInt(index+1) +`</td>`;
              let pelanggan = `<td>`+ val.pelanggan.toUpperCase() +` <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail_pelanggan" style="float: right;" onclick="detail_pelanggan(`+ val.id_pelanggan +`)">Detail</button></td>`;
              let proses = `<button class="btn btn-danger btn-sm")">Hapus</button>`
                if (val.id_tipe == 0){
                      hpttd(val.id_perbaikan)
                      $('#tabel_perbaikan_diterima').append(function () {
                        return `<tr id="`+ val.id_perbaikan +`">
                          `+ nomor +`
                          <td>
                          <span id="tipettd_`+ val.id_perbaikan +`"></span>
                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp_ttd(`+ val.id_perbaikan +`)">Detail</button>
                          </td>
                          `+ pelanggan +`<td class="tanggal">`+tanggal(val.tanggal)+`</td>
                          <td>`+ proses +`</td>
                        </tr>`              
                      });
                  }
                  if (val.id_tipe != 0){
                  $('#tabel_perbaikan_diterima').append(function () {
                    return `<tr id="`+ val.id_perbaikan +`">
                      `+ nomor +`
                      <td>
                      `+ val.merk.toUpperCase() +` - `+ val.tipe +`
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp(`+ val.id_perbaikan +`)">Detail</button>
                      </td>
                      `+ pelanggan +`<td class="tanggal">`+tanggal(val.tanggal)+`</td>
                      <td>`+ proses +`</td>
                    </tr>`              
                  });
              }
            }

            if (val.id_status_perbaikan == 3 && $('#tabel_perbaikan_ditolak tr#'+val.id_perbaikan).attr('id') != val.id_perbaikan) {

              console.log("tambah tr status id = 3")

              let nomor = `<td>`+ parseInt(index+1) +`</td>`;
              let pelanggan = `<td>`+ val.pelanggan.toUpperCase() +` <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail_pelanggan" style="float: right;" onclick="detail_pelanggan(`+ val.id_pelanggan +`)">Detail</button></td>`;
              let proses = `<button class="btn btn-danger btn-sm")">Hapus</button>`
                if (val.id_tipe == 0){
                      hpttd(val.id_perbaikan)
                      $('#tabel_perbaikan_ditolak').append(function () {
                        return `<tr id="`+ val.id_perbaikan +`">
                          `+ nomor +`
                          <td>
                          <span id="tipettd_`+ val.id_perbaikan +`"></span>
                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp_ttd(`+ val.id_perbaikan +`)">Detail</button>
                          </td>
                          `+ pelanggan +`<td class="tanggal">`+tanggal(val.tanggal)+`</td>
                          <td>`+ proses +`</td>
                        </tr>`              
                      });
                  }
                  if (val.id_tipe != 0){
                  $('#tabel_perbaikan_ditolak').append(function () {
                    return `<tr id="`+ val.id_perbaikan +`">
                      `+ nomor +`
                      <td>
                      `+ val.merk.toUpperCase() +` - `+ val.tipe +`
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp(`+ val.id_perbaikan +`)">Detail</button>
                      </td>
                      `+ pelanggan +`<td class="tanggal">`+tanggal(val.tanggal)+`</td>
                      <td>`+ proses +`</td>
                    </tr>`              
                  });
              }
            }

          });
        }
      }).fail(function() {
        console.log("data hp error");
      });
  }

  // ====FUNCTION AMBIL DATA hp YG TIDAK TERDAFTAR===

  function hpttd(id) {
    var kodes = id;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('mitra/hpTtd'); ?>",
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
          text += data[i].merk_hp + ' - ' + data[i].tipe_hp;
        }
        $('#tipettd_' + id).text(text);
      }
    });
  }

  // ============== FUNCTION AMBIL DETAIL hp ==============

  function detail_hp(id) {
    checkConnection()
    var kodes = id;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('mitra/detail_hp'); ?>",
      async: true,
      dataType: 'json',
      data: {
        kode: kodes
      },
      cache: false,
      success: function(data) {
        var merk = '';
        var tipe = '';
        var kerusakan = '';
        var kerusakan_lain = '';
        var i;
        for (i = 0; i < data.length; i++) {
          merk += data[i].merk;
          tipe += data[i].tipe;
          kerusakan += data[i].kerusakan;
          kerusakan_lain += data[i].kerusakan_lain;
        }
        $('.hp_merk').text(merk);
        $('.hp_tipe').text(tipe);
        if (kerusakan == 'null') {
          $('.hp_kerusakan').text('-');
        } else {
          $('.hp_kerusakan').text(kerusakan);
        }

        if (kerusakan_lain == '') {
          $('.hp_kerusakan_lain').text('-');
        } else {
          $('.hp_kerusakan_lain').text(kerusakan_lain);
        }

      }
    });
  }

  function detail_hp_ttd(id) {
    checkConnection()
    var kodes = id;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('mitra/detail_hp_ttd'); ?>",
      async: true,
      dataType: 'json',
      data: {
        kode: kodes
      },
      cache: false,
      success: function(data) {
        var merk = '';
        var tipe = '';
        var kerusakan = '';
        var kerusakan_lain = '';
        var i;
        for (i = 0; i < data.length; i++) {
          merk += data[i].merk;
          tipe += data[i].tipe;
          kerusakan += data[i].kerusakan;
          kerusakan_lain += data[i].kerusakan_lain;
        }
        $('.hp_merk').text(merk);
        $('.hp_tipe').text(tipe);
        if (kerusakan == 'null') {
          $('.hp_kerusakan').text('-');
        } else {
          $('.hp_kerusakan').text(kerusakan);
        }

        if (kerusakan_lain == '') {
          $('.hp_kerusakan_lain').text('-');
        } else {
          $('.hp_kerusakan_lain').text(kerusakan_lain);
        }

      }
    });
  }

  function detail_hp_(id_perbaikan, id_tipe) {
    $('#id_perbaikan_hp').val(id_perbaikan);
    if (id_tipe != 0) {
      $.ajax({
        url: '<?= base_url('mitra/detail_hp'); ?>',
        async: true,
        type: 'post',
        dataType: 'json',
        data: {
          kode: id_perbaikan
        },
        cache: false,
        success: function(data) {
          if (data[0].kerusakan != null) {
            $('.modal_barang_hp').text(data[0].merk.toUpperCase() + ' - ' + data[0].tipe.toUpperCase());
            $('.modal_kerusakan_hp').text(data[0].kerusakan + ' - ' + data[0].kerusakan_lain);
          } else {
            $('.modal_barang_hp').text(data[0].merk.toUpperCase() + ' - ' + data[0].tipe.toUpperCase());
            $('.modal_kerusakan_hp').text(data[0].kerusakan_lain);
          }
        }
      }).fail(function() {
        console.log("error detail_hp_");
      });
    } else {
      $.ajax({
        url: '<?= base_url('mitra/detail_hp_ttd'); ?>',
        async: true,
        type: 'post',
        dataType: 'json',
        data: {
          kode: id_perbaikan
        },
        cache: false,
        success: function(data) {

          if (data[0].kerusakan != null) {
            $('.modal_barang_hp').text(data[0].merk.toUpperCase() + ' - ' + data[0].tipe.toUpperCase());
            $('.modal_kerusakan_hp').text(data[0].kerusakan + ' - ' + data[0].kerusakan_lain);
          } else {
            $('.modal_barang_hp').text(data[0].merk.toUpperCase() + ' - ' + data[0].tipe.toUpperCase());
            $('.modal_kerusakan_hp').text(data[0].kerusakan_lain);
          }
        }
      }).fail(function() {
        console.log("error detail_hp_");
      });
    }

  }

  function detail_tolak(id_perbaikan) {
    $('#id_perbaikan_hpx').val(id_perbaikan);
  }

  // ====================== FUNCTION DETAIL PELANGGAN ==================

  function detail_pelanggan(id) {
    checkConnection()
    var kodes = id;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('mitra/detail_pelanggan'); ?>",
      async: true,
      dataType: 'json',
      data: {
        kode: kodes
      },
      cache: false,
      success: function(data) {
        $('.nama_pelanggan').text(data[0].nama.toUpperCase())
        $('.email__pelanggan').text(data[0].email.toUpperCase())
        $('.no_tlp_pelanggan').text(data[0].no_tlp.toUpperCase())
        $('.alamat_pelanggan').text(data[0].alamat.toUpperCase())
      }
    });
  }


  // ============================ VOUCHER ===========================

  function voucher() {
    var result = '';
    var character = 'abcdefghijklmnopqrstuvwxyz0123456789';
    var characterLength = character.length;
    for (var i = 0; i < 7; i++) {
      result += character.charAt(Math.floor(Math.random() * characterLength));
    }
    $('.kode_voucher').text(result);
    $('#voucherhp').val(result);
  }

  // ======================== TANGGAL =====================
  function tanggal (tanggal) {
    var dariSekarang = moment(tanggal, "Do MMMM YYYY, HH:mm:ss").fromNow()
    
    return tanggal.split(',', 1) + ' - ' + dariSekarang;
  }

</script>
<div class="content-wrapper mt-5">
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

    <div class="card">
      <div class="card-header bg-dark" data-card-widget="collapse">
        <h3 class="card-title">Pengajuan Pelanggan</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th style="width: 30%;">Barang</th>
              <th style="width: 30%;">Pelanggan</th>
              <th style="width: 20%;">Tanggal Pengajuan</th>
              <th style="width: 20%;">Proses</th>

            </tr>
          </thead>
          <tbody id="tabel_pengajuan">
            
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card collapsed-card">
      <div class="card-header bg-dark" data-card-widget="collapse">
        <h3 class="card-title">Perbaikan diterima</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th style="width: 30%;">Barang</th>
              <th style="width: 30%;">Pelanggan</th>
              <th style="width: 20%;">Tanggal Diterima</th>
              <th style="width: 20%;">Proses</th>
            </tr>
          </thead>
          <tbody id="tabel_perbaikan_diterima">
          </tbody>
        </table>
      </div>
    </div>

    <div class="card collapsed-card">
      <div class="card-header bg-dark" data-card-widget="collapse">
        <h3 class="card-title">Perbaikan Ditolak</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th style="width: 30%;">Barang</th>
              <th style="width: 30%;">Pelanggan</th>
              <th style="width: 20%;">Tanggal Ditolak</th>
              <th style="width: 20%;">Proses</th>
            </tr>
          </thead>
          <tbody id="tabel_perbaikan_ditolak">
           
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>



<!-- ==========  BAGIAN MODAL ============= -->

<div class="modal fade" id="detailhp">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="container-fluid">
          <table class="table table-bordered">
            <tr class="bg-dark">
              <th><b>Judul</b></th>
              <th><b>Data</b></th>
            </tr>

            <tr>
              <td>Jenis</td>
              <td>hp</td>
            </tr>
            <tr>
              <td>Merk</td>
              <td class="hp_merk"></td>
            </tr>
            <tr>
              <td>Tipe</td>
              <td class="hp_tipe"></td>
            </tr>
            <tr>
              <td>Kerusakan</td>
              <td class="hp_kerusakan"></td>
            </tr>
            <tr>
              <td>Kerusakan Lain</td>
              <td class="hp_kerusakan_lain"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="detail_pelanggan">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="container-fluid">
          <table class="table table-bordered">
            <tr class="bg-dark">
              <th><b>Judul</b></th>
              <th><b>Data</b></th>
            </tr>
            <tr>
              <td>Nama</td>
              <td class="nama_pelanggan"></td>
            </tr>
            <tr>
              <td>Email</td>
              <td class="email__pelanggan"></td>
            </tr>
            <tr>
              <td>No Telpon</td>
              <td class="no_tlp_pelanggan"></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td class="alamat_pelanggan"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="terima_hp" tabindex="-1" role="dialog" aria-labelledby="terimahpLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="terimahpLabel">Terima Pengajuan hp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_terima_hp" method="post">
        <div class="modal-body">
          <table class="table table-bordered">
            <tr class="bg-dark">
              <td style="text-align: center;"><b>Barang</b></td>
              <td><b>hp</b></td>
            </tr>
            <tr>
              <td style="text-align: center;"><b>Merk & Tipe</b></td>
              <td style="font-weight: bold;" class="modal_barang_hp"></td>
            </tr>
            <tr>
              <td style="text-align: center;"><b>Kerusakan</b></td>
              <td style="font-weight: bold;" class="modal_kerusakan_hp"></td>
            </tr>
            <tr>
              <td style="text-align: center;"><b>Voucher</b></td>
              <td class="kode_voucher" style="font-size: 16px; font-weight: bold;"></td>
            </tr>

          </table>
          <div class="form-group mt-20">
            <input type="text" id="id_perbaikan_hp" name="id_perbaikan_hp" hidden>
            <input type="text" id="voucherhp" name="voucherhp" hidden>
            <input type="text" id="tanggal" name="tanggal" hidden>
            <input class="form-control" id="hargahp" name="hargahp" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Harga Rupiah">
          </div>
          <p class="hargahp" style="color: red;"></p>
          <div class="form-group mt-20">
            <input class="form-control" id="kethplain" name="kethplain" type="text" placeholder="Keterangan Lain">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Terima Permintaan</button>

        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="tolak_hp" tabindex="-1" role="dialog" aria-labelledby="tolak_hp" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tolakhpLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form action="<?= base_url(); ?>mitra/tolakperbaikanhp" method="POST">
            <input type="text" id="id_perbaikan_hpx" name="id_perbaikan_hpx" hidden>
            <select class="form-control" id="alasanPenolakanhp">
              <option selected="true" disabled="">Alasan Penolakan</option>
              <option>Teknisi Belum Ready</option>
              <option>Permintaan Masih Penuh</option>
              <option>Permintaan Tidak Benar</option>
              <option style="color: red;" value="false">Alasan Lain</option>
            </select>
        </div>
        <div class="form-group mt-20">
          <input class="form-control" id="ketpenolakanhp" name="ketpenolakanhp" type="text" placeholder="Alasan Anda">
          <input type="text" id="tanggal" name="tanggal" hidden>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Tolak Permintaan</button>
        </form>
      </div>
    </div>
  </div>
</div>