<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_home extends CI_Model
{
    public function total_donatur()
    {
        $this->db->where('status', "0");
        $this->db->order_by('id_donatur', 'desc');
        return $this->db->get('tb_donatur')->num_rows();
    }
    public function total_donatur_sk()
    {
        $this->db->where('status', "1");
        $this->db->order_by('id_donatur', 'desc');
        return $this->db->get('tb_donatur')->num_rows();
    }
    public function total_konfirmasi()
    {
        $this->db->where('status', "0");
        $this->db->where('status_masuk', "0");
        $this->db->limit(3);
        return $this->db->get('view_masuk')->result_array();
    }
    public function total_konfirmasi_sk()
    {
        $this->db->where('status', "1");
        $this->db->where('status_masuk', "0");
        $this->db->limit(2);
        return $this->db->get('view_masuk')->result_array();
    }
    public function total_masuk()
    {
        $this->db->select_sum('nominal');
        $this->db->where('status_masuk', "1");
        return $this->db->get('view_masuk')->result_array();
    }
    public function total_keluar()
    {
        $this->db->select_sum('nominal');
        return $this->db->get('tb_uang_keluar')->result_array();
    }
    public function get_layanan($id)
    {
        $this->db->where('id_layanan', $id);
        $this->db->order_by('id_layanan', 'asc');
        return $this->db->get('tb_layanan')->result_array();
    }
    public function get_produk()
    {
        $this->db->select('foto_produk');
        $this->db->from('tb_produk_foto');
        $this->db->limit(6);
        $this->db->order_by('id_produk_foto', 'desc');
        return $this->db->get()->result_array();
    }
    public function get_layanan_all()
    {
        $this->db->order_by('id_layanan', 'desc');
        return $this->db->get('tb_layanan')->result_array();
    }
    public function get_produk_all()
    {
        $this->db->order_by('id_produk', 'desc');
        return $this->db->get('tb_produk')->result_array();
    }
    public function get_produk_id($id)
    {
        $this->db->where("kategori_id", $id);
        $this->db->order_by('nama_produk', 'desc');
        return $this->db->get('tb_produk')->result_array();
    }
    public function get_testimoni()
    {
        $this->db->limit(6);
        $this->db->order_by('id_testimoni', 'desc');
        return $this->db->get('tb_testimoni')->result_array();
    }
    public function get_testimoni_all()
    {
        $this->db->order_by('id_testimoni', 'desc');
        return $this->db->get('tb_testimoni')->result_array();
    }
    public function get_faq()
    {
        return $this->db->get('tb_faq')->result_array();
    }
    public function get_galeri()
    {
        $this->db->limit(10);
        $this->db->order_by('id_galeri', 'desc');
        return $this->db->get('tb_galeri')->result_array();
    }
    public function get_galeri_all()
    {
        $this->db->order_by('id_galeri', 'desc');
        return $this->db->get('tb_galeri')->result_array();
    }
    public function get_struktur()
    {
        $this->db->order_by('urutan', 'asc');
        return $this->db->get('tb_struktur')->result_array();
    }
    public function get_projek()
    {
        $this->db->order_by('id_projek', 'desc');
        return $this->db->get('tb_projek')->result_array();
    }
    public function get_projek_limit()
    {
        $this->db->limit(3);
        $this->db->order_by('id_projek', 'desc');
        return $this->db->get('tb_projek')->result_array();
    }
    public function get_projek_done($id = null)
    {
        if ($id == "total") {
            $this->db->where('status_projek', 2);
            $this->db->order_by('id_projek', 'desc');
            return $this->db->get('tb_projek')->num_rows();
        } else {
            $this->db->where('status_projek', 2);
            $this->db->order_by('id_projek', 'desc');
            return $this->db->get('tb_projek')->result_array();
        }
    }
    public function get_projek_progress($id = null)
    {
        if ($id == "total") {
            $this->db->where('status_projek', 1);
            $this->db->order_by('id_projek', 'desc');
            return $this->db->get('tb_projek')->num_rows();
        } else {
            $this->db->where('status_projek', 1);
            $this->db->order_by('id_projek', 'desc');
            return $this->db->get('tb_projek')->result_array();
        }
    }
    public function get_berita_kategori($id = null)
    {
        if (!empty($id)) {
            $this->db->where('kategori', $id);
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->result_array();
        } else {
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->result_array();
        }
    }
    public function get_berita_total($id = null)
    {
        if (!empty($id)) {
            $this->db->where('kategori', $id);
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->num_rows();
        } else {
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->num_rows();
        }
    }
    public function get_berita($id = null)
    {
        if (!empty($id)) {
            $this->db->where('id_berita', $id);
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->result_array();
        } else {
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->result_array();
        }
    }
    public function get_berita_limit()
    {
        $this->db->limit(3);
        $this->db->order_by('id_berita', 'desc');
        return $this->db->get('tb_berita')->result_array();
    }

    public function tambah_data($data, $data2)
    {
        $this->db->insert('tb_donatur', $data2);
        $this->db->insert('tb_uang_masuk', $data);
        return $this->db->affected_rows();
    }
}
