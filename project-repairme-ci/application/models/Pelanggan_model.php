<?php

class Pelanggan_model extends CI_model
{

	public function getAllPelanggan()
	{
		return $this->db->get('tb_pelanggan')->result_array();
	}

	public function inputpelanggan($data)
	{
		$id_jenis = 3;

		$nama = $data['nama'];
		$email = $data['email'];
		$no_tlp = $data['no_tlp'];
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
		$for_tbUser	= [
			'id_user' => $id_user, 'username' => $username, 'password' => $password, 'is_actived' => 0,
			'date_created' => time()
		];
		$insertUser = $this->db->insert('tb_user', $for_tbUser);

		// siapkan token
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'username' => $username,
			'token' => $token,
			'date_created' => time()
		];
		$this->db->insert('tb_token', $user_token);
		$this->_sendEmail($token, 'verify');

		$for_tbPelanggan = ['id_pelanggan' => NULL, 'id_jenis' => $id_jenis, 'id_user' => $id_user, 'nama' => $nama, 'email' => $email, 'no_tlp' => $no_tlp, 'alamat' => $alamat];
		$insertMitra = $this->db->insert('tb_pelanggan', $for_tbPelanggan);
		// var_dump($for_tbPelanggan);die;

		if ($insertUser && $insertMitra == 1) {
			$this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({width: "auto", text: "Congratulation! your account has been created. Please activate your account",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
			redirect('login');
		} else {
			$this->session->set_flashdata('message', '<script>$(document).ready(function(){$.notiny({width: "auto", text: "maaf ada kesalahan, mohon untuk coba kembali",position: "right-top",animation_hide: "custom-hide-animation 20s forwards"});});</script>');
			redirect(base_url('pelanggan/registrasi'));
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'e41182271@student.polije.ac.id',
			'smtp_pass' => 'E41182271',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8'
		];

		$this->email->set_newline("\r\n");
		$this->email->initialize($config);

		$this->email->from('e41182271@student.polije.ac.id', 'Repairme');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Klik link ini untuk aktifasi akun anda : <a href="' . base_url() . 'pelanggan/verify?username=' . $this->input->post('username') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}


	public function pengajuanLaptop($id)
	{
		return $this->db->query("SELECT tb_perbaikan_laptop.id_perbaikan, tb_perbaikan_laptop.id_tipe_laptop as id_tipe, tb_tipe_laptop.tipe_laptop as tipe, tb_perbaikan_laptop.tanggal, tb_merk_laptop.merk_laptop as merk,tb_perbaikan_laptop.keterangan_mitra, tb_perbaikan_laptop.id_status_perbaikan, tb_mitra.nama_usaha as mitra, tb_mitra.id_mitra FROM tb_perbaikan_laptop JOIN tb_mitra ON tb_perbaikan_laptop.id_mitra = tb_mitra.id_mitra LEFT JOIN tb_tipe_laptop ON tb_perbaikan_laptop.id_tipe_laptop = tb_tipe_laptop.id_tipe_laptop LEFT JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop WHERE id_pelanggan = $id")->result_array();
	}
	public function detail_mitra($data)
	{
		return $this->db->get_where('tb_mitra', ['id_mitra' => $data])->result_array();
	}
	public function pengajuanHp($id)
	{
		return $this->db->query("SELECT tb_perbaikan_hp.id_perbaikan, tb_perbaikan_hp.id_tipe_hp as id_tipe, tb_tipe_hp.tipe_hp as tipe, tb_perbaikan_hp.tanggal, tb_merk_hp.merk_hp as merk,tb_perbaikan_hp.keterangan_mitra, tb_perbaikan_hp.id_status_perbaikan, tb_mitra.nama_usaha as mitra, tb_mitra.id_mitra FROM tb_perbaikan_hp JOIN tb_mitra ON tb_perbaikan_hp.id_mitra = tb_mitra.id_mitra LEFT JOIN tb_tipe_hp ON tb_perbaikan_hp.id_tipe_hp = tb_tipe_hp.id_tipe_hp LEFT JOIN tb_merk_hp ON tb_tipe_hp.id_merk_hp = tb_merk_hp.id_merk_hp WHERE id_pelanggan = $id && id_status_perbaikan = 1 || id_status_perbaikan = 2 || id_status_perbaikan = 3")->result_array();
	}
	public function hpTtd($data)
	{
		return $this->db->get_where('tb_ttd_hp', ['id_perbaikan' => $data])->result_array();
	}
	public function getPelNow()
	{
		return $this->db->get_where('tb_pelanggan', array('id_pelanggan' => $this->session->userdata('userData')['id_pelanggan']))->result_array();
	}

	public function updatePelanggan($data)
	{
		$id = $data['id_pelanggan'];
		$nama = $data['nama'];
		$email = $data['email'];
		$no = $data['no_tlp'];
		$alamat = $data['alamat'];
		$data_pelanggan	= ['nama' => $nama, 'email' => $email, 'no_tlp' => $no, 'alamat' => $alamat];
		$this->db->where('id_pelanggan', $id);
		$this->db->update('tb_pelanggan', $data_pelanggan);
	}
	public function getVoucher($id,$jenis)
	{
		if ($jenis == 'laptop') {
			return $this->db->get_where('tb_voucher_laptop', ['id_perbaikan_laptop' => $id])->result_array();
		}else if ($jenis == 'hp') {
			return $this->db->get_where('tb_voucher_hp', ['id_perbaikan_hp' => $id])->result_array();
		}
	}


	// ========================== MODAL PERBAIKAN UTAMA =======================
	
	public function perbaikan_detail_laptop($id, $jenis)
		{
			if ($jenis == 'ttd') {
				$data = $this->db->query("SELECT tb_perbaikan_laptop.*, tb_ttd_laptop.tipe_laptop, tb_ttd_laptop.merk_laptop, tb_mitra.nama_usaha as nama, tb_kerusakan_laptop.kerusakan_laptop FROM tb_perbaikan_laptop JOIN tb_ttd_laptop ON tb_ttd_laptop.id_perbaikan = tb_perbaikan_laptop.id_perbaikan JOIN tb_mitra ON tb_perbaikan_laptop.id_mitra = tb_mitra.id_mitra LEFT JOIN tb_kerusakan_laptop ON tb_perbaikan_laptop.id_kerusakan_laptop = tb_kerusakan_laptop.id_kerusakan_laptop WHERE tb_perbaikan_laptop.id_perbaikan = $id")->result_array();
				echo json_encode($data[0]);
			}else if ($jenis == 'normal') {
				$data = $this->db->query("SELECT tb_perbaikan_laptop.*, tb_tipe_laptop.tipe_laptop, tb_merk_laptop.merk_laptop, tb_mitra.nama_usaha as nama, tb_kerusakan_laptop.kerusakan_laptop FROM tb_perbaikan_laptop JOIN tb_tipe_laptop ON tb_perbaikan_laptop.id_tipe_laptop = tb_tipe_laptop.id_tipe_laptop JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop JOIN tb_mitra ON tb_perbaikan_laptop.id_mitra = tb_mitra.id_mitra LEFT JOIN tb_kerusakan_laptop ON tb_perbaikan_laptop.id_kerusakan_laptop = tb_kerusakan_laptop.id_kerusakan_laptop WHERE tb_perbaikan_laptop.id_perbaikan = $id")->result_array();
				echo json_encode($data[0]);
			}
			
		}	

}
