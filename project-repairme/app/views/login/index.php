<?php Flasher::flash(); ?>
<div class="container-fluid">
  <div class="row">
  <div class="col-sm-6">
<div class="tutorial mt-80" style="margin: 0 3%;">
    <h4 class="font-alt mb-0">Tutorial Login</h4>
    <hr class="divider-w mt-10 mb-20">
    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#support1">Langkah Pertama</a></h4>
        </div>
        <div class="panel-collapse collapse in" id="support1">
          <div class="panel-body">
           Pastikan Username sesuai dengan Username yang anda isikan pada saat registrasi
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support2">Langkah ke-dua</a></h4>
        </div>
        <div class="panel-collapse collapse" id="support2">
          <div class="panel-body">Pastikan Password sesuai dengan Username yang anda isikan pada saat registrasi
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="col-sm-6">
    <div class="loginpage  mt-80" style="margin: 0 3%;">
    <h4 class="font-alt">Login</h4>
    <hr class="divider-w mb-10">
    <form class="form mt-30"  action="<?= BASEURL; ?>/login/checklogin" method="POST">
        <div class="form-group">
            <input class="form-control" id="username" type="text" name="username" placeholder="Username"/>
        </div>
        <div class="form-group">
            <input class="form-control" id="password" type="password" name="password" placeholder="Password"/>

        </div>
        <div class="form-group mt-30">
            <button class="btn btn-round btn-b" type="submit">Login</button>
        </div>
        <div class="form-group"><a href="">Forgot Password?</a></div>
    </form>
</div>
</div>
 </div>
</div>

<script>
    $(document).ready(function(){
        $('#username').keyup(function(){
            $(this).val($(this).val().toLowerCase());
            console.log($(this).val());
        });
        $('#password').keyup(function(){
            $(this).val($(this).val().toLowerCase());
        });
    })
</script>


