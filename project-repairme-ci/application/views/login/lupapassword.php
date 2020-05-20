<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="tutorial mt-80" style="margin: 0 3%;">
                <h4 class="font-alt mb-0">Bantuan</h4>
                <hr class="divider-w mt-10 mb-20">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#support1">Langkah Pertama</a></h4>
                        </div>
                        <div class="panel-collapse collapse in" id="support1">
                            <div class="panel-body">
                                Pastikan Username anda telah terdaftar atau telah diaktifkan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">

            <div class="loginpage  mt-80" style="margin: 0 3%;">
                <h4 class="font-alt">Lupa password .?</h4>
                <?= $this->session->flashdata('message'); ?>
                <hr class="divider-w mb-10">
                <form class="form mt-30" action="<?= base_url(); ?>login/lupapassword" method="POST">
                    <div class="form-group">
                        <input class="form-control" id="username" type="text" name="username" placeholder="Masukkan username anda" />
                    </div>
                    <div class="form-group mt-30">
                        <button class="btn btn-round btn-b" type="submit">reset password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>