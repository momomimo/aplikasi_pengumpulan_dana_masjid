<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_profil extends CI_Model
{
    public function profil()
    {
        return $this->db->get('tb_profil')->result_array();
    }
    public function panduan()
    {
        return $this->db->get('tb_panduan')->result_array();
    }
    public function update_data($id, $data)
    {
        $this->db->update('tb_profil', $data, ['id' => $id]);

        return $this->db->affected_rows();
    }
    public function update_icon($id, $data)
    {
        $this->db->update('tb_profil', ['icon'=>$data], ['id' => $id]);

        return $this->db->affected_rows();
    }
    public function update_logo($id, $data)
    {
        $this->db->update('tb_profil', ['logo'=>$data], ['id' => $id]);

        return $this->db->affected_rows();
    }
    public function update_head($id,$header,$desk_header,$footer)
    {
        $this->db->update('tb_profil', ['header'=>$header,'desk_header'=>$desk_header,'footer'=>$footer], ['id' => $id]);

        return $this->db->affected_rows();
    }
    public function update_visi($id,$visi,$misi,$deskripsi)
    {
        $this->db->update('tb_profil', ['visi'=>$visi,'misi'=>$misi,'deskripsi'=>$deskripsi], ['id' => $id]);

        return $this->db->affected_rows();
    }
    public function update_medsos($id,$ig,$tw,$fb,$yt,$linkedin)
    {
        $this->db->update('tb_profil', ['ig'=>$ig,'tw'=>$tw,'fb'=>$fb,'yt'=>$yt,'linkedin'=>$linkedin], ['id' => $id]);

        return $this->db->affected_rows();
    }
    public function update_info($id,$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11)
    {
        $this->db->update('tb_profil', ['nama_perusahaan'=>$a1,'singkatan'=>$a2,'slogan'=>$a3,'tahun_diri'=>$a4,'kantor_pusat'=>$a5,'alamat_lengkap'=>$a6,'email'=>$a7,'telp_kantor'=>$a8,'nohp_kantor'=>$a9,'maps'=>$a10,'jam'=>$a11], ['id' => $id]);

        return $this->db->affected_rows();
    }
}
