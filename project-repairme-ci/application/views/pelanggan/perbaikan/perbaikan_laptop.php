<!-- =============== JAVA SCRIPT =============== -->
<script>
  let perbaikan = {};

  // ================JAVASCRIPT UMUM===============
  jQuery(document).ready(function($) {
    
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

  function get_voucher(id) {
    $.ajax({
        url: '<?= base_url('mitra/getVoucherLaptop_ById') ?>',
        type: 'post',
        dataType: 'json',
        data: {
          id: id
        },
        success: function(data) {
          $('.voucher-' + id).text(data[0].voucher_laptop);
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
      url: "<?= base_url('pelanggan/perbaikan_detail_laptop'); ?>",
      async: true,
      dataType: 'json',
      data: {
        id: id,
        jenis: jenis
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
        } else {
          $('.laptop_kerusakan').text('-');
        }
        if (data.kerusakan_lain != '') {
          $('.laptop_kerusakan_lain').text(data.kerusakan_lain);
        } else {
          $('.laptop_kerusakan_lain').text('-');
        }
        if (data.keterangan_mitra != '') {
          $('.keterangan_mitra_dtl').text(data.keterangan_mitra);
        } else {
          $('.keterangan_mitra_dtl').text('-');
        }

      }
    });
  }

  function get_lama_perkiraan(id, jenis) {
    detail_laptop(id, jenis)
    $('.btn_ubah').val(id);
    $.ajax({
      url: '<?= base_url('mitra/get_lama_perkiraan_laptop'); ?>',
      type: 'post',
      dataType: 'json',
      data: {
        id: id
      },
      success: function(data) {
        $.each(data, function(i, val) {
          let total_hari = val.waktu_hari.split(' ', 1);
          let berakhir = Math.floor(Math.floor(parseInt(val.berakhir) - Math.floor(moment())) / 86400000);
          let hari_terlewati = total_hari - berakhir;
          let sisa_hari = total_hari - hari_terlewati;
          let persentase = Math.floor(hari_terlewati / total_hari * 100) + '%';
          $('.persentase_waktu').attr('style', 'width:' + persentase + ';');
          $('.text_persentase_waktu').text(persentase);
          $('.total_hari').text(total_hari + ' Hari');
          $('.sisa_hari').text(sisa_hari + ' Hari lagi');
        });
      }
    });
  }
</script>
<?= $this->session->flashdata('message'); ?>
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
        <h3 class="card-title">Perbaikan Yang Sedang Berlangsung</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <th>Perbaikan</th>
              <th style="width: 25%;">voucher</th>
              <th style="width: 25%;">Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($laptop as $val) : ?>
              <?php if ($val['id_status_perbaikan'] == 4) : ?>
                <tr>
                  <script>
                    get_voucher(<?= $val['id_perbaikan']; ?>)
                  </script>
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
                <?php $i++; ?>
              <?php endforeach; ?>
                </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
        <div class="card">
      <div class="card-header">
        <h3 class="card-title">Menunggu Persetujuan Penambahan Harga</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 5%;">No</th>
              <th>Perbaikan</th>
              <th style="width: 25%;">voucher</th>
              <th style="width: 25%;">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($laptop as $val) : ?>
              <?php if ($val['id_status_perbaikan'] == 5) : ?>
                <tr>
                  <script>
                    get_voucher(<?= $val['id_perbaikan']; ?>)
                  </script>
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
                 <td style="color: red;">Menunggu Persetujuan</td>
                <?php endif; ?>
                <?php $i++; ?>
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
            <!-- ================ CARD PERSENTASE =============== -->

            <table class="table table-bordered mt-3">
              <tr class="bg-gray-dark color-palette">
                <th colspan="2" style="text-align: center;">
                  <strong>Perkiraan Mitra</strong>
                </th>
              </tr>
              <tr>
                <td style="width: 30%;">Persentase Hari</td>
                <td>
                <div class="progress progress-sm active">
                  <div class="progress-bar bg-success progress-bar-striped persentase_waktu" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                    <span class="text_persentase_waktu"></span>
                  </div>
                </div>
                <span style="float: right;"></span>
                </td>
              </tr>
              <tr>
                <td style="width: 30%">Total Hari</td>
                <td class="total_hari"></td>
              </tr>
              <tr>
                <td style="width: 30%">Sisa Hari</td>
                <td class="sisa_hari"></td>
              </tr>
            </table>

            <!-- ================== END OF CARD ============ -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>