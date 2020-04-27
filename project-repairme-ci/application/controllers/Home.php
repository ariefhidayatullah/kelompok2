<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mitra_model');
        $this->load->model('Barang_model');
        $this->load->model('Pelanggan_model');
    }

    public function index(){
		$data['judul'] = 'Homes';
		$data['mitra'] = $this->Mitra_model->getAllMitra();
		$this->load->view('templates/header', $data);
		$this->load->view('home/index2',$data);
        $this->load->view('templates/footer');
        
    }

    public function about(){
		$data['judul'] = 'Tentang Kami';
		$this->load->view('templates/header', $data);
		$this->load->view('home/about');
		$this->load->view('templates/footer');
    }
    
    public function portfolioMitra(){
		$data['mitra'] = $this->Mitra_model->getAllMitra();
		$data['judul'] = 'Portfolio Mitra';
		$this->load->view('templates/header', $data);
		$this->load->view('home/portfolioMitra',$data);
		$this->load->view('templates/footer');
	}

    public function paket(){
		$data['paket'] = $this->Mitra_model->getAllPaket();
		$data['judul'] = 'Paket Biaya Iklan';
		$this->load->view('templates/header', $data);
		$this->load->view('home/paket',$data);
		$this->load->view('templates/footer');
    }
    
    public function testimoni(){
		$data['paket'] = $this->model('Pelanggan_model')->inputrating($data);
		$data['judul'] = 'testimoni';
		$this->view('templates/header', $data);
		$this->view('home/index/#testimonial',$data);
		$this->view('templates/footer');
	}

}
