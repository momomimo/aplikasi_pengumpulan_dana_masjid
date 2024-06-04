<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		#notifikasi

		$this->load->model('model_profil', 'profil');
		$this->load->model('model_home', 'home');
		$this->load->model('model_uang_masuk', 'uang_masuk');
	}
	public function index()
	{
		#kelola session login
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->hak_akses;
		$nama_user = $session['hasil']->nama_user;


		$d['get_profil'] = $this->profil->profil();
		$d['title'] = "Dashboard";
		$d['company'] = $d['get_profil'][0]['nama_perusahaan'];
		$d['konten'] = "dashboard";

		$d['nav1'] = "Dashboard";
		$d['nav2'] = "Console";
		$d['nav3'] = "";
		$bulan = date('Y-m-d');
		$d['tahun_lalu'] = date('Y', strtotime('-1' . ' ' . 'years', strtotime($bulan)));
		$d['get_donatur'] = $this->uang_masuk->get_data();
		$d['get_data_sukarela'] = $this->uang_masuk->get_data_sukarela();
		$d['get_total_donatur'] = $this->home->total_donatur();
		$d['get_total_donatur_sk'] = $this->home->total_donatur_sk();
		$d['get_total_masuk'] = $this->home->total_masuk();
		$d['get_total_keluar'] = $this->home->total_keluar();
		$d['get_total_konfirmasi'] = $this->home->total_konfirmasi();
		$d['get_total_konfirmasi_sk'] = $this->home->total_konfirmasi_sk();

		#Keamanan Login Session dan hak ases akun
		if ($this->session->userdata('logged_in') and $role == 'Administrator') {
			$this->load->view('admin/template/home', $d);
		} else {
			redirect('admin/login/kick');
		}
	}
}
