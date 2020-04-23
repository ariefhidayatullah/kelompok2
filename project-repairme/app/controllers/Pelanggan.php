<?php
class Pelanggan extends Controller{
	public function index(){
		$data['judul'] = 'Pelanggan RepairMe';
		$data['pelanggan'] = $this->model('pelanggan_model')->getPelNow();
		if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
			$this->view('pelanggan/templates/header', $data);
			$this->view('pelanggan/index', $data);
			$this->view('pelanggan/templates/footer');
			}else{
				header('Location:'.BASEURL.'/login');
			}
		}
		
public function registrasi(){
	$data['judul'] = 'Registrasi pelanggan';
	$data['pelanggan'] = $this->model('pelanggan_model')->getAllpelanggan();
	$data['user'] = $this->model('User_model')->getAllUser();
	$this->view('templates/header', $data);
	$this->view('pelanggan/regis', $data);
	$this->view('templates/footer');
}
public function insertpelanggan(){
	// var_dump($_POST);
	if($this->model('pelanggan_model')->inputpelanggan($_POST) > 0){
		header ('Location: '.BASEURL.'/pelanggan/');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		// header ('Location: '.BASEURL.'/pelanggan/');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
}

public function detailPelanggan($id){

	$data['judul'] = 'Detail Pelanggan';
	$data['pelanggan'] = $this->model('Pelanggan_model')->getDetail($id);
	$this->view('templates/header', $data);
	$this->view('pelanggan/detailPelanggan', $data);
	$this->view('templates/footer');

}

public function delete($id){
		if ($this->model('Pelanggan_model')->deletepelanggan($id) > 0) {
			//Flasher::setFlash(' berhasil', 'dihapus', 'success');
			header('Location: '.BASEURL.'/Pelanggan/');
			exit;
		}else{
			//Flasher::setFlash(' gagal', 'dihapus', 'danger');
			header('Location: '.BASEURL.'/Pelanggan/');
			exit;
		}
	}
	



public function pengajuanperbaikan(){	
	$data['judul'] = 'Pengajuan Perbaikan';
	if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
	$call = $this->model('Perbaikan_model');
	$data['pelanggan'] = $this->model('pelanggan_model')->getPelNow();
	$data['perbaikan'] = $call->getPerbaikan();
	$data['perbaikan2'] = $call->getPerbaikan2();
	$data['voucher'] = $call->getVoucher();
	$data['voucher2'] = $call->getVoucher2();
	$this->view('pelanggan/templates/header',$data);
	$this->view('pelanggan/perbaikan/pengajuan', $data);
	$this->view('pelanggan/templates/footer');
	}
}

public function selesaiperbaikan(){	
	$data['judul'] = 'Selesai Perbaikan';
	if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
	$call = $this->model('Perbaikan_model');
	$data['pelanggan'] = $this->model('pelanggan_model')->getPelNow();
	$data['perbaikan'] = $call->getPerbaikan();
	$data['perbaikan2'] = $call->getPerbaikan2();
	$this->view('pelanggan/templates/header',$data);
	$this->view('pelanggan/perbaikan/selesaiperbaikan', $data);
	$this->view('pelanggan/templates/footer');
	}
}


public function perbaikan(){	
	$data['judul'] = 'Perbaikan';
	if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
	$call = $this->model('Perbaikan_model');
	$data['pelanggan'] = $this->model('pelanggan_model')->getPelNow();
	$data['perbaikan'] = $call->getPerbaikan();
	$data['perbaikan2'] = $call->getPerbaikan2();
	// $data['voucher'] = $call->getVoucher();
	// $data['voucher2'] = $call->getVoucher2();
	$this->view('pelanggan/templates/header',$data);
	$this->view('pelanggan/perbaikan/perbaikan', $data);
	$this->view('pelanggan/templates/footer');
	}
}
public function batalperbaikan(){	
	$data['judul'] = 'Batal Perbaikan';
	if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
	$call = $this->model('Perbaikan_model');
	$data['pelanggan'] = $this->model('pelanggan_model')->getPelNow();
	$data['perbaikan'] = $call->getPerbaikan();
	$data['perbaikan2'] = $call->getPerbaikan2();
	// $data['voucher'] = $call->getVoucher();
	// $data['voucher2'] = $call->getVoucher2();
	$this->view('pelanggan/templates/header',$data);
	$this->view('pelanggan/perbaikan/batalperbaikan', $data);
	$this->view('pelanggan/templates/footer');
	}
}

public function riwayatperbaikan(){	
	$data['judul'] = 'Riwayat Perbaikan';
	if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
	$call = $this->model('Perbaikan_model');
	$data['pelanggan'] = $this->model('pelanggan_model')->getPelNow();
	$data['perbaikan'] = $call->getPerbaikan();
	$data['perbaikan2'] = $call->getPerbaikan2();
	// $data['voucher'] = $call->getVoucher();
	// $data['voucher2'] = $call->getVoucher2();
	$this->view('pelanggan/templates/header',$data);
	$this->view('pelanggan/perbaikan/riwayatperbaikan', $data);
	$this->view('pelanggan/templates/footer');
	}
}

public function profile(){
		// var_dump($_SESSION['login']['data']['nama_usaha']);
		// echo $_SESSION['login'];
		$data['judul'] = 'Pelanggan RepairMe';
		$data['pelanggan'] = $this->model('pelanggan_model')->getPelNow();
		if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
		$this->view('pelanggan/templates/header', $data);
		$this->view('pelanggan/profile', $data);
		$this->view('pelanggan/templates/footer');
		}else{
			header('Location:'.BASEURL.'/login');
		}
	}

public function editProfile(){
		
		$data['judul'] = 'editprofile';
		if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
		$data['pelanggan'] = $this->model('pelanggan_model')->getPelNow();
		$this->view('pelanggan/templates/header',$data);
		$this->view('pelanggan/editprofile', $data);
		$this->view('pelanggan/templates/footer');
		}
	}
 public function editProfilePel(){
		//var_dump($_POST);
		if($this->model('pelanggan_model')->updatePelanggan($_POST) > 0){
			$_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan';
		header ('Location: '.BASEURL.'/pelanggan/');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/pelanggan/editprofile');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	
	 }

	public function beriRating(){
		
		$data['judul'] = 'BeriRating';
		$data['mitra'] = $this->model('Mitra_model')->getAllMitra();
		$data['rating'] = $this->model('pelanggan_model')->getRating();
		if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
		$this->view('templates/header',$data);
		$this->view('pelanggan/rating/ratingmitra', $data);
		$this->view('templates/footer');
		}
	}

 	public function rating(){
		// var_dump($_POST);
		if($this->model('pelanggan_model')->inputrating($_POST) > 0){
			$_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan';
		header ('Location: '.BASEURL.'/pelanggan/');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/pelanggan/beriRating');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	
	 }

	 public function diskondibaca(){
		// var_dump($_POST);
		if($this->model('pelanggan_model')->diskondibaca($_POST) > 0){
			$_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan';
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	 }

	  public function hapusnotifdiskonlaptop(){
		// var_dump($_POST);
		if($this->model('pelanggan_model')->hapusnotifdiskonlaptop($_POST) > 0){
			$_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan';
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	 }

	  public function lanjutperbaikan(){
		// var_dump($_POST);
		if($this->model('pelanggan_model')->lanjutperbaikan($_POST) > 0){
			$_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan';
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	 }

	 public function batalkanperbaikanlaptop(){
	 	// var_dump($_POST);
		if($this->model('pelanggan_model')->batalkanperbaikanlaptop($_POST) > 0){
			$_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan';
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	 }

	 public function diskondibaca2(){
		// var_dump($_POST);
		if($this->model('pelanggan_model')->diskondibaca2($_POST) > 0){
			$_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan';
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	 }

	   public function hapusnotifdiskonlaptop2(){
		// var_dump($_POST);
		if($this->model('pelanggan_model')->hapusnotifdiskonlaptop2($_POST) > 0){
			$_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan';
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	 }

	 public function lanjutperbaikan2(){
	 	if($this->model('pelanggan_model')->lanjutperbaikan2($_POST) > 0){
			$_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan';
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	 }

	 public function batalkanperbaikanhp(){
	 	var_dump($_POST);
		if($this->model('pelanggan_model')->batalkanperbaikanhp($_POST) > 0){
			$_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan';
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/pelanggan/perbaikan');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	 }


}