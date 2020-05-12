<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_model');
		$this->load->model('User_model');
		$this->load->model('Barang_model');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard Pelanggan';
		if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'pelanggan') {
			$this->load->view('pelanggan/templates/header', $data);
			$this->load->view('pelanggan/index', $data);
			$this->load->view('pelanggan/templates/footer');
			// echo "oke";
		} else {
			$this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
			redirect('login');
		}
	}

	public function registrasi()
	{
		$data['judul'] = 'Registrasi pelanggan';
		$data['pelanggan'] = $this->Pelanggan_model->getAllpelanggan();
		$data['user'] = $this->User_model->getAllUser();
		$this->load->view('templates/header', $data);
		$this->load->view('pelanggan/regis', $data);
		$this->load->view('templates/footer');
	}
	public function insertpelanggan()
	{
		// var_dump($_POST);
		if ($this->Pelanggan_model->inputpelanggan($_POST) > 0) {
			// header ('Location: '.BASEURL.'/pelanggan/');
			// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		} else {
			// header ('Location: '.BASEURL.'/pelanggan/');
			// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	}

	// ============== BAGIAN PROFILE ============ //

	public function profile()
	{
		// var_dump($_SESSION['login']['data']['nama_usaha']);
		// echo $_SESSION['login'];
		$data['judul'] = 'Pelanggan RepairMe';
		$data['pelanggan'] = $this->Pelanggan_model->getPelNow();
		if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'pelanggan') {
			$this->load->view('pelanggan/templates/header', $data);
			$this->load->view('pelanggan/profile', $data);
			$this->load->view('pelanggan/templates/footer');
		} else {
			header('Location:' . base_url() . '/login');
		}
	}

	public function editProfile()
	{

		$data['judul'] = 'editprofile';
		if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'pelanggan') {
			$data['pelanggan'] = $this->Pelanggan_model->getPelNow();
			$this->load->view('pelanggan/templates/header', $data);
			$this->load->view('pelanggan/editprofile', $data);
			$this->load->view('pelanggan/templates/footer');
		}
	}

	public function editProfilePel()
	{
		//var_dump($_POST);
		if ($this->Pelanggan_model->updatePelanggan($_POST) > 0) {
			$this->session->userdata('login') == true && $this->session->userdata('jenis') == 'pelanggan';
			header('Location: ' . base_url() . 'pelanggan/');
			// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		} else {
			header('Location: ' . base_url() . 'pelanggan/editprofile');
			// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
	}


	// ============== TUTUP BAGIAN PROFILE ============ //


	// ============== BAGIAN PERBAIKAN ============ //

	public function pengajuanperbaikan()
	{
		$data['judul'] = 'Pengajuan Perbaikan';
		if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'pelanggan') {
			$data['laptop'] = $this->Pelanggan_model->pengajuanLaptop($this->session->userdata('userData')['id_pelanggan']);
			$data['hp'] = $this->Pelanggan_model->pengajuanHp($this->session->userdata('userData')['id_pelanggan']);
			$this->load->view('pelanggan/templates/header', $data);
			$this->load->view('pelanggan/perbaikan/pengajuan', $data);
			$this->load->view('pelanggan/templates/footer');
		} else {
			$this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
			redirect('login');
		}
	}

	public function laptopTtd()
	{
		$kode = $this->input->post('kode');
		$data = $this->Barang_model->LaptopTtd($kode);
		echo json_encode($data);
	}
	public function detail_laptop()
	{
		$kode = $this->input->post('kode');
		$data = $this->Barang_model->detail_laptop($kode);
		echo json_encode($data);
	}
	public function detail_laptop_ttd()
	{
		$kode = $this->input->post('kode');
		$data = $this->Barang_model->detail_laptop_ttd($kode);
		echo json_encode($data);
	}
	public function detail_mitra()
	{
		$kode = $this->input->post('kode');
		$data = $this->Pelanggan_model->detail_mitra($kode);
		echo json_encode($data);
	}
	public function hpTtd()
	{
		$kode = $this->input->post('kode');
		$data = $this->Pelanggan_model->hpTtd($kode);
		echo json_encode($data);
	}
}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */
