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
		//return $this->db->query("SELECT tb_mitra.* FROM `tb_mitra` WHERE tb_mitra.id_mitra = " . $_SESSION['login']['data']['id_mitra']);
		$data = $this->session->userdata('userData');
		$id_mitra = $data['id_mitra'];
		return $this->db->get_where('tb_mitra', ['id_mitra' => $id_mitra])->row_array();
	}

	public function pengajuanLaptop($id)
	{
		return $this->db->query("SELECT tb_perbaikan_laptop.id_perbaikan, tb_perbaikan_laptop.id_tipe_laptop as id_tipe, tb_tipe_laptop.tipe_laptop as tipe, tb_perbaikan_laptop.tanggal, tb_merk_laptop.merk_laptop as merk,tb_perbaikan_laptop.keterangan_mitra, tb_pelanggan.nama as pelanggan, tb_pelanggan.id_pelanggan FROM tb_perbaikan_laptop JOIN tb_pelanggan ON tb_perbaikan_laptop.id_pelanggan = tb_pelanggan.id_pelanggan LEFT JOIN tb_tipe_laptop ON tb_perbaikan_laptop.id_tipe_laptop = tb_tipe_laptop.id_tipe_laptop LEFT JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop WHERE tb_perbaikan_laptop.id_mitra = $id")->result_array();
	}

	public function LaptopTtd($data)
	{
		return $this->db->get('tb_ttd_laptop', ['id_perbaikan' => $data])->result_array();
	}
}
