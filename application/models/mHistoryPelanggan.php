<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHistoryPelanggan extends CI_Model
{
	public function select()
	{
		return $this->db->query("SELECT COUNT(transaksi.id_transaksi) as frequency, DATEDIFF('" . date('Y-m-d') . "', MAX(tgl_transaksi)) as recency, SUM(tot_transaksi) as monetary, transaksi.id_pelanggan, nama_pelanggan, level_member, alamat, no_tlp FROM `transaksi` JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan GROUP BY transaksi.id_pelanggan")->result();
	}
	public function detail_history($id)
	{
		return $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN penilaian ON transaksi.id_transaksi=penilaian.id_transaksi WHERE pelanggan.id_pelanggan='" . $id . "'")->result();
	}
	public function cetak($level_member)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('level_member', $level_member);
		return $this->db->get()->result();
	}
}

/* End of file mHistoryPelanggan.php */
