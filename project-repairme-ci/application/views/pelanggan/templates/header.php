<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $judul; ?></title>
  <!-- jQuery -->
  <script src="<?= base_url(); ?>assets/js/jquery-3.4.1.js"></script>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
    <script src="<?= base_url(); ?>assets/panel-master/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/moment-id.js"></script>
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/plugins/toastr/toastr.min.css">

  <!-- untuk leafletjs -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url(); ?>home" class="nav-link">Home</a>
          <div class="waktu"></div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto mr-3">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell" style="font-size: 150%;"></i>
          <span class="jml_pesan_baru"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><span class="jml_pesan_baru"></span> pesan baru untuk <?= strtoupper($this->session->userdata('userData')['nama']); ?></span>
          <div class="dropdown-divider notif_atas"></div>
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Pesan</a>
        </div>
      </li>
      </ul>
      <ul class="navbar-nav">
      <li  class="nav-item">
        <a class="fa fa-sign-out-alt" style="font-size: 150%;" href="<?= base_url('login/logout'); ?>"></a>
          <!-- <span class="float-right text-muted text-sm">keluar</span> -->
      </li>
    </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-light elevation-2">
      <!-- Brand Logo -->
      <a href="<?= base_url('pelanggan'); ?>" class="brand-link">
        <span class="brand-text font-weight-light">
          <center>Repairme</center>
        </span>
      </a>
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url(); ?>assets/panel-master/dist/img/user1.png" class="img-box elevation-2" alt="Foto Profile">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= strtoupper($this->session->userdata('userData')['nama']); ?></a>
          </div>
        </div>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Barang
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">5</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link" id="pengajuan_perbaikan" data-toggle="modal" data-target="#modal-sm" id="permintaan_perbaikan">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengajuan perbaikan</p>
                  </a>
                </li>

                <li class="nav-item" id="perbaikan">
                  <a href="" class="nav-link" data-toggle="modal" data-target="#modal-sm">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perbaikan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url(); ?>pelanggan/batalperbaikan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perbaikan Dibatalkan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url(); ?>pelanggan/selesaiperbaikan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Barang Selesai Di Perbaiki</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url(); ?>pelanggan/riwayatperbaikan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Riwayat Perbaikan</p>
                  </a>
                </li>
              </ul>
            </li>
       
            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Profile Pelanggan
                  <i class="fas fa-angle-left right"></i>
                  <span class="right badge badge-warning">Edit</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url(); ?>pelanggan/profile" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Profile</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url(); ?>Pelanggan/editProfile" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ubah Profile</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-map"></i>
                <p>
                  Mitra
                  <i class="right fas fa-angle-left"></i>
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url(); ?>perbaikan/index" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cari Mitra</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url(); ?>Pelanggan/beriRating" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Berikan Rating</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?= base_url(); ?>Pelanggan/notifikasi" class="nav-link">
                <i class="nav-icon fas fa-map"></i>
                <p>
                  Notifikasi
                </p>
              </a>
            </li>
               </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  </div>
    <div class="modal fade" id="modal-sm">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pilih Permintaan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="option_barang">
            <!-- <p>One fine body&hellip;</p> -->

          </div>
          <div class="modal-footer justify-content-between">
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-sm">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          <div class="modal-body" id="option_barang">
            <!-- <p>One fine body&hellip;</p> -->

          </div>
          <div class="modal-footer justify-content-between">
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script>
      // ================CHECK CONNECTION==============
      jQuery(document).ready(function($) {
        moment.locale('id')
        checkConnection()
        setInterval(function () {
          cek_pesan_baru("<?= $this->session->userdata('userData')['id_pelanggan']; ?>")
        }, 1000)
        $('#perbaikan').on('click', function (e) {
          $('#option_barang a').remove();
          $('#option_barang').append('<a href="<?= base_url(); ?>pelanggan/perbaikan_laptop" class="btn btn-primary">LAPTOP</a><a href="<?= base_url(); ?>pelanggan/perbaikan_hp" class="btn btn-primary">HANDPHONE</a>');
        });
        $('#pengajuan_perbaikan').on('click', function (e) {
          $('#option_barang a').remove();
          $('#option_barang').append('<a href="<?= base_url(); ?>pelanggan/pengajuan_perbaikan_laptop" class="btn btn-primary">LAPTOP</a><a href="<?= base_url(); ?>pelanggan/pengajuan_perbaikan_hp" class="btn btn-primary">HANDPHONE</a>');
        });    
      });

      function checkConnection() {
      var status = navigator.onLine
      if (status) {
      $('head').append('<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">');
      } else {
      setTimeout(function() {
      toastr.warning(
      "Anda Tidak Terhubung Ke Internet!!"
      );
      }, 150)
      }
      }

      function cek_pesan_baru(id) {
        $.ajax({
          url: '<?= base_url("pelanggan/cek_pesan_baru"); ?>',
          type: 'post',
          dataType: 'json',
          data: {id: id},
          cache: true,
          success: function (data) {
            if (data.length > 0) {
              $('.jml_pesan_baru').addClass('badge badge-warning navbar-badge ');
              $('.jml_pesan_baru').text(data.length);
            }
            
            $.each(data, function(i, val) {
              if (val.notifikasi == 'diskon_laptop' || val.notifikasi == 'diskon_hp') {
                $('.notif_atas').after('<a href="#" class="dropdown-item"> <i class="fas fa-envelope mr-2"></i>Anda mendapat <Diskon! class=""></Diskon!> <span class="float-right text-muted text-sm">indahcell</span> </a>');
                }else if (val.notifikasi == "tambah_harga_laptop" || val.notifikasi == 'tambah_harga_hp') {
                  $('.notif_atas').after('<a href="#" class="dropdown-item"> <i class="fas fa-envelope mr-2"></i>Perbaikan sementara dihentikan... <span class="float-right text-muted text-sm">indahcell</span> </a>');
                }
                  if (i == 5) return false;
            });
          }
        }).fail(function() {
          console.log("cek pesan gagal!");
        });
        
      }
    </script>