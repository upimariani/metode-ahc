<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLogin extends CI_Model
{
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get()->row();
	}

	//pelanggan
	public function registrasi($data)
	{
		$this->db->insert('pelanggan', $data);
	}
	public function login_pelangan($username, $password)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get()->row();
	}
}

/* End of file mLogin.php */
