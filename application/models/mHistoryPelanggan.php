<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHistoryPelanggan extends CI_Model
{
	public function select()
	{
		return $this->db->query("SELECT COUNT(transaksi.id_transaksi) as frequency, DATEDIFF('" . date('Y-m-d') . "', MAX(tgl_transaksi)) as recency, SUM(tot_transaksi) as monetary, transaksi.id_pelanggan, nama_pelanggan, level_member, alamat, no_tlp FROM `transaksi` JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE YEAR(tgl_transaksi)='2023' GROUP BY transaksi.id_pelanggan")->result();
	}
	public function select_periode()
	{
		return $this->db->query("SELECT COUNT(transaksi.id_transaksi) as frequency, DATEDIFF('2022-12-30', MAX(tgl_transaksi)) as recency, SUM(tot_transaksi) as monetary, transaksi.id_pelanggan, nama_pelanggan, level_member, alamat, no_tlp FROM `transaksi` JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE YEAR(tgl_transaksi)='2022' GROUP BY transaksi.id_pelanggan")->result();
	}
	public function detail_history($id)
	{
		return $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN penilaian ON transaksi.id_transaksi=penilaian.id_transaksi WHERE pelanggan.id_pelanggan='" . $id . "'")->result();
	}
	public function select_history_old()
	{
		$this->db->select('*');
		$this->db->from('analisis');
		$this->db->join('pelanggan', 'analisis.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->order_by('pelanggan.id_pelanggan', 'asc');

		return $this->db->get()->result();
	}


	public function cetak($level_member)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('level_member', $level_member);
		return $this->db->get()->result();
	}

	public function cetak_analisis($level_member)
	{
		$this->db->select('*');
		$this->db->from('analisis');
		$this->db->join('pelanggan', 'analisis.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('hasil', $level_member);
		return $this->db->get()->result();
	}
}

/* End of file mHistoryPelanggan.php */
