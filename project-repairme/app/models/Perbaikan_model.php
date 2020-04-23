 <?php 

class Perbaikan_model{
	private $db;



	function __construct(){
		$this->db = new Database;
	}

	public function tambahPerbaikanLaptop($data){
		$id_pelanggan = $data['id_pelanggan'];
		$id_mitra = $data['id_mitra'];
		$id_tipe_laptop = $data['id_tipe_laptop'];
		$id_kerusakan_laptop = $data['id_kerusakan_laptop'];
		$merk_laptop_ttd =  $data['merk_laptop_ttd'];
		$tipe_laptop_ttd = $data['tipe_laptop_ttd'];
		$ket_kerusakan_laptop_lain = $data['ket_kerusakan_laptop_lain'];
		if ($id_tipe_laptop == 0) {

		$mypre = $this->db->query("SELECT id_ttd_laptop FROM tb_ttd_laptop ORDER BY id_ttd_laptop DESC LIMIT 1");
		foreach ($mypre as $key) {
			$rows = $key['id_ttd_laptop']; 
		}
		$readyttd = $rows + 1;

		$this->db->data("INSERT INTO tb_ttd_laptop VALUES ( $readyttd,'$merk_laptop_ttd', '$tipe_laptop_ttd')");

		return $this->db->data("INSERT INTO tb_perbaikan_laptop VALUES (NULL, 1, $id_pelanggan, $id_mitra, $id_tipe_laptop, $readyttd, $id_kerusakan_laptop, '$ket_kerusakan_laptop_lain', '', 0)");
		
		}else{
			return $this->db->data("INSERT INTO tb_perbaikan_laptop VALUES (NULL, 1, $id_pelanggan, $id_mitra, $id_tipe_laptop, 0, $id_kerusakan_laptop, '$ket_kerusakan_laptop_lain', '', 0)");
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
		if ($id_tipe_hp == 0) {

		$mypre = $this->db->query("SELECT id_ttd FROM tb_ttd_hp ORDER BY id_ttd_hp DESC LIMIT 1");
		foreach ($mypre as $key) {
			$rows = $key['id_ttd_hp']; 
		}
		$readyttd = $rows + 1;

		$this->db->data("INSERT INTO tb_ttd_hp VALUES ( $readyttd,'$merk_hp_ttd', '$tipe_hp_ttd')");

		return $this->db->data("INSERT INTO tb_perbaikan_hp VALUES (NULL, 1, $id_pelanggan, $id_mitra, $id_tipe_hp, $readyttd, $id_kerusakan_hp, '$ket_kerusakan_hp_lain', '', 0)");
		
		}
		else{
			return $this->db->data("INSERT INTO tb_perbaikan_hp VALUES (NULL, 1, $id_pelanggan, $id_mitra, $id_tipe_hp, 0, $id_kerusakan_hp, '$ket_kerusakan_hp_lain', '', 0)");
		}
		
	}

	public function getPerbaikan(){
		$id_pelanggan = $_SESSION['login']['data']['id_pelanggan'];
		$perbaikan_laptop = $this->db->query("SELECT * FROM tb_perbaikan_laptop WHERE id_pelanggan = ".$id_pelanggan);
		$status_perbaikan = [];
		$i = 0;
		foreach ($perbaikan_laptop as $laptop) {
			$status_perbaikan[$i] = $this->db->query("SELECT status_perbaikan, id_status_perbaikan FROM tb_status_perbaikan WHERE id_status_perbaikan = ".$laptop['id_status_perbaikan']);
			$i++;
		}
		$mitra = [];
		$j = 0;
		foreach ($perbaikan_laptop as $laptop) {
			$mitra[$j] = $this->db->query("SELECT nama_usaha FROM tb_mitra WHERE id_mitra = ".$laptop['id_mitra']);
			$j++;
		}

		$tipe_laptop = [];
		$merk_laptop = [];
		$k = 0;
		foreach ($perbaikan_laptop as $laptop) {
			if ($laptop['id_tipe_laptop'] != 0) {
			$tipe_laptop[$k] = $this->db->query("SELECT tipe_laptop,id_merk_laptop FROM tb_tipe_laptop WHERE id_tipe_laptop = ".$laptop['id_tipe_laptop']);
			
			
			$merk_laptop[$k] = $this->db->query("SELECT merk_laptop FROM tb_merk_laptop WHERE id_merk_laptop = ".$tipe_laptop[$k][0]['id_merk_laptop']);
	

			}else{
				$tipe_laptop[$k] = $this->db->query("SELECT tipe_laptop FROM tb_ttd_laptop WHERE id_ttd_laptop = ".$laptop['id_ttd_laptop']);
				$merk_laptop[$k] = $this->db->query("SELECT merk_laptop FROM tb_ttd_laptop WHERE id_ttd_laptop = ".$laptop['id_ttd_laptop']);

			}
			$k++;
			
		}

		$kerusakan_laptop = [];
		$ket_lain = [];
		$l = 0;
		foreach ($perbaikan_laptop as $laptop) {
			if ($laptop['id_kerusakan_laptop'] != 0) {
				$kerusakan_laptop[$l] = $this->db->query("SELECT kerusakan_laptop FROM tb_kerusakan_laptop WHERE id_kerusakan_laptop = ".$laptop['id_kerusakan_laptop']);
				$ket_lain[$l] = $laptop['kerusakan_lain']; 
			}else{
				$kerusakan_laptop[$l][0]['kerusakan_laptop'] = $laptop['kerusakan_lain'];
				$ket_lain[$l] = '-';
			}
			$l++;
		}

		$harga = [];
		$m = 0;
		foreach ($perbaikan_laptop as $laptop) {
			if ($laptop['harga'] == '0') {
				$harga[$m] = 'Menunggu Kisaran Harga';
			}else if($laptop['harga'] == '1'){
				$harga[$m] = '-';
			}else{
				$harga[$m] = $laptop['harga'];
			}
			$m++;
		}

		$waktu = [];
		$n = 0;
		foreach ($perbaikan_laptop as $laptop) {
			$waktu[$n] = $this->db->query("SELECT waktu_tanggal,waktu_hari,berakhir FROM tb_waktu_perbaikan_laptop WHERE id_perbaikan_laptop = ".$laptop['id_perbaikan']);
			$n++;
		}
		
		$notif = [];
		$o = 0;
		foreach ($perbaikan_laptop as $laptop) {
			$notif[$o] = $this->db->query("SELECT * FROM tb_notif_mitra WHERE id_perbaikan = ".$laptop['id_perbaikan']);
			$o++;
		}

		$result = ['perbaikan_laptop' => $perbaikan_laptop, 'mitra' => $mitra, 'tipe_laptop' => $tipe_laptop, 'status' => $status_perbaikan, 'merk_laptop' => $merk_laptop, 'kerusakan_laptop' => $kerusakan_laptop, 'keterangan_lain' => $ket_lain, 'harga' => $harga, 'waktu' => $waktu, 'notif' => $notif];

		
		return $result;
	}

	public function getPerbaikan2(){
		$id_pelanggan = $_SESSION['login']['data']['id_pelanggan'];
		$perbaikan_hp = $this->db->query("SELECT * FROM tb_perbaikan_hp WHERE id_pelanggan = ".$id_pelanggan);
		$status_perbaikan = [];
		$i = 0;
		foreach ($perbaikan_hp as $hp) {
			$status_perbaikan[$i] = $this->db->query("SELECT id_status_perbaikan,status_perbaikan FROM tb_status_perbaikan WHERE id_status_perbaikan = ".$hp['id_status_perbaikan']);
			$i++;
		}
		$mitra = [];
		$j = 0;
		foreach ($perbaikan_hp as $hp) {
			$mitra[$j] = $this->db->query("SELECT nama_usaha FROM tb_mitra WHERE id_mitra = ".$hp['id_mitra']);
			$j++;
		}

		$tipe_hp = [];
		$merk_hp = [];
		$k = 0;
		foreach ($perbaikan_hp as $hp) {
			if ($hp['id_tipe_hp'] != 0) {
			$tipe_hp[$k] = $this->db->query("SELECT tipe_hp,id_merk_hp FROM tb_tipe_hp WHERE id_tipe_hp = ".$hp['id_tipe_hp']);
			
			
			$merk_hp[$k] = $this->db->query("SELECT merk_hp FROM tb_merk_hp WHERE id_merk_hp = ".$tipe_hp[$k][0]['id_merk_hp']);
	

			}else{
				$tipe_hp[$k] = $this->db->query("SELECT tipe_hp FROM tb_ttd_hp WHERE id_ttd_hp = ".$hp['id_ttd_hp']);
				$merk_hp[$k] = $this->db->query("SELECT merk_hp FROM tb_ttd_hp WHERE id_ttd_hp = ".$hp['id_ttd_hp']);

			}
			$k++;
			
		}

		$kerusakan_hp = [];
		$ket_lain = [];
		$l = 0;
		foreach ($perbaikan_hp as $hp) {
			if ($hp['id_kerusakan_hp'] != 0) {
				$kerusakan_hp[$l] = $this->db->query("SELECT kerusakan_hp FROM tb_kerusakan_hp WHERE id_kerusakan_hp = ".$hp['id_kerusakan_hp']);
				$ket_lain[$l] = $hp['kerusakan_lain']; 
			}else{
				$kerusakan_hp[$l][0]['kerusakan_hp'] = $hp['kerusakan_lain'];
				$ket_lain[$l] = '-';
			}
			$l++;
		}

		$harga = [];
		$m = 0;
		foreach ($perbaikan_hp as $hp) {
			if ($hp['harga'] == '0') {
				$harga[$m] = 'Menunggu Kisaran Harga';
			}else if($hp['harga'] == '1'){
				$harga[$m] = '-';
			}
			else{
				$harga[$m] = $hp['harga'];
			}
			$m++;
		}

		$waktu = [];
		$n = 0;
		foreach ($perbaikan_hp as $hp) {
			$waktu[$n] = $this->db->query("SELECT waktu_tanggal,waktu_hari,berakhir FROM tb_waktu_perbaikan_hp WHERE id_perbaikan_hp = ".$hp['id_perbaikan']);
			$n++;
		}
		
		$notif = [];
		$o = 0;
		foreach ($perbaikan_hp as $hp) {
			$notif[$o] = $this->db->query("SELECT * FROM tb_notif_mitra WHERE id_perbaikan = ".$hp['id_perbaikan']);
			$o++;
		}

		$result = ['perbaikan_hp' => $perbaikan_hp, 'mitra' => $mitra, 'tipe_hp' => $tipe_hp, 'status' => $status_perbaikan, 'merk_hp' => $merk_hp, 'kerusakan_hp' => $kerusakan_hp, 'keterangan_lain' => $ket_lain, 'harga' => $harga, 'waktu' => $waktu, 'notif' => $notif];

		return $result;
	}


	//untuk mengambil voucher
	public function getVoucher(){
		return $this->db->query("SELECT * FROM tb_voucher_laptop");
	}
	public function getVoucher2(){
		return $this->db->query("SELECT * FROM tb_voucher_hp");
	}
}