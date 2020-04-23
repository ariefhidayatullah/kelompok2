<div class="mt-80" style="position: absolute; left: 20%;">
<h4 class="font-alt mb-0 namaMitra">INPUT KATEGORI DAN BARANG</h4>
<hr class="divider-w mt-10 mb-20" style="width: 120%;">
</div>

<form class="row detailKerusakan" style="position: absolute; top: 25%; right: 60%; width: 24%;">
<select class="form-control" name="kategori" id="kategori" style="margin: 10px;">
<option selected="selected">Pilih Kategori</option>
<?php foreach ($data['kategori']['kategori'] as $kategori):?>
<option><?= $kategori['kategori']; ?></option>
<?php endforeach; ?>
</select>
<select class="form-control" name="merk" id="merk" style="margin: 10px;">
<option selected="selected">Pilih Merk</option>
<?php foreach  ($data['kategori']['merk'] as $merk):?>
<option><?= $merk['merk']; ?></option>
<?php endforeach; ?>
</select>
<select class="form-control" name="tipe" id="tipe" style="margin: 10px;">
<option selected="selected">Pilih tipe</option>
<?php foreach  ($data['kategori']['tipe'] as $tipe):?>
<option><?= $tipe['tipe']; ?></option>
<?php endforeach; ?>
</select>
<button class="btn btn-block btn-round btn-d" type="submit" style="margin: 10px; margin-top: 30px;">KIRIM </button>
</form>
<form class="row detailKerusakan2" style="position: absolute; top: 25%; right: 34%; width: 24%;">
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal1">+</button><br><br>
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal2">+</button><br><br>
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal3">+</button>

                                                                    
                                                                    
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">input merk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                            
  <!-- isi dari class modal -->
                                            
     <form action="<?=BASEURL;?>/admin/insertmerk" method="POST" id="formmodmerk" data-parsley-validate="">
                                                
                                                
    <label for="merk">merk</label>
    <input id="merk" type="text" name="merk" data-parsley-trigger="change"  placeholder="isikan merk" autocomplete="off" class="form-control">
    <br><br>
    <button type="submit" name="submit1" id="submit1" class="btn btn-secondary">kirim</button>
                                                
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
    </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">input kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                            
  <!-- isi dari class modal -->
                                            
     <form action="<?=BASEURL;?>/admin/insertkategori" method="POST" id="formmodmerk" data-parsley-validate="">
                                                
                                                
    <label for="kategori">kategori</label>
    <input id="kategori" type="text" name="kategori" data-parsley-trigger="change"  placeholder="isikan kategori" autocomplete="off" class="form-control">
    <br><br>
    <button type="submit" name="submit" id="submit" class="btn btn-secondary">kirim</button>
                                                
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
    </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">input tipe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                            
  <!-- isi dari class modal -->
                                            
     <form action="<?=BASEURL;?>/admin/inserttipe" method="POST" id="formmodmerk" data-parsley-validate="">
                                                
                                                
    <label for="tipe">tipe</label>
    <input id="tipe" type="text" name="tipe" data-parsley-trigger="change"  placeholder="isikan tipe" autocomplete="off" class="form-control">
    <br><br>
    <button type="submit3" name="submit3" id="submit3" class="btn btn-secondary">kirim</button>
                                                
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
    </div>
    </div>
  </div>
</div>
