<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function checkloginkey($data)
    {
        //siapkan username dan passwordnya
        $username = $data['username'];
        $password = $data['password'];
        //ambil data dari username yang sama
        $getData = $this->db->get_where('tb_user', ['username' => $username])->result_array();
        //jika password sama
        if (count($getData) > 0) {
            if ($getData[0]['is_actived'] == 1) {
                if (password_verify($password, $getData[0]['password'])) {
                    $getIdUser = $getData[0]['id_user'];
                    //ambil data buat di cocokkan dan di simpan di session
                    $admin = $this->db->get_where('tb_admin', ['id_user' => $getIdUser])->result_array();
                    $mitra = $this->db->get_where('tb_mitra', ['id_user' => $getIdUser])->result_array();
                    $pelanggan = $this->db->get_where('tb_pelanggan', ['id_user' => $getIdUser])->result_array();
                    if (count($admin) == 1) {
                        return ['jenis' => 'admin', 'data' => $admin];
                    } elseif (count($mitra) == 1) {
                        return ['jenis' => 'mitra', 'data' => $mitra];
                    } elseif (count($pelanggan) == 1) {
                        return ['jenis' => 'pelanggan', 'data' => $pelanggan];
                    } else {
                        return "false";
                    }
                } else {
                    return ['data' => "false"];
                }
            } else {
                return ['data' => "falseActivated"];
            }
        } else {
            return ['data' => "falseUsername"];
        }
    }
}
/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */
