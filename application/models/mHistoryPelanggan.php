<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHistoryPelanggan extends CI_Model
{
	public function select()
	{
		return $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan GROUP BY pelanggan.id_pelanggan")->result();
	}
	public function detail_history($id)
	{
		return $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE pelanggan.id_pelanggan='" . $id . "'")->result();
	}
}

/* End of file mHistoryPelanggan.php */
