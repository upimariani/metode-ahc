<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
	//pelanggan
	public function insert_transaksi($data)
	{
		$this->db->insert('transaksi', $data);
	}
	public function detail_transaksi($data)
	{
		$this->db->insert('detail_transaksi', $data);
	}
	public function transaksi_pelanggan()
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON pelanggan.id_pelanggan = transaksi.id_pelanggan WHERE pelanggan.id_pelanggan='" . $this->session->userdata('id_pelanggan') . "';")->result();
		return $data;
	}
	public function detail_transaksi_pelanggan($id_transaksi)
	{
		$data['detail_transaksi'] = $this->db->query("SELECT * FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN produk ON produk.id_produk=detail_transaksi.id_produk LEFT JOIN diskon ON produk.id_produk = diskon.id_produk WHERE transaksi.id_transaksi='" . $id_transaksi . "'")->result();
		$data['transaksi'] = $this->db->query("SELECT transaksi.id_transaksi, tot_transaksi,ongkir, bukti_pembayaran,stat_pembayaran, stat_transaksi, isi_penilaian, nama_pelanggan, alamat, tgl_transaksi FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN penilaian ON transaksi.id_transaksi=penilaian.id_transaksi  WHERE transaksi.id_transaksi='" . $id_transaksi . "'")->row();
		return $data;
	}
	public function bayar($id, $data)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
	}
	public function pesanan_diterima($id, $data)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
	}

	//sales
	public function transaksi_sales()
	{
		return $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan ORDER BY stat_transaksi, tgl_transaksi ASC")->result();
	}
	public function detail_transaksi_sales($id)
	{
		$data['detail_transaksi'] = $this->db->query("SELECT * FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN produk ON produk.id_produk=detail_transaksi.id_produk LEFT JOIN diskon ON produk.id_produk = diskon.id_produk WHERE transaksi.id_transaksi='" . $id . "'")->result();
		$data['transaksi'] = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE id_transaksi='" . $id . "'")->row();
		return $data;
	}
	public function konfirmasi($id, $data)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
	}
}

/* End of file mTransaksi.php */
