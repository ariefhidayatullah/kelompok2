<?php
class Admin extends Controller{
	public function index(){
		$data['judul'] = 'Admin';
		if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'admin') {
		$call = $this->model('Admin_model');
		$data['pelanggan'] = $call->jumlahpelanggan();
		$data['mitra'] = $call->jumlahmitra();
		$this->view('admin/templates/header', $data);
		$this->view('admin/index',$data);
		$this->view('admin/templates/footer');
		}else{
			header('Location:'.BASEURL.'/login');
		}
	}


	public function permintaanverifikasi(){
		$data['judul'] = 'Pengajuan Verifikasi';
		$data['paket'] = $this->model('Barang_model')->getAllPaket();
		$data['mitra'] = $this->model('Mitra_model')->getAllMitra();
		$this->view('admin/templates/header',$data);
		$this->view('admin/permintaanverifikasi', $data);
		$this->view('admin/templates/footer');
	}



	//controller tambahdatalaptop
	public function tambahdatalaptop(){
		$data['judul'] = 'Tambah Daftar Laptop';
		$call = $this->model('Barang_model');
		$data['tipe'] = $call->getLaptop();
		$data['merk'] = $call->getMerkLaptop();
		$this->view('admin/templates/header',$data);
		$this->view('admin/barang/tambahLaptop', $data);
		$this->view('admin/templates/footer');
	}

	public function perbaikan(){
		$data['judul'] = 'Data Perbaikan';
		$call = $this->model('Admin_model');
		$data['perbaikan'] = $call->getPerbaikan();
		$data['perbaikan2'] = $call->getPerbaikan2();
		$this->view('admin/templates/header',$data);
		$this->view('admin/perbaikan/perbaikan', $data);
		$this->view('admin/templates/footer');
	}


	//controller tambahdatahp
	public function tambahdatahp(){
		$data['judul'] = 'Tambah Daftar Handphone';
		$call = $this->model('Barang_model');
		$data['tipe'] = $call->getHp();
		$data['merk'] = $call->getMerkHp();
		$this->view('admin/templates/header',$data);
		$this->view('admin/barang/tambahHp', $data);
		$this->view('admin/templates/footer');
	}

	public function tambahkerusakanlaptop(){
		$data['judul'] = 'Tambah Kerusakan';
		$data['kerusakan'] = $this->model('Barang_model')->getKerusakanLaptop();
		$this->view('admin/templates/header',$data);
		$this->view('admin/kerusakan/tambahkerusakanlaptop', $data);
		$this->view('admin/templates/footer');
	}
	public function tambahkerusakanhp(){
		$data['judul'] = 'Tambah Kerusakan';
		$data['kerusakan'] = $this->model('Barang_model')->getKerusakanHp();
		$this->view('admin/templates/header',$data);
		$this->view('admin/kerusakan/tambahkerusakanhp', $data);
		$this->view('admin/templates/footer');
	}
	public function paket(){
		$data['judul'] = 'Tambah Paket';
		$data['paket'] = $this->model('Barang_model')->getAllPaket();
		$this->view('admin/templates/header',$data);
		$this->view('admin/paket', $data);
		$this->view('admin/templates/footer');
	}

	//data Mitra
	public function dataMitra(){
		$data['judul'] = 'Data Mitra';
		$data['mitra'] = $this->model('Mitra_model')->getAllMitra();
		$this->view('admin/templates/header', $data);
		$this->view('admin/dataMitra', $data);
		$this->view('admin/templates/footer');
	}
	//data Pelanggan
	public function dataPelanggan(){
		$data['judul'] = 'Data Pelanggan';
		$data['pelanggan'] = $this->model('pelanggan_model')->getAllpelanggan();
		$this->view('admin/templates/header',$data);
		$this->view('admin/dataPelanggan', $data);
		$this->view('admin/templates/footer');
	}

	public function petaLokasi(){
		$this->view('admin/templates/header');
		$this->view('admin/ControlMaps');
		$this->view('admin/templates/footer');
	}

	public function chart(){
		$this->view('admin/templates/header');
		$this->view('admin/chart');
		$this->view('admin/templates/footer');
	}
	public function Verifikasimitra(){
		//var_dump($_POST);
		if($this->model('Admin_model')->Verif_mitra($_POST) > 0){
		header ('Location: '.BASEURL.'/admin/permintaanverifikasi');
		Flasher::setFlash(' berhasil', 'terverifikasi', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/admin/permintaanverifikasi');
		Flasher::setFlash(' gagal', 'diverifikasi', 'danger');	
			exit();
		}
	}
	public function tambahMerkLaptop(){
		if($this->model('Barang_model')->tambahMerkLaptop($_POST) > 0){
			Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			header ('Location: '.BASEURL.'/admin/tambahdatalaptop');
			exit();
		}else {
			Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			header ('Location: '.BASEURL.'/admin/tambahdatalaptop');
			exit();
		}
	}

	public function tambahTipeLaptop(){
		// var_dump($_POST);

		if($this->model('Barang_model')->tambahTipeLaptop($_POST) > 0){
			Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			header ('Location: '.BASEURL.'/admin/tambahdatalaptop');
			exit();
		}else {
			Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			header ('Location: '.BASEURL.'/admin/tambahdatalaptop');
			exit();
		}
	}


	public function tambahMerkHp(){
		if($this->model('Barang_model')->tambahMerkHp($_POST) > 0){
			Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			header ('Location: '.BASEURL.'/admin/tambahdatahp');
			exit();
		}else {
			Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			header ('Location: '.BASEURL.'/admin/tambahdatahp');
			exit();
		}
	}

	public function tambahTipeHp(){
		// var_dump($_POST);
		// $s = $this->model('Barang_model')->tambahTipeHp($_POST);
		// var_dump($s);
		if($this->model('Barang_model')->tambahTipeHp($_POST) > 0){
			Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			header ('Location: '.BASEURL.'/admin/tambahdatahp');
			exit();
		}else {
			Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			header ('Location: '.BASEURL.'/admin/tambahdatahp');
			exit();
		}
	}

public function tambahkerusakanlaptopbaru(){
	// var_dump($_POST);
	if($this->model('Barang_model')->tambahkerusakanlaptop($_POST) > 0){
	header ('Location: '.BASEURL.'/admin/tambahkerusakanlaptop');
	Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
		exit();
	}else {
	header ('Location: '.BASEURL.'/admin/barang/tambahkerusakanlaptop');
	Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
		exit();
	}
}

public function tambahkerusakanhpbaru(){
	// var_dump($_POST);
	if($this->model('Barang_model')->tambahkerusakanhp($_POST) > 0){
	header ('Location: '.BASEURL.'/admin/tambahkerusakanhp');
	Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
		exit();
	}else {
	header ('Location: '.BASEURL.'/admin/barang/tambahkerusakanhp');
	Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
		exit();
	}
}

public function tambahpaketlagi(){
	// var_dump($_POST)
	if($this->model('Barang_model')->tambahpaket($_POST) > 0){
	header ('Location: '.BASEURL.'/admin/paket');
	Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
		exit();
	}else {
	header ('Location: '.BASEURL.'/admin/paket');
	Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
		exit();
	}

}

// 
 public function editKerusakanHp(){
		//var_dump($_POST);
		if($this->model('Barang_model')->updateKerusakanHp($_POST) > 0){
			Flasher::setFlash(' berhasil', 'diubah', 'success');
			header ('Location: '.BASEURL.'/admin/tambahkerusakanhp');
			exit();
		}else {
			Flasher::setFlash(' gagal', 'ditubah', 'danger');	
			header ('Location: '.BASEURL.'/admin/tambahkerusakanhp');
			exit();
		}
	
	 }

public function deleteKerusakanhp($id){
		if ($this->model('Barang_model')->deleteKerusakanhp($id) > 0) {
			Flasher::setFlash(' berhasil', 'dihapus', 'success');
			header('Location: '.BASEURL.'/admin/tambahkerusakanhp');
			exit;
		}else{
			Flasher::setFlash(' gagal', 'dihapus', 'danger');
			header('Location: '.BASEURL.'/admin/tambahkerusakanhp');
			exit;
		}
	}

public function deleteMtr($id){
		if ($this->model('Mitra_model')->deleteMitra($id) > 0) {
			Flasher::setFlash(' berhasil', 'Menolak', 'success');
			header('Location: '.BASEURL.'/admin/permintaanverifikasi');
			exit;
		}else{
			Flasher::setFlash(' gagal', 'Menolak', 'danger');
			header('Location: '.BASEURL.'/admin/permintaanverifikasi');
			exit;
		}
	}

public function editKerusakanlaptop(){
		//var_dump($_POST);
		if($this->model('Barang_model')->updateKerusakanLaptop($_POST) > 0){
			Flasher::setFlash(' berhasil', 'diubah', 'success');
			header ('Location: '.BASEURL.'/admin/tambahkerusakanlaptop');
			exit();
		}else {
			Flasher::setFlash(' gagal', 'ditubah', 'danger');	
			header ('Location: '.BASEURL.'/admin/tambahkerusakanlaptop');
			exit();
		}
	
	 }
public function deleteKerusakanlaptop($id){
		if ($this->model('Barang_model')->deleteKerusakanlaptop($id) > 0) {
			Flasher::setFlash(' berhasil', 'dihapus', 'success');
			header('Location: '.BASEURL.'/admin/tambahkerusakanlaptop');
			exit;
		}else{
			Flasher::setFlash(' gagal', 'dihapus', 'danger');
			header('Location: '.BASEURL.'/admin/tambahkerusakanlaptop');
			exit;
		}
	}

public function edittipeLaptop(){
		//var_dump($_POST);
		// $result = $this->model('Barang_model')->updatetipeLaptop($_POST);
		// var_dump($result);
		if($this->model('Barang_model')->updatetipeLaptop($_POST) > 0){
			Flasher::setFlash(' berhasil', 'diubah', 'success');
			header ('Location: '.BASEURL.'/admin/tambahdatalaptop');
			exit();
 		}else {
 			Flasher::setFlash(' gagal', 'ditubah', 'danger');	
			header ('Location: '.BASEURL.'/admin/tambahdatalaptop');
			exit();
		}
	
	 }

public function deletelaptop($id){
		if ($this->model('Barang_model')->deleteBaranglaptop($id) > 0) {
			Flasher::setFlash(' berhasil', 'dihapus', 'success');
			header('Location: '.BASEURL.'/admin/tambahdatalaptop');
			exit;
		}else{
			Flasher::setFlash(' gagal', 'dihapus', 'danger');
			header('Location: '.BASEURL.'/admin/tambahdatalaptop');
			exit;
		} 
	}

public function edittipeHp(){
		//var_dump($_POST);
		// $result = $this->model('Barang_model')->updatetipeLaptop($_POST);
		// var_dump($result);
		if($this->model('Barang_model')->updatetipeHp($_POST) > 0){
			Flasher::setFlash(' berhasil', 'diubah', 'success');
			header ('Location: '.BASEURL.'/admin/tambahdatahp');
			exit();
		}else  {
			Flasher::setFlash(' gagal', 'ditubah', 'danger');	
			header ('Location: '.BASEURL.'/admin/tambahdatahp');
			exit();
		}
	
	 }

public function hapushp($id){
		if ($this->model('Barang_model')->delHandphone($id) > 0) {
			Flasher::setFlash(' berhasil', 'dihapus', 'success');
			header('Location: '.BASEURL.'/admin/tambahdatahp');
			exit;
		}else{
			Flasher::setFlash(' gagal', 'dihapus', 'danger');
			header('Location: '.BASEURL.'/admin/tambahdatahp');
			exit;
		} 
	}


public function deletepaket($id){
		if ($this->model('Barang_model')->deletePaket($id) > 0) {
			//Flasher::setFlash(' berhasil', 'dihapus', 'success');
			header('Location: '.BASEURL.'/admin/paket');
			exit;
		}else{
			//Flasher::setFlash(' gagal', 'dihapus', 'danger');
			header('Location: '.BASEURL.'/admin/paket');
			exit;
		}
	}
 public function editPaket(){
		// var_dump($_POST);
			if($this->model('Barang_model')->updatepaket($_POST) > 0){
			Flasher::setFlash(' berhasil', 'dibahkan', 'success');
			header ('Location: '.BASEURL.'/admin/paket');
			exit();
		}else {
			Flasher::setFlash(' gagal', 'ditaan', 'danger');	
			header ('Location: '.BASEURL.'/admin/paket');
			exit();
		}
	
	 }


}