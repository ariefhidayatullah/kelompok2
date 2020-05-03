<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mitra_model');
        $this->load->model('User_model');
    }

    public function registrasi()
    {
        $data['mitra'] = $this->Mitra_model->getAllMitra();
        $data['user'] = $this->User_model->getAllUser();
        $data['judul'] = 'Registrasi';

        $this->load->view('templates/header', $data);
        $this->load->view('mitra/registrasi', $data);
        $this->load->view('templates/footer');
    }

    public function insertMitra()
    {
        $this->Mitra_model->inputMitra($_POST);
    }

    public function index()
    {
        $data['judul'] = 'Mitra RepairMe';
        $data['mitra'] = $this->Mitra_model->getMitraNow();
        if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'mitra') {
            $this->load->view('mitra/templates/header', $data);
            $this->load->view('mitra/index', $data);
            $this->load->view('mitra/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }
}
