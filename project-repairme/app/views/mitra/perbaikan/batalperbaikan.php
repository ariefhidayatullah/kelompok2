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
                  Keterangan
                </th>
                <th style="width: 15%">
                  Harga
                </th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($data['perbaikan']['perbaikan_laptop']); $i++):?>
              <?php if ($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == '6'):?>
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

                 <td>
                  <ul class="list-inline">
                    <?= $data['perbaikan']['perbaikan_laptop'][$i]['keterangan_mitra']; ?>
                  </ul>
                </td>
                <td >
                  <ul class="list-inline">
                    <?= $data['perbaikan']['harga'][$i]; ?>
                  </ul>
                </td>
                 <td>
                  <ul class="list-inline">
                    <?php if($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == 4): ?>
                    <button class="btn btn-dark btn-sm btn-p-laptop" data-toggle="modal" data-target="#ketlaptop" value="<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan']; ?>">
                      Ubah Keterangan
                    </button>
                   <?php endif; ?>
                    <?php if($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == 5): ?>
                    <p style="color: red">
                      Menunggu Persetujuan Penambahan Harga
                    </p>
                  <?php endif; ?>
                  </ul>
                </td>
                <td>
                  <ul class="list-inline">
                    <td>
                        <?php if($data['perbaikan']['notif'][$i][0] != NULL): ?>
                          <?php if($data['perbaikan']['notif'][$i][0]['dibaca'] == 'n'): ?>
                            <script>
                                $(document).ready(function(){
                                  $(document).Toasts('create', {
                                  title: 'Dari <?= $data['perbaikan']["pelanggan"][$i][0]["nama"]; ?>',
                                  body: 'Pesan Untuk Anda :<strong> <?= $_SESSION['login']['data']['nama']; ?></strong><br> Anda mendapatkan pesan terbaru, terkait perbaikan yang anda lakukan.',
                                  class: 'bg-white',
                                  subtitle: 'Notifikasi',
                                  icon: 'fas fa-envelope fa-lg'
                                })
                                });
                            </script>
                            <?php endif; ?>
                        <ul class="list-inline">
                        <?php if ($data['perbaikan']['notif'][$i][0]['notifikasi'] == 'batalkan_perbaikan'):?>
                          <a class="btn btn-app ceknotiflaptop" data-toggle="modal" data-target="#btllaptop" id="<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan'];?>">
                            <i class="fas fa-envelope"></i>Pesan
                          </a>
                        <?php endif; ?>
                        </ul>
                      
                        <?php endif; ?>
                      </td>
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
                  Laptop
                </th>
                <th style="width: 13%;">
                  Kerusakan
                </th>
                <th style="width: 15%">
                  Keterangan
                </th>
                <th style="width: 15%">
                  Harga
                </th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($data['perbaikan2']['perbaikan_hp']); $i++):?>
              <?php if ($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == '6'):?>
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

                 <td>
                  <ul class="list-inline">
                    <?= $data['perbaikan2']['perbaikan_hp'][$i]['keterangan_mitra']; ?>
                  </ul>
                </td>
                <td >
                  <ul class="list-inline">
                    <?= $data['perbaikan2']['harga'][$i]; ?>
                  </ul>
                </td>
                 <td>
                  <ul class="list-inline">
                    <?php if($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == 4): ?>
                    <button class="btn btn-dark btn-sm btn-p-hp" data-toggle="modal" data-target="#kethp" value="<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan']; ?>">
                      Ubah Keterangan
                    </button>
                   <?php endif; ?>
                    <?php if($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == 5): ?>
                    <p style="color: red">
                      Menunggu Persetujuan Penambahan Harga
                    </p>
                  <?php endif; ?>
                  </ul>
                </td>
                <td>
                  <ul class="list-inline">
                    <td>
                        <?php if($data['perbaikan2']['notif'][$i][0] != NULL): ?>
                          <?php if($data['perbaikan2']['notif'][$i][0]['dibaca'] == 'n'): ?>
                            <script>
                                $(document).ready(function(){
                                  $(document).Toasts('create', {
                                  title: 'Dari <?= $data['perbaikan2']["pelanggan"][$i][0]["nama"]; ?>',
                                  body: 'Pesan Untuk Anda :<strong> <?= $_SESSION['login']['data']['nama']; ?></strong><br> Anda mendapatkan pesan terbaru, terkait perbaikan yang anda lakukan.',
                                  class: 'bg-white',
                                  subtitle: 'Notifikasi',
                                  icon: 'fas fa-envelope fa-lg'
                                })
                                });
                            </script>
                            <?php endif; ?>
                        <ul class="list-inline">
                        <?php if ($data['perbaikan2']['notif'][$i][0]['notifikasi'] == 'batalkan_perbaikan2'):?>
                          <a class="btn btn-app ceknotifhp" data-toggle="modal" data-target="#btlhp" id="<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan'];?>">
                            <i class="fas fa-envelope"></i>Pesan
                          </a>
                        <?php endif; ?>
                        </ul>
                      
                        <?php endif; ?>
                      </td>
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



      <!-- untuk perubahan dll -->
<!-- Modal -->
<div class="modal fade" id="btllaptop" tabindex="-1" role="dialog" aria-labelledby="btllaptopLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="btllaptopLabel">Pemberitahuan</h5>
        
      </div>
      <div class="modal-body">
        Kepada : <?= $_SESSION['login']['data']['nama']; ?>
        <br><br>
        <strong>Pelanggan Membatalkan Perbaikan</strong>
        <p>Silahkan siapkan pengembalian barang untuk perbaikan ini, dan silakan jika setelah bertemu pelanggan terdapat kesepakatan ulang, silahkan masukkan kembali ke voucher pelanggan</p>

        <button type="button" class="btn btn-block btn-warning btn-sm arsiplaptop" data-dismiss="modal" aria-label="Close">Arsipkan Perbaikan</button><br>
        
        <button class="btn btn-block btn-danger btn-sm hapuslaptop" data-dismiss="modal" aria-label="Close">Hapus Perbaikan</button>
      </div>
      <form action="<?= BASEURL; ?>/mitra/arsipbatalperbaikanlaptop" method="POST" id="form_arsiplaptop">
        <input type="text" name="id_arsiplaptop" id="id_arsiplaptop" hidden>
      </form>
      <form action="<?= BASEURL; ?>/mitra/hapusbatalperbaikanlaptop" method="POST" id="form_batallaptop">
        <input type="text" name="id_batallaptop" id="id_batallaptop" hidden>
      </form>
    </div>
  </div>
</div>

<!-- untuk hp   -->

<!-- Modal -->
<div class="modal fade" id="btlhp" tabindex="-1" role="dialog" aria-labelledby="btlhpLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="btlhpLabel">Pemberitahuan</h5>
        
      </div>
      <div class="modal-body">
        Kepada : <?= $_SESSION['login']['data']['nama']; ?>
        <br><br>
        <strong>Pelanggan Membatalkan Perbaikan</strong>
        <p>Silahkan siapkan pengembalian barang untuk perbaikan ini, dan silakan jika setelah bertemu pelanggan terdapat kesepakatan ulang, silahkan masukkan kembali ke voucher pelanggan</p>

        <button type="button" class="btn btn-block btn-warning btn-sm arsiphp" data-dismiss="modal" aria-label="Close">Arsipkan Perbaikan</button><br>
        
        <button class="btn btn-block btn-danger btn-sm hapushp" data-dismiss="modal" aria-label="Close">Hapus Perbaikan</button>
      </div>
      <form action="<?= BASEURL; ?>/mitra/arsipbatalperbaikanhp" method="POST" id="form_arsiphp">
        <input type="text" name="id_arsiphp" id="id_arsiphp" hidden>
      </form>
      <form action="<?= BASEURL; ?>/mitra/hapusbatalperbaikanhp" method="POST" id="form_batalhp">
        <input type="text" name="id_batalhp" id="id_batalhp" hidden>
      </form>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
    $('.arsiplaptop').click(function(){
      $('#id_arsiplaptop').val($('.ceknotiflaptop').attr('id'));
      $('#form_arsiplaptop').submit();
    });

    $('.hapuslaptop').click(function(){
       $('#id_batallaptop').val($('.ceknotiflaptop').attr('id'));
      $('#form_batallaptop').submit();
    });

    $('.arsiphp').click(function(){
      $('#id_arsiphp').val($('.ceknotifhp').attr('id'));
      $('#form_arsiphp').submit();
    });

    $('.hapushp').click(function(){
      $('#id_batalhp').val($('.ceknotifhp').attr('id'));
      $('#form_batalhp').submit();
    });
  });
</script>