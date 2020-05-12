<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index()
    {
        $data['judul'] = 'Login';
        // $data['user'] = $this->model('Login_model')->getAllUser();
        $this->load->view('templates/header', $data);
        $this->load->view('login/index', $data);
        $this->load->view('templates/footer');
    }

    public function checklogin()
    {
        $ret = $this->Login_model->checkloginkey($_POST);
        var_dump($ret);
        if ($ret['data'] != 'false' && $ret['data'] != 'falseUsername') {

            if ($ret['data'][0]['id_jenis'] == 1) {
                $dataSession = ['login' => true, 'jenis' => $ret['jenis'], 'userData' => $ret['data'][0]];
                $this->session->set_userdata($dataSession);
                echo "sukses admin";
                // header('Location:'.BASEURL.'/mitra/');
            } else if ($ret['data'][0]['id_jenis'] == 2) {
                $dataSession = ['login' => true, 'jenis' => $ret['jenis'], 'userData' => $ret['data'][0]];
                $this->session->set_userdata($dataSession);
                redirect('mitra');
            } else if ($ret['data'][0]['id_jenis'] == 3) {
                $dataSession = ['login' => true, 'jenis' => $ret['jenis'], 'userData' => $ret['data'][0]];
                $this->session->set_userdata($dataSession);
                redirect('pelanggan');
            }
        } else if ($ret['data'] == 'false') {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "Password Yang Anda Masukkan Salah",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        } else if ($ret['data'] == 'falseUsername') {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "Username Belum Terdaftar",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "Username Belum Terdaftar",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
        redirect('login');
    }
}
