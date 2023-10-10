<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporanTransaksi extends CI_Controller
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
		$this->load->view('Admin/vLaporanTransaksi', $data);
		$this->load->view('Admin/Layouts/footer');
	}
}

/* End of file cLaporanTransaksi.php */
