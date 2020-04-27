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

}