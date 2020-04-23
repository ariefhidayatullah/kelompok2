 <section class="home-section home-full-height bg-dark-30" id="home" data-background="assets/images/section-5.jpg">
        <div class="video-player" data-property="{videoURL:'https://youtu.be/XZUh80GGhyI', containment:'.home-section', startAt:0, mute:false, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
        <div class="video-controls-box">
          <div class="container">
            <div class="video-controls"><a class="fa fa-volume-up" id="video-volume" href="#">&nbsp;</a><a class="fa fa-pause" id="video-play" href="#">&nbsp;</a></div>
          </div>
        </div>
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1">Selamat Datang di Website</div>
            <div class="font-alt mb-40 titan-title-size-4">RepairMe</div><a class="section-scroll btn btn-border-w btn-round" href="#alt-features">Tentang Kami</a>
          </div>
        </div>
      </section>
      <div class="main">
        <section class="module-small" id="alt-features">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">RepairMe</h2>
                <div class="module-subtitle font-serif">"RepairMe merupakan tempat untuk perbaikan Hp dan Laptop anda serta dikerjakan oleh mitra terpercaya. Mitra akan mengerjakan tepat waktu sesuai dengan waktu yang sudah ditentukan."</div>
              </div>
              <hr>  
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Visi</h2>
                <div class="module-subtitle font-serif">Membantu pelanggan dalam menemukan tempat perbaikan dan Membantu mitra (Pemilik Jasa) mendapatkan klien </div>
              </div>
              </div>
              <hr>  
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Misi</h2>
                <div class="module-subtitle font-serif">Menjadi Website terpercaya dalam mempertemukan Pelanggan dan Mitra</div>
              </div>
              <hr>  
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Tujuan</h2>
                <div class="module-subtitle font-serif">Mempermudah mitra menemukan pelanggan untuk memperbaiki Hp dan Laptop</div>
              </div>
            </div>
          </div>
        </section>
        <hr>  
        <section class="module" id="contact">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Kirim Pesan?</h2>
                <div class="module-subtitle font-serif"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <form id="contactForm" role="form" method="post" action="php/contact.php">
                  <div class="form-group">
                    <label class="sr-only" for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Nama Anda" required="required" data-validation-required-message="Please enter your name."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Email Anda" required="required" data-validation-required-message="Please enter your email address."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" rows="7" id="message" name="message" placeholder="Pesan Anda" required="required" data-validation-required-message="Please enter your message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Kirim</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>
          </div>
        </section>
       <section>
        <div class="module-small bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-4" >
                <div class="widget" ">
                  <h5 class="widget-title font-alt">Hubungi</h5>
                  <p>Jl. Raya Situbondo, Blindungan, Kec. Bondowoso, Kab. Bondowoso, Jawa Timur 68211.</p>
                  <p>Phone  : +6283847999690</p>
                  <p>Email  : <a href="#">repairme@gmail.com</a></p>
                </div>
              </div>
              <div class="col-sm-4" >
                <div class="widget" ">
                  <h5 class="widget-title font-alt"><a href="<?= BASEURL ?>/home/about">Perbaiki Sekarang</h5>
                </div>
              </div>
               <div class="col-sm-4" >
                <div class="widget" s>
                  <h5 class="widget-title font-alt"><a href="<?= BASEURL ?>/home/about">Tentang Kami</h5>
                  <p> RepairMe merupakan tempat untuk perbaikan Hp dan Laptop anda serta dikerjakan oleh mitra terpercaya</p>
                </div>
              </div>
                
              </div>
            </div>
          </div>
        </section>
        <hr class="divider-d">
         <footer class="module-small footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright font-alt">&copy; 2019&nbsp;<a href="<?= BASEURL ?>/home/index">RepairMe</a></p>
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
