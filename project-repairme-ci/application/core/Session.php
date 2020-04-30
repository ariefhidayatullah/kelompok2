<?php 

class mySession{
	public static function setSession($pesan, $jenis, $data){
		$_SESSION['login'] = [
			'pesan' => $pesan,
			'jenis' => $jenis,
			'data' => $data
			
		];

	}

	public static function getSession(){
		if (isset($_SESSION['login'])) {
			return $_SESSION['login'];
		}
	}


	public static function sessionLogin(){
		if (isset($_SESSION['login'])) {
			if ($_SESSION['login']['pesan'] == 'true') {
				if ($_SESSION['login']['jenis'] == 'mitra') {
					echo '<li><a href="'.BASEURL.'/login/logout">Logout Mitra</a></li>';

				}else if($_SESSION['login']['jenis'] == 'admin'){
					echo '<li><a href="'.BASEURL.'/login/logout">Logout Admin</a></li>';
				}else if($_SESSION['login']['jenis'] == 'pelanggan'){
					echo '<li><a href="'.BASEURL.'/login/logout">Logout Pelanggan</a></li>';
				}
			}
		}
	}

	public static function dashboard(){
		if (isset($_SESSION['login'])) {
			if ($_SESSION['login']['pesan'] == 'true') {
				if ($_SESSION['login']['jenis'] == 'mitra') {
					echo '<li><a href="'.BASEURL.'/mitra/index">DASHBOARD MITRA</a></li>';

				}else if($_SESSION['login']['jenis'] == 'admin'){
					echo '<li><a href="'.BASEURL.'/admin/index">DASHBOARD ADMIN</a></li>';
				}else if($_SESSION['login']['jenis'] == 'pelanggan'){
					echo '<li><a href="'.BASEURL.'/pelanggan/pengajuanperbaikan">DASHBOARD PELANGGAN</a></li>';
				}
			}
		}
	}

	public static function perbaikanSession($pesan, $data, $barang){
		$_SESSION['perbaikan'] = ['pesan' => $pesan, 'mitra' => $data, 'barang' => $barang];
	}

	

	}
