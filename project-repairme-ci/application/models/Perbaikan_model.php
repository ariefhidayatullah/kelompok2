<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perbaikan_model extends CI_Model {

	public function tambahPerbaikanLaptop($data)
	{
		$id_pelanggan = $data['id_pelanggan'];
		$id_mitra = $data['id_mitra'];
		$id_tipe_laptop = $data['id_tipe_laptop'];
		$id_kerusakan_laptop = $data['id_kerusakan_laptop'];
		$merk_laptop_ttd =  $data['merk_laptop_ttd'];
		$tipe_laptop_ttd = $data['tipe_laptop_ttd'];
		$ket_kerusakan_laptop_lain = $data['ket_kerusakan_laptop_lain'];
		$tanggal = $data['tanggal'];

		// ========= AMBIL ID TERAKHIR DI PERBAIKAN ============= //

		$this->db->select('id_perbaikan');
		$this->db->order_by('id_perbaikan', 'DESC');
		$get_id = $this->db->get('tb_perbaikan_laptop')->result_array();
		
		// ============= ISI ID ===================//

		if (count($get_id) > 0) {
			$readyid = $get_id[0]['id_perbaikan'] + 1;
		}else{
			$readyid = 1;
		}

		if ($id_tipe_laptop == 0) {
	
		// ================= INSERT DATA PERBAIKAN ============= //

		$data_p_ttd = [
						'id_perbaikan' => $readyid,
						'id_status_perbaikan' => 1,
						'id_pelanggan' => $id_pelanggan,
						'id_mitra' => $id_mitra,
						'id_tipe_laptop' => $id_tipe_laptop,
						'id_kerusakan_laptop' => $id_kerusakan_laptop,
						'kerusakan_lain' => $ket_kerusakan_laptop_lain,
						'keterangan_mitra' => '',
						'tanggal' => $tanggal,
						'harga' => 0,
						];

		$insert_p_ttd = $this->db->insert('tb_perbaikan_laptop', $data_p_ttd);

		// ========== BAGIAN TIPE TIDAK TERDAFTAR ============= //

		$this->db->select('id_ttd_laptop');
		$this->db->order_by('id_ttd_laptop', 'DESC');
		$get_ttd = $this->db->get('tb_ttd_laptop')->result_array();

		if (count($get_ttd) > 0) {
			$readyttd = $get_ttd[0]['id_ttd_laptop'] + 1;
		}else{
			$readyttd = 1;
		}

		$data_ttd = [
					'id_ttd_laptop' => $readyttd, 
					'id_perbaikan' => $readyid,
					'merk_laptop' => $merk_laptop_ttd, 
					'tipe_laptop' => $tipe_laptop_ttd];
		$insert_ttd = $this->db->insert('tb_ttd_laptop', $data_ttd);

		

		if ($insert_ttd > 0 && $insert_p_ttd > 0) {
			return 1;
		}else{
			return 0;
		}
		
		}else{
			return $this->db->query("INSERT INTO tb_perbaikan_laptop VALUES ($readyid, 1, $id_pelanggan, $id_mitra, $id_tipe_laptop, $id_kerusakan_laptop, '$ket_kerusakan_laptop_lain', '', '$tanggal', 0)");
		}
		
	}

	public function tambahPerbaikanHp($data){
		$id_pelanggan = $data['id_pelanggan2'];
		$id_mitra = $data['id_mitra2'];
		$id_tipe_hp = $data['id_tipe_hp'];
		$id_kerusakan_hp = $data['id_kerusakan_hp'];
		$merk_hp_ttd =  $data['merk_hp_ttd'];
		$tipe_hp_ttd = $data['tipe_hp_ttd'];
		$ket_kerusakan_hp_lain = $data['ket_kerusakan_hp_lain'];
		$tanggal = $data['tanggal2'];

		// ========= AMBIL ID TERAKHIR DI PERBAIKAN ============= //
		
		$this->db->select('id_perbaikan');
		$this->db->order_by('id_perbaikan', 'DESC');
		$get_id = $this->db->get('tb_perbaikan_hp')->result_array();
		
		// ============= ISI ID ===================//

		if (count($get_id) > 0) {
			$readyid = $get_id[0]['id_perbaikan'] + 1;
		}else{
			$readyid = 1;
		}

		if ($id_tipe_hp == 0) {
	
		// ================= INSERT DATA PERBAIKAN ============= //

		$data_p_ttd = [
						'id_perbaikan' => $readyid,
						'id_status_perbaikan' => 1,
						'id_pelanggan' => $id_pelanggan,
						'id_mitra' => $id_mitra,
						'id_tipe_hp' => $id_tipe_hp,
						'id_kerusakan_hp' => $id_kerusakan_hp,
						'kerusakan_lain' => $ket_kerusakan_hp_lain,
						'keterangan_mitra' => '',
						'tanggal' => $tanggal,
						'harga' => 0,
						];

		$insert_p_ttd = $this->db->insert('tb_perbaikan_hp', $data_p_ttd);

		// ========== BAGIAN TIPE TIDAK TERDAFTAR ============= //

		$this->db->select('id_ttd_hp');
		$this->db->order_by('id_ttd_hp', 'DESC');
		$get_ttd = $this->db->get('tb_ttd_hp')->result_array();

		if (count($get_ttd) > 0) {
			$readyttd = $get_ttd[0]['id_ttd_hp'] + 1;
		}else{
			$readyttd = 1;
		}

		$data_ttd = [
					'id_ttd_hp' => $readyttd, 
					'id_perbaikan' => $readyid,
					'merk_hp' => $merk_hp_ttd, 
					'tipe_hp' => $tipe_hp_ttd];
		$insert_ttd = $this->db->insert('tb_ttd_hp', $data_ttd);

		

		if ($insert_ttd > 0 && $insert_p_ttd > 0) {
			return 1;
		}else{
			return 0;
		}
		
		}else{
			return $this->db->query("INSERT INTO tb_perbaikan_hp VALUES ($readyid, 1, $id_pelanggan, $id_mitra, $id_tipe_hp, $id_kerusakan_hp, '$ket_kerusakan_hp_lain', '', '$tanggal', 0)");
		}
	}


}

/* End of file Perbaikan_model.php */
/* Location: ./application/models/Perbaikan_model.php */