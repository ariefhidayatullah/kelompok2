<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mitra_model');
    }

    public function index(){
		$data['judul'] = 'Homes';
		$data['mitra'] = $this->Mitra_model->getAllMitra();
		$this->load->view('templates/header', $data);
		$this->load->view('home/index2',$data);
        $this->load->view('templates/footer');
        
    }


}
