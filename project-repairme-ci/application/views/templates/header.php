<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $judul; ?></title>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/home-master/assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/panel-master/plugins/toastr/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

  <link href="<?= base_url(); ?>assets/home-master/assets/lib/animate.css/animate.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/home-master/assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/home-master/assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/home-master/assets/lib/flexslider/flexslider.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/home-master/assets/lib/owl.carousel/dist/<?= base_url(); ?>assets/home-master/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/home-master/assets/lib/owl.carousel/dist/<?= base_url(); ?>assets/home-master/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/home-master/assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/home-master/assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">

  <!-- Main stylesheet and color file-->
  <link href="<?= base_url(); ?>assets/home-master/assets/css/style.css" rel="stylesheet">
  <link id="color-scheme" href="<?= base_url(); ?>assets/home-master/assets/css/colors/default.css" rel="stylesheet">

  <!-- untuk registrasi pelanggan -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">

  <!-- untuk leafletjs -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
  <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
  <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">
  <script src="<?= base_url(); ?>assets/js/Control.Coordinates.js"></script>
  <script src="<?= base_url(); ?>assets/js/petaLokasi.js"></script>

  <!-- untuk jquery -->
  <script src="<?= base_url(); ?>assets/js/jquery-3.4.1.js"></script>

</head>

<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
  <main>
    <div class="page-loader">
      <div class="loader">Loading...</div>
    </div>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="<?= base_url(); ?>assets">RepairME</a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= base_url(); ?>home">Home</a></li>
            <li><a href="<?= base_url(); ?>home/mitra">Mitra</a></li>
            <li><a href="<?= base_url(); ?>home/about">tentang kami</a></li>
            <?php if ($this->session->userdata('login') == false) : ?>
              <li><a class="fa fa-address-card" href="" data-toggle="modal" data-target="#exampleModal">Registrasi</a></li>
              <li><a class="fa fa-user" href="<?= base_url(); ?>login">Login</a></li>
            <?php endif; ?>
            <?php if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'pelanggan') : ?>
              <li><a href="<?= base_url(); ?>pelanggan">Dasboard pelanggan</a></li>
            <?php endif; ?>
          </ul>
          </li>
          </ul>
        </div>
      </div>
    </nav>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5>Anda akan bergabung sebagai?</h5>
          </div>
          <div class="modal-body">

            <a href="<?= base_url(); ?>pelanggan/registrasi" class="btn btn-round btn-b" style="width: 280px;">Gabung Menjadi Pelanggan</a>

            <a href="<?= base_url(); ?>mitra/registrasi" class="btn btn-round btn-b tombol-mitra" style="width: 280px;">Gabung Menjadi Mitra</a>
          </div>
        </div>
      </div>
    </div>

    <script>
      jQuery(document).ready(function($) {
        checkConnection()
      });

      function checkConnection() {
        var status = navigator.onLine
        if (status) {
          $('head').append('<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">');
        } else {
          setTimeout(function() {
            toastr.warning(
              "Anda Tidak Terhubung Ke Internet!!"
            );
          }, 150)
        }
      }
    </script>