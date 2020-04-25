<link rel="stylesheet" href="<?= BASEURL; ?>/panel-master/plugins/daterangepicker/daterangepicker.css">
<!-- InputMask -->
<script src="<?= BASEURL; ?>/panel-master/plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="<?= BASEURL; ?>/panel-master/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= BASEURL; ?>/js/autoNumeric.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Verifikasi Mitra</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Verifikasi Mitra</a></li>
              <li class="breadcrumb-item active">Permintaan Verifikasi</li>
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
          <h3 class="card-title">Permintaan Verifikasi</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
           <?php foreach ($data['mitra'] as $mitra) :?>
              <thead>
                  <tr>
                      <th style="width: 15%">
                          Nama Mitra
                      </th>
                      <th style="width: 15%">
                          Jenis Usaha
                      </th>
                      <th style="width: 15%">
                          Nama Usaha
                      </th>
                      <th style="width: 15%;">
                          Alamat
                      </th>
                      <th style="width: 15%;">
                          Foto Usaha
                      </th>
                      <th style="width: 15%">
                          Foto Transaksi
                      </th>
                        <th style="width: 15%">
                          Opsi
                      </th>
                        <th style="width: 15%">
                          
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                          <a>
                              <?= $mitra['nama']; ?>
                          </a>                   
                      </td>
                      <td>
                          <ul class="list-inline">
                              <?= $mitra['jenis']; ?>
                          </ul>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <?= $mitra['nama_usaha']; ?>
                          </ul>
                      </td>
                      <td >
                         <ul class="list-inline">
                              <?= $mitra['alamat']; ?>
                          </ul>
                      </td>
                      <td >
                         <ul class="list-inline">
                            <img src="<?= BASEURL; ?>/img/mitra/<?= $mitra['foto_usaha']; ?>" alt="member" width="128px" height="128px">
                          </ul>
                      </td>
                      <td >
                         <ul class="list-inline">
                            <img src="<?= BASEURL; ?>/img/mitra/<?= $mitra['foto_transaksi']; ?>" alt="mitra" width="128px" height="128px">
                          </ul>
                      </td>
                      <td class="project-actions text-right">
                          <button class="btn btn-success btn-sm t-terrimapermintaan" data-toggle="modal" data-target="#modalterima" value="<?= $mitra['id_mitra'] ?>">
                              Terima 
                          </button>  
                      </td>
                          <td>
                            <a href="<?= BASEURL; ?>/admin/deleteMtr/<?= $mitra['id_mitra'] ?>" class="badge badge-danger float-right ml-1"> <button class="btn btn-danger btn-sm ">
                              Tolak
                          </button></a>
                          
                        </td>
                      
                  </tr>
              </tbody>
           <?php endforeach; ?>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

      <!-- /.content-wrapper -->
  <div class="modal fade" id="modalterima" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Terima Permintaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                            
  <!-- isi dari class modal -->                             
   
       
        <label for="harga">Paket</label>
        <select class="form-control select2" style="width: 86%;">
                    <option selected="selected" disabled>paket</option>
                    <?php foreach ($data['paket'] as $paket):?>
                    <option class="selectpaket" value="<?= $paket['nama_paket']; ?>"><?= $paket['nama_paket']; ?></option>
                    <?php endforeach; ?>
        </select>
<br>
        <div class="input-group">
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
                     <tr>
                    <td><strong style="width: 15%">Harga</strong></td>
                    <td><span id="hargapakett"></span></td>
                  </tr>
               
                </table>
       <form action="<?= BASEURL; ?>/admin/verifikasimitra" method="POST">
                <input type="text" id="id_mitra" name="id_mitra" hidden>
                <input type="text" id="lama" name="lama" hidden>
                <input type="text" id="harga" name="harga" hidden>
                <input type="text" id="tanggal_hari" name="tanggal_hari" hidden>
                <button type="submit" class="btn btn-dark btn-block mt-4">Verifikasi</button>
                </form>

  
   
    </div>
    </div>
  </div>
</div>

<script>
   $(document).ready(function(){
     $('.waktulaptop').hide();
  
    $('.select2').change(function(){
       $('.waktulaptop').show();
       var waktulaptop = $(this).val().split('per', 2).pop(2);
        var end = moment().add(parseInt(waktulaptop), 'month').format('D-MMMM-YYYY');
        var start = moment().format('D-MMMM-YYYY');
       $('#reportrange').text(start +' sampai '+ end);
        var range = Math.floor(Math.floor((Math.floor(moment().add(parseInt(waktulaptop), 'month')) - Math.floor(moment()))) / 86400000);
        // alert($(this).text()); 
        $('#reportrangeday').text(range + ' hari');
        $('#hargapakett').text($('.selectpaket').attr('id'));
        <?php foreach ($data['paket'] as $paket):?>
          if ("<?= $paket['nama_paket'] ?>" === $(this).val()) {
            $('#hargapakett').text("<?= $paket['harga']; ?>");
          }
        <?php endforeach; ?>
        $('#lama').val($('#reportrangeday').text());
        $('#harga').val($('#hargapakett').text());
        $('#tanggal_hari').val($('#reportrange').text());
        // alert($('#lama').val());
    });
    $('.t-terrimapermintaan').click(function(){
      $('#id_mitra').val($(this).val());

    });

    $('.t-tolakmitra').click(function(){
       $('#id_mitra').val($(this).val());
    });
 });



</script>

 