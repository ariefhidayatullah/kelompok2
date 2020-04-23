<?php 

//pada init.php, hanya digunakan untuk mamanggil file2 yang di butuhkan
//yaitu app.php dan controller.php

//app.php url
require_once 'core/App.php';
require_once 'core/Controller.php'; 
require_once 'core/Database.php'; 
require_once 'core/Session.php';
require_once 'core/Flasher.php';

require_once 'config/config.php';
