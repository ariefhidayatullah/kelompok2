        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Pelanggan</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pelanggan</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Pelanggan</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">list pelanggan</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php foreach ($data['pelanggan'] as $pelanggan) :?>
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>hapus</th>
                                                <th>Ubah</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $pelanggan['nama']; ?></td>
                                               <td><a href="<?= BASEURL; ?>/pelanggan/delete/<?= $pelanggan['id_pelanggan']; ?>" class="badge badge-danger float-right ml-1">Hapus</a></td>
											   <td><a href="<?= BASEURL; ?>/pelanggan/ubah/<?= $pelanggan['id_pelanggan']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $pelanggan['id']; ?>">Ubah</a></td>
											   <td><a href="<?= BASEURL; ?>/pelanggan/detailPelanggan/<?= $pelanggan['id_pelanggan']; ?>" class="badge badge-primary float-right ml-1">Detail</a></td>
                                            </tr>
                                    
                                        </tbody>
                                    </table>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->

					
					
					
		