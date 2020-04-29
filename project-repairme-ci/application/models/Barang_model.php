<?php 

class Barang_model extends CI_model {

    public function getAllPaket()
    {
        return $this->db->get('tb_paket')->result_array();
    }

    public function getLaptop(){
        
        return $this->db->select('id_tipe_laptop, tipe_laptop, merk_laptop')->from('tb_tipe_laptop')->join('tb_merk_laptop', 'tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop')->get()->result_array();
    }
    
    public function getMerkLaptop(){
        return $this->db->get('tb_merk_laptop')->result_array();
	}

}