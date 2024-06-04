<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model
{

	public function cekLogin($username, $password)
	{
		$nama_user = $this->db->escape($username);
		$password = $this->db->escape($password);


		$result = $this->db->query("SELECT * FROM tb_users WHERE username = $nama_user AND password = $password");

		if ($result->num_rows() == 0) {
			return FALSE;
		} else {
			$result = $result->row();

			$status = $result->status;
			if ($status != 0) {
				$this->session->set_userdata('logged_in', $result);
				return TRUE;
			} else {
				$this->session->set_flashdata('pesan', 'statusoff');
				redirect('login');
			}
		}
	}
}
