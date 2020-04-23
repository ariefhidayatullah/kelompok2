<!-- 
 <form action="<?=BASEURL;?>/Kategori/insertbarang" method="POST" id="formKat" >
  <br><br><br><br><br>
   <table>
     <tr>
       <td>
         <label for="merk">Kategori</label>
         <input type="text" name="merk" id="merk">
       </td>
       <td>
         <label for="merk">Merk</label>
         <input type="text" name="merk" id="merk">
       </td>
       <td>
         <label for="merk">Tipe</label>
         <input type="text" name="merk" id="merk">
       </td>
       <td>
         <button type="submit" name="submit" id="submit">Kirim</button>
       </td>
     </tr>
   </table>
 </form> -->

 <!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               
            </div>
        </div>
        
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic form -->
            <!-- ============================================================== -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                    <P >INPUT DATA</P>
                        <form action="<?= BASEURL;?>/kategori/insertbarang" method="POST" id="formKat" data-parsley-validate="">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <label for="kategori">Kategori </label><br>
                                    </tr>
                                    <tr>
                                        <td>
                                            
                                            <select class="form-control" name="kategori" id="kategori">
                                                <option value="">pilih kategori</option>
                                                <?php foreach ($data['kategori']['kategori'] as $kategori):?>
                                                <option value=""><?= $kategori['kategori']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td>
                                            
                                            <div class="col-sm-6 pl-0">
                                               
                                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#formmodkat">+
                                                                    </button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                    </div>
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <label for="merk">Merk </label><br>
                                                </tr>
                                                <tr>
                                                    <td>
                                                     <select class="form-control" name="merk" id="merk">
                                                        <option value="">pilih merk</option>
                                                    <?php foreach ($data['kategori']['merk'] as $merk):?>
                                                    <option value=""><?= $merk['merk']; ?></option>
                                                    <?php endforeach; ?>
                                                     </select>
                                                    <td>
                                                        
                                                        <div class="col-sm-6 pl-0">
                                        
                                                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target=" #formmerk">+
                                                                    </button>
                                                        </div>        
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                   
                                        <div class="form-group">
                                            <table>
                                                <tr>
                                                    <label for="tipe">Tipe </label><br>
                                                </tr>
                                                <tr>
                                                    <td>
                                                      <select class="form-control" name="tipe" id="tipe">
                                                        <option value="">pilih tipe</option>
                                                        <?php foreach ($data['kategori']['tipe'] as $tipe):?>
                                                        <option value=""><?= $tipe['tipe']; ?></option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        
                                                        <div class="col-sm-6 pl-0">
                                                          
                                                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target=" #formtipe">+
                                                                    </button>
                                                               
                                    
                                                        </div>        
                                                    </td>
                                                </tr>
                                            <tr>
                                            <td>
                                            <br><br>
                                            <button type="submit" class="btn btn-dark" name="submit3" id="submit3">kirim
                                                                    </button>
                                            </td>
                                            </tr>
                                            </table>
                                        </div>
                                    </form>                 
                    </div>
                </div>
            </div>
        </div>
                         
                                   
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end main wrapper -->
                                <!-- ==============================================================
                                Modal -->
                                <div class="modal fade hide" id="formmodkat" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="judulModal">Tambah kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <!-- isi dari class modal -->
                                                
                                                <form action="<?=BASEURL;?>/kategori/insertkategori" method="POST" id="formKat" data-parsley-validate="">
                                                    
                                                    
                                                    <label for="kategori">kategori</label>
                                                    <input id="kategori" type="text" name="kategori" data-parsley-trigger="change"  placeholder="isikan kategori" autocomplete="off" class="form-control">
                                                    
                                                    <button type="submit" name="submit" id="submit" class="btn btn-secondary">kirim</button>
                                                    
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade hide" id="formmerk" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="judulModal">Tambah kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <!-- isi dari class modal -->
                                            
                                            <form action="<?=BASEURL;?>/kategori/insertmerk" method="POST" id="formmodmerk" data-parsley-validate="">
                                                
                                                
                                                <label for="merk">merk</label>
                                                <input id="merk" type="text" name="merk" data-parsley-trigger="change"  placeholder="isikan merk" autocomplete="off" class="form-control">
                                                
                                                <button type="submit" name="submit1" id="submit1" class="btn btn-secondary">kirim</button>
                                                
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                            <div class="modal fade hide" id="formtipe" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="judulModal">Tambah kategori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <!-- isi dari class modal -->
                                            
                                            <form action="<?=BASEURL;?>/kategori/inserttipe" method="POST" id="formmodtipe" data-parsley-validate="">
                                                
                                                
                                                <label for="tipe">Tipe</label>
                                                <input id="tipe" type="text" name="tipe" data-parsley-trigger="change"  placeholder="isikan tipe" autocomplete="off" class="form-control">
                                                
                                                <button type="submit" name="submit2" id="submit2" class="btn btn-secondary">kirim</button>
                                                
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="<?= BASEURL; ?>/pelanggan/registrasi" class="btn btn-primary">Gabung Menjadi Pelanggan</a>
              
               <a href="<?= BASEURL; ?>/mitra/registrasi" class="btn btn-primary tombol-mitra">Gabung Menjadi Mitra</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
