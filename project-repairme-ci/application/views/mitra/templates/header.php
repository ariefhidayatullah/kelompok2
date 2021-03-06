<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $judul; ?></title>
  <!-- jQuery -->
  <script src="<?= base_url(); ?>assets/js/jquery-3.4.1.js"></script>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- range slider -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">

  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/plugins/toastr/toastr.min.css">

  <script src="<?= base_url('assets/js/autoNumeric.js'); ?>"></script>
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/plugins/daterangepicker/daterangepicker.css">
  <!-- Moment js -- waktu -->
  <script src="<?= base_url(); ?>assets/panel-master/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/moment-id.js"></script>
  <!-- date-range-picker -->
  <script src="<?= base_url(); ?>assets/panel-master/plugins/daterangepicker/daterangepicker.js"></script>
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
        <a href="<?= base_url(); ?>home/index" class="nav-link">Home</a>
      </li>
    </ul>
      <ul class="navbar-nav ml-auto mr-3">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell" style="font-size: 150%;"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
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
  <aside class="main-sidebar sidebar-dark-light elevation-2">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url(); ?>assets/panel-master/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Mitra RepairMe</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url(); ?>gallery/<?= $this->session->userdata('userData')['foto_usaha']; ?>" class="img-box elevation-2" alt="Foto Usaha Mitra">
        </div>
        <div class="info">
          <a class="float-right"><?= $mitra['nama']; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= base_url(); ?>mitra" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda <span class="right badge badge-success">Data Cepat</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Perbaikan
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link" data-toggle="modal" data-target="#modal-sm" id="permintaan_perbaikan">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permintaan Perbaikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url(); ?>mitra/voucher" class="nav-link" id="voucher_sidebar">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Voucher Perbaikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" data-toggle="modal" data-target="#modal-sm" id="perbaikan">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perbaikan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url(); ?>mitra/batalperbaikan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perbaikan Dibatalkan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url(); ?>mitra/selesaiperbaikan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Selesai Di Perbaiki</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url(); ?>mitra/riwayatperbaikan" class="nav-link">
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
                Profile Mitra
                <i class="fas fa-angle-left right"></i>
                <span class="right badge badge-warning">Edit</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url(); ?>mitra/profile" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url(); ?>mitra/deskripsi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ubah Profile</p>
                </a>
              </li>
            </ul>
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
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row" id="option_barang">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        // ================CHECK CONNECTION==============
        jQuery(document).ready(function($) {
          checkConnection()

          //sidebar class 

          $('a').removeClass('active');
          let judul = "<?= $judul; ?>";
          if (judul == "Pengajuan Perbaikan") {
            $('#permintaan_perbaikan').addClass('active')
          }else if(judul == "Terima Voucher"){
            $('#voucher_sidebar').addClass('active');
          }

          $('#permintaan_perbaikan').on('click', function(e) {
            $('#option_barang a').remove();
            $('#option_barang').append('<a href="<?= base_url(); ?>mitra/pengajuan_perbaikan_laptop" class="btn btn-dark btn-sm col-sm-6">LAPTOP</a><a href="<?= base_url(); ?>mitra/pengajuan_perbaikan_hp" class="btn btn-grey btn-sm">HANDPHONE</a>');
          });
          $('#perbaikan').on('click', function(e) {
            $('#option_barang a').remove();
            $('#option_barang').append('<a href="<?= base_url(); ?>mitra/perbaikan_laptop" class="btn btn-dark btn-sm">LAPTOP</a><a href="<?= base_url(); ?>mitra/perbaikan_hp" class="btn btn-dark btn-sm">HANDPHONE</a>');
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
      </script>