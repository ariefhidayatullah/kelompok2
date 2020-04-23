<?php 

class User_model{
	private $db;
	function __construct(){
		$this->db = new Database;
	}
	public function getAllUser(){
		return $this->db->query("SELECT * FROM tb_user");
	}
}