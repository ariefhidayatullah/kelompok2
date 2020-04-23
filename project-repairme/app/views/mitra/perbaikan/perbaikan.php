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
                <th style="width: 8%;">
                  Lama
                </th>
                <th style="width: 5%;">
                  detail
                </th>
                <th style="width: 15%">
                  Keterangan
                </th>
                <th style="width: 20%">
                  Harga Awal
                </th>
                <th style="width: 40%">
                  Ubah Data
                </th>
                <th style="width: 30%;">
                  
                </th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($data['perbaikan']['perbaikan_laptop']); $i++):?>
              <?php if ($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == 4 || $data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == 5):?>
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
                   <?php if($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == 4): ?>
                    <?= $data['perbaikan']['waktu'][$i][0]['waktu_hari']; ?>
                  <?php endif; ?>
                  <?php if($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == 5): ?>
                     ---------
                  <?php endif ?>
                  </ul>
                </td>
                <td>
                  <ul class="list-inline">
                     <?php if($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == 4): ?>
                    <button class="btn btn-dark btn-sm btn-p-laptop" data-toggle="modal" data-target="#progress" value="<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan']; ?>">
                        Persentase
                    </button>
                  <?php endif; ?>
                   <?php if($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == 5): ?>
                    <button class="btn btn-secondary btn-sm" disabled>
                        Persentase
                    </button>
                   <?php endif; ?>
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
                      Keterangan
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
                    <?php if($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == 4): ?>
                    <button class="btn btn-success btn-sm selesai-laptop" value="<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan']; ?>">
                      Selesai
                    </button>
                   <?php endif; ?>
                  </ul>
                </td>
                <td>
                  <ul class="list-inline">
                    <td>
                        <?php if($data['perbaikan']['notif'][$i] != NULL): ?>
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
                        <ul class="list-inline">
                        <?php if ($data['perbaikan']['notif'][$i][0]['notifikasi'] == 'lanjut_perbaikan'):?>
                          <a class="btn btn-app dislap" data-toggle="modal" data-target="#lanjutlap" id="<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan'];?>">
                            <i class="fas fa-envelope"></i>Pesan
                          </a>
                        <?php endif; ?>
                        <?php if ($data['perbaikan']['notif'][$i][0]['notifikasi'] == 'batalkan_perbaikan'):?>
                          <a class="btn btn-app tmblap" data-toggle="modal" data-target="#tambahlap" id="<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan'];?>">
                            <i class="fas fa-envelope"></i>Pesan
                          </a>
                        <?php endif; ?>
                        </ul>
                      <?php endif; ?>
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
<br><br>
      <!-- untuk hp -->
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
                <th style="width: 8%;">
                  Lama
                </th>
                <th style="width: 5%;">
                  detail
                </th>
                <th style="width: 15%">
                  Keterangan
                </th>
                <th style="width: 20%">
                  Harga Awal
                </th>
                <th style="width: 40%">
                  Ubah Data
                </th>
                <th style="width: 30%;">
                  
                </th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($data['perbaikan2']['perbaikan_hp']); $i++):?>
              <?php if ($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == 4 || $data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == 5):?>
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
                  <?php if($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == 4): ?>
                   <?= $data['perbaikan2']['waktu'][$i][0]['waktu_hari']; ?>
                  <?php endif; ?>
                  <?php if($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == 5): ?>
                     ---------
                  <?php endif ?>

                  </ul>
                </td>
                <td>
                  <ul class="list-inline">
                    <?php if ($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == 4):?>
                    <button class="btn btn-dark btn-sm btn-p-hp" data-toggle="modal" data-target="#progress" value="<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan']; ?>">
                        Persentase
                    </button>
                  <?php endif; ?>
                  <?php if ($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == 5):?>
                    <button class="btn btn-dark btn-sm btn-p-hp" data-toggle="modal" data-target="#progress" value="<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan']; ?>" disabled>
                        Persentase
                    </button>
                  <?php endif; ?>
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
                      Keterangan
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
                    <?php if($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == 4): ?>
                    <button class="btn btn-success btn-sm selesai-hp" value="<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan']; ?>">
                      Selesai
                    </button>
                   <?php endif; ?>
                   </ul>
                </td>
                <td>
                  <ul class="list-inline">
                    <td>
                        <?php if($data['perbaikan2']['notif'][$i] != NULL): ?>
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
                        <ul class="list-inline">
                        <?php if ($data['perbaikan2']['notif'][$i][0]['notifikasi'] == 'lanjut_perbaikan2'):?>
                          <a class="btn btn-app dishp" data-toggle="modal" data-target="#lanjuthp" id="<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan'];?>">
                            <i class="fas fa-envelope"></i>Pesan
                          </a>
                        <?php endif; ?>
                        <?php if ($data['perbaikan2']['notif'][$i][0]['notifikasi'] == 'batalkan_perbaikan2'):?>
                          <a class="btn btn-app tmbhp" data-toggle="modal" data-target="#tambahhp" id="<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan'];?>">
                            <i class="fas fa-envelope"></i>Pesan
                          </a>
                        <?php endif; ?>
                        </ul>
                      <?php endif; ?>
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

  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper-->
  <!-- untuk pengubahan laptop -->
  <!-- Modal -->
  <div class="modal fade" id="ketlaptop" tabindex="-1" role="dialog" aria-labelledby="ketlaptopLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ketlaptopLabel">Beri Keterangan Lain</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mt-20">
            <form action="<?= BASEURL; ?>/mitra/ubahperbaikan" method="POST" id="formlaptop">
              <input type="text" id="id_perbaikan_laptop" name="id_perbaikan_laptop" hidden>
              <input type="text" id="id_pel_laptop" name="id_pel_laptop" hidden>
              <input class="form-control" id="hrg_laptop_1" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." hidden>
              <button class="btn btn-dark btn_ubh_ket_lap" type="button" style="width: 49%;">
                Ubah Keterangan
              </button>
              <button class="btn btn-dark btn_ket_harga_lap" type="button" style="width: 49%;">
                Ubah Harga
              </button>
            </div>
            <div class="form-group mt-20">
               <button class="btn btn-success diskon_lap" type="button" style="width: 49%;">
                Beri Diskon
              </button>
              <button class="btn btn-warning tmb_hrg_lap" type="button" style="width: 49%;">
                Tambah Harga
              </button>
            </div>
            <div class="form-group">
               <input class="form-control" id="hrg_laptop_ds" disabled>
            </div>
            <div class="form-group mt-20">
              <select class="form-control" id="p_diskon_lap">
                  <option selected="true">Persentase Diskon</option>
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
              <input class="form-control" id="hrg_laptop" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Harga Rupiah">
              <p class="hrg_laptop" style="color: red;"></p>
            </div>
             <div class="form-group mt-20">
              <input class="form-control" id="hrg_laptop_2" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Harga Rupiah">
              <p class="hrg_laptop_2" style="color: red;"></p>
            </div>
            <div class="form-group">
               <input class="form-control" id="hrg_laptop_t" name="hrg_laptop_t" type="text" data-a-sign="Total: Rp. " data-a-dec="," data-a-sep="." disabled>
            </div>
              <input type="text" id="hrg_laptop_final" name="hrg_laptop_final" hidden>
              <input type="text" id="pemberhentian" name="pemberhentian" hidden>
            <div class="form-group mt-20">
              <input class="form-control" id="ketlaptoplain" name="ketlaptoplain" type="text" placeholder="Keterangan">
            </div>
            <div class="form-group mt-20">
               <button class="btn btn-dark ubah_lap" type="button" style="width: 100%;">Ubah</button>
            </div>
          </div>
          </form>
      </div>
    </div>
  </div>

  
  
  <div class="modal fade" id="progress" tabindex="-1" role="dialog" aria-labelledby="progressLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      </button>
    </div>
    <div class="modal-body">
      <div class="content" style="width: 30%; position: absolute; background-color: white; right: 30%; height: 100px;">
        <div class="pers"   style="width: 90%; margin-top: 10px; margin-left: 10px;">
          <p>Persentasi Waktu Berakhir :</p>
          <div class="progress progress-sm">
            
            <div class="progress-bar hithari bg-success"></div>
          </div>
          <span class="badge bg-info persentase"></span>
          <span class="badge bg-info waktuberakhir"></span>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- untuk perubahan dll -->
<!-- Modal -->
<div class="modal fade" id="lanjutlap" tabindex="-1" role="dialog" aria-labelledby="lanjutlapLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lanjutlapLabel">Pemberitahuan</h5>
        
      </div>
      <div class="modal-body">
        Kepada : <?= $_SESSION['login']['data']['nama']; ?>
        <br><br>
        <strong>Pelanggan Menerima Perbaikan Harga</strong>
        <p>Silahkan lanjutkan perbaikan ini, dan untuk anda boleh mengatur ulang tanggal selesai perbaikan!</p>


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
          <form action="<?= BASEURL; ?>/mitra/ubahwaktulaptop" method="POST" id="ubahwaktulaptop">
            <input type="text" name="id_perlapp" id="id_perlapp" hidden>
            <input type="text" id="tanggallaptop" name="tanggallaptop" hidden>
            <input type="text" id="harilaptop" name="harilaptop" hidden>
            <input type="text" id="berakhirlaptop" name="berakhirlaptop" hidden>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-block btn-warning btn-sm ubahwaktulap" data-dismiss="modal" aria-label="Close">Atur Ulang Tanggal</button><br>
        
        <button class="btn btn-block btn-danger btn-sm tidakperlu" data-dismiss="modal" aria-label="Close">Tidak Perlu</button>
      </div>
      <form action="<?= BASEURL; ?>/pelanggan/diskondibaca" method="POST" id="formdiskon">
        <input type="text" name="idper_dislap" id="idper_dislap" hidden>
      </form>
      <form action="<?= BASEURL; ?>/mitra/hapusnotiflanjutperbaikan" method="POST" id="formhapuslanjutperbaikan">
        <input type="text" name="idper_lanlap" id="idper_lanlap" hidden>
      </form>
    </div>
  </div>
</div>


<!-- untuk pengubahan hp -->
    <!-- Modal -->
  <div class="modal fade" id="kethp" tabindex="-1" role="dialog" aria-labelledby="kethpLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kethpLabel">Beri Keterangan Lain</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group mt-20">
            <form action="<?= BASEURL; ?>/mitra/ubahperbaikan2" method="POST" id="formhp">
              <input type="text" id="id_perbaikan_hp" name="id_perbaikan_hp" hidden>
              <input type="text" id="id_pel_hp" name="id_pel_hp" hidden>
              <input class="form-control" id="hrg_hp_1" name="hrg_hp_1" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." hidden>
              <button class="btn btn-dark btn_ubh_ket_hp" type="button" style="width: 49%;">
                Ubah Keterangan
              </button>
              <button class="btn btn-dark btn_ket_harga_hp" type="button" style="width: 49%;">
                Ubah Harga
              </button>
            </div>
            <div class="form-group mt-20">
               <button class="btn btn-success diskon_hp" type="button" style="width: 49%;">
                Beri Diskon
              </button>
              <button class="btn btn-warning tmb_hrg_hp" type="button" style="width: 49%;">
                Tambah Harga
              </button>
            </div>
            <div class="form-group">
               <input class="form-control" id="hrg_hp_ds" disabled>
            </div>
            <div class="form-group mt-20">
              <select class="form-control" id="p_diskon_hp">
                  <option selected="true">Persentase Diskon</option>
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
              <input class="form-control" id="hrg_hp" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Harga Rupiah">
              <p class="hrg_hp" style="color: red;"></p>
            </div>
             <div class="form-group mt-20">
              <input class="form-control" id="hrg_hp_2" name="hrg_hp_2" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Harga Rupiah">
              <p class="hrg_hp_2" style="color: red;"></p>
            </div>
            <div class="form-group">
               <input class="form-control" id="hrg_hp_t" name="hrg_hp_t" type="text" data-a-sign="Total: Rp. " data-a-dec="," data-a-sep="." disabled>
            </div>
              <input type="text" id="hrg_hp_final" name="hrg_hp_final" hidden>
              <input type="text" id="pemberhentian2" name="pemberhentian2" hidden>
            <div class="form-group mt-20">
              <input class="form-control" id="kethplain" name="kethplain" type="text" placeholder="Keterangan">
            </div>
            <div class="form-group mt-20">
               <button class="btn btn-dark ubah_hp" type="button" style="width: 100%;">Ubah</button>
            </div>
          </div>
          </form>
      </div>
    </div>
  </div>
<!-- untuk perubahan dll -->
<!-- Modal -->
<div class="modal fade" id="lanjuthp" tabindex="-1" role="dialog" aria-labelledby="lanjuthpLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lanjuthpLabel">Pemberitahuan</h5>
        
      </div>
      <div class="modal-body">
        Kepada : <?= $_SESSION['login']['data']['nama']; ?>
        <br><br>
        <strong>Pelanggan Menerima Perbaikan Harga</strong>
        <p>Silahkan lanjutkan perbaikan ini, dan untuk anda boleh mengatur ulang tanggal selesai perbaikan!</p>


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
          
          <!-- untuk form lama perbaikan hp -->
          <form action="<?= BASEURL; ?>/mitra/ubahwaktuhp" method="POST" id="ubahwaktuhp">
            <input type="text" name="id_perhpp" id="id_perhpp" hidden>
            <input type="text" id="tanggalhp" name="tanggalhp" hidden>
            <input type="text" id="harihp" name="harihp" hidden>
            <input type="text" id="berakhirhp" name="berakhirhp" hidden>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-block btn-warning btn-sm ubahwaktuhp" data-dismiss="modal" aria-label="Close">Atur Ulang Tanggal</button><br>
        
        <button class="btn btn-block btn-danger btn-sm tidakperlu2" data-dismiss="modal" aria-label="Close">Tidak Perlu</button>
      </div>
      <form action="<?= BASEURL; ?>/pelanggan/diskondibaca" method="POST" id="formdiskon">
        <input type="text" name="idper_dishp" id="idper_dishp" hidden>
      </form>
      <form action="<?= BASEURL; ?>/mitra/hapusnotiflanjutperbaikan2" method="POST" id="formhapuslanjutperbaikan2">
        <input type="text" name="idper_lanhp" id="idper_lanhp" hidden>
      </form>
    </div>
  </div>
</div>

<div>
  <form action="<?= BASEURL; ?>/mitra/selesaiperbaikanlaptop" method="POST" id="selesaiperbaikanlaptop">
    <input type="text" name="idselesaiperbaikanlaptop" id="idselesaiperbaikanlaptop" hidden>
  </form>
  <form action="<?= BASEURL; ?>/mitra/selesaiperbaikanhp" method="POST" id="selesaiperbaikanhp">
    <input type="text" name="idselesaiperbaikanhp" id="idselesaiperbaikanhp" hidden>
  </form>
</div>

<script>
$(document).ready(function(){
  $('#hrg_laptop_2').hide();
  $('#hrg_laptop').hide();
  $('#hrg_laptop_ds').hide();
  $('#hrg_laptop_t').hide();
  $('#ketlaptoplain').hide();
  $('.ubah_lap').hide();
  $('.tmb_hrg_lap').hide();
  $('.diskon_lap').hide();
  $('#p_diskon_lap').hide();
  $('.waktulaptop').hide();
  var harga_awal_lp;
  $('.btn-p-laptop').click(function(){
  <?php for ($i=0; $i < count($data['perbaikan']['perbaikan_laptop']); $i++):?>
  <?php if ($data['perbaikan']['perbaikan_laptop'][$i]['id_status_perbaikan'] == 4):?>
  if ("<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan']; ?>" === $(this).val()) {
    var terakhir = "<?= $data['perbaikan']['waktu'][$i][0]['berakhir']; ?>";
    //untuk mengambil sisa hari
    var now = Math.floor(parseInt(terakhir) - Math.floor(moment())) / 86400000;
    var ambilhari = "<?= $data['perbaikan']['waktu'][$i][0]['waktu_hari']; ?>";
    let jmlHari = ambilhari.split(' ', 1);
    let hariDilalui = parseInt(jmlHari) - Math.floor(now);
    var persentase = Math.floor(hariDilalui) / parseInt(Math.floor(jmlHari)) * 100;
    let get_harga_awal_lp = "<?= $data['perbaikan']['perbaikan_laptop'][$i]['harga']; ?>";
    harga_awal_lp = get_harga_awal_lp;
    $('#id_pel_laptop').val("<?= $data['perbaikan']['pelanggan'][$i][0]['id_pelanggan']; ?>");

    $('#hrg_laptop_ds').val('Harga Awal : ' + harga_awal_lp);
    $('#id_perbaikan_laptop').val("<?= $data['perbaikan']['perbaikan_laptop'][$i]['id_perbaikan']; ?>");
// const countday;
// alert(Math.floor(persentase));
  $('.waktuberakhir').text('waktu tinggal : '+Math.floor(now) + ' hari');
  if (persentase <= 50) {
  $('.hithari').attr('style', 'width:' + persentase + '%;');
  $('.persentase').text(Math.floor(persentase) + '%');
  }else if (persentase > 50 && persentase < 75) {
  $('.hithari').attr('style', 'width:' + persentase + '%;');
  $('.hithari').addClass('bg-warning');
  $('.persentase').text(Math.floor(persentase) + '%')
  }else{
  $('.hithari').attr('style', 'width:' + persentase + '%;');
  $('.hithari').addClass('bg-danger');
  $('.persentase').text(Math.floor(persentase) + '%')
  }
  }
<?php endif; ?>
<?php endfor; ?>
});


  $('.btn_ubh_ket_lap').click(function(){
    $('#hrg_laptop_2').hide();
    $('#hrg_laptop').hide();
    $('#hrg_laptop_ds').hide();
    $('#hrg_laptop_t').hide();
    $('#ketlaptoplain').hide();
    $('.ubah_lap').hide();
    $('.tmb_hrg_lap').hide();
    $('.diskon_lap').hide();
    $('#p_diskon_lap').hide();
    $('.tmb_hrg_lap').hide();
    $('.diskon_lap').hide();
    $('#ketlaptoplain').show();
    $('.ubah_lap').show();
  });

  $('.btn_ket_harga_lap').click(function(){
    $('.hrg_laptop_2').text('');
    $('#hrg_laptop_2').hide();
    $('#p_diskon_lap').hide();
    $('.hrg_laptop').text('');
    $('#hrg_laptop_ds').hide();
    $('#hrg_laptop_t').hide();
    $('#ketlaptoplain').hide();
    $('#hrg_laptop').hide();
    $('#hrg_laptop').val('');
    $('.ubah_lap').hide();
    $('#hrg_laptop').hide();
    $('.tmb_hrg_lap').show();
    $('.diskon_lap').show();
   });

  $('.tmb_hrg_lap').click(function(){
     $('#hrg_laptop_2').hide();
    $('#hrg_laptop').autoNumeric('init');
    $('#p_diskon_lap').hide();
    $('.hrg_laptop').text('');
    $('.tmb_hrg_lap').hide();
    $('.diskon_lap').hide();
    $('#ketlaptoplain').show();
    $('#hrg_laptop').show();
    $('.ubah_lap').show();
    $('#hrg_laptop_ds').show();
    $('#hrg_laptop_t').hide();

  });

  $('#hrg_laptop').keyup(function(){
    $('#hrg_laptop_t').autoNumeric('destroy');
    $('#hrg_laptop_1').autoNumeric('destroy');
    let harga = parseInt($(this).val().split('Rp').pop().split('.').join(""));
    let hrg_awl = parseInt(harga_awal_lp.split('Rp.').pop().split('.').join(""));
    var total = hrg_awl + harga;
    $('#hrg_laptop_t').val(total);
    $('#hrg_laptop_1').val(total);
    $('#hrg_laptop_1').autoNumeric('init');
    $('#hrg_laptop_t').autoNumeric('init');
    $('#hrg_laptop_t').show();
    // $('#hrg_laptop_ttl').show();
    var awl =  hrg_awl - harga;
    var persentase = Math.floor(harga / hrg_awl * 100);

    if (persentase > 20) {
      $('.hrg_laptop').html('Anda menaikkan ' + persentase + '% harga!'+"<br><strong>"+' Perbaikan akan di hentikan untuk menunggu persetujuan pelanggan '+"</strong><br>"+' Jika pelanggan menolak, silahkan kembalikan barang pelanggan, dan jika pelanggan menerima silahkan lanjutkan perbaikan');
    }else{
      $('.hrg_laptop').text('');
    }
  })

  $('.diskon_lap').click(function(){
    $('#p_diskon_lap').show();
    $('.hrg_laptop_2').text('');
    $('.tmb_hrg_lap').hide();
    $('.diskon_lap').hide();
    $('#ketlaptoplain').show();
    $('#hrg_laptop_2').hide();
    $('.ubah_lap').show();
    $('#hrg_laptop_ds').show();
    $('#p_diskon_lap').show();
    
  });

  $('#p_diskon_lap').change(function(){
    $('#hrg_laptop_2').autoNumeric('destroy');
    let hrg_awl = parseInt(harga_awal_lp.split('Rp.').pop().split('.').join(""));
    var diskon = hrg_awl * parseInt($('#p_diskon_lap').val()) / 100;
    var total = hrg_awl - diskon;
    $('#hrg_laptop_2').val(Math.floor(total));
    $('#hrg_laptop_2').autoNumeric('init');
    $('.hrg_laptop_2').text('Harga Awal Di Kurangi Diskon'); 
    $('#hrg_laptop_2').show();
  });

  $('#hrg_laptop_2').keyup(function(){
    let hrg_awl = parseInt(harga_awal_lp.split('Rp.').pop().split('.').join(""));
    $('.hrg_laptop_2').text('Perhatikan Harga Yang Anda Masukkan!');
    if ($(this).autoNumeric('get') >= hrg_awl) {
      $('.hrg_laptop_2').text('Harga Baru Anda Melebihi Harga Awal!!!!');
    }
  });


  $('.ubah_lap').click(function(){
     if ($('#ketlaptoplain').val() === '') {
      alert('Keterangan Harus Di Isi');
    }else {
      if ($('#hrg_laptop_2').val() === '') {
          $('#pemberhentian').val('true');
          $('#hrg_laptop_final').val($('#hrg_laptop_1').val());
          $('#formlaptop').submit();  
      }else if($('#hrg_laptop_1').val() == ''){
        $('#pemberhentian').val('false');
        $('#hrg_laptop_final').val($('#hrg_laptop_2').val());
        $('#formlaptop').submit();
      }
      
    }
  });

  $('#ketlaptop').on('hidden.bs.modal',function(){
    location.reload();
  });

    //Date range button
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

    $('.ubahwaktulap').click(function(){
      // alert($('#id_perlapp').val());
      if ($('#harilaptop').val() == '') {
        alert('Pilih Tanggal Terlebih Dahulu!');
      }else{
        $('#ubahwaktulaptop').submit();  
      }
      
    });

    $('.dislap').click(function(){
      $('#id_perlapp').val($('.dislap').attr('id'));
    });

   $('.tidakperlu').click(function(){
    $('#idper_lanlap').val($('.dislap').attr('id'));
    $('#formhapuslanjutperbaikan').submit();
   });

   var selesai = false;

   $('.selesai-laptop').click(function(){
    konfirmasi();
    if (selesai == true) {
      $('#idselesaiperbaikanlaptop').val($(this).val());
      $('#selesaiperbaikanlaptop').submit();
    }else{
      alert('Silahkan Selesaikan Perbaikan');
    }
   });
   $('.selesai-hp').click(function(){
     konfirmasi();
    if (selesai == true) {
      $('#idselesaiperbaikanhp').val($(this).val());
      $('#selesaiperbaikanhp').submit();
    }else{
      alert('Silahkan Selesaikan Perbaikan');
    }
   });

   function konfirmasi(){
    if (confirm('Apakah Perbaikan Telah Selesai?')) {
      selesai = true;
    }else{
      selesai = false;
    }
   }
});

</script>

<script>
  $(document).ready(function(){
  $('#hrg_hp_2').hide();
  $('#hrg_hp').hide();
  $('#hrg_hp_ds').hide();
  $('#hrg_hp_t').hide();
  $('#kethplain').hide();
  $('.ubah_hp').hide();
  $('.tmb_hrg_hp').hide();
  $('.diskon_hp').hide();
  $('#p_diskon_hp').hide();
  $('.waktuhp').hide();

  var harga_awal_hp;
  $('.btn-p-hp').click(function(){
  <?php for ($i=0; $i < count($data['perbaikan2']['perbaikan_hp']); $i++):?>
  <?php if ($data['perbaikan2']['perbaikan_hp'][$i]['id_status_perbaikan'] == 4):?>
  if ("<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan']; ?>" === $(this).val()) {
    var terakhir = "<?= $data['perbaikan2']['waktu'][$i][0]['berakhir']; ?>";
    //untuk mengambil sisa hari
    var now = Math.floor(parseInt(terakhir) - Math.floor(moment())) / 86400000;
    var ambilhari = "<?= $data['perbaikan2']['waktu'][$i][0]['waktu_hari']; ?>";
    let jmlHari = ambilhari.split(' ', 1);
    let hariDilalui = parseInt(jmlHari) - Math.floor(now);
    var persentase = Math.floor(hariDilalui) / parseInt(Math.floor(jmlHari)) * 100;
    let get_harga_awal_lp = "<?= $data['perbaikan2']['perbaikan_hp'][$i]['harga']; ?>";
    harga_awal_hp = get_harga_awal_lp;

    $('#hrg_hp_ds').val('Harga Awal : ' + harga_awal_hp);
    $('#id_perbaikan_hp').val("<?= $data['perbaikan2']['perbaikan_hp'][$i]['id_perbaikan']; ?>");
    
// const countday;

  $('.waktuberakhir').text('waktu tinggal : '+Math.floor(now) + ' hari');
  if (persentase <= 50) {
  $('.hithari').attr('style', 'width:' + persentase + '%;');
  $('.persentase').text(Math.floor(persentase) + '%');
  }else if (persentase > 50 && persentase < 75) {
  $('.hithari').attr('style', 'width:' + persentase + '%;');
  $('.hithari').addClass('bg-warning');
  $('.persentase').text(Math.floor(persentase) + '%')
  }else{
  $('.hithari').attr('style', 'width:' + persentase + '%;');
  $('.hithari').addClass('bg-danger');
  $('.persentase').text(Math.floor(persentase) + '%')
  }
  }
<?php endif; ?>
<?php endfor; ?>
});


  $('.btn_ubh_ket_hp').click(function(){
    $('#hrg_hp_2').hide();
    $('#hrg_hp').hide();
    $('#hrg_hp_ds').hide();
    $('#hrg_hp_t').hide();
    $('#kethplain').hide();
    $('.ubah_hp').hide();
    $('.tmb_hrg_hp').hide();
    $('.diskon_hp').hide();
    $('#p_diskon_hp').hide();
    $('.tmb_hrg_hp').hide();
    $('.diskon_hp').hide();
    $('#kethplain').show();
    $('.ubah_hp').show();
  });

  $('.btn_ket_harga_hp').click(function(){
    $('.hrg_hp_2').text('');
    $('#hrg_hp_2').hide();
    $('#p_diskon_hp').hide();
    $('.hrg_hp').text('');
    $('#hrg_hp_ds').hide();
    $('#hrg_hp_t').hide();
    $('#kethplain').hide();
    $('#hrg_hp').hide();
    $('#hrg_hp').val('');
    $('.ubah_hp').hide();
    $('#hrg_hp').hide();
    $('.tmb_hrg_hp').show();
    $('.diskon_hp').show();
   });

  $('.tmb_hrg_hp').click(function(){
     $('#hrg_hp_2').hide();
    $('#hrg_hp').autoNumeric('init');
    $('#p_diskon_hp').hide();
    $('.hrg_hp').text('');
    $('.tmb_hrg_hp').hide();
    $('.diskon_hp').hide();
    $('#kethplain').show();
    $('#hrg_hp').show();
    $('.ubah_hp').show();
    $('#hrg_hp_ds').show();
    $('#hrg_hp_t').hide();

  });

   $('#hrg_hp').keyup(function(){

    $('#hrg_hp_t').autoNumeric('destroy');
    $('#hrg_hp_1').autoNumeric('destroy');
    let harga = parseInt($(this).val().split('Rp').pop().split('.').join(""));
    let hrg_awl = parseInt(harga_awal_hp.split('Rp.').pop().split('.').join(""));
    var total = hrg_awl + harga;
    $('#hrg_hp_t').val(total);
    $('#hrg_hp_1').val(total);
    $('#hrg_hp_1').autoNumeric('init');
    $('#hrg_hp_t').autoNumeric('init');
    $('#hrg_hp_t').show();
    // $('#hrg_hp_ttl').show();
    var awl =  hrg_awl - harga;
    var persentase = Math.floor(harga / hrg_awl * 100);

    if (persentase > 20) {
      $('.hrg_hp').html('Anda menaikkan ' + persentase + '% harga!'+"<br><strong>"+' Perbaikan akan di hentikan untuk menunggu persetujuan pelanggan '+"</strong><br>"+' Jika pelanggan menolak, silahkan kembalikan barang pelanggan, dan jika pelanggan menerima silahkan lanjutkan perbaikan');
    }else{
      $('.hrg_hp').text('');
    }
  })

  $('.diskon_hp').click(function(){
    $('#p_diskon_hp').show();
    $('.hrg_hp_2').text('');
    $('.tmb_hrg_hp').hide();
    $('.diskon_hp').hide();
    $('#kethplain').show();
    $('#hrg_hp_2').hide();
    $('.ubah_hp').show();
    $('#hrg_hp_ds').show();
    $('#p_diskon_hp').show();
    
  });

  $('#p_diskon_hp').change(function(){
    
    $('#hrg_hp_2').autoNumeric('destroy');
    let hrg_awl = parseInt(harga_awal_hp.split('Rp.').pop().split('.').join(""));
    var diskon = hrg_awl * parseInt($('#p_diskon_hp').val()) / 100;
    var total = hrg_awl - diskon;
    $('#hrg_hp_2').val(Math.floor(total));
    
    $('#hrg_hp_2').autoNumeric('init');
    $('.hrg_hp_2').text('Harga Awal Di Kurangi Diskon'); 
    $('#hrg_hp_2').show();
  });

  $('#hrg_hp_2').keyup(function(){
    // alert('oke');
    let hrg_awl = parseInt(harga_awal_hp.split('Rp.').pop().split('.').join(""));
    $('.hrg_hp_2').text('Perhatikan Harga Yang Anda Masukkan!');
    if ($(this).autoNumeric('get') >= hrg_awl) {
      $('.hrg_hp_2').text('Harga Baru Anda Melebihi Harga Awal!!!!');
    }
  });
 $('.ubah_hp').click(function(){
     if ($('#kethplain').val() === '') {
      alert('Keterangan Harus Di Isi');
    }else {
      if ($('#hrg_hp_2').val() === '') {
          $('#pemberhentian2').val('true');
          $('#hrg_hp_final').val($('#hrg_hp_1').val());
          $('#formhp').submit();  
      }else{
        $('#pemberhentian2').val('false');
        $('#hrg_hp_final').val($('#hrg_hp_2').val());
        $('#formhp').submit();
      }
      
    }
  });

  $('#kethp').on('hidden.bs.modal',function(){
    location.reload();
  });

    //Date range button
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

    $('.ubahwaktuhp').click(function(){
      if ($('#tanggalhp').val() == '') {
        alert('Pilih Tanggal Terlebih Dahulu');
      }else{
        $('#ubahwaktuhp').submit();
      }
    });

    $('.dishp').click(function(){
      $('#id_perhpp').val($('.dishp').attr('id'));
    });
    $('.tidakperlu2').click(function(){
    $('#idper_lanhp').val($('.dishp').attr('id'));
    $('#formhapuslanjutperbaikan2').submit();
   });

  

});
</script>