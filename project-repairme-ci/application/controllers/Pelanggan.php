<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard Pelanggan';
		if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'pelanggan'){
			$this->load->view('pelanggan/templates/header', $data);
			$this->load->view('pelanggan/index', $data);
			$this->load->view('pelanggan/templates/footer');
			// echo "oke";
			}else{
			$this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
		}	
	}

	public function registrasi(){
		$data['judul'] = 'Registrasi pelanggan';
		$data['pelanggan'] = $this->Pelanggan_model->getAllpelanggan();
		$data['user'] = $this->User_model->getAllUser();
		$this->load->view('templates/header', $data);
		$this->load->view('pelanggan/regis', $data);
		$this->load->view('templates/footer');
	}
	public function insertpelanggan(){
	// var_dump($_POST);
	if($this->Pelanggan_model->inputpelanggan($_POST) > 0){
		// header ('Location: '.BASEURL.'/pelanggan/');
		// Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
			exit();
		}else {
		// header ('Location: '.BASEURL.'/pelanggan/');
		// Flasher::setFlash(' gagal', 'ditambahkan', 'danger');	
			exit();
		}
}

	// ============== BAGIAN PERBAIKAN ============ //

	public function pengajuanperbaikan()
	{	
		$data['judul'] = 'Pengajuan Perbaikan';
		if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'pelanggan'){
			// $call = $this->model('Perbaikan_model');
			// $data['pelanggan'] = $this->model('pelanggan_model')->getPelNow();
			// $data['perbaikan'] = $call->getPerbaikan();
			// $data['perbaikan2'] = $call->getPerbaikan2();
			// $data['voucher'] = $call->getVoucher();
			// $data['voucher2'] = $call->getVoucher2(); 
			$data['laptop'] = $this->Pelanggan_model->pengajuanLaptop($this->session->userdata('userData')['id_pelanggan']);
			$this->load->view('pelanggan/templates/header',$data);
			$this->load->view('pelanggan/perbaikan/pengajuan', $data);
			$this->load->view('pelanggan/templates/footer');
		}else{
			$this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
		}
	}

	public function laptopTtd()
	{
		$kode = $this->input->post('kode');
		$data = $this->Pelanggan_model->mdlLaptopTtd($kode);
		echo json_encode($data);
	}
	public function detail_laptop()
	{
		$kode = $this->input->post('kode');
		$data = $this->Pelanggan_model->mdldetail_laptop($kode);
		echo json_encode($data);
	}

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */