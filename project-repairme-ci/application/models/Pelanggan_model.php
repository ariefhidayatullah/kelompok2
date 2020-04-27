<?php 

class Pelanggan_model extends CI_model {

	public function getAllPelanggan()
    {
        return $this->db->get('tb_pelanggan')->result_array();
    }

     public function inputpelanggan($data){
		$id_jenis = 3;
		
		$nama = $data['nama'];
		$email = $data['email'];
		$no_tlp= $data['no_tlp'];
		$alamat = $data['alamat'];
		$username = $data['username'];
		$username = strtolower(stripslashes($data['username']));
		$password = $data['password2'];
		$password = password_hash($password, PASSWORD_DEFAULT);

		//query untuk menyiapkan id_user, karena bukan auto_increment, jadi bikin manual
		$this->db->select('id_user');
		$this->db->order_by('id_user', 'DESC');
		$preIdUser = $this->db->get('tb_user', 1)->result_array();
		$id_user = $preIdUser[0]['id_user'] + 1;

		//query untuk input ke table tb_user;
		$for_tbUser	= ['id_user' => $id_user, 'username' => $username, 'password' => $password];
		$insertUser = $this->db->insert('tb_user', $for_tbUser);
		
		$for_tbPelanggan = ['id_pelanggan' => NULL, 'id_jenis' => $id_jenis, 'id_user' => $id_user, 'nama' => $nama, 'email' => $email, 'no_tlp' => $no_tlp, 'alamat' => $alamat];
		$insertMitra = $this->db->insert('tb_pelanggan', $for_tbPelanggan);
		// var_dump($for_tbPelanggan);die;

		if ($insertUser && $insertMitra == 1) {
			echo "sip, tinggal atur redirectnya";die;
			redirect(base_url());
		}else{
			echo "gagal";die;
			redirect(base_url('mitra/registrasi'));
		}

		}
}