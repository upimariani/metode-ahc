<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnalisis extends CI_Model
{
	public function data_variabel()
	{
		return $this->db->query("SELECT COUNT(transaksi.id_transaksi) as frequency, DATEDIFF('" . date('Y-m-d') . "', MAX(tgl_transaksi)) as recency, SUM(tot_transaksi) as monetary, transaksi.id_pelanggan, nama_pelanggan, level_member FROM `transaksi` JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE YEAR(tgl_transaksi)='2023' AND stat_transaksi='4' GROUP BY transaksi.id_pelanggan")->result();
	}
	public function data_variabel_sebelumnya()
	{
		return $this->db->query("SELECT COUNT(transaksi.id_transaksi) as frequency, DATEDIFF('2022-12-30', MAX(tgl_transaksi)) as recency, SUM(tot_transaksi) as monetary, transaksi.id_pelanggan, nama_pelanggan, level_member FROM `transaksi` JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE YEAR(tgl_transaksi)='2022' GROUP BY transaksi.id_pelanggan")->result();
	}
}

/* End of file mAnalisis.php */
