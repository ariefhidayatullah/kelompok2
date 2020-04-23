<?php 

//file untuk memanggil file2 yang ada di views

class Controller{
	
	//$view untuk lokasinya
	//$data, misal kalau ada parameternya


	public function view($view, $data = []){
		require '../app/views/' . $view . '.php';
	}

	public function model($model){
		require '../app/models/'.$model.'.php';
		return new $model;
	}
}
