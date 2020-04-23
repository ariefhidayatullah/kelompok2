<div class="container">
  
  <!-- button kategori -->
  <a class="btn btn-primary" href="<?= BASEURL; ?>/Kategori/tambahkategori/" role="button">Tambah Kategori</a>
  
  <div class="listkategori">
    <h3>Kategori</h3>
      <?php foreach($data['merk'] as $merk) :?>
      <ul class="list-group">
        <li class="list-group-item" >
          
          <?= $merk['merk']; ?>
          <a href="<?= BASEURL; ?>/Kategori/delete/<?= $merk['id_merk']; ?>" class="badge badge-danger float-right ml-1">Hapus</a>
          
        </li>
      </ul>
      <?php endforeach; ?>
  </div>


</div>
</div>

            
