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

		if ($insertUser && $insertMitra == 1) {
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

	public function getVoucher()
	{
		return $this->db->get('tb_voucher_laptop')->result_array();
	}

	public function getVoucher2()
	{
		return $this->db->get('tb_voucher_hp')->result_array();
	}
}
