<?php 

//ini adalah file child(anak) dari core/Controller

class Home extends Controller{
	public function index(){
		// //membuat variable data, untuk mengisikan parameter, title(cek di views/home/index.php);
		$data['judul'] = 'Home';
		// $data['user'] = $this->model('User_model')->getUser();
		//memangil method view dengan parameter $data
		//templates/header -> untuk lokasi filenya ada dimana
		$data['mitra'] = $this->model('Mitra_model')->getAllMitra();
		$this->view('templates/header', $data);
		$this->view('home/index2',$data);
		$this->view('templates/footer');
	}

	public function about(){
		// //membuat variable data, untuk mengisikan parameter, title(cek di views/home/index.php);
		$data['judul'] = 'Tentang Kami';
		// $data['user'] = $this->model('User_model')->getUser();
		//memangil method view dengan parameter $data
		//templates/header -> untuk lokasi filenya ada dimana
		$this->view('templates/header', $data);
		$this->view('home/about');
		$this->view('templates/footer');
	}


	public function portfolioMitra(){
		$data['mitra'] = $this->model('Mitra_model')->getAllMitra();
		$data['judul'] = 'Portfolio Mitra';
		$this->view('templates/header', $data);
		$this->view('home/portfolioMitra',$data);
		$this->view('templates/footer');
	}

	public function paket(){
		$data['paket'] = $this->model('Barang_model')->getAllPaket();
		$data['judul'] = 'Paket Biaya Iklan';
		$this->view('templates/header', $data);
		$this->view('home/paket',$data);
		$this->view('templates/footer');
	}


	public function testimoni(){
		$data['paket'] = $this->model('Pelanggan_model')->inputrating($data);
		$data['judul'] = 'testimoni';
		$this->view('templates/header', $data);
		$this->view('home/index/#testimonial',$data);
		$this->view('templates/footer');
	}

	
	public function transaksi(){
		//var_dump($_POST);
		if($this->model('Mitra_model')->inputTransaksi($_POST) > 0){
		header ('Location: '.BASEURL.'/home/paket');
		 Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		header ('Location: '.BASEURL.'/home/paket');
		 Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	
	 }

}
