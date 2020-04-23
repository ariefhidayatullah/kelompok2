<?php
class Login extends Controller{
 
    function index(){
    	$data['judul'] = 'Login';
		$data['user'] = $this->model('Login_model')->getAllUser();
        $this->view('templates/header',$data);
        $this->view('login/index',$data);
        $this->view('templates/footer');
    }

    function checklogin(){
    	$ret = $this->model('Login_model')->checkloginkey($_POST);
    	// var_dump($ret); 
    	if (count($ret) == 1) {

            if ($ret[0]['id_jenis'] == 2) {
                mySession::setSession('true', 'mitra', $ret[0]);
                header('Location:'.BASEURL.'/mitra/');
            }else if($ret[0]['id_jenis'] == 3) {
                mySession::setSession('true', 'pelanggan', $ret[0]);
                header('Location:'.BASEURL.'/perbaikan/');            
            }else if($ret[0]['id_jenis'] == 1){
                mySession::setSession('true', 'admin', $ret[0]);
                header('Location:'.BASEURL.'/admin/'); 
        	}
        }
        if ($ret == false){
            Flasher::setFlash(' Login', 'GAGAl', 'danger'); 
                header('Location:'.BASEURL.'/login/');
        }
}

    function logout(){

    session_unset();
    $_SESSION = [];

    session_destroy();

    header('Location:'.BASEURL.'/login');
    exit;
    }
    
}