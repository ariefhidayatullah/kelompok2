<?php 

class Mitra_model extends CI_model {
    public function getAllMitra()
    {
        return $this->db->get('tb_mitra')->result_array();
    }
}