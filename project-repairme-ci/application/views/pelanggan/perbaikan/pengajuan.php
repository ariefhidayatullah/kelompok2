
<!-- =============== JAVA SCRIPT =============== -->
<script>
 
 // ====FUNCTION AMBIL DATA LAPTOP YG TIDAK TERDAFTAR===

 function laptopttd(id) {
    var kodes = id;
     $.ajax({
          type  : 'POST',
          url   : "<?= base_url('pelanggan/laptopTtd');?>",
          async : true,
          dataType : 'json',
          data : {kode: kodes},
          cache : false,
          success : function(data){
            var text = '';
              var i;
              for(i=0; i<data.length; i++){
                  text += data[i].merk_laptop+ ' - ' +data[i].tipe_laptop;
              }
              $('#tipettd').text(text);
          }
      });
    }

    // ============== FUNCTION AMBIL DETAIL LAPTOP ==============

    function detail_laptop(id) {
    var kodes = id;
     $.ajax({
          type  : 'POST',
          url   : "<?= base_url('pelanggan/detail_laptop');?>",
          async : true,
          dataType : 'json',
          data : {kode: kodes},
          cache : false,
          success : function(data){
            var merk = '';
            var tipe = '';
            var kerusakan = '';
            var kerusakan_lain = '';
              var i;
              for(i=0; i<data.length; i++){
                  merk += data[i].merk;
                  tipe += data[i].tipe;
                  kerusakan += data[i].kerusakan;
                  kerusakan_lain += data[i].kerusakan_lain;
              }
              $('.laptop_merk').text(merk);
              $('.laptop_tipe').text(tipe);
              if (kerusakan == 'null') {
                $('.laptop_kerusakan').text('-');  
              }else{
                $('.laptop_kerusakan').text(kerusakan);
              }
              
              if (kerusakan_lain == '') {
                $('.laptop_kerusakan_lain').text('-');
              }else{
                $('.laptop_kerusakan_lain').text(kerusakan_lain);
              }

          }
      });
    }

    function detail_laptop_ttd(id) {
    var kodes = id;
     $.ajax({
          type  : 'POST',
          url   : "<?= base_url('pelanggan/detail_laptop_ttd');?>",
          async : true,
          dataType : 'json',
          data : {kode: kodes},
          cache : false,
          success : function(data){
            var merk = '';
            var tipe = '';
            var kerusakan = '';
            var kerusakan_lain = '';
              var i;
              for(i=0; i<data.length; i++){
                  merk += data[i].merk;
                  tipe += data[i].tipe;
                  kerusakan += data[i].kerusakan;
                  kerusakan_lain += data[i].kerusakan_lain;
              }
              $('.laptop_merk').text(merk);
              $('.laptop_tipe').text(tipe);
              if (kerusakan == 'null') {
                $('.laptop_kerusakan').text('-');  
              }else{
                $('.laptop_kerusakan').text(kerusakan);
              }
              
              if (kerusakan_lain == '') {
                $('.laptop_kerusakan_lain').text('-');
              }else{
                $('.laptop_kerusakan_lain').text(kerusakan_lain);
              }

          }
      });
    }

    // ====================== FUNCTION DETAIL MITRA ==================

    function detail_mitra(id) {
    var kodes = id;
     $.ajax({
          type  : 'POST',
          url   : "<?= base_url('pelanggan/detail_mitra');?>",
          async : true,
          dataType : 'json',
          data : {kode: kodes},
          cache : false,
          success : function(data){
            console.log(data);
            var lat = data[0].lat
            var lng = data[0].lng
            var nama = data[0].nama_usaha.toUpperCase()
             map(lat,lng,nama)   
             $('.nama_usaha').text(data[0].nama_usaha.toUpperCase())
             $('.nama_mitra').text(data[0].nama.toUpperCase())
             $('.keahlian').text(data[0].jenis.toUpperCase())
             $('.alamat').text(data[0].alamat.toUpperCase())
             $('.deskripsi').text(data[0].deskripsi.toUpperCase())
             $('.rating').text(data[0].rating.toUpperCase())
             $('.foto_usaha').attr('src', '<?= base_url("gallery/"); ?>'+data[0].foto_usaha)
          }
      });
    }

</script>

<!-- ======================END OF JAVASCRIPT====================== -->

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
                      <th style="width: 30%;">Mitra</th>
                      <th style="width: 20%;">Tanggal</th>
                      <th style="width: 20%;">Status</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                  <?php foreach ($laptop as $val):?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td>
                        <span id="tipettd"></span>
                        <?php if ($val['id_tipe'] == 0):?>

                 <!-- ===== FUNCTION JAVASCRIPT ===== -->

                        <script>laptopttd(<?= $val['id_perbaikan']; ?>)</script>

                   <!-- ======END OF JAVASCRIPT==== -->

                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailLaptop" style="float: right;" onclick="detail_laptop_ttd(<?= $val['id_perbaikan']; ?>)" >Detail</button>

                        <?php elseif ($val['id_tipe'] != 0):?>
                          <?= strtoupper($val['merk']); ?> - <?= $val['tipe']; ?>

                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailLaptop" style="float: right;" onclick="detail_laptop(<?= $val['id_perbaikan']; ?>)">Detail</button>
                        <?php endif; ?>

                      </td>
                      <td>
                        <?= strtoupper($val['mitra']); ?>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailMitra" style="float: right;" onclick="detail_mitra(<?= $val['id_mitra']; ?>)" >Detail</button>
                      </td>
                      <td><?= $val['tanggal']; ?></td>
                      <td><span class="badge bg-danger">55%</span></td>
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



<!-- ==========  BAGIAN MODAL ============= -->

 <div class="modal fade" id="detailLaptop">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
               
                <div class="modal-body">
                    <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="container-fluid">
                      <table class="table table-bordered">
                        
                        <tr>
                          <th><b>Judul</b></th>
                          <th><b>Data</b></th>
                        </tr>
                       
                        <tr>
                          <td>Jenis</td>
                          <td>Laptop</td>
                        </tr>
                        <tr>
                          <td>Merk</td>
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
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <div class="modal fade" id="detailMitra">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
               
                <div class="modal-body">
                    <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <table class="table table-bordered">
                  <div class="container-fluid">
                    <tr>
                      <th>Lokasi</th>
                      <th colspan="2" style="width: 40%;">Data</th>
                    </tr>
                    <tr>
                      <td rowspan="10">
                      <div id="map" style="height: 450px; display: block;">
                          <script>
                          function map (lat,lng,nama) {
                            setTimeout(function () {
                            var popup = L.popup();
                            var map = L.map('map').setView([lat, lng], 17);
                            L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(map);
                            var marker = L.marker([lat, lng]).addTo(map).bindPopup(nama).openPopup();
                            map.invalidateSize()
                            }, 200);
                        }
                             
                        </script>
                      </div>
            
                      </td>
                      <td style="width: 18%;">
                            <b>NAMA MITRA</b>
                      </td>
                      <td class="nama_usaha"> </td>
                    </tr>
                    <tr>
                      <td colspan="2"><img src="" class="foto_usaha"></td>
                    </tr>
                    <tr>
                     <td><b>NAMA PEMILIK</b></td>
                      <td class="nama_mitra"> </td>
                    </tr>
                    <tr>
                      <td><b>KEAHLIAN</b></td>
                      <td class="keahlian"> </td>
                    </tr>
                    <tr>
                      <td><b>ALAMAT</b></td>
                      <td class="alamat"></td>
                    </tr>
                    <tr>
                      <td><b>DESKRIPSI</b></td>
                      <td class="deskripsi"></td>
                    </tr>
                    <tr>
                      <td><b>RATING</b></td>
                      <td class="rating"></td>
                    </tr>
                    
                     
                        
                      
                   
                  </div>
                  </table>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
