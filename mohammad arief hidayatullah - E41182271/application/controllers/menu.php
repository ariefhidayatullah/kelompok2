<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        $this->load->view('menu/index');
    }

    public function view()
    {
        $this->load->view('menu/services');
    }
}
