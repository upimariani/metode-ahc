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
		$this->load->view('Marketing/Layouts/head');
		$this->load->view('Marketing/Layouts/nav');
		$this->load->view('Marketing/vProduk', $data);
		$this->load->view('Marketing/Layouts/footer');
	}
}

/* End of file cProduk.php */
