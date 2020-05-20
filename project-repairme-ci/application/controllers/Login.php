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
        if ($ret['data'] != 'false' && $ret['data'] != 'falseUsername' && $ret['data'] != 'falseActivated') {

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
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({width: "auto", text: "Password Yang Anda Masukkan Salah",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        } else if ($ret['data'] == 'falseUsername') {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({width: "auto", text: "Username Belum Terdaftar",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        } else if ($ret['data'] == 'falseActivated') {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({width: "auto", text: "Username Belum Aktif, Silahkan Klik Link Aktivasi Di Email Anda.",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({width: "auto", text: "Username Belum Terdaftar",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
        redirect('login');
    }

    public function lupapassword()
    {
        $data['judul'] = 'Lupa Password';
        // $data['user'] = $this->model('Login_model')->getAllUser();
        $this->load->view('templates/header', $data);
        $this->load->view('login/lupapassword', $data);
        $this->load->view('templates/footer');
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'e41182271@student.polije.ac.id',
            'smtp_pass' => 'E41182271',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        ];

        $this->email->set_newline("\r\n");
        $this->email->initialize($config);

        $this->email->from('e41182271@student.polije.ac.id', 'Repairme');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Klik link ini untuk aktifasi akun anda : <a href="' . base_url() . 'pelanggan/verify?username=' . $this->input->post('username') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'login/resetpassword?username=' . $this->input->post('username') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetpassword()
    {
        $username = $this->input->post('username');
        $user = $this->db->get_where('tb_user', ['username' => $username, 'is_active' => 1])->row_array();

        if ($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'username' => $username,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('tb_token', $user_token);
            $this->_sendEmail($token, 'forgot');

            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({width: "auto", text: "Please check your email to reset your password!",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login/lupapassword');
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({width: "auto", text: "Email is not registered or activated!",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login/lupapassword');
        }
    }
}
