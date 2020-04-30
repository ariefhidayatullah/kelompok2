<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Barang_model');
	}


	public function index()
	{
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
	public function tambahdatalaptop()
	{
		$data['judul'] = 'Tambah Daftar Laptop';
		$data['tipe'] = $this->Barang_model->getLaptop();
		$data['merk'] = $this->Barang_model->getMerkLaptop();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/barang/tambahLaptop', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambahMerkLaptop()
	{
		if ($this->Barang_model->tambahMerkLaptop($_POST) > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><h5><i class="icon fas fa-check"></i> Alert!</h5>Data merk has been created!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatalaptop');
			exit();
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data merk has been created!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatalaptop');
			exit();
		}
	}

	public function tambahTipeLaptop()
	{
		if ($this->Barang_model->tambahTipeLaptop($_POST) > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><h5><i class="icon fas fa-check"></i> Alert!</h5>Data Tipe has been created!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatalaptop');
			exit();
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data tipe has been delete!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatalaptop');
			exit();
		}
	}

	public function editTipeLaptop()
	{
		if ($this->Barang_model->updateTipeLaptop($_POST) > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><h5><i class="icon fas fa-check"></i> Alert!</h5>Data has been updated!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatalaptop');
			exit();
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data failed to update!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatalaptop');
			exit();
		}
	}

	public function deleteLaptop($id)
	{
		if ($this->Barang_model->deleteBarangLaptop($id) > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data has been delete!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatalaptop');
			exit();
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data failed to delete!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatalaptop');
			exit();
		}
	}


	//controller tambahdatalaptop
	public function tambahdatahp()
	{
		$data['judul'] = 'Tambah Daftar Hp';
		$data['tipe'] = $this->Barang_model->getHp();
		$data['merk'] = $this->Barang_model->getMerkHp();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/barang/tambahHp', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambahMerkHp()
	{
		if ($this->Barang_model->tambahMerkHp($_POST) > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><h5><i class="icon fas fa-check"></i> Alert!</h5>Data merk has been created!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatahp');
			exit();
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data merk has been created!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatahp');
			exit();
		}
	}

	public function tambahTipeHp()
	{
		if ($this->Barang_model->tambahTipeHp($_POST) > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><h5><i class="icon fas fa-check"></i> Alert!</h5>Data Tipe has been created!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatahp');
			exit();
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data tipe has been delete!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatahp');
			exit();
		}
	}

	public function editTipeHp()
	{
		if ($this->Barang_model->updateTipeHp($_POST) > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><h5><i class="icon fas fa-check"></i> Alert!</h5>Data has been updated!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatahp');
			exit();
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data failed to update!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatahp');
			exit();
		}
	}

	public function deleteHp($id)
	{
		if ($this->Barang_model->deleteBaranghp($id) > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data has been delete!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatahp');
			exit();
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h5><i class="icon fas fa-ban"></i> Alert!</h5>Data failed to delete!</div>');
			header('Location: ' . base_url() . 'admin/tambahdatahp');
			exit();
		}
	}
}
