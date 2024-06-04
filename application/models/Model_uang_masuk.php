<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_uang_masuk extends CI_Model
{

    public function total_masuk()
    {
        $this->db->select_sum('nominal');
        $this->db->where('status_masuk', "1");
        return $this->db->get('view_masuk')->result_array();
    }
    public function get_data_id($id)
    {
        $this->db->where('kode_donatur', $id);
        return $this->db->get('tb_donatur')->result_array();
    }
    public function get_data()
    {
        $this->db->where('status', "0");
        $this->db->order_by('id_donatur', 'desc');
        return $this->db->get('tb_donatur')->result_array();
    }
    public function get_data_sukarela()
    {
        $this->db->where('status', "1");
        $this->db->order_by('id_donatur', 'desc');
        return $this->db->get('tb_donatur')->result_array();
    }
    public function get_uang_masuk()
    {
        $this->db->where('status_masuk', "1");
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('view_masuk')->result_array();
    }
    public function get_uang_masuk_all()
    {
        $this->db->where('status_masuk', "1");
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('view_masuk')->result_array();
    }
    public function get_uang_masuk_konfirmasi()
    {
        $this->db->where('status_masuk', "0");
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get('view_masuk')->result_array();
    }
    public function get_uang_masuk_id($id)
    {
        $this->db->where('donatur_kode', $id);
        return $this->db->get('view_masuk')->result_array();
    }
    public function tambah_data($data)
    {
        $this->db->insert('tb_uang_masuk', $data);
        return $this->db->affected_rows();
    }
    public function edit_data($data, $id)
    {
        $this->db->update('tb_uang_masuk', $data, ['id_uang_masuk' => $id]);

        return $this->db->affected_rows();
    }
    public function hapus_data($id)
    {
        $this->db->delete('tb_uang_masuk', ['id_uang_masuk' => $id]);

        return $this->db->affected_rows();
    }
}
