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
		$this->load->view('Owner/Layouts/head');
		$this->load->view('Owner/Layouts/nav');
		$this->load->view('Owner/vTransaksiPelanggan', $data);
		$this->load->view('Owner/Layouts/footer');
	}
}

/* End of file cTransaksi.php */
