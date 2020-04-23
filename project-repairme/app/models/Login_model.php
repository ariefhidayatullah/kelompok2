 <?php 

class Login_model{
    private $db;



    function __construct(){
        $this->db = new Database;
    }

    public function getAllUser(){
        return $this->db->query("SELECT * FROM tb_user");
    }
    
    public function checkloginkey($data){
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

}