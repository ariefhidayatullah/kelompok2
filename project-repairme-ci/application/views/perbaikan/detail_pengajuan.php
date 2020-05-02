<div class="container-fluid">
	<div class="col-sm-6">
		<div class="tutorial mt-80">
			<h4 class="font-alt mb-0">Bagaimana Langkah Setelah Pengajuan ?</h4>
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
	<div class="col-sm-6 mt-80">
		<ul class="nav nav-tabs font-alt" role="tablist">
		
			<li><a class="active"><span class="icon-tools-2"></span>Detail Pengajuan Perbaikan</a></li>
		
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="data-sheet">
				<table class="table table-striped ds-table table-responsive">
					<tbody>
							<tr >
								<th class="col-sm-2">KETERANGAN</th>
								<th class="col-sm-8">INFORMASI</th>
							</tr>
							<tr>	
								<td>NAMA PELANGGAN</td>
								<td><?= strtoupper($this->session->userdata('userData')['nama']); ?></td>
							</tr>
							<tr>
								<td>MITRA</td>
								<td><?= strtoupper($mitra[0]['nama_usaha']);?></td>
							</tr>
							<tr>
								<td>JENIS BARANG</td>
								<td><?= $this->input->post('jenis_perbaikan'); ?></td>
							</tr>
							<tr>
								<td>MERK BARANG</td>
								<td><?php if ($merk_ttd == '') {
									echo strtoupper($barang['merk']);
								}else{
									echo strtoupper($merk_ttd);
								} ?></td>
							</tr>
							<tr>
								<td>TIPE BARANG</td>
								<td><?php if ($tipe_ttd == '') {
									echo strtoupper($barang['tipe']);
								}else{
									echo strtoupper($tipe_ttd);
								} ?></td>
							</tr>
							<tr>
								<td>KERUSAKAN</td>
								<td><?php if ($kerusakan != '') {
									echo strtoupper($kerusakan);
								}else{
									echo strtoupper($kerusakan_lain);
								} ?></td>
							</tr>
							<tr>
								<td>KERUSAKAN LAIN</td>
								<td><?php if ($kerusakan_lain != '' && $kerusakan != '') {
									echo strtoupper($kerusakan_lain);
								}else{
									echo "-";
								} ?></td>
							</tr>
					</tbody>
				</table>
			</div>
			<?php if ($this->input->post('jenis_perbaikan') == 'LAPTOP'):?>
				<form action="<?= base_url('perbaikan/pengajuanperbaikanlaptop'); ?>" method="post">
					<input type="text" id="id_pelanggan" name="id_pelanggan" value="<?= $this->session->userdata('userData')['id_pelanggan'];?>" hidden>
					<input type="text" id="id_mitra" name="id_mitra" value="<?= $input['id_mitra']; ?>" hidden>
					<input type="text" id="id_tipe_laptop" name="id_tipe_laptop" value="<?= $input['id_tipe_laptop']; ?>" hidden>
					<input type="text" id="id_kerusakan_laptop" name="id_kerusakan_laptop" value="<?= $input['id_kerusakan_laptop']; ?>" hidden>
					<input type="text" id="merk_laptop_ttd" name="merk_laptop_ttd" value="<?= $input['merk_laptop_ttd']; ?>" hidden>
					<input type="text" id="tipe_laptop_ttd" name="tipe_laptop_ttd" value="<?= $input['tipe_laptop_ttd']; ?>" hidden>
					<input type="text" id="ket_kerusakan_laptop_lain" name="ket_kerusakan_laptop_lain" value="<?= $input['ket_kerusakan_laptop_lain']; ?>" hidden>
				<button class="btn btn-block btn-round btn-d next4" style="width: 100%; margin-top: 30px;">KIRIM PENGAJUAN</button>
				</form>
			<?php endif; ?>
			<?php if ($this->input->post('jenis_perbaikan') == 'HANDPHONE'):?>
				<form action="<?= base_url('perbaikan/pengajuanperbaikanhp'); ?>" method="post">
					<input type="text" id="id_pelanggan2" name="id_pelanggan2" value="<?= $this->session->userdata('userData')['id_pelanggan'];?>" hidden>
					<input type="text" id="id_mitra2" name="id_mitra2" value="<?= $input['id_mitra2']; ?>" hidden>
					<input type="text" id="id_tipe_hp" name="id_tipe_hp" value="<?= $input['id_tipe_hp']; ?>" hidden>
					<input type="text" id="id_kerusakan_hp" name="id_kerusakan_hp" value="<?= $input['id_kerusakan_hp']; ?>" hidden>
					<input type="text" id="merk_hp_ttd" name="merk_hp_ttd" value="<?= $input['merk_hp_ttd']; ?>" hidden>
					<input type="text" id="tipe_hp_ttd" name="tipe_hp_ttd" value="<?= $input['tipe_hp_ttd']; ?>" hidden>
					<input type="text" id="ket_kerusakan_hp_lain" name="ket_kerusakan_hp_lain" value="<?= $input['ket_kerusakan_hp_lain']; ?>" hidden>
					<button class="btn btn-block btn-round btn-d next4" style="width: 100%; margin-top: 30px;">
				</form>
				KIRIM PENGAJUAN</button>
			<?php endif; ?>
		</div>
	</div>
</div>

<script>
	 $(document).ready(function(){
		       
		$('#buttonnn').click(function() {
			var kodes = Math.floor(Math.random() * 10);
			 $.ajax({
		    type  : 'POST',
		    url   : "<?= base_url('perbaikan/jsonTipeLaptop');?>",
		    async : true,
		    dataType : 'json',
		    data : {kode: kodes},
		    cache : false,
		    success : function(data){
		    	var html = '';
		        var i;
		        for(i=0; i<data.length; i++){
		            html += '<tr>'+
		                    '<td>'+data[i].tipe_laptop+'</td>'+
		                    '</tr>';
		        }
		        $('#show_data').html(html);
		    }

		});
		});

});
</script>