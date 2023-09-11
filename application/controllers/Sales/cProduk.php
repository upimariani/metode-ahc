<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProduk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mProduk');
	}

	public function index()
	{
		$data = array(
			'produk' => $this->mProduk->select()
		);
		$this->load->view('Sales/Layouts/head');
		$this->load->view('Sales/Layouts/nav');
		$this->load->view('Sales/vProduk', $data);
		$this->load->view('Sales/Layouts/footer');
	}
}

/* End of file cProduk.php */
