<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perbaikan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mitra_model');
	}

	public function index()
	{
		$data['judul'] = 'Perbaikan';
		$data['mitra'] = $this->Mitra_model->getAllMitra();
		$this->load->view('templates/header',$data);
		$this->load->view('perbaikan/index', $data);
		$this->load->view('templates/footer'); 
	}
	
	public function barangkerusakan(){
		// if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
		// $data['judul'] = 'Perbaikan';
		// $data['id'] = $this->model('Mitra_model')->getDetail($_POST['id']);
		// $call = $this->model('Barang_model');
		// $data['merk_laptop'] = $call->getMerkLaptop();
		// $data['tipe_laptop'] = $call->getTipeLaptop();
		// $data['merk_hp'] = $call->getMerkHp();
		// $data['tipe_hp'] = $call->getTipeHp();
		// $data['kerusakan_laptop'] = $call->getKerusakanLaptop();
		// $data['kerusakan_hp'] = $call->getKerusakanHp();
		// $this->view('templates/header',$data);
		// $this->view('perbaikan/barangkerusakan', $data);
		// $this->view('templates/footer');
		// }else{
		// 	header('Location:'.BASEURL.'/login');
		// }
	}

	// 	public function detail(){
	// 	if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'pelanggan'){
	// 	$data['judul'] = 'Pengajuan Perbaikan';
	// 	$call = $this->model('Perbaikan_model');
	// 	$data['perbaikan'] = $call->getPerbaikan();
	// 	$data['perbaikan2'] = $call->getPerbaikan2();
	// 	$this->view('templates/header',$data);
	// 	$this->view('perbaikan/detail', $data);
	// 	$this->view('templates/footer');
	// 	}else{
	// 		header('Location:'.BASEURL.'/login');
	// 	}
	// }

}

