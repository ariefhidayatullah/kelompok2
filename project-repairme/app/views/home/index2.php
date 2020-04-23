<script>
  $(document).ready(function(){
    if (<?= $_SESSION['login']['pesan']; ?> === true) {
    selamatDatang();
    }
    
    function selamatDatang(){
    const nama = "<?= $_SESSION['login']['data']['nama']; ?>";
    $.notiny({
      text: "Selamat Datang " + nama,
      position: 'right-bottom',
      animation_hide: 'custom-hide-animation 20s forwards'
    });

    }

  });
</script>
 <section class="home-section home-parallax home-fade home-full-height bg-dark-30" id="home" data-background="<?= BASEURL; ?>/home-master/assets/images/fix.jpeg">
        <div class="titan-caption">
          <div class="caption-content">

            <div class="font-alt mb-30 titan-title-size-1"></div>
            <div class="font-alt mb-40 titan-title-size-3"><span class="rotate">Jasa Perbaikan Hp dan Laptop | Segera Perbaiki Sekarang |Banyak Promo | Mitra Terpercaya</span>

           </div><a class="btn btn-border-w btn-circle" href="<?= BASEURL; ?>/perbaikan">Perbaiki Sekarang!</a>
            <!-- </div><a class="section-scroll btn btn-border-w btn-circle" href="#about">Learn More</a> -->
          </div>
        </div>
      </section>
      <div class="main">
      
        <hr class="divider-w">
        <section class="module" id="services">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Kelebihan RepairMe</h2>
              </div>
            </div>
            <div class="row multi-columns-row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <img src="<?= BASEURL; ?>/home-master/assets/images/icon/users.png" alt="member" width="128px" height="128px">
                  <h3 class="features-title font-alt">Banyak Mitra Terpercaya</h3>
                  <p>Mitra yang bergabung dengan kami sudah terpercaya, jika ada mitra yang tidak memenuhi peraturan yang sudah ditentukan oleh pihak RepairMe maka mitra tidak bisa melakukan pemasangan iklan lagi </p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <img src="<?= BASEURL; ?>/home-master/assets/images/icon/waktu.png" alt="member" width="128px" height="128px">
                  <h3 class="features-title font-alt">Tepat Waktu</h3>
                  <p>Perbaikan Hp atau Laptop anda akan diselesaikan dengan jangka waktu yang sudah ditentukan oleh mitra yang akan memperbaiki kerusakan Hp atau Laptop anda.</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <img src="<?= BASEURL; ?>/home-master/assets/images/icon/promo1.png" alt="member" width="128px" height="128px">
                  <h3 class="features-title font-alt">Banyak Promo</h3>
                  <p>Banyak Promo yang akan ditawarkan kepada Pelanggan maupun kepada Mitra</p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <img src="<?= BASEURL; ?>/home-master/assets/images/icon/list1.png" alt="member" width="128px" height="128px">
                  <h3 class="features-title font-alt">Bergaransi</h3>
                  <p>Pelanggan dapat menggunakan garansi setelah perbaikan selesai</p>
                </div>
              </div>
         </section>
         <hr />
         <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">bagaimana cara menggunakannya?</h2>
              </div>
            </div>
            <div class="row">
              <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                <div class="team-item">
                 <img src="<?= BASEURL; ?>/home-master/assets/images/icon/maps.png" alt="member" width="128px" height="128px">
                  <div class="team-descr font-alt">
                    <div class="team-name">LangKah Pertama</div>
                    <div class="team-role">Pilih Mitra dengan click salah satu lokasi maka profil mitra akan muncul</div>
                  </div>
                </div>
              </div>
               <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                <div class="team-item">
                 <img src="<?= BASEURL; ?>/home-master/assets/images/icon/hp.png" alt="member" width="128px" height="128px">
                  <div class="team-descr font-alt">
                    <div class="team-name">Langkah Ke-dua</div>
                    <div class="team-role">pilih Merk dan Tipe Handphone atau Laptop anda yang rusak</div> &amp;
                    <div class="team-role">pilih kerusakan Handphone atau Laptop</div>
                  </div>
                </div>
              </div>
                <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                <div class="team-item">
                 <img src="<?= BASEURL; ?>/home-master/assets/images/icon/setuju.png" alt="member" width="128px" height="128px">
                  <div class="team-descr font-alt">
                    <div class="team-name">Langkah Ke-tiga</div>
                    <div class="team-role">Pelanggan menunggu persetujuan dari Mitra</div>
                  </div>
                </div>
              </div>
                <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" onclick="wow fadeInUp">
                <div class="team-item">
                 <img src="<?= BASEURL; ?>/home-master/assets/images/icon/sepeda.png" alt="member" width="128px" height="128px">
                  <div class="team-descr font-alt">
                    <div class="team-name">Langkah Ke-lima</div>
                    <div class="team-role">Setelah Mitra menyetujui permintaan maka, barang dikirim ke Mitra </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <hr>
        <section class="module-small" id="mitra">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Portofolio Mitra</h2>
              </div>
            </div>
           
            
             
            <div class="row multi-columns-row">
              <?php foreach ($data['mitra'] as $mitra) :?>
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="shop-item">

                  <div class="shop-item-image">  <img src="<?= BASEURL; ?>/img/mitra/<?= $mitra['foto_usaha']; ?>" alt="member" width="128px" height="128px">
                    <form action="<?= BASEURL; ?>/perbaikan/barangkerusakan" method="POST">
                    <input type="text" id="id" name="id" hidden value="<?= $mitra['id_mitra']?>">
                    <div class="shop-item-detail"><button class="btn btn-round btn-b" type="submit"><span class="icon-basket">Pilih Mitra</span></button></div>
                     </form>
                  </div>
                  <h4 class="shop-item-title font-alt"><a href="#"><?=$mitra['nama_usaha']; ?></a></h4><?=$mitra['alamat'];?>
                </div>
              </div>
              <?php endforeach; ?>
          </div>
        </section>
        <section>
        <div class="module-small bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-4">
                <div class="widget">
                  <h5 class="widget-title font-alt">Hubungi</h5>
                  <p>Jl. Raya Situbondo, Blindungan, Kec. Bondowoso, Kab. Bondowoso, Jawa Timur 68211.</p>
                  <p>Phone  : +6283847999691</p>
                  <p>Email  : <a href="#">repairme@gmail.com</a></p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="widget" style="width:100%;text-align: center;">
                  <h5 class="widget-title font-alt"><a href="<?= BASEURL ?>/home/about">Perbaiki Sekarang</h5>
                </div>
              </div>
               <div class="col-sm-4">
                <div class="widget">
                  <h5 class="widget-title font-alt"><a href="<?= BASEURL ?>/home/about">Tentang Repairme</h5>
                  <p>Website Penyedia layanan perbaikan Laptop dan Handphone, dengan mitra yang terpercaya</p>
                </div>
              </div>
                
              </div>
            </div>
          </div>
        </section>
        <hr class="divider-d">
        <footer class="footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright font-alt">RepairMe &copy; 2019 <a href="<?= BASEURL ?>/home/index">RepairMe</a>Website Penyedia Layanan Perbaikan Laptop dan Handphone</p>
                                  <b>Versi</b> 1.0.0
              </div>
              <div class="col-sm-6">
                <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-skype"></i></a>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
