<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>
<script src="<?= BASEURL; ?>/js/tableHTMLExport.js"></script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
            <li class="breadcrumb-item active">Daftar Pelanggan</li>
          </ol>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>

 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar pelanggan</h3>
                <br>
                <i class="fas fa-file-download" style="display: inline-block;"></i>
                <a href="#" id="unduhdata">Unduh Data</a>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
                </div>
              </div>
               <div class="card-body">

                <table id="datapelanggan" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                
                <thead>
                <tr>
                  <th>Nama Pelanggan</th>
                  <th>Email & No Telpon</th>
                  <th>Alamat</th>
                  <th>Opsi</th>
                </tr>
                </thead>

                <tbody>
                   <?php foreach ($data['pelanggan'] as $pelanggan) :?>
                <tr>
                    <td><?= $pelanggan['nama']; ?></td>
                    <td><?= $pelanggan['email']; ?>, <?= $pelanggan['no_tlp']; ?></td>
                    <td><?= $pelanggan['alamat']; ?></td>
                    <td><a href="<?= BASEURL; ?>/pelanggan/delete/<?= $pelanggan['id_pelanggan']; ?>" class="badge badge-danger float-right ml-1">Hapus</a></td>
                </tr>
                <?php endforeach; ?>
                  </tbody>
                
              </table>
              
              <!-- /.card-body -->
            </div>
          </div>
            <!-- /.card -->
            <!-- untuk col-sm-12 -->
          </div>
          <!-- untuk class row -->
        </div>
        <!-- untuk container fluid -->
      </div> 
    </section>
    <!-- /.content -->
  </div>

    <script>  
    $(document).ready(function(){
     $('#unduhdata').click(function(){
     // alert('oke');
      $("#datapelanggan").tableHTMLExport({type:'csv',filename:'datapelanggan.csv'});
     }); 
    });
  </script>