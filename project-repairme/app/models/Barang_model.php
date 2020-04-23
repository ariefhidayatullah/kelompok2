 <?php 

class Barang_model{
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
	
	// untuk laptop

	public function tambahMerkLaptop($data){
		$merk_laptop = $data['merk_laptop'];
		return $this->db->data("INSERT INTO tb_merk_laptop VALUES ( NULL,'$merk_laptop')");
	}

	public function getMerkLaptop(){
		return $this->db->query("SELECT* FROM tb_merk_laptop ");
	}


	public function getTipeLaptop(){
		return $this->db->query("SELECT * FROM tb_tipe_laptop ");
	}


	public function tambahTipeLaptop($data){
		$merk_laptop = $data['merklaptop'];
		$tipe_laptop = $data['tipelaptop'];
		return $this->db->data("INSERT INTO tb_tipe_laptop VALUES ( NULL,'$tipe_laptop','$merk_laptop')");
	}

	public function getLaptop(){
		return $this->db->query("SELECT id_tipe_laptop, tipe_laptop, merk_laptop FROM tb_tipe_laptop JOIN tb_merk_laptop ON tb_tipe_laptop.id_merk_laptop = tb_merk_laptop.id_merk_laptop");
	}

	public function getHp(){
		return $this->db->query("SELECT id_tipe_hp, tipe_hp, merk_hp FROM tb_tipe_hp JOIN tb_merk_hp ON tb_tipe_hp.id_merk_hp = tb_merk_hp.id_merk_hp");
	}

	// untuk menambah barang hp

	public function tambahMerkHp($data){
		$merk_hp = $data['merk_hp'];
		return $this->db->data("INSERT INTO tb_merk_hp VALUES ( NULL,'$merk_hp')");
	}

	public function getMerkHp(){
		return $this->db->query("SELECT * FROM tb_merk_hp "); 
	}

	public function getTipeHp(){
		return $this->db->query("SELECT * FROM tb_tipe_hp");
	}

	public function tambahTipeHp($data){
		$merk_hp = $data['merkhp'];
		$tipe_hp = $data['tipehp'];
		return $this->db->data("INSERT INTO tb_tipe_hp VALUES ( NULL,'$tipe_hp','$merk_hp')");
	}

	public function tambahkerusakanLaptop($data){
		$kerusakan = $data['kerusakan'];
		return $this->db->data("INSERT INTO tb_kerusakan_laptop VALUES ( NULL,'$kerusakan')");
	}
	public function getKerusakanLaptop(){
		return $this->db->query("SELECT * FROM tb_kerusakan_laptop");
	}

	public function deleteKerusakanhp($id){
		
		 $delkerhp = $this->db->data("DELETE FROM tb_kerusakan_hp WHERE id_kerusakan_hp  = ". $id);

		return $delkerhp;
	}


	public function tambahkerusakanHp($data){
		$kerusakan = $data['kerusakan'];
		return $this->db->data("INSERT INTO tb_kerusakan_hp VALUES ( NULL,'$kerusakan')");
	}
	public function getKerusakanHp(){
		return $this->db->query("SELECT * FROM tb_kerusakan_hp");
	}

	public function deleteKerusakanlaptop($id){
		
		 $delkerlaptop = $this->db->data("DELETE FROM tb_kerusakan_laptop WHERE id_kerusakan_laptop  = ". $id);

		return $delkerlaptop;
	}
	public function getAllPaket(){
		return $this->db->query("SELECT * FROM tb_paket");
	}

	public function tambahpaket($data){
		$nama_paket = $data['nama_paket'];
		$harga = $data['harga'] ;
		return $this->db->data("INSERT INTO tb_paket VALUES ( NULL,'$nama_paket', '$harga')");
	}
	public function updatepaket($data){
	$id=$data['id_ubh'];
	$nama_paket = $data['nama_paket_ubh'];
	$harga= $data['harga_ubh'];
	return $this->db->data("UPDATE tb_paket SET tb_paket.nama_paket = '$nama_paket' , tb_paket.harga = '$harga'
		WHERE id_paket = $id");
	}

	public function deletePaket($id){
		
		 $delpak = $this->db->data("DELETE FROM tb_paket  WHERE id_paket  = ". $id);

		return $delpak;
	}

	public function updateKerusakanHp($data){
	$id = $data['id_kerusakan_ubh'];
	$kerusakan = $data['kerusakanhp_ubh'];
	return $this->db->data("UPDATE tb_kerusakan_hp SET tb_kerusakan_hp.kerusakan_hp = '$kerusakan'
		WHERE id_kerusakan_hp = $id ");
	}

	public function updateKerusakanLaptop($data){
	$id = $data['id_kerusakanlap_ubh'];
	$kerusakan = $data['kerusakanlap_ubh'];
	return $this->db->data("UPDATE tb_kerusakan_laptop SET tb_kerusakan_laptop.kerusakan_laptop = '$kerusakan'
		WHERE id_kerusakan_laptop = $id ");
	}

	public function deleteBaranglaptop($id){
		return  $this->db->data("DELETE FROM tb_tipe_laptop  WHERE id_tipe_laptop  = ".$id);
			
	}
	public function delHandphone($id){
		return $this->db->data("DELETE FROM tb_tipe_hp  WHERE id_tipe_hp  = ". $id);
			
	}

	public function updatetipeLaptop($data){
	$tipelp = $data['tipe_lp_lm'];
	$tipe_laptop= $data['tipelaptop_ubh'];
	$result = $this->db->query("SELECT * FROM tb_tipe_laptop WHERE tipe_laptop = '$tipelp'");

	foreach ($result as $key) {
		return $this->db->data("UPDATE tb_tipe_laptop SET tb_tipe_laptop.tipe_laptop = '$tipe_laptop'
		WHERE id_tipe_laptop =".$key['id_tipe_laptop']);
	}
	}

	
	public function updatetipeHp($data){
	$tipehp = $data['tipe_hp_lm'];
	$tipe_hp= $data['tipehp_ubh'];
	$result = $this->db->query("SELECT * FROM tb_tipe_hp WHERE tipe_hp = '$tipehp'");

	foreach ($result as $key) {
		return $this->db->data("UPDATE tb_tipe_hp SET tb_tipe_hp.tipe_hp = '$tipe_hp'
		WHERE id_tipe_hp = ".$key['id_tipe_hp']);
	}
	}
}