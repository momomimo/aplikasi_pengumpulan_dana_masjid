<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_pesan', 'pesan');
        $this->load->model('model_perusahaan', 'perusahaan');
    }
    public function index()
    {
        $d['title'] = "Hubungi Kami";
        $d['konten'] = "kontak";
        $d['header'] = 0;

        $d['dataperusahaan'] = $this->perusahaan->dataperusahaan();
        $d['datakontak'] = $this->perusahaan->datakontak();

        $d['company'] = "Hubungi Kami";
        $d['deskrip'] = "Dengan senang hati Kami menjawab semua pertanyaan Anda dan bekerja bersama!";



        $this->load->view('template/home', $d);
    }

    public function sendpesan()
    {
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'tls://smtp.gmail.com',
            'smtp_user' => 'fajasentraindonesia@gmail.com',  // Email gmail
            'smtp_pass'   => 'faja2014',  // Password gmail
            'smtp_port'   => 587,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $tgl = date('Y-m-d');
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'kategori' => $this->input->post('kategori'),
            'judul' => $this->input->post('judul'),
            'pesan' => $this->input->post('pesan'),
            'tanggal' => $tgl,
            'status' => 0
        ];
        if ($hasil = $this->pesan->tambahdata($data) > 0) {
            $this->load->library('email', $config);
            $this->email->from('fajasentraindonesia@gmail.com', 'Faja Sentral Indonesia');
            $this->email->to('mimow.aja@gmail.com, heryagungprasetyo@yahoo.co.id, csfaja02@gmail.com');
            $this->email->subject('Notifikasi Pesan Baru | www.ppobfsi.com');
            $this->email->message("Ada Pesan baru nih, Mohon dibantu Cek Ya..!!!.<br>
            <br> Klik <strong><a href='https://www.fsi.com/admin/kp' target='_blank' rel='noopener'>disini</a></strong> untuk melihat pesannya.");
            $this->email->send();

            $this->session->set_flashdata('pesan', 'sendpesan');
            redirect('kontak');
        } else {
            $this->session->set_flashdata('pesan', 'gagal');
            redirect('kontak');
        }
    }

    public function test()
    {
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "sendmail";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "fajasentraindonesia@gmail.com";
        $config['smtp_pass'] = "faja2014";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $ci->email->initialize($config);

        $ci->email->from('fajasentraindonesia@gmail.com', 'Blabla');
        $list = array('mimow.aja@gmail.com');
        $ci->email->to($list);
        $this->email->reply_to('fajasentraindonesia@gmail.com', 'Explendid Videos');
        $ci->email->subject('This is an email test');
        $ci->email->message('It is working. Great!');
        $ci->email->send();
    }
}
