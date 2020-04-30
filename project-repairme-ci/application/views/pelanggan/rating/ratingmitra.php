        <div class="row">
      <div class="comment-form mt-30" style="width: 40%; position: absolute; top: 10%; right: 4%;">
        <h2 class="comment-form-title font-alt">Rating Mitra</h2>
        <form method="post" action="<?= BASEURL; ?>/Pelanggan/rating">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label  for="nama"> </label>
              <input class="form-control" id="nama" type="text" name="nama" placeholder="Name" value="<?= $_SESSION['login']['data']['nama']; ?>" disabled>
              <input type="text" name="id_pelanggan" id="id_pelanggan" value="<?= $_SESSION['login']['data']['id_pelanggan']; ?>" hidden>
              <input type="text" id="id_mitra" name="id_mitra" hidden>
              <input type="text" id="ratingmitra" name="ratingmitra" hidden>
            </div>
            <div class="form-group">
              <label  for="mitra"></label>
              <select class="form-control" id="pilihMitra">
                <option selected="true" disabled="" hidden>List Mitra</option>
                <?php foreach ($data['mitra'] as $mitra):?>
                <option value="<?= $mitra['id_mitra']; ?>"><?= $mitra['nama_usaha']; ?></option>
                <?php endforeach; ?>
                
              </select>
            </div>
          <div class="form-group">
            <label for="testimoni"> </label>
            <textarea class="form-control" id="testimoni" name="testimoni" placeholder=" Isi Testimoni"></textarea>
          </div>
          <p class="ratingmitra"></p>
          <div class="form-group" id="rating">
            <label for="rating"> </label>
          </div>
          <input type="text" id ="ratingMtr" name ="ratingMtr" hidden>
          <button class="btn btn-d btn-round btn-block" type="submit">Beri Rating
            <span class="review-text" style="display:none"><span id="rating" name="rating" ></span> </span>
          </button>
        </form>
      </div>
    </div>
<script src="<?= BASEURL; ?>/rating-master/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= BASEURL; ?>/rating-master/dist/jquery.emojiRatings.min.js"></script>
  <script>
  
        var countrating = 0;

        $("#rating").emojiRating({
        fontSize: 20,
        onUpdate: function(count) {
          $(".review-text").show();
          countrating  = count;
          $("#rating").html(count + " Bintang");
          $('#ratingmitra').val(count);
        }
      });
        var jmluser;
        var jmlrating;
      $('#pilihMitra').on('change',function(){
         $('#id_mitra').val($(this).val());
         var rating = 0;
         var jml = 0;
         <?php foreach($data['rating'] as $rating): ?>
          if ("<?= $rating['id_mitra']; ?>" == $(this).val()) {
           var allrating = "<?= $rating['rating']; ?>";
            if (rating == 0) {
               rating = parseInt(allrating);
                jml++;
             }else{
               rating = parseInt(allrating) + parseInt(rating);
                jml++;
             }
          }
         <?php endforeach; ?>
        jmlrating= rating;
        jmluser = jml;         
      });
      $('#rating').click(function(){
        var jmlfinal = (countrating + jmlrating)/(jmluser+1);
        $('#ratingMtr').val(jmlfinal);
        alert(jmlfinal);
      })

  </script>

<div class="tutorial mt-10" style="position: absolute; right: 130%; width: 100%; top: 0%;" >
  <h4 class="font-alt mb-0">Tutorial</h4>
  <hr class="divider-w mt-10 mb-20">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#support1">Mengapa Memberi Rating?</a></h4>
      </div>
      <div class="panel-collapse collapse in" id="support1">
        <div class="panel-body">
          Dengan memberikan Penilaian kepada Mitra ,Maka Repairme akan dengan mudah memberikan anda solusi terbaik untuk mencari mitra terpercaya dan profesional ,sesuai dengan penilaian Pelanggan Repairme.
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support2">Bagaimana caranya? </a></h4>
      </div>
      <div class="panel-collapse collapse" id="support2">
        <div class="panel-body">Silahkan Pilih Mitra Yang akan di beri Rating dan berikan testimoni anda mengenai Pelayanan dan hasil perbaikan Mitra lalu Pilih Star untuk penilaian . 
        </div>
      </div>
    </div>
  </div>
</div>

 
