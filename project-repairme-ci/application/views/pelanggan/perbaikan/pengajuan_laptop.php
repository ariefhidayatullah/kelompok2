<!-- =============== JAVA SCRIPT =============== -->
<script>
  // ================CHECK CONNECTION==============
   jQuery(document).ready(function($) {
    data_laptop()
    setInterval(function () {
      data_laptop()
    }, 1000);
   });
   let button = '';
   function data_laptop () {
     $.ajax({
       url: '<?= base_url(); ?>pelanggan/data_laptop',
       type: 'get',
       dataType: 'json',
       cache: true,
       success: function (data) {
         $.each(data, function(index, val) {

          // ========== HAPUS TR SELAIN ID STATUS 1 2 3 =======

            if ((val.id_status_perbaikan != 2 && val.id_status_perbaikan != 1 && val.id_status_perbaikan != 3) && (val.id_perbaikan == $('#tabel_pengajuan tr#'+val.id_perbaikan).attr('id'))) {
              console.log('id_status != 1 2 3')
              $('#tabel_pengajuan tr#'+val.id_perbaikan).remove();
            }

            // =================== ATTRIBUTE TABLE PENGAJUAN PERBAIKAN =================
            if ((val.id_status_perbaikan == 2 || val.id_status_perbaikan == 3 || val.id_status_perbaikan == 1) && ($('#tabel_pengajuan tr#'+val.id_perbaikan).attr('id') != val.id_perbaikan)) {

              console.log('masuk menambahkan tr')
              
              // ======== PERSIAPAN VARIABLE =======

              let nomor = `<td>`+ parseInt(index+1) +`</td>`;
              let mitra = `<td>`+ val.mitra +`
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailMitra" style="float: right;" onclick="detail_mitra(`+ val.id_mitra +`)">Detail</button>
                  </td>`

              //============= UNTUK BUTTON PROSES========

              if (val.id_status_perbaikan == 1) {
                button = `<td>
                      <button disabled class="btn btn-info btn-sm t-terimaLaptop" data-toggle="modal" data-target="#terimaLaptop" value="">
                        Menunggu Persetujuan
                      </button>
                    </td>`
              }else if (val.id_status_perbaikan == 2) {
                button = `<td>
                      <button class="btn btn-success btn-sm t-terimaLaptop" data-toggle="modal" data-target="#modal_voucher" onclick="ambil_voucher(`+ val.id_perbaikan +`, 'laptop')">
                        Ambil Voucher
                      </button>
                    </td>` 
              }else if (val.id_status_perbaikan == 3) {
                button = `<td>
                      <button class="btn btn-danger btn-sm t-terimaLaptop" data-toggle="modal" data-target="#terimaLaptop" value="">
                        Mitra Menolak
                      </button>
                    </td>`
              }

              if (val.id_tipe == 0) {
                laptopttd(val.id_perbaikan)
                $('#tabel_pengajuan').append(function () {
                  return `<tr id="`+ val.id_perbaikan +`" class="`+ val.id_status_perbaikan +`">
                      `+ nomor +`
                      <td>
                      <span id="tipettd_`+ val.id_perbaikan +`"></span>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailLaptop" style="float: right;" onclick="detail_laptop_ttd(`+ val.id_perbaikan +`)">Detail</button>
                      </td>
                      `+ mitra + `<td>`+ tanggal(val.tanggal) +`</td> `+ button +`
                    </tr>`            
                });
              }
            }

            // ========== HAPUS TR YANG ID PROSESNYA BERUBAH BERDASARKAN CLASS=> TR==========

              if ($('#tabel_pengajuan tr#'+val.id_perbaikan).attr('class') != val.id_status_perbaikan) {
              console.log('ada perubahan status (button_proses)')
              $('#tabel_pengajuan tr#'+val.id_perbaikan).remove();
            }
         });
       }
     }).fail(function() {
       console.log("error data laptop");

     });
     
   
   }

   function checkConnection() {
      var status = navigator.onLine
      if (status) {
        alert('connected')    
      }else{
        setTimeout(function () {
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
      url: "<?= base_url('pelanggan/laptopTtd'); ?>",
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
          text += data[i].merk_laptop + ' - ' + data[i].tipe_laptop;
        }
        $('#tipettd_' + id).text(text);
      }
    });
  }

  // ============== FUNCTION AMBIL DETAIL LAPTOP ==============

  function detail_laptop(id) {
    var kodes = id;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('pelanggan/detail_laptop'); ?>",
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
        $('.laptop_merk').text(merk);
        $('.laptop_tipe').text(tipe);
        if (kerusakan == 'null') {
          $('.laptop_kerusakan').text('-');
        } else {
          $('.laptop_kerusakan').text(kerusakan);
        }

        if (kerusakan_lain == '') {
          $('.laptop_kerusakan_lain').text('-');
        } else {
          $('.laptop_kerusakan_lain').text(kerusakan_lain);
        }

      }
    });
  }

  function detail_laptop_ttd(id) {
    var kodes = id;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('pelanggan/detail_laptop_ttd'); ?>",
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
        $('.laptop_merk').text(merk);
        $('.laptop_tipe').text(tipe);
        if (kerusakan == 'null') {
          $('.laptop_kerusakan').text('-');
        } else {
          $('.laptop_kerusakan').text(kerusakan);
        }

        if (kerusakan_lain == '') {
          $('.laptop_kerusakan_lain').text('-');
        } else {
          $('.laptop_kerusakan_lain').text(kerusakan_lain);
        }

      }
    });
  }

  // ====================== FUNCTION DETAIL MITRA ==================

  function detail_mitra(id) {
    checkConnection()
    var kodes = id;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('pelanggan/detail_mitra'); ?>",
      async: true,
      dataType: 'json',
      data: {
        kode: kodes
      },
      cache: false,
      success: function(data) {
        console.log(data);
        var lat = data[0].lat
        var lng = data[0].lng
        var nama = data[0].nama_usaha.toUpperCase()

        map(lat, lng, nama)
        $('.nama_usaha').text(data[0].nama_usaha.toUpperCase())
        $('.nama_mitra').text(data[0].nama.toUpperCase())
        $('.keahlian').text(data[0].jenis.toUpperCase())
        $('.alamat').text(data[0].alamat.toUpperCase())
        $('.deskripsi').text(data[0].deskripsi.toUpperCase())
        $('.rating').text(data[0].rating.toUpperCase())
        $('.foto_usaha').attr('src', '<?= base_url("gallery/"); ?>' + data[0].foto_usaha)
      }
    });
  }

  function map(lat, lng, nama) {
    setTimeout(function() {

      $('#map').html('<div id="maps" style="height:100%; width:100%;"></div>');
      var popup = L.popup();
      var map = L.map('maps').setView([lat, lng], 17);
      L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);
      var marker = L.marker([lat, lng]).addTo(map).bindPopup(nama).openPopup();
    }, 200);
  }


  // =================== FUNCTION UNTUK HP ===================
  function hpttd(id) {
    var kodes = id;
    $.ajax({
      type: 'POST',
      url: "<?= base_url('pelanggan/hpTtd'); ?>",
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
        $('#tipettdhp_' + id).text(text);
      }
    });
  }

  function ambil_voucher(id, jenis) {
    $.ajax({
        url: '<?= base_url('pelanggan/ambil_voucher') ?>',
        type: 'post',
        dataType: 'json',
        data: {
          id: id,
          jenis: jenis
        },
        success: function(data) {
          console.log(data)
          if (jenis == 'laptop') {
            $('.voucher').text(data[0].voucher_laptop);
          }
          if (jenis == 'hp') {
            $('.voucher').text(data[0].voucher_hp);
          }
        }
      })
      .fail(function() {
        console.log("voucher gagal diambil");
      });

  }

    // ======================== TANGGAL =====================
  function tanggal (tanggal) {
    var dariSekarang = moment(tanggal, "Do MMMM YYYY, HH:mm:ss").fromNow()
    
    return tanggal.split(',', 1) + ' - ' + dariSekarang;
  }

</script>

<!-- ======================END OF JAVASCRIPT====================== -->

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
    <div class="card">
      <div class="card-header bg-dark">
        <h3 class="card-title">Perbaikan Laptop</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered" id="tb_laptop">
          <thead>
            <tr >
              <th style="width: 10px">#</th>
              <th style="width: 30%;">Barang</th>
              <th style="width: 30%;">Mitra</th>
              <th style="width: 20%;">Tanggal</th>
              <th style="width: 20%;">Status</th>

            </tr>
          </thead>
          <tbody id="tabel_pengajuan">

          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>



<!-- ==========  BAGIAN MODAL ============= -->

<div class="modal fade" id="modal_voucher">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="container-fluid">
          <table class="table table-bordered">
            <tr>
              <td><strong>VOUCHER</strong></td>
              <td class="voucher"></td>
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

<div class="modal fade" id="detailLaptop">
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
              <td>Laptop</td>
            </tr>
            <tr>
              <td>Merk</td>
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
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="detailMitra">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <table class="table table-bordered">
          <div class="container-fluid">
            <tr class="bg-dark">
              <th>Lokasi</th>
              <th colspan="2" style="width: 40%;">Data</th>
            </tr>
            <tr>
              <td rowspan="10">
                <div id="map" style="height: 450px; display: block;">

                </div>

              </td>
              <td style="width: 18%;">
                <b>NAMA MITRA</b>
              </td>
              <td class="nama_usaha"> </td>
            </tr>
            <tr>
              <td colspan="2"><img src="" class="foto_usaha"></td>
            </tr>
            <tr>
              <td><b>NAMA PEMILIK</b></td>
              <td class="nama_mitra"> </td>
            </tr>
            <tr>
              <td><b>KEAHLIAN</b></td>
              <td class="keahlian"> </td>
            </tr>
            <tr>
              <td><b>ALAMAT</b></td>
              <td class="alamat"></td>
            </tr>
            <tr>
              <td><b>DESKRIPSI</b></td>
              <td class="deskripsi"></td>
            </tr>
            <tr>
              <td><b>RATING</b></td>
              <td class="rating"></td>
            </tr>
          </div>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->