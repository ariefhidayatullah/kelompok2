<?php 

class Perbaikan extends Controller{
	public function index(){
		$data['judul'] = 'Perbaikan';
		$call = $this->model('Mitra_model');
		$data['mitra'] = $call->getAllMitra();
		$this->view('templates/header',$data);
		$this->view('perbaikan/index', $data);
		$this->view('templates/footer');
	}

	public function barangkerusakan(){
		if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
		$data['judul'] = 'Perbaikan';
		$data['id'] = $this->model('Mitra_model')->getDetail($_POST['id']);
		$call = $this->model('Barang_model');
		$data['merk_laptop'] = $call->getMerkLaptop();
		$data['tipe_laptop'] = $call->getTipeLaptop();
		$data['merk_hp'] = $call->getMerkHp();
		$data['tipe_hp'] = $call->getTipeHp();
		$data['kerusakan_laptop'] = $call->getKerusakanLaptop();
		$data['kerusakan_hp'] = $call->getKerusakanHp();
		$this->view('templates/header',$data);
		$this->view('perbaikan/barangkerusakan', $data);
		$this->view('templates/footer');
		}else{
			header('Location:'.BASEURL.'/login');
		}
	}

		public function detail(){
		if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
		$data['judul'] = 'Pengajuan Perbaikan';
		$call = $this->model('Perbaikan_model');
		$data['perbaikan'] = $call->getPerbaikan();
		$data['perbaikan2'] = $call->getPerbaikan2();
		$this->view('templates/header',$data);
		$this->view('perbaikan/detail', $data);
		$this->view('templates/footer');
		}else{
			header('Location:'.BASEURL.'/login');
		}
	}

	public function pengajuanperbaikanlaptop(){
		// var_dump($_POST);
		if($this->model('Perbaikan_model')->tambahPerbaikanLaptop($_POST) > 0){
			// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			header ('Location: '.BASEURL.'/perbaikan/detail');
			exit();
		}else {
			// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			header ('Location: '.BASEURL);
			exit();
		}
	}

	public function pengajuanperbaikanhp(){
		// var_dump($_POST);
		if($this->model('Perbaikan_model')->tambahPerbaikanHp($_POST) > 0){
			// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			header ('Location: '.BASEURL.'/perbaikan/detail');
			exit();
		}else {
			// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			header ('Location: '.BASEURL);
			exit();
		}
	}

	

}
