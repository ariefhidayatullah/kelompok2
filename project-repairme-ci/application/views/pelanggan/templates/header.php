<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $data['judul']; ?></title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/panel-master/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/panel-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/panel-master/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?= BASEURL; ?>/panel-master/plugins/jquery/jquery.min.js"></script>
        <!-- Toastr -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/panel-master/plugins/toastr/toastr.min.css">
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
            <a href="<?= BASEURL; ?>/home/index" class="nav-link">Home</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li>
            <i class="fa fa-sign-out-alt">  </i>
          <a><?php mySession::sessionLogin(); ?></a>
          </li>
          </ul>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-light elevation-2">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <span class="brand-text font-weight-light">Pelanggan RepairMe</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="<?= BASEURL; ?>/panel-master/dist/img/user1.png" class="img-box elevation-2" alt="Foto Profile">
            </div>
            <div class="info">
               <?php foreach ($data['pelanggan'] as $pelanggan ) :?>
              <a href="#" class="d-block"><?= $pelanggan ['nama']; ?></a>
            <?php endforeach; ?>
            </div>
          </div>
          <!-- Sidebar Menu -->
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
                    <a href="<?= BASEURL; ?>/pelanggan/pengajuanperbaikan" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pengajuan perbaikan</p>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="<?= BASEURL; ?>/pelanggan/perbaikan" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dalam Pengerjaan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= BASEURL; ?>/pelanggan/batalperbaikan" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Perbaikan Dibatalkan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= BASEURL; ?>/pelanggan/selesaiperbaikan" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Barang Selesai Di Perbaiki</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= BASEURL; ?>/pelanggan/riwayatperbaikan" class="nav-link">
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
                    <a href="<?= BASEURL; ?>/pelanggan/profile" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Profile</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= BASEURL; ?>/Pelanggan/editProfile" class="nav-link">
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
                    <a href="<?= BASEURL; ?>/perbaikan/index" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Cari Mitra</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= BASEURL; ?>/Pelanggan/beriRating" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Berikan Rating</p>
                    </a>
                  </li>
                </ul>
              </li>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
