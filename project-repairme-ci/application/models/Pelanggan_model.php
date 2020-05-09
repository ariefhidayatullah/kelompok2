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

	public function pengajuanLaptop($id)
	{
		return $this->db->query("SELECT tb_perbaikan_laptop.id_perbaikan, tb_perbaikan_laptop.id_tipe_laptop as id_tipe, tb_tipe_laptop.tipe_laptop as tipe, tb_perbaikan_laptop.tanggal, tb_merk_laptop.merk_laptop as merk,tb_perbaikan_laptop.keterangan_mitra, tb_mitra.nama_usaha as mitra, tb_mitra.id_mitra FROM tb_perbaikan_laptop JOIN tb_mitra ON tb_perbaikan_laptop.id_mitra = tb_mitra.id_mitra LEFT JOIN tb_tipe_laptop ON tb_perbaikan_laptop.id_tipe_laptop = tb_tipe_laptop.id_tipe_laptop LEFT JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop WHERE id_pelanggan = $id")->result_array();
	}
	public function LaptopTtd($data)
	{
		return $this->db->get('tb_ttd_laptop', ['id_perbaikan' => $data])->result_array();
	}
	public function detail_laptop($id)
	{
		return $this->db->query("SELECT tb_merk_laptop.merk_laptop AS merk, tb_tipe_laptop.tipe_laptop AS tipe, tb_kerusakan_laptop.kerusakan_laptop as kerusakan, tb_perbaikan_laptop.kerusakan_lain FROM tb_perbaikan_laptop JOIN tb_tipe_laptop ON tb_perbaikan_laptop.id_tipe_laptop = tb_tipe_laptop.id_tipe_laptop JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop LEFT JOIN tb_kerusakan_laptop ON tb_perbaikan_laptop.id_kerusakan_laptop = tb_kerusakan_laptop.id_kerusakan_laptop WHERE id_perbaikan = $id")->result_array();
	}
	public function detail_laptop_ttd($id)
	{
		return $this->db->query("SELECT tb_ttd_laptop.merk_laptop as merk, tb_ttd_laptop.tipe_laptop as tipe, tb_kerusakan_laptop.kerusakan_laptop as kerusakan, tb_perbaikan_laptop.kerusakan_lain FROM tb_perbaikan_laptop JOIN tb_ttd_laptop ON tb_perbaikan_laptop.id_perbaikan = tb_ttd_laptop.id_perbaikan LEFT JOIN tb_kerusakan_laptop ON tb_perbaikan_laptop.id_kerusakan_laptop = tb_kerusakan_laptop.id_kerusakan_laptop WHERE tb_perbaikan_laptop.id_perbaikan = $id")->result_array();
	}
	public function detail_mitra($data)
	{
		return $this->db->get('tb_mitra', ['id_mitra' => $data])->result_array();
	}
}