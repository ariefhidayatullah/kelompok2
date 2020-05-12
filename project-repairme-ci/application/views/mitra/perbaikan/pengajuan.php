<script>
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
          text += data[i].merk_laptop + ' - ' + data[i].tipe_laptop;
        }
        $('#tipettd').text(text);
      }
    });
  }
</script>
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
      <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th style="width: 30%;">Barang</th>
              <th style="width: 30%;">Pelanggan</th>
              <th style="width: 20%;">Tanggal</th>
              <th style="width: 20%;">Terima / Tolak</th>

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($laptop as $val) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td>
                  <span id="tipettd"></span>
                  <?php if ($val['id_tipe'] == 0) : ?>

                    <!-- ===== FUNCTION JAVASCRIPT ===== -->

                    <script>
                      laptopttd(<?= $val['id_perbaikan']; ?>)
                    </script>

                    <!-- ======END OF JAVASCRIPT==== -->

                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailLaptop" style="float: right;" onclick="detail_laptop_ttd(<?= $val['id_perbaikan']; ?>)">Detail</button>

                  <?php elseif ($val['id_tipe'] != 0) : ?>
                    <?= strtoupper($val['merk']); ?> - <?= $val['tipe']; ?>

                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailLaptop" style="float: right;" onclick="detail_laptop(<?= $val['id_perbaikan']; ?>)">Detail</button>
                  <?php endif; ?>

                </td>
                <td>
                  <?= strtoupper($val['pelanggan']); ?>
                  <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailMitra" style="float: right;" onclick="detail_mitra(<?= $val['id_pelanggan']; ?>)">Detail</button>
                </td>
                <td><?= $val['tanggal']; ?></td>
                <td><button class="btn btn-success btn-sm t-terimahp" data-toggle="modal" data-target="#terimahp" value="<?= $val['id_perbaikan']; ?>" style="width: 70px;">
                    Terima
                  </button>
                  <button class="btn btn-danger btn-sm t-tolakhp" data-toggle="modal" data-target="#tolakHp" value="<?= $val['id_perbaikan']; ?>" style="width: 70px;">
                    Tolak
                  </button></td>
              </tr>
              <?php $i += 1; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
      </div>
    </div>
    <!-- /.card -->
  </section>
</div>

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
          <form action="<?= base_url(); ?>mitra/tolakperbaikanlaptop" method="POST">
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
          <form action="<?= base_url(); ?>mitra/tolakperbaikanhp" method="POST">
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
          <form action="<?= base_url(); ?>mitra/terimaperbaikanlaptop" method="POST">
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
          <form action="<?= base_url(); ?>mitra/terimaperbaikanhp" method="POST">
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