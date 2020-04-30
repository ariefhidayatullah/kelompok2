<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index(){
        $data['judul'] = 'Login';
        // $data['user'] = $this->model('Login_model')->getAllUser();
        $this->load->view('templates/header',$data);
        $this->load->view('login/index',$data);
        $this->load->view('templates/footer'); 
    }

    public function checklogin(){
        $ret = $this->Login_model->checkloginkey($_POST);
        if (count($ret) == 1) {

            if ($ret[0]['id_jenis'] == 1) {
                $dataSession = ['login' => 'active','userData' => $ret[0]];
                $this->session->set_userdata($dataSession);
                echo "sukses admin";
                // header('Location:'.BASEURL.'/mitra/');
            }else if ($ret[0]['id_jenis'] == 2) {
                $dataSession = ['login' => 'active','userData' => $ret[0]];
                $this->session->set_userdata($dataSession);
                echo "sukses mitra";
                // header('Location:'.BASEURL.'/mitra/');
            }else if ($ret[0]['id_jenis'] == 3) {
                $dataSession = ['login' => 'active','userData' => $ret[0]];
                $this->session->set_userdata($dataSession);
                echo "sukses pelanggan";
                // header('Location:'.BASEURL.'/mitra/');
            }
        }
        if ($ret == 'false'){
            echo "login gagal, password salah";
            // Flasher::setFlash(' Login', 'GAGAl', 'danger'); 
                // header('Location:'.BASEURL.'/login/');
        }
    }

    public function logout(){
    session_destroy();

    header('Location:'.base_url('login'));
    exit;
    }

}
