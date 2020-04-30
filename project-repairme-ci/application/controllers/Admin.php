<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_model');
		$this->load->model('Barang_model');
	}


	public function index(){
		$data['judul'] = 'Admin';
		//if ($_SESSION['login']['pesan'] == true && $_SESSION['login']['jenis'] == 'admin') {
		$data['pelanggan'] = $this->Admin_model->jumlahpelanggan();
		$data['mitra'] = $this->Admin_model->jumlahmitra();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('admin/templates/footer');
		//}else{
		//	header('Location:'.base_url().'/login');
		//}
	}

	//controller tambahdatalaptop
	public function tambahdatalaptop(){
		$data['judul'] = 'Tambah Daftar Laptop';
		$data['tipe'] = $this->Barang_model->getLaptop();
		$data['merk'] = $this->Barang_model->getMerkLaptop();
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/barang/tambahLaptop', $data);
		$this->load->view('admin/templates/footer');
	}

	


}