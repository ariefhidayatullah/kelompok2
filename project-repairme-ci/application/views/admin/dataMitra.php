<!-- untuk report  -->

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
          <h1>Data Mitra</h1>

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="#">mitra</a></li>
            <li class="breadcrumb-item active">Daftar Mitra</li>
          </ol>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>

 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Mitra</h3>
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

              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12"><table id="datamitra" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 200px;">Nama</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 194px;">Nama Usaha</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 194px;">Email</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 225px;">No Telepon</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 225px;">Alamat</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 219px;">Opsi</th></tr>
                </thead>
                 
                <tbody>
                  <?php foreach ($data['mitra'] as $mitra) :?>

                <tr>
                    <td><?= $mitra['nama']; ?></td>
                    <td><?= $mitra['nama_usaha']; ?></td>
                    <td><?= $mitra['email']; ?></td>
                   <td><?= $mitra['no_tlp']; ?></td> 
                    <td><?= $mitra['alamat']; ?></td>
                    <td><a href="<?= BASEURL; ?>/mitra/delete/<?= $mitra['id_mitra']; ?>" class="badge badge-danger float-right ml-1">Hapus</a></td>
                </tr>
                 <?php endforeach; ?>
                  </tbody>
               
              </table>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>


  <script>  
    $(document).ready(function(){
     $('#unduhdata').click(function(){
     // alert('oke');
      $("#datamitra").tableHTMLExport({type:'csv',filename:'datamitra.csv'});
     }); 
    });
  </script>