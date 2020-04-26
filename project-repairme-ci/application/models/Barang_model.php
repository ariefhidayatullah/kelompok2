<?php 

class Barang_model extends CI_model {

    public function getAllPaket()
    {
        return $this->db->get('tb_paket')->result_array();
    }

}