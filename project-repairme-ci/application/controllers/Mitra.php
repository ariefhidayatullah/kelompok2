<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mitra_model');
        $this->load->model('User_model');
        $this->load->model('Barang_model');
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

    public function permintaanperbaikan()
    {
        $data['judul'] = 'Pengajuan Perbaikan';
        $data['mitra'] = $this->Mitra_model->getMitraNow();
        if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'mitra') {
            $data['laptop'] = $this->Mitra_model->pengajuanLaptop($this->session->userdata('userData')['id_mitra']);
            $this->load->view('mitra/templates/header', $data);
            $this->load->view('mitra/perbaikan/pengajuan', $data);
            $this->load->view('mitra/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }
    public function permintaanperbaikanhp()
    {
        $data['judul'] = 'Pengajuan Perbaikan';
        $data['mitra'] = $this->Mitra_model->getMitraNow();
        if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'mitra') {
            $data['hp'] = $this->Mitra_model->pengajuanHp($this->session->userdata('userData')['id_mitra']);
            $this->load->view('mitra/templates/header', $data);
            $this->load->view('mitra/perbaikan/pengajuanhp', $data);
            $this->load->view('mitra/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }

    public function laptopTtd()
    {
        $kode = $this->input->post('kode');
        $data = $this->Barang_model->LaptopTtd($kode);
        echo json_encode($data);
    }

    public function hpTtd()
    {
        $kode = $this->input->post('kode');
        $data = $this->Mitra_model->HpTtd($kode);
        echo json_encode($data);
    }

    public function detail_laptop()
    {
        $kode = $this->input->post('kode');
        $data = $this->Barang_model->detail_laptop($kode);
        echo json_encode($data);
    }

    public function detail_laptop_ttd()
    {
        $kode = $this->input->post('kode');
        $data = $this->Barang_model->detail_laptop_ttd($kode);
        echo json_encode($data);
    }

    public function detail_hp()
    {
        $kode = $this->input->post('kode');
        $data = $this->Mitra_model->detail_hp($kode);
        echo json_encode($data);
    }

    public function detail_hp_ttd()
    {
        $kode = $this->input->post('kode');
        $data = $this->Mitra_model->detail_hp_ttd($kode);
        echo json_encode($data);
    }

    public function detail_pelanggan()
    {
        $kode = $this->input->post('kode');
        $data = $this->Mitra_model->detail_pelanggan($kode);
        echo json_encode($data);
    }

    public function getPerbaikan()
    {
        echo json_encode($this->Mitra_model->getPerbaikan($this->input->post('kode'), $this->input->post('jenis')));
    }

    public function terimaperbaikanlaptop()
    {
        // var_dump($_POST);
        if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'mitra') {
            if ($this->Mitra_model->terimapengajuanlaptop($_POST) > 0) {
                header('Location: ' . base_url() . 'mitra/permintaanperbaikan');
                // Flasher::setFlash(' berhasil', 'diterima', 'success');
                exit();
            } else {
                header('Location: ' . base_url() . 'mitra/permintaanperbaikan');
                // Flasher::setFlash(' gagal', 'diterima', 'danger');
                exit();
            }
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }

    public function tolakperbaikanlaptop()
    {
        // var_dump($_POST);
        if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'mitra') {
            if ($this->Mitra_model->tolakpengajuanlaptop($_POST) > 0) {
                header('Location: ' . base_url() . 'mitra/permintaanperbaikan');
                // Flasher::setFlash(' berhasil', 'diterima', 'success');
                exit();
            } else {
                header('Location: ' . base_url() . 'mitra/permintaanperbaikan');
                // Flasher::setFlash(' gagal', 'diterima', 'danger');
                exit();
            }
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }

    public function terimaperbaikanhp()
    {
        // var_dump($_POST);
        if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'mitra') {
            if ($this->Mitra_model->terimapengajuanhp($_POST) > 0) {
                header('Location: ' . base_url() . 'mitra/permintaanperbaikanhp');
                // Flasher::setFlash(' berhasil', 'diterima', 'success');
                exit();
            } else {
                header('Location: ' . base_url() . 'mitra/permintaanperbaikanhp');
                // Flasher::setFlash(' gagal', 'diterima', 'danger');
                exit();
            }
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }

    public function tolakperbaikanhp()
    {
        // var_dump($_POST);
        if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'mitra') {
            if ($this->Mitra_model->tolakpengajuanhp($_POST) > 0) {
                header('Location: ' . base_url() . 'mitra/permintaanperbaikanhp');
                // Flasher::setFlash(' berhasil', 'diterima', 'success');
                exit();
            } else {
                header('Location: ' . base_url() . 'mitra/permintaanperbaikanhp');
                // Flasher::setFlash(' gagal', 'diterima', 'danger');
                exit();
            }
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }

    public function voucher()
    {
        $data['judul'] = 'Perbaikan';
        if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'mitra') {
            $data['mitra'] = $this->Mitra_model->getMitraNow();
            $this->load->view('mitra/templates/header', $data);
            $this->load->view('mitra/perbaikan/terimaVoucher', $data);
            $this->load->view('mitra/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }

    public function getVoucher()
    {
        echo json_encode($this->Mitra_model->getVoucher($this->input->post('voucher')));
    }

    public function terima_voucher()
    {
        if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'mitra') {
            if ($this->Mitra_model->terima_voucher($_POST) > 0) {
                $this->session->set_flashdata('message', '<script>setTimeout(function() { toastr.success( "Perbaikan Telah Diterima" ); }, 10)</script>');
                redirect('mitra/voucher');
            } else {
                $this->session->set_flashdata('message', '<script>setTimeout(function() { toastr.error( "Penerimaan Voucher Gagal!!" ); }, 10)</script>');
                redirect('mitra/voucher');
            }
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }

    // =========================== BAGIAN PERBAIKAN UTAMA ==========================

    public function perbaikan_laptop()
    {
        $data['judul'] = 'Perbaikan';
        $data['mitra'] = $this->Mitra_model->getMitraNow();
        if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'mitra') {
            $data['laptop'] = $this->Mitra_model->pengajuanLaptop($this->session->userdata('userData')['id_mitra']);
            $this->load->view('mitra/templates/header', $data);
            $this->load->view('mitra/perbaikan/perbaikan_laptop', $data);
            $this->load->view('mitra/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }
    public function getVoucherLaptop_ById()
    {
        echo json_encode($this->Mitra_model->getVoucherLaptop_ById($_POST['id']));
    }
    public function perbaikan_detail_laptop()
    {
        return $this->Mitra_model->perbaikan_detail_laptop($_POST['id'], $_POST['jenis']);
    }
    public function get_lama_perkiraan_laptop()
    {
        echo json_encode($this->Mitra_model->get_lama_perkiraan_laptop($_POST['id']));
    }
        public function perbaikan_hp()
    {
        $data['judul'] = 'Perbaikan';
        $data['mitra'] = $this->Mitra_model->getMitraNow();
        if ($this->session->userdata('login') == true && $this->session->userdata('jenis') == 'mitra') {
            $data['hp'] = $this->Mitra_model->pengajuanhp($this->session->userdata('userData')['id_mitra']);
            $this->load->view('mitra/templates/header', $data);
            $this->load->view('mitra/perbaikan/perbaikan_hp', $data);
            $this->load->view('mitra/templates/footer');
        } else {
            $this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({text: "User Tidak Terdeteksi, Silahkan Login..",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
            redirect('login');
        }
    }
    public function getVoucherhp_ById()
    {
        echo json_encode($this->Mitra_model->getVoucherhp_ById($_POST['id']));
    }
    public function perbaikan_detail_hp()
    {
        return $this->Mitra_model->perbaikan_detail_hp($_POST['id'], $_POST['jenis']);
    }
    public function get_lama_perkiraan_hp()
    {
        echo json_encode($this->Mitra_model->get_lama_perkiraan_hp($_POST['id']));
    }
}
