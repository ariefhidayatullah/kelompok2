<?php

class Barang_model extends CI_model
{

    public function getAllPaket()
    {
        return $this->db->get('tb_paket')->result_array();
    }

    public function getLaptop()
    {

        return $this->db->select('id_tipe_laptop, tipe_laptop, merk_laptop')->from('tb_tipe_laptop')->join('tb_merk_laptop', 'tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop')->get()->result_array();
    }

    public function getMerkLaptop()
    {
        return $this->db->get('tb_merk_laptop')->result_array();
    }

    public function tambahMerkLaptop()
    {
        $data = [
            "merk_laptop" => $this->input->post('merk_laptop', true)
        ];
        return $this->db->insert('tb_merk_laptop', $data);
    }

    public function tambahTipeLaptop()
    {
        $data = [
            "tipe_laptop" => $this->input->post('tipelaptop', true),
            "id_merk_laptop" => $this->input->post('merklaptop', true)
        ];
        return $this->db->insert('tb_tipe_laptop', $data);
    }

    public function updatetipeLaptop($data)
    {
        $tipelp = $data['tipe_lp_lm'];
        $tipe_laptop = $data['tipelaptop_ubh'];

        $query = $this->db->get_where('tb_tipe_laptop', array('tipe_laptop' => $tipelp))->result_array();

        foreach ($query as $key) {
            $data = array(
                'tipe_laptop' => $tipe_laptop
            );
            $this->db->where('id_tipe_laptop', $key['id_tipe_laptop']);
            return $this->db->update('tb_tipe_laptop', $data);
        }
    }

    public function deleteBaranglaptop($id)
    {
        return $this->db->delete('tb_tipe_laptop', ['id_tipe_laptop' => $id]);
    }

    public function getHp()
    {
        return $this->db->select('id_tipe_hp, tipe_hp, merk_hp')->from('tb_tipe_hp')->join('tb_merk_hp', 'tb_tipe_hp.id_merk_hp = tb_merk_hp.id_merk_hp')->get()->result_array();
    }

    public function getMerkHp()
    {
        return $this->db->get('tb_merk_hp')->result_array();
    }

    public function tambahMerkHp()
    {
        $data = [
            "merk_hp" => $this->input->post('merk_hp', true)
        ];
        return $this->db->insert('tb_merk_hp', $data);
    }

    public function tambahTipeHp()
    {
        $data = [
            "tipe_hp" => $this->input->post('tipehp', true),
            "id_merk_hp" => $this->input->post('merkhp', true)
        ];
        return $this->db->insert('tb_tipe_hp', $data);
    }

    public function updatetipeHp($data)
    {
        $tipehp = $data['tipe_hp_lm'];
        $tipe_hp = $data['tipehp_ubh'];

        $query = $this->db->get_where('tb_tipe_hp', array('tipe_hp' => $tipehp))->result_array();

        foreach ($query as $key) {
            $data = array(
                'tipe_hp' => $tipe_hp
            );
            $this->db->where('id_tipe_hp', $key['id_tipe_hp']);
            return $this->db->update('tb_tipe_hp', $data);
        }
    }

    public function deleteBaranghp($id)
    {
        return $this->db->delete('tb_tipe_hp', ['id_tipe_hp' => $id]);
    }

    public function getKerusakanLaptop()
    {
        return $this->db->get('tb_kerusakan_laptop')->result_array();
    }

    public function tambahkerusakanlaptop()
    {
        $data = [
            "kerusakan_laptop" => $this->input->post('kerusakan', true)
        ];
        return $this->db->insert('tb_kerusakan_laptop', $data);
    }

    public function updateKerusakanLaptop($data)
    {
        $id = $data['id_kerusakanlap_ubh'];
        $kerusakan = $data['kerusakanlap_ubh'];
        var_dump($data);
        die;
        $this->db->where('id_kerusakan_laptop', $id);
        return $this->db->update('tb_kerusakan_laptop', $kerusakan);
    }

    public function deleteKerusakanlaptop($id)
    {
        return $this->db->delete('tb_kerusakan_laptop', ['id_kerusakan_laptop' => $id]);
    }

    public function getKerusakanHp()
    {
        return $this->db->get('tb_kerusakan_hp')->result_array();
    }

    public function deleteKerusakanhp($id)
    {
        return $this->db->delete('tb_kerusakan_hp', ['id_kerusakan_hp' => $id]);
    }

    public function tambahkerusakanhp()
    {
        $data = [
            "kerusakan_hp" => $this->input->post('kerusakan', true)
        ];
        return $this->db->insert('tb_kerusakan_hp', $data);
    }

    public function getTipeLaptop()
    {
        return $this->db->query("SELECT tb_tipe_laptop.id_tipe_laptop, tb_tipe_laptop.tipe_laptop, tb_merk_laptop.id_merk_laptop, tb_merk_laptop.merk_laptop from tb_tipe_laptop JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop")->result_array();
        // return $this->db->get_where('tb_tipe_laptop', ['id_merk_laptop' => $kode])->result();
    }
    public function getTipeHp()
    {
        // return $this->db->query("SELECT tb_tipe_laptop.id_tipe_laptop, tb_tipe_laptop.tipe_laptop, tb_merk_laptop.id_merk_laptop, tb_merk_laptop.merk_laptop from tb_tipe_laptop JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop")->result();
        return $this->db->get('tb_tipe_hp')->result_array();
    }
    public function getLaptopById($data)
    {
        $tipe = $this->db->get_where('tb_tipe_laptop', ['id_tipe_laptop'  => $data])->result_array();
        $merk = $this->db->select('merk_laptop')->get('tb_merk_laptop', ['id_merk_laptop' => $tipe[0]['id_merk_laptop']])->result_array();
        return ['tipe' => $tipe[0]['tipe_laptop'], 'merk' => $merk[0]['merk_laptop']];
    }

    public function kerusakanLaptopById($data)
    {
        $kerusakan = $this->db->select('kerusakan_laptop')->get('tb_kerusakan_laptop', ['id_kerusakan_laptop' => $data])->result_array();
        return $kerusakan[0]['kerusakan_laptop'];
    }
    public function getHpById($data)
    {
        $tipe = $this->db->get_where('tb_tipe_hp', ['id_tipe_hp'  => $data])->result_array();
        $merk = $this->db->select('merk_hp')->get('tb_merk_hp', ['id_merk_hp' => $tipe[0]['id_merk_hp']])->result_array();
        return ['tipe' => $tipe[0]['tipe_hp'], 'merk' => $merk[0]['merk_hp']];
    }
    public function kerusakanHpById($data)
    {
        $kerusakan = $this->db->select('kerusakan_hp')->get('tb_kerusakan_hp', ['id_kerusakan_hp' => $data])->result_array();
        return $kerusakan[0]['kerusakan_hp'];
    }

    public function detail_laptop($id)
    {
        return $this->db->query("SELECT tb_merk_laptop.merk_laptop AS merk, tb_tipe_laptop.tipe_laptop AS tipe, tb_kerusakan_laptop.kerusakan_laptop as kerusakan, tb_perbaikan_laptop.kerusakan_lain FROM tb_perbaikan_laptop JOIN tb_tipe_laptop ON tb_perbaikan_laptop.id_tipe_laptop = tb_tipe_laptop.id_tipe_laptop JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop LEFT JOIN tb_kerusakan_laptop ON tb_perbaikan_laptop.id_kerusakan_laptop = tb_kerusakan_laptop.id_kerusakan_laptop WHERE id_perbaikan = $id")->result_array();
    }

    public function detail_laptop_ttd($id)
    {
        return $this->db->query("SELECT tb_ttd_laptop.merk_laptop as merk, tb_ttd_laptop.tipe_laptop as tipe, tb_kerusakan_laptop.kerusakan_laptop as kerusakan, tb_perbaikan_laptop.kerusakan_lain FROM tb_perbaikan_laptop JOIN tb_ttd_laptop ON tb_perbaikan_laptop.id_perbaikan = tb_ttd_laptop.id_perbaikan LEFT JOIN tb_kerusakan_laptop ON tb_perbaikan_laptop.id_kerusakan_laptop = tb_kerusakan_laptop.id_kerusakan_laptop WHERE tb_perbaikan_laptop.id_perbaikan = $id")->result_array();
    }
    public function detail_hp($id)
    {
        return $this->db->query("SELECT tb_merk_hp.merk_hp AS merk, tb_tipe_hp.tipe_hp AS tipe, tb_kerusakan_hp.kerusakan_hp as kerusakan, tb_perbaikan_hp.kerusakan_lain FROM tb_perbaikan_hp JOIN tb_tipe_hp ON tb_perbaikan_hp.id_tipe_hp = tb_tipe_hp.id_tipe_hp JOIN tb_merk_hp ON tb_tipe_hp.id_merk_hp = tb_merk_hp.id_merk_hp LEFT JOIN tb_kerusakan_hp ON tb_perbaikan_hp.id_kerusakan_hp = tb_kerusakan_hp.id_kerusakan_hp WHERE id_perbaikan = $id")->result_array();
    }

    public function detail_hp_ttd($id)
    {
        return $this->db->query("SELECT tb_ttd_hp.merk_hp as merk, tb_ttd_hp.tipe_hp as tipe, tb_kerusakan_hp.kerusakan_hp as kerusakan, tb_perbaikan_hp.kerusakan_lain FROM tb_perbaikan_hp JOIN tb_ttd_hp ON tb_perbaikan_hp.id_perbaikan = tb_ttd_hp.id_perbaikan LEFT JOIN tb_kerusakan_hp ON tb_perbaikan_hp.id_kerusakan_hp = tb_kerusakan_hp.id_kerusakan_hp WHERE tb_perbaikan_hp.id_perbaikan = $id")->result_array();
    }
    public function LaptopTtd($data)
    {
        return $this->db->get_where('tb_ttd_laptop', ['id_perbaikan' => $data])->result_array();
    }

    public function detail_notif($data)
    {
        return $this->db->query("SELECT * FROM tb_perbaikan_laptop INNER JOIN tb_notif_mitra ON tb_perbaikan_laptop.id_perbaikan = tb_notif_mitra.id_perbaikan LEFT JOIN tb_mitra  ON tb_mitra.id_mitra = tb_perbaikan_laptop.id_mitra WHERE id_notif_mitra = $data")->result_array();
    }
}
