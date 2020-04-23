<div class="container-fluid">
	<div class="row">
		<div class="col-sm-6 mt-80" style="padding: 0 3%;">
		<div class="tutorial" id="tutorial">
			<h4 class="font-alt mb-0">Tutorial</h4>
			<hr class="divider-w mt-10 mb-20">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#support1">Langkah Pertama</a></h4>
					</div>
					<div class="panel-collapse collapse in" id="support1">
						<div class="panel-body">
							Isi form regitrasi tersebut dengan benar dan pastikan data tersebut benar!
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support2">Langkah Ke-dua</a></h4>
					</div>
					<div class="panel-collapse collapse" id="support2">
						<div class="panel-body">Setelah data yang anda masukakan benar kemudian klik tombol Kirim
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	
	<div class="col-sm-6 formLocate mt-80" style="padding: 0 3%; min-height: 500px;">
		<h4 class="font-alt judul">Registrasi Pelanggan</h4>
		<hr class="divider-w mb-20">
		<form class="form" action="<?=BASEURL;?>/pelanggan/insertpelanggan" method="POST">
			<div class="dataDiri">
				<div class="form-group">
					<input class="form-control" id="nama" type="text" name="nama" placeholder="nama lengkap anda"/>
					<p class="nama" style="color: red;"></p>
				</div>
				<div class="form-group">
					<input class="form-control" id="email" type="email" name="email" placeholder="Email" required/>
					<p class="email" style="color: red;"></p>
				</div>
				<div class="form-group">
					<input class="form-control" id="no_tlp" type="text" name="no_tlp" placeholder="Nomor Telefon Anda"/>
					<p class="no_tlp" style="color: red;"></p>
				</div>
				<div class="form-group">
					<input class="form-control" id="alamat" type="text" name="alamat" placeholder="Alamat Lengkap"/>
					<p class="alamat" style="color: red;"></p>
				</div>
				<button class="btn btn-block btn-round btn-d selanjutnya" type="button">SELANJUTNYA</button>
			</div>
			<!-- untuk username dan password -->
			<div class="userpass">
				<div class="form-group">
					<input class="form-control" id="username" type="text" name="username" placeholder="Username anda"/>
					<p class="username" style="color: red;"></p>
				</div>
				<div class="form-group">
					<input class="form-control" id="password" type="password" name="password" placeholder="password"/>
					<p class="password" style="color: red;"></p>
				</div>
				<div class="form-group">
					<input class="form-control" id="password2" type="password" name="password2" placeholder="ulangi password"/>
					<p class="password2" style="color: red;"></p>
				</div>
				<button class="btn btn-block btn-round btn-d selanjutnya2" type="button">SELANJUTNYA</button>
				<button class="btn btn-g btn-round btn-block back" type="button" style="width: 100%;">Kembali</button>
			</div>
			
			<div class="finish et-icons">
				<span class="box1" style="width: 50%;">
					<span class="icon-happy" aria-hidden="true" style="width: 100%;">
						<button class="btn btn-block btn-round btn-d submit" type="submit">YA SAYA SIAP!</button>
					</span>
				</span>
				<span class="box1" style="width: 50%;">
					<span class="icon-sad" aria-hidden="true" style="width: 100%;">
						<button class="btn btn-block btn-round btn-d batal" type="button">TIDAK, BATALKAN!</button>
					</span>
				</span>
				<br><br><br><br><br>
				<button class="btn btn-g btn-round btn-block back6" type="button" style="width: 100%;">Kembali Ke Form Sebelumnya</button>
			</div>
		</form>
	</div>
	</div>
</div>
<script>
	$(document).ready(function(){
			$('.userpass').hide();
			$('.finish').hide();
	// Validasi Nama Lengkap
			$('#nama').on('keyup',function(){
			var regex = /^[a-z A-Z]+$/;
			if (regex.test(this.value) !== true) {
			this.value = this.value.replace(/[^a-zA-Z]+/, '');
			}else if ($(this).val().length < 5) {
			$('.nama').text('Anda Yakin Nama Anda Terdiri Dari '+ $(this).val().length + ' Huruf?');
			}else{
			$('.nama').text('');
			}
			if ($(this).val().length == 0) {
			$('.nama').text('Nama Harus Di isi!');
			}
		});
	// validasi email
				var email;
				$('#email').on('keyup', function(){
				var valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				if (!this.value.match(valid)){
				$('.email').text('Isi Email dengan Benar!');
				email = false;
				}
<?php foreach ($data['pelanggan'] as $pelanggan): ?>
else if($(this).val() == "<?= $pelanggan['email']; ?>"){
$('.email').text('Email Sudah Terdaftar!');
email = false;
}
<?php endforeach; ?>
else{
$('.email').text('');
email = true;
}
});
// validasi nomor telepon
$('#no_tlp').on('keyup', function(){
var regex = /^[0-9]+$/;
if (regex.test(this.value) !== true) {
this.value = this.value.replace(/[^0-9]+/, '');
}else{
$('.no_tlp').text('');
}
});
$('.selanjutnya').on('click', function(){
if ($('#nama').val() === '') {
$('.nama').text('Nama Harus Di isi!');
}else if ($('#email').val() === '') {
$('.email').text('Email Harus Di isi!');
}else if ($('#no_tlp').val() === '') {
$('.no_tlp').text('Nomor Harus Di isi!');
}else if (email == false) {
$('.email').text('Isi Email dengan Benar!');
}else if($('#alamat').val() === ''){
$('.alamat').text('Alamat Harus Di isi!');
}
else{
$('.judul').text('Akun Masuk');
$('.dataDiri').hide();
$('.userpass').show();
}
});
var username;
$('#username').on('keyup',function(){
if ($(this).val() < 1) {
$('.username').text('Username Harus Diisi');
}
<?php foreach ($data['user'] as $user):?>
else if ($(this).val() == "<?= $user['username']; ?>" ){
$('.username').text('Username tidak bisa dipakai');
username = false;
}
<?php endforeach; ?>
else{
$('.username').text('');
}

});
var passv;
$('#password').on('keyup',function(){
if ($(this).val().length < 8) {
$('.password').text('Password Minimal 8 digit');
passv = false;
}else{
$('.password').text('');
passv = true;
}
});
var passvalid;
$('#password2').on('keyup',function(){
if ($(this).val() != $('#password').val()) {
$('.password2').text('Password Tidak Sama');
passvalid = false;
}else{
$('.password2').text('');
passvalid = true;
}
});

$('.selanjutnya2').on('click',function(){
if ($('#username').val() === '') {
$('.username').text('Username Harus Di Isi!');
}
else if($('#password1').val() === ''){
$('.password1').text('Password Harus Di Isi!');
}
else if($('#password2').val() === ''){
$('.password2').text('Password Harus Di Isi!');
}
else if(passvalid == false){
$('.password2').text('Password Harus sama');
}
else if(passv == false){
$('.password1').text('Password Minimal 8 Digit');
}
else {
$('.userpass').hide();
$('.judul').text('Apakah Anda Siap mengikuti syarat dan aturan RepairMe?');
$('.finish').show();
}
});
$('.back').click(function(){
$('.userpass').hide();
$('.dataDiri').show();
});
});
</script>