<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporanSegmentasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mHistoryPelanggan');
	}
	public function index()
	{
		$data = array(
			'history' => $this->mHistoryPelanggan->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/vSegmentasi', $data);
		$this->load->view('Admin/Layouts/footer');
	}
}

/* End of file cLaporanSegmentasi.php */
