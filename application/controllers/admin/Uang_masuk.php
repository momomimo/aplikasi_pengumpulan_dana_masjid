<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_masuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        #notifikasi

        $this->load->model('model_profil', 'profil');
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
        $d['title'] = "Uang Masuk";
        $d['company'] = $d['get_profil'][0]['nama_perusahaan'];
        $d['konten'] = "uang_masuk";
        $d['get_donatur'] = $this->uang_masuk->get_data();

        $d['get_total_masuk'] = $this->uang_masuk->total_masuk();
        $d['get_uang_masuk'] = $this->uang_masuk->get_uang_masuk();
        $d['get_data'] = $this->uang_masuk->get_data();
        $d['get_data_sukarela'] = $this->uang_masuk->get_data_sukarela();

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
            $kode_donatur = $this->input->post('kode_donatur', true);
            $get_data = $this->uang_masuk->get_data_id($kode_donatur);
            $nama_donatur = $get_data[0]['nama_donatur'];
            $nowa = $get_data[0]['nowa'];
            $nominal = preg_replace("/[^0-9]/", "", $this->input->post('nominal', true));
            $nominal2 = number_format($nominal, 0, ',', ',');
            $data = [
                'donatur_kode' => $this->input->post('kode_donatur', true),
                'tanggal' => $this->input->post('tanggal') . " " . date('H:i:s'),
                'keterangan' => $this->input->post('keterangan', true),
                'via' => $this->input->post('via', true),
                'bukti_tf' => "",
                'status_masuk' => "1",
                'operator' => $nama_user,
                'nominal' => $nominal,
            ];
            // var_dump($data);
            if ($hasil = $this->uang_masuk->tambah_data($data) > 0) {
                $this->session->set_flashdata('pesan', 'simpan');

                $body = array(
                    "api_key" => "a946e2cded62264e753e838ea9738f672d874695",
                    "receiver" => $nowa,
                    "data" => array("message" => "Pembayaran Sebesar Rp. $nominal2 telah berhasil tersimpan. Terima Kasih Bapak/Ibu $nama_donatur sudah ikut berpartisipasi Pengajian Akbar PPAK STNYEL 2025. ")
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

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    echo $response;
                }
                redirect('admin/uang_masuk/');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/uang_masuk/');
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

            $kode_donatur = $this->input->post('id_uang_masuk', true);
            $data = [
                'donatur_kode' => $this->input->post('kode_donatur', true),
                'tanggal' => $this->input->post('tanggal') . " " . date('H:i:s'),
                'keterangan' => $this->input->post('keterangan', true),
                'via' => $this->input->post('via', true),
                'bukti_tf' => "",
                'status_masuk' => "1",
                'operator' => $nama_user,
                'nominal' => preg_replace("/[^0-9]/", "", $this->input->post('nominal', true)),
            ];
            // var_dump($data);
            if ($hasil = $this->uang_masuk->edit_data($data, $kode_donatur) > 0) {
                $this->session->set_flashdata('pesan', 'rubah');
                redirect('admin/uang_masuk/');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/uang_masuk/');
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

            $kode_donatur = $this->input->post('id_uang_masuk', true);
            // var_dump($data);
            if ($hasil = $this->uang_masuk->hapus_data($kode_donatur) > 0) {
                $this->session->set_flashdata('pesan', 'simpan');
                redirect('admin/uang_masuk/');
            } else {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect('admin/uang_masuk/');
            }
        } else {
            $this->session->unset_userdata('logged_in');
            $this->session->set_flashdata('pesan', 'aksestidakdizinkan');
            redirect('admin/login/kick');
        }
    }
}
