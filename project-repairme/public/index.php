<?php 

if (!session_id()) session_start();


//ini adalah file pertama yang akan di jalankan
//file pertama ini akan memanggil file init.php

require_once '../app/init.php'; 

//instansi class app yang akan di panggil di init.php

 $app = new App;
