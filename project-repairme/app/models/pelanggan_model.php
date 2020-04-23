<?php 

class pelanggan_model{
	private $db;

	function __construct(){
		$this->db = new Database;
	}

	public function getAllpelanggan(){
		return $this->db->query("SELECT * FROM tb_pelanggan");
    }
    public function getDetail($id){
		return $this->db->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan = ".$id);
	}
	
	public function getAllPengguna(){
		return $this->db->query("SELECT * FROM tb_user");
    }
    public function inputpelanggan($data){
		$id_jenis = 3;
		
		$nama = $data['nama'];
		$email = $data['email'];
		$no_tlp= $data['no_tlp'];
		$alamat = $data['alamat'];
		$username = $data['username'];
		$conn = mysqli_connect( 'localhost', 'root', '', 'repair_me');
		$username = strtolower(stripslashes($data['username']));
		$password1 = mysqli_real_escape_string($conn, $data['password2']);

		$password = password_hash($password1, PASSWORD_DEFAULT);
		$cekUsername = $this->db->query("SELECT * FROM tb_user");
		$preIdUser = $this->db->query("SELECT * FROM tb_user ORDER BY id_user DESC LIMIT 1");

		foreach ($preIdUser as $key) {
			$rows = $key['id_user'];
		}

		$reUser = $rows + 1;

		$input = $this->db->data("INSERT INTO tb_user VALUES ($reUser,'$username','$password')") &&
		$this->db->data("INSERT INTO tb_pelanggan VALUES ( NULL,'$id_jenis',$reUser,'$nama','$email','$no_tlp','$alamat')");
		

		return $input;
		}

	public function deletepelanggan($id){
		
			$preIdpelanggan = $this->db->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan = " . $id);
			
			 foreach ($preIdpelanggan as $key) {
				 $rows = $key['id_user'];
			 }
	
			 $delUsr = $this->db->data("DELETE FROM `tb_user` WHERE id_user = ".$rows);
			 $delpelanggan = $this->db->data("DELETE FROM tb_pelanggan WHERE id_pelanggan ='$id'");
	
			
			
			
			return $delUsr && $delpelanggan;
		}

	public function updatePelanggan($data){
		$id = $data['id_pelanggan'];
		$nama = $data['nama'];
		$email = $data['email'];
		$no = $data['no_tlp'];
		$alamat = $data['alamat'];
		$update=$this->db->data("UPDATE tb_pelanggan SET 
		tb_pelanggan.nama='$nama',tb_pelanggan.email='$email',tb_pelanggan.no_tlp='$no', tb_pelanggan.alamat='$alamat' where id_pelanggan='$id'");
	

	return $update;
	}

	public function getPelNow(){
		return $this->db->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan = " . $_SESSION['login']['data']['id_pelanggan']);
	}
	public function getRating(){
		return $this->db->query("SELECT * FROM tb_rating");
	}
	public function inputrating($data){
		$id_pelanggan = $data['id_pelanggan'];
		$id_mitra = $data['id_mitra'];
		$rating = $data['ratingmitra'];
		$testimoni =$data['testimoni'];
		$ratingmtrr = $data['ratingMtr'];
		$this->db->data("UPDATE tb_mitra SET tb_mitra.rating ='$ratingmtrr' where id_mitra = ".$id_mitra);
		return $this->db->data("INSERT INTO tb_rating VALUES (NULL,'$id_pelanggan','$id_mitra','$rating','$testimoni')");
	
	}

	public function diskondibaca($id){
		$data = $id['idper_dislap'];
		return $this->db->data("UPDATE tb_notif_mitra SET tb_notif_mitra.dibaca = 'y'
		WHERE id_perbaikan =".$data);
	}

	public function diskondibaca2($id){
		$data = $id['idper_dishp'];
		return $this->db->data("UPDATE tb_notif_mitra SET tb_notif_mitra.dibaca = 'y'
		WHERE id_perbaikan =".$data);
	}

	public function lanjutperbaikan($id){
		$data = $id['idper_tambahlap'];
		$this->db->data("DELETE FROM tb_notif_mitra WHERE id_perbaikan ='$data'");
		$this->db->data("INSERT INTO tb_notif_pelanggan VALUES (NULL,'lanjut_perbaikan','Pelanggan Menyetujui Penambahan Harga',$data,'n')");
		$this->db->data("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.id_status_perbaikan = 4
		WHERE id_perbaikan =".$data);
	}

	public function batalkanperbaikanlaptop($id){
		$data = $id['idper_batallap'];
		$this->db->data("DELETE FROM tb_notif_mitra WHERE id_perbaikan ='$data'");
		$this->db->data("INSERT INTO tb_notif_pelanggan VALUES (NULL,'batalkan_perbaikan','Pelanggan Membatalkan Perbaikan',$data,'n')");
		$this->db->data("UPDATE tb_perbaikan_laptop SET tb_perbaikan_laptop.id_status_perbaikan = 6
		WHERE id_perbaikan =".$data);
	}

	public function hapusnotifdiskonlaptop($data){
		$id = $data['idper_dislap2'];
		return $this->db->data("DELETE FROM tb_notif_mitra WHERE id_perbaikan ='$id'");
	}

	public function hapusnotifdiskonlaptop2($data){
		$id = $data['idper_dishp2'];
		return $this->db->data("DELETE FROM tb_notif_mitra WHERE id_perbaikan ='$id'");
	}

	public function lanjutperbaikan2($id){
	$data = $id['idper_tambahhp'];
	$this->db->data("DELETE FROM tb_notif_mitra WHERE id_perbaikan ='$data'");
	$this->db->data("INSERT INTO tb_notif_pelanggan VALUES (NULL,'lanjut_perbaikan2','Pelanggan Menyetujui Penambahan Harga',$data,'n')");
	$this->db->data("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.id_status_perbaikan = 4 WHERE id_perbaikan = ".$data);
	}

	public function batalkanperbaikanhp($id){
		$data = $id['idper_batalhp'];
		$this->db->data("DELETE FROM tb_notif_mitra WHERE id_perbaikan ='$data'");
		$this->db->data("INSERT INTO tb_notif_pelanggan VALUES (NULL,'batalkan_perbaikan2','Pelanggan Membatalkan Perbaikan',$data,'n')");
		$this->db->data("UPDATE tb_perbaikan_hp SET tb_perbaikan_hp.id_status_perbaikan = 6
		WHERE id_perbaikan =".$data);
	}

}
	


