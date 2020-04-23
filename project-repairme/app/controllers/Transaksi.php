<?php 

class Transaksi extends Controller{
	public function index(){
		// //membuat variable data, untuk mengisikan parameter, title(cek di views/home/index.php);
		$data['judul'] = 'Transaksi';
		// $data['user'] = $this->model('User_model')->getUser();
		// //memangil method view dengan parameter $data
		// //templates/header -> untuk lokasi filenya ada dimana
		$this->view('templates/header', $data);
		$this->view('transaksi/index');
		$this->view('templates/footer');
	}
}