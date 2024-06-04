<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		#notifikasi

		$this->load->model('model_profil', 'profil');
		$this->load->model('model_home', 'home');
		$this->load->model('model_uang_masuk', 'uang_masuk');
		$this->load->model('model_uang_keluar', 'uang_keluar');
	}
	public function index()
	{
		#kelola session login
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->hak_akses;
		$nama_user = $session['hasil']->nama_user;


		$d['get_profil'] = $this->profil->profil();
		$d['title'] = "Halaman Utama";
		$d['company'] = $d['get_profil'][0]['nama_perusahaan'];
		$d['konten'] = "homepage";


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
		$d['get_data_masuk'] = $this->uang_masuk->get_uang_masuk_all();
		$d['get_data_keluar'] = $this->uang_keluar->get_uang_keluar();


		$this->load->view('admin/template/home', $d);
	}
	function tambah_data()
	{

		$kode_donatur = "SKR" . date('hyimsd');
		$nowa = preg_replace("/[^0-9]/", "", $this->input->post('no_admin', true));
		$nominal = preg_replace("/[^0-9]/", "", $this->input->post('nominal', true));
		$nominal2 = number_format($nominal, 0, ',', ',');
		$nama_donatur = $this->input->post('nama_donatur', true);

		if (empty($nama_donatur)) {
			$nama_donatur = "Hamba Allah";
		}

		$config['upload_path']          = './assets/upload/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['overwrite']            = TRUE;
		$config['max_size']             = 1000;
		$config['file_name']            = 'bukti_tf' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('bukti_tf')) {
			$this->session->set_flashdata('pesan', 'gagal');
			redirect('homepage');
		} else {
			$gambar = $this->upload->data();
			$file = $gambar['file_name'];
			$data = [
				'donatur_kode' => $kode_donatur,
				'tanggal' => $this->input->post('tanggal') . " " . date('H:i:s'),
				'keterangan' => $this->input->post('keterangan', true),
				'via' => $this->input->post('via', true),
				'bukti_tf' => $file,
				'status_masuk' => "0",
				'operator' => "",
				'nominal' => $nominal,
			];
			$data2 = [
				'kode_donatur' => $kode_donatur,
				'nama_donatur' => $nama_donatur,
				'alamat_donatur' => $this->input->post('alamat_donatur', true),
				'nowa' => preg_replace("/[^0-9]/", "", $this->input->post('nowa', true)),
				'status' => 1,
			];
			// var_dump($data);
			if ($hasil = $this->home->tambah_data($data, $data2) > 0) {
				$this->session->set_flashdata('pesan', 'donatur');
				$body = array(
					"api_key" => "a946e2cded62264e753e838ea9738f672d874695",
					"receiver" => $nowa,
					"data" => array("message" => "Perhatian! Ada konfirmasi donasi Sebesar Rp. $nominal2 melalui transfer Bank BNI oleh Bapak/Ibu $nama_donatur, harap segera dilakukan proses pengecakan rekening Bank. Terima Kasih ")
				);
				$curl = curl_init();
				curl_setopt_array($curl, [
					CURLOPT_URL => "https://wa.fajasentra.com/api/send-message",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_POSTFIELDS => json_encode($body),
					CURLOPT_HTTPHEADER => [
						"Accept: */*",
						"Content-Type: application/json",
					],
				]);
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
				redirect('homepage/');
			} else {
				$this->session->set_flashdata('pesan', 'gagal');
				redirect('homepage');
			}
		}
	}
}
