 <?php 

class Admin_model extends CI_model{
	
     public function jumlahpelanggan(){
     	$jumlah_pelanggan = $this->db->query("SELECT COUNT(id_pelanggan) FROM tb_pelanggan")->result_array();
		 return $jumlah_pelanggan[0];
     }   
     public function jumlahmitra(){
     	$jumlah_mitra =  $this->db->query("SELECT COUNT(id_mitra) FROM tb_mitra")->result_array();
     	return $jumlah_mitra[0];
	 }
	 
}