<?php 

class User_model extends CI_model {

    public function getAllUser()
    {
        return $this->db->get('tb_user')->result_array();
    }

}