<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_donatur extends CI_Model
{

    public function total_donatur()
    {
        $this->db->order_by('id_donatur', 'desc');
        return $this->db->get('tb_donatur')->num_rows();
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
    public function get_layanan($id)
    {
        $this->db->where('id_layanan', $id);
        $this->db->order_by('id_layanan', 'asc');
        return $this->db->get('tb_layanan')->result_array();
    }
    public function tambah_data($data)
    {
        $this->db->insert('tb_donatur', $data);
        return $this->db->affected_rows();
    }
    public function edit_data($data, $id)
    {
        $this->db->update('tb_donatur', $data, ['kode_donatur' => $id]);

        return $this->db->affected_rows();
    }
    public function hapus_data($id)
    {
        $this->db->delete('tb_donatur', ['kode_donatur' => $id]);

        return $this->db->affected_rows();
    }
}
