 <?php 

class Mitra_model{
	private $db;



	function __construct(){
		$this->db = new Database;
	}

	public function getAllMitra(){
		return $this->db->query("SELECT * FROM tb_mitra");
    }
	public function getMitra(){
		return $this->db->query("SELECT tb_mitra.*, AVG(rating) as rating_data FROM `tb_mitra`, tb_rating WHERE tb_mitra.id_mitra = tb_rating.id_mitra GROUP BY id_mitra");
	}
	public function getMitraNow(){
		return $this->db->query("SELECT tb_mitra.* FROM `tb_mitra` WHERE tb_mitra.id_mitra = " . $_SESSION['login']['data']['id_mitra']);
	}
	public function getDetail($id){
		return $this->db->query("SELECT * FROM tb_mitra WHERE id_mitra = $id ");
	}
	
	public function getAllPengguna(){
		return $this->db->query("SELECT * FROM tb_user");
	}

	public function inputMitra($data){
		$foto_ktp = $this->db->upload('foto_ktp');
		$foto_usaha = $this->db->upload('foto_usaha');

		$id_jenis = 2;
		
		//deklarasikan conn karena variabelnya dibutuhkan

		$conn = mysqli_connect( 'localhost', 'root', '', 'repair_me');
		
		$nama = $data['nama'];
		$nama_usaha = $data['nama_usaha'];
		$email = $data['email'];
		$no_telpon= $data['no_telpon'];
		$alamat = $data['alamat'];
		$lat = $data['lat'];
		$lng = $data['lng'];
		$jenis = $data['jenis'];
		$deskripsi = $data['deskripsi'];
		//validasi username dan password

		$username = strtolower(stripslashes($data['username']));
		$password = mysqli_real_escape_string($conn, $data['password1']);
		
		$password = password_hash($password, PASSWORD_DEFAULT);
		$cekUsername = $this->db->query("SELECT * FROM tb_user");
		foreach ($cekUsername as $key) {
			if ($key['username'] == $username
			) {
				return false;
			}
		}

		
		$preIdUser = $this->db->query("SELECT * FROM tb_user ORDER BY id_user DESC LIMIT 1");
		

		foreach ($preIdUser as $key) {
			$rows = $key['id_user'];
		}
		

		$readyUser = $rows + 1;
		$err = $rows + 1;

		$this->db->data("INSERT INTO tb_user VALUES ($readyUser,'$username','$password')");
		return $this->db->data("INSERT INTO tb_mitra VALUES ( NULL,'$id_jenis',$readyUser,'$jenis','$nama','$nama_usaha','$email','$alamat', '$lat', '$lng','$no_telpon','$foto_ktp','$foto_usaha','','$deskripsi', 0)");
	
		
	}
		
	public function deleteMitra($id){
		
		$preIdMitra = $this->db->query("SELECT * FROM tb_mitra WHERE id_mitra = " . $id);
		
		 foreach ($preIdMitra as $key) {
		 	$rows = $key['id_user'];
		 }

		 $delUsr = $this->db->data("DELETE FROM `tb_user` WHERE id_user = ".$rows);
		 $delMitra = $this->db->data("DELETE FROM `tb_mitra` WHERE id_mitra = ". $id);

		
		
		
		return $delUsr && $delMitra;
	}

	public function ubahMitra($id){
		$uMitra = $this->db->query("SELECT * FROM tb_mitra WHERE id_mitra = " . $id);
		 foreach ($uMitra as $key2){
			 $rows = $key2 ['id_user'];
		 }
		  
	}

	public function updateDeskripsi($data){
	$id = $data['id_mitra'];
	$nama = $data ['nama'];
	$email= $data['email'];
	$alamat = $data['alamat'];
	$no = $data['no_tlp'];
	$deskripsi = $data['deskripsi'];
	$update=$this->db->data("UPDATE tb_mitra SET tb_mitra.nama = '$nama' , tb_mitra.email = '$email' ,tb_mitra.alamat = '$alamat' ,tb_mitra.no_tlp = '$no' ,tb_mitra.deskripsi = '$deskripsi' 
		WHERE id_mitra = $id
		");

	return $update;
	}

	public function inputTransaksi($data){
		$id_mitra = $_SESSION['login']['data']['id_mitra'];
		$foto_transaksi = $this->db->upload('foto_transaksi');
		$foto_update = $this->db->query("UPDATE tb_mitra SET foto_transaksi='$foto_transaksi' WHERE id_mitra='$id_mitra'");
		return $foto_update;
	}

		public function getPerbaikan(){
		$id_mitra = $_SESSION['login']['data']['id_mitra'];
		$perbaikan_laptop = $this->db->query("SELECT * FROM tb_perbaikan_laptop WHERE id_mitra = ".$id_mitra);
		$status_perbaikan = [];
		$i = 0;
		foreach ($perbaikan_laptop as $laptop) {
			$status_perbaikan[$i] = $this->db->query("SELECT id_status_perbaikan,status_perbaikan FROM tb_status_perbaikan WHERE id_status_perbaikan = ".$laptop['id_status_perbaikan']);
			$i++;
		}
		$pelanggan = [];
		$j = 0;
		foreach ($perbaikan_laptop as $laptop) {
			$pelanggan[$j] = $this->db->query("SELECT nama, id_pelanggan FROM tb_pelanggan WHERE id_pelanggan = ".$laptop['id_pelanggan']);
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
			$notif[$o] = $this->db->query("SELECT * FROM tb_notif_pelanggan WHERE id_perbaikan = ".$laptop['id_perbaikan']);
			$o++;
		}

		$result = ['perbaikan_laptop' => $perbaikan_laptop, 'pelanggan' => $pelanggan, 'tipe_laptop' => $tipe_laptop, 'status' => $status_perbaikan, 'merk_laptop' => $merk_laptop, 'kerusakan_laptop' => $kerusakan_laptop, 'keterangan_lain' => $ket_lain, 'harga' => $harga, 'waktu' => $waktu, 'notif' => $notif];

		return $result;
	}

	public function getPerbaikan2(){
		$id_mitra = $_SESSION['login']['data']['id_mitra'];
		$perbaikan_hp = $this->db->query("SELECT * FROM tb_perbaikan_hp WHERE id_mitra = ".$id_mitra);
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

	//untuk mengambil voucher
	public function getVoucher(){
		return $this->db->query("SELECT * FROM tb_voucher_laptop");
	}
	public function getVoucher2(){
		return $this->db->query("SELECT * FROM tb_voucher_hp");
	}

	//menuju perbaikan

	public function terimaVoucher($data){
	$id = $data['idlaptop'];
	$tanggallaptop = $data['tanggallaptop'];
	$harilaptop = $data['harilaptop'];
	$berakhir = $data['berakhirlaptop'];
	$this->db->data("INSERT INTO tb_waktu_perbaikan_laptop VALUES (NULL,'$tanggallaptop','$harilaptop', '$berakhir' ,$id)");
	return $this->db->data("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.id_status_perbaikan = 4 WHERE id_perbaikan = $id");
	}

	public function terimaVoucher2($data){
	$id = $data['idhp'];
	$tanggalhp = $data['tanggalhp'];
	$harihp = $data['harihp'];
	$berakhir = $data['berakhirhp'];
	$this->db->data("INSERT INTO tb_waktu_perbaikan_hp VALUES (NULL,'$tanggalhp','$harihp', '$berakhir' ,$id)");
	return $this->db->data("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.id_status_perbaikan = 4 WHERE id_perbaikan = $id");
	}

	//mengambil data lama perbaikan
	public function getWaktuLaptop(){
		return $this->db->query("SELECT * FROM `perbaikan_laptop_view`");
	}


	//untuk perubahan perbaikan

	public function ubahperbaikan($data){
		$id = $data['id_perbaikan_laptop'];
		$id_pel = $data['id_pel_laptop'];
		$harga = $data['hrg_laptop_final'];
		$ketlaptoplain = $data['ketlaptoplain'];
		$pemberhentian = $data['pemberhentian'];
		// $arr = [$id,$harga,$ketlaptoplain];
		// return $arr;
		if ($harga != '') {
			if ($pemberhentian == 'true') {
			$this->db->data("INSERT INTO tb_notif_mitra VALUES (NULL, 'tambah_harga', '$ketlaptoplain', $id, 'n')");
			return $this->db->data("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.id_status_perbaikan = 5, tb_perbaikan_laptop.harga = '$harga' WHERE id_perbaikan = $id");
			}else{
			$this->db->data("INSERT INTO tb_notif_mitra VALUES (NULL, 'diskon', '$ketlaptoplain', $id, 'n')");
			return $this->db->data("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.harga = '$harga'
				WHERE id_perbaikan = $id");
			}
		}else{
			return $this->db->data("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.keterangan_mitra = '$ketlaptoplain' WHERE id_perbaikan = $id");
		}
	}

	public function ubahwaktuperbaikanlaptop($data){
		$id = $data['id_perlapp'];
		$waktu_tanggal = $data['tanggallaptop'];
		$waktu_hari = $data['harilaptop'];
		$berakhir = $data['berakhirlaptop'];
		
		$this->db->data("DELETE FROM `tb_notif_pelanggan` WHERE id_perbaikan = ". $id);

		return $this->db->data("UPDATE tb_waktu_perbaikan_laptop SET tb_waktu_perbaikan_laptop.waktu_tanggal = '$waktu_tanggal', tb_waktu_perbaikan_laptop.waktu_hari = '$waktu_hari', tb_waktu_perbaikan_laptop.berakhir = '$berakhir' WHERE id_perbaikan_laptop = $id");
	}


	public function getVerifikasi(){
		$foto_transaksi = $this->db->query("SELECT * FROM tb_mitra WHERE id_mitra = ".$id_mitra);
		$status_verifikasi = [];
		$i = 0;
		foreach ($foto_transaksi as $bukti) {
			$status_verifikasi[$i] = $this->db->query("SELECT id_status_verifikasi,status_verifikasi FROM tb_status_verifikasi WHERE id_status_verifikasi = ".$bukti['id_status_verifikasi']);
			$i++;
		}
		$result = ['foto_transaksi' => $foto_transaksi,  'status' => $status_perbaikan];

		return $result;
	}

	public function arsipbatalperbaikanlaptop($data){
		$id = $data['id_arsiplaptop'];
		return $this->db->data("UPDATE tb_notif_pelanggan SET tb_notif_pelanggan.dibaca = 'y' WHERE id_perbaikan = ". $id);
	}
	public function arsipbatalperbaikanhp($data){
		$id = $data['id_arsiphp'];
		return $this->db->data("UPDATE tb_notif_pelanggan SET tb_notif_pelanggan.dibaca = 'y' WHERE id_perbaikan = ". $id);
	}
	public function hapusbatalperbaikanlaptop($data){
		$id = $data['id_batallaptop'];
		$this->db->data("DELETE FROM `tb_notif_pelanggan` WHERE id_perbaikan = ". $id);
		return $this->db->data("DELETE FROM `tb_perbaikan_laptop` WHERE id_perbaikan = ". $id);
	}
	public function hapusbatalperbaikanhp($data){
		$id = $data['id_batalhp'];
		$this->db->data("DELETE FROM `tb_notif_pelanggan` WHERE id_perbaikan = ". $id);
		return $this->db->data("DELETE FROM `tb_perbaikan_hp` WHERE id_perbaikan = ". $id);
	}

	public function ubahperbaikan2($data){
	$id = $data['id_perbaikan_hp'];
	$harga = $data['hrg_hp_final'];
	$kethplain = $data['kethplain'];
	$pemberhentian = $data['pemberhentian2'];
	// $arr = [$id,$harga,$kethplain,$pemberhentian];
	// return $arr;
	if ($harga != '') {
		if ($pemberhentian == 'true') {
		$this->db->data("INSERT INTO tb_notif_mitra VALUES (NULL, 'tambah_harga2', '$kethplain', $id, 'n')");
		return $this->db->data("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.id_status_perbaikan = 5, tb_perbaikan_hp.harga = '$harga', tb_perbaikan_hp.keterangan_mitra = '$kethplain' WHERE id_perbaikan = $id");
	}else{
	$this->db->data("INSERT INTO tb_notif_mitra VALUES (NULL, 'diskon2', '$kethplain', $id, 'n')");
	return $this->db->data("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.harga = '$harga'
		WHERE id_perbaikan = $id");
	}
	}else{
	return $this->db->data("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.keterangan_mitra = '$kethplain'
		WHERE id_perbaikan = $id");	
	}
	}

	public function hapusnotiflanjutperbaikan($data){
		$id = $data['idper_lanlap'];
		return $this->db->data("DELETE FROM tb_notif_pelanggan WHERE id_perbaikan = ". $id);	
	}

	public function hapusnotiflanjutperbaikan2($data){
		$id = $data['idper_lanhp'];
		return $this->db->data("DELETE FROM tb_notif_pelanggan WHERE id_perbaikan = ". $id);	
	}

	public function ubahwaktuperbaikanhp($data){
		$id = $data['id_perhpp'];
		$waktu_tanggal = $data['tanggalhp'];
		$waktu_hari = $data['harihp'];
		$berakhir = $data['berakhirhp'];
		
		$this->db->data("DELETE FROM `tb_notif_pelanggan` WHERE id_perbaikan = ". $id);

		return $this->db->data("UPDATE tb_waktu_perbaikan_hp SET tb_waktu_perbaikan_hp.waktu_tanggal = '$waktu_tanggal', tb_waktu_perbaikan_hp.waktu_hari = '$waktu_hari', tb_waktu_perbaikan_hp.berakhir = '$berakhir' WHERE id_perbaikan_hp = $id");
	}

	public function selesaiperbaikanlaptop($data){
		$id = $data['idselesaiperbaikanlaptop'];
		return $this->db->data("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.id_status_perbaikan = 7 WHERE id_perbaikan = $id");	
	}

	public function selesaiperbaikanhp($data){
		$id = $data['idselesaiperbaikanhp'];
		return $this->db->data("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.id_status_perbaikan = 7 WHERE id_perbaikan = $id");	
	}
	public function cekveri(){
		return $this->db->query("SELECT * FROM verifikasi_mitra");

	}

	public function laptopdijemput($data){
		$id = $data['id_laptopdijemput'];
		return $this->db->data("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.id_status_perbaikan = 8 WHERE id_perbaikan = $id");	
	}

	public function hpdijemput($data){
		$id = $data['id_hpdijemput'];
		return $this->db->data("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.id_status_perbaikan = 8 WHERE id_perbaikan = $id");	
	}

	public function hapusriwayatlaptop($data){
		$id = $data['id_hapusriwayatlaptop'];
		return $this->db->data("DELETE FROM tb_perbaikan_laptop WHERE id_perbaikan =".$id);
	}
	public function hapusriwayathp($data){
	$id = $data['id_hapusriwayathp'];
	return $this->db->data("DELETE FROM tb_perbaikan_hp WHERE id_perbaikan =".$id);
	}

	public function getPerbaikangraf(){
		$perhp = $this->db->query("SELECT *, COUNT(id_pelanggan) AS data FROM `tb_perbaikan_laptop` WHERE id_mitra = ".$_SESSION['login']['data']['id_mitra']);
		return perhp;
	}
}