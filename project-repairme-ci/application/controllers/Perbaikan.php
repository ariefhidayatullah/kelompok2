<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perbaikan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mitra_model');
		$this->load->model('Barang_model');
		$this->load->model('Perbaikan_model');
	}

	public function index()
	{
		$data['judul'] = 'Perbaikan';
		$data['mitra'] = $this->Mitra_model->getAllMitra();
		$this->load->view('templates/header',$data);
		$this->load->view('perbaikan/index', $data);
		$this->load->view('templates/footer'); 
	}
	
	public function barangkerusakan()
	{
		// var_dump($this->session->userdata('userData')['id_jenis']);die;
		if ($this->session->userdata('login') == 'active' && $this->session->userdata('userData')['id_jenis'] == 3){
		$data['judul'] = 'Perbaikan';
		$data['id'] = $this->Mitra_model->getDetail($_POST['id']);
		$data['merk_laptop'] = $this->Barang_model->getMerkLaptop();
		$data['tipe_laptop'] = $this->Barang_model->getTipeLaptop();
		$data['merk_hp'] = $this->Barang_model->getMerkHp();
		$data['tipe_hp'] = $this->Barang_model->getTipeHp();
		$data['kerusakan_laptop'] = $this->Barang_model->getKerusakanLaptop();
		$data['kerusakan_hp'] = $this->Barang_model->getKerusakanHp();
			$this->load->view('templates/header',$data);
			$this->load->view('perbaikan/barangkerusakan', $data);
			$this->load->view('templates/footer');
		}else{
			redirect(base_url('login'));
		}
	}

	public function jsonTipeLaptop()
	{
		$kode = $this->input->post('kode');
		$data = $this->Barang_model->getTipeLaptop($kode);
		echo json_encode($data);
	}
	public function jsonTipeHp()
	{
		$data = $this->Barang_model->getTipeHp();
		echo json_encode($data);
	}

	public function detailPengajuan()
	{
		if ($this->input->post('jenis_perbaikan') == 'LAPTOP') {
			$data['judul'] = 'Detail Pengajuan';
			$data['input'] = $_POST;
			$data['mitra'] = $this->Mitra_model->getDetail($_POST['id_mitra']);
			$data['tipe_ttd'] = $_POST['tipe_laptop_ttd'];
			$data['merk_ttd'] = $_POST['merk_laptop_ttd'];
			if ($_POST['id_tipe_laptop'] != 0) {
				$data['barang'] = $this->Barang_model->getLaptopById($_POST['id_tipe_laptop']);
			}
			$data['kerusakan'] = $this->Barang_model->kerusakanLaptopById($_POST['id_kerusakan_laptop']);
			$data['kerusakan_lain'] = $_POST['ket_kerusakan_laptop_lain'];
			$this->load->view('templates/header',$data);
			$this->load->view('perbaikan/detail_pengajuan', $data);
			$this->load->view('templates/footer');
		}else if ($this->input->post('jenis_perbaikan') == 'HANDPHONE') {
			$data['judul'] = 'Detail Pengajuan';
			$data['input'] = $_POST;
			$data['mitra'] = $this->Mitra_model->getDetail($_POST['id_mitra2']);
			if ($_POST['id_tipe_hp'] != 0) {
				$data['barang'] = $this->Barang_model->getHpById($_POST['id_tipe_hp']);
			}
			$data['tipe_ttd'] = $_POST['tipe_hp_ttd'];
			$data['merk_ttd'] = $_POST['merk_hp_ttd'];
			$data['kerusakan'] = $this->Barang_model->kerusakanHpById($_POST['id_kerusakan_hp']);
			$data['kerusakan_lain'] = $_POST['ket_kerusakan_hp_lain'];
			$this->load->view('templates/header',$data);
			$this->load->view('perbaikan/detail_pengajuan', $data);
			$this->load->view('templates/footer');
		}

	}

	public function pengajuanperbaikanlaptop(){
		// var_dump($_POST);
		if($this->Perbaikan_model->tambahPerbaikanLaptop($_POST) > 0){
			// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			echo "oke";
			exit();
		}else {
			// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			echo "!oke";
			exit();
		}
	}
	public function pengajuanperbaikanhp(){
		// var_dump($_POST);die;
		if($this->Perbaikan_model->tambahPerbaikanHp($_POST) > 0){
			// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			echo "oke";
			exit();
		}else {
			// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			echo "!oke";
			exit();
		}
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

