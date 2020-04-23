  <div class="tutorial mt-70" style="position: absolute; left: 3%; width: 30%;">
    <h4 class="font-alt mb-0">Paket Biaya Iklan</h4>
    <hr class="divider-w mt-10 mb-20">
    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#support1">Cara Menggunakan Paket</a></h4>
        </div>
        <div class="panel-collapse collapse in" id="support1">
          <div class="panel-body">
            Pilih paket yang anda inginkan dengan menekan Bayar Sekarang.
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support2">Support Question 2</a></h4>
        </div>
        <div class="panel-collapse collapse" id="support2">
          <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="paket"  style="position: absolute; width: 80%; left: 35%; top: -18px;">
 <section class="module">
          <div class="container">
            <div class="row multi-columns-row" >
              <?php foreach ($data['paket'] as $paket) :?>
              <div class="col-sm-6 col-md-4 col-lg-4">

                <div class="price-table font-alt" >
                   <h4 class="shop-item-title font-alt"><a href="#"><?=$paket['nama_paket']; ?></a></h4>
                  <div class="borderline"></div>
                  <p class="price"><span>Rp</span><?=$paket['harga']; ?>
                  </p>
                  <ul class="price-details">
                    <li>Free Iklan</li>
                    <li>15 Demos Included</li>
                    <li>Nomer Rekening Bank BRI</li>
                    <li>060054387658</li>
                  </ul><a class="btn btn-d btn-round" href="#" data-toggle="modal" data-target="#exampleModal2"> Bayar Sekarang</a>
                </div>
              </div>
              <?php endforeach; ?>
          </div>
        </section>
   </div>

   <!-- Modal untuk upload foto transaksi -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Konfirmasi Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                            
  <!-- isi dari class modal -->
                                    
     <form action="<?=BASEURL;?>/home/transaksi" method="POST" id="formmodtrans" enctype="multipart/form-data"> 
      <div>
      <div class="notif" style="width: 50%; height: 10%; top: 0; left: 50%; position: absolute;">
                  <?php Flasher::flash(); ?>
                </div>                                             
      <label class="fa fa-camera" for="buktitrans"> Upload Bukti Bayar (Gambar Maks 2Mb) </label>
      <div class="input-icon">
      <input type="hidden" name="id_mitra">
      <input id="foto_transaksi" name="foto_transaksi" type="file" required>
      <p class="foto_transaksi" style="color: red;"></p>
      </div>
      </div> 
      <div class="form-group">
         <p>foto Tempat Usaha</p>
                      
                 </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-d btn-round">Kirim</button>
      </div>
    </form>
   
    </div>
    </div>
  </div>
</div>
<script>
$('#foto_transaksi').on('change',function(){
                  var filename = this.files[0].name.split('.').pop();
                  if ((this).files[0].size > 2000000) {
                    $('.foto_transaksi').text('Ukuran Gambar Tidak Boleh Melebihi 2MB!');
                    var kel = $(this).val(null);
                  }else if(filename != 'jpeg' && filename != 'jpg' && filename != 'png'){
                    $('.foto_transaksi').text('Format Gambar Tidak Benar!');
                    var kel = $(this).val(null);
                  }else{
                    $('.foto_transaksi').text('');
                  }

                  });
$('.selanjutnya5').on('click',function(){ 
          if ($('#foto_transaksi').val() === '') {
            $('.foto_transaksi').text('Upload Foto transaksi anda');
          }
          else {
            $('.upload').hide();
            $('.userpass').show();
            $('.judul').text('Akun Login');
          }
        });

</script>