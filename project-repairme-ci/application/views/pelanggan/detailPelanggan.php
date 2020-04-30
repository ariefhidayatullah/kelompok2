<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3>Detail Pelanggan</h3>
            <?php foreach($data['pelanggan'] as $pelanggan) :?>
            
            <div class="card-body">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>email</th>
                            <th>Alamat</th>
                            <th>No telpon </th>
                            <th>fungsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $pelanggan['nama']; ?></td>
                            <td><?= $pelanggan['email']; ?></td>
                            <td><?= $pelanggan['alamat']; ?></td>
                            <td><?= $pelanggan['no_tlp']; ?></td>
                            <td><a href="<?= BASEURL; ?>/mitra/delete/<?= $mitra['id_mitra']; ?>" class="badge badge-danger float-right ml-1">Hapus</a></td>
                        </tr>
                        
                    </tbody>
                </div>
                
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>