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


    <!-- Right navbar links -->
    
          <ul class="navbar-nav ml-auto">
          <li>
            <i class="fa fa-sign-out-alt">  </i>
          <a><?php mySession::sessionLogin(); ?></a>
          </li>
          </ul>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img class="profile-user-img img-fluid img-circle" src="<?= BASEURL; ?>/panel-master/dist/img/user1.png" alt="User profile picture" width="100px" height="100px">
      <span class="brand-text font-weight-light">Dashboard Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= BASEURL; ?>/panel-master/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ADMIN</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Cepat
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Barang
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= BASEURL; ?>/admin/tambahdatalaptop" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambahkan Daftar Laptop</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASEURL; ?>/admin/tambahdatahp" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambahkan Daftar Hp</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Kerusakan
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= BASEURL; ?>/admin/tambahkerusakanlaptop" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Kerusakan Laptop</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= BASEURL; ?>/admin/tambahkerusakanhp" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Kerusakan Hp</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/admin/perbaikan" class="nav-link">
              <i class="nav-icon fas fa-poll-h"></i>
              <p>
                Data Perbaikan
                <span class="right badge badge-warning">Edit</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/admin/dataMitra" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Data Mitra
                <span class="right badge badge-warning">Edit</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/admin/dataPelanggan" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Pelanggan
                <span class="right badge badge-warning">Edit</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/admin/paket" class="nav-link">
              <i class="nav-icon fas fa-poll-h"></i>
              <p>
                Paket Biaya Iklan
                <span class="right badge badge-light">Edit</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>/admin/permintaanverifikasi" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                  Konfirmasi Mitra
                <span class="right badge badge-warning">Baru</span>
              </p>
            </a>
          </li>
                
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


