 <?php 

 	//file ini digunakan untuk mengatur url yang ada di atas
 	//semuanya sudah di sinkronisasi di file .htdocs

class App{
	//membuat variable $controller untuk url pertama
	//$method untuk url kedua
	//$params untuk memasukkan parameter ke url
	//agar url rapi
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

	function __construct(){

		// panggil function yang ada di bawah *cek yang bawah

		$url = $this->parseURL();
		 //var_dump($url); 
 
		//controller
		//mengecek apakah ada file yang sama di controllers, yang dituliskan di url[0], 
		//ucwords agar di awal kata, hurufnya menggunakan kapital
		

		//jika file ada, maka
	if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
			// masukkan ke variable $this->controller
	 		$this->controller = ucwords($url[0]);
	 		//hilangkan $url[0] karena sudah tidak terpakai
   		  	unset($url[0]); 
	 		// var_dump($url);
	 	}


	 	// mengambil file dan menginstansi agar bisa di tampilkan
	 	require_once '../app/controllers/' . $this->controller . '.php';
	 	$this->controller = new $this->controller;

		//Untuk method, jika method di isi maka
	 	// method_exists(object, method_name), mencari method
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		//parameter

		if(!empty($url)){
			// variable params diisi dengan isinya array yang ngambil di url
			$this->params = array_values($url);
			// var_dump($url);
		}

 
	// // 	//jalankan controller dan method, serta kirimkan params jika ada

		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	function parseURL(){
		if( isset($_GET['url'])){

			//ambil url, simpan di variable $url

			 $url = $_GET['url'];

			//hilagkan tanda / nya dengan trim

			 $url = rtrim($url, '/');

			 //membersihkan dari karakter aneh

			 $url = filter_var($url, FILTER_SANITIZE_URL);
			  
			 // menjadikan array 

			 $url = explode('/', $url);
			return $url;
		}
	}
}