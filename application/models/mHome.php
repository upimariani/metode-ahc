<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHome extends CI_Model
{
	public function katalog()
	{
		$this->db->select('produk.id_produk, nama_produk, diskon, harga, gambar, deskripsi, stok, member');
		$this->db->from('produk');
		$this->db->join('diskon', 'produk.id_produk = diskon.id_produk', 'left');
		return $this->db->get()->result();
	}
	public function penilaian()
	{
		$this->db->select('*');
		$this->db->from('penilaian');
		$this->db->join('transaksi', 'penilaian.id_transaksi = transaksi.id_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
		return $this->db->get()->result();
	}
}

/* End of file mHome.php */
