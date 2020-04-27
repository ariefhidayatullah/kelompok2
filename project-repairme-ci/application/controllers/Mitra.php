<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {

    function __construct(){
		parent::__construct();		
        $this->load->model('Mitra_model');
        $this->load->model('User_model');
	}

    public function registrasi(){
        $data['mitra'] = $this->Mitra_model->getAllMitra();
        $data['user'] = $this->User_model->getAllUser();
        $data['judul'] = 'Registrasi';

        $this->load->view('templates/header', $data);
        $this->load->view('mitra/registrasi', $data);
        $this->load->view('templates/footer');

    }

    public function insertMitra(){
    // var_dump($_POST);
    $this->Mitra_model->inputMitra($_POST);
    // var_dump($_FILES);
    // $hasil = $this->model('Mitra_model')->inputMitra($_POST);
    // // var_dump($hasil);
    // if($this->model('Mitra_model')->inputMitra($_POST) > 0){
    // header ('Location: '.BASEURL.'/mitra/');
    // // Flasher::setFlash(' berhasil', 'ditambahkan', 'success');
    //     exit();
    // }else {
    // header ('Location: '.BASEURL.'/mitra/');
    // // Flasher::setFlash(' gagal', 'ditambahkan', 'danger');    
    //     exit();
    // }

    
    }

}