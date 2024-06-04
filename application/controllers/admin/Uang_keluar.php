<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_keluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        #notifikasi

        $this->load->model('model_profil', 'profil');
        $this->load->model('model_uang_keluar', 'uang_keluar');
        $this->load->model('model_uang_masuk', 'uang_masuk');
    }
    public function index()
    {
        #kelola session login
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;


        $d['get_profil'] = $this->profil->profil();
        $d['nav1'] = "Rekapitulasi";
        $d['title'] = "Uang Keluar";
        $d['company'] = $d['get_profil'][0]['nama_perusahaan'];
        $d['konten'] = "uang_keluar";

        $d['get_donatur'] = $this->uang_masuk->get_data();
        $d['get_data_sukarela'] = $this->uang_masuk->get_data_sukarela();

        $d['get_total_keluar'] = $this->uang_keluar->total_masuk();
        $d['get_uang_keluar'] = $this->uang_keluar->get_uang_keluar();
        $d['get_data'] = $this->uang_keluar->get_data();
        $d['get_data_sukarela'] = $this->uang_keluar->get_data_sukarela();

        #Keamanan Login Session dan hak ases akun
        if ($this->session->userdata('logged_in') and $role == 'Administrator') {
            $this->load->view('admin/template/home', $d);
        } else {
            redirect('admin/login/kick');
        }
    }

    function tambah_data()
    {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;
        $d['hak_akses'] = $role;
        $d['nama_user'] = $nama_user;

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {

            $data = [
                'tanggal' => $this->input->post('tanggal') . " " . date('H:i:s'),
                'keterangan' => $this->input->post('keterangan', true),
                'bukti_acara' => $this->input->post('bukti_acara', true),
                'status_keluar' => "1",
                'operator' => $nama_user,
                'nominal' => preg_replace("/[^0-9]/", "", $this->input->post('nominal', true)),
            ];
            // var_dump($data);
            if ($hasil = $this->uang_keluar->tambah_data($data) > 0) {
                $this->session->set_flashdata('pesan', 'simpan');
                redirect('admin/uang_keluar/');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/uang_keluar/');
            }
        } else {
            $this->session->unset_userdata('logged_in');
            $this->session->set_flashdata('pesan', 'aksestidakdizinkan');
            redirect('admin/login/kick');
        }
    }
    function edit_data()
    {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;
        $d['hak_akses'] = $role;
        $d['nama_user'] = $nama_user;

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {

            $kode_donatur = $this->input->post('id_uang_keluar', true);
            $data = [
                'tanggal' => $this->input->post('tanggal') . " " . date('H:i:s'),
                'keterangan' => $this->input->post('keterangan', true),
                'bukti_acara' => $this->input->post('bukti_acara', true),
                'status_keluar' => "1",
                'operator' => $nama_user,
                'nominal' => preg_replace("/[^0-9]/", "", $this->input->post('nominal', true)),
            ];
            // var_dump($data);
            if ($hasil = $this->uang_keluar->edit_data($data, $kode_donatur) > 0) {
                $this->session->set_flashdata('pesan', 'rubah');
                redirect('admin/uang_keluar/');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/uang_keluar/');
            }
        } else {
            $this->session->unset_userdata('logged_in');
            $this->session->set_flashdata('pesan', 'aksestidakdizinkan');
            redirect('admin/login/kick');
        }
    }
    function hapus_data()
    {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;
        $d['hak_akses'] = $role;
        $d['nama_user'] = $nama_user;

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {

            $kode_donatur = $this->input->post('id_uang_keluar', true);
            // var_dump($data);
            if ($hasil = $this->uang_keluar->hapus_data($kode_donatur) > 0) {
                $this->session->set_flashdata('pesan', 'simpan');
                redirect('admin/uang_keluar/');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/uang_keluar/');
            }
        } else {
            $this->session->unset_userdata('logged_in');
            $this->session->set_flashdata('pesan', 'aksestidakdizinkan');
            redirect('admin/login/kick');
        }
    }
}
