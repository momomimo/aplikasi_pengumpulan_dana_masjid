<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_data extends CI_Model
{
    public function get_setoran_bulan($periode)
    {
        $this->db->select('*');
        $this->db->from('tb_setoran_harian');
        $this->db->where("DATE_FORMAT(tanggal_setoran,'%Y-%m')", $periode);
        $this->db->where("setoran !=", 0);
        $this->db->order_by('tanggal_setoran','desc');
        return $this->db->get()->result_array();
    }
    public function get_transaksi_bulan($periode)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi_harian');
        $this->db->where("DATE_FORMAT(tanggal_transaksi,'%Y-%m')", $periode);
        $this->db->where("lembar !=", 0);
        $this->db->order_by('tanggal_transaksi','desc');
        return $this->db->get()->result_array();
    }
    public function get_users($haka)
    {
        return $this->db->get_where('tb_users',['hak_akses' => $haka])->result_array();
    }
    public function get_total_users($haka)
    {
        return $this->db->get_where('tb_users',['hak_akses' => $haka])->num_rows();
    }
    public function get_loket_aktif()
    {
        
        return $this->db->get('view_loket_aktif')->result_array();
    }
     public function get_loket_aktif_rekening()
    {
        $this->db->select('*');
        $this->db->from('tb_rek_loket');
        $this->db->join('tb_terminal', 'tb_terminal.kode_terminal = tb_rek_loket.terminal_kode','right');
        $this->db->order_by('rekon','ASC');
        // $this->db->where('tb_rek_loket.no_rek IS NULL', null);
        return $this->db->get()->result_array();
    }
    public function get_loket_aktif_cari()
    {
        $this->db->order_by('nama_pp','asc');
        return $this->db->get('view_loket_aktif')->result();
    }
    public function cek_users($username)
	{
		$result=$this->db->get_where('tb_users',['username' => $username])->num_rows();

		if ($result > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
    }
    public function cek_setoran($tanggal,$kode_terminal,$setoran)
	{
		$result=$this->db->get_where('view_setoran',['tanggal_setoran' => $tanggal,'kode_terminal' => $kode_terminal, 'setoran' => $setoran])->num_rows();

		if ($result > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
    }
    public function tambah_users($data)
    {
        $this->db->insert('tb_users', $data);
        return $this->db->affected_rows();
    }
    public function update_users($id, $data)
    {
        $this->db->update('tb_users', $data, ['id_users' => $id]);

        return $this->db->affected_rows();
    }
    public function reset_users($id, $data)
    {
        $this->db->update('tb_users', ['status' => $data], ['id_users' => $id]);

        return $this->db->affected_rows();
    }
    public function reset_pass_users($id, $data)
    {
        $this->db->update('tb_users', ['password' => $data], ['id_users' => $id]);

        return $this->db->affected_rows();
    }
    public function hapus_users($id)
    {
        $this->db->delete('tb_users', ['id_users' => $id]);

        return $this->db->affected_rows();
    }
    public function get_bank()
    {
        return $this->db->get('tb_bank')->result_array();
    }
    public function get_total_bank()
    {
        return $this->db->get('tb_bank')->num_rows();
    }
    public function tambah_bank($data)
    {
        $this->db->insert('tb_bank', $data);
        return $this->db->affected_rows();
    }
    public function hapus_bank($id)
    {
        $this->db->delete('tb_bank', ['id' => $id]);

        return $this->db->affected_rows();
    }
    public function get_terminal()
    {
        $this->db->select('*');
        $this->db->from('tb_terminal');
        $this->db->join('tb_app_bank', 'tb_app_bank.kode_app_bank = tb_terminal.app_bank');
        $this->db->order_by('rekon','asc');
        $this->db->order_by('app_bank','asc');
        return $this->db->get()->result_array();
    }
    public function get_terminal_id($id)
    {
        $this->db->select('*');
        $this->db->from('tb_terminal');
        $this->db->join('tb_app_bank', 'tb_app_bank.kode_app_bank = tb_terminal.app_bank');
        $this->db->where('kode_terminal',$id);
        $this->db->order_by('rekon','asc');
        $this->db->order_by('app_bank','asc');
        return $this->db->get()->result_array();
    }
    public function get_terminal_rekon()
    {
        $this->db->select('*');
        $this->db->from('tb_terminal');
        $this->db->order_by('rekon','asc');
        $this->db->group_by('rekon');
        return $this->db->get()->result_array();
    }
    public function get_terminal_rekon_id($id)
    {
        $this->db->select('*');
        $this->db->from('tb_terminal');
        $this->db->where('id_terminal', $id);
        $this->db->order_by('rekon','asc');
        $this->db->group_by('rekon');
        return $this->db->get()->result_array();
    }
    public function get_terminal_rekon_id2($id)
    {
        $this->db->select('*');
        $this->db->from('tb_terminal');
        $this->db->where('rekon', $id);
        $this->db->order_by('rekon','asc');
        return $this->db->get()->result_array();
    }
    
    public function get_terminal_loket()
    {
        $this->db->select('*');
        $this->db->from('tb_terminal');
        $this->db->order_by('rekon','asc');
        $this->db->group_by('kode_terminal');
        return $this->db->get()->result_array();
    }
    public function get_rekon()
    {
        $this->db->order_by('rekon','asc');
        $this->db->group_by('rekon');
        return $this->db->get('tb_terminal')->result_array();
    }
    public function get_terminal_loket_id($id)
    {
        $this->db->select('*');
        $this->db->from('tb_terminal');
        $this->db->where('kode_terminal',$id);
        $this->db->order_by('rekon','asc');
        $this->db->group_by('kode_terminal');
        return $this->db->get()->result_array();
    }
    public function get_view_klompok_id($id)
    {
        $this->db->select('*');
        $this->db->from('view_klompok');
        $this->db->where('kode_klompok',$id);
        $this->db->group_by('kode_terminal');
        return $this->db->get()->result_array();
    }
    public function get_view_terminal_id($id)
    {
        $this->db->select('kode_terminal');
        $this->db->from('view_klompok');
        $this->db->where('kode_klompok',$id);
        $this->db->group_by('kode_terminal');
        return $this->db->get()->result_object();
    }
    public function get_total_terminal()
    {
        return $this->db->get('tb_terminal')->num_rows();
    }
    public function upload_terminal($data)
    {
        $this->db->insert_batch('tb_terminal', $data);
        return $this->db->affected_rows();
    }
    public function tambah_terminal($data)
    {
        $this->db->insert('tb_terminal', $data);
        return $this->db->affected_rows();
    }
    public function hapus_terminal($id)
    {
        $this->db->delete('tb_terminal', ['id_terminal' => $id]);

        return $this->db->affected_rows();
    }
    public function edit_terminal($id, $data)
    {
        $this->db->update('tb_terminal', $data, ['id_terminal' => $id]);

        return $this->db->affected_rows();
    }
    public function get_app_bank()
    {
        $this->db->group_by('kode_app_bank');
        return $this->db->get('tb_app_bank')->result_array();
    }
    public function get_app_bank_id($id)
    {
        return $this->db->get_where('tb_app_bank',['kode_app_bank' => $id])->result_array();
    }
    public function get_total_app_bank()
    {
        return $this->db->get('tb_app_bank')->num_rows();
    }
    public function tambah_app_bank($data)
    {
        $this->db->insert('tb_app_bank', $data);
        return $this->db->affected_rows();
    }
    public function hapus_app_bank($id)
    {
        $this->db->delete('tb_app_bank', ['id_app_bank' => $id]);

        return $this->db->affected_rows();
    }
    public function edit_app_bank($id, $data)
    {
        $this->db->update('tb_app_bank', $data, ['id_app_bank' => $id]);

        return $this->db->affected_rows();
    }
    public function get_produk()
    {
        return $this->db->get('tb_produk')->result_array();
    }
    public function get_total_produk()
    {
        return $this->db->get('tb_produk')->num_rows();
    }
    public function tambah_produk($data)
    {
        $this->db->insert('tb_produk', $data);
        return $this->db->affected_rows();
    }
    public function hapus_produk($id)
    {
        $this->db->delete('tb_produk', ['id_produk' => $id]);

        return $this->db->affected_rows();
    }
    public function edit_produk($id, $data)
    {
        $this->db->update('tb_produk', $data, ['id_produk' => $id]);

        return $this->db->affected_rows();
    }
    public function get_produk_bank()
    {
        $this->db->select('*');
        $this->db->from('tb_produk_bank');
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_produk_bank.produk_id');
        $this->db->join('tb_app_bank', 'tb_app_bank.kode_app_bank = tb_produk_bank.app_bank_kode');
        $this->db->order_by("nama_app_bank", "asc");
        return $this->db->get()->result_array();
    }
    public function get_produk_bank_id($id)
    {
        $this->db->select('*');
        $this->db->from('tb_produk_bank');
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_produk_bank.produk_id');
        $this->db->join('tb_app_bank', 'tb_app_bank.kode_app_bank = tb_produk_bank.app_bank_kode');
        $this->db->where('kode_app_bank',$id);
        $this->db->order_by("nama_app_bank", "asc");
        return $this->db->get()->result_array();
    }
    public function get_produk_bank_id_klompok()
    {
        $this->db->select('*');
        $this->db->from('tb_produk_bank');
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_produk_bank.produk_id');
        $this->db->join('tb_app_bank', 'tb_app_bank.kode_app_bank = tb_produk_bank.app_bank_kode');
        $this->db->where_in('kode_app_bank',array('AG','RBS','BKP'));
        $this->db->order_by("nama_app_bank", "asc");
        return $this->db->get()->result_array();
    }
    public function get_total_produk_bank()
    {
        return $this->db->get('tb_produk_bank')->num_rows();
    }
    public function tambah_produk_bank($data)
    {
        $this->db->insert('tb_produk_bank', $data);
        return $this->db->affected_rows();
    }
    public function hapus_produk_bank($id)
    {
        $this->db->delete('tb_produk_bank', ['id_produk_bank' => $id]);
        return $this->db->affected_rows();
    }
    public function get_transaksi($periode)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi_harian');
        $this->db->where("DATE_FORMAT(tanggal_transaksi,'%Y-%m')", $periode);
        $this->db->order_by('tanggal_transaksi','desc');
        $this->db->group_by('tanggal_transaksi');
        return $this->db->get()->result_array();
    }
    public function get_transaksi_id($kode,$periode)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi_harian');
        $this->db->where("DATE_FORMAT(tanggal_transaksi,'%Y-%m')", $periode);
        $this->db->where('terminal_kode', $kode);
        $this->db->order_by('tanggal_transaksi','desc');
        $this->db->group_by('tanggal_transaksi');
        return $this->db->get()->result_array();
    }
    public function get_transaksi_masuk($periode)
    {
        $this->db->select('SUM(lembar) as total_lembar,SUM(tagihan) as total_tagihan');
        $this->db->from('tb_transaksi_harian');
        $this->db->join('tb_terminal','tb_terminal.kode_terminal=tb_transaksi_harian.terminal_kode');
        $this->db->where("DATE_FORMAT(tanggal_transaksi,'%Y-%m')", $periode);
        return $this->db->get()->result_array();
    }
    public function get_transaksi_tidak_masuk($periode)
    {
        $sql = (
            "SELECT DISTINCT tb_transaksi_harian.terminal_kode 
            FROM tb_transaksi_harian 
            WHERE  DATE_FORMAT(tb_transaksi_harian.tanggal_transaksi,'%Y-%m') = '$periode' AND 
            NOT EXISTS 
            (SELECT * FROM tb_terminal 
            WHERE tb_terminal.kode_terminal = tb_transaksi_harian.terminal_kode) 
            AND lembar != 0" );
        return $this->db->query($sql)->result_array();
    }
    public function get_cek_transaksi($periode)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi_harian');
        $this->db->where("DATE_FORMAT(tanggal_transaksi,'%Y-%m')", $periode);
        $this->db->order_by('tanggal_transaksi','desc');
        $this->db->group_by('tanggal_transaksi');
        return $this->db->get()->result_array();
    }
    public function hapus_transaksi($id)
    {
        $this->db->delete('tb_transaksi_harian', ['tanggal_transaksi' => $id]);
        return $this->db->affected_rows();
    }
    public function get_setoran($periode)
    {
        $this->db->select('*');
        $this->db->from('tb_setoran_harian');
        $this->db->where("DATE_FORMAT(tanggal_setoran,'%Y-%m')", $periode);
        $this->db->order_by('tanggal_setoran','desc');
        $this->db->group_by('tanggal_setoran');
        return $this->db->get()->result_array();
    }
    public function get_setoran_masuk($periode)
    {
        $this->db->select('SUM(setoran) as total_setoran');
        $this->db->from('tb_setoran_harian');
        $this->db->join('tb_terminal','tb_terminal.kode_terminal=tb_setoran_harian.terminal_kode');
        $this->db->where("DATE_FORMAT(tanggal_setoran,'%Y-%m')", $periode);
        return $this->db->get()->result_array();
    }
    
    public function get_setoran_all($periode)
    {
        $this->db->select('*');
        $this->db->from('tb_setoran_harian');
        $this->db->join('tb_terminal', 'tb_terminal.kode_terminal = tb_setoran_harian.terminal_kode');
        $this->db->where("DATE_FORMAT(tanggal_setoran,'%Y-%m')", $periode);
        $this->db->where("setoran !=", '0');
        $this->db->order_by('tanggal_setoran','desc');
        return $this->db->get()->result_array();
    }
    public function get_setoran_id($id,$periode)
    {
        $this->db->select('*');
        $this->db->from('tb_setoran_harian');
        $this->db->join('tb_terminal', 'tb_terminal.kode_terminal = tb_setoran_harian.terminal_kode');
        $this->db->where("DATE_FORMAT(tanggal_setoran,'%Y-%m')", $periode);
        $this->db->where('terminal_kode',$id);
        $this->db->where("setoran !=", '0');
        $this->db->order_by('tanggal_setoran','desc');
        return $this->db->get()->result_array();
    }
    public function get_setoran_id_klompok($id,$periode)
    {
        $this->db->select('*');
        $this->db->from('tb_setoran_harian');
        $this->db->join('tb_terminal', 'tb_terminal.kode_terminal = tb_setoran_harian.terminal_kode');
        $this->db->where("DATE_FORMAT(tanggal_setoran,'%Y-%m')", $periode);
        $this->db->where_in('terminal_kode',$id);
        $this->db->where("setoran !=", '0');
        $this->db->order_by('tanggal_setoran','desc');
        return $this->db->get()->result_array();
    }
    public function get_fee_setoran($id,$periode)
    {
        $this->db->select('*');
        $this->db->from('tb_setoran_harian');
        $this->db->where("DATE_FORMAT(tanggal_setoran,'%Y-%m')", $periode);
        $this->db->where('terminal_kode',$id);
        $this->db->where('bank', 'OB Fee');
        $this->db->order_by('tanggal_setoran','desc');
        return $this->db->get()->result_array();
    }
    public function get_fee_pemindahan($id,$periode)
    {
        $this->db->select('*');
        $this->db->from('tb_setoran_harian');
        $this->db->where("DATE_FORMAT(tanggal_setoran,'%Y-%m')",date('Y-m'));
        $this->db->where('terminal_kode',$id);
        $this->db->where('bank', 'Pemindahan');
        $this->db->order_by('tanggal_setoran','desc');
        return $this->db->get()->result_array();
    }
    public function hapus_setoran($id)
    {
        $this->db->delete('tb_setoran_harian', ['id_setoran' => $id]);
        return $this->db->affected_rows();
    }
    public function hapus_setoran_tanggal($id)
    {
        $this->db->delete('tb_setoran_harian', ['tanggal_setoran' => $id]);
        return $this->db->affected_rows();
    }
    public function edit_setoran($id, $data)
    {
        $this->db->update('tb_setoran_harian', $data, ['id_setoran' => $id]);

        return $this->db->affected_rows();
    }
    public function tambah_setoran($data)
    {
        $this->db->insert('tb_setoran_harian', $data);
        return $this->db->affected_rows();
    }

    public function get_tagihan_loket($periode)
    {
        $this->db->select('*');
        $this->db->from('view_transaksi');
        // // $this->db->join('tb_setoran_harian', 'tb_setoran_harian.terminal_kode = tb_transaksi_harian.terminal_kode');
        // $this->db->join('tb_transaksi_harian', 'tb_terminal.kode_terminal = tb_transaksi_harian.terminal_kode');
        $this->db->where("DATE_FORMAT(tanggal_transaksi,'%Y-%m')", $periode);
        $this->db->order_by('rekon','asc');
        $this->db->group_by('nama_pp');
        return $this->db->get()->result_array();
    }
    public function get_setoran_bank($periode)
    {
        $this->db->select('*');
        $this->db->from('tb_setoran_bank');
        $this->db->where("DATE_FORMAT(tanggal_setor_bank,'%Y-%m')", $periode);
        $this->db->order_by('tanggal_setor_bank','desc');
        $this->db->group_by('tanggal_setor_bank');
        return $this->db->get()->result_array();
    }
    public function get_transaksi_bank_id($kode)
    {
        $this->db->select('*');
        $this->db->from('tb_app_bank');
        $this->db->where('kode_app_bank', $kode);
        $this->db->group_by('kode_app_bank');
        return $this->db->get()->result_array();
    }
    public function get_setoran_all_bank($periode)
    {
        $this->db->select('*');
        $this->db->from('tb_setoran_bank');
        $this->db->join('tb_app_bank', 'tb_app_bank.kode_app_bank = tb_setoran_bank.app_bank_kode');
        $this->db->where("DATE_FORMAT(tanggal_setor_bank,'%Y-%m')", $periode);
        $this->db->where("setoran_bank !=", '0');
        $this->db->order_by('tanggal_setor_bank','desc');
        return $this->db->get()->result_array();
    }
    public function tambah_setoran_bank($data)
    {
        $this->db->insert('tb_setoran_bank', $data);
        return $this->db->affected_rows();
    }
    public function edit_setoran_bank($id, $data)
    {
        $this->db->update('tb_setoran_bank', $data, ['id_setoran_bank' => $id]);

        return $this->db->affected_rows();
    }
    public function hapus_setoran_bank($id)
    {
        $this->db->delete('tb_setoran_bank', ['id_setoran_bank' => $id]);
        return $this->db->affected_rows();
    }

    public function get_terminal_fee()
    {
        $this->db->select('*');
        $this->db->from('tb_fee');
        $this->db->join('tb_terminal','tb_terminal.kode_terminal=tb_fee.terminal_kode');
        $this->db->order_by('terminal_kode','asc');
        return $this->db->get()->result_array();
    }
    public function tambah_fee($data)
    {
        $this->db->insert('tb_fee', $data);
        return $this->db->affected_rows();
    }
    public function edit_fee($id, $data)
    {
        $this->db->update('tb_fee', $data, ['id_fee' => $id]);

        return $this->db->affected_rows();
    }

    public function get_transaksi_dashboard()
    {
        $this->db->select('SUM(lembar) as total_lembar,SUM(tagihan) as total_tagihan');
        $this->db->from('tb_transaksi_harian');
        $this->db->where("DATE_FORMAT(tanggal_transaksi,'%Y-%m')", date('Y-m'));
        return $this->db->get()->result_array();
    }

    public function get_konfirmasi()
    {
        $this->db->select('*');
        $this->db->from('tb_konfirmasi');
        $this->db->join('tb_terminal','tb_terminal.kode_terminal=tb_konfirmasi.terminal_kode');
        $this->db->order_by('tanggal_konfirmasi','desc');
        $this->db->where('status','');
        return $this->db->get()->result_array();
    }
    
    public function get_konfirmasi_rekon($id)
    {
        $this->db->select('*');
        $this->db->from('tb_konfirmasi');
        $this->db->join('tb_terminal','tb_terminal.kode_terminal=tb_konfirmasi.terminal_kode');
        $this->db->order_by('tanggal_konfirmasi','desc');
        $this->db->where('tb_terminal.rekon',$id);
        $this->db->group_by('nama_pp');
        return $this->db->get()->result_array();
    }
    public function get_konfirmasi_loket($id)
    {
        $this->db->select('*');
        $this->db->from('tb_konfirmasi');
        $this->db->join('tb_terminal','tb_terminal.kode_terminal=tb_konfirmasi.terminal_kode');
        $this->db->order_by('tanggal_konfirmasi','desc');
        $this->db->where('tb_terminal.kode_terminal',$id);
        $this->db->group_by('nama_pp');
        return $this->db->get()->result_array();
    }
    public function get_cek_konfirmasi()
    {
        $this->db->select('*');
        $this->db->from('tb_konfirmasi');
        $this->db->join('tb_terminal','tb_terminal.kode_terminal=tb_konfirmasi.terminal_kode');
        $this->db->order_by('tanggal_konfirmasi','desc');
        $this->db->where('status','0');
        return $this->db->get()->num_rows();
    }
    public function get_konfirmasi_all()
    {
        $this->db->select('*');
        $this->db->from('tb_konfirmasi');
        $this->db->join('tb_terminal','tb_terminal.kode_terminal=tb_konfirmasi.terminal_kode');
        $this->db->order_by('tanggal_konfirmasi','desc');
        return $this->db->get()->result_array();
    }
    public function tambah_setoran_konfirmasi($id,$data,$data2)
    {
        $this->db->update('tb_konfirmasi',['status'=>$data2],['id_konfirmasi'=>$id]);
        $this->db->insert('tb_setoran_harian', $data);
        return $this->db->affected_rows();
    }

    public function get_stok_kertas()
    {
        $this->db->select('*');
        $this->db->from('tb_stok_kertas');
        $this->db->order_by('id_stok_kertas','desc');
        return $this->db->get()->result_array();
    }
    public function get_stok_kertas_id($id)
    {
        $this->db->select('*');
        $this->db->from('tb_stok_kertas');
        $this->db->order_by('id_stok_kertas','desc');
        $this->db->where('id_stok_kertas', $id);
        return $this->db->get()->result_array();
    }
    public function get_rekon_user($id)
    {
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where('nama_user', $id);
        return $this->db->get()->result_array();
    }
    public function get_stok_kertas_masuk()
    {
        $this->db->select('sum(jumlah_box) as total_masuk');
        $this->db->from('tb_stok_kertas');
        $this->db->where('kategori','Masuk');
        return $this->db->get()->result_array();
    }
    public function get_stok_kertas_keluar()
    {
        $this->db->select('sum(jumlah_box) as total_keluar');
        $this->db->from('tb_stok_kertas');
        $this->db->where('kategori','Keluar');
        return $this->db->get()->result_array();
    }
    public function tambah_stok($data)
    {
        $this->db->insert('tb_stok_kertas', $data);
        return $this->db->affected_rows();
    }
    public function kirim_kertas($data)
    {
        $this->db->insert('tb_stok_kertas', $data);
        return $this->db->affected_rows();
    }
    public function hapus_kertas($id)
    {
        $this->db->delete('tb_stok_kertas', ['id_stok_kertas' => $id]);
        return $this->db->affected_rows();
    }
    public function hapus_konfirmasi($id)
    {
        $this->db->delete('tb_konfirmasi', ['id_konfirmasi' => $id]);
        return $this->db->affected_rows();
    }
     public function tambah_konfirmasi($data)
    {
        $this->db->insert('tb_konfirmasi', $data);
        return $this->db->affected_rows();
    }
    
    public function tambah_nomor($id,$data)
    {
        $this->db->update('tb_users', ['no_hp'=>$data],['username'=>$id]);
        return $this->db->affected_rows();
    }
    public function notifikasi_wa($data1)
    {

        
		$curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://wacenter.invitins.xyz/app/api/send-message",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data1)),
        );

        $response = curl_exec($curl);

        curl_close($curl);
        $wangsap = json_decode($response);
        return $wangsap;
        
    }
    public function tambah_klompok($data)
    {
        $this->db->insert('tb_klompok', $data);
        return $this->db->affected_rows();
    }
    public function get_klompok()
    {
        $this->db->select('*');
        $this->db->from('tb_klompok');
        $this->db->order_by('id_klompok','desc');
        return $this->db->get()->result_array();
    }
    public function get_klompok_id($id)
    {
        $this->db->select('*');
        $this->db->from('view_klompok');
        $this->db->where('kode_klompok',$id);
        $this->db->order_by('nama_pp','asc');
        return $this->db->get()->result_array();
    }
    public function update_klompok($id, $data)
    {
        $this->db->update('tb_terminal', ['klompok_id'=>$data], ['kode_terminal' => $id]);

        return $this->db->affected_rows();
    }
    public function hapus_klompok($id)
    {
        $this->db->delete('tb_klompok', ['kode_klompok' => $id]);
        return $this->db->affected_rows();
    }
}
