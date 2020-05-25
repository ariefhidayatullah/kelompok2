<?php

class Mitra_model extends CI_model
{
	public function getAllMitra()
	{
		return $this->db->get('tb_mitra')->result_array();
	}

	public function getDetail($id)
	{
		return $this->db->get_where('tb_mitra', ['id_mitra' => $id])->result_array();
	}

	public function get_notif($id)
	{
		return $this->db->get('tb_notif_mitra', ['id_pelanggan' => $id])->result_array();
	}

	public function inputMitra($data)
	{
		//persiapan data untuk dijadikan array
		$id_jenis = 2;
		$nama = $data['nama'];
		$nama_usaha = $data['nama_usaha'];
		$email = $data['email'];
		$no_telpon = $data['no_telpon'];
		$alamat = $data['alamat'];
		$lat = $data['lat'];
		$lng = $data['lng'];
		$jenis = $data['jenis'];
		$deskripsi = $data['deskripsi'];

		//untuk username dan password
		$username = strtolower(stripslashes($data['username']));
		$password = $data['password1'];

		//hash password
		$password = password_hash($password, PASSWORD_DEFAULT);


		//query untuk menyiapkan id_user, karena bukan auto_increment, jadi bikin manual
		$this->db->select('id_user');
		$this->db->order_by('id_user', 'DESC');
		$preIdUser = $this->db->get('tb_user', 1)->result_array();
		$id_user = $preIdUser[0]['id_user'] + 1;

		//query untuk input ke table tb_user;
		$for_tbUser	= ['id_user' => $id_user, 'username' => $username, 'password' => $password];
		$insertUser = $this->db->insert('tb_user', $for_tbUser);

		//method upload disini
		$foto_ktp = $this->do_upload('foto_ktp', $id_user, $nama_usaha);
		$foto_usaha = $this->do_upload('foto_usaha', $id_user, $nama_usaha);

		$for_tbMitra = ['id_mitra' => NULL, 'id_jenis' => $id_jenis, 'id_user' => $id_user, 'jenis' => $jenis, 'nama' => $nama, 'nama_usaha' => $nama_usaha, 'email' => $email, 'alamat' => $alamat, 'lat' => $lat, 'lng' => $lng, 'no_tlp' => $no_telpon, 'foto_ktp' => $foto_ktp, 'foto_usaha' => $foto_usaha, 'deskripsi' => '-', 'rating' => 0];
		$insertMitra = $this->db->insert('tb_mitra', $for_tbMitra);

		if ($insertUser > 0 && $insertMitra > 0) {
			echo "sip, tinggal atur redirectnya";
			die;
			redirect(base_url());
		} else {
			echo "gagal";
			die;
			redirect(base_url('mitra/registrasi'));
		}
	}

	private function do_upload($data, $id_user, $nama_usaha)
	{
		//untuk upload
		$config['upload_path']          = './gallery/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['file_name']			=  $data . '_' . $nama_usaha . '_id' . $id_user;
		$config['overwrite']			= true;
		$config['max_size']             = 2048;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		//untuk load library upload
		$this->load->library('upload', $config);

		if ($this->upload->do_upload($data)) {
			return $config['file_name'];
		} else {
			return 'gambar_gagal_diunggah';
		}
	}

	public function getMitraNow()
	{
		$data = $this->session->userdata('userData');
		$id_mitra = $data['id_mitra'];
		return $this->db->get_where('tb_mitra', ['id_mitra' => $id_mitra])->row_array();
	}

	public function pengajuanLaptop($id)
	{
		return $this->db->query("SELECT tb_perbaikan_laptop.id_perbaikan, tb_perbaikan_laptop.id_tipe_laptop as id_tipe, tb_tipe_laptop.tipe_laptop as tipe, tb_perbaikan_laptop.tanggal, tb_merk_laptop.merk_laptop as merk,tb_perbaikan_laptop.keterangan_mitra, tb_pelanggan.nama as pelanggan, tb_pelanggan.id_pelanggan, tb_perbaikan_laptop.id_status_perbaikan FROM tb_perbaikan_laptop JOIN tb_pelanggan ON tb_perbaikan_laptop.id_pelanggan = tb_pelanggan.id_pelanggan LEFT JOIN tb_tipe_laptop ON tb_perbaikan_laptop.id_tipe_laptop = tb_tipe_laptop.id_tipe_laptop LEFT JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop WHERE tb_perbaikan_laptop.id_mitra = $id")->result_array();
	}

	public function pengajuanHp($id)
	{
		return $this->db->query("SELECT tb_perbaikan_hp.id_perbaikan, tb_perbaikan_hp.id_tipe_hp as id_tipe, tb_tipe_hp.tipe_hp as tipe, tb_perbaikan_hp.tanggal, tb_merk_hp.merk_hp as merk,tb_perbaikan_hp.keterangan_mitra, tb_pelanggan.nama as pelanggan, tb_pelanggan.id_pelanggan, tb_perbaikan_hp.id_status_perbaikan FROM tb_perbaikan_hp JOIN tb_pelanggan ON tb_perbaikan_hp.id_pelanggan = tb_pelanggan.id_pelanggan LEFT JOIN tb_tipe_hp ON tb_perbaikan_hp.id_tipe_hp = tb_tipe_hp.id_tipe_hp LEFT JOIN tb_merk_hp ON tb_tipe_hp.id_merk_hp = tb_merk_hp.id_merk_hp WHERE tb_perbaikan_hp.id_mitra = $id")->result_array();
	}

	public function LaptopTtd($data)
	{
		return $this->db->get_where('tb_ttd_laptop', ['id_perbaikan' => $data])->result_array();
	}

	public function HpTtd($data)
	{
		return $this->db->get_where('tb_ttd_hp', ['id_perbaikan' => $data])->result_array();
	}

	public function detail_hp($id)
	{
		return $this->db->query("SELECT tb_merk_hp.merk_hp AS merk, tb_tipe_hp.tipe_hp AS tipe, tb_kerusakan_hp.kerusakan_hp as kerusakan, tb_perbaikan_hp.kerusakan_lain FROM tb_perbaikan_hp JOIN tb_tipe_hp ON tb_perbaikan_hp.id_tipe_hp = tb_tipe_hp.id_tipe_hp JOIN tb_merk_hp ON tb_tipe_hp.id_merk_hp = tb_merk_hp.id_merk_hp LEFT JOIN tb_kerusakan_hp ON tb_perbaikan_hp.id_kerusakan_hp = tb_kerusakan_hp.id_kerusakan_hp WHERE id_perbaikan = $id")->result_array();
	}

	public function detail_hp_ttd($id)
	{
		return $this->db->query("SELECT tb_ttd_hp.merk_hp as merk, tb_ttd_hp.tipe_hp as tipe, tb_kerusakan_hp.kerusakan_hp as kerusakan, tb_perbaikan_hp.kerusakan_lain FROM tb_perbaikan_hp JOIN tb_ttd_hp ON tb_perbaikan_hp.id_perbaikan = tb_ttd_hp.id_perbaikan LEFT JOIN tb_kerusakan_hp ON tb_perbaikan_hp.id_kerusakan_hp = tb_kerusakan_hp.id_kerusakan_hp WHERE tb_perbaikan_hp.id_perbaikan = $id")->result_array();
	}

	public function detail_pelanggan($data)
	{
		return $this->db->get_where('tb_pelanggan', ['id_pelanggan' => $data])->result_array();
	}

	public function terimapengajuanlaptop($data)
	{
		$id = $data['id_perbaikan_laptop'];
		$harga = $data['hargalaptop'];
		$tanggal = $data['tanggal'];
		$keterangan_lain = $data['ketlaptoplain'];
		$voucher = $data['voucherlaptop'];
		$tb_voucher_laptop = ['voucher_laptop' => $voucher, 'id_perbaikan_laptop' => $id];
		$this->db->insert('tb_voucher_laptop', $tb_voucher_laptop);
		$update = ['id_status_perbaikan' => 2, 'harga' => $harga, 'keterangan_mitra' => $keterangan_lain, 'tanggal' => $tanggal];
		$this->db->where('id_perbaikan', $id);
		return $this->db->update('tb_perbaikan_laptop', $update);
	}

	public function tolakpengajuanlaptop($data)
	{
		$id = $data['id_perbaikan_laptopx'];
		$keterangan_lain = $data['ketpenolakanlaptop'];
		$harga = '0';
		$tanggal = $data['tanggal'];
		$update = ['id_status_perbaikan' => 3, 'harga' => $harga, 'keterangan_mitra' => $keterangan_lain, 'tanggal' => $tanggal];
		$this->db->where('id_perbaikan', $id);
		return $this->db->update('tb_perbaikan_laptop', $update);
	}

	public function terimapengajuanhp($data)
	{
		$id = $data['id_perbaikan_hp'];
		$harga = $data['hargahp'];
		$tanggal = $data['tanggal'];
		$keterangan_lain = $data['kethplain'];
		$voucher = $data['voucherhp'];
		$tb_voucher_hp = ['voucher_hp' => $voucher, 'id_perbaikan_hp' => $id];
		$this->db->insert('tb_voucher_hp', $tb_voucher_hp);
		$update = ['id_status_perbaikan' => 2, 'harga' => $harga, 'keterangan_mitra' => $keterangan_lain, 'tanggal' => $tanggal];
		$this->db->where('id_perbaikan', $id);
		return $this->db->update('tb_perbaikan_hp', $update);
	}

	public function tolakpengajuanhp($data)
	{
		$id = $data['id_perbaikan_hpx'];
		$keterangan_lain = $data['ketpenolakanhp'];
		$harga = '0';
		$tanggal = $data['tanggal'];
		$update = ['id_status_perbaikan' => 3, 'harga' => $harga, 'keterangan_mitra' => $keterangan_lain, 'tanggal' => $tanggal];
		$this->db->where('id_perbaikan', $id);
		return $this->db->update('tb_perbaikan_hp', $update);
	}

	// ============================= MODAL BAGIAN VOUCHER =====================

	public function getVoucher($data)
	{
		$voucher1 = $this->db->get_where('tb_voucher_laptop', ['voucher_laptop' => $data])->result_array();
		$voucher2 = $this->db->get_where('tb_voucher_hp', ['voucher_hp' => $data])->result_array();
		if ($voucher1 != []) {
			return ['jenis' => 'laptop', 'data' => $voucher1];
		}else if($voucher2 != []){
			return ['jenis' => 'hp', 'data' => $voucher2];
		}
	}

	public function getVoucherLaptop_byId($id)
	{
		$this->db->select('voucher_laptop');
		return $this->db->get_where('tb_voucher_laptop',['id_perbaikan_laptop' => $id])->result_array();
	}
	public function getVoucherhp_byId($id)
	{
		$this->db->select('voucher_hp');
		return $this->db->get_where('tb_voucher_hp',['id_perbaikan_hp' => $id])->result_array();
	}
	public function getPerbaikan($id, $jenis)
	{
		if ($jenis == 'laptop') {
			return $this->db->get_where('tb_perbaikan_laptop', ['id_perbaikan' => $id])->result_array();
		}else if($jenis == 'hp'){
			return $this->db->get_where('tb_perbaikan_hp', ['id_perbaikan' => $id])->result_array();
		}
	}

	public function terima_voucher($data)
	{
		$id = $data['id_perbaikan'];
		$jenis = $data['jenis_perbaikan'];
		if ($jenis == 'laptop') {
			$data_laptop = [
			'id_waktu_perbaikan_laptop' => null, 
			'waktu_tanggal' => $data['tanggal'],
			'waktu_hari' => $data['hari'],
			'berakhir' => $data['waktu_berakhir'],
			'id_perbaikan_laptop' => $data['id_perbaikan']
			];
			$insert_waktu_laptop = $this->db->insert('tb_waktu_perbaikan_laptop', $data_laptop);
			$update_perbaikan_laptop = $this->db->query("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.id_status_perbaikan = 4 WHERE id_perbaikan = $id");
			if($insert_waktu_laptop > 0 && $update_perbaikan_laptop > 0){
				return 1;
			}else{
				return 0;
			}

		}else if($jenis == 'hp'){
			$data_hp = [
			'id_waktu_perbaikan_hp' => null, 
			'waktu_tanggal' => $data['tanggal'],
			'waktu_hari' => $data['hari'],
			'berakhir' => $data['waktu_berakhir'],
			'id_perbaikan_hp' => $data['id_perbaikan']
			];
			$insert_waktu_hp = $this->db->insert('tb_waktu_perbaikan_hp', $data_hp);
			$update_perbaikan_hp = $this->db->query("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.id_status_perbaikan = 4 WHERE id_perbaikan = $id");
			if($insert_waktu_hp > 0 && $update_perbaikan_hp > 0){
				return 1;
			}else{
				return 0;
			}
		}
	}

	// ====================== AKHIR DARI MODAL VOUCHER ========================

	// ========================== MODAL PERBAIKAN UTAMA =======================
	
	public function perbaikan_detail_laptop($id, $jenis)
		{
			if ($jenis == 'ttd') {
				$data = $this->db->query("SELECT tb_perbaikan_laptop.*, tb_ttd_laptop.tipe_laptop, tb_ttd_laptop.merk_laptop, tb_pelanggan.nama, tb_kerusakan_laptop.kerusakan_laptop FROM tb_perbaikan_laptop JOIN tb_ttd_laptop ON tb_ttd_laptop.id_perbaikan = tb_perbaikan_laptop.id_perbaikan JOIN tb_pelanggan ON tb_perbaikan_laptop.id_pelanggan = tb_pelanggan.id_pelanggan LEFT JOIN tb_kerusakan_laptop ON tb_perbaikan_laptop.id_kerusakan_laptop = tb_kerusakan_laptop.id_kerusakan_laptop WHERE tb_perbaikan_laptop.id_perbaikan = $id")->result_array();
				echo json_encode($data[0]);
			}else if ($jenis == 'normal') {
				$data = $this->db->query("SELECT tb_perbaikan_laptop.*, tb_tipe_laptop.tipe_laptop, tb_merk_laptop.merk_laptop, tb_pelanggan.nama, tb_kerusakan_laptop.kerusakan_laptop FROM tb_perbaikan_laptop JOIN tb_tipe_laptop ON tb_perbaikan_laptop.id_tipe_laptop = tb_tipe_laptop.id_tipe_laptop JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop JOIN tb_pelanggan ON tb_perbaikan_laptop.id_pelanggan = tb_pelanggan.id_pelanggan LEFT JOIN tb_kerusakan_laptop ON tb_perbaikan_laptop.id_kerusakan_laptop = tb_kerusakan_laptop.id_kerusakan_laptop WHERE tb_perbaikan_laptop.id_perbaikan = $id")->result_array();
				echo json_encode($data[0]);
			}
			
		}	

	public function get_lama_perkiraan_laptop($id)
	{
		return $this->db->get_where('tb_waktu_perbaikan_laptop', ['id_perbaikan_laptop' => $id])->result_array();
	}
	public function perbaikan_detail_hp($id, $jenis)
	{
		if ($jenis == 'ttd') {
			$data = $this->db->query("SELECT tb_perbaikan_hp.*, tb_ttd_hp.tipe_hp, tb_ttd_hp.merk_hp, tb_pelanggan.nama, tb_kerusakan_hp.kerusakan_hp FROM tb_perbaikan_hp JOIN tb_ttd_hp ON tb_ttd_hp.id_perbaikan = tb_perbaikan_hp.id_perbaikan JOIN tb_pelanggan ON tb_perbaikan_hp.id_pelanggan = tb_pelanggan.id_pelanggan LEFT JOIN tb_kerusakan_hp ON tb_perbaikan_hp.id_kerusakan_hp = tb_kerusakan_hp.id_kerusakan_hp WHERE tb_perbaikan_hp.id_perbaikan = $id")->result_array();
			echo json_encode($data[0]);
		}else if ($jenis == 'normal') {
			$data = $this->db->query("SELECT tb_perbaikan_hp.*, tb_tipe_hp.tipe_hp, tb_merk_hp.merk_hp, tb_pelanggan.nama, tb_kerusakan_hp.kerusakan_hp FROM tb_perbaikan_hp JOIN tb_tipe_hp ON tb_perbaikan_hp.id_tipe_hp = tb_tipe_hp.id_tipe_hp JOIN tb_merk_hp ON tb_tipe_hp.id_merk_hp = tb_merk_hp.id_merk_hp JOIN tb_pelanggan ON tb_perbaikan_hp.id_pelanggan = tb_pelanggan.id_pelanggan LEFT JOIN tb_kerusakan_hp ON tb_perbaikan_hp.id_kerusakan_hp = tb_kerusakan_hp.id_kerusakan_hp WHERE tb_perbaikan_hp.id_perbaikan = $id")->result_array();
			echo json_encode($data[0]);
		}
		
	}	

	public function get_lama_perkiraan_hp($id)
	{
		return $this->db->get_where('tb_waktu_perbaikan_hp', ['id_perbaikan_hp' => $id])->result_array();
	}
	public function beri_diskon_laptop($data)
	{
		$value = ['id_notif_mitra' => null, 'id_pelanggan' => $data['id_pelanggan'], 'notifikasi' => 'diskon_laptop',	'keterangan' => $data['keterangan'], 'id_perbaikan' => $data['id_perbaikan'], 'dibaca' => 'n'];
		$id = $data['id_perbaikan'];
		$harga = $data['harga'];
		$insert = $this->db->insert('tb_notif_mitra', $value);
		$update = $this->db->query("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.harga = '$harga' WHERE tb_perbaikan_laptop.id_perbaikan = $id");
		if ($insert > 0 && $update > 0) {
			echo 'true';
		}else{
			echo 'false';
		}
	}
		public function tambah_harga_laptop($data)
	{
		$value = ['id_notif_mitra' => null, 'id_pelanggan' => $data['id_pelanggan'], 'notifikasi' => 'tambah_harga_laptop',	'keterangan' => $data['keterangan'], 'id_perbaikan' => $data['id_perbaikan'], 'dibaca' => 'n'];
		$id = $data['id_perbaikan'];
		$harga = $data['harga'];
		$insert = $this->db->insert('tb_notif_mitra', $value);
		$update = $this->db->query("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.id_status_perbaikan = 5, tb_perbaikan_laptop.harga = '$harga' WHERE tb_perbaikan_laptop.id_perbaikan = $id");
		if ($insert > 0 && $update > 0) {
			echo 'true';
		}else{
			echo 'false';
		}
	}
		public function beri_diskon_hp($data)
	{
		$value = ['id_notif_mitra' => null,	'id_pelanggan' => $data['id_pelanggan'], 'notifikasi' => 'diskon_hp',	'keterangan' => $data['keterangan'], 'id_perbaikan' => $data['id_perbaikan'], 'dibaca' => 'n'];
		$id = $data['id_perbaikan'];
		$harga = $data['harga'];
		$insert = $this->db->insert('tb_notif_mitra', $value);
		$update = $this->db->query("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.harga = '$harga' WHERE tb_perbaikan_hp.id_perbaikan = $id");
		if ($insert > 0 && $update > 0) {
			echo 'true';
		}else{
			echo 'false';
		}
	}
		public function tambah_harga_hp($data)
	{
		$value = ['id_notif_mitra' => null, 'id_pelanggan' => $data['id_pelanggan'], 'notifikasi' => 'tambah_harga_hp',	'keterangan' => $data['keterangan'], 'id_perbaikan' => $data['id_perbaikan'], 'dibaca' => 'n'];
		$id = $data['id_perbaikan'];
		$harga = $data['harga'];
		$insert = $this->db->insert('tb_notif_mitra', $value);
		$update = $this->db->query("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.id_status_perbaikan = 5, tb_perbaikan_hp.harga = '$harga' WHERE tb_perbaikan_hp.id_perbaikan = $id");
		if ($insert > 0 && $update > 0) {
			echo 'true';
		}else{
			echo 'false';
		}
	}
}
