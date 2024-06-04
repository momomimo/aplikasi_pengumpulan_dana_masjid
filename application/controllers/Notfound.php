<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		#notifikasi
		
		$this->load->model('model_profil', 'profil');
		
		
	}
	public function index()
	{
		$d['get_profil'] = $this->profil->profil();
        $d['title'] = "Home";
        $d['company'] = $d['get_profil'][0]['nama_perusahaan'];

		$this->load->view('404error',$d);
	}
}
