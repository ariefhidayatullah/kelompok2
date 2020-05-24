
<div class="container">
  
  <!-- button registrasi -->
  <a class="btn btn-primary" href="<?= base_url(); ?>mitra/registrasi" role="button">Daftar Mitra</a>
	<div class="listMitra">
		<h3>Daftar Mitra Bergabung</h3>
			<?php foreach($mitra as $mitraa) :?>
			<ul class="list-group">
				<li class="list-group-item" >
					<?= $mitra['nama_usaha']; ?>
					<a href="<?= base_url(); ?>mitra/delete/<?= $mitraa['id_mitra']; ?>" class="badge badge-danger float-right ml-1">Hapus</a>
					<a href="<?= base_url(); ?>mitra/ubah/<?= $mitraa['id_mitra']; ?>/<?= $mitra['id_user']; ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mitra['id']; ?>">Ubah</a>
					<a href="<?= base_url(); ?>mitra/detailMitra/<?= $mitraa['id_mitra']; ?>" class="badge badge-primary float-right ml-1">Detail</a>
					
				</li>
			</ul>
			<?php endforeach; ?>
			
	</div>
<form action="<?=base_url();?>/itra/insertMitra" method="POST" enctype="multipart/form-data">
          <button type="submit" id="submit">haha</button>
          </form>

</div>
</div>