<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi_sales()
		);
		$this->load->view('Sales/Layouts/head');
		$this->load->view('Sales/Layouts/nav');
		$this->load->view('Sales/vTransaksiPelanggan', $data);
		$this->load->view('Sales/Layouts/footer');
	}
	public function detail_transaksi($id)
	{
		$data = array(
			'transaksi' => $this->mTransaksi->detail_transaksi_sales($id)
		);
		$this->load->view('Sales/Layouts/head');
		$this->load->view('Sales/Layouts/nav');
		$this->load->view('Sales/vDetailTransaksi', $data);
		$this->load->view('Sales/Layouts/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'stat_transaksi' => '2'
		);
		$this->mTransaksi->konfirmasi($id, $data);
		$this->session->set_flashdata('success', 'Pesanan Berhasil DiKonfirmasi!');
		redirect('Sales/cTransaksi/detail_transaksi/' . $id);
	}
	public function dikirim($id)
	{
		$data = array(
			'stat_transaksi' => '3'
		);
		$this->mTransaksi->konfirmasi($id, $data);
		$this->session->set_flashdata('success', 'Pesanan Berhasil Dikirim!');
		redirect('Sales/cTransaksi/detail_transaksi/' . $id);
	}
	public function hapus($id)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->delete('transaksi');


		$this->db->where('id_transaksi', $id);
		$this->db->delete('detail_transaksi');

		$this->session->set_flashdata('success', 'Pesanan Berhasil Dihapus!');
		redirect('Sales/cTransaksi');
	}
}

/* End of file cTransaksi.php */
