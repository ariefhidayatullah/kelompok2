 <?php 

class Admin_model{
	private $db;



	function __construct(){
		$this->db = new Database;
	}

	public function getAllKategori(){
		$data1 = $this->db->query("SELECT * FROM tb_kategori");
		$data2 = $this->db->query("SELECT * FROM tb_merk");
		$data3 = $this->db->query("SELECT * FROM tb_tipe");
		$result = array('kategori' => $data1, 'merk' => $data2, 'tipe' => $data3);
		return $result;
	}
	public function getSpeMerk($data){
		return $this->db->query("SELECT * FROM tb_merk WHERE id_merk =".$data);
	}

	
	public function getAllKerusakan(){
		return $this->db->query("SELECT * FROM tb_kerusakan");
	}
	
	public function tambahMerkLaptop($data){
		$merkLaptop = $data['merkLaptop'];
		return $this->db->data("INSERT INTO tb_merk_laptop VALUES ( NULL,'$merkLaptop')");
	}

	
	public function tambahkerusakan($data){
		$kerusakan = $data['kerusakan'];
		return $this->db->data("INSERT INTO tb_kerusakan VALUES ( NULL,'$kerusakan')");
	}


	public function getPerbaikan(){
		$perbaikan_laptop = $this->db->query("SELECT * FROM tb_perbaikan_laptop");
		$status_perbaikan = [];
		$i = 0;
		foreach ($perbaikan_laptop as $laptop) {
			$status_perbaikan[$i] = $this->db->query("SELECT id_status_perbaikan,status_perbaikan FROM tb_status_perbaikan WHERE id_status_perbaikan = ".$laptop['id_status_perbaikan']);
			$i++;
		}
		$pelanggan = [];
		$j = 0;
		foreach ($perbaikan_laptop as $laptop) {
			$pelanggan[$j] = $this->db->query("SELECT nama FROM tb_pelanggan WHERE id_pelanggan = ".$laptop['id_pelanggan']);
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
			if ($laptop['harga'] == 0) {
				$harga[$m] = 'Menunggu Kisaran Harga';
			}else{
				$harga[$m] = $laptop['harga'];
			}
			$m++;
		}

		$result = ['perbaikan_laptop' => $perbaikan_laptop, 'pelanggan' => $pelanggan, 'tipe_laptop' => $tipe_laptop, 'status' => $status_perbaikan, 'merk_laptop' => $merk_laptop, 'kerusakan_laptop' => $kerusakan_laptop, 'keterangan_lain' => $ket_lain, 'harga' => $harga];

		return $result;
	}

	public function getPerbaikan2(){
		$perbaikan_hp = $this->db->query("SELECT * FROM tb_perbaikan_hp");
		$status_perbaikan = [];
		$i = 0;
		foreach ($perbaikan_hp as $hp) {
			$status_perbaikan[$i] = $this->db->query("SELECT id_status_perbaikan,status_perbaikan FROM tb_status_perbaikan WHERE id_status_perbaikan = ".$hp['id_status_perbaikan']);
			$i++;
		}
		$pelanggan = [];
		$j = 0;
		foreach ($perbaikan_hp as $hp) {
			$pelanggan[$j] = $this->db->query("SELECT nama FROM tb_pelanggan WHERE id_pelanggan = ".$hp['id_pelanggan']);
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
				if ($hp['kerusakan_lain'] == '') {
					$ket_lain[$l] = '-';	
				}else{
				$ket_lain[$l] = $hp['kerusakan_lain']; 
				}
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
			}else{
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
			$notif[$o] = $this->db->query("SELECT * FROM tb_notif_pelanggan WHERE id_perbaikan = ".$hp['id_perbaikan']);
			$o++;
		}

		$result = ['perbaikan_hp' => $perbaikan_hp, 'pelanggan' => $pelanggan, 'tipe_hp' => $tipe_hp, 'status' => $status_perbaikan, 'merk_hp' => $merk_hp, 'kerusakan_hp' => $kerusakan_hp, 'keterangan_lain' => $ket_lain, 'harga' => $harga, 'waktu' => $waktu, 'notif' => $notif];

		return $result;

	}

	public function terimapengajuanlaptop($data){
	$id = $data['id_perbaikan_laptop'];
	$harga = $data['hargalaptop'];
	$keterangan_lain = $data['ketlaptoplain'];
	$voucher = $data['voucherlaptop'];
	$this->db->data("INSERT INTO tb_voucher_laptop VALUES (NULL,'$voucher',$id)");
	return $this->db->data("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.id_status_perbaikan = 2, tb_perbaikan_laptop.harga = '$harga', tb_perbaikan_laptop.keterangan_mitra = '$keterangan_lain'
		WHERE id_perbaikan = $id
		");
	}

	public function tolakpengajuanlaptop($data){
	$id = $data['id_perbaikan_laptopx'];
	$keterangan_lain = $data['ketpenolakanlaptop'];
	$harga = '1';
	return $this->db->data("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.id_status_perbaikan = 3, tb_perbaikan_laptop.harga = '$harga', tb_perbaikan_laptop.keterangan_mitra = '$keterangan_lain'
		WHERE id_perbaikan = $id
		");
	}

	public function terimapengajuanhp($data){
	$id = $data['id_perbaikan_hp'];
	$harga = $data['hargahp'];
	$keterangan_lain = $data['kethplain'];
	$voucher = $data['voucherhp'];
	$this->db->data("INSERT INTO tb_voucher_hp VALUES (NULL,'$voucher',$id)");
	return $this->db->data("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.id_status_perbaikan = 2, tb_perbaikan_hp.harga = '$harga', tb_perbaikan_hp.keterangan_mitra = '$keterangan_lain'
		WHERE id_perbaikan = $id
		");
	}

	public function tolakpengajuanhp($data){
	$id = $data['id_perbaikan_hpx'];
	$keterangan_lain = $data['ketpenolakanhp'];
	$harga = '1';
	return $this->db->data("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.id_status_perbaikan = 3, tb_perbaikan_hp.harga = '$harga', tb_perbaikan_hp.keterangan_mitra = '$keterangan_lain'
		WHERE id_perbaikan = $id
		");
	}

	public function updateKerusakanHp($data){
	$id = $data['id_kerusakan_hp'];
	$kerusakan = $data ['kerusakan'];
	$update=$this->db->data("UPDATE tb_kerusakan_hp SET tb_kerusakan_hp.kerusakan = '$kerusakan'
		WHERE id_kerusakan_hp = $id
		");

	return $update;
	}

	public function getAllUser($data){
		
    	$username = $data['username'];
    	$password = $data['password'];

		$getUser = $this->db->query("SELECT * FROM tb_user WHERE username = '$username'");
        $getPass = $getUser[0]['password'];

        if (password_verify($password, $getPass)) {
            $getIdUser = $getUser[0]['id_user'];
            $getJenisAdmin = $this->db->query("SELECT * FROM tb_admin WHERE id_user = '$getIdUser'");
            $getJenisMitra = $this->db->query("SELECT * FROM tb_mitra WHERE id_user = '$getIdUser'");
            $getJenisPelanggan = $this->db->query("SELECT * FROM tb_pelanggan WHERE id_user = '$getIdUser'");
            if (count($getJenisMitra) == 1) {
                return $getJenisMitra;
            }elseif (count($getJenisPelanggan) == 1) {
                return $getJenisPelanggan;
            }elseif(count($getJenisAdmin) == 1){
                return $getJenisAdmin;
            }else{
            return false;
        }
    }
}
        public function Verif_mitra($data){    
    	$id_mitra = $data['id_mitra'];
    	$lama= $data['lama'];
    	$harga = $data['harga'];
    	$tanggal_hari = $data['tanggal_hari'];
    	return $this->db->data("INSERT INTO verifikasi_mitra VALUES (NULL,'$id_mitra','$lama', '$harga' ,'$tanggal_hari')");
    }
     

     public function jumlahpelanggan(){
     	return $this->db->query("SELECT COUNT(id_pelanggan) FROM tb_pelanggan");
     }   
     public function jumlahmitra(){
     	return $this->db->query("SELECT COUNT(id_mitra) FROM tb_mitra");
     }   

}