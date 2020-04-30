<div class="container-fluid">
	<div class="row">
		<div class="step-pertama">
			<!-- banyak javascript, tolong perhatikan -->
			<div class="col-sm-4" style="padding: 0 3%;">
				<div class="lokasiMitra mt-80">
					
					<h4 class="font-alt mb-0">Lokasi mitra</h4>
					<hr class="divider-w mt-10 mb-20">
				</div>
				
				<div id="map" style="min-height: 400px; min-width: 150px; border: solid black 1px;">
					<?php foreach ($data['id'] as $mitra):?>
					<script>
					var map = L.map('map').setView([<?= $mitra['lat']; ?>, <?= $mitra['lng']; ?>], 17);
					L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
					}).addTo(map);
					var marker = L.marker([<?= $mitra['lat']; ?>, <?= $mitra['lng']; ?>]).addTo(map);
					marker.bindPopup('<?= $mitra['nama_usaha']; ?>').openPopup();
					</script>
				</div>
				<!-- tutup col 1 -->
			</div>
			<div class="col-sm-4" style="padding: 0 3%;">
				<div class="namaMitra mt-80">
					<h4 class="font-alt mb-0 namaMitra"><?= $mitra['nama_usaha']; ?></h4>
					<hr class="divider-w mt-10 mb-20">
				</div>
				<div class="miniProfile">
					<div class="col-sm-12">
						<ul class="nav nav-tabs font-alt" role="tablist">
							<li class="active"><a href="#description" data-toggle="tab"><span class="icon-tools-2"></span>Deskripsi</a></li>
							<li><a href="#data-sheet" data-toggle="tab"><span class="icon-tools-2"></span>Data</a></li>
							<li><a href="#reviews" data-toggle="tab"><span class="icon-tools-2"></span>Reviews (2)</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="description">
								<img class="fotoMitra" src="<?= BASEURL ?>/img/mitra/<?= $mitra['foto_usaha']; ?>" alt="" width="678px" height="452px">
								<?php endforeach; ?>
								<p><?= $mitra['deskripsi']; ?>.</p>
							</div>
							<div class="tab-pane" id="data-sheet">
								<table class="table table-striped ds-table table-responsive">
									<tbody>
										<?php foreach ($data['id'] as $mitra):?>
										<tr>
											<th>Mitra</th>
											<th>Informasi</th>
										</tr>
										<tr>
											<td>Nama Usaha</td>
											<td><?= strtoupper($mitra['nama_usaha']); ?></td>
										</tr>
										<tr>
											<td>Jenis Perbaikan</td>
											<td><?= strtoupper($mitra['jenis']); ?></td>
										</tr>
										<tr>
											<td>No Telfon</td>
											<td><?= $mitra['no_tlp']; ?></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><?= $mitra['email']; ?></td>
										</tr>
										<tr>
											<td>Alamat Usaha</td>
											<td><?= $mitra['alamat']; ?></td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							
							<div class="tab-pane" id="reviews">
								<div class="comments reviews">
									<div class="comment clearfix">
										<div class="comment-avatar"><img src="" alt="avatar"/></div>
										<div class="comment-content clearfix">
											<div class="comment-author font-alt"><a href="#">John Doe</a></div>
											<div class="comment-body">
												<p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The European languages are members of the same family. Their separate existence is a myth.</p>
											</div>
											<div class="comment-meta font-alt">Today, 14:55 -<span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star-off"></i></span>
										</div>
									</div>
								</div>
								<div class="comment clearfix">
									<div class="comment-avatar"><img src="" alt="avatar"/></div>
									<div class="comment-content clearfix">
										<div class="comment-author font-alt"><a href="#">Mark Stone</a></div>
										<div class="comment-body">
											<p>Europe uses the same vocabulary. The European languages are members of the same family. Their separate existence is a myth.</p>
										</div>
										<div class="comment-meta font-alt">Today, 14:59 -<span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star-off"></i></span><span><i class="fa fa-star star-off"></i></span>
									</div>
								</div>
							</div>
						</div>
						<div class="comment-form mt-30">
							<h4 class="comment-form-title font-alt">Add review</h4>
							<form method="post">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label class="sr-only" for="name">Name</label>
											<input class="form-control" id="name" type="text" name="name" placeholder="Name"/>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label class="sr-only" for="email">Name</label>
											<input class="form-control" id="email" type="text" name="email" placeholder="E-mail"/>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<select class="form-control">
												<option selected="true" disabled="">Rating</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<textarea class="form-control" id="" name="" rows="4" placeholder="Review"></textarea>
										</div>
									</div>
									<div class="col-sm-12">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- terakhir col -->
	</div>
	<div class="col-sm-4" style="min-height: 500px;">
		<div class="mt-80">
			<h4 class="font-alt mb-0 namaMitra">Barang Dan Kerusakan</h4>
			<hr class="divider-w mt-10 mb-20">
		</div>
		<div class="barang et-icons">
			<p>Pilih Barang Yang Ingin Di Perbaiki?</p>
			<span class="box1" style="width: 50%;">
				<span class="icon-laptop" aria-hidden="true" style="width:100%;">
				<button class="btn btn-block btn-round btn-d tlaptop" type="button" style="margin-top: 3px;" value="laptop">LAPTOP</button></span>
			</span>
			<span class="box1" style="width: 50%;">
				<span class="icon-phone" aria-hidden="true" style="width: 100%;">
					<button class="btn btn-block btn-round btn-d thp" type="button" style="margin-top: 3px;" value="hp">HANDPHONE</button>
				</span>
			</span>
		</div>
	</div>
</div>
<!-- tutup step pertama -->
<div class="step-kedua">
	<!-- tutorial pertama -->
	<div class="col-sm-4" style="padding: 0 3%;">
		<div class="tutorial mt-80">
			<h4 class="font-alt mb-0">Tutorial</h4>
			<hr class="divider-w mt-10 mb-20">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#support1">Bagaimana Jika Merk Tidak Ada DI Daftar?</a></h4>
					</div>
					<div class="panel-collapse collapse in" id="support1">
						<div class="panel-body">
							Pilih merk hp yang akan ada perbaiki, jika merk hp yang akan anda perbaiki tidak ada maka pilih "Tidak Ada di Daftar" dan masukkan merk hp anda .
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support2"> Bagaimana Jika Tipe Tidak Ada DI Daftar?</a></h4>
					</div>
					<div class="panel-collapse collapse" id="support2">
						<div class="panel-body">Pilih tipe hp yang akan anda perbaiki, jika tipe hp yang akan anda perbaiki tidak ada maka pilih "Tidak Ada di Daftar" dan masukkan tipe hp anda .
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support3"> Bagaimana Jika Kerusakan Tidak Ada DI Daftar?</a></h4>
					</div>
					<div class="panel-collapse collapse" id="support3">
						<div class="panel-body">Pilih Kerusakan hp yang akan anda perbaiki, jika Kerusakan hp yang akan anda perbaiki tidak ada maka pilih "Tidak Ada di Daftar" dan masukkan Kerusakan hp anda .
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of col -->
	<div class="col-sm-4" style="padding: 0 3%;">
		<div class="namaMitra mt-70">
			<h4 class="font-alt mb-0 namaMitra">Detail Mitra Dan Barang</h4>
			<hr class="divider-w mt-10 mb-20" >
		</div>
		<div class="detail">
			<div class="row miniProfile">
				<div class="col-sm-12">
					<div class="tab-content">
						<div class="tab-pane active" id="data-sheet">
							<table class="table table-striped ds-table table-responsive">
								<tbody>
									<?php foreach ($data['id'] as $mitra):?>
									<tr>
										<th>Mitra</th>
										<th>Informasi</th>
									</tr>
									<tr>
										<td>Nama Usaha</td>
										<td><?= strtoupper($mitra['nama_usaha']); ?></td>
										<td class="idmitra" hidden><?= $mitra['id_mitra']; ?></td>
									</tr>
									<tr>
										<td>Jenis Perbaikan</td>
										<td><?= strtoupper($mitra['jenis']); ?></td>
									</tr>
									<tr>
										<td>No Telfon</td>
										<td><?= $mitra['no_tlp']; ?></td>
									</tr>
									<tr>
										<td>Email</td>
										<td><?= $mitra['email']; ?></td>
									</tr>
									<tr>
										<td>Alamat Usaha</td>
										<td><?= $mitra['alamat']; ?></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row miniProfile">
				<div class="col-sm-12">
					<div class="tab-content">
						<div class="tab-pane active" id="data-sheet">
							<table class="table table-striped ds-table table-responsive">
								<tbody>
									<tr>
										<th>Barang</th>
										<th>Informasi</th>
									</tr>
									<tr>
										<td>Barang Yang Dipilih</td>
										<td class="getKategori"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of col -->
	<div class="col-sm-4" style="padding: 0 5%; min-height: 500px;">
		<div class="container_laptop">
			<div class="mt-70">
				<h4 class="font-alt mb-0 namaMitra">Merk Dan Tipe</h4>
				<hr class="divider-w mt-10 mb-20">
			</div>
			<div class="row">
				<select class="form-control" id="selector_merk_laptop" >
					<option selected="selected" disabled>MERK</option>
					<option style="color: red;" value="false">tidak ada di daftar</option>
					<?php foreach ($data['merk_laptop'] as $merk):?>
					<option value="<?= $merk['id_merk_laptop']; ?>"><?php $getMerklaptop = $merk['merk_laptop']; ?><?= $merk['merk_laptop']; ?></option>
					<?php endforeach; ?>
				</select>
				<div class="form-group mt-20">
					<input type="text" name="merklaptop" id="merklaptop" hidden>
					<input class="form-control" id="merklaptopbaru" name="merklaptopbaru" type="text" placeholder="Merk Laptop Anda">
				</div>
				<select class="form-control" id="selector_tipe_laptop" >
					<option selected="selected" disabled>Tipe</option>
					<option style="color: red;" value="false">tidak ada di daftar</option>
				</select>
				<div class="form-group mt-20">
					<input class="form-control" id="tipelaptopbaru" name="tipelaptopbaru" type="text" placeholder="tipe Laptop Anda">
				</div>
				<button class="btn btn-block btn-round btn-d next1" style="width: 100%; margin-top: 30px;">SELANJUTNYA</button>
			</div>
		</div>
		<div class="container_hp">
			<div class="mt-70">
				<h4 class="font-alt mb-0 namaMitra">Merk Dan Tipe</h4>
				<hr class="divider-w mt-10 mb-20">
			</div>
			<div class="row">
				<select class="form-control" id="selector_merk_hp" >
					<option selected="selected" disabled>MERK</option>
					<option style="color: red;" value="false">tidak ada di daftar</option>
					<?php foreach ($data['merk_hp'] as $merk):?>
					<option value="<?= $merk['id_merk_hp']; ?>"><?php $getMerkhp = $merk['merk_hp']; ?><?= $merk['merk_hp']; ?></option>
					<?php endforeach; ?>
				</select>
				<div class="form-group mt-20">
					<input type="text" name="merkhp" id="merkhp" hidden>
					<input class="form-control" id="merkhpbaru" name="merkhpbaru" type="text" placeholder="Merk HP Anda">
				</div>
				<select class="form-control" id="selector_tipe_hp" >
					<option selected="selected" disabled>Tipe</option>
					<option style="color: red;" value="false">tidak ada di daftar</option>
				</select>
				<div class="form-group mt-20">
					<input type="text" name="tipehp" id="tipehp" hidden>
					<input class="form-control" id="tipehpbaru" name="tipehpbaru" type="text" placeholder="tipe hp Anda">
				</div>
				<button class="btn btn-block btn-round btn-d next2" style="width: 100%; margin-top: 30px;">SELANJUTNYA</button>
			</div>
		</div>
		<div class="container_kerusakan_laptop">
			<div class="mt-70">
				<h4 class="font-alt mb-0">Kerusakan</h4>
				<hr class="divider-w mt-10 mb-20">
			</div>
			<div class="row">
				<select class="form-control" id="selector_kerusakan_laptop" >
					<option selected="selected" disabled>Kerusakan</option>
					<option style="color: red;" value="false">tidak ada di daftar</option>
					<?php foreach ($data['kerusakan_laptop'] as $laptop):?>
					<option value="<?= $laptop['id_kerusakan_laptop']; ?>"><?= $laptop['kerusakan_laptop']; ?></option>
					<?php endforeach; ?>
				</select>
				
				<div class="form-group mt-20">
					<input class="form-control" id="ketkerlap" name="ketkerlap" type="text" placeholder="Keterangan kerusakan lain">
				</div>
				<button class="btn btn-block btn-round btn-d next3" style="width: 100%; margin-top: 30px;">SELANJUTNYA</button>
			</div>
		</div>
		<div class="container_kerusakan_hp">
			<div class="mt-70">
				<h4 class="font-alt mb-0">Kerusakan</h4>
				<hr class="divider-w mt-10 mb-20">
			</div>
			<div class="row">
				<select class="form-control" id="selector_kerusakan_hp" >
					<option selected="selected" disabled>Kerusakan</option>
					<option style="color: red;" value="false">tidak ada di daftar</option>
					<?php foreach ($data['kerusakan_hp'] as $hp):?>
					<option value="<?= $hp['id_kerusakan_hp']; ?>"><?= $hp['kerusakan_hp']; ?></option>
					<?php endforeach; ?>
				</select>
				
				<div class="form-group mt-20">
					<input class="form-control" id="ketkerhp" name="ketkerhp" type="text" placeholder="Keterangan kerusakan lain">
				</div>
				<button class="btn btn-block btn-round btn-d next4" style="width: 100%; margin-top: 30px;">SELANJUTNYA</button>
			</div>
		</div>
	</div>
	<div class="myForm">
		<form action="<?= BASEURL; ?>/perbaikan/pengajuanperbaikanlaptop" method="POST" id="formperbaikanlaptop">
			<input type="text" id="id_pelanggan" name="id_pelanggan" value="<?= $_SESSION['login']['data']['id_pelanggan']; ?>" hidden>
			<input type="text" id="id_mitra" name="id_mitra" hidden>
			<input type="text" id="id_tipe_laptop" name="id_tipe_laptop" hidden>
			<input type="text" id="id_kerusakan_laptop" name="id_kerusakan_laptop" hidden>
			<input type="text" id="merk_laptop_ttd" name="merk_laptop_ttd" hidden>
			<input type="text" id="tipe_laptop_ttd" name="tipe_laptop_ttd" hidden>
			<input type="text" id="ket_kerusakan_laptop_lain" name="ket_kerusakan_laptop_lain" hidden>
		</form>
		<form action="<?= BASEURL; ?>/perbaikan/pengajuanperbaikanhp" method="POST" id="formperbaikanhp">
			<input type="text" id="id_pelanggan2" name="id_pelanggan2" value="<?= $_SESSION['login']['data']['id_pelanggan']; ?>" hidden>
			<input type="text" id="id_mitra2" name="id_mitra2" hidden>
			<input type="text" id="id_tipe_hp" name="id_tipe_hp" hidden>
			<input type="text" id="id_kerusakan_hp" name="id_kerusakan_hp" hidden>
			<input type="text" id="merk_hp_ttd" name="merk_hp_ttd" hidden>
			<input type="text" id="tipe_hp_ttd" name="tipe_hp_ttd" hidden>
			<input type="text" id="ket_kerusakan_hp_lain" name="ket_kerusakan_hp_lain" hidden>
		</form>
	</div>
</div>
<!-- end of col -->
<!-- final -->
</div>
</div>
<script>
$(document).ready(function(){
	//form laptop
	$('.next3').click(function(){
		$('#id_mitra').val($('.idmitra').text());
		if ($('#selector_merk_laptop').val() == 'false') {
			$('#id_tipe_laptop').val(0);
			$('#merk_laptop_ttd').val($('#merklaptopbaru').val());
			$('#tipe_laptop_ttd').val($('#tipelaptopbaru').val());
		}else if($('#selector_tipe_laptop').val() == 'false'){
			$('#id_tipe_laptop').val(0);
<?php foreach ($data['merk_laptop'] as $laptop):?>
if ($('#selector_merk_laptop').val() == "<?= $laptop['id_merk_laptop']; ?>") {
$('#merk_laptop_ttd').val("<?= $laptop['merk_laptop']; ?>");
}
<?php endforeach; ?>
$('#tipe_laptop_ttd').val($('#tipelaptopbaru').val());
}else{
$('#id_tipe_laptop').val($('#selector_tipe_laptop').val());
}

if ($('#selector_kerusakan_laptop').val() == 'false') {
$('#id_kerusakan_laptop').val(0);
$('#kerusakan_laptop_lain').val($('#ketkerlap').val());
}else{
$('#id_kerusakan_laptop').val($('#selector_kerusakan_laptop').val());
}
$('#ket_kerusakan_laptop_lain').val($('#ketkerlap').val());
$('#formperbaikanlaptop').submit();
});
//form hp
$('.next4').click(function(){
$('#id_mitra2').val($('.idmitra').text());

if ($('#selector_merk_hp').val() == 'false') {
$('#id_tipe_hp').val(0);
$('#merk_hp_ttd').val($('#merkhpbaru').val());
$('#tipe_hp_ttd').val($('#tipehpbaru').val());
}else if($('#selector_tipe_hp').val() == 'false'){
$('#id_tipe_hp').val(0);
<?php foreach ($data['merk_hp'] as $hp):?>
if ($('#selector_merk_hp').val() == "<?= $hp['id_merk_hp']; ?>") {
$('#merk_hp_ttd').val("<?= $hp['merk_hp']; ?>");
}
<?php endforeach; ?>
$('#tipe_hp_ttd').val($('#tipehpbaru').val());
}else{
$('#id_tipe_hp').val($('#selector_tipe_hp').val());
}

if ($('#selector_kerusakan_hp').val() == 'false') {
$('#id_kerusakan_hp').val(0);
$('#kerusakan_hp_lain').val($('#ketkerlap').val());
}else{
$('#id_kerusakan_hp').val($('#selector_kerusakan_hp').val());
}
$('#ket_kerusakan_hp_lain').val($('#ketkerhp').val());
$('#formperbaikanhp').submit();
});
// $('.step-pertama').hide();
$('.step-kedua').hide();
$('#merklaptopbaru').hide();
$('#merkhpbaru').hide();
$('#tipelaptopbaru').hide();
$('#tipehpbaru').hide();
$('#kerusakanlaptopbaru').hide();
$('.next1').hide();
$('.next2').hide();
$('.next3').hide();
$('#ketkerlap').hide();
$('#selector_tipe_laptop').hide();
$('#selector_tipe_hp').hide();
$('.container_laptop').hide();
$('.container_hp').hide();
$('.container_kerusakan_laptop').hide();
$('.container_kerusakan_hp').hide();
$('.tlaptop').on('click', function(){
$('.step-pertama').hide();
$('.getKategori').text('LAPTOP');
$('.step-kedua').show();
$('.container_laptop').show();
});
$('.thp').on('click', function(){
$('.step-pertama').hide();
$('.getKategori').text('HANDPHONE');
$('.step-kedua').show();
$('.container_hp').show();
});
// untuk yang kedua
$('#selector_merk_laptop').change(function(){
$('.optiontipe').remove();
if($(this).val() == 'false'){
$('#merklaptopbaru').show();
$('#tipelaptopbaru').show();
$('.next1').show();
$('#selector_tipe_laptop').hide();
}else{
$('.next1').show();
$('#merklaptopbaru').hide();
$('#tipelaptopbaru').hide();
$('#selector_tipe_laptop').show();
}
<?php foreach ($data['tipe_laptop'] as $tipe):?>
if ($(this).val() == "<?= $tipe['id_merk_laptop']; ?>") {
$('#selector_tipe_laptop').append("<option class='optiontipe' value='<?= $tipe['id_tipe_laptop']; ?>'><?= $tipe['tipe_laptop']; ?></option>");
}
<?php endforeach; ?>
});
$('#selector_tipe_laptop').change(function(){
if ($(this).val() == 'false') {
$('#tipelaptopbaru').show();
}else{
$('#tipelaptopbaru').hide();
}
});
$('#selector_merk_hp').change(function(){
$('.optiontipe2').remove();
if($(this).val() == 'false'){
$('#merkhpbaru').show();
$('#tipehpbaru').show();
$('#selector_tipe_hp').hide();
$('.next2').show();
}else{
$('#merkhpbaru').hide();
$('#tipehpbaru').hide();
$('#selector_tipe_hp').show();
$('.next2').show();
}
<?php foreach ($data['tipe_hp'] as $tipe):?>
if ($(this).val() == "<?= $tipe['id_merk_hp']; ?>") {
$('#selector_tipe_hp').append("<option class='optiontipe2' value='<?= $tipe['id_tipe_hp']; ?>'><?= $tipe['tipe_hp']; ?></option>");
}
<?php endforeach; ?>
});
$('#selector_tipe_hp').change(function(){
if ($(this).val() == 'false') {
$('#tipehpbaru').show();
}else{
$('#tipehpbaru').hide();
}
});
$('.next1').click(function(){
$('.container_laptop').hide();
$('.container_kerusakan_laptop').show();
});
$('.next2').click(function(){
$('.container_hp').hide();
$('.container_kerusakan_hp').show();
});
//untuk step 3
$('#selector_kerusakan_laptop').change(function(){
if ($(this).val() == 'false') {
$('.next3').show();
$('#ketkerlap').show();
}else{
$('.next3').show();
$('#ketkerlap').show();
}
});
$('#selector_kerusakan_hp').change(function(){
if ($(this).val() == 'false') {
$('.next4').show();
$('#ketkerhp').show();
}else{
$('.next4').show();
$('#ketkerhp').show();
}
});
});
</script>