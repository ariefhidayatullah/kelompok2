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
        $data = [
            "kerusakan_laptop" => $this->input->post('kerusakanlap_ubh', true)
        ];
        $this->db->where('id_kerusakan_laptop', $id);
        return $this->db->update('tb_kerusakan_laptop', $data);
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
}
