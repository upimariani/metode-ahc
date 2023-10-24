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
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/vTransaksiPelanggan', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function detail_transaksi($id)
	{
		$data = array(
			'transaksi' => $this->mTransaksi->detail_transaksi_sales($id)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/vDetailTransaksi', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'stat_transaksi' => '2'
		);
		$this->mTransaksi->konfirmasi($id, $data);
		$this->session->set_flashdata('success', 'Pesanan Berhasil DiKonfirmasi!');
		redirect('Admin/cTransaksi/detail_transaksi/' . $id);
	}
	public function dikirim($id)
	{
		$data = array(
			'stat_transaksi' => '3'
		);
		$this->mTransaksi->konfirmasi($id, $data);
		$this->session->set_flashdata('success', 'Pesanan Berhasil Dikirim!');
		redirect('Admin/cTransaksi/detail_transaksi/' . $id);
	}
}

/* End of file cTransaksi.php */
