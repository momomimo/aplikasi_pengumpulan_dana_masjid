<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		#notifikasi

		$this->load->model('model_profil', 'profil');
		$this->load->model('model_login', 'login');
	}
	public function index()
	{

		if (!empty($this->session->userdata('logged_in'))) {
			$role['hak_akses'] = $this->session->userdata('logged_in');
			if ($role['hak_akses']->hak_akses == "Administrator") {
				$this->session->set_flashdata('pesan', 'login');
				redirect('admin/home', 'refresh');
			}
			//  elseif ($role['hak_akses']->hak_akses == "Customer") {
			// 	$this->session->set_flashdata('pesan', 'login');
			// 	redirect('admin/cs/home', 'refresh');
			// } elseif ($role['hak_akses']->hak_akses == "Marketing") {
			// 	$this->session->set_flashdata('pesan', 'login');
			// 	redirect('admin/sales/home', 'refresh');
			// }
		} else {
			// #kelola Database
			$d['get_profil'] = $this->profil->profil();
			// #detail
			$d['title'] = "Login System";
			$d['company'] = $d['get_profil'][0]['nama_perusahaan'];
			$this->load->view('admin/login', $d);
		}
	}
	public function getLogin()
	{
		$username = $this->input->post('username', true);
		$password = sha1($this->input->post('password', true));
		$hasil = $this->login->cekLogin($username, $password);
		if ($hasil = $this->login->cekLogin($username, $password) > 0) {
			$data['hasil'] = $hasil;
			if ($data['hasil'] == null) {
				$data['cek'] = '0';
				$this->load->view('admin/login', $data);
			} else {
				$this->session->set_flashdata('pesan', 'gagallogin');
				redirect('admin/login');
			}
		} else {
			$this->session->set_flashdata('pesan', 'gagallogin');
			redirect('admin/login');
		}
	}

	public function logout()
	{

		$this->session->unset_userdata('logged_in', FALSE);
		$this->session->set_flashdata('pesan', 'logout');
		redirect('admin/login', 'refresh');
	}
	public function kick()
	{
		$this->session->unset_userdata('logged_in');

		$this->session->set_flashdata('pesan', 'aksestidakdizinkan');
		redirect('admin/login');
	}
}
