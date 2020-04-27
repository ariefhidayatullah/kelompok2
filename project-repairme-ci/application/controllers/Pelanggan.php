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

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */