<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donatur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        #notifikasi

        $this->load->model('model_profil', 'profil');
        $this->load->model('model_donatur', 'donatur');
        $this->load->model('model_uang_masuk', 'uang_masuk');
    }
    public function index()
    {
        #kelola session login
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;


        $d['get_profil'] = $this->profil->profil();
        $d['nav1'] = "Master Data";
        $d['title'] = "Data Donatur";
        $d['company'] = $d['get_profil'][0]['nama_perusahaan'];
        $d['konten'] = "donatur_data";

        $d['get_donatur'] = $this->uang_masuk->get_data();
        $d['get_data_sukarela'] = $this->uang_masuk->get_data_sukarela();
        $d['get_data'] = $this->donatur->get_data();

        #Keamanan Login Session dan hak ases akun
        if ($this->session->userdata('logged_in') and $role == 'Administrator') {
            $this->load->view('admin/template/home', $d);
        } else {
            redirect('admin/login/kick');
        }
    }

    function tambah_donatur()
    {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;
        $d['hak_akses'] = $role;
        $d['nama_user'] = $nama_user;

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {

            $data = [
                'kode_donatur' => $this->input->post('kode_donatur', true),
                'nama_donatur' => $this->input->post('nama_donatur', true),
                'alamat_donatur' => $this->input->post('alamat_donatur', true),
                'nowa' => preg_replace("/[^0-9]/", "", $this->input->post('nowa', true)),
                'wajib' => preg_replace("/[^0-9]/", "", $this->input->post('rupiah', true)),
            ];
            // var_dump($data);
            if ($hasil = $this->donatur->tambah_data($data) > 0) {
                $this->session->set_flashdata('pesan', 'simpan');
                redirect('admin/donatur/');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/donatur/');
            }
        } else {
            $this->session->unset_userdata('logged_in');
            $this->session->set_flashdata('pesan', 'aksestidakdizinkan');
            redirect('admin/login/kick');
        }
    }
    function edit_donatur()
    {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;
        $d['hak_akses'] = $role;
        $d['nama_user'] = $nama_user;

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {

            $kode_donatur = $this->input->post('kode_donatur', true);
            $data = [
                'kode_donatur' => $this->input->post('kode_donatur', true),
                'nama_donatur' => $this->input->post('nama_donatur', true),
                'alamat_donatur' => $this->input->post('alamat_donatur', true),
                'nowa' => preg_replace("/[^0-9]/", "", $this->input->post('nowa', true)),
                'wajib' => preg_replace("/[^0-9]/", "", $this->input->post('rupiah', true)),
            ];
            // var_dump($data);
            if ($hasil = $this->donatur->edit_data($data, $kode_donatur) > 0) {
                $this->session->set_flashdata('pesan', 'simpan');
                redirect('admin/donatur/');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/donatur/');
            }
        } else {
            $this->session->unset_userdata('logged_in');
            $this->session->set_flashdata('pesan', 'aksestidakdizinkan');
            redirect('admin/login/kick');
        }
    }
    function hapus_donatur()
    {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;
        $d['hak_akses'] = $role;
        $d['nama_user'] = $nama_user;

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {

            $kode_donatur = $this->input->post('kode_donatur', true);
            // var_dump($data);
            if ($hasil = $this->donatur->hapus_data($kode_donatur) > 0) {
                $this->session->set_flashdata('pesan', 'simpan');
                redirect('admin/donatur/');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/donatur/');
            }
        } else {
            $this->session->unset_userdata('logged_in');
            $this->session->set_flashdata('pesan', 'aksestidakdizinkan');
            redirect('admin/login/kick');
        }
    }
    public function lain()
    {
        #kelola session login
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;


        $d['get_profil'] = $this->profil->profil();
        $d['nav1'] = "Master Data";
        $d['title'] = "Data Donatur Sukarela";
        $d['company'] = $d['get_profil'][0]['nama_perusahaan'];
        $d['konten'] = "donatur_lain";


        $d['get_data'] = $this->donatur->get_data_sukarela();

        #Keamanan Login Session dan hak ases akun
        if ($this->session->userdata('logged_in') and $role == 'Administrator') {
            $this->load->view('admin/template/home', $d);
        } else {
            redirect('admin/login/kick');
        }
    }
    function tambah_sukarela()
    {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;
        $d['hak_akses'] = $role;
        $d['nama_user'] = $nama_user;

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {

            $data = [
                'kode_donatur' => $this->input->post('kode_donatur', true),
                'nama_donatur' => $this->input->post('nama_donatur', true),
                'alamat_donatur' => $this->input->post('alamat_donatur', true),
                'nowa' => preg_replace("/[^0-9]/", "", $this->input->post('nowa', true)),
                'status' => 1,
            ];
            // var_dump($data);
            if ($hasil = $this->donatur->tambah_data($data) > 0) {
                $this->session->set_flashdata('pesan', 'simpan');
                redirect('admin/donatur/lain');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/donatur/lain');
            }
        } else {
            $this->session->unset_userdata('logged_in');
            $this->session->set_flashdata('pesan', 'aksestidakdizinkan');
            redirect('admin/login/kick');
        }
    }
    function edit_donatur_sukarela()
    {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;
        $d['hak_akses'] = $role;
        $d['nama_user'] = $nama_user;

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {

            $kode_donatur = $this->input->post('kode_donatur', true);
            $data = [
                'kode_donatur' => $this->input->post('kode_donatur', true),
                'nama_donatur' => $this->input->post('nama_donatur', true),
                'alamat_donatur' => $this->input->post('alamat_donatur', true),
                'nowa' => preg_replace("/[^0-9]/", "", $this->input->post('nowa', true)),
                'status' => 1,
            ];
            // var_dump($data);
            if ($hasil = $this->donatur->edit_data($data, $kode_donatur) > 0) {
                $this->session->set_flashdata('pesan', 'simpan');
                redirect('admin/donatur/lain');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/donatur/lain');
            }
        } else {
            $this->session->unset_userdata('logged_in');
            $this->session->set_flashdata('pesan', 'aksestidakdizinkan');
            redirect('admin/login/kick');
        }
    }
    function hapus_donatur_sukarela()
    {
        $session['hasil'] = $this->session->userdata('logged_in');
        $role = $session['hasil']->hak_akses;
        $nama_user = $session['hasil']->nama_user;
        $d['hak_akses'] = $role;
        $d['nama_user'] = $nama_user;

        if ($this->session->userdata('logged_in') and $role == 'Administrator') {

            $kode_donatur = $this->input->post('kode_donatur', true);
            // var_dump($data);
            if ($hasil = $this->donatur->hapus_data($kode_donatur) > 0) {
                $this->session->set_flashdata('pesan', 'simpan');
                redirect('admin/donatur/lain');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/donatur/lain');
            }
        } else {
            $this->session->unset_userdata('logged_in');
            $this->session->set_flashdata('pesan', 'aksestidakdizinkan');
            redirect('admin/login/kick');
        }
    }
}
