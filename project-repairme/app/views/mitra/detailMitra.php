<div class="container mt-5">
	<div class="row">
		<div class="col-6">
			<h3>Detail Mitra</h3>
		<?php foreach($data['mitra'] as $mitra) :?>
			<div class="card" style="width: 18rem;">
			  <img src="<?= BASEURL; ?>/img/mitra/<?= $mitra['foto_usaha']; ?>" class=" rounded-circle shadow" width="100">
			  <div class="card-body">
			    <p class="card-text"><?= $mitra['nama']; ?></p>
			    <p class="card-text"><?= $mitra['nama_usaha']; ?></p>
			  </div>
			</div>
		<?php endforeach; ?>
		
		</div>
	</div>
</div>